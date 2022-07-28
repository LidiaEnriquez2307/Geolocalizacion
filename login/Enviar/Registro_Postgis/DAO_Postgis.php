<?php
    
    class DAO_POSTGIS
    {
        public static $Cnx;

        public function __construct()
        {
            $Cnx=null;
        }

        public static function Conectar()
        {
            if(!isset(self::$Cnx))
            {
                try
                {
                    self::$Cnx= new PDO("pgsql:host=192.168.100.14; dbname=Contagios;","postgres","admin123");
                    self::$Cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    self::$Cnx->exec("SET NAMES 'UTF8'");
                }
                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                }
            }

        }

        public static function Desconectar()
        {
            if(isset(self::$Cnx)) self::$Cnx=null;
        }
    }

?>