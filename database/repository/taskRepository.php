<?php
require_once 'baseRepository.php';

class TaskRepository extends BaseRepository
{
    function create($value): void
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('INSERT INTO task(priority_id,task_status_id,task_text,create_date,complete_date) VALUES(?,?,?,?,?)');
        $stmt->bindValue(1, $value['priority_id'], PDO::PARAM_INT);
        $stmt->bindValue(2, $value['task_status_id'], PDO::PARAM_INT);
        $stmt->bindValue(3, $value['task_text'], PDO::PARAM_STR);
        $stmt->bindValue(4, $value['create_date'], PDO::PARAM_STR);
        $stmt->bindValue(5, $value['complete_date'], PDO::PARAM_STR);
        
        $stmt->execute();
    }

    function getAll() :array
    {
        return $this->connection
        ->getConnection()
        ->query('SELECT * FROM task')
        ->fetchAll();
    }

    function get(int $id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM task WHERE task_id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getId($text)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT task_id FROM task WHERE task_text = ?');
        $stmt->execute([$text]);
        return $stmt->fetch();
    }

    function update($value)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('UPDATE task SET priority_id = ?, task_status_id = ?, task_text = ?, create_date = ?, complete_date = ? WHERE task_id = ?');
        $stmt->bindValue(1, $value['priority_id'], PDO::PARAM_INT);
        $stmt->bindValue(2, $value['task_status_id'], PDO::PARAM_INT);
        $stmt->bindValue(3, $value['task_text'], PDO::PARAM_STR);
        $stmt->bindValue(4, $value['create_date'], PDO::PARAM_STR);
        $stmt->bindValue(5, $value['complete_date'], PDO::PARAM_STR);
        $stmt->bindValue(6, $value['task_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    function delete(int $id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('DELETE FROM task WHERE task_id = ?');
        $stmt->execute([$id]);
    }

    function getTasksByPriority($priorId): array
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM task WHERE priority_id = ?');
        $stmt->execute([$priorId]);
        return $stmt->fetchAll();
    }

    function getTasksByStatus($statusId): array
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM task WHERE task_status_id = ?');
        $stmt->execute([$statusId]);
        return $stmt->fetchAll();
    }

    function getPriorityByTaskId($id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT priority_name FROM priority WHERE priority_id = (SELECT priority_id FROM task WHERE task_id = ?)');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getStatusByTaskId($id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT task_status_name FROM task_status WHERE task_status_id = (SELECT task_status_id FROM task WHERE task_id = ?)');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}