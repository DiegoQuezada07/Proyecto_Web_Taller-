<?php
require_once '../conexion/ConexionPDO.php';

if ($_SERVER["REQUEST_METOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";

    $sentencia = $conexion->mysql->prepare($sql);
    $sentencia->bindParam(":username", $username);
    $sentencia->bindParam(":password", $password);

    if($sentencia->fetch()){
        $acceso = "permitido";
    }else{
        $acceso = "denegado";
    }
    
    header('Content-Type: application/json');
    echo json_encode($acceso);
}
