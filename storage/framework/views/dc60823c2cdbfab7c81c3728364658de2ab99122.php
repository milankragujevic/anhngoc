<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="robots" content="index,follow"/>
  <meta http-equiv="content-language" content="en"/>
  <meta name="description" content="<?php echo $__env->yieldContent('site_description'); ?>"/>
  <meta name="keywords" content="<?php echo $__env->yieldContent('site_keywords'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="<?php echo $__env->yieldContent('favicon'); ?>" type="image/x-icon"/>
  <link rel="canonical" href=""/>
  <meta property="og:type" content="website"/>
  <meta property="og:image:width" content="650"/>
  <meta property="og:image:height" content="350"/>
  <meta property="og:image:type" content="image/jpeg"/>
  <meta property="og:image" content="<?php echo $__env->yieldContent('banner'); ?>"/>
  <meta property="article:publisher" content="<?php echo $__env->yieldContent('google_fanpage'); ?>"/>
  <meta property="og:url" content=""/>
  <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>"/>
  <meta property="og:description" content="<?php echo $__env->yieldContent('site_description'); ?>"/>
  <meta property="og:site_name" content="<?php echo $__env->yieldContent('site_name'); ?>"/>
  <meta property="og:updated_time" content="1468757347"/>
  <meta property="fb:app_id" content="<?php echo $__env->yieldContent('facebook_appid'); ?>"/>

    <script>
        var base_url = 'http://' + document.domain + '/';
    </script>

    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/bootstrap.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/main.css?v=5')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/jquery.cluetip.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/jquery.qtip.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/custom.css?v=1.1')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/psbar.css')); ?>" type="text/css" />
    <!--<link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/star-rating.css')); ?>" type="text/css" />-->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jquery-1.9.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jquery.lazyload.js')); ?>"></script>
    <!--<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jquery.qtip.min.js')); ?>"></script>-->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jquery.cookie.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/123movies.min.js?v=2')); ?>"></script>
    <!--<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/user.min.js?v=1.1')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/md5.min.js')); ?>"></script>
    <!--<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jwplayer-7.3.6/jwplayer.js')); ?>"></script>-->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/psbar.jquery.min.js')); ?>"></script>
    <!--<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/star-rating.js')); ?>"></script>-->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jquery.smooth-scroll.min.js')); ?>"></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>


    <script src="<?php echo e(URL::asset('assets/js/detectmobilebrowser.js')); ?>"></script>   
</head>

<body>

    <script type="text/javascript">        
        /*window.fbAsyncInit = function () {
            FB.init({
                appId: '727243164041505',
                cookie: true,  // enable cookies to allow the server to access
                               // the session
                xfbml: true,  // parse social plugins on this page
                version: 'v2.6' // use graph api version 2.6
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));  
        */      
    </script>



    <!--header-->
    <header>
        <div class="container">
            <?php echo $__env->make('layout.home.header-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo $__env->make('layout.home.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clearfix"></div>
        </div>
    </header>
    <script type="text/javascript">
        var hidden = true;
        $('.search-suggest').mouseover(function() {
            hidden = false;
        });

        $('.search-suggest').mouseout(function() {
            hidden = true;
        });

        $('input[name=keyword]').keyup(function() {
            var keyword = $(this).val();
            if (keyword.trim().length > 2) {
                $.ajax({
                    url: base_url + 'ajax/suggest_search',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        $('.search-suggest').html(data.content);
                        if (data.content.trim() !== '') {
                            $('.search-suggest').show();
                        } else {
                            $('.search-suggest').hide();
                        }
                    }
                })
            } else {
                $('.search-suggest').hide();
            }
        });
        $('input[name=keyword]').blur(function() {
            if (hidden) {
                $('.search-suggest').hide();
            }
        });
        $('input[name=keyword]').focus(function() {
            if ($('.search-suggest').html() !== '') {
                $('.search-suggest').show();
            }
        });

        $('input[name=keyword]').keypress(function(event) {
            if (event.which == 13) {
                searchMovie();
            }
        });

        function searchMovie() {
            var keyword = $('input[name=keyword]').val();
            if (keyword.trim() !== '') {
                keyword = keyword.replace(/(<([^>]+)>)/ig, "").replace(/[`~!@#$%^&*()_|\=?;:'",.<>\{\}\[\]\\\/]/gi, "");
                keyword = keyword.split(" ").join("+");
                window.location.href = base_url + 'movie/search/' + keyword;
            }
        }
    </script>
    <!--/header-->

    <div class="header-pad"></div>
    <div id="main" class="page-detail">
        <div class="container">
            <div class="pad"></div>
            <div class="main-content main-detail">
                <?php echo $__env->make('home.detail.bread', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>

                <!-- keywords -->
                <?php if( !empty( $tagSelected ) ): ?>
                <div id="mv-keywords">
                    <strong class="mr10">Xem thêm:</strong>                    
                    <?php foreach( $tagSelected as $tag ): ?>
                    <a target="_blank" href="tags/<?php echo e($tag->slug); ?>" title="<?php echo e($tag->tag); ?>">
                       <h5><?php echo e($tag->tag); ?></h5>
                    </a>                    
                    <?php endforeach; ?>           
                </div>
                <?php endif; ?>
                <?php if( $detail->content ): ?>

                <div class="content-kus" style="background: #fff;">
                    <?php echo $detail->content; ?>

                </div>
                <?php endif; ?>
                <!--<div id="commentfb">
                    <div class="fb-comments" data-href="film/zombie-massacre-14452/watching.html" data-width="100%" data-numposts="5"></div>
                </div>-->
                <div class="pad"></div>
                <!--related-->
                <?php echo $__env->make('home.detail.related', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!--/related-->               
            </div>

        </div>
    </div>
    </div>
    <div id="overlay"></div>
    <div class="modal fade modal-subc modal-error" id="pop-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="subc-icon"><i class="fa fa-frown-o fa-4x"></i>
                    </div>
                    <h4>Oops!</h4>
                    <div class="clearfix"></div>
                    <p class="desc">The current streaming file is broken, do you want to stream from our back-up link?</p>
                    <div class="block">
                        <a class="btn btn-success" onclick="load_backup_episode()">Yes, please</a>
                        <a data-dismiss="modal" class="btn btn-default">No, thanks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('home.detail.report-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--/ modal -->
    <script type="text/javascript">
        var movie = {
            id: "14452",
            name: "Zombie Massacre",
            total_episode: "1",
            quality: "HD",
            trailer: "https://www.youtube.com/embed/E52sMpCZbnk",
            link: "film/zombie-massacre-14452/watching.html"
        };
        $(document).ready(function() {
            $('.bp-btn-light, .bp-btn-review').smoothScroll();
            $('#comment-area #comment .content').perfectScrollbar();
            getCommentCount();
            $("#toggle-schedule").click(function(e) {
                $("#toggle-schedule").toggleClass("active");
                $(".se-list").toggle();
            });
            /*$.get(base_url + 'ajax/movie_check_favorite/' + movie.id, function(data) {
                $('#button-favorite').html(data);
                if (!$.cookie('notice-favorite-' + movie.id)) {
                    if ($('.popover-like').length > 0) {
                        if (parseInt(movie.total_episode) > 1 || movie.quality !== "HD") {
                            $.cookie('notice-favorite-' + movie.id, true, {
                                expires: 3,
                                path: '/'
                            });
                            $('.popover-like').show();
                            var notice_message = parseInt(movie.total_episode) > 1 ? 'Get updated once new episode is available. Favorite this now.' : 'Get updated once this movie is available in HD. Favorite this now.';
                            $('#popover-notice').text(notice_message);
                            $('.toggle-popover-like').click(function() {
                                $('.popover-like').hide();
                            });
                        }
                    }
                }
            });
            */
            
        });

        function getCommentCount() {
            $.ajax({
                url: 'http://graph.facebook.com/?id=' + movie.link,
                dataType: 'jsonp',
                success: function(data) {
                    if (data.comments) {
                        $("#comment-count").text(data.comments);
                    }
                }
            });
        }
        $("#report-form").submit(function(e) {
            if (validate_report() && !$.cookie('report-' + movie.id)) {
                $("#report-submit").prop("disabled", true);
                $("#report-loading").show();
                var postData = $(this).serializeArray();
                var formURL = $(this).attr("action");
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data: postData,
                    dataType: "json",
                    success: function(data) {
                        $('#report-alert').show();
                        setTimeout(function() {
                            $('#report-alert').hide();
                        }, 5000);
                        $("#report-submit").removeAttr("disabled");
                        $("#report-loading").hide();
                        $(".bp-btn-report").remove();
                        $.cookie('report-' + movie.id, true, {
                            path: '/'
                        });
                    }
                });
            }
            document.getElementById("report-form").reset();
            $('#pop-report').modal('hide');
            e.preventDefault();
        });

        function validate_report() {
            if (($("#report-form input[name*='issue']:checked").length) <= 0) {
                alert("Please select any issue.");
                return false;
            }
            return true;
        }
    </script>


    <!--footer-->
    <footer>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 footer-one">
                        <div class="footer-link">
                            <h3 class="footer-link-head">123movies</h3>

                            <p><a title="Movies" href="movie/filter">Movies</a>
                            </p>

                            <p><a title="Top IMDb" href="movie/topimdb">Top IMDb</a>
                            </p>

                            <p><a title="DMCA" href="site/dmca">DMCA</a>
                            </p>

                            <p><a title="FAQ" href="site/faq">FAQ</a>
                            </p>

                            <p><a title="Advertising" href="site/promote">Advertising</a>
                            </p>

                            <p><a title="Advertising" href="site/donate">Donate</a>
                            </p>
                        </div>
                        <div class="footer-link">
                            <h3 class="footer-link-head">Movies</h3>

                            <p><a title="Action" href="genre/action/">Action</a>
                            </p>

                            <p><a title="History" href="genre/history/">History</a>
                            </p>

                            <p><a title="Thriller" href="genre/thriller/">Thriller</a>
                            </p>

                            <p><a title="Sci-Fi" href="genre/sci-fi/">Sci-Fi</a>
                            </p>
                        </div>
                        <div class="footer-link end">
                            <h3 class="footer-link-head">TV-Series</h3>

                            <p><a title="United States" href="movie/filter/series">United States</a>
                            </p>

                            <p><a title="Korea" href="movie/filter/series">Korea</a>
                            </p>

                            <p><a title="China" href="movie/filter/series">China</a>
                            </p>

                            <p><a title="Taiwan" href="movie/filter/series">Taiwan</a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-4 footer-subs">
                        <h3 class="footer-link-head">Subscribe</h3>

                        <p class="desc">Subscribe to 123Movies mailing list to receive updates on movies, tv-series and news
                        </p>

                        <div class="form-subs mt20">
                            <div class="subc-input pull-left" style="width:65%; margin-right: 5%;">
                                <input type="email" placeholder="Enter your email" id="Email" name="email-footer" class="form-control">
                            </div>
                            <div class="subc-submit pull-left" style="width:30%;">
                                <button id="subscribe-submit-footer" class="btn btn-block btn-success btn-approve" type="button" onclick="subscribe_footer()">Subscribe
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="error-email-subs-footer" class="alert alert-danger error-block"></div>
                        <div id="success-subs-footer" class="alert alert-success error-block"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-4 footer-copyright">
                        <p><img border="0" src="assets/images/logo.png" class="mv-ft-logo">
                        </p>

                        <p>Copyright &copy; 123movies.to. All Rights Reserved</p>

                        <p style="font-size: 11px; line-height: 14px; color: rgba(255,255,255,0.4)">Disclaimer: This site does not store any files on its server. All contents are provided by non-affiliated third parties.
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="footer-tags">
                    <a title="Watch full movies online">Watch full movies online</a>
                    <a title="Free movies online">Free movies online</a>
                    <a title="Movietube">Movietube</a>
                    <a title="Free online movies full">Free online movies full</a>
                    <a title="Movie2k">Movie2k</a>
                    <a title="Watch movies 2k">Watch movies 2k</a>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->
    <div id="alert-cookie" role="alert" class="alert alert-warning alert-cookie" style="display: none;">
        <button type="button" class="close ml10" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-warning mr5" style="color:#C30;"></i> You need to enable browser's cookie to stream. <a href="how-to-enable-browser-cookie" title="">Click here for instruction.</a>
    </div>

    <script>
        if (!isCookieEnabled()) {
            $('#alert-cookie').css('display', 'block');
            $('body').addClass('off-cookie');
        }
    </script>


    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/bootstrap.min.js?v=0.1')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/bootstrap-select.js?v=0.1')); ?>"></script>
    <!--<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/auth.min.js?v=0.4')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/player.123movies.v4.3.min.js?v=578b6e6e6d0f6')); ?>"></script>-->
    <?php echo $__env->yieldContent('javascript_page'); ?>

    <script type="text/javascript">
        $(document).ready(function() {
            if (window.top !== window.self) {
                document.head.innerHTML = '';
                document.body.innerHTML = '';
            }
            if (!$.cookie('domain-alert')) {
                $.cookie('domain-alert', 1, {
                    expires: 1,
                    path: '/'
                });
                $('.alert-bottom').css('display', 'block');
                setInterval(function() {
                    $(".alert-bottom").remove();
                }, 15000);
            }
            $('#alert-bottom-close').click(function() {
                $(".alert-bottom").remove();
            });
        });
    </script>
    <input type="hidden" id="route_get_link" value="<?php echo e(route('get-link')); ?>">
</body>

</html>