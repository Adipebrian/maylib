<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MayLib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/home/style/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/style/search-book.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/style/style-basic.css">
</head>

<body>


    <?= $this->renderSection('content') ?>

    <!-- START : FOOTER -->
    <footer class="page-footer font-small blue border-top">
        <div class="container text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3 address">
                    <img src="<?= base_url() ?>/home/images/MayLib-black.png" alt="logo" class="img-fluid mb-2">
                    <p>Jl. Kh. Wahid Hasyim No.76, <br> Cirebon, Jawa Barat 45183</p>
                    <div class="mt-md-5 social-media">
                        <a href="#">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/bi_linkedin.svg" alt="linkedin" class="img-fluid">
                        </a>
                        <a href="#">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/bi_facebook.svg" alt="facebook" class="img-fluid">
                        </a>
                        <a href="#">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-workly/bi_twitter.svg" alt="twitter" class="img-fluid">
                        </a>
                    </div>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="row col-md-6 nav-footer">
                    <div class="col-md-4 mb-md-0 mb-3">
                        <p>
                            Our Features
                        </p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Adaptive</a>
                            </li>
                            <li>
                                <a href="#!">Faster</a>
                            </li>
                            <li>
                                <a href="#!">Integrated</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-md-0 mb-3">
                        <p>
                            Company
                        </p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">About Us</a>
                            </li>
                            <li>
                                <a href="#!">Blog</a>
                            </li>
                            <li>
                                <a href="#!">Join Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-md-0 mb-3">
                        <p>
                            Help
                        </p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">API Documentation</a>
                            </li>
                            <li>
                                <a href="#!">System Status</a>
                            </li>
                            <li>
                                <a href="#!">Talk to Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright row d-flex justify-content-center mx-0">
            <p class="text-center">
                2021 MayLib - SKENSALA | All rights reserved.
            </p>
        </div>
    </footer>
    <!-- END : FOOTER -->


    <script>
        function coloringgoals(x) {
            x.classList.add('bg-silver');
            x.classList.add('rounded-24');
            x.classList.add('shadow');
            x.classList.remove('shadow-sm');

        }

        function normalgoals(x) {
            x.classList.remove('bg-silver');
            x.classList.remove('rounded-24');
            x.classList.remove('shadow');
            x.classList.add('shadow-sm');

        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>/myscript/script.js"></script>
</body>

</html>