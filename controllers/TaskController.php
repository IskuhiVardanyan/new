<?php


class TaskController
{

    public function actionIndex(): bool
    {
        $all_tasks = Task::getAllTasks();
        require_once(ROOT . '/views/admin/dashboard.php');
        return true;
    }

    public static function actionCreate(): bool
    {
        if (isset($_POST['submit'])) {
            $taskName = $_POST['task_name'];
            $createdBy = $_POST['created_by'];
            $assignedTo = $_POST['select_developers'];
            $description = $_POST['text'];
            $status = $_POST['status'];

          Task::addTask( $taskName, $createdBy, $assignedTo, $description, $status);
          header("Location: /tasks");
        }
        require_once(ROOT . '/views/admin/add_new_task.php');
        return true;
    }


    public static function actionUpdate($id): bool
    {
        $arr = Task::getTaskById($id);
        if (isset($_POST['submit'])) {
            foreach ($arr as $value) {
                if ($value['created_by'] != $_SESSION["id"]) {
                    $status = $_POST['status'];
                    Task::editTaskByDeveloper($id, $status);
                    header("Location: /tasks");
                } else {

                    $status = $_POST['status'];
                    $assignedTo = $_POST['select_developers'];
                    $description = $_POST['text'];
                    // die($description);
                    Task::editTaskByManager($id, $status, $assignedTo, $description);
                    header("Location: /tasks");
                }
            }
        }
        require_once(ROOT . '/views/admin/edit.php');
        return true;
    }

    public static function actionDelete($id)
    {
        Task::deleteTask($id);
        header("Location: /tasks");
    }


    public static function actionDescription($id)
    {
        $arr = Task::getTaskById($id);
        require_once(ROOT . '/views/admin/description.php');
        return true;
    }
}