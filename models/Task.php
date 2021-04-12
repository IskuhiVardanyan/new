<?php

class Task
{
    public static function addTask($taskName, $createdBy, $assignedTo, $description, $status)
    {
            $db = Db::getConnection();

            $sql = "INSERT INTO `tasks` (`task_name`, `created_by`, `assigned_to`, `description`, `status`)
            VALUES (:taskName, :createdBy, :assignedTo, :description, :status)";

            $result = $db->prepare($sql);
            $result->bindParam(':taskName', $taskName);
            $result->bindParam(':createdBy', $createdBy);
            $result->bindParam(':assignedTo', $assignedTo);
            $result->bindParam(':description', $description);
            $result->bindParam(':status', $status);
            return $result->execute();
    }

    public static function getAllTasks()
    {
        $db = Db::getConnection();

        $sql_tasks = 'SELECT * FROM `tasks` LEFT JOIN `users` ON tasks.assigned_to = users.user_id';
        $result_tasks = $db->prepare($sql_tasks);
        $result_tasks->execute();
        return $result_tasks->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTaskById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `tasks` LEFT JOIN `users` ON tasks.assigned_to = users.user_id WHERE `task_id` =' . $id;
        $result = $db->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserName($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT `first_name`, `last_name` FROM `users` WHERE `user_id` =' . $id;
        $result = $db->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteTask($num)
    {
        $db = Db::getConnection();
        $sql_delete = 'DELETE FROM `tasks` WHERE `task_id`=' . $num;
//      die($sql_delete);
        $result_delete = $db->prepare($sql_delete);
        return $result_delete->execute();
    }

    public static function editTaskByDeveloper($id, $status)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `tasks` SET `status` =' . "'" . $status ."'" . " " . 'WHERE' . ' `task_id`=' . $id;
//      die($sql);
        $result = $db->prepare($sql);
//      $result->bindParam(':status', $status);
        return $result->execute();
    }

    public static function editTaskByManager($id, $status, $assignedTo, $description)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `tasks` SET `status` =' . "'" . $status . "', `assigned_to` =" . "'" . $assignedTo . "',
        `description` =" . "'" . $description . "'" . " " . 'WHERE' . ' `task_id`=' . $id;
//      die($sql);
        $result = $db->prepare($sql);
//      $result->bindParam(':description', $description);
        return $result->execute();
    }
}