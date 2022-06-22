<?php
session_start();
;
require_once '../conexion/ConexionPDO.php';
// como decodificar json
$habitaciones = json_decode($_SESSION['hablibres'], true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/tree-icon.png">
    <title>Habitaciones - La Junta</title>
</head>
<body>
    


<select name="habitacion" id="habitacion">
 
            <?php foreach($habitaciones as $h): ?>
            <option value="<?=$h['id'] ?>"> <?= $h['nombre']?></option>
            <?php endforeach; ?>
</select>


</body>
</html>