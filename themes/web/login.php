<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("assets/web/css/login.css")?>">
    <!-- <script src="<?= "assets/web/scripts/scripts.js" ?>"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>30prashow | Login</title>
    <link rel="icon" href="<?= url("assets/web/images/30.jpg")?>">
    <link>
</head>

<body class="bg-image">
    <div id="intro" class="shadow-2-strong">
        <div class="container">
            <div class="formularioLogin">

                <div class="text">30PRASHOW</div>

                <form id="form-login" novalidate>

                    <div class="formularioInput">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" value="" placeholder="Email" required>
                    </div>

                    <div class="formularioInput">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" value="" placeholder="Senha" required>
                    </div>

                    <div class="formularioInput">
                        <input class="button" type="submit" value="Entrar">
                    </div>

                    <div id="message">
                        <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                    </div>

                    <!-- <div class="esqueceuSenha"> <a href="#">Esqueceu sua senha?</a> </div> -->

                    <div class="redesSociais">
                        <i class="fa fa-github"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-facebook"></i>
                    </div>

                    <div class="criarConta">
                        Nao possui uma conta? <a href="cadastro"><b>Crie uma agora</b></a>
                    </div>

                </form>

                <script type="text/javascript" async>
                    const form = document.querySelector("#form-login");
                    const message = document.querySelector("#message");
                    form.addEventListener("submit", async (e) => {
                        e.preventDefault();
                        const dataUser = new FormData(form);
                        const data = await fetch("<?= url("login"); ?>", {
                                method: "POST",
                                body: dataUser,
                            });
                        const user = await data.json();
                        console.log(user);
                        if (user) {
                            if (user.message === "message") {
                                message.innerHTML = user.message + ` Olá, ${user.name}!`;
                            } else {
                                message.innerHTML = user.message;
                            }
                            message.classList.add("message");
                            message.classList.remove("success", "warning", "error");
                            message.classList.add(`${user.type}`);
                            if (user.type == "success") {
                                window.location.href = "http://www.localhost/30prashow";
                            }
                        }
                    });
                </script>
            </div>

            <div class="imgLogin">
                <img src="<?= url("assets/web/")?>images/matue2.png">>

            </div>

        </div>
    </div>

</body>

</html>