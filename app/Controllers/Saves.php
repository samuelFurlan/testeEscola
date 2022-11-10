<?php


namespace App\Controllers;


use App\Models\Classes;
use App\Models\Enrollment;
use App\Models\Student;

class Saves
{
    public function classes_save(array $data): void
    {
        if (!empty($data["classes_id"])) {
            $classes = (new Classes())->findById($data["classes_id"]);
        } else {
            $classes = new Classes();
        }
        $classes->classes_description = $data["classes_description"];
        $classes->classes_year = $data["classes_year"];
        $classes->classes_vacancies = $data["classes_vacancies"];
        $classes->classes_status = $data["classes_status"];

        if ($classes->save()) {
            $callback["success"] = 200;
        } else {
            $callback["erro"] = $classes->fail()->getMessage();
        }

        echo json_encode($callback);
    }

    public function students_save(array $data): void
    {
        if (!empty($data["students_id"])) {
            $students = (new Student())->findById($data["students_id"]);
        } else {
            $students = new Student();
        }
        $validate = (new Student())->find("student_cpf = :cpf", "cpf={$data["students_cpf"]}")->fetch();
        $status = true;
        if (!empty($validate) && empty($data["students_id"])){
            $status = false;
            $message = "Ops, esse CPF já esta cadastrado!";
        }else if (!empty($validate) && !empty($data["students_id"])){
            if ($validate->students_id != $data["students_id"]){
                $status = false;
                $message = "Ops, esse CPF já esta cadastrado para outro aluno!";
            }
        }

        if ($status){
            $students->student_name = $data["students_name"];
            $students->student_birth = $data["students_birth"];
            $students->student_cpf = $data["students_cpf"];
            $students->student_status = $data["students_status"];

            if ($students->save()) {
                $callback["success"] = 200;
            } else {
                $callback["erro"] = $students->fail()->getMessage();
            }
        }else{
            $callback["erro"] = $message;
        }


        echo json_encode($callback);
    }

    public function enrollment_save(array $data): void
    {
        $classes = (new Classes())->findById($data["classes_id"]);
        $enrollments = (new Enrollment())->find("enrollment_fk_classes = :classes_id AND enrollment_status = 1",
            "classes_id={$data["classes_id"]}")->count();

        if (!empty($data["enrollment_id"])) {
            $enrollment = (new Enrollment())->findById($data["enrollment_id"]);
        } else {
            $enrollment = new Enrollment();
        }

        if ($classes->classes_vacancies > $enrollments){
            $enrollment->enrollment_fk_student = $data["students_id"];
            $enrollment->enrollment_fk_classes = $data["classes_id"];
            $enrollment->enrollment_date = $data["enrollment_date"];
            $enrollment->enrollment_status = $data["enrollment_status"];

            if ($enrollment->save()) {
                $callback["success"] = 200;
            } else {
                $callback["erro"] = $enrollment->fail()->getMessage();
            }
        }else{
            $callback["erro"] = "Ops, esta turma não tem mais vagas disponíveis";
        }



        echo json_encode($callback);
    }

}