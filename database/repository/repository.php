<?php

interface Repository
{
    function create($value);
    function get(int $id);
    function getId($name);
    function getAll();
    function update($value);
    function delete(int $id);
}