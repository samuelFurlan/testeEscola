<?php


namespace App\Controllers;


use App\Models\Classes;
use App\Models\Enrollment;
use App\Models\Student;

class Tables
{
    public function classes(): void
    {
        $classes = (new Classes())->find()->fetch(true);

        if (!empty($classes)) {
            $i = 0;
            foreach ($classes as $item) {
                if ($item->classes_status == 1) {
                    $status = "<i class='fa fa-circle' style='color: green;'></i>";
                } else {
                    $status = "<i class='fa fa-circle' style='color: red;'></i>";
                }
                $enrollments = (new Enrollment())->find("enrollment_fk_classes = :classes_id AND enrollment_status = 1",
                    "classes_id={$item->classes_id}")->count();
                $columns["data"][$i] = [
                    $item->classes_description,
                    $item->classes_year,
                    $item->classes_vacancies,
                    $item->classes_vacancies - $enrollments,
                    $status,
                    "<i class='fal fa-edit' style='cursor: pointer;' onclick='editClasses({$item->classes_id})'></i>"
                ];
                $i++;
            }
        } else {
            $columns["data"] = "";
        }
        echo json_encode($columns);
    }

    public function students(): void
    {
        $students = (new Student())->find()->fetch(true);

        if (!empty($students)) {
            $i = 0;
            foreach ($students as $item) {
                if ($item->student_status == 1) {
                    $status = "<i class='fa fa-circle' style='color: green;'></i>";
                } else {
                    $status = "<i class='fa fa-circle' style='color: red;'></i>";
                }
                $enrollments = (new Enrollment())->find("enrollment_fk_student = :student_id AND enrollment_status = 1",
                    "student_id={$item->student_id}")->fetch();
                if (!empty($enrollments)){
                    $class = $enrollments->className()->className;
                }else{
                    $class = "";
                }
                $columns["data"][$i] = [
                    $item->student_name,
                    date("d/m/Y", strtotime($item->student_birth)),
                    $item->student_cpf,
                    $class,
                    $status,
                    "<i class='fal fa-edit' style='cursor: pointer;' onclick='editStudent({$item->student_id})'></i>"
                ];
                $i++;
            }
        } else {
            $columns["data"] = "";
        }
        echo json_encode($columns);
    }

    public function enrollment():void
    {
        $enrollment = (new Enrollment())->find()->fetch(true);

        if (!empty($enrollment)) {
            $i = 0;
            foreach ($enrollment as $item) {
                if ($item->enrollment_status == 1) {
                    $status = "<i class='fa fa-circle' style='color: green;'></i>";
                } else {
                    $status = "<i class='fa fa-circle' style='color: red;'></i>";
                }
                $columns["data"][$i] = [
                    $item->studentName()->studentName->student_name,
                    $item->studentName()->studentName->student_cpf,
                    $item->className()->className,
                    date("d/m/Y", strtotime($item->enrollment_date)),
                    $status,
                    "<i class='fal fa-edit' style='cursor: pointer;' onclick='editEnrollment({$item->enrollment_id})'></i>"
                ];
                $i++;
            }
        } else {
            $columns["data"] = "";
        }
        echo json_encode($columns);
    }

    public function calls()
    {
        $classes = (new Classes())->find("classes_status = 1")->fetch(true);

        if (!empty($classes)) {
            $i = 0;
            foreach ($classes as $item) {
                $enrollments = (new Enrollment())->find("enrollment_fk_classes = :classes_id AND enrollment_status = 1",
                    "classes_id={$item->classes_id}")->count();
                $columns["data"][$i] = [
                    $item->classes_description,
                    $item->classes_year,
                    $enrollments,
                    "<a href='". url("chamada/") . $item->classes_id ."' target='_blank'>
                            <i class='fal fa-print'></i></a>"
                ];
                $i++;
            }
        } else {
            $columns["data"] = "";
        }
        echo json_encode($columns);
    }
}