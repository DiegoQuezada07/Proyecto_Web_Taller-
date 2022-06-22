<?php
//el require onece sirve para llamar a los archivos que contienen laas conexiones a las base de datos y las clases
//y asi nos permita utilizarlo en esta parte.
require_once '../conexion/ConexionPDO.php';
require_once '../models/Usuario.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//validamos si viene nulo
//aca capturamos el NAME de cada boton o href que contienen ese valor, y lo diferenciamos por medio de su VALUE
$action = isset($_POST["action"]) ? $_POST["action"] : $_GET["action"];

//aca validamos si el action viene nulo, por si acaso alguien se mete directamente en el controller por url en el navegador
if ($action != null) {
    switch ($action) {
        case "iniciar":
            $usuario = new Usuario();

            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($username != null && $password != null) {
                //aca llamo a la clase Usuario y le paso los valores que capturamos mas alla arriba y lo encerramos en 
                //$username $password
                $usuario->username = $username;
                $usuario->password = $password;
                //llamamos al metodo que contiene las validaciones del mysql en general
                if ($usuario->login()) {
                    switch ($_SESSION["cargo"]) {
                        case 1:
                            $_SESSION["usuario"] = $username;
                            $_SESSION["cargo"] = 1;
                            header("Location: ../indexAdmin.php");
                            break;
                        case 2:
                            $_SESSION["usuario"] = $username;
                            $_SESSION["cargo"] = 2;
                            header("Location: ../indexTra.php");
                            break;
                    }
                } else {
                    $_SESSION["error"] = "hubo un error";
                    header("Location: ../index.php");
                }
            } else {
                header("Location: ../index.php");
            }

            break;
        case "cerrar":
            //esto hechara abajo la session ya iniciada
            session_destroy();
            header("Location: ../index.php");
            break;

        case "recuperarPassword":
            $usuario = new Usuario();
            $correo = $_POST["correo"];
            $token = $usuario->generate_string();
            $usuario->correo = $correo;

            if ($usuario->validarDatos()) {
                $id = $_SESSION["id"];
                $usuario->insertarToken($token, $id);
                $mail = new PHPMailer();
                try {
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    $correoEmpresa = 'empresalajunta@gmail.com';
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Username = $correoEmpresa;
                    $mail->Password = 'Lajunta159';
                    $enlace = "http://localhost:3000/controller/UsuarioController.php?action=validacionCorreoDatos&id=" . $id . "&token=" . $token;

                    $mail->setFrom($correoEmpresa, "la Junta");
                    $mail->addAddress($correo);

                    $mail->isHTML(true);
                    $mail->Subject = 'Enviado por: Empresa la Junta';
                    $mail->Body = '<h2 align=Datos de verificacion>: ' . 'Intrucciones:'
                        . '<br>Haz click en el link que te dirigirá hacia la página para cambiar tu contraseña'
                        . '<br>Link: ' . $enlace . '</h2>';

                    if (!$mail->send()) {
                        echo $result = "algo salio mal al enviar el correo, intentalo de nuevo";
                    } else {
                        echo $result = "Correo enviado Exitosamente";
                    }
                } catch (Exception $e) {
                    echo $e;
                }
                echo $correo;
                
            } else {
                   console.log("Los datos no pudieron ser validados.");
            }
            break;
        case "validacionCorreoDatos":
            $token = $_GET["token"];
            $id = $_GET["id"];
            if ($token != null && $id != null) {
                $usuario = new Usuario();

                if ($usuario->validarDatosSeguridad($id, $token)) {
                    header("Location: ../view/recuperarPassword.php?id=".$id."&token=".$token);
                } else {
                    header("Location: ../view/viewExpiracionDatos.php");
                }
            } else {
                header("Location: ../index.php");
            }
            break;

        case "actualizarPassword":
            $newPassword = $_POST["newPassword"];
            $id = $_POST["id"];
            $token = $_POST["token"];

            if ($newPassword != null && $id != null && $token != null) {
                if ($usuario->validarDatosSeguridad($id, $token)) {
                    if ($usuario->actualizarPassword($id, $newPassword)) {
<<<<<<< HEAD
                        $tokenN = "";
                        $usuario->insetarToken($tokenN, $id);
=======
                        $token = "";
                        $usuario->insertarToken($token,$id);
>>>>>>> c48a0a384b4242ccb6cea62b369dc7381a74a95d
                        header("Location: ../index.php");
                    }
                }
            } else {
                header("Location: ../view/viewExpiracionDatos.php");
            }
            break;
    }
} else {
    header("Location: ../index.php");
}
