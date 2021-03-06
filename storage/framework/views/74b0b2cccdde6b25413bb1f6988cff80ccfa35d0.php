<!--category-->
<div class="movies-list-wrap mlw-related">
   <div class="ml-title ml-title-page">
      <span><?php echo e($is_search == 1 ? "Kết quả tìm kiếm theo từ khóa '".$tu_khoa."'" : $cateDetail->name); ?></span>
      <!--<div class="filter-toggle"><i class="fa fa-sort mr5"></i>Filter</div>-->
      <div class="clearfix"></div>
   </div>
   <!--<div id="filter">
      <div class="filter-btn">
         <button onclick="filterMovies()" class="btn btn-lg btn-success">Filter movies</button>
      </div>
      <div class="filter-content row">
         <div class="col-sm-2 fc-main">
            <span class="fc-title">Sort by</span>
            <ul class="fc-main-list">
               <li>
                  <a class="active" href="movie/filter/all/latest/1/all/all/all/all"><i
                     class="fa fa-clock-o mr5"></i>Latest</a>
               </li>
               <li>
                  <a class="" href="movie/filter/all/view/1/all/all/all/all"><i
                     class="fa fa-eye mr5"></i>Most
                  viewed</a>
               </li>
               <li>
                  <a class="" href="movie/filter/all/favorite/1/all/all/all/all"><i
                     class="fa fa-heart mr5"></i>Most favorite</a>
               </li>
               <li>
                  <a class="" href="movie/filter/all/rating/1/all/all/all/all"><i
                     class="fa fa-star mr5"></i>Most rating</a>
               </li>
               <li>
                  <a class="" href="movie/filter/all/imdb_mark/1/all/all/all/all"><i
                     class="fa fa-fire mr5"></i>Top IMDb</a>
               </li>
            </ul>
         </div>
         <div class="col-sm-10">
            <div class="cs10-top">
               <div class="fc-filmtype">
                  <span class="fc-title">Film Type</span>
                  <ul class="fc-filmtype-list">
                     <li><label><input name="type" checked value="all" type="radio">
                        All</label>
                     </li>
                     <li><label><input name="type"  value="movie"
                        type="radio">
                        Movies</label>
                     </li>
                     <li><label><input name="type"  value="series"
                        type="radio">
                        TV-Series</label>
                     </li>
                  </ul>
               </div>
               <div class="fc-quality">
                  <span class="fc-title">Quality</span>
                  <ul class="fc-quality-list">
                     <li><label><input name="quality" checked value="all"
                        type="radio">
                        All</label>
                     </li>
                     <li><label><input name="quality"  value="hd"
                        type="radio"> HD</label>
                     </li>
                     <li><label><input name="quality"  value="sd"
                        type="radio"> SD</label>
                     </li>
                     <li><label><input name="quality"  value="cam"
                        type="radio">
                        CAM</label>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="fc-genre">
               <span class="fc-title">Genre</span>
               <ul class="fc-genre-list">
                
                  <li>
                     <label>
                     <input class="genre-ids" value="22" name="genres[]"
                        type="checkbox" > War                                </label>
                  </li>
               </ul>
            </div>
            <div class="clearfix"></div>
            <div class="fc-country">
               <span class="fc-title">Country</span>
               <ul class="fc-country-list">
                 
                  <li>
                     <label>
                     <input class="country-ids" value="7" name="countries[]"
                        type="checkbox" > United States                                </label>
                  </li>
               </ul>
            </div>
            <div class="clearfix"></div>
            <div class="fc-release">
               <span class="fc-title">Release</span>
               <ul class="fc-release-list">
                  <li><label><input checked name="year" value="all" type="radio">
                     All</label>
                  </li>
                  
                  <li>
                     <label>
                     <input                                 name="year"
                        value="older-2012"
                        type="radio"> Older
                     </label>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <script>
      function filterMovies() {
          var genres = [];
          var countries = [];
          $('.genre-ids:checked').each(function () {
              genres.push($(this).val());
          });
          $('.country-ids:checked').each(function () {
              countries.push($(this).val());
          });
          if (genres.length > 0) {
              genres = genres.join('-');
          } else {
              genres = 'all';
          }
          if (countries.length > 0) {
              countries = countries.join('-');
          } else {
              countries = 'all';
          }
          var year = $('input[name=year]:checked').val();
          var quality = $('input[name=quality]:checked').val();
          var type = $('input[name=type]:checked').val();
          var url = 'movie/filter/' + type + '/' + 'latest' + '/' + genres + '/' + countries + '/' + year + '/' + 'all' + '/' + quality;
          window.location.href = url;
      }
   </script>-->
   <div id="pagination" style="margin: 0;">
      <nav>
         <?php echo e($is_search == 1 ? $moviesArr->appends(['k' => $tu_khoa])->links() : $moviesArr->links()); ?>

      </nav>
   </div>
   <div class="movies-list movies-list-full">
      <?php if( $moviesArr->count() > 0): ?>
         <?php foreach( $moviesArr as $movies): ?>
         <div class="ml-item">
            <a href="<?php echo e($movies->slug); ?>-<?php echo e($movies->id); ?>.html" class="ml-mask">
               <span class="mli-quality"><?php echo e($movies->quality == 1 ? "HD" : ( $movies->quality == 2 ? "SD" : "CAM" )); ?></span>
               <img data-original="<?php echo e(Helper::showImage( $movies->image_url )); ?>" title="<?php echo e($movies->title); ?>" class="lazy thumb mli-thumb"
                  alt="<?php echo e($movies->title); ?>">
               <span class="mli-info">
                  <h2><?php echo e($movies->title); ?></h2>
               </span>
            </a>
         </div>
         <?php endforeach; ?>
      <?php endif; ?>
     
      <script type="text/javascript">         
        /* $("img.lazy").lazyload({
             effect: "fadeIn"
         });*/
      </script>
      <div class="clearfix"></div>
   </div>
   <div id="pagination">
      <nav>
         <?php echo e($is_search == 1 ? $moviesArr->appends(['k' => $tu_khoa])->links() : $moviesArr->links()); ?>

      </nav>
   </div>
</div>
<!--/category-->
<div class="content-kus" style="text-align: center; margin: 20px 0; padding: 15px;">
  
</div>
<style type="text/css">
.pagination{
   margin: 0px !important;
   margin-bottom: 10px !important;
}
</style>