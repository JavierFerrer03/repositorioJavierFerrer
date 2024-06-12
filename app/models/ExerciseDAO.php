<?php
class ExerciseDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertExercise(Exercise $exercise){
        if(!$stmt = $this->conn->prepare("INSERT INTO exercise (name, description, repetitions, series, exercisePhoto, idSession) VALUES (?,?,?,?,?,?)"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $name = $exercise->getName();
        $description = $exercise->getDescription();
        $repetitions = $exercise->getRepetitions();
        $series = $exercise->getSeries();
        $exercisePhoto = $exercise->getExercisePhoto();
        $idSession = $exercise->getIdSession();

        $stmt->bind_param('ssiisi', $name, $description, $repetitions, $series, $exercisePhoto, $idSession);
        if($stmt->execute()){
            return $stmt->insert_id;
        }else{
            return false;
        }
    }

    public function getAllByIdSession($idSession){
        if(!$stmt = $this->conn->prepare("SELECT * FROM exercise WHERE idSession = ?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }
        $stmt->bind_param('i',$idSession);
        $stmt->execute();
        $result = $stmt->get_result();
        $array_exercise = array();
        while($exercise = $result->fetch_object(Exercise::class)){
            $array_exercise[] = $exercise;
        }
        return $array_exercise;
    }

    public function getById($id){
        if(!$stmt = $this->conn->prepare("SELECT * FROM exercise WHERE id = ?")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows >= 1){
            $exer = $result->fetch_object(Exercise::class);
            return $exer;
        }else{
            return null;
        }
    }
}