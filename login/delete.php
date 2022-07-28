<?php

include("conexion.php");
$con=conectar();

$id_paciente=$_GET['id'];

$sql="DELETE FROM paciente  WHERE idPaciente='$id_paciente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: paciente.php");
    }else{
        echo "no se pudo eliminar";
    }
?>