<?php


namespace App\Models;


use CoffeeCode\DataLayer\DataLayer;

class Student extends DataLayer
{
    public function __construct()
    {
        parent::__construct("tb_student", [], "student_id");
    }
}