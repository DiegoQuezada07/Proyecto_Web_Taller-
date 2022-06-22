<?php 
require_once '../conexion/ConexionPDO.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Listar Registros</title>
    <script src="../scripts/listarRegistrojs.js"></script>

    
    <style>
    body{
    background-color: #121212;
      }
   table{
    padding: 0.5rem;
    background-color : #121212;
    color: white;
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
    
<div id="tabla"></div>

</body>
</html>