<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class HoursWorked extends Entity
{
    protected $attributes = [
        'id' => null,
        'date' => null,
        'hours' => null,
        'minutes' => null,
        'description' => null,
        'user_id' => null,
        'task_id' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    protected $datamap = [
        'date' => 'date',
        'hours' => 'hours',
        'minutes' => 'minutes',
        'description' => 'description',
        'user_id' => 'user_id',
        'task_id' => 'task_id',
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
