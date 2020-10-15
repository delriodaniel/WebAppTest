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
		body{
        
	      table{
			border: 2px solid black;
		}
		tr{
			background: white;

		}
		tr:hover{
			background:  lightgreen;
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
		
	</style>
</head>
<body>
	
</body>
</html>

<?php 


echo "Estos son los parametros recibidos";
foreach($_GET as $campo=>$valor) {

	echo "<br/>" . $campo . " = " . $valor;

}



$id_enunciado = $_GET['id_enunciado'];
$valida = $_GET['valida'];
$elegida= $_GET['respuestaElegida'];



if($valida==$elegida){
	$enlace = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASENAME);

	$consultaAcierto="UPDATE preguntas SET correctas=correctas+1 WHERE id_enunciado='".$id_enunciado."'";

	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . "<br/>";
	    echo "errno de depuracion: " . mysqli_connect_errno() . "<br/>";
	   
	    exit;
	}

	$link = mysqli_prepare ( $enlace , $consultaAcierto );

	if ($link) {
		
		if (mysqli_stmt_execute ( $link ) ){
		
			echo "<br/>Registro '" . $id_enunciado . "' ACTUALIZADO";
			echo "<p>has acertado la pregunta</p>";
			echo "<br/><a href=" . '"jugar.php"' . ' target="tabla"' . ">Siguiente Pregunta</a>";
			
		} else {
		echo "<br/>Enlace invalido. No se modifico el registro";
	}

	}
	

}else{
	$enlace = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASENAME);
	$consultaFallo="UPDATE preguntas SET incorrectas=incorrectas+1 WHERE id_enunciado='".$id_enunciado."'";

	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . "<br/>";
	    echo "errno de depuracion: " . mysqli_connect_errno() . "<br/>";
	   
	    exit;
	}

	$link = mysqli_prepare ( $enlace , $consultaFallo );

	if ($link) {
		
		if (mysqli_stmt_execute ( $link ) ){
		
			echo "<br/>Registro '" . $id_enunciado . "' ACTUALIZADO";
			echo "<p>No es esa respuesta</p>";
			echo "<br/><a href=" . '"jugar.php"' . ' target="tabla"' . ">Siguiente Pregunta</a>";
			
		} else {
		echo "<br/>Enlace invalido. No se modifico el registro";
	}

	}
	
}


mysqli_close($enlace);
?>

