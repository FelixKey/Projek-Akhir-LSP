<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <!-- Title -->
    <title>Home</title>

    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bootstrap HTML template and UI kit by Tektonthemes">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/vendor/fullPage.js/dist/jquery.fullpage.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/slick/slick.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/vegas/vegas.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/magnific-popup/dist/magnific-popup.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/themify-icons/css/themify-icons.css" type="text/css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body class="layout-wide">

    <!-- Loader -->
    <div class="loader bg-dark">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div id="top"></div>

    <!-- Site navigation -->
    <nav class="site-navbar site-navbar-transparent navbar navbar-expand-lg navbar-dark fixed-top bg-white shadow-light p-lg-4" data-navbar-base="navbar-dark" data-navbar-toggled="navbar-light" data-navbar-scrolled="navbar-light">

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="assets/images/" class="navbar-brand-img" alt="">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler-alternative" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-alternative-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Navigation -->
            <ul class="navbar-nav ml-auto" id="navigation">
                <li class="nav-item active" data-menuanchor="home">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item" data-menuanchor="pendaftaran">
                    <a class="nav-link" href="#our-mission">Pendaftaran</a>
                </li>
                <li class="nav-item" data-menuanchor="login">
                    <a class="nav-link" href="#contact">Masuk</a>
                </li>
            </ul>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

    <!-- Back To Top Button -->
    <a href="#top" class="backtotop">
        <span>Back To Top</span>
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Footer -->
    <footer class="position-relative py-10 py-lg-12 bg-dark text-gray-500">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-12 col-xxl-10 mx-auto text-center">
                    <ul class="list-inline mb-5">
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-facebook-f btn-icon-inner"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-twitter btn-icon-inner"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-linkedin-in btn-icon-inner"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-dribbble btn-icon-inner"></i>
                            </a>
                        </li>
                    </ul>
                    <p class="mb-0">© 2023 Lana - All Rights Reserved - <a href="#!" class="text-gray-400">Terms of Service</a></p>
                </div>
            </div>
        </div>
    </footer><!-- footer end -->

    <!-- Fullpage - Social icons -->
    <nav class="ln-social-icons">
        <ul class="mx-auto">
            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#!"><i class="fab fa-pinterest"></i></a></li>
        </ul>
    </nav>

    <!-- Fullpage - Copyright -->
    <div class="ln-copyright text-right">
        <p>© 2023 Lana - All Rights Reserved - <a href="#!">Terms of Service</a></p>
    </div>


    <!-- Libs JS -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendor/fullPage.js/dist/scrolloverflow.min.js"></script>
    <script src="assets/vendor/fullPage.js/dist/jquery.fullpage.min.js"></script>
    <script src="assets/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/jquery-smooth-scroll/jquery.smooth-scroll.min.js"></script>
    <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/vendor/jquery-form/dist/jquery.form.min.js"></script>
    <script src="assets/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor/jQuery.countdown/dist/jquery.countdown.min.js"></script>
    <script src="assets/vendor/granim.js/dist/granim.min.js"></script>
    <script src="assets/vendor/slick/slick.min.js"></script>
    <script src="assets/vendor/vegas/vegas.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>