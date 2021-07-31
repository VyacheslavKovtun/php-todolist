<?php
require_once 'baseRepository.php';

class StatusRepository extends BaseRepository
{
    function create($value): void
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('INSERT INTO task_status(task_status_name) VALUES(?)');
        $stmt->bindValue(1, $value['task_status_name'], PDO::PARAM_STR);
        $stmt->execute();
    }

    function get(int $id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM task_status WHERE task_status_id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getId($name)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT task_status_id FROM task_status WHERE task_status_name = ?');
        $stmt->execute([$name]);
        return $stmt->fetch();
    }

    function getAll() :array
    {
        return $this->connection
        ->getConnection()
        ->query('SELECT * FROM task_status')
        ->fetchAll();
    }

    function update($value)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('UPDATE task_status SET task_status_name = ? WHERE task_status_id = ?');
        $stmt->bindValue(1, $value['task_status_name'], PDO::PARAM_STR);
        $stmt->bindValue(2, $value['task_status_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    function delete(int $id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('DELETE FROM task_status WHERE task_status_id = ?');
        $stmt->execute([$id]);
    }
}