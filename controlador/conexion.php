<?php
Class Conexion {
    private $host = 'localhost';
    private $database = 'ranking';
    private $username = 'root';
    private $password = '';

    function execQueryO($stmn) {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $mysqli->query($stmn);
    }
}