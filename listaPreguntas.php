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
	

<?php
//declaracion de variables para usar menos comillas y que sea mas simple.

$modif="http://192.168.1.218/danielDR/modificar.php";

//establecer conexion con la BD poniendo los argumentos SERVIDOR DE BASE, EL USUARIO ROOT, CONTRASEÑA(EN CASO DE NO TENER SE POENEN "").
//or die: es en el caso de que falle la conexion.
$conexion = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die ("No se ha podido conectar al servidor de Base de datos");

//seleccion de la BD con la variable de CONEXION y BD.
$db = mysqli_select_db( $conexion, MYSQL_DATABASENAME ) or die ( "No se ha podido conectar a la base de datos" );

//preparar la sentencia de buscar los datos.
$consulta = "SELECT id_enunciado, enunciado, respuesta_a, respuesta_b, respuesta_c, respuesta_d, valida FROM preguntas";

//obtengo en la variable RESULTADO  el resultado de la consulta (query) que requiere la CONEXION y la CONSULTA.
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");


?>


<div>

<?php
//creo una tabla  mediante echo y sus etiquetas
echo "<table border=2px>";
echo "<tr>";
// echo "<th>ID</th>";
echo "<th>NUMERO DE PREGUNTA</th>";
echo "<th>ENUNCIADO</th>";
echo "<th>RESPUESTA A</th>";
echo "<th>RESPUESTA B</th>";
echo "<th>RESPUESTA C</th>";
echo "<th>RESPUESTA D</th>";
echo "</tr>";


//el bucle while sirve para ver si hay registro para que en el momento que no exista una fila de datos salga y lo extraiga por lineas en la variable COLUMNA
//dentro del bucle se concatena con las estiquetas los elementos de la VARIABLE ARRAY COLUMNA tal que $columna['nombre columna']
//finalmente la tabla se cierra
$i=1;
while ($columna = mysqli_fetch_array( $resultado ))
{
	if($columna['valida']==1){
		echo '<tr onclick="'. "document.getElementById('requested_id').value=". $columna["id_enunciado"]. "; document.getElementById('mod_form').submit();" . '">' ."<td>".$i."</td><td>".$columna['enunciado']."</td><td class=valida>" . $columna['respuesta_a'] . "</td><td>" . $columna['respuesta_b'] . "</td><td>" . $columna['respuesta_c'] . "</td><td>" . $columna['respuesta_d'] . '</td><td><a href="mod.php?id=' . $columna['id_enunciado'] .'"target="mod">Modificar</a></td>'. '</td><td><a href="eliminar.php?id=' . $columna['id_enunciado'] .'"target="eliminar">Eliminar</a></td>';
	echo "</tr>";
	$i++;
	}if($columna['valida']==2){
		echo '<tr onclick="'. "document.getElementById('requested_id').value=". $columna["id_enunciado"]. "; document.getElementById('mod_form').submit();" . '">' ."<td>".$i."</td><td>".$columna['enunciado']."</td><td >" . $columna['respuesta_a'] . "</td><td class=valida>" . $columna['respuesta_b'] . "</td><td>" . $columna['respuesta_c'] . "</td><td>" . $columna['respuesta_d'] . '</td><td><a href="mod.php?id=' . $columna['id_enunciado'] .'"target="mod">Modificar</a></td>'. '</td><td><a href="eliminar.php?id=' . $columna['id_enunciado'] .'"target="eliminar">Eliminar</a></td>';
	echo "</tr>";
	$i++;
	}if($columna['valida']==3){
		echo '<tr onclick="'. "document.getElementById('requested_id').value=". $columna["id_enunciado"]. "; document.getElementById('mod_form').submit();" . '">' ."<td>".$i."</td><td>".$columna['enunciado']."</td><td>" . $columna['respuesta_a'] . "</td><td>" . $columna['respuesta_b'] . "</td><td class=valida>" . $columna['respuesta_c'] . "</td><td>" . $columna['respuesta_d'] . '</td><td><a href="mod.php?id=' . $columna['id_enunciado'] .'"target="mod">Modificar</a></td>'. '</td><td><a href="eliminar.php?id=' . $columna['id_enunciado'] .'"target="eliminar">Eliminar</a></td>';
	echo "</tr>";
	$i++;
	}if($columna['valida']==4){
		echo '<tr onclick="'. "document.getElementById('requested_id').value=". $columna["id_enunciado"]. "; document.getElementById('mod_form').submit();" . '">' ."<td>".$i."</td><td>".$columna['enunciado']."</td><td >" . $columna['respuesta_a'] . "</td><td>" . $columna['respuesta_b'] . "</td><td>" . $columna['respuesta_c'] . "</td><td class=valida>" . $columna['respuesta_d'] . '</td><td><a href="mod.php?id=' . $columna['id_enunciado'] .'"target="mod">Modificar</a></td>'. '</td><td><a href="eliminar.php?id=' . $columna['id_enunciado'] .'"target="eliminar">Eliminar</a></td>';
	echo "</tr>";
	$i++;
	}
	$registro=[$columna['enunciado'],$columna['respuesta_a'],$columna['respuesta_b'],$columna['respuesta_c'],$columna['respuesta_d'],$columna['valida']];
	$_SESSION["datos"][$columna['id_enunciado']] = $registro;


	
}	
$titulo=["enunciado","respuesta_a","respuesta_b","respuesta_c","respuesta_d","valida"];

$_SESSION["titulos"]=$titulo;


echo "</table>";

?>


<input type="button" value="Pagina inicio" onclick="window.location = 'index.php'">

<input type="button" value="Nueva Pregunta" onclick="window.location = 'introPregunta.html'">






<?php
//se cierra la conexion de la tabla para no probocar fallos
mysqli_close($conexion);

?>

</div>


</body>
	<script src="js/jquery-3.4.1.min.js"></script>
	
</html>

