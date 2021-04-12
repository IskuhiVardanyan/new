<?php

class NewadminController extends UserController {

    public function actionIndex(): bool
    {
        if($_SESSION)
        require_once (ROOT . '/views/newadmin/dashboard.php');
    }

    public function actionRegister(): bool
    {
        $firstName = false;
        $lastName = false;
        $email = false;
        $password = false;
        $admin_role = false;
        $result = false;

        if (isset($_POST['sign-up'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $admin_role = $_POST['admin_role'];

            $errors = false;

            if (!User::checkFirstName($firstName)) {
                $errors[] = 'The first name must contain more then 5 symbols';
            }

            if (!User::checklastName($lastName)) {
                $errors[] = 'The last name must contain more then 5 symbols';
            }

            if (!User::checkRole($admin_role)) {
                $errors[] = 'The role must be selected';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'The password must contain more then 6 symbols';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Email already exists';
            }

            if ($errors == false) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $result = Admin::register($firstName, $lastName, $email, $password, $admin_role);
                header("Location: /newadmin/login");
            }
        }

        require_once(ROOT . '/views/newadmin/register.php');
        return true;
    }

    public function actionLogin(): bool
    {
        $email = false;
        $password = false;

        if (isset($_POST['sign-in'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'The password must contain more then 6 symbols';
            }

            $admin_user = Admin::checkUserData($email, $password);

            if ($admin_user == false) {
                $errors[] = 'Incorrect data for login';
            } else {
                User::auth($admin_user);
                header("Location: /tasks");
            }
        }

        require_once(ROOT . '/views/newadmin/login.php');
        return true;
    }
}