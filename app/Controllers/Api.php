<?php

namespace App\Controllers;

use App\Models\ActivitiesModel;
use App\Models\ProcessesModel;
use App\Models\TasksModel;

class Api extends BaseController
{
    private $processesModel;
    private $activitiesModel;
    private $tasksModel;

    public function __construct()
    {
        $this->processesModel = new ProcessesModel();
        $this->activitiesModel = new ActivitiesModel();
        $this->tasksModel = new TasksModel();
    }

    public function index()
    {
        //
    }

    public function getProcesses()
    {
        $processes = $this->processesModel->findAll();
        $data = [
            'processes' => $processes,
        ];
        return $this->response->setJSON($data);
    }

    public function getActivitiesByProcessId($processId)
    {
        $activities = $this->activitiesModel->select('id, name')->where('process_id', $processId)->findAll();
        $data = [
            'activities' => $activities,
        ];
        return $this->response->setJSON($data);
    }

    public function getTasksByActivityId($activityId)
    {
        $tasks = $this->tasksModel->select('id, name')->where('activity_id', $activityId)->findAll();
        $data = [
            'tasks' => $tasks,
        ];
        return $this->response->setJSON($data);
    }

    public function addProcess()
    {
        $name = json_decode($this->request->getBody())->name;
        $data = [
            'name' => $name,
        ];
        $result = $this->processesModel->insert($data);

        if ($result) {
            $response = [
                'success' => true,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function editProcessById()
    {
        $processId = json_decode($this->request->getBody())->id;
        $name = json_decode($this->request->getBody())->name;
        $data = [
            'name' => $name,
        ];
        $result = $this->processesModel->where('id', $processId)->set($data)->update();

        if ($result) {
            $response = [
                'success' => true,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function addActivity()
    {
        $name = json_decode($this->request->getBody())->name;
        $processId = json_decode($this->request->getBody())->processId;
        $data = [
            'name' => $name,
            'process_id' => $processId,
        ];
        $result = $this->activitiesModel->insert($data);

        if ($result) {
            $response = [
                'success' => true,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function editActivityById()
    {
        $activityId = json_decode($this->request->getBody())->id;
        $name = json_decode($this->request->getBody())->name;
        $data = [
            'name' => $name,
        ];
        $result = $this->activitiesModel->where('id', $activityId)->set($data)->update();

        if ($result) {
            $response = [
                'success' => true,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function addTask()
    {
        $name = json_decode($this->request->getBody())->name;
        $activityId = json_decode($this->request->getBody())->activityId;
        $data = [
            'name' => $name,
            'activity_id' => $activityId,
        ];
        $result = $this->tasksModel->insert($data);

        if ($result) {
            $response = [
                'success' => true,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function editTaskById()
    {
        $taskId = json_decode($this->request->getBody())->id;
        $name = json_decode($this->request->getBody())->name;
        $data = [
            'name' => $name,
        ];
        $result = $this->tasksModel->where('id', $taskId)->set($data)->update();

        if ($result) {
            $response = [
                'success' => true,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }
        return $this->response->setJSON($response);
    }
}
