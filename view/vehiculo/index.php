
<?php
    include_once "../../model/conexion.php";
    $sentencia = $bd->query("SELECT vehi_id, placa,marca, color, tive.tive_descripcion
    FROM vehiculo as vehi
    inner join tipo_vehiculo as tive on (tive.tive_id = vehi.tive_id)");
    $lista_vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $sentencia = $bd->query("SELECT pers_id,CONCAT(primer_nombre, ' ', apellidos) as nombre from persona");
    $lista_personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $sentencia = $bd->query(" SELECT * from tipo_vehiculo;");
    $tipo_vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ)

// print_r($persona);
?>

<!doctype html>
<html lang="es">
    <head>
    <title>Registro de Vehiculo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- cdn iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>

        <div class="container-fluid bg-primary text-light">
            <div class="row">
                <div class="col-md">
                    <header class="py-3">
                        <h3 class="text-center">Registro de Vehículo</h3>
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
                            Vehículos Registrados
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Placa</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Tipo Vehículo</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($lista_vehiculos as $vehiculo) {
                                        ?>

                                        <tr>
                                            <td><?php echo $vehiculo->placa; ?></td>
                                            <td><?php echo $vehiculo->color; ?></td>
                                            <td><?php echo $vehiculo->marca; ?></td>
                                            <td><?php echo $vehiculo->tive_descripcion; ?></td>

                                            <td><a class="text-primary" href="editar.php?vehi_id=<?php echo $vehiculo->vehi_id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar este vehículo?')" class="text-danger" href="../../model/vehiculo/eliminar.php?vehi_id=<?php echo $vehiculo->vehi_id; ?>"><i class="bi bi-trash"></i></a></td>
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
                        <form action="../../model/vehiculo/registrar.php" class="p-4" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtPlaca" placeholder="Placa" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtColor" placeholder="Color" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="txtMarca" placeholder="Marca" autofocus required>
                            </div>

                            <div class="mb-3">
                            <select name="tipo_vehiculo" class="form-select" aria-label="tipo_vehiculo">
                            <option selected>Tipo vehículo</option>
                            <?php
                                foreach ($tipo_vehiculos as $tipo_vehiculo) {
                                ?>
                                    <option value="<?php echo $tipo_vehiculo->tive_id; ?>"><?php echo $tipo_vehiculo->tive_descripcion; ?></option>

                                <?php
                                    }
                                ?>
                            </select>
                            </div>

                            <div class="mb-3">
                            <select name="propietario" class="form-select" aria-label="Propietario">
                            <option selected>Propietario</option>
                            <?php
                                foreach ($lista_personas as $persona) {
                                ?>
                                    <option value="<?php echo $persona->pers_id; ?>"><?php echo $persona->nombre; ?></option>

                                <?php
                                    }
                                ?>
                            </select>
                            </div>

                            <div class="mb-3">
                            <select name="conductor" class="form-select" aria-label="Conductor">
                            <option selected>Conductor</option>
                            <?php
                                foreach ($lista_personas as $persona) {
                                ?>
                                    <option value="<?php echo $persona->pers_id; ?>"><?php echo $persona->nombre; ?></option>

                                <?php
                                    }
                                ?>
                            </select>
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

        <div class="row">
            <div class="col-md-3 text-light text-center">
                <a href="../../index.html"><button class="btn btn-primary  me-2" type="button">Ir a página de inicio
            </div>
        </div>

        <footer class="container-fluid bg-dark fixed-bottom">
            <div class="row">
                <div class="col-md text-light text-center py-3">
                    Desarrollado por Empresa de Transportes ACME
                </div>
            </div>
        </footer>
    
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    
    </body>
</html>