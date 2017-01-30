<?php

namespace App\Model;

class TaskModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO('sqlite:' . dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . 'db.sqlite');
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->connection->exec('CREATE TABLE IF NOT EXISTS tasks (id INTEGER PRIMARY KEY AUTOINCREMENT, name VARCHAR(255) NOT NULL)');
    }

    public function getTasks()
    {
        $tasks = $this->connection->query('SELECT * FROM tasks', \PDO::FETCH_ASSOC);

        return $tasks;
    }

    public function insertTask($taskName)
    {

        $insert = $this->connection->prepare('INSERT INTO TASKS (name) VALUES (:task)');
        $insert->execute([':task' => (string) $taskName]);
    }

    public function deleteTask($taskName)
    {
        $insert = $this->connection->prepare('DELETE FROM TASKS WHERE name=$taskName');
        $insert->execute([':task' => (string) $taskName]);
    }
}
