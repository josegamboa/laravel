
<!DOCTYPE HTML>
<html>
<head>
    <title>Voguish | Blog </title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Voguish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <script src="js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });

    </script>

</head>
<body>
<!-- header -->
<div class="container">
    <div class="header">
        <div class="logo">
            <a href="/"><img src="images/logo.png" class="img-responsive" alt=""></a>
        </div>

        <div class="head-nav">
            <span class="menu"> </span>
            <ul class="cl-effect-1">
                <li class="active"><a href="/">Blog</a></li>
                <li><a href="admin">Login</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
        <!-- script-for-nav -->
        <script>
            $( "span.menu" ).click(function() {
                $( ".head-nav ul" ).slideToggle(300, function() {
                    // Animation complete.
                });
            });
        </script>
        <!-- script-for-nav -->
        <div class="clearfix"> </div>
    </div>
</div>
<!-- header -->
<!-- Blog -->
<div class="container">
    <div class="blog">

        <div class="blog-content">
            <div class="blog-content-left">
                <div class="blog-articals">
                    @foreach ($posts as $post)
                        <div class="blog-artical">
                            <div class="blog-artical-info">
                                <div class="blog-artical-info-img">
                                    <a href="#"><img src="images/uploads/posts/{{@$post->id.".".$post->PhotoExtension}}" title="post-name"></a>
                                </div>
                                <div class="blog-artical-info-head">
                                    <h2><a href="/">{{@$post->Tittle}}</a></h2>
                                    <h6>{{$post->PostedAt}} by <a href="#">Admin</a></h6>

                                </div>
                                <div class="blog-artical-info-text">
                                    <p>{{substr ($post->Content,0,250)}}<a href="#">[...]</a></p>
                                </div>
                                <div class="artical-links">
                                    <ul>
                                        <li><small> </small><span>{{@$post->PostedAt}}</span></li>
                                        <li><a href="#"><small class="admin"> </small><span>Admin</span></a></li>
                                        <li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
                                        <li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    @endforeach
                </div>
                <!--start-blog-pagenate-->
                <nav>
                    <ul class="pagination">
                        {{ @$posts->links()}}
                    </ul>
                </nav>
                <!--//End-blog-pagenate-->
            </div>
            <div class="blog-content-right">
                <div class="b-search">
                    <form>
                        <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </form>
                </div>

                @foreach ($posts as $post)
                <div class="twitter-weights">
                    <h3>{{@$post->Tittle}}</h3>
                    <div class="twitter-weight-grid">
                        <h4><span> </span>Admin</h4>
                        <p>{{substr (@$post->Content,0,50)}} <a href="#">...</a></p>
                        <i><a href="#">{{@$post->PostedAt}}</a></i>
                    </div>

                </div>
                @endforeach
                <!--//End-twitter-weight-->
                <!-- start-tag-weight-->
                <div class="b-tag-weight">

                </div>
                <!---- //End-tag-weight---->
            </div>
            <div class="clearfix"> </div>

        </div>
    </div>
    <!-- /Blog -->

    <div  class="footer">
        <div class="col-md-3 foot-1">
            <h4>Quick Links</h4>
            <ul>
                @foreach ($posts as $post)
                <li><a href="#">||  {{$post->Tittle}}</a></li>
                @endforeach ($posts as $post)
            </ul>
        </div>
        <div class="clearfix"> </div>
        <div class="copyright">
            <p>Copyrights © 2016 </p>
        </div>
    </div>
</div>
</body>
</html>