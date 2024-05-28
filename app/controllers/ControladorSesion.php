<?php
class ControladorSesion{
    public function inicioSession(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $sessionDAO = new SessionDAO($conn);
        $idTraining = htmlentities($_GET['id']);

        $_SESSION['idTraining'] = $idTraining;

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

    public function registerSession()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = htmlentities($_POST['type']);
            $description = htmlentities($_POST['description']);
            $sessionPhoto = $_FILES['sessionPhoto'];

            $error = "";

            $fotoPaths = array();
            foreach ($sessionPhoto['tmp_name'] as $key => $tmp_name) {
                $formats = ['image/jpeg', 'image/gif', 'image/webp', 'image/png'];
                if (in_array($sessionPhoto['type'][$key], $formats)) {
                    $nombreArchivo = md5(time() + rand());
                    $partes = explode('.', $sessionPhoto['name'][$key]);
                    $extension = end($partes);
                    $foto = $nombreArchivo . '.' . $extension;

                    while (file_exists("web/sessionPhoto/$foto")) {
                        $nombreArchivo = md5(time() + rand());
                        $foto = $nombreArchivo . '.' . $extension;
                    }

                    $rutaDestino = "web/sessionPhoto/$foto";
                    if (move_uploaded_file($tmp_name, $rutaDestino)) {
                        $fotoPaths[] = $rutaDestino;
                    } else {
                        $error = "La foto no se ha podido mover a la carpeta de destino";
                    }
                }else{
                    $error="El formato de los archivos no es compatible, Intentelo con otro formato";
                }
            }

            $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $conexionDB->getConexion();

            $sessionDAO = new SessionDAO($conn);
            $session = new Session();

            $session->setType($type);
            $session->setDescription($description);
            $session->setIdTraining($_SESSION['idTraining']);

            if(count($fotoPaths) > 0){
                $session->setSessionPhoto($fotoPaths[0]);
                if($sessionDAO->insertSession($session)){
                    header('location: index.php?accion=inicioSession&id=' . $_SESSION['idTraining']);
                    die();
                }else{
                    $error = 'No se ha podido insertar el entrenamiento';
                }
            }else{
                $error = 'Error al cargar las imagenes en la base de datos';
            }
        }
    }
}