<?php session_start();
require_once '../conexion/ConexionPDO.php';

class Usuario
{
    public $username;
    public $password;
    public $correo;

    function login()
    {
        $conexion = new ConexionPDO();
        $sql = ("SELECT * FROM usuario WHERE username = :user AND password = :pass");
        $sentencia = $conexion->mysql->prepare($sql);
        $sentencia->bindParam(":user", $this->username);
        $sentencia->bindParam(":pass", $this->password);

        if ($sentencia->execute()) {
            if ($sentencia->rowCount() > 0) {
                $row = $sentencia->fetch(PDO::FETCH_NUM);
                $cargo = $row[4];
                $_SESSION["cargo"] = $cargo;
                switch ($_SESSION["cargo"]) {
                    case 1:
                        return 1;
                        break;

                    case 2:
                        return 2;
                        break;
                }
                return true;
            } else {
                return false;
            }
        }
    }

    //funcion para validar si existen los datos que puso el usuario para recuperar su contraseña
    function validarDatos()
    {
        $conexion = new ConexionPDO();
        $sql = ("SELECT * FROM usuario WHERE correo = :cor");
        $sentencia = $conexion->mysql->prepare($sql);
        $sentencia->bindParam(":cor", $this->correo);

        if ($sentencia->execute()) {
            if ($sentencia->rowCount() > 0) {
                $row = $sentencia->fetch(PDO::FETCH_NUM);
                $id = $row[0];
                return $_SESSION["id"] = $id;
                return true;
            } else {
                return false;
            }
        }
    }

    //funcion para actualizar el token cada ves que alguien quiera actualizar su contraseña
    function insertarToken($token,$id){
        $conexion = new ConexionPDO();
        $sql = ("UPDATE usuario SET token = :tok WHERE id = :id");
        $sentencia = $conexion->mysql->prepare($sql);
        $sentencia->bindParam(":tok", $token);
        $sentencia->bindParam(":id", $id);
        $sentencia->execute();
    }

    function validarDatosSeguridad($id,$token)
    {
        $conexion = new ConexionPDO();
        $sql = ("SELECT * FROM usuario WHERE id = :id AND token = :tok");
        $sentencia = $conexion->mysql->prepare($sql);
        $sentencia->bindParam(":id", $id);
        $sentencia->bindParam(":tok", $token);
        return $sentencia->execute();
    }
    function actualizarPassword($id,$newPassword)
    {
        $conexion = new ConexionPDO();
        $sql = ("UPDATE usuario SET password = :pass WHERE id = :id");
        $sentencia = $conexion->mysql->prepare($sql);
        $sentencia->bindParam(":id", $id);
        $sentencia->bindParam(":pass", $newPassword);

        return $sentencia->execute();
    }

    //metodo para generar una cadena de string aleatoria
    function generate_string() {
        $strength = 10;
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}
