<?php 
require_once 'database/config/databaseConnection.php';
require_once 'database/repository/priorityRepository.php';
require_once 'database/repository/statusRepository.php';
require_once 'database/repository/taskRepository.php';
?>

<a href="index.php"><button>Назад</button></a>
<form method="POST">
    <input type="text" name="update_task_id" placeholder="task_id">
    <input type="submit">
</form>

<?php

$taskRepos = new TaskRepository();

if(isset($_POST['update_task_id']))
{
    $task = $taskRepos->get($_POST['update_task_id']);
    $_POST['task_id'] = $task['task_id'];
    $_POST['task_text'] = $task['task_text'];
    $_POST['task_status_id'] = $task['task_status_id'];
    $_POST['priority_id'] = $task['priority_id'];
    $_POST['create_date'] = $task['create_date'];
    $_POST['complete_date'] = $task['complete_date'];
}

?>

<form method="POST">
    <div>
      <div role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">ToDo</h4>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="text" name="new_task_id" value="<?= $_POST['task_id'] ?>" class="form-control validate" readonly>
              <label data-error="wrong" data-success="right">Задача id</label>
            </div>
            <div class="md-form mb-5">
              <input type="text" name="new_task_text" value="<?= $_POST['task_text'] ?>" class="form-control validate">
              <label data-error="wrong" data-success="right">Задача</label>
            </div>
            <div class="md-form mb-4">
              <input type="text" name="new_task_status_id" value="<?= $_POST['task_status_id'] ?>" class="form-control validate">
              <label data-error="wrong" data-success="right">Статус id (1-3)</label>
            </div>
            <div class="md-form mb-4">
              <input type="text" name="new_priority_id" value="<?= $_POST['priority_id'] ?>" class="form-control validate">
              <label data-error="wrong" data-success="right">Приоритет id (1-3)</label>
            </div>
            <div class="md-form mb-4">
              <input type="date" name="new_create_date" value="<?= $_POST['create_date'] ?>" class="form-control validate" readonly>
              <label data-error="wrong" data-success="right">Дата создания</label>
            </div>
            <div class="md-form mb-4">
              <input type="date" name="new_complete_date" value="<?= $_POST['complete_date'] ?>" class="form-control validate">
              <label data-error="wrong" data-success="right">Дата выполнения</label>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-outline-primary waves-effect">
          </div>
        </div>
      </div>
    </div>
</form>

<?php

if(isset($_POST['new_task_text']))
{
    $task['task_id'] = $_POST['new_task_id'];
    $task['task_text'] = $_POST['new_task_text'];
    $task['task_status_id'] = $_POST['new_task_status_id'];
    $task['priority_id'] = $_POST['new_priority_id'];
    $task['create_date'] = $_POST['new_create_date'];
    $task['complete_date'] = $_POST['new_complete_date'];
    $taskRepos->update($task);
    unset($_POST);
}

?>