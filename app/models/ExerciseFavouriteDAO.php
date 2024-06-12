<?php
class ExerciseFavouriteDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertExerciseFavourite(ExerciseFavourite $favourite) {
        // Comprobar si ya existe el registro
        if ($this->existByIdUserIdExercise($favourite->getIdExercise(), $favourite->getIdUser())) {
            // Si existe, puedes decidir devolver un error o hacer otra cosa
            return false;
        }
    
        // Preparar la consulta SQL
        if (!$stmt = $this->conn->prepare("INSERT INTO exercisefavourite (idExercise, idUser) VALUES (?,?)")) {
            echo "Error en la SQL: " . $this->conn->error;
            return false; // Salir si no se pudo preparar la consulta
        }
    
        // Obtener los valores del objeto ExerciseFavourite
        $idExercise = $favourite->getIdExercise();
        $idUser = $favourite->getIdUser();
    
        // Asignar los parámetros
        $stmt->bind_param('ii', $idExercise, $idUser);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            $favourite->setId($stmt->insert_id);
            return $stmt->insert_id;
        } else {
            return false;
        }
    }    

    public function getByIdExerciseIdUser($idExercise, $idUser){
        if(!$stmt = $this->conn->prepare("SELECT * FROM exercisefavourite WHERE idExercise = ? and idUser =?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('ii',$idExercise, $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($exerciseFavourite = $result->fetch_object(ExerciseFavourite::class)){
            return $exerciseFavourite;
        }
        else{
            return false;
        }
        
    }

    public function existByIdUserIdExercise($idUser, $idExercise){
        if(!$stmt = $this->conn->prepare("SELECT * FROM exercisefavourite WHERE idUser = ? and idExercise = ?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('ii', $idUser, $idExercise);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>=1){
            return true;
        }else{
            return false;
        }
    }

    public function deleteExerciseFavourite(ExerciseFavourite $favourite){
        if(!$stmt = $this->conn->prepare("DELETE FROM exercisefavourite WHERE id = ?")){
            die("Error al preparar la consulta delete: " . $this->conn->error );
        }
        $id = $favourite->getId();
        $stmt->bind_param('i',$id);
        $stmt->execute();
        if($stmt->affected_rows >=1 ){
            return true;
        }
        else{
            return false;
        }
    }

}