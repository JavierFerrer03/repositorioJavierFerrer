<?php
class ControladorUsuarios{
    
    public function login(){
        require 'app/views/login.php';
    }

    public function register(){
        require 'app/views/register.php';
    }
}