<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("App\Controllers");
$router->group(null);

//Auth Group
$router->get("/", "Access:auth");
$router->post("/validar-acesso", "Access:validate_access");
//Auth Group

//Panel Group
/**
 * Get Group
 * Get Views from Controllers
 */
$router->get("/dashboard", "Panel:dashboard");
$router->get("/turmas", "Panel:classes");
$router->get("/alunos", "Panel:students");
$router->get("/matriculas", "Panel:enrollment");
$router->get("/chamadas", "Panel:calls");
$router->get("/chamada/{id}", "Panel:call_print");
$router->get("/sair", "Panel:logout");


/**
 * Post Group
 * Send Post to Controllers
 */
$router->post("/turmas/salvar", "Saves:classes_save");
$router->post("/turmas/editar", "Loads:classes_edit");

$router->post("/alunos/salvar", "Saves:students_save");
$router->post("/alunos/editar", "Loads:students_edit");

$router->post("/matriculas/salvar", "Saves:enrollment_save");
$router->post("/matriculas/editar", "Loads:enrollment_edit");
$router->post("/matricula/aluno", "Loads:enrollment_student");
//Panel Group


//Tables Group
$router->group("tabelas");
$router->post("/turmas", "Tables:classes");
$router->post("/alunos", "Tables:students");
$router->post("/matriculas", "Tables:enrollment");
$router->post("/chamadas", "Tables:calls");
//Table Group


//$router->group("api")->namespace("App\Api");


$router->group("ops");
$router->get("/{errcode}", "Access:error");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}