<?php
class ControladorDietas{
    public function inicioDiets(){
        require 'app/views/diets.php';
    }

    public function logMeal() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mealType = $_POST['meal-type'] ?? null;
            $food = $_POST['food'] ?? null;
            $quantity = $_POST['quantity'] ?? null;
    
            if (is_null($mealType) || is_null($food) || is_null($quantity)) {
                echo json_encode(['status' => 'error', 'message' => 'Datos POST faltantes']);
                exit();
            }
    
            // Leer archivo JSON con los alimentos
            $foodsJson = file_get_contents('web/foods.json');
            if ($foodsJson === false) {
                echo json_encode(['status' => 'error', 'message' => 'No se pudo leer el archivo JSON']);
                exit();
            }
    
            $foods = json_decode($foodsJson, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(['status' => 'error', 'message' => 'Error al decodificar JSON: ' . json_last_error_msg()]);
                exit();
            }
    
            // Verificar si el alimento está en el archivo JSON
            if (!isset($foods[$food])) {
                echo json_encode(['status' => 'error', 'message' => 'Alimento no encontrado']);
                exit();
            }
    
            $foodData = $foods[$food];
            $calories = ($foodData['calories'] / 100) * $quantity;
            $proteins = ($foodData['proteins'] / 100) * $quantity;
            $carbs = ($foodData['carbs'] / 100) * $quantity;
    
            // Guardar el registro en la base de datos
            $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
            $conn = $conexionDB->getConexion();
    
            if ($conn->connect_error) {
                echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . $conn->connect_error]);
                exit();
            }
    
            $sql = "INSERT INTO meallogs (idUser, mealType, food, quantity, calories, proteins, carbs, logDate) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
    
            if ($stmt === false) {
                echo json_encode(['status' => 'error', 'message' => 'Error en la preparación de la consulta: ' . $conn->error]);
                exit();
            }
    
            $stmt->bind_param('issiddd', $_SESSION['idUser'], $mealType, $food, $quantity, $calories, $proteins, $carbs);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                echo json_encode([
                    'status' => 'success',
                    'nutrition' => [
                        'calories' => $calories,
                        'proteins' => $proteins,
                        'carbs' => $carbs
                    ]
                ]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al guardar el registro: ' . $stmt->error]);
            }
    
            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
        }
    }      

    public function getAccumulatedData() {
        $conexionDB = new ConexionDB(MYSQL_USER, MYSQL_PASS, MYSQL_HOST, MYSQL_DB);
        $conn = $conexionDB->getConexion();
    
        if ($conn->connect_error) {
            echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . $conn->connect_error]);
            exit();
        }
    
        $sql = "SELECT SUM(calories) as totalCalories, SUM(proteins) as totalProteins, SUM(carbs) as totalCarbs FROM meallogs WHERE idUser = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            echo json_encode(['status' => 'error', 'message' => 'Error en la preparación de la consulta: ' . $conn->error]);
            exit();
        }
    
        $stmt->bind_param('i', $_SESSION['idUser']);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
    
        echo json_encode(['status' => 'success', 'data' => $data]);
    
        $stmt->close();
        $conn->close();
    }    
    
}