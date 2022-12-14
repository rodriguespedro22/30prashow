<?php
  $this->layout("_theme");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= url("assets/web/css/home.css")?>">
  <link rel="script" href="../../assets/web/scripts/script.js">

  <link rel="stylesheet" type="text/css" href="<?= url("assets/app/semanticCSS/semantic.min.css")?>">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="<?= "assets/app/semanticCSS/semantic.min.js"?>"></script>

  <title>30prashow | Home</title>
</head>

<body>
  <!-- Carro Céu -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade m-auto col-md-13" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= url("assets/web/")?>images/teto111.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= url("assets/web/")?>images/tetoshow.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= url("assets/web/")?>images/matueshow.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Boxes de contéudo -->

  <h4 class="ui header">Inline</h4>
<p>A dropdown can be formatted to appear inline in other content</p>
<span>
  Show me posts by
  <div class="ui inline dropdown">
    <div class="text">
      <img class="ui avatar image" src="/images/avatar/small/jenny.jpg">
      Jenny Hess
    </div>
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="item">
        <img class="ui avatar image" src="/images/avatar/small/jenny.jpg">
        Jenny Hess
      </div>
      <div class="item">
        <img class="ui avatar image" src="/images/avatar/small/elliot.jpg">
        Elliot Fu
      </div>
      <div class="item">
        <img class="ui avatar image" src="/images/avatar/small/stevie.jpg">
        Stevie Feliciano
      </div>
      <div class="item">
        <img class="ui avatar image" src="/images/avatar/small/christian.jpg">
        Christian
      </div>
      <div class="item">
        <img class="ui avatar image" src="/images/avatar/small/matt.jpg">
        Matt
      </div>
      <div class="item">
        <img class="ui avatar image" src="/images/avatar/small/justen.jpg">
        Justen Kitsune
      </div>
    </div>
  </div>
</span>

  <!-- <div class="m-auto card-deck mt-5 mb-5 col-md-9"> -->
  <div class="m-auto col-10 row row-cols-1 row-cols-md-3 g-4 mt-4">
    
    <?php
        foreach ($shows as $show)
        {
    ?>
    <!-- <div class="card">
      <img class="card-img-top card-img-adjust" src=<?=$show->image;?> alt="Card image cap">
      <div class="card-body">
        <p class="card-text"><?=$show->day;?></p>
        <h5 class="card-title"><?=$show->name;?></h5>
        <p class="card-text"><small class="text-muted"><?= $show->local;?></small></p>
      </div>
    </div> -->
    <div class="col">
      <div class="card">
        <div class="card-img-adjust">
          <img src="<?= $show->image; ?>" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-text"><?= $show->day; ?></h5>
          <p class="card-text text-black font-weight-bold"><?= $show->name; ?></p>
          <div class="d-grid gap-2 d-md-block">
            <p class="card-text"><small class="text-muted"><?= $show->local;?></small></p>
          </div>
        </div>
      </div>
    </div>
    <?php 

      }
    ?>
  </div>
  <!-- </div> -->


</body>

</html>