<?php
    include("../models/conexion.php");
    $conn = conexion();
    
    $sql = "DELETE FROM crud WHERE id='$_GET[id]'";

    if (mysqli_query($conn,$sql)) {
        echo '
            <script>
                alert("Datos eliminados con Éxito!!");
                window.location = "../index.php"; 
            </script>
        ';
        //header("location:../index.php");
    }else {    
        echo '
            <script>
                alert("Usuario no eliminado - Error de conexion!!"); 
            </script>
        '.$sql.mysqli_error($conn);
    }

    mysqli_close($conn);
?>