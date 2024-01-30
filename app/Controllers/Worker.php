<?php

namespace App\Controllers;

use App\Models\HoursWorkedModel;
use App\Models\ProcessesModel;
use App\Models\TasksModel;

class Worker extends BaseController
{
    private $processesModel;
    private $hoursWorkedModel;
    private $tasksModel;

    public function __construct()
    {
        $this->processesModel = new ProcessesModel();
        $this->hoursWorkedModel = new HoursWorkedModel();
        $this->tasksModel = new TasksModel();
    }

    public function index()
    {
        //
    }

    public function registerHoursView()
    {
        $userId = auth()->user()->id;
        $today = date('Y') . '-' . date('m') . '-' . date('d');
        $processes = $this->processesModel->findAll();
        $tasks = $this->hoursWorkedModel
            ->select('hours_worked.id, name, hours, minutes, description')
            ->join('tasks', 'tasks.id = hours_worked.task_id', 'inner')
            ->where('user_id', $userId)
            ->where('date', $today)
            ->findAll();
        $totalMinutes = 0;
        foreach ($tasks as $task) {
            $totalMinutes += $task->hours * 60 + $task->minutes;
        }
        $limitMinutes = in_array(date('N'), range(1, 4)) ? 435 : 420;
        $data = [
            'processes' => $processes,
            'tasks' => $tasks,
            'today' => $today,
            'totalMinutes' => $totalMinutes,
            'limitMinutes' => $limitMinutes,
            'time' => date('h:i:sa', time()),
        ];
        return view('groups/worker/register_hours', $data);
    }

    public function saveTask()
    {
        $taskId = $this->request->getPost('task_id');
        $hours = $this->request->getPost('hours');
        $minutes = $this->request->getPost('minutes');
        $description = $this->request->getPost('description');
        $userId = auth()->user()->id;
        $today = date('Y') . '-' . date('m') . '-' . date('d');
        $tasks = $this->hoursWorkedModel
            ->select('hours_worked.id, name, hours, minutes, description')
            ->join('tasks', 'tasks.id = hours_worked.task_id', 'inner')
            ->where('user_id', $userId)
            ->where('date', $today)
            ->findAll();
        $totalMinutes = 0;
        foreach ($tasks as $task) {
            $totalMinutes += $task->hours * 60 + $task->minutes;
        }
        $limitMinutes = in_array(date('N'), range(1, 4)) ? 435 : 420;
        $remainingMinutes = $limitMinutes - $totalMinutes;

        if ($remainingMinutes < ($hours * 60 + $minutes)) {
            return redirect()->back()->withInput()->with('error', "¡Error! El tiempo enviado supera al límite del día.");
        }

        $data = [
            'date' => date('Y') . '-' . date('m') . '-' . date('d'),
            'hours' => $hours,
            'minutes' => $minutes,
            'description' => $description,
            'user_id' => $userId,
            'task_id' => $taskId,
        ];
        $result = $this->hoursWorkedModel->insert($data);

        if ($result) {
            return redirect()->to('trabajador/registrar');
        } else {
            return redirect()->back()->withInput()->with('error', "¡Error! No se pudo agregar, inténtelo de nuevo más tarde.");
        }
    }
}
