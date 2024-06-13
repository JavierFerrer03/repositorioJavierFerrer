<?php
class ControladorEjercicios{
    public function inicioExercise(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();
    
        $idSession = $_GET['id'];
        $_SESSION['idSession'] = $idSession;
    
        $exerciseDAO = new ExerciseDAO($conn);
        $exercises = $exerciseDAO->getAllByIdSession($idSession);
    
        require 'app/views/exercise.php';
    }

    public function insertExercise(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name = htmlentities($_POST['name']);
            $description = htmlentities($_POST['description']);
            $repetitions = htmlentities($_POST['repetitions']);
            $series = htmlentities($_POST['series']);
            $exercisePhoto = $_FILES['exercisePhoto'];

            $fotoPaths = array();
            foreach ($exercisePhoto['tmp_name'] as $key => $tmp_name) {
                $formats = ['image/jpeg', 'image/gif', 'image/webp', 'image/png'];
                if (in_array($exercisePhoto['type'][$key], $formats)) {
                    $nombreArchivo = md5(time() + rand());
                    $partes = explode('.', $exercisePhoto['name'][$key]);
                    $extension = end($partes);
                    $foto = $nombreArchivo . '.' . $extension;

                    while (file_exists("web/exercisePhoto/$foto")) {
                        $nombreArchivo = md5(time() + rand());
                        $foto = $nombreArchivo . '.' . $extension;
                    }

                    $rutaDestino = "web/exercisePhoto/$foto";
                    if (move_uploaded_file($tmp_name, $rutaDestino)) {
                        $fotoPaths[] = $rutaDestino;
                    } else {
                        $error = "La foto no se ha podido mover a la carpeta de destino";
                    }
                }else{
                    $error="El formato de los archivos no es compatible, Intentelo con otro formato";
                }
            }

        }

        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $exerciseDAO = new ExerciseDAO($conn);
        $exercise = new Exercise();

        $exercise->setName($name);
        $exercise->setDescription($description);
        $exercise->setRepetitions($repetitions);
        $exercise->setSeries($series);
        $exercise->setIdSession($_SESSION['idSession']);

        if(count($fotoPaths) > 0){
            $exercise->setExercisePhoto($fotoPaths[0]);
            if($exerciseDAO->insertExercise($exercise)){
                header('location: index.php?accion=inicioExercise&id=' . $_SESSION['idSession']);
                die();
            }else{
                $error = 'No se ha podido insertar el entrenamiento';
            }
        }else{
            $error = 'Error al cargar las imagenes en la base de datos';
        }
    }

    public function deleteExercise(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $exerciseDAO = new ExerciseDAO($conn);
        $idExercise = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        if($exerciseDAO->deleteById($idExercise)){
            header('location: index.php?accion=inicioExercise&id=' . $_SESSION['idSession']);
        }else{
            $error = 'Error al eliminar el ejercicio';
        }
    }
}