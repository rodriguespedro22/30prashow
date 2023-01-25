<?php
session_start();
ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;
use Dompdf\Dompdf;
$route = new Router(CONF_URL_BASE, ":");
//$route = new Router('localhost/30prashow', ":"); // Route para localhost
// $dompdf = new Dompdf();
// $dompdf->loadHtml("Boa noite");
// $dompdf->set_option('defaultFront','sans');
// $dompdf->setPaper('A4');
// $dompdf->render();
// $dompdf->stream();

//  PASSOS DA FELICIDADE

// abre o arquivo 
// cria a classe
// vincula a classe
// e cria dentro da view o arquivo php que será chamado
// echo $this->view->render(""); dentro do metodo da rota!



$route->namespace("Source\App");

/**
 * Web Routes
 */

$route->get("/","Web:home");

$route->get("/sobre","Web:about");

$route->get("/contato","Web:contact");
$route->post("/contato","Web:contact");

$route->get("/login","Web:login");
$route->post("/login","Web:login");

$route->get("/cadastro","Web:cadastro");
$route->post("/cadastro","Web:cadastro");

$route->get("/show/{idShow}","Web:showFind");
$route->get("/shows/{idCategory}","Web:shows");

/**
 * App Routes
 */

$route->group("/app"); 
$route->get("/","App:home");

$route->get("/ingressos","App:tickets");

$route->get("/show/{idShow}", "App:showFind");
$route->get("/shows/{idCategory}","App:shows");

$route->post("/comprarshow/{idShow}", "App:buyShow");

$route->get("/sair","App:logout");

$route->get("/perfil","App:profile"); 
$route->post("/perfil","App:profileUpdate"); 

$route->group(null); 

/**
 * Admin Routes
 */


$route->group("/admin");

$route->get("/","Adm:home");

$route->get("/pdf","Adm:createPDF");

$route->get("/usuarios","Adm:users");
$route->get("/editaruser/{idUser}","Adm:editUser");
$route->post("/editaruser/{idUser}","Adm:updateUser");
$route->get("/deletaruser/{idUser}","Adm:deleteUser");

$route->get("/cadastrarshow","Adm:registerShow");
$route->get("/editarshow/{idShow}", "Adm:editShow");
$route->get("/deletarshow/{idShow}", "Adm:deleteShow");
$route->post("/cadastrarshow","Adm:registerShow");
$route->post("/editarshow/{idShow}", "Adm:updateShow");

$route->get("/userspdf", "Adm:usersPdf");
$route->get("/showspdf", "Adm:showsPdf");

$route->get("/sair","Adm:logout");

$route->group(null);

/*
 * Error Routes
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