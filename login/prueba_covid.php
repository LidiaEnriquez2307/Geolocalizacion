<?php 
    include("conexion.php");
    $con=conectar();
if(isset($_GET['id'])){
    $id_paciente=$_GET['id']; 
}
if(isset($_GET['correo'])){
    $correo=$_GET['correo'];
}
    $sql="SELECT *  FROM prueba_covid";
    $query=mysqli_query($con,$sql);
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Prueba_covid</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h2>Ingreso de datos</h2>
                                <form action="insertarCovid.php" method="POST">
                                    <input type="text" class="form-control mb-3" name="id_paciente" placeholder="id_paciente" value="<?php echo $id_paciente?>" hidden>
                                    <input type="text" name="correo" value="<?php echo $correo?>" hidden>
                                    

                                    <input type="text" class="form-control mb-3" name="n_personas_vive" placeholder="Número de personas con las que vive" required >
                                    
                                    
                                    <input type="checkbox" id="trabaja" name="trabaja" value="trabaja">
                                    <label for="trabaja"> Trabaja</label><br>

                                    <input type="checkbox" id="estudia" name="estudia" value="estudia">
                                    <label for="estudia"> Estudia</label><br>

                                    <input type="checkbox" id="enfermedad" name="enfermedad_catastrofica" value="enfermedad">
                                    <label for="enfermedad_catastrofica"> Tiene enfermedad catastrófica</label><br>

                                    <input type="checkbox" id="diabetes" name="diabetes" value="diabetes">
                                    <label for="diabetes"> Tiene Diabetes</label><br>

                                    <input type="checkbox" id="sobrepeso" name="sobrepeso" value="sobrepeso">
                                    <label for="sobrepeso"> Tiene sobrepeso</label><br>

                                    <input type="checkbox" id="seguro_iees" name="seguro_iees" value="seguro_iees">
                                    <label for="seguro_iees"> Es asegurado al IESS</label><br>
   
                                    <input type="text" class="form-control mb-3" name="nombre_contacto_emergencia" placeholder="Nombre del contacto de emergencia" required >
                                    <input type="text" class="form-control mb-3" name="telefono_c_e" placeholder="Telefono de la perosna de ocntacto" required >
                                    <input type="text" class="form-control mb-3" name="celular_c_e" placeholder="Celular de la perosna de ocntacto" required >
                                   
                                    <input type="text" class="form-control mb-3" name="mail" placeholder="Correo de contacto de emergencia" required >
                                
                                    <input type="checkbox" id="examen_covid" name="examen_covid" value="examen_covid">
                                    <label for="examen_covid"> Tiene COVID</label><br>
   
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                       
                    </div>  
            </div>
    </body>
</html>