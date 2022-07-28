<?php

include("conexion.php");
$con=conectar();

$id_paciente=$_POST['id_paciente'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$sexo=$_POST['sexo'];
$direccion=$_POST['direccion'];
$cedula=$_POST['cedula'];
$telefono=$_POST['telefono'];
$celular=$_POST['celular'];
$correo=$_POST['correo'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];

$sql="UPDATE paciente SET  nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',direccion='$direccion',cedula='$cedula',telefono='$telefono',celular='$celular',mail='$correo',latitud='$latitud',longitud='$longitud' WHERE idPaciente='$id_paciente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: paciente.php");
    }else{
        echo "No se pudo actualizar";
    }
?>