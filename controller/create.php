<?php 
    include("../models/conexion.php");
    $conn = conexion();

    if (!empty($_POST['registrar'])) {

        if (empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['celular'])) {
            echo '
                <script>
                    alert("Debes rellenar todos los campos!!");
                    window.location = "../index.php"; 
                </script>
            ';
        } else {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $celular = $_POST["celular"];
            $genero = $_POST["genero"];

            $sql = "INSERT INTO crud (nombre, apellido, celular, genero) values ('$nombre','$apellido',$celular,'$genero')";            
            
            if (mysqli_query($conn,$sql)) {
                echo '
                    <script>
                        alert("Registro con Éxito!!");
                        window.location = "../index.php"; 
                    </script>
                ';
                    //header("location:../index.php");
            } else {
                echo '
                    <script>
                        alert("Usuario no registrado - Error de conexion!!")
                    </script>
                '.$sql.mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>