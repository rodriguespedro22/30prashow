<?php

namespace Source\App;

use Source\Models\User;
use Source\Models\Show;

class Api
{
    private $user;
    // private $
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $headers = getallheaders();

        $this->user = new User();

        if($headers["Rule"] === "N"){
            return;
        }

        if(empty($headers["Email"]) || empty($headers["Password"])  || empty($headers["Rule"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe E-mail, Senha e Tipo de Usuário para acessar"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        
        if(!$this->user->validate($headers["Email"],$headers["Password"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "E-mail ou Senha inválidos"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
    }

    public function updateUser(array $data) : void
    {
        if($this->user->getId() != null){
            $this->user->setName($data["name"]);
            $this->user->setEmail($data["email"]);
            $this->user->update();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Usuário alterado com sucesso!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getUser()
    {
        // $user = new User(1);
        // $user->findById();
        // echo $user->getJSON();
        if($this->user->getId() != null){
            echo json_encode($this->user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        
    }
    
    public function createUser(array $data)
    {

        if($this->user->findByEmail($data["email"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "E-mail já cadastrado"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->user->setType($data["type"]);
        $this->user->setName($data["name"]);
        $this->user->setEmail($data["email"]);
        $this->user->setPassword($data["password"]);
        $this->user->insert();
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário cadastrado com sucesso"
        ];
        echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    // *************
    // SHOWS METHODS
    // *************
    
    public function updateShow(array $data) : void
    {
        if(!empty($data["idShow"])){
        $show = new Show($data["idShow"]);
        
        // if($show->getId() != null){
            $show->setName($data["name"]);
            $show->setLocal($data["local"]);
            $show->updateShoww();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Show modificado com sucesso!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            // echo "salve";
        // }
        }
    } 

    public function getShow(array $data)
    {
        // if(!empty($data)){
            // var_dump($data);
            // $show = new Show();
            // $show = new Show(1);
            // $show ->findById();
            // echo json_encode($show->getArrayShows(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // }

        if(!empty($data["idShow"])){
            $show = new Show($data["idShow"]);
            if(!$show->findById()){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Projeto não cadastrado..."
                ];
                echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Show encontrado!",
                "show" => [
                    "id" => $show->getId(),
                    "name" => $show->getName(),
                    "local" => $show->getLocal()
                ]
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getShows(){

            $shows = new Show();
            $show = [
                "code" => 200,
                "type" => "success",
                "message" => "Shows encontrados:",
                "show" => $shows->getAllShows()
            ];
            echo json_encode($show,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    

}