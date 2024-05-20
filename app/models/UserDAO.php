<?php
class UserDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /* Función para insertar a los usuarios en la base de datos */
    public function insertUsers(User $user){
        if(!$stmt = $this->conn->prepare("INSERT INTO user (username, email, password, firstName, lastName, dni, rol, sid) VALUES (?,?,?,?,?,?,?,?)")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }
    
        $username = $user->getUserName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $dni = $user->getDni();
        $rol = $user->getRol();
        $sid = $user->getSid();

        $stmt->bind_param('ssssssss', $username, $email, $password, $firstName, $lastName, $dni, $rol, $sid);
        if($stmt->execute()){
            return $stmt->insert_id;
        }else{
            return false;
        }
    }

    public function getByEmail($email){
        if(!$stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows >= 1){
            $user = $result->fetch_object(User::class);
            return $user;
        } else{
            return null;
        }
    }
}