<?php
if (!isset($_GET['vehi_id'])) {
    header('Location: ../../view/vehiculo/index.php?mesaje=error');
    exit();
}

include_once '../conexion.php';
$vehi_id = $_GET['vehi_id'];

$sentencia = $bd->prepare("DELETE FROM vehiculo where vehi_id = ?;");
$resultado = $sentencia->execute([$vehi_id]);

if ($resultado === TRUE) {
    header('Location: ../../view/vehiculo/index.php?mesaje=eliminado');
} else {
    header('Location: ../../view/vehiculo/index.php?mesaje=error');
    exit();
}

?>