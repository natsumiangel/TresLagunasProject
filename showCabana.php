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
   
$idCabana= $_GET['idCabana'];    

$row = mysql_fetch_array(mysql_query("SELECT * FROM `cabanias` WHERE `idCabana` = ".$idCabana.""));

?>

 
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="aboutPageStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>
<body>

<p id="Titulos1"><? echo("".$row["nombre"]."");?></p>
<p><img src="images/<? echo("".$row["image"]."");?>" width="100%"></p>
<p  id="Titulos2" style="font-size:16px;"><? echo("".$row["descripcion"]."");?></p>
<p><a id="Titulos2"><? echo("$".$row["tarifa"]."");?></a>(MXN) Por Dos Personas, <a id="Titulos2"><? echo("$".$row["personaExtra"]."");?></a>(MXN) Por Persona Extra. <a id="Titulos2"><? echo("".$row["maxPersonas"]."");?></a> Personas (Capacidad Máxima). </p> 
</body>
</html>


