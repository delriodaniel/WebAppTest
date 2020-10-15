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
 

$_GET? $_REQ=$_GET: ($_POST? $_REQ=$_POST: (isset($_SESSION["id"])? ($_REQ["id"]=$_SESSION["id"]): error_id_requerido()));
$id_registro = $_REQ["id"];
	
if (isset($_GET["id_registro"])) {
	$id_registro = $_GET["id_registro"];
} 
echo $id_registro;


# code...
 $sql = "DELETE FROM preguntas WHERE id_enunciado='" . $id_registro . "'";





echo "<br/>Instruccion sql preparada:";
echo "<br/>" . $sql;

$enlace = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD,MYSQL_DATABASENAME);

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . "<br/>";
    echo "errno de depuracion: " . mysqli_connect_errno() . "<br/>";
   
    exit;
}

$link = mysqli_prepare ( $enlace , $sql );

if ($link) {
	
	if (mysqli_stmt_execute ( $link ) ){
	
		echo "<br/>Registro '" . $id_registro . "' ELIMINADO";
		echo "<br/><a href=" . '"listaPreguntas.php"' . ' target="tabla"' . ">Ver lista actual de direcciones</a>";
		
	} else {
	echo "<br/>Enlace invalido. No se modifico el registro";
}
}
mysqli_close($enlace);
?>

