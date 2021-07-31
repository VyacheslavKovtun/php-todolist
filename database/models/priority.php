<?php

class Priority
{
    public $id;
    public $name;

    public $tasks;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function setName(string $name): void 
    {
        $this->name = $name;
    }
}