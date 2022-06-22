<?php
require_once '../conexion/ConexionPDO.php';
require_once '../models/Habitacion.php';

$habitacion = new Habitacion();
$nombrehabitacion = $habitacion->getAllHabitaciones(); 
$action = isset($_POST["action"]) ? $_POST["action"] : $_GET["action"];


//aca validamos si el action viene nulo, por si acaso alguien se mete directamente en el controller por url en el navegador
if ($action != null) {

    switch ($action) {
        case "gethabitaciones":
            
break;




        }
    }




?>