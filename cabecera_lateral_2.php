<!DOCTYPE HTML>
<html>
	<head>
		<script language="JavaScript">
			function muestra_oculta(id){
			if (document.getElementById){ //se obtiene el id
			var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
			el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
			}
			}
			window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
			muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
			}
		</script>
		<script language=JavaScript>
			var message='No disponible';
			function clickIE() {if (document.all) {alert(message);return false;}}
			function clickNS(e) {if
			(document.layers||(document.getElementById&&!document.all)) {
			if (e.which==2||e.which==3) {alert(message);return false;}}}
			if (document.layers)
			{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
			else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
			document.oncontextmenu=new Function('return false')
		</script>
			<link rel="icon" type="image/png" href="img/favicon.png">	
			<meta http-equiv="Content-Type" content="text/html";  charset="UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no" />
			
			<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
			<link href="assets/css/font-awesome_3.min.css" rel="stylesheet">
			<link rel="stylesheet" href="assets/menu/css/style.css">
			<link rel="stylesheet" href="assets/css/font-awesome_2.min.css">
			<link href="assets/css/roboto.css" rel="stylesheet" type="text/css">
			<script src="assets/js/jquery-1.12.0.min.js"></script>
			<link rel="stylesheet" href="assets/css/style.css">
			<link rel="stylesheet" href="assets/css/estilos.css">
			<link rel="stylesheet" href="assets/css/prueba.css">
			<script type="text/javascript" src="assets/js/jquery-latest.pack.js"></script>
			<script language="JavaScript">
				var txt=" TEST ";var espera=600;var refresco=null;function rotulo_title() 
				{document.title=txt;txt=txt.substring(1,txt.length)+txt.charAt(0);refresco=setTimeout("rotulo_title()",espera);}rotulo_title();
			</script>
			<script>
				function copiarAlPortapapeles(id_elemento) {
					var aux = document.createElement("input");
					aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
					document.body.appendChild(aux);
					aux.select();
					document.execCommand("copy");
					document.body.removeChild(aux);
			
				}
			</script>
<?php

date_default_timezone_set('Europe/Madrid');
$br=" ";
$dia2= date('d');
$mes= date('m');

switch($mes){
	
	case 1:
	$mes="Enero";
	break;
	
	case 2:
	$mes="Febrero";
	break;
	
	case 3:
	$mes="Marzo";
	break;
	
	case 4:
	$mes="Abril";
	break;
	
	case 5:
	$mes="Mayo";
	break;
	
	case 6:
	$mes="Junio";
	break;
	
	case 7:
	$mes="Julio";
	break;
	
	case 8:
	$mes="Agosto";
	break;
	
	case 9:
	$mes="Septiembre";
	break;
	
	case 10:
	$mes="Octubre";
	break;
	
	case 11:
	$mes="Noviembre";
	break;
	
	case 12:
	$mes="Diciembre";
	break;
}

$ano= date('Y');

$dia= date('w');

switch($dia){
	case 1:
	$dia="Lunes,";
	break;
	case 2:
	$dia="Martes,";
	break;
	case 3:
	$dia="Miércoles,";
	break;
	case 4:
	$dia="Jueves,";
	break;
	case 5:
	$dia="Viernes,";
	break;
	case 6:
	$dia="Sábado,";
	break;
	case 7:
	$dia="Domingo,";
	break;
}
	
?>	
	<script Language="JavaScript">
		function goback(){
		
		alert("Good Bye!");
		
		history.go(-1);
		
		}
		
		function gettheDate() {
		
		Todays = new Date();
		
		TheDate = "" + (Todays.getMonth()+ 1) +" / "+ Todays.getDate() + " / " + (Todays.getYear() + 1900) 
		
		document.clock.thedate.value = TheDate;
		
		}
		
		var timerID = null;
		
		var timerRunning = false;
		
		function stopclock (){
		
			if(timerRunning)
		
				clearTimeout(timerID);
		
			timerRunning = false;
		
		}
		
		function startclock () {
		
			// Make sure the clock is stopped
		
			stopclock();
		
			gettheDate()
		
			showtime();
		
		}
		
		function showtime () {
		
			var now = new Date();
		
			var hours = now.getHours();
		
			var minutes = now.getMinutes();
		
			var seconds = now.getSeconds()
		
			var timeValue = "" + ((hours >12) ? hours -12 :hours)
		
			timeValue += ((minutes < 10) ? ":0" : ":") + minutes
		
			timeValue += ((seconds < 10) ? ":0" : ":") + seconds
		
			timeValue += (hours >= 12) ? " PM" : " AM"
		
			document.clock.face.value = timeValue;
		
			// you could replace the above with this
		
			// and have a clock on the status bar:
		
			// window.status = timeValue;
		
			timerID = setTimeout("showtime()",1000);
		
			timerRunning = true;
		
		}
	</script>
</head>

<body onLoad="startclock()" style="width:100%">
	<link rel="icon" 
		type="image/jpg" 
		href=""/>
				<div>
						<div id="main">
							<div>
									<header>
									<?php
										$dia=$dia.$br.$dia2.$br."de".$br.$mes.$br."de".$br.$ano;
										print "<br/><h1><strong>".$dia."</strong></h1><hr/>";
									?>
										
									</header>
	<section id="banner">
		<div style="margin:auto;text-align:center;margin-top:-70px;">