<?php
require_once 'views/header.php';
require_once 'database/config/databaseConnection.php';
require_once 'database/models/priority.php';
require_once 'database/repository/priorityRepository.php';
require_once 'database/repository/statusRepository.php';
require_once 'database/repository/taskRepository.php';
require_once 'database/models/status.php';
require_once 'database/models/task.php';
?>
    
<?php

    $taskRepos = new TaskRepository();
    $priorityRepos = new PriorityRepository();
    $statusRepos = new StatusRepository();
    
    if(isset($_POST['task_text']) && isset($_POST['task_status_id']) && isset($_POST['priority_id']))
    {
        $newTask = [
            "priority_id" => $_POST['priority_id'],
            "task_status_id" => $_POST['task_status_id'],
            "task_text" => $_POST['task_text'],
            "create_date" => date("Y-m-d"),
            "complete_date" => $_POST['complete_date']
        ];

        $taskRepos->create($newTask);
        unset($_POST);
    }
    $allTasks = $taskRepos->getAll();
    require_once 'views/tableFunction.php';    
    showTasks($allTasks, $taskRepos);
?>


<?php
require_once 'views/footer.php';
?>