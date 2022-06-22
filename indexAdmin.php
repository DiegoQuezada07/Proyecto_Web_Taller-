<?php session_start();
require_once 'conexion/ConexionPDO.php';

if (!isset($_SESSION["cargo"])) {
    header("Location: index.php");
} else {
    if ($_SESSION["cargo"] != 1) {
        header("Location: indexTra.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    
    <script src="https://kit.fontawesome.com/39adfa4868.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/listarRegistrojs.js"></script>

    <title>La Junta - Administrador</title>
    <style>
        body{
        background-color: #121212;
          }
       table{
           
        padding: 0.5rem;
        padding-top: 5rem;
        background-color : #121212;
        color: white;
        display: block;
       } 
       td{
        
        text-align: left;
        padding: 0.5rem;
        border: 1px solid #BB86FC;
        background-color : #222222;
        color: white;
       } 
       th{
        text-align: left;
        padding: 0.5rem 0.7rem;
        border: 1px solid #BB86FC;
        color: white;
        background-color: #2E2E2E;
        
       }
       button{
         background-color: #383838;
        color: white;
        padding: 0.3rem 0.7rem;
        border-radius: 5px;
        cursor: pointer;
         }
         button:hover{
          background-color: #575757;
         }
        
        </style>
</head>

<body>
    <header>
        <!-- linea con contactos directos mail y redes -->
        <nav class="top">

            <div>
                <img src="images/logo.jpeg" alt="logo" />
                <h1>La Junta</h1>
            </div>
            <div>
                <ul class="arriba">
                    <li><button class="arriba" id="btnAgendar" onclick="cargarListaRegistro()">Agenda<i class="fa-solid fa-bell-concierge"></i></button></li>
                    <li><button class="arriba" id="btnHabitaciones">Habitaciones<i class="fa-solid fa-images"></i></button></li>
                    <li><button class="arriba" id="btnUsuarios">Usuarios<i class="fa-solid fa-location-dot"></i></button></li>
                    <li><a href="#"><?= isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "" ?><i class="fas fa-user"></i></a></li>
                    <li><form action="controller/UsuarioController.php">
                        <button type="submit" name="action" value="cerrar"><span class="icon-left"><i class="fa-solid fa-right-from-bracket"></i></span>Salir</button></li>
                   
                    </form>

                </ul>
            </div>
        </nav>

    </header>
    <div class="btn-menu-lateral">
        <span class="icon-lateral"><i class="fa-solid fa-circle-arrow-right"></i></span>
    </div>
    <nav class="side">
        <div class="text" id="sidebaradmin">Menu</div>
        <ul class="lateral">
            <li><button type="button" >Agenda</button></li>
            <li><a href="#"><span class="icon-left"><i class="fa-solid fa-people-roof"></i></span>Habitaciones</a></li>
            <li><a href="#"><span class="icon-left"><i class="fa-solid fa-people-group"></i></span>Trabajadores</a></li>
            <li>
                <a href="#" class="feat-btn"><span class="icon-left"><i class="fa-solid fa-gear"></i></span>Ajustes <span><i class="fa-solid fa-sort-down first"></i></span></a>
                <ul class="feat-show">
                    <li><a href="../controller/UsuarioController.php?action=cerrar"><span class="icon-left"><i class="fa-solid fa-right-from-bracket"></i></span>Salir</a></li>
                    <li><a href="#"><span class="icon-left"><i class="fa-solid fa-key"></i></span>Cambiar Contraseña</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    

    <script>
    $('.feat-btn').click(function() {
        $('nav ul .feat-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
    });
    $('.btn-menu-lateral').click(function() {
        $(this).toggleClass("click");
        $('.side').toggleClass("show");
    });
    </script>
    <section class="middle">

        <div id="tabla"></div>
</section>

    <footer> </footer>

   
</body>

</html>