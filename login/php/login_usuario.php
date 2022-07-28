<?php

    session_start();
    include 'conexion_bd.php';

    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];

    $validar_login=mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' 
    and contrasena='$contrasena' ");

    if(mysqli_num_rows($validar_login)>0){
        $_SESSION['usuario']=$correo;
        header("location: ../paciente.php");
        exit();
    }else{
        echo '
            <script>
                alert("El usuario no existe, o las credenciales estan mal ingresadas, intentelo otra vez");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }



?>