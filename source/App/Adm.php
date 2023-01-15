<?php

namespace Source\App;
use Source\Models\Admin;
use League\Plates\Engine;
use Source\Models\User;
use Source\Models\Show;
use Source\Models\Category;

class Adm
{
    private $view;

    private $categories;

    public function __construct()
    {
        if(empty($_SESSION["admin"]) || empty($_COOKIE["admin"])) {
            header("Location:http://www.localhost/30prashow/");
        }

    
        $categories = new Category();
        $this->categories = $categories->selectAll();

        setcookie("admin","Logado",time()+60*60,"/");
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
    }
    
    public function registerShow(?array $data) : void
    {
        $categories = new Category();
        $categoriesList = $categories->selectAll();

        if(!empty($data)){
            $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(!empty($_FILES['image']['tmp_name'])) {
                $upload = uploadImage($_FILES['image']);
                //unlink($_SESSION["user"]["image"]);
            } 
            // else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
            //     $upload = $_SESSION["work"];
            // }

            $show = new Show(
                null,
                $data["day"],
                $data["name"],
                $data["local"],
                $upload,
                $data["category"],
                
            );

            $show->insert();

            //     $writeWork = new WriteWork(
            //     NULL,
            //     $work->getId(),
            //     $_SESSION["user"]["id"]
            // );

            // $writeWork->writeWorkInsert();

            $json = [
                "message" => "Show cadastrado!",
                "day" => $data["day"],
                "name" => $data["name"],
                "local" => $data["local"],
                "image" => $upload,
                "category" => $data["category"]
                
            ];

            echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo $this->view->render("registerShow",[
            "categoriesList" => $categoriesList
            // "statesList" => $statesList
        ]);

    }
    public function editShow()
    {
        $show = new Show();
        echo $this->view->render("editShow",[
            "show" => $show->getById($_GET["id"])
        ]);
    }
    public function updateShow(array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe todos os campos!",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
            $show = new Show(
                $_GET["id"],
                null,
                $data["name"],
                $data["local"],
                null,
                null
            );
            $show->updateShoww();

            $json = [
                "message" => $show->getMessage(),
                "type" => "alert-success",
                // "day" => $show->getDay(),
                "name" => $show->getName(),
                "local" => $show->getLocal()
                // "image" => $show->getImage()
            ];
            echo json_encode($json);
        }
    }

    
     public function home() : void
    {
        $show = new Show();
        $shows = $show->selectAll();

        echo $this->view->render("home",
            [
                "categories" => $this->categories,
                "shows" => $shows
            ]
        );
    }

    public function users() : void
    {
        $user = new User();
        $users = $user->selectAll();

        echo $this->view->render("users",
            [
                "users" => $users
            ]
        );
    }

    public function editUser()  {

        $user = new User();

        echo $this->view->render("editUser",
            [
                "user" =>$user->getById($_GET["id"])
        ]);
    }
    public function updateUser(array $data) : void
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
            
            $user = new User(
                $_GET["id"],
                $data["name"],
                $data["email"],
                null,
                null
            );
            $user->update();
            $json = [
                "message" => $user->getMessage(),
                "type" => "alert-success",
                "name" => $user->getName(),
                "email" => $user->getEmail()
                // "photo" => url($user->getPhoto())
            ];
            echo json_encode($json);
        }
    }
    public function logout()
    {
        session_destroy();
        setcookie("admin","Logado",time() - 3600,"/");
        header("Location:http://www.localhost/30prashow/");
    }
}