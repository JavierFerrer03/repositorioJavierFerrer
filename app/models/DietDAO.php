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

        
    }
}