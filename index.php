<?php
session_start();
ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(CONF_URL_BASE, ":");
//$route = new Router('localhost/30prashow', ":"); // Route para localhost

/**
 * Web Routes
 */

$route->namespace("Source\App");

    // HOME

$route->get("/","Web:home");
// $route->post("/","Web:home");

    // ABOUT

$route->get("/sobre","Web:about");
//$route->get("/projeto","Web:project");

    // CONTATO

$route->get("/contato","Web:contact");
$route->post("/contato","Web:contact");

    // PERFIL

// $route->get("/perfil","Web:profile");
// $route->post("/login","Web:perfil");
/**
 * Login and Registration Routs
 */

//  PASSOS DA FELICIDADE

// abre o arquivo 
// cria a classe
// vincula a classe
// e cria dentro da view o arquivo php que será chamado
// echo $this->view->render(""); dentro do metodo da rota!

    // ROTAS CADASTRO E LOGIN

$route->get("/login","Web:login");
$route->post("/login","Web:login");

$route->get("/cadastro","Web:cadastro");
$route->post("/cadastro","Web:cadastro");

/**
 * App Routes
 */

$route->group("/app"); 
$route->get("/","App:home");

$route->get("/ingressos","App:tickets");

$route->get("/show/{idShow}", "App:showFind");

$route->get("/sair","App:logout");

/**
 * Profile /app
 */
$route->get("/perfil","App:profile"); 
$route->post("/perfil","App:profileUpdate"); 



$route->group(null); // desagrupo do /app

// Admin Routes
$route->group("/admin"); // agrupa em /admin
$route->get("/","Adm:home");

$route->get("/listar","App:list");
$route->get("/pdf","App:createPDF");

$route->get("/cadastrarshow","Adm:registerShow");
$route->post("/cadastrarshow","Adm:registerShow");

$route->get("/usuarios","Adm:users");

$route->get("/editaruser/{idUser}","Adm:editUser");
$route->post("/editaruser/{idUser}","Adm:updateUser");

$route->get("/editarshow/{idShow}", "Adm:editShow");
$route->post("/editarshow/{idShow}", "Adm:updateShow");

$route->get("/sair","Adm:logout");

$route->group(null); // desagrupo do /admin

/*
 * Erros Routes
 */

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();