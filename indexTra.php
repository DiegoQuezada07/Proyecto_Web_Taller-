<!DOCTYPE html>
<?php
require_once 'conexion/ConexionPDO.php';
$conexion = new ConexionPDO();
session_start();

if (!isset($_SESSION["cargo"])) {
        header("Location: index.php");
} else {
    if ($_SESSION["cargo"] != 2){
        header("Location: indexAdmin.php");
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <title>Las Juntas</title>
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
                <img src="images/logo.jpeg" alt="logo" />
                <h1>La Junta</h1>
            </div>
            <div>
                <ul>
                    <li><a href="#Servicios">Servicios</a></li>
                    <li><a href="#Galeria">Galería</a></li>
                    <li><a href="#Ubicacion">Ubicación</a></li>
                    <li><a href="#Contacto">Contacto</a></li>
                    <li>
                        <a href="#">Cuenta</a>
                        <ul class="submenu">
                            <li><a href="#"> <?= isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "" ?></a></li>
                            <li><a href="controller/UsuarioController.php?action=cerrar">Salir</a></li>
                            <!--DISEÑO MOMENTANEO-->
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>

    </header>
    <section class="middle">



        <section id="Servicios">
            <div>
                <h1>Servicios</h1>
            </div>
        </section>
        <section id="Galeria">
            <div>
                <h1>Galería</h1>
            </div>
            <div>


                <button style="width:200px; height:200px;">Ocultar header</button>

            </div>
        </section>


        <section id="Ubicacion">
            <div>
                <h1>Ubicación</h1>
            </div>
            <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d194890.36950918!2d-72.849186786085!3d-40.24993036796754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e3!4m0!4m3!3m2!1d-40.2556949!2d-72.67078769999999!5e0!3m2!1sen!2scl!4v1652160400165!5m2!1sen!2scl" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </section>

        <section id="Contacto">
            <div>
                <h1>Contacto</h1>
            </div>
        </section>
    </section>

    <footer> </footer>

    <script src="scripts/javaScript.js"></script>
    <script src="https://kit.fontawesome.com/39adfa4868.js" crossorigin="anonymous"></script>
</body>

</html>