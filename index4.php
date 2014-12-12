
<?php
//session_start();
if(!isset($_COOKIE['user']) ){
	header('Location: index3.php');
	}

 ?>
 
 
<!DOCTYPE HTML>
<html>
<head>
<script>
function vailability(){


var dia =  document.getElementById("dia").value;

var mes =  document.getElementById("mes").value;
var anio =  document.getElementById("anio").value;
var dia1 =  document.getElementById("dia2").value;

var mes1 =  document.getElementById("mes2").value;
var anio1 =  document.getElementById("anio2").value;


	
	
	var xmlhttpSM;
                if (window.XMLHttpRequest){
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttpSM=new XMLHttpRequest();
                }else{
                    // code for IE6, IE5
                    xmlhttpSM=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttpSM.onreadystatechange=function(){
                    if (xmlhttpSM.readyState==4 && xmlhttpSM.status==200){
                        document.getElementById("vailabilityCabana").innerHTML=xmlhttpSM.responseText;
                    }
                }
                //send a request to a server
                //var valor;
               
                xmlhttpSM.open("GET","vailabilityCabana.php?dia="+dia+"&mes="+mes+"&anio="+anio+"&dia1="+dia1+"&mes1="+mes1+"&anio1="+anio1,false);
                xmlhttpSM.send(); 
		
	
	
	}

function Reservacion(){
	
	
var dia =  document.getElementById("dia").value;

var mes =  document.getElementById("mes").value;
var anio =  document.getElementById("anio").value;
var dia1 =  document.getElementById("dia2").value;

var mes1 =  document.getElementById("mes2").value;
var anio1 =  document.getElementById("anio2").value;

	
 var fFecha1 = Date.UTC(anio,mes ,dia); 
 var fFecha2 = Date.UTC(anio1,mes1,dia1); 
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)) + 1; 

var cPersonas =  document.getElementById("cPersonas").value;	
var cabana1=  document.getElementById("cabana1").checked;	
var Icabana1=  document.getElementById("Icabana1").value;	
var cabana2 =  document.getElementById("cabana2").checked;
var Icabana2=  document.getElementById("Icabana2").value;		
var cabana3 =  document.getElementById("cabana3").checked;	
var Icabana3=  document.getElementById("Icabana3").value;	

var actividad1=  document.getElementById("actividad1").checked;	
var Iactividad1=  document.getElementById("Iactividad1").value;	
var actividad2=  document.getElementById("actividad2").checked;	
var Iactividad2=  document.getElementById("Iactividad2").value;	
var actividad3=  document.getElementById("actividad3").checked;
alert("act:" + actividad3);	
var Iactividad3=  document.getElementById("Iactividad3").value;	
var actividad4=  document.getElementById("actividad4").checked;	
var Iactividad4=  document.getElementById("Iactividad4").value;	
var actividad5=  document.getElementById("actividad5").checked;	
var Iactividad5=  document.getElementById("Iactividad5").value;	
var actividad6=  document.getElementById("actividad6").checked;	
var Iactividad6=  document.getElementById("Iactividad6").value;	


if(cPersonas <=32){
	
	
	var xmlhttpSM;
                if (window.XMLHttpRequest){
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttpSM=new XMLHttpRequest();
                }else{
                    // code for IE6, IE5
                    xmlhttpSM=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttpSM.onreadystatechange=function(){
                    if (xmlhttpSM.readyState==4 && xmlhttpSM.status==200){
                        document.getElementById("divCabana").innerHTML=xmlhttpSM.responseText;
                    }
                }
                //send a request to a server
                //var valor;
               
                xmlhttpSM.open("GET","CrearReservacion.php?cPersonas="+cPersonas+"&cabana1="+cabana1+"&cabana2="+cabana2+"&cabana3="+cabana3+"&Icabana1="+Icabana1+"&Icabana2="+Icabana2+"&Icabana3="+Icabana3+"&dia="+dia+"&mes="+mes+"&anio="+anio+"&dia1="+dia1+"&mes1="+mes1+"&anio1="+anio1 +"&actividad1="+actividad1+"&actividad2="+actividad2+"&actividad3="+actividad3+"&actividad4="+actividad4+"&actividad5="+actividad5+"&actividad6="+actividad6+"&Iactividad1="+Iactividad1+"&Iactividad2="+Iactividad2+"&Iactividad3="+Iactividad3+"&Iactividad4="+Iactividad4+"&Iactividad5="+Iactividad5+"&Iactividad6="+Iactividad6 + "&dias=" +dias,false);
                xmlhttpSM.send(); 
		
	
	}	
	
	}
function showInput(idActividad){
	document.getElementById("Iactividad"+idActividad).style.visibility = "Visible";
	}
function showInputC(idCabana){
	document.getElementById("Icabana"+idCabana).style.visibility = "Visible";
	}	
function showCabania(id){
	
	document.getElementById("divCabana").style.visibility = "Visible";
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
                        document.getElementById("divCabana").innerHTML=xmlhttpL.responseText;
                    }
                }
                //send a request to a server
                //var valor;
                
                xmlhttpL.open("GET","showCabana.php?idCabana="+ id ,false);
                xmlhttpL.send();
				
	
	}
	
	function showActividad(id){
	
	document.getElementById("divCabana").style.visibility = "Visible";
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
                        document.getElementById("divCabana").innerHTML=xmlhttpL.responseText;
                    }
                }
                //send a request to a server
                //var valor;
                
                xmlhttpL.open("GET","showActividad.php?idActividad="+ id ,false);
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
    <h1 align="right">Tres Lagunas | Bienvenido <div style="color:#5AD16C"> <a href="user.php"><?php echo $_COOKIE['user'];?> </a></div></h1>
<p id="Titulos1">Reservación</p>
    <hr>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="45%">  <p id="Titulos2">¿Cuando?</p>
  <p>Fecha Inicio:  <select id="dia" onChange="vailability()">
                                	<option value="1">1</option>
                                	<option value="2">2</option>
                                	<option value="3">3</option>
                                	<option value="4">4</option>
                                	<option value="5">5</option>
                                	<option value="6">6</option>
                                	<option value="7">7</option>
                                	<option value="8">8</option>
                                	<option value="9">9</option>
                                	<option value="10">10</option>
                                	<option value="11">11</option>
                                	<option value="12">12</option>
                                	<option value="13">13</option>
                                	<option value="14">14</option>
                                	<option value="15">15</option>
                                	<option value="16">16</option>
                                	<option value="17">17</option>
                                	<option value="18">18</option>
                                	<option value="19">19</option>
                                	<option value="20">20</option>
                                	<option value="21">21</option>
                                	<option value="22">22</option>
                                	<option value="23">23</option>
                                	<option value="24">24</option>
                                	<option value="25">25</option>
                                	<option value="26">26</option>
                                	<option value="27">27</option>
                                	<option value="28">28</option>
                                	<option value="29">29</option>
                                	<option value="30">30</option>
                                	<option value="31">31</option>
                              </select>
                              
                              <select id="mes" onChange="vailability()">
                                	<option value="1">Enero</option>
                                	<option value="2">Febrero</option>
                                	<option value="3">Marzo</option>
                                	<option value="4">Abril</option>
                                	<option value="5">Mayo</option>
                                	<option value="6">Junio</option>
                                	<option value="7">Julio</option>
                                	<option value="8">Agosto</option>
                                	<option value="9">Septiembre</option>
                                	<option value="10">Octubre</option>
                                	<option value="11">Noviembre</option>
                                	<option value="12">Diciembre</option>
                              </select>
                              
                              <select id="anio" onChange="vailability()">
                                	<option value="2014">2014</option>
                                	<option value="2015">2015</option>
                                	
                              </select> <p>Fecha Final: <select id="dia2" onChange="vailability()">
                                	<option value="1">1</option>
                                	<option value="2">2</option>
                                	<option value="3">3</option>
                                	<option value="4">4</option>
                                	<option value="5">5</option>
                                	<option value="6">6</option>
                                	<option value="7">7</option>
                                	<option value="8">8</option>
                                	<option value="9">9</option>
                                	<option value="10">10</option>
                                	<option value="11">11</option>
                                	<option value="12">12</option>
                                	<option value="13">13</option>
                                	<option value="14">14</option>
                                	<option value="15">15</option>
                                	<option value="16">16</option>
                                	<option value="17">17</option>
                                	<option value="18">18</option>
                                	<option value="19">19</option>
                                	<option value="20">20</option>
                                	<option value="21">21</option>
                                	<option value="22">22</option>
                                	<option value="23">23</option>
                                	<option value="24">24</option>
                                	<option value="25">25</option>
                                	<option value="26">26</option>
                                	<option value="27">27</option>
                                	<option value="28">28</option>
                                	<option value="29">29</option>
                                	<option value="30">30</option>
                                	<option value="31">31</option>
                              </select>
                              
                              <select id="mes2" onChange="vailability()">
                                	<option value="1">Enero</option>
                                	<option value="2">Febrero</option>
                                	<option value="3">Marzo</option>
                                	<option value="4">Abril</option>
                                	<option value="5">Mayo</option>
                                	<option value="6">Junio</option>
                                	<option value="7">Julio</option>
                                	<option value="8">Agosto</option>
                                	<option value="9">Septiembre</option>
                                	<option value="10">Octubre</option>
                                	<option value="11">Noviembre</option>
                                	<option value="12">Diciembre</option>
                              </select>
                              
                              <select id="anio2" onChange="vailability()">
                                	<option value="2014">2014</option>
                                	<option value="2015">2015</option>
                              </select></p>
                              
                              <p id="Titulos2">¿Cuantos?</p>
                              
                              <p>Cantidad de Personas: <input id="cPersonas"  type="text" placeholder="36(max)"/></p><p id="Titulos2">¿Qué Cabañas?</p>
                              <div id="vailabilityCabana">
<!-- here, check to by ajax if the cabana is vailability in the selected date -->
                              </div>
                              <p id="Titulos2">¿Qué Actividades?</p>
                              
                              <?  
							  
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
                               $result = mysql_query("SELECT * FROM  `actividades` "); 

if ($row = mysql_fetch_array($result)){ 
  
   do { 
      echo "<input onClick='showInput(".$row['idActividad'].")' type='checkbox' id='actividad".$row['idActividad']."'><a  onClick='showActividad(".$row['idActividad'].")'>".$row['nombre']."<input type='text' id='Iactividad".$row['idActividad']."' style='visibility:hidden' size='14' placeholder='cantidad de personas'></br></a>"; 
   } while ($row = mysql_fetch_array($result)); 
   echo("</div>");
} else { 
echo "&iexcl; No se ha encontrado ning&uacute;n registro !"; 
} 
							  
							  ?>
                              </br>
 <p><input type="button" onClick="Reservacion()" value="Reservar" id="buttonReserva"></p>                             
                              </td>
    <td width="55%"><div id="divCabana" style="visibility:hidden; top:0px; text-align:center;"><p>Cabaña</p></div></td>
  </tr>
</table>

<div class="socialNetworkNavBar">
      
      <div class="socialNetworkNav">
      <img src="01_Reserva.png" alt="sample" width="74" height="74" class="01_Reserva"></div>
      
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
