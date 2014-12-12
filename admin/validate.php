

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
	


$result0 = mysql_fetch_array(mysql_query("SELECT * 
FROM  `reservacion` 
WHERE  `idReservacion` =".$idReservacion.""));

$result = mysql_query("SELECT cabanias.nombre FROM cabanias, reservacion, reservacion_has_cabanias where reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and reservacion.idReservacion = ".$idReservacion."");

echo $result0['detalles'];
?>


 <img src="../images/<?  echo $result0['fotoPago'] ?>" width="50%" style="text-align:center;">
</br>
<?

$cliente = mysql_fetch_array(mysql_query("SELECT * FROM usuario where usuario.idNombre = ".$result0['Usuario_idNombre'].""));

echo "Cliente: ". $cliente['nombre']."</br>";
echo "Email: ". $cliente['email']."</br>";
echo "Cel: ". $cliente['telefono']."</br>";

echo " <p id='Titulos2'><strong>Cabañas Reservadas</strong></p>"; 
 if ($row = mysql_fetch_array($result)){ 
  
   do { 
      echo ("<p>".$row['nombre']."</p>"); 
   } while ($row = mysql_fetch_array($result)); 
   
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} 

//-----Cabañas disponibles 

echo " <p id='Titulos2'><strong>Cabañas Disponibles</strong></p>"; 

$cabanaA = mysql_fetch_array(mysql_query("select *  from cabanias where cabanias.idCabana = 1"));
$cabana1 = mysql_fetch_array(mysql_query("SELECT cabanias.idCabana, cabanias.nombre, reservacion.fechaInicio, reservacion.fechaFinal FROM cabanias, reservacion, reservacion_has_cabanias where   ( '".$result0['fechaInicio']."' between reservacion.fechaInicio  and reservacion.fechaFinal or  '".$result0['fechaFinal']."' between reservacion.fechaInicio  and reservacion.fechaFinal   ) and reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and cabanias.idCabana = 1 and reservacion.estado = 3"));

if($cabana1['idCabana'] == null){
	
	echo "".$cabanaA['nombre']."(disponible)</br>"; 	
	
	} else {
		
	echo "".$cabanaA['nombre']."(ocupada)</br>"; 	
		
		} 
		
		
// cabana2 
$cabanaB = mysql_fetch_array(mysql_query("select *  from cabanias where cabanias.idCabana = 2"));
$cabana2 = mysql_fetch_array(mysql_query("SELECT cabanias.idCabana, cabanias.nombre, reservacion.fechaInicio, reservacion.fechaFinal FROM cabanias, reservacion, reservacion_has_cabanias where   ( '".$result0['fechaInicio']."' between reservacion.fechaInicio  and reservacion.fechaFinal or  '".$result0['fechaFinal']."' between reservacion.fechaInicio  and reservacion.fechaFinal   ) and reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and cabanias.idCabana = 2 and reservacion.estado = 3"));

if($cabana2['idCabana'] == null){
	
echo "".$cabanaB['nombre']."(disponible)</br>"; 	
	
	} else {
		
	echo "".$cabanaB['nombre']."(ocupada)</br>"; 	
		} 
		
// cabana3 
$cabanaC = mysql_fetch_array(mysql_query("select *  from cabanias where cabanias.idCabana = 3"));
$cabana3 = mysql_fetch_array(mysql_query("SELECT cabanias.idCabana, cabanias.nombre, reservacion.fechaInicio, reservacion.fechaFinal FROM cabanias, reservacion, reservacion_has_cabanias where   ( '".$result0['fechaInicio']."' between reservacion.fechaInicio  and reservacion.fechaFinal or  '".$result0['fechaFinal']."' between reservacion.fechaInicio  and reservacion.fechaFinal   ) and reservacion_has_cabanias.Cabanas_idCabana  = cabanias.idCabana and reservacion_has_cabanias.Reservacion_idReservacion = reservacion.idReservacion and cabanias.idCabana = 3 and reservacion.estado = 3"));

if($cabana3['idCabana'] == null){
	echo "".$cabanaC['nombre']."(disponible)</br>"; 	
	
	} else {
		
	echo "".$cabanaC['nombre']."(ocupada)</br>"; 	
		}




//--

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
echo("<a href='saveReservation.php?idReservacion=".$idReservacion."'>Validar</a></br></br></br><a href='index.php'>Regresar</a>");
	  

	
	
?>
     
 

     

      
      