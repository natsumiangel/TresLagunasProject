<?php 
//include("MySQL/conex.phtml");
//$link =  conectarse();

session_start();

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


//variables


$cabana1=$_GET['cabana1'];
$cabana2=$_GET['cabana2'];
$cabana3=$_GET['cabana3'];
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$anio = $_GET['anio'];
$dia1 = $_GET['dia1'];
$mes1 = $_GET['mes1'];
$anio1 = $_GET['anio1'];

$actividad1=$_GET['actividad1'];
$actividad2=$_GET['actividad2'];
$actividad3=$_GET['actividad3'];
$actividad4=$_GET['actividad4'];
$actividad5=$_GET['actividad5'];
$actividad6=$_GET['actividad6'];






	$idUsuario =  mysql_fetch_array(mysql_query("SELECT * 
FROM  `usuario` 
WHERE  `nombre` LIKE  '%".$_SESSION['sessionUser']."%'"));
	$idReserva =  mysql_fetch_array(mysql_query("SELECT * 
FROM  `reservacion` 
ORDER BY  `reservacion`.`idReservacion` DESC "));

$idReservacion =  $idReserva['idReservacion'] + 1;

echo($idUsuario['idNombre'] . " - " . $idReservacion . " - " .$cabana1 );

mysql_query("INSERT INTO `bd_treslagunas`.`reservacion` (`idReservacion`, `fechaInicio`, `fechaFinal`, `noPersonas`, `fotoPago`, `Usuario_idNombre`, `estado`) VALUES (null, '".$anio."-".$mes."-".$dia." 14:00:00', '".$anio1."-".$mes1."-".$dia1." 11:59:59', '".$cPersonas."',1, '".$idUsuario['idNombre']."', '1');");

if($cabana1 == "true"){
	echo(" ->cabana1:" . $cabana1);
	
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_cabanias` (`Cabanas_idCabana`,`Reservacion_idReservacion`) VALUES ('1', '".$idReservacion."');");

	echo(" ->cabana2: " . $cabana2);

}
if($cabana2 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_cabanias` (`Cabanas_idCabana`,`Reservacion_idReservacion`) VALUES ('2', '".$idReservacion."');");
}
if($cabana3 == "true"){
	echo("cabana3: " . $cabana3);
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_cabanias` (`Cabanas_idCabana`,`Reservacion_idReservacion`) VALUES ('3', '".$idReservacion."');");
}

if($actividad1 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '1');");
}

if($actividad2 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '2');");
}
if($actividad3 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '3');");
}
if($actividad4 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '4');");
}
if($actividad5 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '5');");
}
if($actividad6 == "true"){
mysql_query("INSERT INTO `bd_treslagunas`.`reservacion_has_actividades` (`Reservacion_idReservacion`, `Actividades_idActividad`) VALUES ('".$idReservacion."', '6');");
}

?>
