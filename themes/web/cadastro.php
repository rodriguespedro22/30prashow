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
    <title>30prashow | Cadastro</title>
    <link rel="icon" href="<?= url("assets/web/images/30.jpg")?>">
    <link>
</head>

<body class="bg-image">
    <div class="container">
        <div class="formularioLogin">

            <!--        <div class="text">30PRASHOW</div>-->

            <form id="form-register" novalidate>

                <div class="formularioInput">
                    <i class="fa-solid fa-spell-check"></i>
                    <input type="text" name="name" value="" placeholder="Nome completo" required>
                </div>

                <!-- <div class="formularioInput">
                    <i class="fa-solid fa-arrow-up-1-9"></i>
                    <input type="text" placeholder="Idade" required>
                </div> -->

                <div class="formularioInput">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" value="" placeholder="Email" required>
                </div>

                <div class="formularioInput">
                    <i id="toggler" class="fa-solid fa-eye-slash"></i>
                    <input type="password" name="password" id="fakePassword" placeholder="Senha" required>
                </div>

                <!-- <div class="formularioInput">
                    <i class="fa-solid fa-eye-slash"></i>
                    <input type="password"placeholder="Repita a senha" required>
                </div> -->

                <!-- <div class="formularioInput">
                    <input type="number" placeholder="Telefone (opcional)">
                    <i class="fa-solid fa-phone"></i>
                </div> -->

                <!-- <div class="formularioInput">
                    <i class="fa-solid fa-person"></i>
                    <input type="text" placeholder="Cpf (opcional)">
                </div> -->

                <!-- <div class="formularioInput">
                    <i class="fa-regular fa-building"></i>
                    <input type="text" placeholder="Cep (opcional)">
                </div> -->

                <div class="formularioInput">
                    <input class="button" type="submit" value="Criar">
                </div>

                <div class="redesSociais">
                    <i class="fa fa-github"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-facebook"></i>
                </div>

                <div class="criarConta">
                    Já possui uma conta? <a href="login"><b></br>Faça o login</b></a>
                </div>
                <div class="col-12" id="message">
                    <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                </div>

            </form>
        </div>

        <div class="imgCadastro">
            <div class="text">30PRASHOW</div>
            <img src="<?= url("assets/web/")?>images/teto.png">>
        </div>

    </div>

    <script src="<?= "assets/web/scripts/scripts.js" ?>"></script>

    <script type="text/javascript" async>
        const form = document.querySelector("#form-register"); // id do formulário
        const message = document.querySelector("#message"); // id da div message
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const dataUser = new FormData(form);
            // enviar para a rota já definida
            const data = await fetch("<?= url("cadastro " ); ?>", {
                    method: "POST",
                    body: dataUser,
                });
            const user = await data.json();
            console.log(user);
            // tratamento da mensagem
            if (user) {
                message.innerHTML = user.message;
                message.classList.remove("success", "warning", "error");
                message.classList.add("message");
                message.classList.add(`${user.type}`);
            }
        });
    </script>
</body>

</html>