<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="text-center p-3">Crud Models View Controller</h1>
    
    <div class="container-md row">

        <form class="col-3 p-3 mt-5" action="controller/create.php" method="post">
            <h3 class="text-center p-3">Formulario de registro</h3>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe tu nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Escribe tu apellido">
            </div>
            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="number" class="form-control" name="celular" id="celular" placeholder="Escribe tu celular">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero</label>
                <select class="form-select form-control" name="genero" id="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" value="registrar" name="registrar">Registrar</button>
            <button type="reset" class="btn btn-danger" value="cancelar" name="cancelar">Cancelar</button>
        </form>

        <div class="col-9 p-5">
            <table class="table">
                <thead class="bg-info text-center">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        include("models/conexion.php");
                        $conn = conexion();

                        $sql = "SELECT * FROM crud "; /**ORDER BY id ASC*/
                        $result = mysqli_query($conn,$sql);

                        while ($a = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $a['id'] ?></td>
                            <td><?php echo $a['nombre'] ?></td>
                            <td><?php echo $a['apellido'] ?></td>
                            <td><?php echo $a['celular'] ?></td>
                            <td><?php echo $a['genero'] ?></td>
                            <th>
                                <a href="update.php?id=<?php echo $a['id']?>" class="btn btn-warning">Update</a>
                                <a href="controller/delete.php?id=<?php echo $a['id']?>" class="btn btn-danger">Delete</a>
                            </th>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>