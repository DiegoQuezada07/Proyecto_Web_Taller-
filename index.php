<?php 
session_start();
require_once 'conexion/ConexionPDO.php';
$conexion = new ConexionPDO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neucha">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    
    <script src="https://kit.fontawesome.com/39adfa4868.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/tree-icon.png">
    <title>La Junta</title>
</head>

<body>
    
    <?php require_once 'view/header.php'; ?>
    <section id="slider-section">
    <div id="slider-title"><h2>Turismo rural:</h2><h1> La Junta</h1></div>
    <div id="slider-subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit ac tellus quis mattis. Vestibulum sed risus libero. Integer rutrum sem ut mauris condimentum vulputate. Integer dapibus venenatis elementum. Sed malesuada ex nec neque venenatis fringilla. Praesent tincidunt metus a ullamcorper mollis. Pellentesque viverra pretium nisl, sed laoreet purus convallis et. Maecenas suscipit consequat erat, ornare dapibus erat hendrerit et. Maecenas sed fringilla leo. Donec et tincidunt ex, eu hendrerit urna. Mauris pulvinar, libero in varius vulputate, nulla lorem consectetur tellus.</p></div>
    <a href="view/agendar.php" class="btn-green" id="btn-agendarindex">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Reservar
  </a>
        <div id="slider">
            
            <figure>
                <img src="images/slider/1.jpeg">
                <img src="images/slider/2.jpeg">
                <img src="images/slider/3.jpeg">
                <img src="images/slider/4.jpeg">
                <img src="images/slider/1.jpeg">
            </figure>
        </div>
            
        
    <?= isset($_SESSION["error"]) ? $_SESSION["error"] : "" ?>
               
        
    </div>
</section>
    
    <section class="middle">



        <section id="hostal" class="column index-section" >
            <div>
                <div class="column" style="flex: 1;">
                <h1 class="title">El Hostal: </h1>
                <h2>L A J U N T A</h2>
                <p>Turismo rural se diferencia por tener un servicio más personalizado y privado en contacto con la naturaleza disfrutando de la tranquilidad del espacio.
                Empezó por la idea de emprender dado que la comuna esta vía de crecimiento a nivel turístico , turismo rural la junta tiene un entorno altamente rico en belleza natural lo cual vimos una real oportunidad de negocio familiar
                Empezamos el año 2015 solamente con arriendo de hospedaje ya el año 2017 se implementó la compra de tinajas para el emprendimiento.
                Luego de mucho esfuerzo el año 2020 logramos concretar la realización de quincho que nos abrió las puertas a centro de evento</p>
                </div>
                <img src="images/fotos/48.jpeg" alt="">
            </div>
           
        </section>
        <section id="servicios" class="column index-section" >
        <h1 class="title">Servicios </h1>
        
     
                <div  class="card-container">  
                <div class="card">
        <div class="face front">
            <img src="images/fotos/habitacion.jpg" alt="">
            <h3>Alojamiento</h3>
        </div>
        <div class="face back">
            <h3>Alojamiento</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius harum molestiae iste, nihil doloribus fugiat distinctio ducimus maxime totam nulla fuga odio non aperiam eos?</p>
           
        </div>
    </div>

    <div class="card">
        <div class="face front">
            <img src="images/fotos/16.jpeg" alt="">
            <h3>Desayuno</h3>
        </div>
        <div class="face back">
            <h3>Desayuno</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius harum molestiae iste, nihil doloribus fugiat distinctio ducimus maxime totam nulla fuga odio non aperiam eos?</p>
          
        </div>
    </div>

    <div class="card">
        <div class="face front">
            <img src="images/fotos/19.jpeg" alt="">
            <h3>Tinajas</h3>
        </div>
        <div class="face back">
            <h3>Tinajas</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius harum molestiae iste, nihil doloribus fugiat distinctio ducimus maxime totam nulla fuga odio non aperiam eos?</p>
            
        </div>
    </div>

    <div class="card">
        <div class="face front">
            <img src="images/fotos/13.jpeg" alt="">
            <h3>Pesca</h3>
        </div>
        <div class="face back">
            <h3>Pesca</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius harum molestiae iste, nihil doloribus fugiat distinctio ducimus maxime totam nulla fuga odio non aperiam eos?</p>
          
        </div>
    </div>
    
    
                </div>
                
        </section>
        <section id="entorno" class="column index-section" >
          
              
        <div> <h1 class="title">El entorno </h1></div>
            <div class="flex1">
                <img src="images/fotos/48.jpeg" alt="">
                <img src="images/fotos/48.jpeg" alt="">
                <img src="images/fotos/48.jpeg" alt="">
            </div>
           
       
        </section>
        <section id="galeria">
           <div><h1 class="title">Galería</h1> </div>
                <div class="gallery">

<img src="images/fotos/1.jpeg" alt="">
<img src="images/fotos/2.jpeg" alt="">
<img src="images/fotos/3.jpeg" alt="">
<img src="images/fotos/4.jpeg" alt="">
<img src="images/fotos/5.jpeg" alt="">
<img src="images/fotos/6.jpeg" alt="">
<img src="images/fotos/7.jpeg" alt="">
<img src="images/fotos/8.jpeg" alt="">
<img src="images/fotos/9.jpeg" alt="">
<img src="images/fotos/10.jpeg" alt="">
<img src="images/fotos/11.jpeg" alt="">
<img src="images/fotos/12.jpeg" alt="">
<img src="images/fotos/13.jpeg" alt="">
<img src="images/fotos/14.jpeg" alt="">



            </div>
           
        </section>


        <section id="Ubicacion">
            <div>
                <h1 class="title">Ubicación</h1>
            </div>
            <iframe id="mapa"
                src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d194890.36950918!2d-72.849186786085!3d-40.24993036796754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e3!4m0!4m3!3m2!1d-40.2556949!2d-72.67078769999999!5e0!3m2!1sen!2scl!4v1652160400165!5m2!1sen!2scl"
                width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </section>

        <section id="contacto">
            <div>
                <h1 class="title">Contacto</h1>
            </div>
        </section>
        <section class="modal-ingreso">
            <div class="modal-container-login">
                <a href="#" class="modal-cerrar-ingreso">X</a>
                <h1 class="modal-titulo">Ingresa tus Datos</h1>
                <div id="error"></div>
                <form class="form-login" action="controller/UsuarioController.php" method="post">
                    <input type="text" class="iconosIndex" placeholder="Nombre Usuario" required name="username" id="user">
                    <br>
                    <input type="password"class="iconosIndex" placeholder="Contraseña" required name="password" id="pass">
                    <div class="a-recuperar-pass">
                        <a href="#" class="show-modal-recuperar">Recuperar contraseña?</a>
                    </div>
                    <div class="btn-login">
                        <button type="submit" name="action" value="iniciar">Iniciar Sesion</button>
                    </div>
                </form>
            </div>

        </section>

        <section class="modal-recuperar-pass">
            <div class="modal-container-recuperar">
                <a href="#" class="modal-cerrar-recuperar">X</a>
                <form class="form-recuperar-pass" action="controller/UsuarioController.php" method="POST">
                    <div class="texto-correo">
                        Ingresa tus Datos
                    </div>
                    <!-- <input type="text" placeholder="Nombre de Usuario" required name="usernameR" id="user">
                    <br> -->
                    <input type="text" placeholder="Correo Electronico" required name="correo">
                    <br>
                    <div class="btn-enviar-recuperar">
                        <button type="submit" name="action" value="recuperarPassword">Enviar</button>
                    </div>
                </form>
            </div>
        </section>

    </section>


    <?php require_once 'view/footer.php'; ?>
    <footer> </footer>

    <script src="scripts/javaScript.js"></script>

    <a class="gotopbtn" href="#"><i class="fas fa-arrow-up"></i></a>
</body>

</html>