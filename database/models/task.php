<?php

class Task
{
    private $id;
    private $text;
    private $create_date;
    private $complete_date;

    private $priority_id;
    private $status_id;

    public function __construct(string $text, DateTime $create_date, DateTime $complete_date)
    {
        $this->text = $text;
        $this->create_date = $create_date;
        $this->complete_date = $complete_date;
    }

    public function getText(): string 
    {
        return $this->text;
    }

    public function setText(string $text): void 
    {
        $this->text = $text;
    }

    public function getCreateDate(): DateTime 
    {
        return $this->create_date;
    }

    public function setCreateDate(DateTime $create_date): void 
    {
        $this->create_date = $create_date;
    }

    public function getCompleteDate(): DateTime 
    {
        return $this->complete_date;
    }

    public function setCompleteDate(DateTime $complete_date): void 
    {
        $this->complete_date = $complete_date;
    }
}