<?php 
//include("MySQL/conex.phtml");
//$link =  conectarse();


if (!($link=mysql_connect("localhost","root",""))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("bd_treslagunas",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   


 //Variable de Sesión
$cPersonas=$_GET['cPersonas'];
$total =  0; 
$detalles = ""; 
$dias = $_GET['dias'];

//variables


$cabana1=$_GET['cabana1'];
$cabana2=$_GET['cabana2'];
$cabana3=$_GET['cabana3'];

$Icabana1=$_GET['Icabana1'];
$Icabana2=$_GET['Icabana2'];
$Icabana3=$_GET['Icabana3'];

$dia = $_GET['dia'];
$mes = $_GET['mes'];
$anio = $_GET['anio'];
$dia1 = $_GET['dia1'];
$mes1 = $_GET['mes1'];
$anio1 = $_GET['anio1'];

$actividad1=$_GET['actividad1'];
$actividad2=$_GET['actividad2'];
$actividad3=$_GET['actividad3'];
echo($actividad3);
$actividad4=$_GET['actividad4'];
$actividad5=$_GET['actividad5'];
$actividad6=$_GET['actividad6'];

$Iactividad1=$_GET['Iactividad1'];
$Iactividad2=$_GET['Iactividad2'];
$Iactividad3=$_GET['Iactividad3'];
$Iactividad4=$_GET['Iactividad4'];
$Iactividad5=$_GET['Iactividad5'];
$Iactividad6=$_GET['Iactividad6'];






	$idUsuario =  mysql_fetch_array(mysql_query("SELECT * 
FROM  `usuario` 
WHERE  `email` LIKE  '%". $_COOKIE["user"]."%'"));
	
	$idReserva =  mysql_fetch_array(mysql_query("SELECT * 
FROM  `reservacion` 
ORDER BY  `reservacion`.`idReservacion` DESC "));

$idReservacion =  $idReserva['idReservacion'] + 1;

//echo($idUsuario['idNombre'] . " - " . $idReservacion . " - " .$cabana1 );

mysql_query("INSERT INTO `bd_treslagunas`.`reservacion` (`idReservacion`, `fechaInicio`, `fechaFinal`, `noPersonas`, `fotoPago`, `Usuario_idNombre`, `estado`) VALUES (null, '".$anio."-".$mes."-".$dia." 14:00:00', '".$anio1."-".$mes1."-".$dia1." 11:59:59', '".$cPersonas."','failed.jpg', '". $idUsuario["idNombre"]."', '1');");

if($cabana1 == "true"){



$precioC1  = mysql_fetch_array(mysql_query("SELECT * 
FROM  `cabanias` 
WHERE  `idCabana` =1"));	

$pExtrasC1 = $Icabana1 -2 ; 
$total = $total + ($pExtrasC1* $precioC1['personaExtra'] );
$total = $total +  $precioC1['tarifa'];  	
	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_cabanias` (`Cabanas_idCabana`,`Reservacion_idReservacion`) VALUES ('1', '".$idReservacion."');");


$detalles = $detalles . "<p>Caba&ntilde;a R&uacute;stica: ".$Icabana1." personas</p>";

}
if($cabana2 == "true"){
	

$precioC2  = mysql_fetch_array(mysql_query("SELECT * 
FROM  `cabanias` 
WHERE  `idCabana` =2"));	

$pExtrasC2 = $Icabana2 -2 ; 
$total = $total + ($pExtrasC2* $precioC2['personaExtra'] );
$total = $total +  $precioC2['tarifa']; 
	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_cabanias` (`Cabanas_idCabana`,`Reservacion_idReservacion`) VALUES ('2', '".$idReservacion."');");

$detalles = $detalles . "<p>Jachak Kium: ".$Icabana2." personas</p>";

}
if($cabana3 == "true"){

$precioC3  = mysql_fetch_array(mysql_query("SELECT * 
FROM  `cabanias` 
WHERE  `idCabana` =3"));

$pExtrasC3 = $Icabana3 -2 ; 
$total = $total + ($pExtrasC3* $precioC3['personaExtra'] );
$total = $total +  $precioC3['tarifa']; 

	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_cabanias` (`Cabanas_idCabana`,`Reservacion_idReservacion`) VALUES ('3', '".$idReservacion."');");

$detalles = $detalles . "<p>Su Kun Kium: ".$Icabana3." personas</p>";

}

$total = $total * $dias ; 

if($actividad1 == "true"){
	
$precioA1 = mysql_fetch_array(mysql_query("SELECT * FROM `actividades` where `idActividad` = 1 "));	

 
$total = $total + ($Iactividad1* $precioA1['tarifa']);


	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '1');");

$detalles = $detalles . "<p>Caminata Por Las Tres Lagunas: ".$Iactividad1." personas</p>";
}

if($actividad2 == "true"){
	
$precioA2 = mysql_fetch_array(mysql_query("SELECT * FROM `actividades` where `idActividad` = 2 "));	
	
$total = $total + ($Iactividad2* $precioA2['tarifa'] );


mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '2');");

$detalles = $detalles . "<p>Paseo en Canoa : ".$Iactividad2." personas</p>";

}

if($actividad3 == "true"){
	
	
$precioA3 = mysql_fetch_array(mysql_query("SELECT * FROM `actividades` where `idActividad` = 3 "));	
	
$total = $total + ($Iactividad3* $precioA3['tarifa'] );

	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '3');");

$detalles = $detalles . "<p>Sendero Interpretativo R&iacute;o Lacanja: ".$Iactividad3." personas</p>";
}


if($actividad4 == "true"){
	
$precioA4 = mysql_fetch_array(mysql_query("SELECT * FROM `actividades` where `idActividad` = 4 "));	
	
$total = $total + ($Iactividad4* $precioA4['tarifa'] );

mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '4');");

$detalles = $detalles . "<p>Siembra, Planta y da Vida: ".$Iactividad4." personas</p>";
}
if($actividad5 == "true"){

$precioA5 = mysql_fetch_array(mysql_query("SELECT * FROM `actividades` where `idActividad` = 5"));	

$total = $total + ($Iactividad5* $precioA5['tarifa'] );

	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '5');");

$detalles = $detalles . "<p>Avistamiento Nocturno de Cocodrilo: ".$Iactividad5." personas</p>";
}
if($actividad6 == "true"){
	
$precioA6 = mysql_fetch_array(mysql_query("SELECT * FROM `actividades` where `idActividad` = 6 "));	
	
$total = $total + ($Iactividad6* $precioA6['tarifa'] );

	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '6');");
$detalles = $detalles . "<p>Noche de Fogata: ".$Iactividad6." personas</p>";
}


mysql_query("UPDATE  `bd_treslagunas`.`reservacion` SET  `total` =  '".$total."', `detalles` =  '".$detalles."'  WHERE  `reservacion`.`idReservacion` =".$idReservacion."  ");

?>
