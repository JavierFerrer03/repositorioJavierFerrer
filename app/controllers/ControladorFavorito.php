<?php
class ControladorFavorito{
    public function inicioFavourite(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $exerciseFavouriteDAO = new ExerciseFavouriteDAO($conn);
        $idUser = $_SESSION['idUser'];
        $exerciseFavourites = $exerciseFavouriteDAO->getAllByIdUser($idUser);

        require 'app/views/favourites.php';
    }

    public function insertExerciseFavourite(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();
    
        $idExercise = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $idUser = $_SESSION['idUser'];
    
        $exerciseFavouriteDAO = new ExerciseFavouriteDAO($conn);
        $exerciseFavourite = new ExerciseFavourite();
    
        $exerciseFavourite->setIdExercise($idExercise);
        $exerciseFavourite->setIdUser($idUser);

        if ($exerciseFavouriteDAO->insertExerciseFavourite($exerciseFavourite)) {
            print json_encode(['respuesta' => 'ok']);
        } else {
            print json_encode(['respuesta' => 'error']);
        }
    }    

    public function deleteExerciseFavourite(){
        $connexionDB = new ConexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConexion();

        $idExercise = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $exerciseFavouriteDAO = new ExerciseFavouriteDAO($conn);
        if(!$favorito = $exerciseFavouriteDAO->getByIdExerciseIdUser($idExercise, $_SESSION['idUser'])){
            print json_encode(['respuesta'=>'error', 'mensaje'=>'el favorito no existe']);
            die();
        }
        
        if($exerciseFavouriteDAO->deleteExerciseFavourite($favorito)){
            print json_encode(['respuesta'=>'ok']);
        }else{
            print json_encode(['respuesta'=>'error']);
        }
    }

}