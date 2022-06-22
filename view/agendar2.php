<!DOCTYPE html>
<?php 
session_start();
$date = date("Y-m-d");
require_once '../conexion/ConexionPDO.php';


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/tree-icon.png">
    <title>Reserva - La Junta</title>
</head>
<body>
    

<form action="../controller/RegistroController.php" method="post" onkeydown="return event.key != 'Enter';">
                    <div class="field">
                        <div class="label">Fecha Inicio</div>
                        <input type="date" id="fecha_inicio" min="<?=$date?>" name="fechaI">
                    </div>

                    <div class="field">
                        <div class="label">Fecha Termino</div>
                        <input type="date" id="fecha_termino" min="<?=$date?>" name="fechaT">
                    </div>

<button class="submit" type="submit" id="btn-buscarporfecha" name="action" value="checkhabitaciones">Buscar</button>
</form>
</body>
</html>