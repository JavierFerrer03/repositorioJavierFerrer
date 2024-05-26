<?php 
require_once ('app/controllers/ControladorInicio.php');
require_once ('app/controllers/ControladorUsuarios.php');
require_once ('app/controllers/ControladorEntrenamientos.php');
require_once ('app/controllers/ControladorSesion.php');
require_once ('app/config/config.php');
require_once ('app/models/ConexionDB.php');
require_once ('app/models/User.php');
require_once ('app/models/UserDAO.php');
require_once ('app/models/Training.php');
require_once ('app/models/TrainingDAO.php');
require_once ('app/models/Session.php');
require_once ('app/models/SessionDAO.php');

session_start();

$mapa = array(
    'inicio'=>array('controlador'=>'ControladorInicio','metodo'=>'inicio','privada'=>false),
    'login'=>array('controlador'=>'ControladorUsuarios','metodo'=>'login'),
    'logout'=>array('controlador'=>'ControladorUsuarios','metodo'=>'logout'),
    'register'=>array('controlador'=>'ControladorUsuarios','metodo'=>'register'),
    'inicioTraining'=>array('controlador'=>'ControladorEntrenamientos','metodo'=>'inicioTraining'),
    'registerTraining'=>array('controlador'=>'ControladorEntrenamientos','metodo'=>'registerTraining'),
    'deleteTraining'=>array('controlador'=>'ControladorEntrenamientos','metodo'=>'deleteTraining'),
    'editTraining'=>array('controlador'=>'ControladorEntrenamientos','metodo'=>'editTraining'),
    'inicioSession'=>array('controlador'=>'ControladorSesion','metodo'=>'inicioSession'),
    'editSession'=>array('controlador'=>'ControladorSesion','metodo'=>'editSession'),
);

if(isset($_GET['accion'])){ //Compruebo si me han pasado una acción concreta, sino pongo la accción por defecto inicio
    if(isset($mapa[$_GET['accion']])){  //Compruebo si la accción existe en el mapa, sino muestro error 404
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