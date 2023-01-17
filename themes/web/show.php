<?php
$this->layout("_theme",["categories" => $categories]);
?>
<link href="<?= url("assets/web/"); ?>css/show.css" rel="stylesheet">
<div class="col-11 m-auto row row-cols-1 row-cols-md-3 g-4 mt-1">



    <!-- <div class="col">
        <div class="card">
            <div class="card-img-adjust mt-0">
                <img src="<?= url($show->image); ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $show->day; ?></h5>
                <h5 class="card-title"><?= $show->name; ?></h5>
                <h5 class="card-title"><?= $show->local; ?></h5>
                <div class="d-grid gap-2 d-md-block">
                    <?php
                          foreach ($categories as $category){
                            if($category->id == $show->idCategory){
                    ?>
                    <button type="button" class="btn btn-outline-secondary"
                        disabled><?=  $category->singers; ?></button>
                    <?php
                          }
                        }
                          ?>
                    <!-- <button type="button" class="btn btn-outline-secondary" disabled>Preço</button> -->
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> --> 

    <main class="flex-shrink-0">
            <!-- Header-->
            <header class="bg-colorido py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"><?= $show->name; ?></h1>
                                <p class="lead fw-normal text-white-50 mb-4"><?= $show->day; ?>
                                <br/>
                                <?= $show->local; ?>
                                </p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/30prashow/login">Comprar ingresso</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="boxshadow img-fluid rounded-3 my-5" src="<?= url($show->image); ?>" alt="..." /></div>
                    </div>
                </div>
            </header>
        </main>
</div>