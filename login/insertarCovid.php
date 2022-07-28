<?php
include("conexion.php");
$con=conectar();

if(isset($_POST['correo']))
{
$correoPaciente=$_POST['correo'];    
}
$id_paciente=$_POST['id_paciente'];
$n_personas_vive=$_POST['n_personas_vive'];
$linkManual="https://unachedu-my.sharepoint.com/:f:/g/personal/lidia_enriquez_unach_edu_ec/EkhbkKAdVldBoJRazQvCFNYBb31b-ZuNSlETf-Lczx8tMQ?e=kgJAlb";

$trabaja=0;
$estudia=0;
$enfermedad_catastrofica=0;
$diabetes=0;
$sobrepeso=0;
$seguro_iees=0;
$examen_covid=0;
if(isset($_POST['trabaja'])){$trabaja=1;}
if(isset($_POST['estudia'])){$estudia=1;}
if(isset($_POST['enfermedad_catastrofica'])){$enfermedad_catastrofica=1;}
if(isset($_POST['diabetes'])){$diabetes=1;}
if(isset($_POST['sobrepeso'])){$sobrepeso=1;}
if(isset($_POST['seguro_iees'])){$seguro_iees=1;}
$nombre_contacto_emergencia=$_POST['nombre_contacto_emergencia'];
$telefono_c_e=$_POST['telefono_c_e'];
$celular_c_e=$_POST['celular_c_e'];
$mail=$_POST['mail'];
if(isset($_POST['examen_covid'])){$examen_covid=1;}

echo $id_paciente.','.$n_personas_vive.','.$trabaja.','.$estudia.','.$enfermedad_catastrofica.','.$diabetes.','.$sobrepeso.','.$seguro_iees.','.$nombre_contacto_emergencia.','.$telefono_c_e.','.$celular_c_e.','.$mail.','.$examen_covid.")";

try {
    $sql="INSERT INTO prueba_covid(idPaciente,n_personas_vive,trabaja,estudia,enfermedad_catastrofica,diabetes,sobrepeso,seguro_iees,nombre_contacto_emergencia,telefono_c_e,celular_c_e,mail,examen_covid) 
        VALUES($id_paciente,$n_personas_vive,$trabaja,$estudia,$enfermedad_catastrofica,$diabetes,$sobrepeso,$seguro_iees,'$nombre_contacto_emergencia','$telefono_c_e','$celular_c_e','$mail',$examen_covid)";
    $query= mysqli_query($con,$sql);
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


if($query){
    if($examen_covid==1)
    {
$resultadoPrueba="POSITIVO";
    }
    else
    {
       $resultadoPrueba="NEGATIVO"; 
    }
    //ENVIAR CORREO
    include("EnviarCorreo.php");
    Header("Location: paciente.php");
    $correo=new ENVIAR_CORREO();
    $correo->Enviar_Correo($correoPaciente,"Resultado de la prueba COVID-19:".$resultadoPrueba."     Manual de usuario: ".$linkManual,"Resultado Prueba COVID-19");
}else {
}
?>