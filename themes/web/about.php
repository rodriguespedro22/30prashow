<?php
   $this->layout("_theme");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/web/css/index.css">
    <link rel="script" href="../../assets/web/scripts/script.js">
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>30prashow | Login</title>
    <link rel="icon" href="../../assets/web/images/30.jpg">
    <link >
</head>
<body>
    <div class="container">
        <div class="formularioLogin">

            <div class="text">30PRASHOW</div>

            <form action="#">

                <div class="formularioInput">
                    <i class="fa fa-envelope"></i>
                    <input type="text" placeholder="Email" required>
                </div>

                <div class="formularioInput">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Senha" required>
                </div>

                <div class="formularioInput">
                    <input class="button" type="submit" value="Entrar">
                </div>

                <div class="esqueceuSenha"> <a href="#">Esqueceu sua senha?</a> </div>

                <div class="redesSociais">
                    <i class="fa fa-github"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-facebook"></i>
                </div>

                <div class="criarConta">
                    Nao possui uma conta? <a href="cadastro.php"><b>Crie uma agora</b></a>
                </div>

            </form>
        </div>

        <div class="imgLogin">
            <img src="../../assets/web/images/matue2.png">
        </div>

    </div>
</body>
</html>