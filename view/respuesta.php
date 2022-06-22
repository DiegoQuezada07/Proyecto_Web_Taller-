<!DOCTYPE html>
<html lang="en">
<?php
require_once '../conexion/ConexionPDO.php';
require_once '../models/Registro.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
</head>

<body>
    <?php
    $datosRegistro = isset($_GET["datos"]) ? $_GET["datos"] : null;
    ?>
    <form>
        <?= $datosRegistro ?>
    </form>
</body>

</html>