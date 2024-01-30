<?php

namespace App\Controllers;

use App\Models\ProcessesModel;

class Secretary extends BaseController
{
    private $processesModel;

    public function __construct()
    {
        $this->processesModel = new ProcessesModel();
    }

    public function index()
    {
        //
    }

    public function manageTasksView()
    {
        $processes = $this->processesModel->findAll();
        $data = [
            'processes' => $processes,
        ];
        return view('groups/secretary/manage_tasks', $data);
    }
}
