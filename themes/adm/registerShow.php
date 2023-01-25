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
    <link>
</head>

<body class="bg-image">
    <div class="container">
        <div class="formularioLogin">

            <form id="form-register" novalidate>
                <div class="formularioInput">
                    <label class="form-label">Data do Show</label>
                    <input type="date" name="day" class="form-control" id="day" value="">
                </div>
                <div class="formularioInput">
                    <label class="form-label">Nome do Show</label>
                    <input type="text" name="name" class="form-control" id="name" value="">
                </div>
                <div class="formularioInput">
                    <p class="font-weight-bold">Imagem:</p>
                    <input class="form-control" type="file" name="image" id="image" >
                </div>   
                <div class="formularioInput">
                    <label class="form-label">Local:</label>
                    <input class="form-control" type="text" id="local" name="local" value="">
                </div>

                <select class="form-select form-select-lg mb-3" name="category" aria-label=".form-select-lg example">
                    <option selected>Escolher categoria</option>
                    <?php
                    if(!empty($categoriesList)){
                        foreach ($categoriesList as $category){
                            echo "<option value=\"{$category->id}\">{$category->singers}</option>";
                        }
                    }
                    ?>
                </select>

                <div class="formularioInput">
                    <input class="button" type="submit" value="Criar" >
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
        const form = document.querySelector("#form-register");
        const message = document.querySelector("#message"); // id da div message
        
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            //alert("Oi");
            const dataPost = new FormData(form);
            // enviar para a rota já definida
            const data = await fetch("<?= url("admin/cadastrarshow"); ?>",{
                method: "POST",
                body: dataPost,
            });
            const show = await data.json();
            console.log(show);
            // tratamento da mensagem
            
            // if(post) {
            //     message.innerHTML = post.message;
            //     message.classList.add("message");
            //     message.classList.add(`${post.type}`);
            // }
        });
    </script>
</body>

</html>