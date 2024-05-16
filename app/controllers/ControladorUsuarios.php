<?php
class ControladorUsuarios
{

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $conexionDB->getConexion();

            $email = htmlentities($_POST['email']);
            $password = htmlentities($_POST['password']);
            $error = '';
            $userDAO = new UserDAO($conn);

            $user = $userDAO->getByEmail($email);
            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    setcookie('sid', $user->getSid(), time() + 24 * 60 * 60, '/');
                    $_SESSION['username'] = $user->getUsername();
                    header('location: index.php');
                } else {
                    $error = 'La contraseña no coincide';
                }
            } else {
                $error = 'El email no coincide';
            }
        }
        require 'app/views/login.php';
    }

    public function register()
    {
        /* $error = ''; */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlentities($_POST['username']);
            $email = htmlentities($_POST['email']);
            $password = htmlentities($_POST['password']);
            $firstName = htmlentities($_POST['firstName']);
            $lastName = htmlentities($_POST['lastName']);
            $dni = htmlentities($_POST['dni']);

            $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $conexionDB->getConexion();

            $userDAO = new UserDAO($conn);
            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $passwordCifrado = password_hash($password, PASSWORD_DEFAULT);
            $user->setPassword($passwordCifrado);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setDni($dni);
            $user->setSid(sha1(rand() + time()), true);

            if ($userDAO->insertUsers($user)) {
                header('location: index.php');
            }
        }
        require 'app/views/register.php';
    }
}
