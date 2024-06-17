<?php
class RecipeDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertRecipe(Recipe $recipe){
        if(!$stmt = $this->conn->prepare("INSERT INTO recipe (title, description, ingredients, prepTime, cookTime, difficulty, recipePhoto, created_by, idUser) VALUES (?,?,?,?,?,?,?,?,?)"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }

        $title = $recipe->getTitle();
        $description = $recipe->getDescription();
        $ingredients = $recipe->getIngredients();
        $prepTime = $recipe->getPrepTime();
        $cookTime = $recipe->getCookTime();
        $difficulty = $recipe->getDifficulty();
        $recipePhoto = $recipe->getRecipePhoto();
        $created_by = $recipe->getCreatedBy();
        $idUser = $recipe->getIdUser();
        

        $stmt->bind_param('sssssssii', $title, $description, $ingredients, $prepTime, $cookTime, $difficulty, $recipePhoto, $created_by, $idUser);
        if($stmt->execute()){
            return $stmt->insert_id;
        }else{
            return false;
        }
    }

    public function getAll():array {
        if(!$stmt = $this->conn->prepare("SELECT * FROM recipe"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        //Ejecutamos la SQL
        $stmt->execute();
        //Obtener el objeto mysql_result
        $result = $stmt->get_result();

        $array_recipe = array();
        
        while($recipe = $result->fetch_object(Recipe::class)){
            $array_recipe[] = $recipe;
        }
        return $array_recipe;
    }

    public function deleteById($id){
        if(!$stmt = $this->conn->prepare("DELETE FROM recipe WHERE id = ?")){
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