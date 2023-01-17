<?php
    $this->layout("_theme");
?>
<link rel="stylesheet" href="<?= url("assets/app/css/perfil.css")?>">
<div class="container rounded bg-white">

    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <div class="mb-3">
                    <?php
                        if(!empty($user->photo)):
                    ?>
                        <img class="ui medium circular image img-thumbnail" id="photouser" src="<?= url($user->photo); ?>" alt="...">
                    <?php
                        else:
                    ?>
                        <img class="ui medium circular image img-thumbnail" id="photouser" src="<?= url("assets/app/images/user-photo-null.jpg"); ?>"alt="...">
                    <?php
                        endif;
                    ?>
                </div>
                <div class="font-weight-bold" value=""><?= $user->name; ?></div>
                <div class="font-weight-bold" value=""><?= $user->email; ?></div>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <form enctype="multipart/form-data" method="post" id="formProfile">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome: </label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $user->name; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $user->email; ?>">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagem: </label>
                    <input class="form-control" type="file" name="photo" id="photo">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="send">Atualizar</button>
                    <button type="submit" class="btn btn-primary" name="send"><a href="<?= url("admin/deletaruser/id?id=" . $user->id)?>">Deletar</a></button>
                </div>


            </form>
        </div>
    </div>
</div>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("admin/editaruser/id?id=" . $user->id); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user)
    });
</script>
