<?php

namespace App\Controller;

use App\Model\TaskModel;

class ListController extends Controller
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->taskModel->getTasks();
//var_dump($tasks);exit;
        $this->render('list.php', ['tasks' => $tasks]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskName = $_POST['task'];
            if ($taskName == '') {
                $error = 'Vous devez saisir du texte';
                $this->render('add_form.html', ['taskName' => $taskName, 'error' => $error]);
                return;
            }
            $this->taskModel->insertTask($taskName);
            header('Location: /?action=list');
        } else {
            $this->render('add_form.html');
        }
    }

    public function delete()
    {
        $taskId = $_GET['taskId'];
        $this->taskModel->deleteTask($taskId);
        header('Location: /?action=list');
    }

    public function noResourceFound()
    {
        http_response_code(404);
    }
}
