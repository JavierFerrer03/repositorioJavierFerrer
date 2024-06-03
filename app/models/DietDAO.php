<?php
class DietDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertDiet(Diet $diet){
        if(!$stmt = $this->conn->prepare("INSERT INTO diet (name, description, goal, restrictions, calories, protein, carbohydrates, fats, idUser) VALUES (?,?,?,?,?,?,?,?,?)")){
            die("Error al ejecutar la consulta SQL " . $this->conn->error);
        }

        $name = $diet->getName();
        $description = $diet->getDescription();
        $goal = $diet->getGoal();
        $restrictions = $diet->getRestrictions();
        $calories = $diet->getCalories();
        $protein = $diet->getProtein();
        $carbohydrates = $diet->getCarbohydrates();
        $fats = $diet->getFats();
        $idUser = $diet->getIdUser();


        $stmt->bind_param('ssssssssi', $name, $description, $goal, $restrictions, $calories, $protein, $carbohydrates, $fats, $idUser);
        if($stmt->execute()){
            return $stmt->insert_id;
        }else{
            return false;
        }
    }

    public function getAllDiets():array {
        if(!$stmt = $this->conn->prepare("SELECT * FROM diet"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        //Ejecutamos la SQL
        $stmt->execute();
        //Obtener el objeto mysql_result
        $result = $stmt->get_result();

        $array_diets = array();
        
        while($diet = $result->fetch_object(Diet::class)){
            $array_diets[] = $diet;
        }
        return $array_diets;
    }
}