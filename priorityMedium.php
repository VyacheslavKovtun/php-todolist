<?php 
require_once 'views/header.php';
require_once 'database/config/databaseConnection.php';
require_once 'database/repository/priorityRepository.php';
require_once 'database/repository/taskRepository.php';

$taskRepos = new TaskRepository();
$priorityRepos = new PriorityRepository();
$priorityId = $priorityRepos->getId('medium');
$tasks = $taskRepos->getTasksByPriority($priorityId['priority_id']);

require_once 'views/tableFunction.php';
showTasks($tasks, $taskRepos);

require_once 'views/footer.php';
?>