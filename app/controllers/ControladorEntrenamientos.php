<?php
class ControladorEntrenamientos{
    public function inicioTraining(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $trainingDAO = new TrainingDAO($conn);
        $trainings = $trainingDAO->getAll();
        require 'app/views/training.php';
    }

    public function registerTraining(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = htmlentities($_POST['name']);
            $description = htmlentities($_POST['description']);
            $difficultyLevel = htmlentities($_POST['difficultyLevel']);
            $duration = htmlentities($_POST['duration']);
            $category = htmlentities($_POST['category']);
            $trainingPhoto = 'foto.png';

            $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $conexionDB->getConexion();

            $trainingDAO = new TrainingDAO($conn);
            $training = new Training();

            $training->setName($name);
            $training->setDescription($description);
            $training->setDifficultyLevel($difficultyLevel);
            $training->setDuration($duration);
            $training->setCategory($category);
            $training->setTrainingPhoto($trainingPhoto);
            $training->setIdUser($_SESSION['idUser']);

            if($trainingDAO->insertTraining($training)){
                header('location: index.php?accion=inicioTraining');
            }

        }
    }

    public function deleteTraining(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $trainingDAO = new TrainingDAO($conn);

        $idTraining = htmlentities($_GET['id']);
        
        if($trainingDAO->delete($idTraining)){
            header('location: index.php?accion=inicioTraining');
        }
    }

    public function routingTraining(){
        require 'app/views/routineTraining.php';
    }

    public function editTraining(){
        $error = '';
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $idTraining = htmlentities($_GET['id']);
        $trainingDAO = new TrainingDAO($conn);

        $training = $trainingDAO->getById($idTraining);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name = htmlentities($_POST['name']);
            $duration = htmlentities($_POST['duration']);
            $difficultyLevel = htmlentities($_POST['difficultyLevel']);
            $category = htmlentities($_POST['category']);
            $description = htmlentities($_POST['description']);

            if(empty($name) || empty($duration) || empty($difficultyLevel) || empty($category) || empty($description)){
                $error = 'Los campos son obligatorios';
            }else{
                $training->setName($name);
                $training->setDuration($duration);
                $training->setDifficultyLevel($difficultyLevel);
                $training->setCategory($category);
                $training->setDescription($description);
                if($trainingDAO->update($training)){
                    header('location: index.php?accion=inicioTraining');
                    die();
                }else{
                    $error = 'Error al actualizar los datos de la rutina de entrenamiento';
                }
            }
        }
    }
}