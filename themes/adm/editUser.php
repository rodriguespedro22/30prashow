<?php
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("assets/web/css/cadastro.css")?>">
    <link rel="script" href="<?= url("assets/web/scripts/scripts.js")?>">
    <script src="https://kit.fontawesome.com/030be0d712.js" crossorigin="anonymous"></script>
    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>30prashow</title>
    <link rel="icon" href="<?= url("assets/web/images/30.jpg")?>">

</head>

<body class="bg-image">
    <div class="container">
        <div class="formularioLogin">

            <!--        <div class="text">30PRASHOW</div>-->

            <form id="form-register" novalidate>
                <div class="formularioInput">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?=$user->name?>">
                </div>
                <div class="formularioInput">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?=$user->email?>">
                </div>
                <div class="sucess formularioInput" id="message">
                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                </div>

                <div class="formularioInput">
                    <input class="button" type="submit" value="Atualizar" onClick="window.location.reload()">
                </div>

            </form>
        </div>

        <div class="imgCadastro">
            <div class="text">30PRASHOW</div>
            <img src="<?= url("assets/app/")?>images/teto.png">>
        </div>

    </div>


    <script type="text/javascript" async>
    const form = document.querySelector("#form-register");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);

        const data = await fetch("<?= url("admin/editaruser/id?id=" . $user->id); ?>",{
            method: "POST",
            body: dataUser,
        });
        console.log(data);
        const user = await data.json();
        console.log(user);
    });
</script>
</body>

</html>