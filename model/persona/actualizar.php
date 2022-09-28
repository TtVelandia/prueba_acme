<?php
print_r($_POST);
if (!isset($_POST['pers_id'])) {
    header('Location: ../../view/persona/index.php?mesaje=error');
}

include_once '../conexion.php';
$pers_id = $_POST['pers_id'];
$cedula = $_POST["txtCedula"];
$primer_nombre = $_POST["txtPrimerNombre"];
$segundo_nombre = $_POST["txtSegundoNombre"];
$apellidos = $_POST["txtApellidos"];
$direccion = $_POST["txtDirección"];
$telefono = $_POST["txtTeléfono"];
$ciudad = $_POST["txtCiudad"];

$sentencia = $bd->prepare("UPDATE persona SET numero_cedula = ?, primer_nombre = ?, segundo_nombre = ?, apellidos = ?, direccion = ?, telefono = ?, ciudad = ? where pers_id = ?;");
$resultado = $sentencia->execute([$cedula, $primer_nombre, $segundo_nombre, $apellidos, $direccion, $telefono, $ciudad, $pers_id]);

if ($resultado === TRUE) {
    header('Location: ../../view/persona/index.php?mesaje=editado');
} else {
    header('Location: ../../view/persona/index.php?mesaje=error');
    exit();
}


?>