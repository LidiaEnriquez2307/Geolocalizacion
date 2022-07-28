<?php
    
    class POSTGIS
    {
        public $ID_Contagio;
        public $Nombre;
        public $Apellido;
        public $Sexo;
        public $Edad;
        public $Direccion;
        public $Latitud;
        public $Longitud;
        public $Unidad_Medica;
        public $Fecha_Atencion;
        public $Prueba;
        public $Resultado;

        public function __construct()
        {
            $this->ID_Contagio=0;
            $this->Nombre="";
            $this->Apellido="";
            $this->Sexo="";
            $this->Edad=0;
            $this->Direccion="";
            $this->Latitud="0";
            $this->Longitud="0";
            $this->Unidad_Medica="";
            $this->Fecha_Atencion="";
            $this->Prueba="";
            $this->Resultado="";
        }

        public function Proceso($b)
        {
            $Mensaje="";
            $Bandera=false;
            $Resultado=null; 
            $Accion="";
            $Resultado=null;
            $Usuario=unserialize($_SESSION["Usuario"]);

            switch($b)
            {
                case 1:
                    {
                        $Accion="INSERTAR";

                        break;
                    }
            }

            try
            {
                DAO_POSTGIS::Conectar();
                DAO_POSTGIS::$Cnx->beginTransaction();
                $Sql=DAO_POSTGIS::$Cnx->prepare("select* from Sp_Postgis(:id,:nombre,:apellido, :sexo, :edad, :direccion, :latitud, :longitud, :unidad, :fecha, :prueba, :resultado, :b);");
                $Sql->bindParam(":id",$this->ID_Contagio,PDO::PARAM_INT);
                $Sql->bindParam(":nombre",$this->Nombre,PDO::PARAM_STR);
                $Sql->bindParam(":apellido",$this->Apellido,PDO::PARAM_STR);
                $Sql->bindParam(":sexo",$this->Sexo,PDO::PARAM_STR);
                $Sql->bindParam(":edad",$this->Edad,PDO::PARAM_STR);
                $Sql->bindParam(":direccion",$this->Direccion,PDO::PARAM_STR);
                $Sql->bindParam(":latitud",$this->Latitud,PDO::PARAM_STR);
                $Sql->bindParam(":longitud",$this->Longitud,PDO::PARAM_STR);
                $Sql->bindParam(":unidad",$this->Unidad_Medica,PDO::PARAM_STR);
                $Sql->bindParam(":fecha",$this->Fecha_Atencion,PDO::PARAM_STR);
                $Sql->bindParam(":prueba",$this->Prueba,PDO::PARAM_STR);
                $Sql->bindParam(":resultado",$this->Resultado,PDO::PARAM_STR);
                $Sql->bindParam(":b",$b,PDO::PARAM_INT);
                $Sql->execute();
                DAO_POSTGIS::$Cnx->commit();
                $DataTable=$Sql->FetchAll();
                $Bandera=true;
                $Mensaje="EXITO AL ".$Accion." REGISTROS EN LA BASE DE DATOS.";
                switch($b)
                {
                    case 1:
                        {
                            if(count($DataTable)>0)
                            {
                                $Bandera=false;
                                $Mensaje=$DataTable[0]["respuesta"];
                            }

                            break;
                        }
                }
                
                if($Bandera && $Accion!="")
                {
                    $Historial_Cambios= new HISTORIAL_CAMBIOS();
                
                    $Historial_Cambios->Accion=$Accion;
                    $Historial_Cambios->Tabla="POSTGIS";
                    $Historial_Cambios->Proceso(1);
                }
            }
            catch(Exception $e)
            {
                DAO_POSTGIS::$Cnx->rollBack();

                $Historial_Errores= new HISTORIAL_ERRORES();

                $Mensaje="HA OCURRIDO UN ERROR, AL INTENTAR ".$Accion." REGISTROS EN LA BASE DE DATOS: ".$e->getMessage();
                $Historial_Errores->Funcion="POSTGIS.Proceso(".$b.")";
                $Historial_Errores->Fallo=$Mensaje;
                $Historial_Errores->Proceso(1);
                if($Usuario->Nivel!="Administrador") $Mensaje="HA OCURRIDO UN ERROR AL INTENTAR ".$Accion." REGISTROS DE LA BASE DE DATOS, PORFAVOR CONTACTESE CON EL ADMINISTRADOR.";
            }
            finally { DAO_POSTGIS::Desconectar(); }

            return ["Mensaje"=>$Mensaje,"Ejecucion"=>$Bandera,"Resultado"=>$Resultado];
        }
    }

?>