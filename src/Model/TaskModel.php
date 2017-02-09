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
        $query = $this->connection->query('SELECT * FROM tasks', \PDO::FETCH_ASSOC);
        $tasks = $query->fetchAll();

        return $tasks;
    }

    public function insertTask($taskName)
    {

        $query = $this->connection->prepare('INSERT INTO tasks (name) VALUES (:task)');
        $query->execute([':task' => (string) $taskName]);
    }

    public function deleteTask($taskId)
    {
        $query = $this->connection->prepare('DELETE FROM tasks WHERE id=:taskId');
        $query->execute([':taskId' => $taskId]);
    }
}
