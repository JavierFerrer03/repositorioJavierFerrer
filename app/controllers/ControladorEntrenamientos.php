<?php
class ControladorEntrenamientos
{
    public function inicioTraining()
    {
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $trainingDAO = new TrainingDAO($conn);
        $trainings = $trainingDAO->getAll();
        require 'app/views/training.php';
    }

    public function registerTraining()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlentities($_POST['name']);
            $description = htmlentities($_POST['description']);
            $difficultyLevel = htmlentities($_POST['difficultyLevel']);
            $duration = htmlentities($_POST['duration']);
            $category = htmlentities($_POST['category']);
            $trainingPhoto = $_FILES['trainingPhoto'];

            $error = "";

            $fotoPaths = array();
            foreach ($trainingPhoto['tmp_name'] as $key => $tmp_name) {
                $formats = ['image/jpeg', 'image/gif', 'image/webp', 'image/png'];
                if (in_array($trainingPhoto['type'][$key], $formats)) {
                    $nombreArchivo = md5(time() + rand());
                    $partes = explode('.', $trainingPhoto['name'][$key]);
                    $extension = end($partes);
                    $foto = $nombreArchivo . '.' . $extension;

                    while (file_exists("web/trainingPhoto/$foto")) {
                        $nombreArchivo = md5(time() + rand());
                        $foto = $nombreArchivo . '.' . $extension;
                    }

                    $rutaDestino = "web/trainingPhoto/$foto";
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

            $trainingDAO = new TrainingDAO($conn);
            $training = new Training();

            $training->setName($name);
            $training->setDescription($description);
            $training->setDifficultyLevel($difficultyLevel);
            $training->setDuration($duration);
            $training->setCategory($category);
            $training->setIdUser($_SESSION['idUser']);

            if(count($fotoPaths) > 0){
                $training->setTrainingPhoto($fotoPaths[0]);
                if($trainingDAO->insertTraining($training)){
                    header('location: index.php?accion=inicioTraining');
                    die();
                }else{
                    $error = 'No se ha podido insertar el entrenamiento';
                }
            }else{
                $error = 'Error al cargar las imagenes en la base de datos';
            }
        }
    }

    public function deleteTraining()
    {
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $trainingDAO = new TrainingDAO($conn);

        $idTraining = htmlentities($_GET['id']);

        if ($trainingDAO->delete($idTraining)) {
            header('location: index.php?accion=inicioTraining');
        }
    }

    public function routingTraining()
    {
        require 'app/views/routineTraining.php';
    }

    public function editTraining()
    {
        $error = '';
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $idTraining = htmlentities($_GET['id']);
        $trainingDAO = new TrainingDAO($conn);

        $training = $trainingDAO->getById($idTraining);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlentities($_POST['name']);
            $duration = htmlentities($_POST['duration']);
            $difficultyLevel = htmlentities($_POST['difficultyLevel']);
            $category = htmlentities($_POST['category']);
            $description = htmlentities($_POST['description']);

            if (empty($name) || empty($duration) || empty($difficultyLevel) || empty($category) || empty($description)) {
                $error = 'Los campos son obligatorios';
            } else {
                $training->setName($name);
                $training->setDuration($duration);
                $training->setDifficultyLevel($difficultyLevel);
                $training->setCategory($category);
                $training->setDescription($description);
                if ($trainingDAO->update($training)) {
                    header('location: index.php?accion=inicioTraining');
                    die();
                } else {
                    $error = 'Error al actualizar los datos de la rutina de entrenamiento';
                }
            }
        }
    }
}
