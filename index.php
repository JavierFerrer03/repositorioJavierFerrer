<?php 
require_once ('app/controllers/ControladorInicio.php');
require_once ('app/controllers/ControladorUsuarios.php');


session_start();

$mapa = array(
    'inicio'=>array('controlador'=>'ControladorInicio','metodo'=>'inicio','privada'=>false),
    'login'=>array('controlador'=>'ControladorUsuarios','metodo'=>'login'),
    'register'=>array('controlador'=>'ControladorUsuarios','metodo'=>'register'),
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