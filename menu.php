<?php 
session_start();

$usuarioConectado=$_SESSION["usuarioConectado"][0];


echo "<div>";
echo "Usuario: ".$usuarioConectado."";
echo "<a id=".'"closeSession"'."href=".'"index.php"'.">Cerrar sesion</a>";
echo "</div>";
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

	<style>
		a{
			margin:2em;
			padding-right: 0.5em;
			padding-left: 0.5em;
			text-decoration-line: none;
			color: black;
			background: #1BFD85;
			border-radius: 20px 0px 20px 0px;
		}
		a:hover{
			color: blue;	
			
		}
		
		body{
			
			background: url(imagenes/fondotabla.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment : fixed;
			background-position : center;
		}
		nav{
			display: flex;
			justify-content: center;
		}
		#closeSession{
			color: white;
			background: grey;
			opacity: 0.8;
		}
	</style>
	
	
</head>
<body>
	<header>
		<h1>
			<p>Examen</p>
			
		</h1>
	</header>
		<nav>
	<a href="introPregunta.html" target="new"><p>INTRODUCIR PREGUNTA</p>
	</a>

	<a href="listaPreguntas.php" target="new"><p>LISTAR PREGUNTAS</p>
	</a>
	<a href="jugar.php" target="new"><p>INICIAR JUEGO</p>
	</a>
	<a href="porcentaje.php" target="new"><p>VER PORCENTAJES</p>
	</a>
</nav>
</body>
</html>