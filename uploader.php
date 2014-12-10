
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

$idReservacion = $_POST['idReservacion'];
$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile']['size'];

if ($_FILES['uploadedfile']['size']>200000)
{
?>
<script>
alert("El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo");
window.location="user.php";	
</script>
<?
$uploadedfileload="false";}


$sep=explode('image/', $_FILES['uploadedfile']['type']); // Separamos image/ 
$tipo=$sep[1]; // Optenemos el tipo de imagen que es

if (!($tipo == "gif" || $tipo == "jpeg" || $tipo == "bmp"))
{
$uploadedfileload="false";
?>
<script>
alert(" Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos");
window.location="user.php";	
</script>
<?
} 

$file_name="baucher_".$idReservacion . ".". $tipo;
$add="images/$file_name";
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $add)){

mysql_query("UPDATE  `bd_treslagunas`.`reservacion` SET  `fotoPago` =  '".$file_name."',
`estado` =  '2' WHERE  `reservacion`.`idReservacion` =".$idReservacion." ;");	

	
?>
<script>
alert("OK!");
window.location="user.php";	
</script>
<?
}else{
	
	?>
<script>
alert("Se ha producido un error");
window.location="user.php";	
</script>
<?
	
	}

}else{echo $msg;}
?>

	

   
      