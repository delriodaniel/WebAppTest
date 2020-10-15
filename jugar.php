<?php 
session_start();
include('conectaBD.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{
			border: 2px solid black;
		}
		tr{
			background: white;

		}
		tr:hover{
			background: lightgreen;
			color: black;
			
		}

		td{
			text-align: center;
		}
		a{
			color: black;
		}
		a:hover{
			color: yellow;	
			
		}
		div{
			width: 40em;
		}
		
		body{
			display:flex;
			justify-content: center;
			background: url(imagenes/fondotabla.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment : fixed;
			background-position : center;
		}
		input{
			margin-top: 3em;
			padding: 1em;
			text-align: center;
			background: lightblue;
			border-radius: 2em;
		}
		.valida{
			background: green;
		}
		p{
			background: rgba(42,242,142,0.7);

		}
		
		
	
	</style>

</head>
<body>
	

<?php
//declaracion de variables para usar menos comillas y que sea mas simple.



//establecer conexion con la BD poniendo los argumentos SERVIDOR DE BASE, EL USUARIO ROOT, CONTRASEÑA(EN CASO DE NO TENER SE POENEN "").
//or die: es en el caso de que falle la conexion.
$conexion = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASENAME)or die ("No se ha podido conectar al servidor de Base de datos");


//preparar la sentencia de buscar los datos.
$consulta = "SELECT id_enunciado, enunciado, respuesta_a, respuesta_b, respuesta_c, respuesta_d,valida,1/((correctas+1) * power(2,4)) FROM preguntas ORDER BY RAND() LIMIT 1";

$link = mysqli_prepare($conexion, $consulta);
echo "<div id=aqui>";
 if (mysqli_stmt_execute ($link)){
	mysqli_stmt_bind_result($link, $id_enunciado, $enunciado, $respuesta_a,$respuesta_b,$respuesta_c,$respuesta_d,$valida,$sali);
	mysqli_stmt_fetch($link);

	echo "<form method=get action=responder.php id=form name=formulario> ";
	echo   "<input type=number id=id_enunciado name=id_enunciado value=".$id_enunciado." hidden><br>
		<p>$enunciado</p><br>
		<input type=radio id=respuestaElegida1 name=respuestaElegida value=1><label for=respuesta_a>$respuesta_a</label><br>

		<input type=radio id=respuestaElegida2 name=respuestaElegida value=2><label for=respuesta_b>$respuesta_b</label><br>" . PHP_EOL;
		if ($respuesta_c!="" && $respuesta_d!="") {
			# code...
			echo "<input type=radio id=respuestaElegida3 name=respuestaElegida value=3><label for=respuesta_c>$respuesta_c</label><br>

			<input type=radio id=respuestaElegida4 name=respuestaElegida value=4><label for=respuesta_d>$respuesta_d</label><br>" . PHP_EOL;
		}
		echo "<input type=number id=valida name=valida value=".$valida." hidden><br>";
	
		

	}	


?>
	

 <input type="submit" id="enviar" name="enviar" value="Enviar respuesta">

<input type="button" value="Pagina inicio" onclick="window.location = 'index.php'">
</form>
</div>





<?php
//se cierra la conexion de la tabla para no probocar fallos
mysqli_close($conexion);

?>

</div>


</body>
	
</html>

