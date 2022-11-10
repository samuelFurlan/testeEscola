<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Classes extends DataLayer
{
    public function __construct()
    {
        parent::__construct("	tb_classes", [], "classes_id");
    }
}