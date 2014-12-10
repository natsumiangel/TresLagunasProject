
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
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `usuario` where `email` LIKE '". $_COOKIE["user"]."'"));
	$result  = mysql_fetch_array(mysql_query("SELECT * 
FROM  `reservacion` 
WHERE  `idReservacion` =".$idReservacion.""));
	
	
?>
      <img src="images/<?  echo $result['fotoPago'] ?>" >
      
      <form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="text" value="<?  echo $result['idReservacion'] ?>" name="idReservacion" style="visibility:hidden;">
<input name="uploadedfile" type="file" />
<input type="submit" value="Subir archivo"  accept="image/*"/>
</form>
      
      