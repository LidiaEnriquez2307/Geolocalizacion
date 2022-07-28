<?php
	include ("Enviar/ENVIAR_CORREO/PHPMailer-master/src/PHPMailer.php");
	include ("Enviar/ENVIAR_CORREO/PHPMailer-master/src/SMTP.php");
	include ("Enviar/ENVIAR_CORREO/PHPMailer-master/src/Exception.php");

    class ENVIAR_CORREO
    {
        
        public function Enviar_Correo($correoDestiono,$mensaje,$titulo)
        {
                $Correo= new PHPMailer\PHPMailer\PHPMailer();
            
                $Correo->isSMTP();
                $Correo->SMTPAuth=true;
                $Correo->Host="smtp.gmail.com";
                $Correo->Port="587";
                $Correo->Username="prueba.gis.grupo4@gmail.com";
                $Correo->Password="pclpzodnyzmsziul";
                $Correo->setFrom("prueba.gis.grupo4@gmail.com",$titulo);
                $Correo->addAddress($correoDestiono);
                $Correo->Subject="RESULTADO DE ENFERMEDADES CATASTRÓFICAS";
                $Correo->Body=$mensaje;
                if(!$Correo->send()) {
                    echo ("HA EXISTIDO UN ERROR AL TRATAR DE ENVIAR EL CORREO:".$Correo->ErrorInfo);
                }else
                {

                echo "Correo enviado";
                }
        }
    }
?>