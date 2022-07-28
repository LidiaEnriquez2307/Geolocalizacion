<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM paciente";
    $query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Paciente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
       <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>-->

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin=""/>
      
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h2>Ingreso de datos</h2>

                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" required>
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" required>
                                    <input type="date" class="form-control mb-3" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required >
                                    
                                        <select name="sexo" required>
                                        <option selected>SELECCIONAR SEXO</option>
                                        <option>FEMENINO</option>
                                        <option>MASCULINO</option>
                                        <option>OTRO</option>
                                        </select>
                                        <h1>   </h1>
                                        
                                        
                                    <input type="text" class="form-control mb-3" name="direccion" placeholder="Direccion" required >
                                    <input type="text" class="form-control mb-3" name="cedula" placeholder="Cedula" required >
                                    <input type="text" class="form-control mb-3" name="telefono" placeholder="Telefono" required >
                                    <input type="text" class="form-control mb-3" name="celular" placeholder="Celular" required >
                                    <input type="text" class="form-control mb-3" name="correo" placeholder="Correo" required >
                                    <input type="float" class="form-control mb-3" name="latitud" id="lat" placeholder="Latitud" readonly required >
                                    <input type="float" class="form-control mb-3" name="longitud"  id="lng" placeholder="Longitud" readonly requiared>

                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class = "col-md-8">
                            <div id="myMap" style="height: 600px"> </div>


                        </div>
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th hidden>N°</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Sexo</th>
                                        <th>Dirección</th>
                                        <th>Cedula</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Correo</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th hidden><?php  echo $row['idPaciente']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>
                                                <th><?php  echo $row['fecha_nacimiento']?></th>
                                                <th><?php  echo $row['sexo']?></th> 
                                                <th><?php  echo $row['direccion']?></th>
                                                <th><?php  echo $row['cedula']?></th>
                                                <th><?php  echo $row['telefono']?></th>
                                                <th><?php  echo $row['celular']?></th>
                                                <th><?php  echo $row['mail']?></th>
                                                <th><?php  echo $row['latitud']?></th> 
                                                <th><?php  echo $row['longitud']?></th>                                           
                                                
                                              <!--   <th><a href="delete.php?id=<?php // echo $row['idPaciente']?> "class="btn btn-info">Eliminar</a> -->
                                                <th><a href="prueba_covid.php?id=<?php echo $row['idPaciente'] ?>&correo=<?php echo $row['mail'] ?>" class="btn btn-info">Resultado Exámen</a>                                        
                                                </th>                                     
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>

  <script type ="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
     crossorigin=""></script>
    
   

   <script src = "assets/js/geolocalizacion.js"></script>
    <script src="assets/js/geosearch.js"></script>
</html>