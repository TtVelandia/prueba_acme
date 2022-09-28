
<?php
    include_once "../../model/conexion.php";
    if (!isset($_GET['vehi_id'])) {
        header('Location: editar.php?mesaje=error');
        exit();
    }
    $vehi_id = $_GET['vehi_id'];

    $sentencia = $bd->prepare("select * from vehiculo where vehi_id = ?;");
    $sentencia->execute([$vehi_id]);
    $vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);

    $sentencia = $bd->query("SELECT pers_id,CONCAT(primer_nombre, ' ', apellidos) as nombre from persona");
    $lista_personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $sentencia = $bd->query(" SELECT * from tipo_vehiculo;");
    $tipo_vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ)



?>

<!doctype html>
<html lang="es">

<head>
    <title>Editar vehículo</title>
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
                    <h3 class="text-center">Editar datos vehículo</h3>
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
                    <form action="../../model/vehiculo/actualizar.php" class="p-4" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Placa: </label>
                                <input type="text" class="form-control" name="txtPlaca" placeholder="Placa" autofocus required value="<?php echo $vehiculo->placa; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Color: </label>
                                <input type="text" class="form-control" name="txtColor" placeholder="Color" autofocus required value="<?php echo $vehiculo->color; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Marca: </label>
                                <input type="text" class="form-control" name="txtMarca" placeholder="Marca" autofocus required value="<?php echo $vehiculo->marca; ?>">
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Tipo vehículo: </label>
                            <select name="tipo_vehiculo" class="form-select" aria-label="tipo_vehiculo">
                                <option>Tipo vehículo</option>
                            <?php
                                foreach ($tipo_vehiculos as $tipo_vehiculo) {

                                    if ($vehiculo->tive_id === $tipo_vehiculo->tive_id) {
                                ?>
                                    <option selected value="<?php echo $tipo_vehiculo->tive_id; ?>"><?php echo $tipo_vehiculo->tive_descripcion; ?></option>

                                <?php
                                    } else {
                                ?>
                                    <option value="<?php echo $tipo_vehiculo->tive_id; ?>"><?php echo $tipo_vehiculo->tive_descripcion; ?></option>
                                <?php 
                                        }
                                    }
                                ?>
                            </select>
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Propietario: </label>
                            <select name="propietario" class="form-select" aria-label="Propietario">
                            <option>Propietario</option>
                            <?php
                                foreach ($lista_personas as $persona) {

                                    if ($persona->pers_id === $vehiculo->pers_id_propietario) {
                                    
                                ?>
                                    <option selected value="<?php echo $persona->pers_id; ?>"><?php echo $persona->nombre; ?></option>

                                <?php
                                        } else {
                                ?>
                                    <option value="<?php echo $persona->pers_id; ?>"><?php echo $persona->nombre; ?></option>
                                <?php 
                                        }
                                    }
                                ?>
                            </select>
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Conductor: </label>
                            <select name="conductor" class="form-select" aria-label="Conductor">
                            <option >Conductor</option>
                            <?php
                                foreach ($lista_personas as $persona) {

                                    if ($persona->pers_id === $vehiculo->pers_id_conductor) {
                                ?>
                                    <option selected value="<?php echo $persona->pers_id; ?>"><?php echo $persona->nombre; ?></option>

                                <?php
                                    } else {
                                        ?>
                                            <option value="<?php echo $persona->pers_id; ?>"><?php echo $persona->nombre; ?></option>
                                        <?php 
                                        }
                                    }
                                ?>
                            </select>
                            </div>
                            <!--div class="mb-3"-->
                            <div class="d-grid">
                                <input type="hidden" name="vehi_id" value="<?php echo $vehiculo->vehi_id; ?>">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
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