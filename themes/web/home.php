<?php
  $this->layout("_theme",["categories" => $categories]);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= url("assets/web/css/home.css")?>">
  <link rel="script" href="../../assets/web/scripts/script.js">

  <!-- <link href="<?= url("/assets/web/"); ?>Semantic-UI-CSS/semantic.min.css" rel="stylesheet"> -->
  <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

  <!-- <link rel="script" href="<?= url("assets/web/"); ?>Semantic-UI-CSS/semantic.js"> -->
  <!-- <script src="../../assets/web/Semantic-UI-CSS/semantic.min.js"></script> -->
  <!-- <script type="text/javascript" src="<?= url("assets/web/"); ?>Semantic-UI-CSS/semantic.min.js"> </script>  -->

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

            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                        <?php
                        foreach ($categories as $category){
                        ?>
                        <li>
                        <a class="dropdown-item" href="<?= url("shows/{$category->id}"); ?>">
                          <?= $category->singers; ?></a>
                        </li>
                        <?php
                        }
                        ?>
              </ul>
            </div>
  <div class="m-auto col-10 row row-cols-1 row-cols-md-3 g-4 mt-4">
    
    <?php
        foreach ($shows as $show)
        {
    ?>
    
  <a href="<?= url("show/id?id=" . $show->id)?>">
    <div class="col">
      <div class="card">

        <div class="card-img-adjust">
          <img src="<?= $show->image; ?>" class="card-img-top" alt="...">
        </div>

        <div class="card-body">
          <h5 class="card-text"><?= $show->day; ?></h5>
          <p class="card-text text-black font-weight-bold"><?= $show->name; ?></p>
          <?php
              foreach ($addresses as $address){
            if ($address->idShow == $show->id) {
              ?>
          <div class="d-grid gap-2 d-md-block">
            <p class="card-text"><small class="text-muted"><?= $address->city; ?>, <?= $address->state; ?></small></p>
          </div>
<?php
            }
          }
                        ?>
          <div class="d-grid gap-2 d-md-block">
          <?php
                        foreach ($categories as $category){
                          if($category->id == $show->idCategory){
                        ?>
            <p class="card-text"><small class="text-muted"><?= $category->singers;?></small></p>
            <?php
                        }
                      }
                        ?>
          </div>
          
        </div>
      </div>
    </div>
  </a>

    <?php 

    }
    ?>
    
  </div>
  <!-- </div> -->


</body>

</html>