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
$nombre=$_GET['nombre'];
$_SESSION['sessionUser']=$nombre; 
$email=$_GET['email'];

$password=$_GET['password'];

//m=0, f=1.
$sexo=$_GET['sexo'];
if($sexo=='m'){
	$sexo=0;}else{$sexo=1;}
	
$tel=$_GET['tel'];
$lugar=$_GET['lugar'];
$dia=$_GET['dia'];
$mes=$_GET['mes'];
$anio=$_GET['anio'];

//ING=0, ESP=1.
$idioma=$_GET['idioma'];
if($idioma=='ING'){
	$idioma=0;}else{$idioma=1;}

//turista=0, admin=1
$tipoUsuario=$_GET['tipoUsuario'];
if($tipoUsuario=='turista'){
	$tipoUsuario=0;}else{$tipoUsuario=1;}
	


mysql_query("INSERT INTO `bd_treslagunas`.`Usuario` (`idNombre`, `sexo`, `email`, `telefono`, `lugarOrigen`, `fechaNacimiento`, `idioma`, `tipoUsuario`, `password`, `nombre`) VALUES (NULL, '".$sexo."', '".$email."', '".$tel."', '".$lugar."', '".$anio."-".$mes."-".$dia."', '".$idioma."', '".$tipoUsuario."', '".$password."', '".$nombre."');");

echo("Ejecuto ajax");
?>
