<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Person extends Entity
{
    protected $attributes = [
        'id' => null,
        'firstname' => null,
        'lastname' => null,
        'dni' => null,
        'phone' => null,
        'address' => null,
        'birthday' => null,
        'user_id' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    protected $datamap = [
        'firstname' => 'firstname',
        'lastname' => 'lastname',
        'dni' => 'dni',
        'phone' => 'phone',
        'address' => 'address',
        'birthday' => 'birthday',
        'user_id' => 'user_id',
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
