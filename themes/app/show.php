<?php
$this->layout("_theme",["categories" => $categories]);
?>
<div class="col-11 m-auto row row-cols-1 row-cols-md-3 g-4 mt-1">
      
    
  
    <div class="col">
        <div class="card">
        <div class="card-body pb-2">                
          <div class="form-check form-check-inline">
            <h5 class="mb-0 me-5">Autor</h5>
          </div>
          <div class="form-check form-check-inline">
          </div>
        </div>
          <div class="card-img-adjust mt-0">
            <img src="<?= url($show->image); ?>" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $show->name; ?></h5>
            <div class="d-grid gap-2 d-md-block">
              <a class="btn btn-dark" type="button">Favoritar</a>
              ?>
              <?php
                          foreach ($categories as $category){
                            if($category->id == $show->idCategory){
                          ?>
              <button type="button" class="btn btn-outline-secondary" disabled><?=  $category->singers; ?></button>
              <?php
                          }
                        }
                          ?>
                           <a class="btn btn-dark ps-4 pe-4 ms-5" type="button" href="<?= url("app/show/id?id=" . $show->id)?>">
                           <i class="fa-solid fa-circle-info"></i>
            </a>
              <!-- <button type="button" class="btn btn-outline-secondary" disabled>Preço</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>