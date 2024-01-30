<?php

namespace App\Models;

use CodeIgniter\Model;

class HoursWorkedModel extends Model
{
    protected $table            = 'hours_worked';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\HoursWorked::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['date', 'hours', 'minutes', 'description', 'user_id', 'task_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
