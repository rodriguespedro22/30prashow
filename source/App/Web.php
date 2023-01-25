<?php


namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Address;
use Source\Models\User;
use Source\Models\Show;
use Source\Models\Admin;

header("Access-Control-Allow-Origin: *");

class Web
{
    private $view;
    private $categories;
    private $addresses;

    public function __construct()
    {   
        $categories = new Category();
        $this->categories = $categories->selectAll();

        $addresses = new Address();
        $this->addresses = $addresses->selectAll();

        $this->view = new Engine(CONF_VIEW_WEB,'php');

        if(!empty($_SESSION["user"]) || !empty($_COOKIE["user"])){
            header("Location:app");
        }

        
    }

    public function home() : void
    {
        $show = new Show();
        $shows = $show->selectAll();

        echo $this->view->render("home",
            [
                "categories" => $this->categories,
                "addresses" => $this->addresses,
                "shows" => $shows
            ]
        );
    }

    public function shows(?array $data) : void
    {
        if(!empty($data)){
            $show = new Show();
            $shows = $show->findByCategory($data["idCategory"]);
        }
        echo $this->view->render(
            "shows",[
                "categories" => $this->categories,
                "addresses" => $this->addresses,
                "shows" => $shows
            ]
        );
    }

    public function about() : void
    {
        echo $this->view->render(
            "about",
            ["name" => "Pedro", "age" => 17]
        );

    }

    public function contact(array $data) : void
    {
        var_dump($data);
        echo $this->view->render("contact");
    }


    public function error(array $data) : void
    {
//      echo "<h1>Erro {$data["errcode"]}</h1>";
//      include __DIR__ . "/../../themes/web/404.php";
        echo $this->view->render("404", [
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }

    public function cadastro(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("", $data)) {
                $json = [
                    "message" => "Informe nome, e-mail e senha para cadastrar!",
                    "type" => "warning"
                ];

                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User();

            if($user->findByEmail($data["email"])){
                $json = [
                    "message" => "Email já cadastrado!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User(
                null,
                $data["name"],
                $data["email"],
                $data["password"]
            );

            if(!$user->insert()){
                $json = [
                    "message" => $user->getMessage(),
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            } else {
                $json = [
                    "name" => $data["name"],
                    "message" => $user->getMessage(),
                    "type" => "success"
                ];
                echo json_encode($json);
                return;
            }

            // Usuário salvo com sucesso
            return;
        }

        echo $this->view->render("cadastro",["eventName" => CONF_SITE_NAME]);
    }

    public function login(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe e-mail e senha para entrar!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User();
            $adm = new Admin();


            if(!$user->validate($data["email"], $data["password"]) && !$adm->validate($data["email"], $data["password"])) {
                $json = [
                "message" => "Usuário e/ou senha inválidos",
                "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if($adm->validate($data["email"], $data["password"])) {
                $json = [
                    "message" => "Administração disponível",
                    "type" => "admin"
                ];
                echo json_encode($json);
                return;
            }

            $json = [
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "message" => $user->getMessage(),
                "type" => "success"
            ];
            echo json_encode($json);
            return;

        }

        echo $this->view->render("login",["eventName" => CONF_SITE_NAME]);

    }
    public function showFind(){
        $show = new Show();

        echo $this->view->render("show",[
            "show" => $show->getById($_GET["id"]),
            "categories" => $this->categories
        ]);
    }
}