<?php
class ControladorChat
{
    public function getchat()
    {
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $getMesg = mysqli_real_escape_string($conn, $_POST['text']);
        
        $check_data = "SELECT replies FROM chat WHERE queries LIKE '%$getMesg%'";
        $run_query = mysqli_query($conn, $check_data) or die("Error");

        if (mysqli_num_rows($run_query) > 0) {
            $fetch_data = mysqli_fetch_assoc($run_query);
            $replay = $fetch_data['replies'];
            echo $replay;
            
        } else {
            echo "¡Lo siento, no puedo ayudarte con este inconveniente! Favor comunícate con el administrador en el siguiente enlace:";
        }
    }
}
