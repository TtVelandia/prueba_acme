<?php
print_r($_POST);
if (!isset($_POST['vehi_id'])) {
    header('Location: ../../view/vehiculo/index.php?mesaje=error');
}

include_once '../conexion.php';
$vehi_id = $_POST["vehi_id"];
$placa = $_POST["txtPlaca"];
$color = $_POST["txtColor"];
$marca = $_POST["txtMarca"];
$tipo_vehiculo = $_POST["tipo_vehiculo"];
$propietario = $_POST["propietario"];
$conductor = $_POST["conductor"];

$sentencia = $bd->prepare("UPDATE vehiculo SET placa = ?, color = ?, marca = ?, tive_id = ?, pers_id_propietario = ?, pers_id_conductor = ? where vehi_id = ?;");
$resultado = $sentencia->execute([$placa, $color, $marca, $tipo_vehiculo, $propietario, $conductor, $vehi_id]);


if ($resultado === TRUE) {
    header('Location: ../../view/vehiculo/index.php?mesaje=editado');
} else {
    header('Location: ../../view/vehiculo/index.php?mesaje=error');
    exit();
}


?>