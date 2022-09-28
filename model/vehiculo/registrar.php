
<?php


    if(empty($_POST["oculto"]) || empty($_POST["txtPlaca"]) || empty($_POST["txtColor"]) ||empty($_POST["txtMarca"]) ||empty($_POST["tipo_vehiculo"]) ||empty($_POST["propietario"]) ||empty($_POST["conductor"])) {
        header('Location: ../../view/vehiculo/index.php?mesaje=falta');
        exit();
    }   

    include_once '../conexion.php';
    $placa = $_POST["txtPlaca"];
    $color = $_POST["txtColor"];
    $marca = $_POST["txtMarca"];
    $tipo_vehiculo = $_POST["tipo_vehiculo"];
    $propietario = $_POST["propietario"];
    $conductor = $_POST["conductor"];

    $sentencia = $bd->prepare("INSERT INTO vehiculo(placa, color, marca, tive_id, pers_id_propietario, pers_id_conductor ) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$placa, $color, $marca, $tipo_vehiculo, $propietario, $conductor]);


    if ($resultado === TRUE) {
        header('Location: ../../view/vehiculo/index.php?mesaje=registrado');
    }else{
        header('Location: ../../view/vehiculo/index.php?mesaje=error');
        exit();
    }
?>