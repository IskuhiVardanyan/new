<?php

class Admin
{
    public static function register($firstName, $lastName, $email, $password, $admin_role)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `myadmin` (first_name, last_name, email, password, admin_role)'
            . 'VALUES (:first_name, :last_name, :email, :password, :admin_role)';
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $result->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':admin_role', $admin_role, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `myadmin` WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $admin_user = $result->fetch();

        if ($admin_user && password_verify($password, $admin_user["password"])) {
            return [
                "admin_id"   =>  $admin_user['admin_id'],
                "admin_role" =>  $admin_user['admin_role'],
                "first_name" =>  $admin_user['first_name'],
                "last_name" =>  $admin_user['last_name'],
                "email" =>  $admin_user['email']
            ];
        }
        return false;
    }
}