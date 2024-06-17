<?php
class ControladorFavorito{
    public function inicioFavourite(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $exerciseFavouriteDAO = new ExerciseFavouriteDAO($conn);
        $recipeFavouriteDAO = new RecipeFavouriteDAO($conn);
        $idUser = $_SESSION['idUser'];
        $exerciseFavourites = $exerciseFavouriteDAO->getAllByIdUser($idUser);
        $recipeFavourites = $recipeFavouriteDAO->getAllByIdUser($idUser);

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

    public function insertRecipeFavourite(){
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();
    
        $idRecipe = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $idUser = $_SESSION['idUser'];
    
        $recipeFavouriteDAO = new RecipeFavouriteDAO($conn);
        $recipeFavourite = new RecipeFavourite();
    
        $recipeFavourite->setIdRecipe($idRecipe);
        $recipeFavourite->setIdUser($idUser);

        if ($recipeFavouriteDAO->insertRecipeFavourite($recipeFavourite)) {
            print json_encode(['respuesta' => 'ok']);
        } else {
            print json_encode(['respuesta' => 'error']);
        }
    }

    public function deleteRecipeFavourite(){
        $connexionDB = new ConexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConexion();

        $idRecipe = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $recipeFavouriteDAO = new RecipeFavouriteDAO($conn);
        if(!$favorito = $recipeFavouriteDAO->getByIdRecipeIdUser($idRecipe, $_SESSION['idUser'])){
            print json_encode(['respuesta'=>'error', 'mensaje'=>'el favorito no existe']);
            die();
        }
        
        if($recipeFavouriteDAO->deleteRecipeFavourite($favorito)){
            print json_encode(['respuesta'=>'ok']);
        }else{
            print json_encode(['respuesta'=>'error']);
        }
    }

}