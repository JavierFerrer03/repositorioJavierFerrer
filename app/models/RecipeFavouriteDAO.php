<?php
class RecipeFavouriteDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertRecipeFavourite(RecipeFavourite $recipe) {
        if ($this->existByIdUserIdRecipe($recipe->getIdRecipe(), $recipe->getIdUser())) {
            return false;
        }
    
        if (!$stmt = $this->conn->prepare("INSERT INTO recipefavourite (idRecipe, idUser) VALUES (?,?)")) {
            echo "Error en la SQL: " . $this->conn->error;
            return false;
        }

        $idRecipe = $recipe->getIdRecipe();
        $idUser = $recipe->getIdUser();
    
        $stmt->bind_param('ii', $idRecipe, $idUser);
    
        if ($stmt->execute()) {
            $recipe->setId($stmt->insert_id);
            return $stmt->insert_id;
        } else {
            return false;
        }
    }    

    public function getByIdRecipeIdUser($idRecipe, $idUser){
        if(!$stmt = $this->conn->prepare("SELECT * FROM recipefavourite WHERE idRecipe = ? and idUser =?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('ii',$idRecipe, $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($recipeFavourite = $result->fetch_object(RecipeFavourite::class)){
            return $recipeFavourite;
        }
        else{
            return false;
        }
        
    }

    public function existByIdUserIdRecipe($idUser, $idRecipe){
        if(!$stmt = $this->conn->prepare("SELECT * FROM recipefavourite WHERE idUser = ? and idRecipe = ?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('ii', $idUser, $idRecipe);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>=1){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRecipeFavourite(RecipeFavourite $favourite){
        if(!$stmt = $this->conn->prepare("DELETE FROM recipefavourite WHERE id = ?")){
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

    public function getAllByIdUser($idUser){
        if(!$stmt = $this->conn->prepare("SELECT r.* FROM recipe r JOIN recipefavourite rf ON r.id = rf.idRecipe WHERE rf.idUser = ?")){
            die("Error al preparar la consulta: " . $this->conn->error);
        }
    
        $stmt->bind_param('i', $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $arrayFavouriteRecipe = array();
    
        while($favRecipeData = $result->fetch_assoc()){
            $recipe = new Recipe();
            $recipe->setId($favRecipeData['id']);
            $recipe->setTitle($favRecipeData['title']);
            $recipe->setDescription($favRecipeData['description']);
            $recipe->setIngredients($favRecipeData['ingredients']);
            $recipe->setPrepTime($favRecipeData['prepTime']);
            $recipe->setCookTime($favRecipeData['cookTime']);
            $recipe->setDifficulty($favRecipeData['difficulty']);
            $recipe->setIdUser($favRecipeData['idUser']);
            $recipe->setCreatedBy($favRecipeData['created_by']);
            $recipe->setRecipePhoto($favRecipeData['recipePhoto']);
    
            $arrayFavouriteRecipe[] = $recipe;
        }
    
        return $arrayFavouriteRecipe;
    }
    

}