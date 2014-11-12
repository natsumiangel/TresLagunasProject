

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Iniciar Sesión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link href="aboutPageStyle.css" rel="stylesheet" type="text/css">
    </head>
    
    <script>
		function login(){
			var username  = document.getElementById("username").value;
			var password  = document.getElementById("password").value;
			
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
                        document.getElementById("divAjaxLogin").innerHTML=xmlhttpL.responseText;
                    }
                }
                //send a request to a server
                //var valor;
                
                xmlhttpL.open("GET","login.php?username="+ username + "&password="+ password,false);
                xmlhttpL.send();
				
				
			
			}
	
		function crearUsuario(){
		var contError = 0; 	
			
		var nombre  = document.getElementById("nombre").value;
		var email  = document.getElementById("email").value;
		var password1  = document.getElementById("password1").value;
		var password2 = document.getElementById("password2").value;
		var sexo = document.getElementById("sex").options[sex.selectedIndex].value;
		var telefono = document.getElementById("tel").value;
		
		var lugarV = document.getElementById("lugar").options[lugar.selectedIndex].value;
		
		var diaV = document.getElementById("dia").options[dia.selectedIndex].value;
		var mesV = document.getElementById("mes").options[mes.selectedIndex].value;
		var anioV = document.getElementById("anio").options[anio.selectedIndex].value;
		var idiomaV = document.getElementById("idioma").options[idioma.selectedIndex].value;
		var tipoUsuarioV = document.getElementById("tipoUsuario").options[tipoUsuario.selectedIndex].value;
	
		
		
		
		//NOMBRE
		if(nombre == ""){
			var enombre = document.getElementById("popo");
			enombre.innerHTML="Llenar campo. "+ lugarV + " " + diaV + " " + mesV+ " " + anioV+ " "+ idiomaV+ " "+ tipoUsuarioV ;
			contError = contError + 1; 
			}
		
		//PASSWORDS
		if(password1=="" || password2 == ""){var passDup = document.getElementById("passDup");
			passDup.innerHTML="Introduce contraseña.";
			contError = contError + 1; }
		
		if(password1==password2){}else{
			var passDup = document.getElementById("passDup");
			passDup.innerHTML="Las contraseñas no coinciden.";
			contError = contError + 1;
			}
		 
		 //E-MAIL
		 expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if (!expr.test(email)){
		 document.getElementById("emailinc").innerHTML="Ese no es un email, intente de nuevo.";
		contError = contError + 1;
		 }
	
		 //TELÉFONO
		 expr2 = /^[0-9]+$/ ;
		 if(!expr2.test(telefono)){
			 var etel = document.getElementById("etel");
			 etel.innerHTML="Llenar campo | Sólo números";
			 contError = contError + 1;
			 }
			 
		alert(""+ contError);
		
		if(contError < 1){
		alert("se ejecuta ajax para mysql");	
		
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
                        document.getElementById("divAjax").innerHTML=xmlhttpSM.responseText;
                    }
                }
                //send a request to a server
                //var valor;
                
                xmlhttpSM.open("GET","CrearCuentaUsuario.php?nombre="+nombre+"&email="+email+"&password="+password1+"&sexo="+sexo+"&tel="+telefono+"&lugar="+lugarV+"&dia="+diaV+"&mes="+mesV+"&anio="+anioV+"&idioma="+idiomaV+"&tipoUsuario="+tipoUsuarioV,false);
                xmlhttpSM.send(); 
				location.href = "index.php";
			}
			
		}
			  
	
			
	
</script>
    
    <body>
        <div class="container">
            <div class="codrops-top">
                <div class="clr"></div>
            </div>
            <header>
	
    <div class="profileLogo"> 
    <p class="logoPlaceholder"><img src="001_TLLogo.jpg" height="50%"></div>
</header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post">
                              <h1>Iniciar Sesion</h1>
                              <p> 
                                <label for="username" class="uname" data-icon="u" > Ingresa email </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="minombredeusuario o miemail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Ingresa contraseña </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Ej. X8df!90EO" /> 
                                </p>
                               
                              	<p id="divAjaxLogin">Tres Lagunas Login</p>
                                <p class="login button"> 
                                    <input type="submit" value="Iniciar sesion"  /> 
								</p>
                                <p class="change_link">
									¿Aún no estás registrado?
									<a href="#toregister" class="to_register">Crear una cuenta</a>
								</p>
                            </form>
                        </div>


<!-- crearUsuario() -->


                        <div id="register" class="animate form">
                        <form>
                            
                                <h1> Crear Usuario </h1> 
                                <!-- Nombre Usuario -->
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" >Nombre de Usuario</label>
                                    <input id="nombre" name="usernamesignup" required="required" type="text" placeholder="NombreDeUsuario" />
                                    <div id="popo" class="error"></div> <!-- ERROR -->
                                <!-- e-mail -->
                                </p>
                                    <label for="emailsignup" class="youmail" data-icon="e" > Tu email</label>
                                    <input id="email" name="emailsignup" required="required" type="email" placeholder="miemail@mail.com"/> 
                                    <div id="emailinc" class="error"></div>
                                </p>    
                                <!-- Password -->
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Tu contraseña </label>
                                    <input id="password1" name="passwordsignup" required="required" type="password" placeholder="Ej. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Por favor, confirma tu contraseña </label>
                                    <input id="password2" name="passwordsignup_confirm" required="required" type="password"
                                    placeholder="Ej. X8df!90EO"/> <div id="passDup" class="error"></div>
                                </p>
                                <!-- Sexo -->    
                                <p>Sexo: 
                                   <select id="sex">
                                      <option value="m">Masculino</option>
                                      <option value="f">Femenino</option>
                                    </select>
                              	
                                <!-- Teléfono -->
                                <p>Teléfono
                                <input type="tel" id="tel"><div id="etel" class="error"></div>
                                </p>
                                <!-- Lugar de Origen -->
                                <p>País de Origen:
                                <select name="pais" id="lugar">
                                    <option value="AF">Afganistán</option>
                                    <option value="AL">Albania</option>
                                    <option value="DE">Alemania</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antártida</option>
                                    <option value="AG">Antigua y Barbuda</option>
                                    <option value="AN">Antillas Holandesas</option>
                                    <option value="SA">Arabia Saudí</option>
                                    <option value="DZ">Argelia</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaiyán</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrein</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BE">Bélgica</option>
                                    <option value="BZ">Belice</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermudas</option>
                                    <option value="BY">Bielorrusia</option>
                                    <option value="MM">Birmania</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia y Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brasil</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="BT">Bután</option>
                                    <option value="CV">Cabo Verde</option>
                                    <option value="KH">Camboya</option>
                                    <option value="CM">Camerún</option>
                                    <option value="CA">Canadá</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CY">Chipre</option>
                                    <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comores</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, República Democrática del</option>
                                    <option value="KR">Corea</option>
                                    <option value="KP">Corea del Norte</option>
                                    <option value="CI">Costa de Marfíl</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croacia (Hrvatska)</option>
                                    <option value="CU">Cuba</option>
                                    <option value="DK">Dinamarca</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egipto</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="AE">Emiratos Árabes Unidos</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="SI">Eslovenia</option>
                                    <option value="ES">España</option>
                                    <option value="US">Estados Unidos</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Etiopía</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="PH">Filipinas</option>
                                    <option value="FI">Finlandia</option>
                                    <option value="FR">Francia</option>
                                    <option value="GA">Gabón</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GD">Granada</option>
                                    <option value="GR">Grecia</option>
                                    <option value="GL">Groenlandia</option>
                                    <option value="GP">Guadalupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GY">Guayana</option>
                                    <option value="GF">Guayana Francesa</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GQ">Guinea Ecuatorial</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="HT">Haití</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HU">Hungría</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IQ">Irak</option>
                                    <option value="IR">Irán</option>
                                    <option value="IE">Irlanda</option>
                                    <option value="BV">Isla Bouvet</option>
                                    <option value="CX">Isla de Christmas</option>
                                    <option value="IS">Islandia</option>
                                    <option value="KY">Islas Caimán</option>
                                    <option value="CK">Islas Cook</option>
                                    <option value="CC">Islas de Cocos o Keeling</option>
                                    <option value="FO">Islas Faroe</option>
                                    <option value="HM">Islas Heard y McDonald</option>
                                    <option value="FK">Islas Malvinas</option>
                                    <option value="MP">Islas Marianas del Norte</option>
                                    <option value="MH">Islas Marshall</option>
                                    <option value="UM">Islas menores de Estados Unidos</option>
                                    <option value="PW">Islas Palau</option>
                                    <option value="SB">Islas Salomón</option>
                                    <option value="SJ">Islas Svalbard y Jan Mayen</option>
                                    <option value="TK">Islas Tokelau</option>
                                    <option value="TC">Islas Turks y Caicos</option>
                                    <option value="VI">Islas Vírgenes (EEUU)</option>
                                    <option value="VG">Islas Vírgenes (Reino Unido)</option>
                                    <option value="WF">Islas Wallis y Futuna</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italia</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japón</option>
                                    <option value="JO">Jordania</option>
                                    <option value="KZ">Kazajistán</option>
                                    <option value="KE">Kenia</option>
                                    <option value="KG">Kirguizistán</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="LA">Laos</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LV">Letonia</option>
                                    <option value="LB">Líbano</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libia</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lituania</option>
                                    <option value="LU">Luxemburgo</option>
                                    <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MY">Malasia</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MV">Maldivas</option>
                                    <option value="ML">Malí</option>
                                    <option value="MT">Malta</option>
                                    <option value="MA">Marruecos</option>
                                    <option value="MQ">Martinica</option>
                                    <option value="MU">Mauricio</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX" selected>México</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldavia</option>
                                    <option value="MC">Mónaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Níger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk</option>
                                    <option value="NO">Noruega</option>
                                    <option value="NC">Nueva Caledonia</option>
                                    <option value="NZ">Nueva Zelanda</option>
                                    <option value="OM">Omán</option>
                                    <option value="NL">Países Bajos</option>
                                    <option value="PA">Panamá</option>
                                    <option value="PG">Papúa Nueva Guinea</option>
                                    <option value="PK">Paquistán</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Perú</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PF">Polinesia Francesa</option>
                                    <option value="PL">Polonia</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="UK">Reino Unido</option>
                                    <option value="CF">República Centroafricana</option>
                                    <option value="CZ">República Checa</option>
                                    <option value="ZA">República de Sudáfrica</option>
                                    <option value="DO">República Dominicana</option>
                                    <option value="SK">República Eslovaca</option>
                                    <option value="RE">Reunión</option>
                                    <option value="RW">Ruanda</option>
                                    <option value="RO">Rumania</option>
                                    <option value="RU">Rusia</option>
                                    <option value="EH">Sahara Occidental</option>
                                    <option value="KN">Saint Kitts y Nevis</option>
                                    <option value="WS">Samoa</option>
                                    <option value="AS">Samoa Americana</option>
                                    <option value="SM">San Marino</option>
                                    <option value="VC">San Vicente y Granadinas</option>
                                    <option value="SH">Santa Helena</option>
                                    <option value="LC">Santa Lucía</option>
                                    <option value="ST">Santo Tomé y Príncipe</option>
                                    <option value="SN">Senegal</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leona</option>
                                    <option value="SG">Singapur</option>
                                    <option value="SY">Siria</option>
                                    <option value="SO">Somalia</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="PM">St Pierre y Miquelon</option>
                                    <option value="SZ">Suazilandia</option>
                                    <option value="SD">Sudán</option>
                                    <option value="SE">Suecia</option>
                                    <option value="CH">Suiza</option>
                                    <option value="SR">Surinam</option>
                                    <option value="TH">Tailandia</option>
                                    <option value="TW">Taiwán</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TJ">Tayikistán</option>
                                    <option value="TF">Territorios franceses del Sur</option>
                                    <option value="TP">Timor Oriental</option>
                                    <option value="TG">Togo</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad y Tobago</option>
                                    <option value="TN">Túnez</option>
                                    <option value="TM">Turkmenistán</option>
                                    <option value="TR">Turquía</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UA">Ucrania</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistán</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="YE">Yemen</option>
                                    <option value="YU">Yugoslavia</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabue</option>
                                    </select>
                                </p>
                                <!-- Fecha de Nacimiento -->
                                <p>Fecha de Nacimiento:
                                <select id="dia">
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
                              
                              <select id="mes">
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
                              
                              <select id="anio">
                                	<option value="1954">1954</option>
                                	<option value="1955">1955</option>
                                	<option value="1956">1956</option>
                                	<option value="1957">1957</option>
                                	<option value="1958">1958</option>
                                	<option value="1959">1959</option>
                                	<option value="1960">1960</option>
                                	<option value="1961">1961</option>
                                	<option value="1962">1962</option>
                                	<option value="1963">1963</option>
                                	<option value="1964">1964</option>
                                	<option value="1965">1965</option>
                                	<option value="1966">1966</option>
                                	<option value="1967">1967</option>
                                	<option value="1968">1968</option>
                                	<option value="1969">1969</option>
                                	<option value="1970">1970</option>
                                	<option value="1971">1971</option>
                                	<option value="1972">1972</option>
                                	<option value="1973">1973</option>
                                	<option value="1974">1974</option>
                                	<option value="1975">1975</option>
                                	<option value="1976">1976</option>
                                	<option value="1977">1977</option>
                                	<option value="1978">1978</option>
                                	<option value="1979">1979</option>
                                	<option value="1980">1981</option>
                                	<option value="1982">1982</option>
                                	<option value="1983">1983</option>
                                	<option value="1984">1984</option>
                                	<option value="1985">1985</option>
                                	<option value="1986">1986</option>
                                	<option value="1987">1987</option>
                                	<option value="1988">1988</option>
                                	<option value="1989">1989</option>
                                	<option value="1990">1990</option>
                                	<option value="1991">1991</option>
                                	<option value="1992">1992</option>
                                	<option value="1993">1993</option>
                                	<option value="1994">1994</option>
                                	<option value="1995">1995</option>
                                	<option value="1996">1996</option>
                              </select>
                              </p>
                                <!-- Idioma -->
                                <p>Idioma:
                                <select id="idioma">
                                	<option value="ING">Inglés</option>
                                    <option value="ESP" selected>Español</option>
                                </select>
                                </p>
                                <!-- Tipo de Usuario -->
                                <p>Tipo de Usuario
                                <select id="tipoUsuario">
                                	<option value="turista">Turista</option>
                                    <option value="admin">Administrador</option>
                                </select>
                                </p>
                                
                                <div id="divAjax"></div>
                                
                                
                                <!-- CREAR USUARIO -->
                                <p class="signin button"> 
									<input type="button" value="Registrarse"  onClick="crearUsuario()"/> 
								</p>
                                <p class="change_link">  
									¿Ya eres un usuario?
									<a href="#tologin" class="to_register"> Iniciar sesión </a>
								</p>
                            
                        </div>
						</form>
                    </div>
                </div>  
            </section>
        </div>
  
  <footer>
  <hr>
  <p class="footerDisclaimer">2014  Copyrights - <span>Todos los Derechos Reservados</span></p>
  <p class="footerNote">Tres Lagunas - <span> info@treslagunas.com </span></p>
  </footer>

    </body>
</html>