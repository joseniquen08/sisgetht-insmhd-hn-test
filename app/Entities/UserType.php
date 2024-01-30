<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserType extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    protected $datamap = [
        'name' => 'name',
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
