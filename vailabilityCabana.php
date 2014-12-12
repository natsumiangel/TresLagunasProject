<?php

$dia = $_GET['dia'];
$mes = $_GET['mes'];
$anio = $_GET['anio'];
$dia1 = $_GET['dia1'];
$mes1 = $_GET['mes1'];
$anio1 = $_GET['anio1'];

  
							  
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
   /*
                               $result = mysql_query("SELECT * FROM  `cabanias` "); 

if ($row = mysql_fetch_array($result)){ 
  
   do { 
      echo "<input onClick='showInputC(".$row['idCabana'].")' type='checkbox' id='cabana".$row['idCabana']."'><a  onClick='showCabania(".$row['idCabana'].")'>".$row['nombre']."<input type='text' id='Icabana".$row['idCabana']."' style='visibility:hidden' size='14' placeholder='cantidad de personas'></br></a>"; 
   } while ($row = mysql_fetch_array($result)); 
   echo("</div>");
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} */

// cabana1 
$cabanaA = mysql_fetch_array(mysql_query("select *  from cabanias where cabanias.idCabana = 1"));
$cabana1 = mysql_fetch_array(mysql_query("SELECT cabanias.idCabana, cabanias.nombre, reservacion.fechaInicio, reservacion.fechaFinal FROM cabanias, reservacion, reservacion_has_cabanias where   ( '".$anio."-".$mes."-".$dia." 14:00:00' between reservacion.fechaInicio  and reservacion.fechaFinal or  '".$anio1."-".$mes1."-".$dia1." 14:00:00' between reservacion.fechaInicio  and reservacion.fechaFinal   ) and reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and cabanias.idCabana = 1 and reservacion.estado = 3"));

if($cabana1['idCabana'] == null){
	
	echo "<input onClick='showInputC(".$cabanaA['idCabana'].")' type='checkbox' id='cabana".$cabanaA['idCabana']."'><a  onClick='showCabania(".$cabanaA['idCabana'].")'>".$cabanaA['nombre']."<input type='text' id='Icabana".$cabanaA['idCabana']."' style='visibility:hidden' size='14' placeholder='cantidad de personas'></br></a>"; 
	
	} else {
		
	echo "<a  onClick='showCabania(".$cabanaA['idCabana'].")'>".$cabanaA['nombre']."(ocupada)</br></a>"; 	
		
		} 
		
		
// cabana2 
$cabanaB = mysql_fetch_array(mysql_query("select *  from cabanias where cabanias.idCabana = 2"));
$cabana2 = mysql_fetch_array(mysql_query("SELECT cabanias.idCabana, cabanias.nombre, reservacion.fechaInicio, reservacion.fechaFinal FROM cabanias, reservacion, reservacion_has_cabanias where   ( '".$anio."-".$mes."-".$dia." 14:00:00' between reservacion.fechaInicio  and reservacion.fechaFinal or  '".$anio1."-".$mes1."-".$dia1." 14:00:00' between reservacion.fechaInicio  and reservacion.fechaFinal   ) and reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and cabanias.idCabana = 2 and reservacion.estado = 3"));

if($cabana2['idCabana'] == null){
	
	echo "<input onClick='showInputC(".$cabanaB['idCabana'].")' type='checkbox' id='cabana".$cabanaB['idCabana']."'><a  onClick='showCabania(".$cabanaB['idCabana'].")'>".$cabanaB['nombre']."<input type='text' id='Icabana".$cabanaB['idCabana']."' style='visibility:hidden' size='14' placeholder='cantidad de personas'></br></a>"; 
	
	} else {
		
	echo "<a  onClick='showCabania(".$cabanaB['idCabana'].")'>".$cabanaB['nombre']."(ocupada)</br></a>"; 	
		
		} 
		
// cabana3 
$cabanaC = mysql_fetch_array(mysql_query("select *  from cabanias where cabanias.idCabana = 3"));
$cabana3 = mysql_fetch_array(mysql_query("SELECT cabanias.idCabana, cabanias.nombre, reservacion.fechaInicio, reservacion.fechaFinal FROM cabanias, reservacion, reservacion_has_cabanias where   ( '".$anio."-".$mes."-".$dia." 14:00:00' between reservacion.fechaInicio  and reservacion.fechaFinal or  '".$anio1."-".$mes1."-".$dia1." 14:00:00' between reservacion.fechaInicio  and reservacion.fechaFinal   ) and reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and cabanias.idCabana = 3 and reservacion.estado = 3"));

if($cabana3['idCabana'] == null){
	
	echo "<input onClick='showInputC(".$cabanaC['idCabana'].")' type='checkbox' id='cabana".$cabanaC['idCabana']."'><a  onClick='showCabania(".$cabanaC['idCabana'].")'>".$cabanaC['nombre']."<input type='text' id='Icabana".$cabanaC['idCabana']."' style='visibility:hidden' size='14' placeholder='cantidad de personas'></br></a>"; 
	
	} else {
		
	echo "<a  onClick='showCabania(".$cabanaC['idCabana'].")'>".$cabanaC['nombre']."(ocupada)</br></a>"; 	
		
		} 		
		
				

							  
							  ?>

