<?php
class UserDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /* Función para insertar a los usuarios en la base de datos */
    public function insertUsers(User $user){
        if(!$stmt = $this->conn->prepare("INSERT INTO usuario (username, email, password, firstName, lastName, dni, rol, sid) VALUES (?,?,?,?,?,?,?,?)")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }
    
        $username = $user->getUserName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $dni = $user->getDni();
        $rol = $user->setRol('Cliente');
        $sid = $user->getSid();

        $stmt->bind_param('ssssssss', $username, $email, $password, $firstName, $lastName, $dni, $rol, $sid);
        if($stmt->execute()){
            return $stmt->insert_id;
        }else{
            return false;
        }
    }
}