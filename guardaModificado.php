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
	  			background: #6E90FF;
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
	  			/*background: url(imagenes/fondotabla.jpg);
	  			background-size: cover;
	  			background-repeat: no-repeat;
	  			background-attachment : fixed;
	  			background-position : center;*/
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
	  		.fondoModal{
	      		position: fixed;
	     		 	top: 0;
	  		    left: 0;
	  		    width: 100vw;
	  		    height: 100vh;
	  		    display: none;
	  		    background: rgba(0,0,0,0.6);
	  		}
	  		.contenedorModal{
	  		    width: 100vw;
	  		    height: 100vh;
	  		    display: flex;
	  		    justify-content: center;
	  		    align-items: center;
	  		}
	  		.contenidoModal{
	  		    display: none;
	  		    position: relative;
	  		    flex-basis: 50%;
	  		    padding: 1.5em;
	  		    background: rgba(102,206,255); ;
	  		    color: black;
	  		    border-radius: 15px;
	  		}
	  		#cerrarModal{
	  		    position: absolute;
	  		    right: 20px;
	  		    top: 20px;
	  		    cursor: pointer;
	  		    color: white;
	  		    background: #6B6B6C;
	  		}
	  		
      	}
      </style>
</head>
<body>

	
</body>
</html>



<?php
//analisis de los datos
echo "Estos son los parametros recibidos";
foreach($_GET as $campo=>$valor) {

	echo "<br/>" . $campo . " = " . $valor;

}




$id_registro=$_GET['id_registro'];
$enunciado=$_GET['enunciado'];
$respuesta_a=$_GET['respuesta_a'];
$respuesta_b=$_GET['respuesta_b'];
$respuesta_c=$_GET['respuesta_c'];
$respuesta_d=$_GET['respuesta_d'];
$valida=$_GET['valida'];


$sql = "UPDATE preguntas SET enunciado='".$enunciado."', respuesta_a='".$respuesta_a."', respuesta_b='".$respuesta_b."', respuesta_c='".$respuesta_c."', respuesta_d='".$respuesta_d."', valida='".$valida."' WHERE id_enunciado='".$id_registro."'";








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
	
	if (mysqli_stmt_execute ( $link )){

		echo "<br/>Registro '" . $id_registro . "' modificado";
		echo "<br/><a href=" . '"listaPreguntas.php"' . ' target="listaPreguntas"' . ">Ver lista actual de preguntas</a>";//regreso a la pagina de tablas
		
		
		
	} else {
	echo "<br/>Enlace invalido. No se modifico el registro";
	}
}

mysqli_close($enlace);
?>