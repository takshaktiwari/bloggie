
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'KodeXploit') | KodeXploit</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="KodeXploit.com - Takshak tiwari">
    <meta name="description" content="@yield('title', 'description') | KodeXploit">
    <meta name="keywords" content="@yield('title', 'keywords') | KodeXploit">

    <link rel="shortcut icon" href="{{ url('storage'.setting('favicon')) }}">

    @section('styles')
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" SameSite=Secure>
        <link href="{{ url('assets/') }}/css/theme-modules.css" rel="stylesheet">
    @show
</head>

<body>
    <div id="main-content" class="bg-color-gray">
        <!-- Header -->
        <!-- Navbar -->
        <style>

        </style>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container ">
                <a class="navbar-brand logo " href="{{ url('/') }}">
                    <h2><b>DV<span>B</span></b></h2>
                </a>
                <button class="navbar-toggler hamburger-menu-btn" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span>toggle menu</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" aria-haspopup="true"
                                aria-expanded="false">All Topics</a>
                            <div class="dropdown-menu">
                                @foreach(get_categories() as $category)
                                    <a href="{{ url('posts?category='.$category->slug) }}" class="dropdown-item">
                                        {{ $category->category }}
                                    </a>
                                @endforeach
                            </div>
                        </li>

                        @foreach(get_feat_categories() as $category)
                        
                            <li class="nav-item dropdown hover_dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link " aria-haspopup="true"
                                    aria-expanded="false">{{ $category->category }}</a>
                                <div class="dropdown-menu">
                                    
                                    @foreach($category->child_categories as $child)
                                        <a href="{{ url('posts?category='.$child->slug) }}" class="dropdown-item">
                                            {{ $child->category }}
                                        </a>
                                    @endforeach
                                    <a href="{{ url('posts?category='.$category->slug) }}" class="dropdown-item">
                                        All Posts
                                    </a>
                                </div>
                            </li>
                        @endforeach

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('categories') }}">
                                All categories
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Header -->
        <!-- main -->
        <div class="page-container scene-main scene-main--fade_In">

            @section('content')
            @show
            

            <!-- footer  -->
            <footer class="web-footer footer bg-color-white">
                <div class="footer-widgets py-5 text-center ">
                    <div class="container pt-4">
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <div class="footer-widget ">
                                    <h2 class="mb-3">
                                        <a class="logo" href="{{ url('/') }}">
                                            <b>Kode<span>Xploit</span></b>
                                        </a>
                                    </h2>
                                    <p class="mb-2">
                                        <a href="">info@kodexploit.com</a>
                                    </p>
                                    <ul class="mb-2">
                                        <li class="list-inline-item mr-3">
                                            <a href="">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <a href="">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <a href="">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <div class="footer-widget">
                                    <h5 class="widget-title">About us</h5>
                                    <div>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Aenean mattis</a></li>
                                            <li><a href="#">Vestibulum ante</a></li>
                                            <li><a href="#">Sapien etiam</a></li>
                                            <li><a href="#">Morbi eget leo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <div class="footer-widget">
                                    <h5 class="widget-title">Product</h5>
                                    <div>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Vestibulum diam</a></li>
                                            <li><a href="#">Phasellus sapien eros</a></li>
                                            <li><a href="#">Finibus bibendum nulla</a></li>
                                            <li><a href="#">Morbi eget leo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <div class="footer-widget">
                                    <h5 class="widget-title">Contact us</h5>
                                    <p>
                                        <a href="">info@kodexploit.com</a>
                                    </p>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="">
                                                <i class="fab fa-behance" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End main -->
    </div>
    
    <div class="move_top text-center" id="move_top">
        <i class="fas fa-chevron-up"></i>
    </div>

    @include('includes/toast')
    <!-- ================================================== -->

    @section('scripts')
        <script
              src="https://code.jquery.com/jquery-3.5.1.min.js"
              integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
              crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.toast').toast('show');

                $("#move_top").click(function() {
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                });
            });
        </script>
    @show
    {{-- <script type="text/javascript" src="{{ url('assets/') }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/aos.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/jquery.countTo.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/onepage.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/instafeed.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/contact-us.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/plugins/twitterFetcher_min.js"></script>
    <script type="text/javascript" src="{{ url('assets/') }}/js/main.js"></script>

     --}}
</body>

</html>