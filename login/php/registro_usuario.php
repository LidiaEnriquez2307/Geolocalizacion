<?php

include 'conexion_bd.php';

    $nombre_usuario=$_POST['nombre_usuario'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];

    $query="INSERT INTO usuario(nombre_usuario, correo, usuario, contrasena) 
    VALUES  ('$nombre_usuario','$correo','$usuario','$contrasena')";

    //Verificar que el correo no se repita en la bd
    $verificar_correo=mysqli_query($conexion,"SELECT * FROM usuario WHERE correo='$correo' ");
    
    if(mysqli_num_rows($verificar_correo)>0){
        echo '
            <script>
                alert("El correo ya esta registrado, intente con otro distinto");
                window.location = "../index.php";
            </script>
        ';
        exit();
        mysqli_close($conexion);
    }

    //Verificar que el nombre no se repita en la bd
    $verificar_usuario=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario='$usuario' ");
    
    if(mysqli_num_rows($verificar_usuario)>0){
        echo '
            <script>
                alert("El nombre de usuario ya esta en uso, intente con otro distinto");
                window.location = "../index.php";
            </script>
        ';
        exit();
        mysqli_close($conexion);
    }

    $ejecutar=mysqli_query($conexion, $query);

    if($ejecutar){
        include("../EnviarCorreo.php");
        $_correo=new ENVIAR_CORREO();
        $_correo->Enviar_Correo($correo,"Usuario:".$usuario." Contraseña: ".$contrasena,"Credenciales de usuario");
        echo '
            <script>
                alert("Usuario registrado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
        <script>
            alert("No se pudo realziar el ingreso, intentelo otra vez");
            window.location = "../index.php";
        </script>
    ';
    }


    mysqli_close($conexion);
?>