<?php
class ControladorRecetas
{
    public function inicioRecipe()
    {
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $recipeDAO = new RecipeDAO($conn);
        $recipes = $recipeDAO->getAll();
        require 'app/views/recipes.php';
    }

    public function insertRecipe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = htmlentities($_POST['title']);
            $description = htmlentities($_POST['description']);
            $ingredients = htmlentities($_POST['ingredients']);
            $prepTime = htmlentities($_POST['prepTime']);
            $cookTime = htmlentities($_POST['cookTime']);
            $difficulty = htmlentities($_POST['difficulty']);
            $recipePhoto = $_FILES['recipePhoto'];
            $idUser = $_SESSION['idUser'];

            $error = "";

            $fotoPaths = array();
            foreach ($recipePhoto['tmp_name'] as $key => $tmp_name) {
                $formats = ['image/jpeg', 'image/gif', 'image/webp', 'image/png'];
                if (in_array($recipePhoto['type'][$key], $formats)) {
                    $nombreArchivo = md5(time() + rand());
                    $partes = explode('.', $recipePhoto['name'][$key]);
                    $extension = end($partes);
                    $foto = $nombreArchivo . '.' . $extension;

                    while (file_exists("web/recipePhoto/$foto")) {
                        $nombreArchivo = md5(time() + rand());
                        $foto = $nombreArchivo . '.' . $extension;
                    }

                    $rutaDestino = "web/recipePhoto/$foto";
                    if (move_uploaded_file($tmp_name, $rutaDestino)) {
                        $fotoPaths[] = $rutaDestino;
                    } else {
                        $error = "La foto no se ha podido mover a la carpeta de destino";
                    }
                } else {
                    $error = "El formato de los archivos no es compatible, Intentelo con otro formato";
                }
            }

            $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $conexionDB->getConexion();

            $recipeDAO = new RecipeDAO($conn);
            $recipe = new Recipe();

            $recipe->setTitle($title);
            $recipe->setDescription($description);
            $recipe->setIngredients($ingredients);
            $recipe->setPrepTime($prepTime);
            $recipe->setCookTime($cookTime);
            $recipe->setDifficulty($difficulty);
            $recipe->setCreatedBy($idUser);
            $recipe->setIdUser($idUser);

            if (count($fotoPaths) > 0) {
                $recipe->setRecipePhoto($fotoPaths[0]);
                if ($recipeDAO->insertRecipe($recipe)) {
                    header('location: index.php?accion=inicioRecipe');
                    die();
                } else {
                    $error = 'Error al insertar la receta en la base de datos';
                }
            } else {
                $error = 'Error al cargar las imagenes en la base de datos';
            }
        }
    }

    public function deleteRecipe()
    {
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();

        $recipeDAO = new RecipeDAO($conn);
        $idRecipe = $_GET['id'];

        if($recipeDAO->deleteById($idRecipe)){
            header('location: index.php?accion=inicioRecipe');
            die();
        }else{
            $error =  'Error al eliminar la receta';
        }
    }
}
