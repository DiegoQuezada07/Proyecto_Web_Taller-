<!DOCTYPE html>
<?php
require_once '../conexion/ConexionPDO.php';
session_start();

if (!isset($_SESSION["cargo"])) {
    header("Location: index.php");
} else {
    if ($_SESSION["cargo"] != 1) {
        header("Location: indexTra.php");
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../scripts/javaScript.js"></script>
    <title>Agenda</title>
</head>

<body>
    <header>
        <div class="topline">
            <p> correo@gmail.com</p>
            <p> +569 8888 4444</p>
        </div>
        <!-- linea con contactos directos mail y redes -->
        <nav>

            <div>
                <img src="../images/logo.jpeg" alt="logo" />
                <h1>La Junta</h1>
            </div>
            <div>
                <ul>
                    <li><a href="#">Colaboradores</a></li>
                    <li>
                        <a href="#">Cuenta</a>
                        <ul class="submenu">
                            <li><a href="#"> <?= isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "" ?></a></li>
                            <li><a href="../controller/UsuarioController.php?action=cerrar">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <div class="tabla">
        <section>
            <table class="agenda-admin">

                <thead>
                    <tr>
                        <th>Fecha Agendado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Termino</th>
                        <th>Valor</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active-row">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr>
                    <tr class="active-row">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr>
                </tbody>
            </table>

        </section>
    </div>

</body>

</html>