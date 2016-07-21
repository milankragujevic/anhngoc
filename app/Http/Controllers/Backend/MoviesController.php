<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Cate;
use App\Models\Backend\ParentCate;
use App\Models\Backend\Tag;
use App\Models\Backend\TagObjects;
use App\Models\Backend\Movies;
use Helper, File, Session;

class MoviesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $parentCate = ParentCate::orderBy('display_order')->first();
        
        $parent_id = isset($request->parent_id) ? $request->parent_id : $parentCate->id;

        $cate_id = isset($request->cate_id) ? $request->cate_id : 0;
        
        $cateArr = Cate::where('parent_id', $parent_id)->get();

        $title = isset($request->title) && $request->title != '' ? $request->title : '';
        
        $items = Movies::where('parent_id', $parent_id)->orderBy('display_order')->get();
        
        $parentCateArr = ParentCate::all();
        
        return view('backend.movies.index', compact( 'items', 'parentCate' , 'parent_id', 'parentCateArr', 'title', 'cateArr', 'cate_id'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {

        $parentCate = ParentCate::orderBy('display_order')->first();
        
        $parent_id = isset($request->parent_id) ? $request->parent_id : $parentCate->id;

        $cateArr = Cate::where('parent_id', $parent_id)->get();
        
        $parentCateArr = ParentCate::all()->sortBy('display_order');

        return view('backend.movies.create', compact( 'parent_id', 'parentCateArr', 'parentCate', 'parent_id', 'cateArr'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[
            'parent_id' => 'required',
            'cate_id' => 'required',
            'url' => 'required',
            'title' => 'required',
            'site_id' => 'required',
            'slug' => 'required|unique:movies,slug',
        ],
        [
            'url.required' => 'Bạn chưa nhập URL phim',
            'cate_id.required' => 'Bạn chưa chọn danh mục con.',
            'site_id.required' => 'Bạn chưa chọn site nguồn.',
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'slug.required' => 'Bạn chưa nhập slug',
            'slug.unique' => 'Slug đã được sử dụng.'
        ]);       
        
        $dataArr['alias'] = Helper::stripUnicode($dataArr['title']);

        Movies::create($dataArr);

        Session::flash('message', 'Tạo mới phim thành công');

        return redirect()->route('movies.index',[$dataArr['parent_id']]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $detail = Cate::find($id);
        $parentCateArr = ParentCate::all();
        return view('backend.movies.edit', compact( 'detail', 'parentCateArr' ));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|unique:parent_cate,slug|unique:cate,slug,'.$dataArr['id'],
        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'slug.required' => 'Bạn chưa nhập slug',
            'slug.unique' => 'Slug đã được sử dụng.'
        ]);       

        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);

        $model = Cate::find($dataArr['id']);

        $model->update($dataArr);

        Session::flash('message', 'Cập nhật danh mục thành công');

        return redirect()->route('movies.index', [$dataArr['parent_id']]);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = Cate::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa danh mục thành công');
        return redirect()->route('movies.index');
    }
}