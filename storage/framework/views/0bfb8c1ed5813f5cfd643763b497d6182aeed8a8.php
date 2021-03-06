<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh mục cha     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('loai-sp.index')); ?>">Danh mục cha</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="<?php echo e(route('loai-sp.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?php echo e(route('loai-sp.update')); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
            <div class="box-body">
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>
              
               <!-- text input -->
              <div class="form-group">
                <label>Tên danh mục <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($detail->name); ?>">
              </div>
              <div class="form-group">
                <label>Slug <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="slug" id="slug" value="<?php echo e($detail->slug); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="4" name="description" id="description"><?php echo e($detail->description); ?></textarea>
              </div>            

              
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="is_hot" value="1" <?php echo e($detail->is_hot == 1 ? "checked" : ""); ?>>
                    Danh mục nổi bật
                  </label>
                </div>               
              </div>
              <div class="form-group">
                <label>Ẩn/hiện</label>
                <select class="form-control" name="status" id="status">                  
                  <option value="0" <?php echo e($detail->status == 0 ? "selected" : ""); ?>>Ẩn</option>
                  <option value="1" <?php echo e($detail->status == 1 ? "selected" : ""); ?>>Hiện</option>
                </select>
              </div>
              <div class="form-group">
                <label>Style banner</label>
                <select class="form-control" name="home_style" id="home_style">                  
                  <option value="0" <?php echo e($detail->home_style == 0 ? "selected" : ""); ?>>Không banner</option>
                  <option value="1" <?php echo e($detail->home_style == 1 ? "selected" : ""); ?>>Banner đứng lớn</option>
                  <option value="2" <?php echo e($detail->home_style == 2 ? "selected" : ""); ?>>Banner đứng nhỏ</option>
                  <option value="3" <?php echo e($detail->home_style == 3 ? "selected" : ""); ?>>Banner ngang</option>
                </select>
              </div>   
              <div class="form-group" style="margin-top:10px">  
                <label class="col-md-3 row">Icon </label>    
                <div class="col-md-9">
                  <img id="thumbnail_icon" src="<?php echo e($detail->icon_url ? config('icho.upload_url').$detail->icon_url : 'http://placehold.it/60x60'); ?>" class="img-thumbnail" width="60" height="60">
                  
                  <input type="file" id="file-icon" style="display:none" />
               
                  <button class="btn btn-default" id="btnUploadIcon" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                </div>
              </div>              
              <div class="form-group">
                <label>Màu nền</label>
                <input type="text" class="form-control" name="bg_color" id="bg_color" value="<?php echo e($detail->bg_color); ?>">
              </div>
            </div>         
            <!-- /.box-body -->           
            <input type="hidden" name="icon_url" id="icon_url" value="<?php echo e($detail->icon_url); ?>"/>
            <input type="hidden" name="old_icon_url" value="<?php echo e($detail->icon_url); ?>"/>
            <input type="hidden" name="icon_name" id="icon_name" value="<?php echo e($detail->icon_name); ?>"/>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="<?php echo e(route('loai-sp.index')); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
          <!-- /.box-header -->     
            <div class="box-body">
              <div class="form-group">
                <label>Meta title</label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo e($detail->meta_title); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php echo e($detail->meta_description); ?></textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords"><?php echo e($detail->meta_keywords); ?></textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="4" name="custom_text" id="custom_text"><?php echo e($detail->custom_text); ?></textarea>
              </div>
              <!-- text input -->
              
              <!--<div style="clear:both;margin-bottom:10px"></div>
              <div class="form-group">  
                <label class="col-md-3">Banner </label>    
                <div class="col-md-9">
                  <img id="thumbnail_image" src="<?php echo e($detail->image_url ? config('icho.upload_url').$detail->image_url : 'http://placehold.it/150x150'); ?>" class="img-thumbnail" width="150" height="150">
                  
                  <input type="file" id="file-image" style="display:none" />
                </div>                
                <div class="col-md-3"></div>
                <div class="col-md-9" style="padding-top:5px">
                  <button class="btn btn-default" id="btnUploadImage" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                </div>
              </div>-->
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="<?php echo e(route('image.tmp-upload')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
    $(document).ready(function(){
      $('#btnUploadImage').click(function(){        
        $('#file-image').click();
      });
      $('#btnUploadIcon').click(function(){        
        $('#file-icon').click();
      });
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_image').attr('src',$('#upload_url').val() + response.image_path);
                $( '#image_url' ).val( response.image_path );
                $( '#image_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
      var filesIcon = '';
      $('#file-icon').change(function(e){
         filesIcon = e.target.files;
         
         if(filesIcon != ''){
           var dataForm = new FormData();        
          $.each(filesIcon, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_icon').attr('src',$('#upload_url').val() + response.image_path);
                $('#icon_url').val( response.image_path );
                $( '#icon_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>