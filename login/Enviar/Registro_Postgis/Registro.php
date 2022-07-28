<?php

    class REGISTRO
    {
        public static function Genera($resultado)
        {
            $Postgis= new POSTGIS();

            $Postgis->Nombre=$resultado["Nombre"];
            $Postgis->Apellido=$resultado["Apellido"];
            $Postgis->Sexo=$resultado["Sexo"];
            $Postgis->Edad=$resultado["Edad_Anios"];
            $Postgis->Direccion=$resultado["Direccion"];
            $Postgis->Latitud=$resultado["Latitud"];
            $Postgis->Longitud=$resultado["Longitud"];
            $Postgis->Unidad_Medica=$resultado["U_Nombre"];
            $Postgis->Fecha_Atencion=$resultado["Fecha_Atencion"];
            $Postgis->Prueba=$resultado["Prueba"];
            $Postgis->Resultado=$resultado["Resultado"];

            return $Postgis->Proceso(1);
        }
    }

?>