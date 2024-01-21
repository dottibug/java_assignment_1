<?php
//get tasklist array from POST
$task_list = filter_input(INPUT_POST, 'tasklist',
    FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($task_list === NULL) {
    $task_list = array();

//    add some hard-coded starting values to make testing easier
//    $task_list[] = 'Write chapter';
//    $task_list[] = 'Edit chapter';
//    $task_list[] = 'Proofread chapter';
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch ($action) {
    case 'Add Task':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            array_push($task_list, $new_task);
        }
        break;
    case 'Delete Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;
    case 'Modify Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        $task_to_modify = $task_list[$task_index];
        break;
    case 'Save Changes':
        // Get modifiedtaskid and the new modified task
        $task_index = filter_input(INPUT_POST, 'modifiedtaskid', FILTER_VALIDATE_INT);
        $modified_task = filter_input(INPUT_POST, 'modifiedtask');
        // Find index in task list and update value
        $task_list[$task_index] = $modified_task;
        // Reset task_to_modify
        $task_to_modify = '';
        break;

    case 'Cancel Changes':
        // Reset task to modify
        $task_to_modify = '';
        break;

    case 'Promote Task':
        // Get current task index
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === 0) {
            $errors[] = 'The first task can not be promoted.';
        } else {
            $current_task = $task_list[$task_index];
            $previous_task = $task_list[$task_index - 1];

            // Swap current and previous tasks
            $task_list[$task_index - 1] = $current_task;
            $task_list[$task_index] = $previous_task;
        }
        break;

    case 'Demote Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === array_key_last($task_list)) {
            $errors[] = 'The last task can not be demoted.';
        } else {
            $current_task = $task_list[$task_index];
            $next_task = $task_list[$task_index + 1];

            // Swap current and next tasks
            $task_list[$task_index] = $next_task;
            $task_list[$task_index + 1] = $current_task;
        }
        break;

    case 'Sort Tasks':
        sort($task_list);
        break;
}

include('task_list.php');
?>