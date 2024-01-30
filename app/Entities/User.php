<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $attributes = [
        'id' => null,
        'email' => null,
        'password' => null,
        'usertype_id' => null,
        'person_id' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    protected $datamap = [
        'email' => 'email',
        'password' => 'password',
        'usertype_id' => 'usertype_id',
        'person_id' => 'person_id',
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
