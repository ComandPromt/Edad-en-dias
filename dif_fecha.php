<?php

function signo_zodiaco($fecha){ 
    $zodiaco = ''; 
    list ( $ano, $mes, $dia ) = explode ( "-", $fecha ); 
    if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  { $zodiaco = "Acuario"; }
	elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  { $zodiaco = "Piscis"; } 
	elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  { $zodiaco = "Aries"; } 
	elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  { $zodiaco = "Tauro"; } 
	elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  { $zodiaco = "Géminis"; } 
	elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  { $zodiaco = "Cáncer"; } 
	elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  { $zodiaco = "Leo"; } 
	elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  { $zodiaco = "Virgo"; } 
	elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) { $zodiaco = "Libra"; } 
	elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) { $zodiaco = "Escorpio"; } 
	elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) { $zodiaco = "Sagitario"; } 
	elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  { $zodiaco = "Capricornio"; } 
    return $zodiaco; 
}

function dias_transcurridos($fecha_i,$fecha_f){
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}

function bisiesto($year=NULL){
    $year = ($year==NULL)? date('Y'):$year;
	
    if ($year<3344){
		
		$year1=($year%4 == 0 && $year%100 != 0) || $year%400 == 0;
		
		if($year1==1){
			$year1=true;
		}
		
		else{
			$year1=false;
		}

		return ($year1);
	}
}

function tiempo_transcurrido($fecha_nacimiento, $fecha_control){
   $fecha_actual = $fecha_control;
   
   if(!strlen($fecha_actual))
   {
      $fecha_actual = date('d/m/Y');
   }

   $array_nacimiento = explode ( "/", $fecha_nacimiento ); 
   $array_actual = explode ( "/", $fecha_actual ); 

   $anos =  $array_actual[2] - $array_nacimiento[2];
   $meses = $array_actual[1] - $array_nacimiento[1];
   $dias =  $array_actual[0] - $array_nacimiento[0];
   
   if ($dias < 0){ 
      --$meses; 

      switch ($array_actual[1]) { 
	  
         case 1: 
            $dias_mes_anterior=31;
            break; 
			
         case 2:     
            $dias_mes_anterior=31;
            break;
			
         case 3:
		 
			if ($anioactual>=3344){
				$dias_mes_anterior=30;
               break;
			}
			   
			else{				
				if (bisiesto($array_actual[2])){ 
					$dias_mes_anterior=29;
					break; 
				} 
				else{ 
					$dias_mes_anterior=28;
					break; 
				} 
			}
			
         case 4:
            $dias_mes_anterior=31;
            break; 
			
         case 5:
            $dias_mes_anterior=30;
            break; 
			
         case 6:
            $dias_mes_anterior=31;
            break; 
			
         case 7:
            $dias_mes_anterior=30;
            break; 
			
         case 8:
            $dias_mes_anterior=31;
            break; 
			
         case 9:
            $dias_mes_anterior=31;
            break; 
			
         case 10:
            $dias_mes_anterior=30;
            break;
			
         case 11:
            $dias_mes_anterior=31;
            break; 
			
         case 12:
            $dias_mes_anterior=30;
            break; 
      } 

      $dias+= $dias_mes_anterior;

      if ($dias < 0){
         --$meses;
         if($dias == -1){
            $dias = 30;
         }
         if($dias == -2){
            $dias = 29;
         }
      }
	}

   if ($meses < 0){ 
      --$anos; 
      $meses=$meses + 12; 
   }

   $tiempo[0] = $anos;
   $tiempo[1] = $meses;
   $tiempo[2] = $dias;

   return $tiempo;
}

$dia = $_POST["dia"];
$mes = $_POST["mes"];
$anio = $_POST["anio"];

$fecha_nacimiento= $anio."-".$mes."-".$dia;
$mesactual=date("m");
$diaactual=date("d");
$anioactual=date("Y");

if ($dia==0 || $mes==0 || $anio==0 ||$dia==0 && $mes==0 && $anio==$anioactual+1|| $anio>$anioactual || $mes>$mesactual && ($anio>=$anioactual) || ($dia>$diaactual) && $mes==$mesactual && ($anio>=$anioactual) || $dia==31 && $mes==2 || $dia==30 && $mes==2 && $anio <1712 ||$dia==30 && $mes==2 && $anio>1712 && $anio <1930 ||$dia==30 && $mes==2 && $anio>1931 && $anio<3344){
	header ('Location: index.php');
}

else{
	include 'cabecera_lateral_2.php';
	$dia = $_POST["dia"];
	$mes = $_POST["mes"];
	$anio = $_POST["anio"];
	
	$fecha_nacimiento= $anio."-".$mes."-".$dia;
	$mesactual=date("m");
	$diaactual=date("d");
	$anioactual=date("Y");
	setlocale(LC_ALL,"es_ES");
	$fecha_nacimiento = $dia."/".$mes."/".$anio;
	$fecha_control =  date("d") . "/" . date("m") . "/" . date("Y");
	$tiempo = tiempo_transcurrido($fecha_nacimiento, $fecha_control);
	$texto = "$tiempo[0] años, $tiempo[1] meses y  $tiempo[2] días";

	$fecha_nacimiento = $mes."/".$dia."/".$anio;
	$array_dias['Sunday'] = "Domingo, ";
	$array_dias['Monday'] = "Lunes, ";
	$array_dias['Tuesday'] = "Martes, ";
	$array_dias['Wednesday'] = "Miércoles, ";
	$array_dias['Thursday'] = "Jueves, ";
	$array_dias['Friday'] = "Viernes, ";
	$array_dias['Saturday'] = "Sábado, ";
	$diasem=$array_dias[date('l', strtotime($fecha_nacimiento))];
	$fecha_nacimiento = $dia."/".$mes."/".$anio; 
	
	switch ($mes){
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
	
	$fecha_nacimiento=$dia." de ".$mes." de ".$anio;
	$mes = $_POST["mes"];
	
	if($tiempo[1]==0 && $tiempo[2]==0 && $dia==$diaactual && $mes==$mesactual){
		
		print "<h1>Naciste el <strong>$diasem $fecha_nacimiento</strong></h1>";
		print "<br/>";	
		
		if ($tiempo[0]==0){
			print "<img src=img/reciennacido.jpg></img>";	
			print "<br/>";
		}
	
		else{
			if($tiempo[0]==1){
				print "<h1>Tienes: <strong>$tiempo[0] año</strong></h1>";
				print "<br/>";
				print "<img src=img/felicitaciones.jpg></img>";
				print "<br/>";
			}
			else{
				print "<h1>Tienes: <strong>$tiempo[0] años</strong></h1>";
				print "<br/>";
				print "<img src=img/felicitaciones.jpg></img>";
				print "<br/>";
			}
		
		}
	}
	
	else{
		print "<h1>Naciste el <strong>$diasem $fecha_nacimiento</strong></h1>";
		print "<br/>";
		if($tiempo[0]==0 && $tiempo[1]>=0 && $tiempo[2]>=0){
		
			if($tiempo[1]==1 && $tiempo[2]==1){
				$texto = "$tiempo[1] mes y  $tiempo[2] día";
				print "<h1>Tienes:<strong> $texto</strong></h1>";	
			}
			
			else{

				if($tiempo[1]==1 && $tiempo[2]==0){
					$texto = "$tiempo[1] mes";
					print "<h1>Tienes:<strong> $texto</strong></h1>";	
				}
				
				else{
					
					if($tiempo[1]==0 && $tiempo[2]==1){
						$texto = "$tiempo[2] día";
						print "<h1>Tienes:<strong> $texto</strong></h1>";	
					}
				
					else{
						if($tiempo[1]>1 && $tiempo[2]==0){
							if($tiempo[1]==6){
								$texto = "medio a&ntilde;o ( 6 meses )";
								print "<h1>Tienes:<strong> $texto</strong></h1>";	
							}
							else{
								$texto = "$tiempo[1] meses";
								print "<h1>Tienes:<strong> $texto</strong></h1>";	
							}
						}

						else{

							if($tiempo[1]==0 && $tiempo[2]>1){
						
								if (($tiempo[2]%7)==0){
								
									$texto = $tiempo[2]/7;
									
									if ($texto==1){
										$texto = "$texto semana ( $tiempo[2] días )";
										print "<h1>Tienes: <strong> $texto</strong></h1>";
									}
									
									else{	
										$texto = "$texto semanas ( $tiempo[2] días )";		
										print "<h1>Tienes: <strong> $texto</strong></h1>";
									}
								}
								else{
									$texto = "$tiempo[2] días";
									print "<h1>Tienes:<strong> $texto</strong></h1>";	
								}
							}
			
							else{
								
								if($tiempo[1]==1 && $tiempo[2]>1){
									$texto = "$tiempo[1] mes y $tiempo[2] días";
									print "<h1>Tienes:<strong> $texto</strong></h1>";	
								}
				
								else{
									if($tiempo[1]>1 && $tiempo[2]>1){
										$texto = "$tiempo[1] meses y $tiempo[2] días";
										print "<h1>Tienes:<strong> $texto</strong></h1>";	
									}
								}
							}
						}
					}
				}
			}	
		}
		
		else{
			//Si ha pasado un año,un mes y un dia hacemos lo siguiente
			
			if($tiempo[0]==1 && $tiempo[1]==1 && $tiempo[2]==1 ){
				$texto = "$tiempo[0] año,$tiempo[1] mes y $tiempo[2] día";
				print "<h1>Tienes:<strong> $texto</strong></h1>";
			}
			
			else{
					//Si ha pasado un año,un mes y X días hacemos lo siguiente
				
				if($tiempo[0]==1 && $tiempo[1]==1 && $tiempo[2]>1 ){
					
					$texto = "$tiempo[0] año,$tiempo[1] mes y $tiempo[2] días";
					print "<h1>Tienes:<strong> $texto</strong></h1>";
				}
				
				else{
					//Si ha pasado un año,X meses y 1 dia hacemos lo siguiente
					
					if($tiempo[0]==1 && $tiempo[1]>1 && $tiempo[2]==1 ){
						$texto = "$tiempo[0] año,$tiempo[1] meses y $tiempo[2] día";
						print "<h1>Tienes:<strong> $texto</strong></h1>";
					}
					
					else{
										
						if($tiempo[0]>1 && $tiempo[1]==1 && $tiempo[2]==1 ){
							$texto = "$tiempo[0] años,$tiempo[1] mes y $tiempo[2] día";
							print "<h1>Tienes:<strong> $texto</strong></h1>";
						}	
				
						else{

							if($tiempo[0]>1 && $tiempo[1]>1 && $tiempo[2]==1 ){
								$texto = "$tiempo[0] años, $tiempo[1] meses y $tiempo[2] día";
								print "<h1>Tienes: <strong> $texto</strong></h1>";
							}
							
							else{
									
								if($tiempo[0]==1 && $tiempo[1]==1 && $tiempo[2]==0){
									$texto = "$tiempo[0] año y $tiempo[1] mes";
									print "<h1>Tienes: <strong> $texto</strong></h1>";
								}
								
								else{
									
									if($tiempo[0]==1 && $tiempo[1]==0 && $tiempo[2]==1){
										$texto = "$tiempo[0] año y $tiempo[2] día";
										print "<h1>Tienes: <strong> $texto</strong></h1>";
									}
					
									else{
										
										if($tiempo[0]==1 && $tiempo[1]==0 && $tiempo[2]>1){
											$texto = "$tiempo[0] año y $tiempo[2] días";
											print "<h1>Tienes: <strong> $texto</strong></h1>";
										}	
										
										else{
																				
											if($tiempo[0]==1 && $tiempo[1]>1 && $tiempo[2]==0){
											
												if($tiempo[0]==1 && $tiempo[1]==6){
													$texto = "1 año y medio";
													print "<h1>Tienes: <strong> $texto</strong></h1>";	
												}	
													
												else{	
													$texto = "$tiempo[0] año y $tiempo[1] meses";
													print "<h1>Tienes: <strong> $texto</strong></h1>";
												}
											}	
						
											else{
					
												if($tiempo[0]>1 && $tiempo[1]>1 && $tiempo[2]==0){
													
													if($tiempo[1]==6){
														$texto = "$tiempo[0] años y medio";
														print "<h1>Tienes: <strong> $texto</strong></h1>";
													}
													
													else {
													$texto = "$tiempo[0] años y $tiempo[1] meses";
													print "<h1>Tienes: <strong> $texto</strong></h1>";
													}
													
												}		
							
												else{
													
													if($tiempo[0]>1 && $tiempo[1]==1 && $tiempo[2]>1){
														$texto = "$tiempo[0] años , $tiempo[1] mes y $tiempo[2] días";
														print "<h1>Tienes: <strong> $texto</strong></h1>";
													}
													
													else{
														
														if($tiempo[0]==1 && $tiempo[1]>1 && $tiempo[2]==1){
															$texto = "$tiempo[0] año , $tiempo[1] meses y $tiempo[2]==1 dia";
															print "<h1>Tienes: <strong> $texto</strong></h1>";
														}
														
														else{	
			
															if($tiempo[0]==1 && $tiempo[1]>1 && $tiempo[2]>1){
																$texto = "$tiempo[0] año , $tiempo[1] meses y $tiempo[2] días";
																print "<h1>Tienes: <strong> $texto</strong></h1>";
															}
														
															else{
															
																if($tiempo[0]>1 && $tiempo[1]==0 && $tiempo[2]>1){
																	$texto = "$tiempo[0] años y $tiempo[2] días";
																	print "<h1>Tienes: <strong> $texto</strong></h1>";
																}
															
																else{
																	
																	if($tiempo[0]>1 && $tiempo[1]==1 && $tiempo[2]==0){
																		$texto = "$tiempo[0] años y $tiempo[1] mes";
																		print "<h1>Tienes: <strong> $texto</strong></h1>";
																	}
																	
																}
															}
														}
													}
												}		
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	
	if ($tiempo[0]>1 && $tiempo[1]>1 && $tiempo[2]>1){
		$texto = "$tiempo[0] años, $tiempo[1] meses y $tiempo[2] días";
		print "<h1>Tienes:<strong> $texto</strong></h1>";	
	}
		
	if ($mes<$mesactual || ($mes==$mesactual && $dia<$diaactual)){
		$timestamp1 = mktime(0,0,0,$mesactual,$diaactual,$anioactual); 
		$anioactual=$anioactual+1;
		$timestamp2 = mktime(4,12,0,$mes,$dia,$anioactual); 
		$segundos_diferencia = $timestamp1 - $timestamp2; 
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
		$dias_diferencia = abs($dias_diferencia); 
		$dias_diferencia = floor($dias_diferencia); 
		print "<br/>";	
		echo "<h1><strong>".$dias_diferencia."</strong> d&iacute;as para tu cumple</h1>";
		$anioactual-=1;
	}
	
	else{
		
		$mes = $_POST["mes"];	
		$timestamp1 = mktime(0,0,0,$mesactual,$diaactual,$anioactual); 
		$timestamp2 = mktime(4,12,0,$mes,$dia,$anioactual);
		$segundos_diferencia = $timestamp1 - $timestamp2; 
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
		$dias_diferencia = abs($dias_diferencia); 
		$dias_diferencia = floor($dias_diferencia); 
			
		if ($dias_diferencia!=0){
			$resto=$dias_diferencia%7;
			$dias_diferencia=$dias_diferencia/7;
			
			if ($resto==0){
				$tiempo[2]=7*$dias_diferencia;
				print "<br/>";	
				if($tiempo[2]==7){
					echo "<h1>"."<strong>".$dias_diferencia."</strong> semana para tu cumple (<strong> $tiempo[2]</strong> días )</h1>";	
				}
				else{
					echo "<h1>"."<strong>".$dias_diferencia."</strong> semanas para tu cumple (<strong> $tiempo[2]</strong> días )</h1>";
				}
			}
			
			else{
				$dias_diferencia=$dias_diferencia*7;
				print "<br/>";	
				echo "<h1>"."<strong>".$dias_diferencia."</strong> d&iacute;as para tu cumple</h1>";
			}
		}
	
	}

	print "<br/>";
	print "<h1>Eres: ";
	echo "<strong>".signo_zodiaco($anio."-".$mes."-".$dia)."</strong>";
	print "</h1>";
	
	if ($anioactual<3344){
		
		$annio=bisiesto($anio);
		$cont=0;
		$aniosbpasados=array();
	
		for($anio;$anio<=$anioactual;$anio++){
			$annio=bisiesto($anio);
			
			if ($annio==1){	
				$aniosbpasados[] = $anio.",";
				$cont++;
			}
		}
	
		if($cont>0){
			print "<br/>";	
			
			if($cont==1){
				print "<h1>"."<strong>".$cont."</strong> a&ntilde;o bisiesto desde tu cumple.</h1>";
			}
		
			else{
				print "<h1>"."<strong>".$cont."</strong> a&ntilde;os bisiestos desde tu cumple.</h1>";
			}
			print "<br/>";
			
			$cadena=implode($aniosbpasados);
			$cadena2 = substr($cadena,-1);
			$cadena = substr($cadena,0,-1);
			$resultado = str_replace(",", ".", $cadena2);
			
			print '<input type="checkbox"  id="spoiler" /> 
			<label for="spoiler" >Años bisiestos desde tu cumple</label>
			<div  class="spoiler" style="height:100%" >
			<textarea style="text-align: center; width:800px; resize: vertical;" id="textarea" rows="4" cols="100%" readonly="readonly"  class="bookmarklet" style="overflow:hidden; border:none;">';
			print $cadena.$resultado;
			
			print '</textarea><input type="checkbox"  id="spoiler" /><label for="spoiler" >Cerrar</label></div>';
			
			$cadena = substr($cadena, -4); 
			
			$cadena+=4;
			
			$cadena-=$anioactual;
			print "<br/>";	
			print "<h1><strong>".$cadena."</strong> a&ntilde;os para el pr&oacute;ximo bisiesto: <strong>";
			
			$cadena+=$anioactual;
			
			print $cadena."</strong></h1>";
		}
	
		else{
			
			for($anioactual-=1;$annio!=1;$anioactual--){
				
				$annio=bisiesto($anioactual);
				
				if ($annio==1){
					$aniosbpasados[] = $anioactual+4;
				}
			}
			
			$anioactual=date("Y");
			$aniosbpasados[]=$aniosbpasados[0]-$anioactual;
			print "<br/>";	
			print "<h1><strong>".$aniosbpasados[1]."</strong> a&ntilde;os para el pr&oacute;ximo bisiesto: <strong>".$aniosbpasados[0]."</strong></h1>";
		}
		
		print "<br/>";	
		echo "<a href='index.php'><img src=img/atras.png></img></a>";
		print "</body>";
		print "</html>";
	}
}
?>