<?php
$this->layout("_theme");
?>
<link rel="stylesheet" href="<?= url("assets/adm/css/users.css")?>">

<div class="col-11 m-auto row row-cols-1 row-cols-md-3 g-4 mt-1">
      
    
      <?php
          foreach ($users as $user)
          {
      ?>
  
    <a href="<?= url("admin/editaruser/id?id=" . $user->id)?>">
      <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="mb-3">
                    <?php
                        if(!empty($user->photo)):
                    ?>
                        <img class="ui medium circular image img-thumbnail" id="photoShow" src="<?= url($user->photo); ?>" alt="...">
                    <?php
                        else:
                    ?>
                        <img class="ui medium circular image img-thumbnail" id="photoShow" src="<?= url("assets/app/images/user-photo-null.jpg"); ?>"alt="...">
                    <?php
                        endif;
                    ?>
                </div>
                <div class="font-weight-bold" value=""><?= $user->name; ?></div>
                <div class="text-black-50" value=""><?= $user->email; ?></div>
            </div>
        </div>
    </a>
      <?php
          }
      ?>
    </div>