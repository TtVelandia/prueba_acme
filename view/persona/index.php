
<?php
    include_once "../../model/conexion.php";
    $sentencia = $bd->query("select * from persona");
    $lista_personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($persona);
?>

<!doctype html>
<html lang="es">
    <head>
    <title>Registro de Personas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- cdn iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>

        <div class="container-fluid bg-warning">
            <div class="row">
                <div class="col-md">
                    <header class="py-3">
                        <h3 class="text-center">Registro de Personas</h3>
                    </header>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <!--Inicio de alerta -->
                    <?php
                        if (isset($_GET['mesaje']) and $_GET['mesaje']== 'registrado') {
                    ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Registrado!</strong> Se agregarón los datos.
                    </div>
                    <?php
                        }
                    ?>

                    <?php
                        if (isset($_GET['mesaje']) and $_GET['mesaje']== 'error') {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error!</strong> Vuelve a intertar.
                    </div>
                    <?php
                        }
                    ?>

                    <?php      
                        if (isset($_GET['mesaje']) and $_GET['mesaje']== 'editado') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Cambiado!</strong> Los datos fuerón actualizados.
                    </div>
                    <?php
                        }
                    ?>

                    <?php      
                        if (isset($_GET['mesaje']) and $_GET['mesaje']== 'eliminado') {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Eliminado!</strong> Los datos fuerón eliminados.
                    </div>
                    <?php
                        }
                    ?>
                    <!--Fin de alerta -->

                    <div class="card">
                        <div class="card-header">
                            Personas Registradas
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Cédula</th>
                                        <th scope="col">Primer Nombre</th>
                                        <th scope="col">Segundo Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($lista_personas as $persona) {
                                        ?>

                                        <tr>
                                            <td scope="row"><?php echo $persona->pers_id; ?></td>
                                            <td><?php echo $persona->numero_cedula; ?></td>
                                            <td><?php echo $persona->primer_nombre; ?></td>
                                            <td><?php echo $persona->segundo_nombre; ?></td>
                                            <td><?php echo $persona->apellidos; ?></td>
                                            <td><?php echo $persona->direccion; ?></td>
                                            <td><?php echo $persona->telefono; ?></td>
                                            <td><?php echo $persona->ciudad; ?></td>
                                            <td><a class="text-primary" href="editar.php?pers_id=<?php echo $persona->pers_id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar este registro?')" class="text-danger" href="../../model/persona/eliminar.php?pers_id=<?php echo $persona->pers_id; ?>"><i class="bi bi-trash"></i></a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php
                        if (isset($_GET['mesaje']) and $_GET['mesaje']== 'falta') {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error!</strong> Faltan datos.
                    </div>
                    <?php
                        }
                    ?>
                    <!--Fin de alerta -->

                    <div class="card">
                        <div class="card-header">
                            Ingresar Datos
                        </div>
                        <form action="../../model/persona/registrar.php" class="p-4" method="POST">
                            <div class="mb-3">
                                <input type="number" class="form-control" name="txtCedula" placeholder="Número de Cédula" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtPrimerNombre" placeholder="Primer Nombre" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtSegundoNombre" placeholder="Segundo Nombre" autofocus>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtApellidos" placeholder="Apellidos" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtDirección" placeholder="Dirección" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="txtTeléfono" placeholder="Teléfono" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtCiudad" placeholder="Ciudad" autofocus required>
                            </div>
                            <!--div class="mb-3"-->
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-primary" value="Registrar">
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