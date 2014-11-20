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
   
$idNombre= $_GET['idNombre'];    
$idReservacion= $_GET['idReservacion'];

$result = mysql_query("SELECT cabanias.nombre FROM cabanias, reservacion, reservacion_has_cabanias where reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and reservacion.idReservacion = ".$idReservacion."");
echo " <p id='Titulos2'><strong>Cabañas Reservadas</strong></p>"; 
 if ($row = mysql_fetch_array($result)){ 
  
   do { 
      echo ("<p>".$row['nombre']."</p>"); 
   } while ($row = mysql_fetch_array($result)); 
   
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} 

//-----


$result2 = mysql_query("SELECT actividades.nombre FROM actividades, reservacion, reservacion_has_actividades where reservacion_has_actividades.Actividades_idActividad  = actividades.idActividad and reservacion_has_actividades.Reservacion_idReservacion = reservacion.idReservacion and reservacion.idReservacion = ".$idReservacion."");
echo " <p id='Titulos2'><strong>Actividades Reservadas</strong></p>"; 
 if ($row2 = mysql_fetch_array($result2)){ 
  
   do { 
      echo ("<p>".$row2['nombre']."</p>"); 
   } while ($row2 = mysql_fetch_array($result2)); 
   
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} 

 
/*$resLogin = mysql_fetch_array(mysql_query("SELECT * FROM `Usuario` WHERE `email` LIKE '".$username."' AND `password` LIKE '".$password."'"));
$userBD= $resLogin['nombre'];
*/
echo("<a href='user.php'>Regresar</a>");
	  

?>
