<?php
if (!isset($_GET['pers_id'])) {
    header('Location: ../../view/persona/index.php?mesaje=error');
    exit();
}

include_once '../conexion.php';
$pers_id = $_GET['pers_id'];

$sentencia = $bd->prepare("DELETE FROM persona where pers_id = ?;");
$resultado = $sentencia->execute([$pers_id]);

if ($resultado === TRUE) {
    header('Location: ../../view/persona/index.php?mesaje=eliminado');
} else {
    header('Location: ../../view/persona/index.php?mesaje=error');
    exit();
}

?>