<?php 
require_once ('app/controllers/ControladorInicio.php');
require_once ('app/controllers/ControladorUsuarios.php');
require_once ('app/controllers/ControladorEntrenamientos.php');
require_once ('app/controllers/ControladorSesion.php');
require_once ('app/controllers/ControladorDietas.php');
require_once ('app/controllers/ControladorEjercicios.php');
require_once ('app/controllers/ControladorFavorito.php');
require_once ('app/controllers/ControladorRecetas.php');
require_once ('app/controllers/ControladorSobreMi.php');
require_once ('app/config/config.php');
require_once ('app/models/ConexionDB.php');
require_once ('app/models/User.php');
require_once ('app/models/UserDAO.php');
require_once ('app/models/Training.php');
require_once ('app/models/TrainingDAO.php');
require_once ('app/models/Session.php');
require_once ('app/models/SessionDAO.php');
require_once ('app/models/Diet.php');
require_once ('app/models/DietDAO.php');
require_once ('app/models/Exercise.php');
require_once ('app/models/ExerciseDAO.php');
require_once ('app/models/ExerciseFavourite.php');
require_once ('app/models/ExerciseFavouriteDAO.php');
require_once ('app/models/Recipe.php');
require_once ('app/models/RecipeDAO.php');
require_once ('app/models/RecipeFavourite.php');
require_once ('app/models/RecipeFavouriteDAO.php');

session_start();

$mapa = array(
    'inicio' => array('controlador' => 'ControladorInicio', 'metodo' => 'inicio', 'privada' => false),
    'login' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'login', 'privada' => false),
    'logout' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'logout', 'privada' => true),
    'register' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'register', 'privada' => false),
    'profile' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'profile', 'privada' => true),
    'editProfile' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'editProfile', 'privada' => true),
    'clients' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'clients', 'privada' => true),
    'darBaja' => array('controlador' => 'ControladorUsuarios', 'metodo' => 'darBaja', 'privada' => true),
    'inicioTraining' => array('controlador' => 'ControladorEntrenamientos', 'metodo' => 'inicioTraining', 'privada' => true),
    'registerTraining' => array('controlador' => 'ControladorEntrenamientos', 'metodo' => 'registerTraining', 'privada' => true),
    'deleteTraining' => array('controlador' => 'ControladorEntrenamientos', 'metodo' => 'deleteTraining', 'privada' => true),
    'editTraining' => array('controlador' => 'ControladorEntrenamientos', 'metodo' => 'editTraining', 'privada' => true),
    'inicioSession' => array('controlador' => 'ControladorSesion', 'metodo' => 'inicioSession', 'privada' => true),
    'editSession' => array('controlador' => 'ControladorSesion', 'metodo' => 'editSession', 'privada' => true),
    'registerSession' => array('controlador' => 'ControladorSesion', 'metodo' => 'registerSession', 'privada' => true),
    'deleteSession' => array('controlador' => 'ControladorSesion', 'metodo' => 'deleteSession', 'privada' => true),
    'inicioDiets' => array('controlador' => 'ControladorDietas', 'metodo' => 'inicioDiets', 'privada' => true),
    'deleteDiet' => array('controlador' => 'ControladorDietas', 'metodo' => 'deleteDiet', 'privada' => true),
    'logMeal' => array('controlador' => 'ControladorDietas', 'metodo' => 'logMeal', 'privada' => true),
    'getAccumulatedData' => array('controlador' => 'ControladorDietas', 'metodo' => 'getAccumulatedData', 'privada' => true),
    'registerDiet' => array('controlador' => 'ControladorDietas', 'metodo' => 'registerDiet', 'privada' => true),
    'infoDiet' => array('controlador' => 'ControladorDietas', 'metodo' => 'infoDiet', 'privada' => true),
    'inicioExercise' => array('controlador' => 'ControladorEjercicios', 'metodo' => 'inicioExercise', 'privada' => true),
    'insertExercise' => array('controlador' => 'ControladorEjercicios', 'metodo' => 'insertExercise', 'privada' => true),
    'deleteExercise' => array('controlador' => 'ControladorEjercicios', 'metodo' => 'deleteExercise', 'privada' => true),
    'inicioFavourite' => array('controlador' => 'ControladorFavorito', 'metodo' => 'inicioFavourite', 'privada' => true),
    'insertExerciseFavourite' => array('controlador' => 'ControladorFavorito', 'metodo' => 'insertExerciseFavourite', 'privada' => true),
    'deleteExerciseFavourite' => array('controlador' => 'ControladorFavorito', 'metodo' => 'deleteExerciseFavourite', 'privada' => true),
    'inicioRecipe' => array('controlador' => 'ControladorRecetas', 'metodo' => 'inicioRecipe', 'privada' => true),
    'insertRecipe' => array('controlador' => 'ControladorRecetas', 'metodo' => 'insertRecipe', 'privada' => true),
    'deleteRecipe' => array('controlador' => 'ControladorRecetas', 'metodo' => 'deleteRecipe', 'privada' => true),
    'insertRecipeFavourite' => array('controlador' => 'ControladorFavorito', 'metodo' => 'insertRecipeFavourite', 'privada' => true),
    'deleteRecipeFavourite' => array('controlador' => 'ControladorFavorito', 'metodo' => 'deleteRecipeFavourite', 'privada' => true),
    'sobreMi' => array('controlador' => 'ControladorSobreMi', 'metodo' => 'sobreMi', 'privada' => true),
);

if(isset($_GET['accion'])){ 
    if(isset($mapa[$_GET['accion']])){
        $accion = $_GET['accion'];
    }
    else{
        //La acción no existe
        header('Status: 404 Not found');
        echo 'Página no encontrada';
        die();
    }
}else{
    $accion='inicio';   //Acción por defecto
}

//$acción ya tiene la acción a ejecutar, cogemos el controlador y metodo a ejecutar del mapa
$controlador = $mapa[$accion]['controlador'];
$metodo = $mapa[$accion]['metodo'];

//Ejecutamos el método de la clase controlador
$objeto = new $controlador();
$objeto->$metodo();
?>