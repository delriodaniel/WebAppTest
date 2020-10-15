<?php
session_start();
$_GET? $_REQ=$_GET: ($_POST? $_REQ=$_POST: (isset($_SESSION["id"])? ($_REQ["id"]=$_SESSION["id"]): error_id_requerido()));
$id_registro = $_REQ["id"];


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>MODIFICAR MAQUINA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
				
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
				.act{
					margin-top: 3em;
					padding: 1em;
					text-align: center;
					background: lightblue;
					border-radius: 2em;
					width: 13em;
				}
				.valida{
					background: green;
				}
				
	</style>
</head>



<body>
<div>
<form action="guardaModificado.php" method="get" name="id" target="mod">

<p>ID </p><input name="id_registro" type="text" value="<?=$id_registro;?>" disabled/>
<input name="id_registro" type="hidden" value="<?=$id_registro;?>"/>

<?php 

$enunciado=$_SESSION['datos'][$id_registro][0];
$respuesta_a=$_SESSION['datos'][$id_registro][1];
$respuesta_b=$_SESSION['datos'][$id_registro][2];
$respuesta_c=$_SESSION['datos'][$id_registro][3];
$respuesta_d=$_SESSION['datos'][$id_registro][4];
$valida=$_SESSION['datos'][$id_registro][5];
?>


<?php

	for ($i=0; $i < sizeof($_SESSION['titulos']); $i++) {
		

			print("<p>" . $_SESSION["titulos"][$i] . "</p>". '<input type=text name="'. $_SESSION['titulos'][$i].'" value="' . $_SESSION['datos'][$id_registro][$i] .'"/>');

		
	}
	


?>
	<br/><br/>
	<input class="act" name="request" type="submit" value="ACTUALIZA DATOS"/><br>
    <input class="act" type="button" value="Pagina inicio" id="inicio" onclick="window.location = 'index.php'">

</form>
<nav>


</nav>

</div>


<?php
function error_id_requerido() {
	echo "Lo siento, este script requiere un identificador de registro, y no se ha recibido uno valido";
	echo "<br/>Por metodo 'get':  "; print_r ($_GET);
	echo "<br/>Por metodo 'post':  "; print_r ($_POST);
	echo "<br/>Por variables de sesion:  "; print_r ($_SESSION);
	if (isset($_REQ)) {
		echo "<br/>Valores deducidos:"; 
		print_r ($_REQ);
	};
	exit;
}
?>





</body>
</html>
