<?php

    class CONTRASENIA_ALEATORIA
    {
        public static function Generar($longitud)
        {
            $Caracteres="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $password="";

            for($i=1; $i<=$longitud; $i++)
            {
                $password.=substr($Caracteres,rand(0,62),1);
            }

            return $password;
        }
    }

?>