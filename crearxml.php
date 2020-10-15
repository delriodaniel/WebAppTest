
<?php
include('conectaBD.php');
//declaracion de variables para usar menos comillas y que sea mas simple.


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

<?php
//creo una tabla  mediante echo y sus etiquetas
echo '<TABLA name="preguntas">';
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
	// '<tr onclick="'. "document.getElementById('requested_id').value=". $columna["id_enunciado"]. "; document.getElementById('mod_form').submit();" . '">'
		echo  '<ROW><DATA name="enunciado">'.$columna['enunciado'].'</DATA><DATA name="respuesta_a">' . $columna['respuesta_a'] . '</DATA><DATA name="respuesta_b">' . $columna['respuesta_b'] . '</DATA><DATA name="respuesta_c">' . $columna['respuesta_c'] . '</DATA><DATA name="respuesta_d">' . $columna['respuesta_d'] . '</DATA><DATA name="id_enunciado">' . $columna['id_enunciado'] .'</DATA>'. '</DATA>';
	echo '</ROW>';
	
	$registro=[$columna['enunciado'],$columna['respuesta_a'],$columna['respuesta_b'],$columna['respuesta_c'],$columna['respuesta_d'],$columna['valida']];
	$_SESSION["datos"][$columna['id_enunciado']] = $registro;


	
}	
$titulo=["enunciado","respuesta_a","respuesta_b","respuesta_c","respuesta_d","valida"];

$_SESSION["titulos"]=$titulo;


echo "</TABLA>";

?>

<?php
//se cierra la conexion de la tabla para no probocar fallos
mysqli_close($conexion);

?>
<!-- 
$objetoXML = new XMLWriter();
 
	// Estructura básica del XML
	$objetoXML->openURI("obras.xml");
	$objetoXML->setIndent(true);
	$objetoXML->setIndentString("\t");
	$objetoXML->startDocument('1.0', 'utf-8');
	// Inicio del nodo raíz
	$objetoXML->startElement("obras");
 
	foreach ($matrizDeObras as $obra){
		$objetoXML->startElement("obra"); // Se inicia un elemento para cada obra.
		// Atributo de la fecha de inicio del elemento obra
		$objetoXML->writeAttribute("inicio", $obra["fecha_de_inicio"]);
		// Atributo de la fecha de final del elemento obra
		$objetoXML->writeAttribute("final", $obra["fecha_de_finalizacion"]);
		// Atributo contratista del elemento obra
		$objetoXML->writeAttribute("contratista", $obra["contratista"]);
		// Atributo presupuesto del elemento obra.
		$objetoXML->writeAttribute("presupuesto", $obra["presupuesto"]);
		// Texto del nombre de la obra, dentro del elemento obra
		$objetoXML->text("\n\t\t".$obra["obra"]."\n");
		// Inicio del elemento anidado del personal técnico
		$objetoXML->startElement("personal_tecnico");
		// Atributo del número de miembros del personal técnico.
		$objetoXML->writeAttribute("miembros", $obra["miembros_tecnicos"]);
		// Para cada miembro del personal técnico se crea un elemento.
		foreach ($obra["personal_tecnico"] as $keyMiembro=>$miembro){
			$objetoXML->startElement("miembro");
			// El cargo es un atributo del elmento del miembro técnico.
			$objetoXML->writeAttribute("cargo", $keyMiembro);
			// El nombre del miembro es el contenido del elemento del miembro técnico
			$objetoXML->text($miembro);
			$objetoXML->endElement();// Finaliza cada elelmento del miembro técnico.
		}
		$objetoXML->endElement(); // Final del elemento que cubre todos los miembros técnicos.
		$objetoXML->fullEndElement (); // Final del elemento "obra" que cubre cada obra de la matriz.
	}
	$objetoXML->endElement(); // Final del nodo raíz, "obras"
	$objetoXML->endDocument(); // Final del documento
 -->