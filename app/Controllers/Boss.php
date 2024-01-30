<?php

namespace App\Controllers;

use App\Models\TasksModel;
use CodeIgniter\Shield\Models\UserModel;

class Boss extends BaseController
{
    private $userModel;
    private $tasksModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->tasksModel = new TasksModel();
    }

    public function index()
    {
        //
    }

    public function workerProgressView()
    {
        $users = $this->userModel
            ->select('users.*, count(hours_worked.id) as total_tasks, sum(hours_worked.hours*60+hours_worked.minutes) as total_minutes')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'inner')
            ->join('hours_worked', 'hours_worked.user_id = users.id', 'inner')
            ->where('group', 'worker')
            ->groupBy('hours_worked.user_id')
            ->findAll();
        $data = [
            'users' => $users,
        ];
        return view('groups/boss/worker_progress', $data);
    }

    public function workerProgressByIdView($userId)
    {
        $user = $this->userModel->findById($userId);
        $infoGeneral = $this->userModel
            ->select('sum(hours*60+minutes) as total_minutes, count(hours_worked.id) as total_tasks, count(distinct date) as total_days')
            ->join('hours_worked', 'hours_worked.user_id = users.id', 'inner')
            ->first();
        $infoToday = $this->userModel
            ->select('sum(hours*60+minutes) as total_minutes, count(hours_worked.id) as total_tasks, count(distinct date) as total_days')
            ->join('hours_worked', 'hours_worked.user_id = users.id', 'inner')
            ->where('date', date('Y-m-d'))
            ->first();
        $data = [
            'user' => $user,
            'infoGeneral' => $infoGeneral,
            'infoToday' => $infoToday,
        ];
        return view('groups/boss/worker_progress_by_id', $data);
    }

    public function taskSummaryView()
    {
        $tasks = $this->tasksModel
            ->select('tasks.name, count(hours_worked.task_id) as total, sum(hours_worked.hours*60+hours_worked.minutes) as total_minutes')
            ->join('hours_worked', 'hours_worked.task_id = tasks.id', 'left')
            ->groupBy('hours_worked.task_id, tasks.name')
            ->orderBy('total_minutes', 'desc')
            ->orderBy('total', 'desc')
            ->findAll();
        $data = [
            'tasks' => $tasks,
        ];
        return view('groups/boss/task_summary', $data);
    }
}
