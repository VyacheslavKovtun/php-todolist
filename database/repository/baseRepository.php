<?php

require_once 'repository.php';
require_once 'database/config/databaseConnection.php';

abstract class BaseRepository implements Repository
{
    protected $connection;
    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    abstract function create($value);
    
    abstract function get(int $id);

    abstract function getId($name);

    abstract function getAll();

    abstract function update($value);

    abstract function delete(int $id);
}