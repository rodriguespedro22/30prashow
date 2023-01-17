
<?php
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= url("assets/app/css/home.css")?>">
  <title>30prashow</title>
  <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  
  <link href="<?= url("assets/app/"); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= url("assets/app/"); ?>plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="<?= url("assets/app/"); ?>plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Slick Carousel -->
  <link href="<?= url("assets/app/"); ?>plugins/slick/slick.css" rel="stylesheet">
  <link href="<?= url("assets/app/"); ?>plugins/slick/slick-theme.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link rel="icon" href="<?= url("assets/app/images/30.jpg")?>">
  <link rel="stylesheet" href="<?= url("assets/app/fonts/icomoon/style.css")?>">
  <link rel="stylesheet" href="<?= url("assets/app/css/style.css")?>">

  <!-- <link rel="stylesheet" href="<?= url("assets/app/css/bootstrap.min.css")?>"> -->


  <!-- FAVICON -->
  <link href="<?= url("assets/app/"); ?>images/favicon.png" rel="shortcut icon">
 
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
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
          <a href="<?= url("admin"); ?>" class="font-weight-bold text-white prashow">30PRASHOW</a>
          </div>
        </div>

        <div class="col-9  text-right">


          <span class="d-inline-block d-lg-block"><a href="#"
              class="text-black site-menu-toggle js-menu-toggle py-5"><span
                class="icon-menu h3 text-white"></span></a></span>



          <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
              <li><a href=<?= url("admin/"); ?> class="nav-link text-white">Lista de shows</a></li>
              <li><a href="<?= url("admin/cadastrarshow"); ?>" class="nav-link text-white">Registrar novo show</a></li>
              <li><a href="<?= url("admin/usuarios"); ?>" class="nav-link text-white">Lista de usuários</a></li>
              <!-- <li><a href="sobre" class="nav-link text-white">Sobre nós</a></li> -->
              <li><a href="<?= url("admin/sair"); ?>" class="nav-link text-white">Logout</a></li>
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
            <iframe class="iframe" width="560" height="315" src="https://www.youtube.com/embed/WsE3mruRak8" 
              title="YouTube video player" frameborder="0" allow="accelerometer; 
              autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>
        </div>
      </div>
    <div class="container p-4">

      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/pedro.rodriguesdacunha.35/" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/roddriguesspedro/" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/rodriguespedro22" role="button"><i class="fab fa-github"></i></a>
      </section>

      <!-- Section: Text -->

      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-2 mb-md-0 m-auto pb-5">
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
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mb-md-0 m-auto pb-5">
            <h5 class="text-uppercase">Produtora Musical</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">30PRAUM</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 m-auto">
            <h5 class="text-uppercase">Atendimento</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <p href="#!" class="text-white" style="text-shadow: 4px 4px 20px rgba(0,0,0,0.6);">Horário de atendimento:<br/>
                                                08:00 às 20:00 - <br/>
                                                Segunda a Sábado, <br/>
                                                horário de Brasília
              </p>
              </li>
              <li>
                <p class="text-white" style="font-weight: bold">Email:</p>
                <p class="text-white">pedrocunha.ch550@academico.ifsul.edu.br</p>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>

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

    mybutton.addEventListener("click", backToTop);

    function backToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>

  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="<?= url("assets/app/"); ?>plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="<?= url("assets/app/"); ?>plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= url("assets/app/"); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="<?= url("assets/app/"); ?>plugins/smoothscroll/SmoothScroll.min.js"></script>
  <!-- Isotope -->
  <script src="<?= url("assets/app/"); ?>plugins/isotope/mixitup.min.js"></script>
  <!-- Magnific Popup -->
  <script src="<?= url("assets/app/"); ?>plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="<?= url("assets/app/"); ?>plugins/slick/slick.min.js"></script>
  <!-- SyoTimer -->
  <script src="stickyplugins/syotimer/jquery.syotimer.min.js"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script type="text/javascript" src="<?= url("assets/app/"); ?>plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="<?= url("assets/app/"); ?>js/custom.js"></script>

  <script src="<?= url("assets/app/"); ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= url("assets/app/"); ?>js/popper.min.js"></script>
  <script src="<?= url("assets/app/"); ?>js/bootstrap.min.js"></script>
  <script src="<?= url("assets/app/"); ?>js/jquery.sticky.js"></script>
  <script src="<?= url("assets/app/"); ?>js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
</body>

</html>