
<?php
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
   
	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `usuario` where `nombre` LIKE '%Angel Sierra%'"));
	$result  = mysql_query("SELECT * FROM  `reservacion` WHERE  `Usuario_idNombre` =". $user['idNombre'] ." ORDER BY  `reservacion`.`idReservacion` DESC ");
 ?>
 
 
<!DOCTYPE HTML>
<html>
<head>
<script>
function showDetalles( idNombre, idReservacion){
	//alert("idR" + idReservacion);
	var xmlhttpL;
                if (window.XMLHttpRequest){
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttpL=new XMLHttpRequest();
                }else{
                    // code for IE6, IE5
                    xmlhttpL=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttpL.onreadystatechange=function(){
                    if (xmlhttpL.readyState==4 && xmlhttpL.status==200){
                        document.getElementById("detalles").innerHTML=xmlhttpL.responseText;
                    }
                }
                //send a request to a server
                //var valor;
                
                xmlhttpL.open("GET","detalles.php?idReservacion="+ idReservacion + "&idNombre="+ idNombre,false);
                xmlhttpL.send();
	
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tres Lagunas - Santuario de Cocodrilo</title>
<link href="aboutPageStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- Header content -->
<header>
<div class="profileLogo"> 
    <!-- Profile logo. Add a img tag in place of <span>. -->
    <p class="logoPlaceholder"><a href="index.php"><img src="001_TLLogo.jpg" height="50%"></a></div></p>
  </div>
  
  <!-- Identity details -->
  <div class="profileHeader">
    <h1 align="right">Tres Lagunas | Bienvenido <div style="color:#5AD16C"> <a href="user.php"><?php echo $_SESSION['sessionUser'];?> </a></div></h1>
<p id="Titulos1">Datos de Usuario</p>
    <hr>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td width="30%">  <p id="Titulos2" align="center"><? echo $user['nombre'];?></p> <p><img src="images/<? echo $user['image']; ?>" width="100%" ></p>                            
                              </td>
    <td width="30%">
    
    
    <p><strong>Nacionalidad: </strong><? echo $user['lugarOrigen'];?></p>
    <p><strong>Fecha de Nacimiento: </strong><? echo $user['fechaNacimiento'];?></p>
     <p><strong>Teléfono: </strong><? echo $user['telefono'];?></p>
      <p><strong>eMail: </strong><? echo $user['email'];?></p>
    
    
    </td> <td width="40%"><div id="detalles"><? if ($row = mysql_fetch_array($result)){ 
  
   do { 
      echo ("<p onClick='showDetalles(". $user['idNombre'].", ".$row['idReservacion'].")'><strong>[". $row['idReservacion']."] </strong>". $row['fechaInicio']." - ". $row['fechaFinal']." <strong> ". $row['noPersonas']." Personas</strong></p>"); 
   } while ($row = mysql_fetch_array($result)); 
   echo("</div>");
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} ?></div></td>
  </tr>
</table>

<div class="socialNetworkNavBar">
      
      <div class="socialNetworkNav">
      <a href="index4.php"><img src="01_Reserva.png" alt="sample" width="74" height="74" class="01_Reserva"></a></div>
      
      <div class="socialNetworkNav"><a href="galeria.html"> 
      <img src="02_Galería.png" alt="sample" width="74" height="74" ></a></div>
      
      <div class="socialNetworkNav"><a href="servicios.html"> 
      <img src="04_Servicios.png" alt="sample" width="74" height="74"></a></div> 
	  
      <div class="socialNetworkNav"><a href="index3.php"> 
      <img src="05_login.png" alt="sample" width="74" height="74"></a></div>
      
  </div>
  <!-- Links to Social network accounts -->
</header>
<!-- content -->
<div class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">CONTACTO</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
      <p><span>Email:</span> info@treslagunas.com</p>
      <p><span>Website:</span> www.treslagunas.com</p>
      <p><span>Teléfono:</span> 044 (916) 111 6421</p>
      <p><span>Dirección:</span> Lacanjá, Chiapas. </p>
    </div>
  </section>
  <!-- Previous experience details -->
  <!-- Links to expore your past projects and download your CV -->
  <div class="externalResourcesNav"> <span class="stretch"></span>
    <div class="externalResources"><a href="http://www.instagram.com/pablochankin">INSTAGRAM</a> </div>
    <span class="stretch"></span>
    <div class="externalResources"><a href="http://www.facebook.com/pablo.chankin">FACEBOOK</a> </div>
  </div>
</div>
<footer>
  <hr>
  <p class="footerDisclaimer">2014  Copyrights - <span>Todos los Derechos Reservados</span></p>
  <p class="footerNote">Tres Lagunas - <span> info@treslagunas.com </span></p>
</footer>
</body>
</html>
