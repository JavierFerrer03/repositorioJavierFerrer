<?php
class TrainingDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertTraining(Training $training){
        if(!$stmt = $this->conn->prepare("INSERT INTO training (name, description, difficultyLevel, duration, category, trainingPhoto, idUser) VALUES (?,?,?,?,?,?,?)")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $name = $training->getName();
        $description = $training->getDescription();
        $difficultyLevel = $training->getDifficultyLevel();
        $duration = $training->getDuration();
        $category = $training->getCategory();
        $trainingPhoto = $training->getTrainingPhoto();
        $idUser = $training->getIdUser();

        $stmt->bind_param('ssssssi', $name, $description, $difficultyLevel, $duration, $category, $trainingPhoto, $idUser);
        if($stmt->execute()){
            return $stmt->insert_id;
        }else{
            return false;
        }
    }

    public function getAll():array {
        if(!$stmt = $this->conn->prepare("SELECT * FROM training"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        //Ejecutamos la SQL
        $stmt->execute();
        //Obtener el objeto mysql_result
        $result = $stmt->get_result();

        $array_training = array();
        
        while($training = $result->fetch_object(Training::class)){
            $array_training[] = $training;
        }
        return $array_training;
    }

    public function getById($id) {
        if(!$stmt = $this->conn->prepare("SELECT * FROM training WHERE id = ?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt -> bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $training = $result->fetch_object(Training::class);
            return $training;
        }else{
            return null;
        }
    }

    public function delete($id):bool{
        if(!$stmt = $this->conn->prepare("DELETE FROM training WHERE id = ?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $stmt -> bind_param('i', $id);
        $stmt->execute();

        if($stmt->affected_rows == 1){
            return true;
        }else{
            return false;
        }
    }

    public function update($training){
        if(!$stmt = $this->conn->prepare("UPDATE training SET name=?, description=?, difficultyLevel=?, duration=?, category=? WHERE id=?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $name = $training->getName();
        $description = $training->getDescription();
        $difficultyLevel = $training->getDifficultyLevel();
        $duration = $training->getDuration();
        $category = $training->getCategory();
        $id = $training->getId();

        $stmt->bind_param('sssssi',$name, $description, $difficultyLevel, $duration, $category, $id);
        return $stmt->execute();
    }
    
}