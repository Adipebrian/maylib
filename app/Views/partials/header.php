<!-- START : HEADER -->
<header class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
    <div class="header-4-3 container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins', sans-serif;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a href="#">
                <img style="margin-right:0.75rem" src="<?= base_url() ?>/home/images/MayLib.png" alt="">
                <!-- http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png -->
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content border-0" style="background-color: #141432;">
                        <div class="modal-header border-0" style="padding:	2rem; padding-bottom: 0;">
                            <a class="modal-title" id="targetModalLabel">
                                <img style="margin-top:0.5rem" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png" alt="">
                            </a>
                            <button type="button" class="close btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                            <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html" style="color: #E7E7E8;">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#cta">Get Started</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
                            <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
                            <a href="/register" class="btn btn-fill border-0 text-white">Register</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html" style="color: #E7E7E8;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cta">Get Started</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                </ul>
                <div class="gap-3">
                    <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
                    <a href="/register" class="btn btn-fill text-white border-0">Register</a>
                </div>
            </div>
        </nav>

        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero">
                <!-- Left Column -->
                <div class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-stretch text-center">
                    <!-- <p class="text-caption">FREE 30 DAY TRIAL</p> -->
                    <h1 class="title-text-big text-md-left">the quickest and best way to manage your library data</h1>
                    <div class="d-flex flex-sm-row flex-column align-items-center mx-lg-0 mx-auto justify-content-center gap-3">
                        <a href="search-book.html" class="btn d-inline-flex mb-md-0 btn-try text-white border-0">Try it free</a>
                        <a href="youtube.com" class="btn btn-outline">
                            <div class="d-flex align-items-center">
                                <svg class="me-2" width="13" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.9293 8L6.66668 5.158V10.842L10.9293 8ZM12.9173 8.27734L5.85134 12.988C5.80115 13.0214 5.74283 13.0406 5.6826 13.0435C5.62238 13.0463 5.5625 13.0328 5.50934 13.0044C5.45619 12.9759 5.41175 12.9336 5.38075 12.8818C5.34976 12.8301 5.33337 12.771 5.33334 12.7107V3.28934C5.33337 3.22904 5.34976 3.16989 5.38075 3.11817C5.41175 3.06645 5.45619 3.0241 5.50934 2.99564C5.5625 2.96719 5.62238 2.95368 5.6826 2.95656C5.74283 2.95944 5.80115 2.9786 5.85134 3.012L12.9173 7.72267C12.963 7.75311 13.0004 7.79435 13.0263 7.84273C13.0522 7.89111 13.0658 7.94513 13.0658 8C13.0658 8.05488 13.0522 8.1089 13.0263 8.15728C13.0004 8.20566 12.963 8.2469 12.9173 8.27734Z" fill="#707092" />
                                </svg>
                                Watch Demo Video
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="right-column text-center d-flex justify-content-lg-center justify-content-center pe-0 align-items-center">
                    <img id="img-fluid" class="h-auto mw-100" src="<?= base_url() ?>/home/images/books.svg">
                </div>

            </div>
        </div>
    </div>
</header>
<!-- END : HEADER -->