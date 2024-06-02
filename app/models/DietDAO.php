<?php
class DietDAO{
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
}