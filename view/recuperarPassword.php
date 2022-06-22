<?php
require_once '../conexion/ConexionPDO.php';
require_once '../models/Usuario.php';
$conexion = new ConexionPDO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/39adfa4868.js" crossorigin="anonymous"></script>
    <title>Recuperar Contraseña</title>
</head>

<body class="body-n">
    <?php
    $token = $_GET["token"];
    $id = $_GET["id"];
    if ($token != null && $id != null) { ?>
        <div class="container-pass-nueva">
            <div class="txtN">
                <h1>Actualizar Datos</h1>
            </div>
            <form class="form-pass-nueva" action="../controller/UsuarioController.php" method="POST" onsubmit="validarDatos()">
                <div class="txt">Contraseña</div>
                <label for="pass1" class="iconoPass iconBig">
                    <input type="password" name="newPassword" id="pass1" required>
                    <i id="ver" class="fa-solid fa-eye"></i>
                    <!-- <i class="fa-solid fa-eye-slash"></i> -->
                </label>
                <div class="txt">Repetir Contraseña</div>
                <label for="pass2" class="iconoPass iconBig">
                    <input type="password" name="newPassword2" id="pass2" required>
                    <i id="ver2" class="fa-solid fa-eye"></i>
                </label>
                <div id="error1" class="errorstyle">Las contraseñas deben ser iguales</div>
                <div id="error2" class="errorstyle">La contraseña debe tener una longitud mayor a 8</div>
                <div id="error3" class="errorstyle">La contraseña debe tener al menos una Mayuscula</div>
                <div>
                    <input type="hidden" name="id" value="<?= $id ?>">
                </div>
                <div>
                    <input type="hidden" name="token" value="<?= $token ?>">
                </div>
                <div class="btn-up-pass">
                    <button id="btnSubmit" type="submit" name="action" value="actualizarPassword" disabled>Actualizar</button>
                </div>
            </form>
        </div>
    <?php
    } else {
        header("Location: ../index.php");
    }
    ?>
    <script src="../scripts/validaciones.js"></script>

</body>

</html>