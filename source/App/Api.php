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
        if(empty($headers["Email"]) || empty($headers["Password"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe E-mail, Senha e Tipo de Usuário para acessar"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->user = new User();
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

    public function getUser()
    {
        // $user = new User(1);
        // $user->findById();
        // echo $user->getJSON();
        echo json_encode($this->user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
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
    
    public function getShow()
    {
        // if(!empty($data)){
            // var_dump($data);
            $show = new Show();
            // $show = new Show(1);
            $show ->findById();
            echo json_encode($show->getArrayShows(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // }
    }

}