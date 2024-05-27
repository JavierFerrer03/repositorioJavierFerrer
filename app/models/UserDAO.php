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

    public function getById($id){
        if(!$stmt = $this->conn->prepare("SELECT * FROM user WHERE id = ?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows >= 1){
            $user = $result->fetch_object(User::class);
            return $user;
        }else{
            return null;
        }
    }

    public function update($user){
        if(!$stmt = $this->conn->prepare("UPDATE user SET username=?, email=?, firstName=?, lastName=?, dni=? WHERE id=?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $username = $user->getUsername();
        $email = $user->getEmail();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $dni = $user->getDni();
        $id = $user->getId();

        $stmt->bind_param('sssssi',$username, $email, $firstName, $lastName, $dni, $id);
        return $stmt->execute();
    }

    public function getAllClients(){
        if(!$stmt = $this->conn->prepare("SELECT * FROM user WHERE rol = 'CLIENTE'")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $array_user = array();
        
        while($user = $result->fetch_object(User::class)){
            $array_user[] = $user;
        }
        return $array_user;
    }

    public function deleteById($id){
        if(!$stmt = $this->conn->prepare("DELETE FROM user WHERE id=?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            return true;
        }else{
            return false;
        }
    }
}