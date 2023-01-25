<?php


namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Address;
use Source\Models\User;
use Source\Models\Show;
use Source\Models\Buy;
use CoffeeCode\Uploader\Image;

class App
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

        if(empty($_SESSION["user"]) || empty($_COOKIE["user"])){
            header("Location:http://www.localhost/30prashow/login");
        }

        $this->view = new Engine(CONF_VIEW_APP,'php');
    }
    public function list () : void 
    {
        require __DIR__ . "/../../themes/app/list.php";
    }

   

    public function home () : void
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


    public function showFind(){
        $show = new Show();

        echo $this->view->render("show",[
            "show" => $show->getById($_GET["id"]),
            "categories" => $this->categories,
            "addresses" => $this->addresses
        ]);
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


    public function buyShow(array $data)
    {           
        $show = new Show();
        if (!empty($data)) {

            $buyShow = new Buy(
                null,
                $data[$_SESSION["user"]["id"]],
                $data[$show->getById($_GET["id"])]

            );

            $buyShow->insert();
            // header("Location:http://www.localhost/30prashow/app/");
        } 
        
    }
    
    public function logout()
    {
        session_destroy();
        setcookie("user","Logado",time() - 3600,"/");
        header("Location:http://www.localhost/30prashow/login");
    }

    public function profile(array $data) : void
    {
        // $user = new User($_SESSION["user"]["id"]);
        // $user->findById();
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
            if(!empty($_FILES['photo']['tmp_name'])) {
                $upload = uploadImage($_FILES['photo']);
            } else {
                $upload = $_SESSION["user"]["photo"] ? : NULL;
            }

            $user = new User(
                $_SESSION["user"]["id"],
                $data["name"],
                $data["email"],
                null,
                $upload
            );
            $user->update();
            $json = [
                "message" => $user->getMessage(),
                "type" => "alert-success",
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "photo" => $user->getPhoto() ? url($user->getPhoto()) : NULL
            ];
            echo json_encode($json);
        }
    }
}


?>