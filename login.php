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
   
$username= $_POST['username'];    
$password= $_POST['password']; 
$resLogin = mysql_fetch_array(mysql_query("SELECT * FROM `Usuario` WHERE `email` LIKE '".$username."' AND `password` LIKE '".$password."'"));
$userBD= $resLogin['nombre'];

 
if($userBD == null){
	
	?>
    
    
	<script>
	alert("Error, usuario o password incorrecto");
	window.location="index3.php";
	
	</script>
    
	<?
   
	} else { $_SESSION['sessionUser']=$userBD;
	?>
	<script>
	
	window.location="index.php";
	
	</script>
	<?
	  }
//echo("user(input): ".$username.", password(input): ".$password.", user(bd); ".$userBD." ");


?>
