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
                        if(!empty($show->image)):
                    ?>
                        <img class="ui medium circular image img-thumbnail" id="photoShow" src="<?= url($show->image); ?>" alt="...">
                    <?php
                        else:
                    ?>
                        <img class="ui medium circular image img-thumbnail" id="photoShow" src="<?= url("assets/app/images/user-photo-null.jpg"); ?>"alt="...">
                    <?php
                        endif;
                    ?>
                </div>
                <div class="font-weight-bold" value=""><?= $show->day; ?></div>
                <div class="font-weight-bold" value=""><?= $show->name; ?></div>
                <div class="text-black-50" value=""><?= $show->local; ?></div>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <form enctype="multipart/form-data" method="post" id="formProfile">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome: </label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $show->name; ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Local: </label>
                    <input type="text" name="local" class="form-control" id="local" value="<?= $show->local; ?>">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="send"
                        >Atualizar</button>
                </div>


            </form>
        </div>
    </div>
</div>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("admin/editarshow/id?id=" . $show->id); ?>",{
            method: "POST",
            body: dataUser,
        });
        // console.log(data);
        const show = await data.json();
        console.log(show)
    });
</script>
