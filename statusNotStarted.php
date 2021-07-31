<?php 
require_once 'views/header.php';
require_once 'database/config/databaseConnection.php';
require_once 'database/repository/statusRepository.php';
require_once 'database/repository/taskRepository.php';

$taskRepos = new TaskRepository();
$statusRepos = new StatusRepository();
$statusId = $statusRepos->getId('not started');
$tasks = $taskRepos->getTasksByStatus($statusId['task_status_id']);

require_once 'views/tableFunction.php';
showTasks($tasks, $taskRepos);

require_once 'views/footer.php';
?>