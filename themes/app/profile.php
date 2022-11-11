<?php
    $this->layout("_theme");
?>
<div class="container rounded bg-white mt-5 mb-5">
    
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="mb-3">
                    <?php
                        if(!empty($user["photo"])):
                    ?>  
                        <img class="ui medium circular image img-thumbnail" id="photoShow" src="<?= url($user["photo"]); ?>" alt="...">
                    <?php
                        endif;
                    ?>
                </div>
                <div class="font-weight-bold" value=""><?=$user["name"];?></div>
                <div class="text-black-50" value=""><?=$user["email"];?></div>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <form enctype="multipart/form-data" method="post" id="formProfile">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome: </label>
                    <input type="text" name="name" class="form-control" id="name" value="<?=$user["name"];?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" class="form-control" id="email" value="<?=$user["email"];?>">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Sua Foto: </label>
                    <input class="form-control" type="file" name="photo" id="photo">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="send">Alterar</button>
                </div>
                <div class="alert alert-primary" role="alert" id="message">
                    Mensagem de Retorno!
                </div>
                
            </form>
        </div>

    </div>
</div>
</div>
</div>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    const message = document.querySelector("#message");
    const photoShow = document.querySelector("#photoShow");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("app/perfil"); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user)
        if(user) {
            if(user.type === "alert-success") {
                photoShow.setAttribute("src",user.photo);
            }
            message.textContent = user.message;
            message.classList.remove("alert-primary", "alert-danger");
            message.classList.add(`${user.type}`);
        }
    });
</script>