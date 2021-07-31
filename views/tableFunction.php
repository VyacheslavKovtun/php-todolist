<?php
function showTasks($tasks, $taskRepos)
{
    foreach($tasks as $task)
    {
        ?>
        <tr id="row<?= $task['task_id'] ?>">
            <th scope="row">
                <div class="custom-control custom-checkbox">
                    <form action method="POST">
                        <input type="submit" name="completed_task_id" class="custom-control-input" value = "<?= $task['task_id'] ?>" id="cb<?= $task['task_id'] ?>">
                        <label class="custom-control-label" for="cb<?= $task['task_id'] ?>"><?= $task['task_text'] ?></label>
                    </form>
                </div>
            </th>
            <td><?= $taskRepos->getStatusByTaskId($task['task_id'])['task_status_name']; ?></td>
            <td><?= $taskRepos->getPriorityByTaskId($task['task_id'])['priority_name']; ?></td>
            <td><?= $task['create_date'] ?></td>
            <td><?= $task['complete_date'] ?></td>
            <td><form method="POST"><input type="submit" name="delete_task_id" value="<?= $task['task_id'] ?>"></form></td>
        </tr>
        <?php
    } 
}

if(isset($_POST['completed_task_id']))
{
    $task = $taskRepos->get($_POST['completed_task_id']);
    if($task['task_status_id'] != 3)
    {
       $task['task_status_id']++;
       $taskRepos->update($task);
    }
    unset($_POST['completed_task_id']);
}

if(isset($_POST['delete_task_id']))
{
    $taskRepos->delete($_POST['delete_task_id']);
    unset($_POST['delete_task_id']);
}

?>