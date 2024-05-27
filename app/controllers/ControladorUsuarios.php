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
                    $_SESSION['rol'] = $user->getRol();
                    $_SESSION['idUser'] = $user->getId();
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
        $error = '';
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
            $user->setRol('CLIENTE');
            $user->setSid(sha1(rand() + time()), true);

            if (empty($username) || empty($email) || empty($password) || empty($firstName) || empty($lastName) || empty($dni)) {
                $error = '¡Los campos son obligatorios!';
            } else if ($userDAO->getByEmail($email)) {
                $error = '¡Ya existe un usuario con ese correo!';
            } else if (strlen($password) <= 4) {
                $error = '¡La contraseña debe contener más de 4 caracteres!';
            } else {
                $userDAO->insertUsers($user);
                header('location: index.php');
                die();
            }
        }
        require 'app/views/register.php';
    }

    public function logout()
    {
        unset($_SESSION['username']);
        setcookie('sid', '', 0);
        header('Location: index.php?accion=inicio');
    }

    public function profile(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        if (!isset($_SESSION['idUser'])) {
            header('Location: index.php?accion=login');
            die();
        }

        $idUser = $_SESSION['idUser'];
        $userDAO = new UserDAO($conn);

        $user=$userDAO->getById($idUser);
        require 'app/views/profile.php';
    }

    public function editProfile(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $idUser = htmlentities($_GET['id']);
        $userDAO = new UserDAO($conn);
        $user = $userDAO->getById($idUser);
        $error = '';

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username = htmlentities($_POST['username']);
            $email = htmlentities($_POST['email']);
            $firstName = htmlentities($_POST['firstName']);
            $lastName = htmlentities($_POST['lastName']);
            $dni = htmlentities($_POST['dni']);

            if(empty($username) || empty($email) || empty($firstName) || empty($lastName) || empty($dni)){
                $error = '¡Los campos son obligatorios!';
            }else{
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setFirstName($firstName);
                $user->setLastName($lastName);
                $user->getDni($dni);
                if($userDAO->update($user)){
                    header('location: index.php?accion=profile');
                    die();
                }else{
                    $error = 'Error al actualizar los datos';
                }
            }
        }
    }

    public function clients(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $userDAO = new UserDAO($conn);
        $users = $userDAO->getAllClients();

        require 'app/views/clients.php';
    }

    public function darBaja(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $userDAO = new UserDAO($conn);
        $idUser = htmlentities($_GET['id']);

        if($userDAO->deleteById($idUser)){
            header('location: index.php?accion=clients');
            die();
        }
    }
}
