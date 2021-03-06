<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Adam & Bethany's Belated Wedding</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,400italic,500italic,700italic,900italic%7CRoboto+Slab:400,300,700%7CPlayfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,300%7CLibre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/simple-line-icons.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css" >
        <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/global.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" >
        <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
        <link rel="stylesheet" type="text/less" href="/assets/css/skin.less">
    </head>
    <body>
        <!--Loader Start-->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_one"></div>

                </div>
            </div>

        </div>
        <!--Loader End-->
        <!--Page Wrapper Start-->
        <div id="wrapper" class="error">

            <!--Header Section Start-->
            <header id="header">
                <div class="container">
                    <div class="row ">
                        <div class="col-xs-12 padding-class">
                            <div class="header-cont clearfix">
                            <a href="/" class="logo"><i class="fa fa-heart fa-4x"></i></a>
                                <nav>
                                    <button class=" home-menu" type="button">
                                        <span class="icon-bar"> </span>
                                        <span class="icon-bar"> </span>
                                        <span class="icon-bar"> </span>
                                    </button>

                                    <ul class="navigation clearfix">
                                        <li class="active">
                                            <a href="/">HOME</a>
                                        </li>
                                        <li>
                                            <a href="#couple">COUPLE</a>
                                        </li>
                                        <li>
                                            <a href="#our-story">OUR STORY</a>
                                        </li>
                                        <li>
                                            <a href="#event">EVENTS</a>
                                        </li>
                                        <li>
                                            <a href="#people-blog">PEOPLE</a>
                                        </li>
                                        <li>
                                            <a href="#photos">PHOTOS</a>
                                        </li>
                                    </ul>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Header Section End-->


    @yield('content')


            <!--Footer Section start-->
            <footer id="footer">
                <div class="primary-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="footer-logo">
                                    <figure>
                                        <img src="/assets/images/footer-img.png" alt="">
                                    </figure>
                                    <h4>Adam<span>&amp;</span>Bethany</h4>
                                    <span class="oct-class">Sunday, July 24th, 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-footer">
                    <div class="container">
                        <div class="row">
                            <div class="left-footer">
         <p class="text-center">
           &copy; 2016 <a href="https://techendeavors.com">TechEndeavors Startup Studio</a>.
           Powered by Laravel <?php $laravel = app(); echo $laravel::VERSION; ?>.
           @if (Auth::guest())
             (<a href="/login">Login</a>)
           @else
             (<a href="/logout">Logout</a>)
           @endif
         </p>

                            </div>
                            <div class="right-footer">
                                <a href="#" class="circle-class"><i class="fa fa-facebook"> </i></a>
                                <a href="#" class="circle-class"><i class="fa fa-twitter"> </i></a>
                                <a href="#" class="circle-class"><i class="fa fa-instagram"> </i></a>
                                <a href="#" class="circle-class"><i class="fa fa-pinterest"> </i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!--Footer Section End-->
        </div>
        <!--Page Wrapper End-->
        <script type="text/javascript" src="/assets/js/angular.js"></script>
        <script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="/assets/js/less.js"></script>
        <script type="text/javascript" src="/assets/js/owl.carousel.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.appear.js"></script>
        <script type="text/javascript" src="/assets/js/isotope.pkgd.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.plugin.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.fancybox.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.countdown.min.js"></script>
        <script type="text/javascript" src="/assets/js/app.js"></script>

        <!-- revolution slider Js -->
        <script type="text/javascript" src="/assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.revolution.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.video.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="/assets/extensions/revolution.extension.parallax.min.js"></script>
        <!--  revolution slider Js -->

        <script type="text/javascript" src="/assets/js/site.js"></script>
        <script type="text/javascript" src="/assets/js/nav.js"></script>


    </body>
</html>
