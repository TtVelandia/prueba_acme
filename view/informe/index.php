<?php
    include_once "../../model/conexion.php";
    $sentencia = $bd->query("SELECT placa, color, marca, 
    CONCAT(conductor.primer_nombre, ' ', conductor.apellidos) as conductor,
    CONCAT(propietario.primer_nombre, ' ', propietario.apellidos) as propietario
    FROM vehiculo as vehi
    inner join persona as conductor on conductor.pers_id = vehi.pers_id_conductor
    inner join persona as propietario on propietario.pers_id = vehi.pers_id_propietario");
    $lista_informe = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Informe</title>
</head>

<body>

    <div class="col-md-8 container p-4">
        <div class="row">
            <div class="col">
                <table class="table  table-bordered table-striped caption-top">
                    <thead class="table-dark">
                        <caption class="text-center bg-success text-light h2 m-0">Informe Acme</caption>
                        <tr>
                            <th scope="col">PLACA VEHICULO</th>
                            <th scope="col">MARCA VEHICULO</th>
                            <th scope="col">NOMBRE CONDUCTOR</th>
                            <th scope="col">NOMBRE PROPIETARIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($lista_informe as $info) {   
                        ?>
                            <tr>
                            <td><?php echo $info->placa; ?></td>
                            <td><?php echo $info->marca; ?></td>
                            <td><?php echo $info->conductor; ?></td>
                            <td><?php echo $info->propietario; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-md-12 text-light text-center">
                <a href="../../index.html"><button class="btn btn-outline-success me-2" type="button">Volver a la página de inicio</button></a>
            </div>
        </div>

        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>