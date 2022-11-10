<?php


namespace App\Controllers;


use App\Models\Classes;
use App\Models\Enrollment;
use App\Models\Student;

class Loads
{
    public function classes_edit(array $data): void
    {
        $classes = (new Classes())->findById($data["id"]);
        if (!empty($classes)) {
            $callback["success"] = 200;
            $callback["classes_id"] = $classes->classes_id;
            $callback["classes_description"] = $classes->classes_description;
            $callback["classes_year"] = $classes->classes_year;
            $callback["classes_vacancies"] = $classes->classes_vacancies;
            $callback["classes_status"] = $classes->classes_status;
        } else {
            $callback["erro"] = "Erro, atualize e tente novamente!";
        }
        echo json_encode($callback);
    }

    public function students_edit(array $data): void
    {
        $students = (new Student())->findById($data["id"]);
        if (!empty($students)) {
            $callback["success"] = 200;
            $callback["student_id"] = $students->student_id;
            $callback["student_name"] = $students->student_name;
            $callback["student_birth"] = $students->student_birth;
            $callback["student_cpf"] = $students->student_cpf;
            $callback["student_status"] = $students->student_status;
        } else {
            $callback["erro"] = "Erro, atualize e tente novamente!";
        }
        echo json_encode($callback);
    }

    public function enrollment_edit(array $data):void
    {
        $enrollment = (new Enrollment())->findById($data["id"]);
        if (!empty($enrollment)) {
            $callback["success"] = 200;
            $callback["enrollment_id"] = $enrollment->enrollment_id;
            $callback["enrollment_fk_student"] = $enrollment->enrollment_fk_student;
            $callback["enrollment_student_name"] = $enrollment->studentName()->studentName->student_name;
            $callback["enrollment_student_cpf"] = $enrollment->studentName()->studentName->student_cpf;
            $callback["enrollment_fk_classes"] = $enrollment->enrollment_fk_classes;
            $callback["enrollment_date"] = $enrollment->enrollment_date;
            $callback["enrollment_status"] = $enrollment->enrollment_status;
        } else {
            $callback["erro"] = "Erro, atualize e tente novamente!";
        }
        echo json_encode($callback);
    }
    public function enrollment_student(array $data): void
    {
        $students = (new Student())->find("student_cpf = :cpf", "cpf={$data["cpf"]}")->fetch();
        if (!empty($students)) {
            if ($students->student_status == 1) {
                $callback["success"] = 200;
                $callback["student_id"] = $students->student_id;
                $callback["student_name"] = $students->student_name;
            } else {
                $callback["erro"] = "Erro, este aluno não está ativo!!";
            }
        } else {
            $callback["erro"] = "Erro, CPF não localizado!";
        }
        echo json_encode($callback);
    }
}