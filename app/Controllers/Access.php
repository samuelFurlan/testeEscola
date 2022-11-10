<?php

namespace App\Controllers;

use League\Plates\Engine;

class Access
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../../Views/auth/_pages", "php");
    }

    public function auth(): void
    {
        echo $this->view->render("auth", [
            "title" => "Acessar | " . SITE
        ]);
    }

    public function validate_access(array $data): void
    {
        if (in_array("", $data)) {
            $callback["erro"] = "Todos os campos são obrigatórios!";
        } else {
            $username = $data["username"];
            $password = $data["pass"];

            if ($username == "admin" && $password == "admin") {
                $callback["path"] = "dashboard";
                $callback["success"] = 200;
            } else {
                $callback["erro"] = "Usuário, senha incorretos!";
            }
        }
        echo json_encode($callback);
    }

    public function error(array $data): void
    {
        echo $this->view->render("error", [
            "title" => "ERRO " . $data["errcode"] . " | " . SITE,
        ]);
    }
}