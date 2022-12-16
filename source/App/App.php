<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\User;
use Source\Models\Show;
use CoffeeCode\Uploader\Image;

class App
{
    private $view;
    
    public function __construct()
    {
        if(empty($_SESSION["user"]) || empty($_COOKIE["user"])){
            header("Location:http://www.localhost/30prashow/login");
        }

        $this->view = new Engine(CONF_VIEW_APP,'php');
    }
    public function list () : void 
    {
        require __DIR__ . "/../../themes/app/list.php";
    }

    public function createPDF () : void
    {
       require __DIR__ . "/../../themes/app/create-pdf.php";
    }

   

    public function home () : void
    {
        $show = new Show();
        $shows = $show->selectAll();

        echo $this->view->render("home",
            [
                // "categories" => $this->categories,
                "shows" => $shows
            ]
        );

        // echo "Olá, {$_SESSION["user"]["name"]}<br>";
        // echo "O ID: {$_SESSION["user"]["id"]}<br>";
        // echo "O email é : {$_SESSION["user"]["email"]}<br>";
        // echo $this->view->render("home");

        
    }

    public function logout()
    {
        session_destroy();
        setcookie("user","Logado",time() - 3600,"/");
        header("Location:http://www.localhost/30prashow/login");
    }

    public function profile(array $data) : void
    {
        echo $this->view->render("profile",
            [
                "user" => $_SESSION["user"]
            ]);

    }

    public function profileUpdate(array $data) : void
    {
        if(!empty($data)){
            $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if(in_array("",$data)){
                $json = [
                    "message" => "Informe Nome e Email...",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
            if(!is_email($data["email"])){
                $json = [
                    "message" => "Informe um e-mail válido...",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
            // se a imagem for alterada, manda a do formulário $_FILES
            if(!empty($_FILES['photo']['tmp_name'])) {
                $upload = uploadImage($_FILES['photo']);
                unlink($_SESSION["user"]["photo"]);
            } else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
                $upload = $_SESSION["user"]["photo"];
            }

            $user = new User(
                $_SESSION["user"]["id"],
                $data["name"],
                $data["email"],
                null,
                null,
                $upload
            );
            $user->update();
            $json = [
                "message" => $user->getMessage(),
                "type" => "alert-success",
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "photo" => url($user->getPhoto())
            ];
            echo json_encode($json);
        }
    }
}


?>