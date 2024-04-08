<?php 
require_once ('app/controllers/ControladorInicio.php');

session_start();

$mapa = array(
    'inicio'=>array('controlador'=>'ControladorInicio','metodo'=>'inicio','privada'=>false),
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

/* if( !Sesion::existeSesion() && isset($_COOKIE['sid'])){
    $conexionDB = new ConexionBD(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_BD);
    $conn = $conexionDB->getConexion();
    
    //Nos conectamos para obtener el id y la foto del usuario
    $usuariosDAO = new UsuarioDAO($conn);
    if($usuario = $usuariosDAO->getBySid($_COOKIE['sid'])){
        Sesion::iniciarSesion($usuario);
    }
}

if(!Sesion::existeSesion() && $mapa[$accion]['privada']){
    header('location: index.php');
    print("Debes iniciar sesión para acceder a $accion");
    die();
} */

//$acción ya tiene la acción a ejecutar, cogemos el controlador y metodo a ejecutar del mapa
$controlador = $mapa[$accion]['controlador'];
$metodo = $mapa[$accion]['metodo'];

//Ejecutamos el método de la clase controlador
$objeto = new $controlador();
$objeto->$metodo();
?>