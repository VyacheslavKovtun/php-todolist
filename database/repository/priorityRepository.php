<?php
require_once 'baseRepository.php';

class PriorityRepository extends BaseRepository
{
    function create($value): void
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('INSERT INTO priority(priority_name) VALUES(?)');
        $stmt->bindValue(1, $value['priority_name'], PDO::PARAM_STR);
        $stmt->execute();
    }

    function get(int $id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM priority WHERE priority_id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getId($name)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('SELECT priority_id FROM priority WHERE priority_name = ?');
        $stmt->execute([$name]);
        return $stmt->fetch();
    }

    function getAll() :array
    {
        return $this->connection
        ->getConnection()
        ->query('SELECT * FROM priority')
        ->fetchAll();
    }

    function update($value)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('UPDATE priority SET priority_name = ? WHERE priority_id = ?');
        $stmt->bindValue(1, $value['priority_name'], PDO::PARAM_STR);
        $stmt->bindValue(2, $value['priority_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    function delete(int $id)
    {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare('DELETE FROM priority WHERE priority_id = ?');
        $stmt->execute([$id]);
    }
}