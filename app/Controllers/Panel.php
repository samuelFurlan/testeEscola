<?php


namespace App\Controllers;


use App\Models\Classes;
use App\Models\Enrollment;
use App\Models\Student;
use League\Plates\Engine;

class Panel
{
    private $view;

    public function __construct()
    {
        ob_start();
        session_start();
        $this->view = Engine::create(__DIR__ . "/../../Views/panel/_pages", "php");
    }


    public function dashboard(): void
    {
        $students = (new Student())->find()->count();
        $classes = (new Classes())->find()->count();
        $enrollments = (new Enrollment())->find()->count();
        echo $this->view->render("dashboard", [
            "title" => "Dashboard | " . SITE,
            "students" => $students,
            "classes" => $classes,
            "enrollments" => $enrollments
        ]);
    }

    public function classes(): void
    {
        echo $this->view->render("classes", [
            "title" => "Turmas | " . SITE,
        ]);
    }

    public function students(): void
    {
        echo $this->view->render("students", [
            "title" => "Alunos | " . SITE,
        ]);
    }

    public function enrollment():void
    {
        $classes =(new Classes())->find("classes_status = 1")->fetch(true);
        echo $this->view->render("enrollment", [
            "title" => "Matrículas | " . SITE,
            "classes" => $classes
        ]);
    }

    public function calls():void
    {
        $classes =(new Classes())->find("classes_status = 1")->fetch(true);
        echo $this->view->render("calls", [
            "title" => "Chamadas | " . SITE,
            "classes" => $classes
        ]);
    }

    public function call_print(array $data):void
    {
        $enrollments = (new Enrollment())->find("enrollment_fk_classes = :classes_id",
            "classes_id={$data["id"]}")->fetch(true);
        $classes = (new Classes())->findById($data["id"]);
        echo $this->view->render("call_print", [
            "title" => "Chamada | " . SITE,
            "enrollments" => $enrollments,
            "classes" => $classes
        ]);
    }

    public function logout(): void
    {
        session_destroy();
        header("Location: " . URL_BASE);
    }
}