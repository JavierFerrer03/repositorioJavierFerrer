<?php
class ControladorSesion{
    public function inicioSession(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $sessionDAO = new SessionDAO($conn);
        $idTraining = htmlentities($_GET['id']);

        $sessions = $sessionDAO->getAllByIdTraining($idTraining);

        require 'app/views/sessionTraining.php';
    }

    public function editSession(){
        $error = '';

        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $idSession = htmlentities($_GET['id']);
        $sessionDAO = new SessionDAO($conn);

        $session = $sessionDAO->getById($idSession);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $type = htmlentities($_POST['type']);
            $description = htmlentities($_POST['description']);
            $idTraining = htmlentities($_POST['idTraining']);

            if(empty($type) || empty($description)){
                $error = 'Los campos son obligatorios';
            }else{
                $session->setType($type);
                $session->setDescription($description);
                if($sessionDAO->update($session)){
                    header('location: index.php?accion=inicioSession&id=' . $idTraining);
                    die();
                }else{
                    $error = 'Los cambios no se han actualizado';
                }
            }
        }
    }
}