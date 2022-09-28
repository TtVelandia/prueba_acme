<?php


    if(empty($_POST["oculto"]) || empty($_POST["txtCedula"]) || empty($_POST["txtPrimerNombre"]) ||empty($_POST["txtApellidos"]) ||empty($_POST["txtDirección"]) ||empty($_POST["txtTeléfono"]) ||empty($_POST["txtCiudad"])) {
        header('Location: ../../view/persona/index.php?mesaje=falta');
        exit();
    }   

    include_once '../conexion.php';
    $cedula = $_POST["txtCedula"];
    $primer_nombre = $_POST["txtPrimerNombre"];
    $segundo_nombre = $_POST["txtSegundoNombre"];
    $apellidos = $_POST["txtApellidos"];
    $direccion = $_POST["txtDirección"];
    $telefono = $_POST["txtTeléfono"];
    $ciudad = $_POST["txtCiudad"];


    $sentencia = $bd->prepare("INSERT INTO persona(numero_cedula, primer_nombre, segundo_nombre, apellidos, direccion, telefono, ciudad) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$cedula,$primer_nombre,$segundo_nombre,$apellidos,$direccion,$telefono,$ciudad]);


    if ($resultado === TRUE) {
        header('Location: ../../view/persona/index.php?mesaje=registrado');
    }else{
        header('Location: ../../view/persona/index.php?mesaje=error');
        exit();
    }
?>