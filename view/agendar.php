<!DOCTYPE html>
<html lang="en">
<?php 
$date = date("Y-m-d");
require_once '../conexion/ConexionPDO.php';
require_once '../controller/HabitacionController.php';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../css/stylesAgendar.css" type="text/css">
    <script src="https:/|||/kit.fontawesome.com/39adfa4868.js" crossorigin="anonymous"></script>
   

    <title>La Junta Registro</title>
</head>

<body style="background-image: url('../images/bg-agendar.jpg');">
    
    <div class="container">
        <header>Agendar</header>
        <div class="progress-bar">
            <div class="step">
                <p>Paso 1</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Paso 2</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Paso 3</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Fin</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="form-outer">
            <form action="../controller/RegistroController.php" method="post" onkeydown="return event.key != 'Enter';">
                <div class="page slide-page">
                    <div class="field">
                      <div class="label">Nombre</div>  
                       
                       
                        <input type="text" placeholder="Nombre" class="nombre" id="nombre" name="nombre" require>

                    </div>
                    <div class="field">
                        <div class="label">Apellido</div>
                        <input type="text" placeholder="Apellido" id="apellido" name="apellido" require>

                    </div>
                    <div class="field">
                        <div class="label">Habitaciones</div>
                        <select name="habitacion" id="habitacion">
                            <?php foreach($nombrehabitacion as $h): ?>
                            <option value="<?=$h["id"] ?>"> <?= $h['nombre']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <button class="firstNext next" type="button">Siguiente</button>
                    </div>
                </div>


                <div class="page">
                    <div class="title">Información de Contacto</div>
                    <div class="field">
                        <div class="label">Correo Electronico</div>
                        <input type="text" name="correo" id="correo">
                    </div>
                    <div class="field">
                        <div class="label">N° de Telefono</div>
                        <input type="text" id="fono1" name="fono1">
                    </div>
                    <div class="field">
                        <div class="label">N° de Telefono 2</div>
                        <input type="text" id="fono2" name="fono2">
                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev" type="button">Atrás</button>
                        <button class="next-1 next" type="button">Siguiente</button>
                    </div>
                </div>

                <div class="page">
                    <div class="field">
                        <div class="label">Fecha Inicio</div>
                        <input type="date" id="fecha_inicio" min="<?=$date?>" name="fechaI">
                    </div>

                    <div class="field">
                        <div class="label">Fecha Termino</div>
                        <input type="date" id="fecha_termino" min="<?=$date?>" name="fechaT">
                    </div>

                        <label>Dias Arrendados:<span id="dias"></span></label>
                   
                    <div class="field btns">
                        <button class="prev-2 prev" type="button">Atrás</button>
                        <button class="next-2 next" type="button">Siguiente</button>
                    </div>
                </div>

                <div class="page">
                <div class="field">
                        <div class="label">Costo Diario</div>
                        <input type="number" name="costoD">
                    </div>
                    <div class="field">
                        <div class="label">Costo Total</div>
                        <input type="number" name="costoT">
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev" type="button">Atrás</button>
                        <button class="submit" type="submit" name="action" value="pagowebpay">Pagar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../scripts/agendarjs.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>