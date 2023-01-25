<?php
  $this->layout("_theme",["categories" => $categories]);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= url("assets/app/css/home.css")?>">

  <title>30prashow | Home</title>
</head>

<body>
  <!-- Carro Céu -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade m-auto col-md-13" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= url("assets/app/")?>images/teto111.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= url("assets/app/")?>images/tetoshow.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= url("assets/app/")?>images/matueshow.jpg" class="d-block w-100" alt="...">
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

  <div class="m-auto col-10 row row-cols-1 row-cols-md-3 g-4 mt-4">
    
    <?php
        foreach ($shows as $show)
        {
    ?>
  <a href="<?= url("admin/editarshow/id?id=" . $show->id)?>">
    <div class="col">
      <div class="card">
        <div class="card-img-adjust">
          <img src="<?= url($show->image) ?>" class="card-img-top" alt="...">
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

</body>

</html>