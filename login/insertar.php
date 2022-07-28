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

$sql="INSERT INTO paciente(nombres,apellidos,fecha_nacimiento,sexo,direccion,cedula,telefono,celular,mail,latitud,longitud) 
VALUES('$nombres','$apellidos','$fecha_nacimiento','$sexo','$direccion','$cedula','$telefono','$celular','$correo',$latitud,$longitud)";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: paciente.php");
    
}else {
}
?>