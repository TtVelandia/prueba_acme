
<?php
    include_once "../../model/conexion.php";
    if (!isset($_GET['pers_id'])) {
        header('Location: editar.php?mesaje=error');
        exit();
    }
    $pers_id = $_GET['pers_id'];

    $sentencia = $bd->prepare("select * from persona where pers_id = ?;");
    $sentencia->execute([$pers_id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);


?>

<!doctype html>
<html lang="es">

<head>
    <title>Registro de Personas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- cdn iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid bg-warning">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">Editar registro Persona</h3>
                </header>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Editar Datos
                    </div>
                    <form action="../../model/persona/actualizar.php" class="p-4" method="POST">
                        <div class="mb-2">
                            <label class="form-label">Cédula: </label>
                            <input type="number" class="form-control" name="txtCedula" placeholder="Número de Cédula" autofocus required value="<?php echo $persona->numero_cedula; ?>">
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Primer nombre: </label>
                            <input type="text" class="form-control" name="txtPrimerNombre" placeholder="Primer Nombre" autofocus required value="<?php echo $persona->primer_nombre; ?>">
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Segundo nombre: </label>
                            <input type="text" class="form-control" name="txtSegundoNombre" placeholder="Segundo Nombre" autofocus value="<?php echo $persona->segundo_nombre; ?>">
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Apellidos: </label>
                            <input type="text" class="form-control" name="txtApellidos" placeholder="Apellidos" autofocus required value="<?php echo $persona->apellidos; ?>">
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Dirección: </label>
                            <input type="text" class="form-control" name="txtDirección" placeholder="Dirección" autofocus required value="<?php echo $persona->direccion; ?>">
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Teléfono: </label>
                            <input type="number" class="form-control" name="txtTeléfono" placeholder="Teléfono" autofocus required value="<?php echo $persona->telefono; ?>">
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Ciudad: </label>
                            <input type="text" class="form-control" name="txtCiudad" placeholder="Ciudad" autofocus required value="<?php echo $persona->ciudad; ?>">
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="pers_id" value="<?php echo $persona->pers_id; ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-dark fixed-bottom">
            <div class="row">
                <div class="col-md text-light text-center py-3">
                    Desarrollado por Tatiana Velandia 
                </div>
            </div>
        </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>