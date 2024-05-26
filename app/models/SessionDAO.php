<?php
class SessionDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllByIdTraining($idTraining){
        if(!$stmt = $this->conn->prepare("SELECT * FROM session WHERE idTraining = ?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }
        $stmt->bind_param('i',$idTraining);
        $stmt->execute();
        $result = $stmt->get_result();
        $sessions = array();
        while($session = $result->fetch_object(Session::class)){
            $sessions[] = $session;
        }
        return $sessions;
    }

    public function getById($id){
        if(!$stmt = $this->conn->prepare("SELECT * FROM session WHERE id = ?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt -> bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $session = $result->fetch_object(Session::class);
            return $session;
        }else{
            return null;
        }
    }

    public function update($session){
        if(!$stmt = $this->conn->prepare("UPDATE session SET type=?, description=? WHERE id=?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $type = $session->getType();
        $description = $session->getDescription();
        $id = $session->getId();

        $stmt->bind_param('ssi', $type, $description, $id);
        return $stmt->execute();
    }
}