<?php

session_start();
$_GET? $_REQ=$_GET: ($_POST? $_REQ=$_POST: (isset($_SESSION["id"])? ($_REQ["id"]=$_SESSION["id"]): error_id_requerido()));


include('conectaBD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido</title>

	<style>
		a{

			margin:1.5em;
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
		div{
			margin-left: 33.33%;
		}
		p{
			font-size: 2em;
		}
	</style>
	
	
</head>
<body>
</body>
</html>

<?php 



$conexion = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die ("No se ha podido conectar al servidor de Base de datos ");

//seleccion de la BD con la variable de CONEXION y BD.
$db = mysqli_select_db( $conexion, MYSQL_DATABASENAME ) or die ( "No se ha podido conectar a la base de datos " );

//preparar la sentencia de buscar los datos.
$consulta = "SELECT * FROM login";

//obtengo en la variable RESULTADO  el resultado de la consulta (query) que requiere la CONEXION y la CONSULTA.
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos joroba anda que tela");

$nombreUsuario=$_GET["nombreUsuario"];
$contrasenaUsuario=$_GET["contrasenaUsuario"];


$existe=0;


while ($columna = mysqli_fetch_array( $resultado )) {
	
	if($columna["usuario"]==$nombreUsuario && $columna["contrasena"]==$contrasenaUsuario){
		$existe=1;
	}
	echo "<br/>";
	
}


if (isset($_GET["request1"])) {
	# code...
	if ($existe!=1) {
		$enlace = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASENAME);

		$consultaRegistro="INSERT INTO login ( usuario, contrasena) VALUES ( '".$nombreUsuario."','".$contrasenaUsuario."' )";

		

		$link = mysqli_prepare ( $enlace , $consultaRegistro );
	
		if ($link ) {
			if (mysqli_stmt_execute ( $link )){
				echo "<br/>Nuevo usuario insertado";
				echo "<br/><a href=" . '"menu.php"' . ">Acceso Menu</a>";

				$usuarioR=[$nombreUsuario,$contrasenaUsuario];
				$_SESSION["usuarioConectado"] = $usuarioR;

			} else {
				 echo "<br/>Enlace invalido. No se inserto el registro";
			}
		}
	mysqli_close($enlace);
	}else{
		echo "<div>";
		echo "<br/><p>Usuario ya existente pruebe con otro";
		echo "<br/><a href=" . '"index.php"' . ">Intente registrarse de nuevo</a>";
		echo "</div>";
	}
}else{
	# code...
	if ($existe==1) {
		$usuarioR=[$nombreUsuario,$contrasenaUsuario];
		$_SESSION["usuarioConectado"] = $usuarioR;
		echo "<div>";
		echo "<br/><p> Usuario: ".$nombreUsuario;
		echo "<br/><a href=" . '"menu.php"' . ">Puede acceder al menu</a>";
		echo "</div>";
	}else{
		echo "<div>";
		echo "<br/><p>Usuario no existente ";
		echo "<br/><a href=" . '"index.php"' . ">Intente introducir un usuario existente o registrese</a>";
		echo "</div>";
	}
}





?>