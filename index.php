<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido</title>

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
		form{
		margin-left: 40%;
		}
		input{
			
			margin-right: 3em;
		}
		

		.act{
				margin-left: 5em;
				margin-top: 2em;
				padding: 1em;
				text-align: center;
				background: lightblue;
				border-radius: 2em;
				width: 13em;
			}

	</style>
	
	
</head>
<body>
	<header>
		<h1>
			<p>Examen</p>
			
		</h1>
	</header>
		<form action="registrarUsuario.php" method="get" name="id" target="index">
			
			<p>Usuario</p><input type="text" id="nombreUsuario"  name="nombreUsuario" required size="30" style="width: 300px ; height: 40px">

			<p>Contraseña</p><input type="text" id="contrasenaUsuario"  name="contrasenaUsuario" required size="30" style="width: 300px ; height: 40px">
			<br>
		
			
			<input class="act" id="request1" name="request1" type="submit" value="Registrarse"/><br>
			<input class="act" id="request2" name="request2" type="submit" value="Acceder"/><br>

		
		</form>


</body>
</html>
