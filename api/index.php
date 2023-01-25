<?php

ob_start();

require __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

// GET ROUTES USER

$route->get("/user","Api:getUser");

$route->get("/user/{idUser}","Api:getUserById");

$route->get("/users","Api:getUsers");

// GET ROUTES SHOW

$route->get("/user/shows","Api:getShows");

$route->get("/user/show/{idShow}","Api:getShow");

// PUT ROUTES USER

$route->put("/user/name/{name}/email/{email}","Api:updateUser");

// PUT ROUTES SHOW

$route->put("/user/show/{idShow}/name/{name}/local/{local}","Api:updateShow");

// POST ROUTES USER

$route->post("/user/type/{type}/name/{name}/email/{email}/password/{password}", "Api:createUser");

$route->post("/user/show/day/{day}/name/{name}/local/{local}/idCategory/{idCategory}", "Api:createShow");

$route->post("/user/comprarshow/id/{idShow}", "Api:buyShow");
// $route->post("/comprarshow/{idShow}", "App:buyShow");

$route->dispatch();





/**
 * ERROR REDIRECT
 */
// if ($route->error()) {
//     header('Content-Type: application/json; charset=UTF-8');
//     http_response_code(404);

//     echo json_encode([
//         "errors" => [
//             "type " => "endpoint_not_found",
//             "message" => "Não foi possível processar a requisição"
//         ]
//     ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// }

ob_end_flush();