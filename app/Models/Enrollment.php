<?php


namespace App\Models;


use CoffeeCode\DataLayer\DataLayer;

class Enrollment extends DataLayer
{
    public function __construct()
    {
        parent::__construct("tb_enrollment", [], "enrollment_id");
    }

    public function studentName(): Enrollment
    {
        $this->studentName = (new Student())->findById($this->enrollment_fk_student);
        return $this;
    }

    public function className(): Enrollment
    {
        $this->className = (new Classes())->findById($this->enrollment_fk_classes)->classes_description. " - ".(new Classes())->findById($this->enrollment_fk_classes)->classes_year;
        return $this;
    }
}