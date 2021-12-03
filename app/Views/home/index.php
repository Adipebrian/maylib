<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>

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
                  <a class="nav-link" href="/" style="color: #E7E7E8;">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#cta">Get Started</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about">About Us</a>
                </li>
              </ul>
            </div>
            <?php if (logged_in()) : ?>
              <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
                <a href="/logout" class="btn btn-default btn-no-fill">Logout</a>
                <a href="/user" class="btn btn-fill border-0 text-white">Dashboard</a>
              </div>
            <?php else : ?>
              <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
                <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
                <a href="/register" class="btn btn-fill border-0 text-white">Register</a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/" style="color: #E7E7E8;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cta">Get Started</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About Us</a>
          </li>
        </ul>
        <?php if (logged_in()) : ?>
          <div class="gap-3">
            <a href="/logout" class="btn btn-default btn-no-fill">Logout</a>
            <a href="/user" class="btn btn-fill text-white border-0">Dashboard</a>
          </div>
        <?php else : ?>
          <div class="gap-3">
            <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
            <a href="/register" class="btn btn-fill text-white border-0">Register</a>
          </div>
        <?php endif; ?>
      </div>
    </nav>

    <div>
      <div class="mx-auto d-flex flex-lg-row flex-column hero">
        <!-- Left Column -->
        <div class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-stretch text-center">
          <!-- <p class="text-caption">FREE 30 DAY TRIAL</p> -->
          <h1 class="title-text-big text-md-left">the quickest and best way to manage your library data</h1>
          <div class="d-flex flex-sm-row flex-column align-items-center mx-lg-0 mx-auto justify-content-center gap-3">
            <a href="/maylib" class="btn d-inline-flex mb-md-0 btn-try text-white border-0">Try it free</a>
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

<!-- START : PARTNERS -->
<section class="partners">
  <div class="container">
    <div class="row brand">
      <div class="col-md-3 col-6 text-center my-md-auto">
        <img src="<?= base_url() ?>/home/images/partners/perpus.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-md-3 col-6 text-center my-md-auto">
        <img src="<?= base_url() ?>/home/images/partners/itcs.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-md-3 col-6 text-center my-md-auto mt-5 mt-md-0">
        <img src="<?= base_url() ?>/home/images/partners/ditlance 1.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-md-3 col-6 text-center my-md-auto mt-5 mt-md-0">
        <img src="<?= base_url() ?>/home/images/partners/inotal.jpg " alt="" class="img-fluid">
      </div>
    </div>
  </div>
</section>
<!-- END : PARTNERS -->



<!-- START : 3 BENEFITS -->
<section class="benefits h1-00 w-100 bg-white" style="box-sizing: border-box">
  <div class="content-3-2 container mx-auto  position-relative" style="font-family: 'Poppins', sans-serif">
    <div class="d-flex flex-lg-row flex-column align-items-center">
      <!-- Left Column -->
      <div class="d-flex img-hero text-center justify-content-center">
        <img id="hero" class="img-fluid" src="<?= base_url() ?>/home/images/choose.svg" alt="" style="max-height: 400px;">
      </div>

      <!-- Right Column -->
      <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
        <h2 class="title-text">Why Choose Us?</h2>
        <ul style="padding: 0; margin: 0">
          <li class="list-unstyled" style="margin-bottom: 2rem">
            <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <span class="circle text-white d-flex align-items-center justify-content-center">
                1
              </span>
              Data Management
            </h4>
            <p class="text-caption">
              We manage your library data neatly and easy to view,<br class="d-sm-inline d-none" />edit and more
            </p>
          </li>
          <li class="list-unstyled" style="margin-bottom: 2rem">
            <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <span class="circle text-white d-flex align-items-center justify-content-center">
                2
              </span>
              Easy and Fast
            </h4>
            <p class="text-caption">
              The web application that we made is easy to use and <br class="d-sm-inline d-none" /> the process is quite fast
            </p>
          </li>
          <li class="list-unstyled" style="margin-bottom: 4rem">
            <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <span class="circle text-white d-flex align-items-center justify-content-center">
                3
              </span>
              Point Achievement
            </h4>
            <p class="text-caption">
              We provide reward features for your best customers
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- END : 3 BENEFITS -->



<!-- START : WHAT WE DO  -->
<section class="what-we-do">
  <div class="h-100 w-100" style="box-sizing: border-box;">
    <div class="header-4-3 container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins', sans-serif;">
      <div>
        <div class="mx-auto d-flex flex-lg-row flex-column hero">
          <!-- Left Column -->
          <div class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
            <h2 class="title-text d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center mb-5">
              What We Do?
            </h2>
            <p class="text-caption text-justify">
              "MayLib – Modern School Library Management" is a website-based application that can manage online library book lending. We can process data in a structured and fast way. So that it is not difficult for customers to manage their library data. We also provide various features that make it easier for you to manage library data.
            </p>
          </div>
          <!-- Right Column -->
          <div class="right-column text-center d-flex justify-content-lg-end justify-content-center pe-0">
            <img id="img-fluid" class="h-auto mw-100" src="<?= base_url() ?>/home/images/whatweddo.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END : WHAT WE DO  -->



<!-- START: PRODUCTS -->
<section class="products">
  <div class="porto" style="background-color: #141432;">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-10">
          <h4 class="headline">
            Outputs from Our Platform
          </h4>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p class="sub-headline">
            Our platform is specialized for managing online book lending.<br>
            The data is neatly organized and easy to process
          </p>
        </div>
      </div>
      <div class="row porto-img">
        <div class="col-4">
          <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/porto-1.png" class="img-fluid" />
        </div>
        <div class="col-4 d-flex align-items-end flex-column">
          <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/porto-2.png" class="img-fluid">
          <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/porto-3.png" class="img-fluid mt-auto" />
        </div>
        <div class="col-4">
          <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/porto-4.png" class="img-fluid" />
        </div>
      </div>
    </div>

  </div>
</section>
<!-- END: PRODUCTS -->



<!-- START : CONTACT US  -->
<section class="contact-us" id="cta">

  <div class="container">
    <div class="row d-block mx-0">
      <div class="headline font-red-hat-display">
        Faster and Easier Managing Online Book Lending Start Now!
      </div>
    </div>
    <div class="d-flex flex-sm-row flex-column align-items-center mx-lg-0 mx-auto justify-content-center gap-3 mt-5">
      <a href="/maylib" class="btn d-inline-flex mb-md-0 btn-try text-white border-0">Try it free</a>
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
</section>
<!-- END : CONTACT US -->


<?= $this->endSection() ?>