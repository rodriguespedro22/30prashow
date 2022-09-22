<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= url("assets/web/css/home.css")?>">
  <title>30prashow - Home</title>
  <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  
  <link href="<?= url("assets/web/"); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= url("assets/web/"); ?>plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="<?= url("assets/web/"); ?>plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Slick Carousel -->
  <link href="<?= url("assets/web/"); ?>plugins/slick/slick.css" rel="stylesheet">
  <link href="<?= url("assets/web/"); ?>plugins/slick/slick-theme.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link rel="icon" href="<?= url("assets/web/images/30.jpg")?>">
  <link rel="stylesheet" href="<?= url("assets/web/fonts/icomoon/style.css")?>">
  <link rel="stylesheet" href="<?= url("assets/web/css/bootstrap.min.css")?>">
  <link rel="stylesheet" href="<?= url("assets/web/css/style.css")?>">

  <!-- FAVICON -->
  <link href="<?= url("assets/web/"); ?>images/favicon.png" rel="shortcut icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
</head>

<body class="body-wrapper">





  <!--========================================
=            Navigation Section            =
=========================================-->
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>



  <header class="site-navbar site-navbar-target py-4" role="banner">

    <div class="container">
      <div class="row align-items-center position-relative">

        <div class="col-3">
          <div class="site-logo">
          <a href="http://www.localhost/30prashow/" class="font-weight-bold text-white prashow">30PRASHOW</a>
          </div>
        </div>

        <div class="col-9  text-right">


          <span class="d-inline-block d-lg-block"><a href="#"
              class="text-black site-menu-toggle js-menu-toggle py-5"><span
                class="icon-menu h3 text-white"></span></a></span>



          <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
              <li><a href="sobre" class="nav-link">Sobre nós</a></li>
              <li><a href="login" class="nav-link">Faça o login</a></li>
              <li><a href="cadastro" class="nav-link">Faça seu cadastro</a></li>
              <li><a href="contato" class="nav-link">Contato</a></li>
            </ul>
          </nav>
        </div>


      </div>
    </div>

  </header>

  <?php echo $this->section("content"); ?>

  <!--============================
=            Footer            =
=============================-->

  <footer class="bg-dark text-center text-white mt-5">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <div class="ratio ratio-16x9" style="margin-top: 50px;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/WsE3mruRak8" 
              title="YouTube video player" frameborder="0" allow="accelerometer; 
              autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>
        </div>
      </div>
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/pedro.rodriguesdacunha.35/" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <!-- <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/rodriguespedro22" role="button"><i class="fab fa-twitter"></i></a> -->

        <!-- Google -->
        <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a> -->

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/roddriguesspedro/" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a> -->

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/rodriguespedro22" role="button"><i class="fab fa-github"></i></a>
      </section>

      <!-- Section: Text -->

      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 m-auto">
            <h5 class="text-uppercase">Cantores</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Teto</a>
              </li>
              <li>
                <a href="#!" class="text-white">Matue</a>
              </li>
              <li>
                <a href="#!" class="text-white">Wiu</a>
              </li>
              <!-- <li> -->
                <!-- <a href="#!" class="text-white">Link 4</a> -->
              <!-- </li> -->
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-md-0 m-auto pb-5">
            <h5 class="text-uppercase">Produtora Musical</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">30PRAUM</a>
              </li>
              <li>
                <!-- <a href="#!" class="text-white">Link 2</a> -->
              </li>
              <li>
                <!-- <a href="#!" class="text-white">Link 3</a> -->
              </li>
              <li>
                <!-- <a href="#!" class="text-white">Link 4</a> -->
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <!-- <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div> -->
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 m-auto">
            <h5 class="text-uppercase">Atendimento</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Horário de Atendimento<br/>
              </a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <!-- <a href="#!" class="text-white">Link 4</a> -->
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright: 30PRAUM
    </div>
    <!-- Copyright -->
  </footer>

  <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- -------BACK TO TOP------- -->
  <script>
    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction();
    };

    function scrollFunction() {
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="<?= url("assets/web/"); ?>plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="<?= url("assets/web/"); ?>plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= url("assets/web/"); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="<?= url("assets/web/"); ?>plugins/smoothscroll/SmoothScroll.min.js"></script>
  <!-- Isotope -->
  <script src="<?= url("assets/web/"); ?>plugins/isotope/mixitup.min.js"></script>
  <!-- Magnific Popup -->
  <script src="<?= url("assets/web/"); ?>plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="<?= url("assets/web/"); ?>plugins/slick/slick.min.js"></script>
  <!-- SyoTimer -->
  <script src="<?= url("assets/web/"); ?>plugins/syotimer/jquery.syotimer.min.js"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script type="text/javascript" src="<?= url("assets/web/"); ?>plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="<?= url("assets/web/"); ?>js/custom.js"></script>

  <script src="<?= "assets/web/js/jquery-3.3.1.min.js"?>"></script>
  <script src="<?= "assets/web/js/popper.min.js"?>"></script>
  <script src="<?= "assets/web/js/bootstrap.min.js"?>"></script>
  <script src="<?= "assets/web/js/jquery.sticky.js"?>"></script>
  <script src="<?= "assets/web/js/main.js"?>"></script>
</body>

</html>