<?php
class TrainingDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    
}