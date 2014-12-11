

<?php


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
	$idReservacion = $_GET['idReservacion'];
	
	// verificate all cabanias 
	
	$result = mysql_query("SELECT cabanias.idCabana, cabanias.nombre  FROM cabanias, reservacion, reservacion_has_cabanias where reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and reservacion.idReservacion = ".$idReservacion."");


 if ($row = mysql_fetch_array($result)){ 
  
   do {  // verificate here 
    
	//echo "hola".$row['idCabana']."</br>";
	
   } while ($row = mysql_fetch_array($result)); 
   
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} 

	
	
mysql_query("UPDATE  `bd_treslagunas`.`reservacion` SET  `estado` =  '3' WHERE  `reservacion`.`idReservacion` =".$idReservacion.";");

header('Location: index.php');	
?>
     
 

     

      
      