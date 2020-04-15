<?php

function ValidarDatos($campo){
	//Array con las posibles cabeceras a utilizar por un spammer
    $badHeads = array("Content-Type:",
                                 "MIME-Version:",
                                 "Content-Transfer-Encoding:",
                                 "Return-path:",
                                 "Subject:",
                                 "From:",
                                 "Envelope-to:",
                                 "To:",
                                 "bcc:",
                                 "cc:");

    //Comprobamos que entre los datos no se encuentre alguna de
    //las cadenas del array. Si se encuentra alguna cadena se
    //dirige a una página de Forbidden
    foreach($badHeads as $valor){ 
      if(strpos(strtolower($campo), strtolower($valor)) !== false){ 
        header("HTTP/1.0 403 Forbidden"); 
        exit; 
      }
    } 
 }

//Ejemplo de llamadas a la funcion
ValidarDatos($_POST['nombre']);
ValidarDatos($_POST['email']);
//ValidarDatos($_POST['seleccion']);
ValidarDatos($_POST['mensaje']);

$nombre_usuario=$_POST['nombre'];
$email_usuario=$_POST['email'];
$consulta_usuario=$_POST['mensaje'];
// Creo 3 variables que me toman lo que se envía por POST de cada valor del formulario

$destino="pablolupo84@gmail.com";

$asunto="Consulta enviada desde www.pablolupo.dx.am";

$mensaje="Tu Nombre es: ".$nombre_usuario."\r\n";
$mensaje.="Tu Email es: ".$email_usuario."\r\n";
$mensaje.="Consulta: ".$consulta_usuario."\r\n";

$remitente="From: pablolupo.tech";

mail($destino, $asunto, $mensaje, $remitente);


header("Location:index.php?i=ok");
// SI EL FORMULARIO SE ENVIO CORRECTAMENTE, PONEME EN LA URL DESPUES DEL INDEX.PHP UN SIGNO DE PREGUNTA, UNA LETRA I, Y UN IGUAL OK
?>
