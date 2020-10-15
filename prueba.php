<?php 
session_start();
include('conectaBD.php');
?>


<?php
//declaracion de variables para usar menos comillas y que sea mas simple.

$modif="http://192.168.1.218/danielDR/modificar.php";

//establecer conexion con la BD poniendo los argumentos SERVIDOR DE BASE, EL USUARIO ROOT, CONTRASEÑA(EN CASO DE NO TENER SE POENEN "").
//or die: es en el caso de que falle la conexion.
$conexion = mysqli_connect( MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD ) or die ("No se ha podido conectar al servidor de Base de datos");

//seleccion de la BD con la variable de CONEXION y BD.
$db = mysqli_select_db( $conexion, MYSQL_DATABASENAME ) or die ( "No se ha podido conectar a la base de datos" );

//preparar la sentencia de buscar los datos.
$consulta = "SELECT id_enunciado, enunciado, respuesta_a, respuesta_b, respuesta_c, respuesta_d, valida FROM preguntas";

//obtengo en la variable RESULTADO  el resultado de la consulta (query) que requiere la CONEXION y la CONSULTA.
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");



?>


<?php

$i=1;
$j=0;
while ($columna = mysqli_fetch_array( $resultado ))
{
	$datop[$j] = [$columna['id_enunciado'],$columna['enunciado'],$columna['respuesta_a'],$columna['respuesta_b'],$columna['respuesta_c'],$columna['respuesta_d'],$columna['valida']];


	$i++;
	$j++;
	
	// $registro=[$columna['enunciado'],$columna['respuesta_a'],$columna['respuesta_b'],$columna['respuesta_c'],$columna['respuesta_d'],$columna['valida']];
	// $_SESSION["datos"][$columna['id_enunciado']] = $registro;
 	
}
leer();
crear($datop);




// $titulo=["enunciado","respuesta_a","respuesta_b","respuesta_c","respuesta_d","valida"];

// $_SESSION["titulos"]=$titulo;



function crear($dato){
$xml = new DomDocument('1.0', 'UTF-8');
 
    $tabla = $xml->createElement('table');
    $tabla->setAttribute('name' , 'preguntas');
    $tabla = $xml->appendChild($tabla);

 
    

	for ($i=0; $i < sizeof($dato) ; $i++) { 
		# code...
		$id_enunciado=$dato[$i][0];
		$enunciado = $dato[$i][1];
		$respuesta_a = $dato[$i][2];
		$respuesta_b = $dato[$i][3];
		$respuesta_c = $dato[$i][4];
		$respuesta_d = $dato[$i][5];
		$valida = $dato[$i][6];

		$row = $xml->createElement('row');
    	$row = $tabla->appendChild($row);

		$id_enunciado = $xml->createElement('data', $id_enunciado);
	    $id_enunciado->setAttribute('name' , 'id_enunciado');
	    $id_enunciado = $row->appendChild($id_enunciado);	

	    $enunciado = $xml->createElement('data', $enunciado);
	    $enunciado->setAttribute('name' , 'enunciado');
	    $enunciado = $row->appendChild($enunciado);

	    $respuesta_a = $xml->createElement('data', $respuesta_a);
	    $respuesta_a->setAttribute('name' , 'respuesta_a');
	    $respuesta_a = $row->appendChild($respuesta_a);

	    $respuesta_b = $xml->createElement('data', $respuesta_b);
	    $respuesta_b->setAttribute('name' , 'respuesta_b');
	    $respuesta_b = $row->appendChild($respuesta_b);

	    $respuesta_c = $xml->createElement('data', $respuesta_c);
	    $respuesta_c->setAttribute('name' , 'respuesta_c');
	    $respuesta_c = $row->appendChild($respuesta_c);

	    $respuesta_d = $xml->createElement('data', $respuesta_d);
	    $respuesta_d->setAttribute('name' , 'respuesta_d');
	    $respuesta_d = $row->appendChild($respuesta_d);

	    $valida = $xml->createElement('data', $valida);
	    $valida->setAttribute('name' , 'valida');
	    $valida = $row->appendChild($valida);


	}

 
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('crearxml.xml');
  
   	
 
    //Mostramos el XML puro
    // echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
    //      htmlentities($el_xml)
}
function leer(){
	  if (file_exists('crearxml.xml')) {
    	# code...
    	$xml=simplexml_load_file('crearxml.xml');
    	print_r($xml);
    }
}



?>





<?php
//se cierra la conexion de la tabla para no probocar fallos
mysqli_close($conexion);

?>


