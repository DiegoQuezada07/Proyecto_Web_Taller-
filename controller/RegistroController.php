<?php session_start();
require_once '../conexion/ConexionPDO.php';
require_once '../models/Registro.php';
require_once '../models/Habitacion.php';
require '../vendor/autoload.php';
use Transbank\Webpay\WebpayPlus\Transaction;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// para listar los registros, despues lo ordeno en donde vaya

// $reg = new Registro();
// $registrolist = $reg->getAllRegistro();



$result = "";
$url_resultado = "http://localhost/Proyecto_Web_Taller/controller/RegistroController.php?action=pagowebpay2";
$url_OK = "http://localhost/Proyecto_Web_Taller/view/pagoexitoso.php";
$url_NOTOK = "http://localhost/Proyecto_Web_Taller/view/pagofallido.php";
// si el action viene por post, tomara el valor de post, caso contrario tomara el valor por get
$action = isset($_POST["action"]) ? $_POST["action"] : $_GET["action"];

switch ($action) {

    case"pagowebpay":
        $monto = $_POST["costoT"];
        // OJO con que el objeto provenga de Transbank\Webpay\WebpayPlus\Transaction
        $transaction = new Transaction();
        // Param 1: identificador único de la orden de compra.. por ejemplo: nombre-de-mi-empresa-328493
        // session_id.. en este caso generando un valor aleatorio con uniqid()
        // el monto corresponde al tercer parámatro
        // el cuarto parámetro es la URL a la que irá después de que se gestione el pago..
        $response = $transaction->create("ordenCompra1234", uniqid(), $monto, $url_resultado);
    
        $url_redireccion = $response->getUrl() . "?token_ws=" . $response->getToken();
        header("Location: " . $url_redireccion, true, 302);
        exit;
        break;

    case"pagowebpay2":

        $token = $_GET['token_ws'] ?? $_POST['token_ws'] ?? null;
        if (!$token) {
            // Revisa más detalles en Revisar más detalles más arriba en los distintos flujos y ejemplos de código de esto en https://github.com/TransbankDevelopers/transbank-sdk-php/examples/webpay-plus/index.php
            echo 'No es un flujo de pago normal.';
            return;
        }
    
        $response = (new Transaction)->commit($token); // ó cualquiera de los métodos detallados en el ejemplo anterior del método create.
        if ($response->isApproved()) {
            // Transacción Aprobada
            header("Location: " . $url_OK, true, 302);
            exit;
        } else {
            // Transacción rechazada
            header("Location: " . $url_NOTOK, true, 302);
            exit;
        }
    
        return;
       

    case"enviarjson":
        $reg = new Registro();
        $registrolist = $reg->getAllRegistro();
        header("Content-Type: application/json; charset=UTF8");
$json=json_encode($registrolist, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
echo($json);
        
        
        break;
case "listar":
    $reg = new Registro();
    $registrolist = $reg->getAllRegistro();
    $_SESSION["registros"] = $registrolist;
     // header("Location: ../view/listarRegistros.php");
     // MAGIA DE LA API 
    break;

case "eliminar":
    $reg = new Registro();
    $id = $_GET['id'];
    $reg->deleteRegistrobyID($id);
    $_SESSION["registros"] = $registrolist;
    header("Location: ../view/listarRegistros.php");

    break;

case "checkhabitaciones":
    $fecha_inicio=$_POST['fechaI'];
    $fecha_termino=$_POST['fechaT'];
    $reg = new Registro();
    $hab = new Habitacion();
    // devuelve un array con todas las habitaciones ocupadas
    $arrayocupadas=$reg->getHabitacionesOcupadas($fecha_inicio, $fecha_termino);
    // devuelve una lista con todas las habitaciones
    $arraytodas=$hab->getAllHabitacionesbeta();
    // devuelve una lista con el id de las habitaciones libres
    $arraylibres= array_diff($arraytodas, $arrayocupadas);
    $lista = array();
    foreach($arraylibres as $r){ 
    $h = $hab->getHabitacionbyID($r);
    $lista[] = $h;
     }
    $json=json_encode($lista, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
   
    $_SESSION['hablibres'] = $json;
    header("Location: ../view/agendarHabitaciones.php");
     
    break;



        // Captura los datos enviados por post. 
    case "registro":
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $habitacion = $_POST['habitacion'];
        $fechaI = $_POST['fechaI'];
        $fechaT = $_POST['fechaT'];
        $correo = $_POST['correo'];
        $fono1 = $_POST['fono1'];
        $fono2 = $_POST['fono2'];
        $costoD = $_POST['costoD'];
        $costoT = $_POST['costoT'];
        if (
            $nombre != null && $apellido != null && $habitacion != null && $fechaI != null && $fechaT != null && $correo != null
            && $fono1 != null && $fono2 != null && $costoD != null && $costoT != null
        ) {
            $registro = new Registro();
            if ($registro->createRegistro($nombre, $apellido, $habitacion, $fechaI, $fechaT, $correo, $fono1, $fono2, $costoD, $costoT)) {
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

                    $mail->setFrom($correoEmpresa, "la Junta");
                    $mail->addAddress($correo);
                    // $mail->addReplyTo($correo ,$nombre);

                    $mail->isHTML(true);
                    $mail->Subject = 'Enviado por: Empresa la Junta';
                    $mail->Body = '<h2 align=center>Nombre: ' . $nombre . '<br>Apellido: ' . $apellido . '<br>Habitacion: ' .$habitacion
                        . '<br>Fecha Inicio: ' . $fechaI . '<br>Fecha Termino: ' . $fechaT . '<br>Telefono 1: ' . $fono1 . '<br>Telefono 2: ' . $fono2
                        . '<br>Costo Diario: ' . $costoD . '<br>Costo Total: ' . $costoT . '</h2>';

                    if (!$mail->send()) {
                        $result = "algo salio mal al enviar el correo, pero puede descargar su Comprobante";
                    } else {
                        $result = "Correo enviado Exitosamente";
                    }
                } catch (Exception $e) {
                    echo $e;
                }

                $topMensaje = "Tu registro quedo Correctamente Agendado, Te esperamos";

                $datosRegistro = '<h1>Datos Comprobante</h1> <br>'
                    . '<h2>' . $topMensaje . '<br>'
                    . 'Envio de correo: ' . $result . '<br>'
                    . 'Nombre: ' . $nombre . '<br>'
                    . 'Apellido: ' . $apellido . '<br>'
                    . 'Fecha Inicio: ' . $fechaI . '<br>'
                    . 'Fecha Termino: ' . $fechaT . '<br>'
                    . 'Telefono 1: ' . $fono1 . '<br>'
                    . 'Telefono 2: ' . $fono2 . '<br>'
                    . 'Costo Diario: ' . $costoD . '<br>'
                    . 'Costo Total: ' . $costoT . '<br>'
                    . '</h2>';
                    
                header("Location: ../view/respuesta.php?datos=$datosRegistro"); {
                }
            } else {
                header("Location: ../index.php");
            }
        } else {
        }
        break;


        // case "registro":
        //     $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
        //     $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : null;
        //     $habitacion = isset($_POST["habitacion"]) ? $_POST["habitacion"] : null;
        //     $fechaI = isset($_POST["fechaI"]) ? $_POST["fechaI"] : null;
        //     $fechaT = isset($_POST["fechaT"]) ? $_POST["fechaT"] : null;
        //     $   correo = isset($_POST["correo"]) ? $_POST["correo"] : null;
        //     $fono1 = isset($_POST["fono1"]) ? $_POST["fono1"] : null;
        //     $fono2 = isset($_POST["fono2"]) ? $_POST["fono2"] : null;
        //     $costoD = isset($_POST["costoD"]) ? $_POST["costoD"] : null;
        //     $costoT = isset($_POST["costoT"]) ? $_POST["costoT"] : null;
        //     if($nombre != null && $apellido != null && $habitacion != null && $fechaI != null && $fechaT != null && $correo != null
        //      && $fono1 != null && $fono2 != null && $costoD != null && $costoT != null){
        //          $registro = new Registro();
        //          if($registro->createRegistro($nombre, $apellido, $habitacion, $fechaI, $fechaT ,$correo, $fono1, $fono2, $costoD, $costoT)){
        //              header("Location: ../view/agendar.php");
        //          }else{
        //             header("Location: ../index.php");
        //          }
        //      }else{

        //      }
        //     break;
}