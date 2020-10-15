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


$sql;
$enlace = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASENAME);
		
		$enunciado=$_GET["enunciado"];
		$respuesta_a=$_GET["respuesta_a"];
		$respuesta_b=$_GET["respuesta_b"];
		$respuesta_c=$_GET["respuesta_c"];
		$respuesta_d=$_GET["respuesta_d"];
		$valida=$_GET["valida"];
		$correctas=0;
		$incorrectas=0;
		$etiquetas="";


		$sql = "INSERT INTO preguntas (enunciado, respuesta_a, respuesta_b, respuesta_c, respuesta_d, valida, correctas, incorrectas, etiquetas) values('" . $enunciado . "', '" . $respuesta_a . "', '" . $respuesta_b . "', '" . $respuesta_c . "', '" . $respuesta_d . "', '" . $valida . "', '" . $correctas . "', '" . $incorrectas . "', '" . $etiquetas . "')";





$link = mysqli_prepare ( $enlace , $sql );

if ($link ) {
	if (mysqli_stmt_execute ( $link )){
		echo "<br/>Nuevo registro insertado";
		echo "<br/><a href=" . '"introPregunta.html"' . ">Seguir introduciendo preguntas</a>";
		echo "<br/><a href=" . '"index.php"' . ">pagina de inicio</a>";
		echo "<br/><a href=" . '"listaPreguntas.php"' . ">listado de preguntas</a>";
	} else {
	 echo "<br/>Enlace invalido. No se inserto el registro";
}
}
mysqli_close($enlace);
 ?>



