<?php
    include("../models/conexion.php");
    $conn = conexion();

    if (!empty($_POST['modifica'])) {

        if (empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['celular'])) {
            echo "<script>alert('No debe quedar ningun campo vacío')</script>";

        }else {

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $celular = $_POST['celular'];
            $genero = $_POST['genero'];

            $sql = "UPDATE crud SET nombre='$nombre', apellido='$apellido', celular=$celular, genero='$genero' WHERE id = $id";
            $result = mysqli_query($conn,$sql);

            if ($result) {
                echo '
                    <script>
                        alert("Datos modificados con Éxito!!");
                        window.location = "../index.php"; 
                    </script>
                ';
                //header("location:../index.php");
            }else {
                echo '
                    <script>
                        alert("Datos no modificados - Error de conexion!!"); 
                    </script>
                '.$sql.mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
?>