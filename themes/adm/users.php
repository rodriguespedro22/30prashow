<?php
$this->layout("_theme");
?>
<link rel="stylesheet" href="<?= url("assets/adm/css/users.css")?>">



    <div class="m-auto col-10 row row-cols-1 row-cols-md-3 g-4 mt-4">
    
    <?php
        foreach ($users as $user)
        {
    ?>
  <a href="<?= url("admin/editaruser/id?id=" . $user->id)?>">
    <div class="col">
      <div class="card">
        <div class="card-img-adjust">
          <img src="<?= url($user->photo); ?>" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-text"><?= $user->name; ?></h5>
          <p class="card-text text-black font-weight-bold"><?= $user->email; ?></p>

        </div>
      </div>
    </div>
  </a>
    <?php 

      }
    ?>
  </div>