<?php


class UserController
{
    public function actionRegister(): bool
    {
        $firstName = false;
        $lastName = false;
        $email = false;
        $password = false;
        $role = false;
        $result = false;

        if (isset($_POST['sign-up'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $errors = false;

            if (!User::checkFirstName($firstName)) {
                $errors[] = 'The first name must contain more then 5 symbols';
            }

            if (!User::checklastName($lastName)) {
                $errors[] = 'The last name must contain more then 5 symbols';
            }

            if (!User::checkRole($role)) {
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
                $result = User::register($firstName, $lastName, $email, $password, $role);
                header("Location: /user/login");
            }
        }

        require_once(ROOT . '/views/user/register.php');
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

            $user = User::checkUserData($email, $password);

            if ($user == false) {
                $errors[] = 'Incorrect data for login';
            } else {
                User::auth($user);
                header("Location: /tasks");
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["id"]);
        unset($_SESSION["role"]);
        unset($_SESSION["first_name"]);
        unset($_SESSION["last_name"]);
        unset($_SESSION["email"]);
        header("Location: /");
    }
}