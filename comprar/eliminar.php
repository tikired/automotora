<?php
if (isset($_GET['id'])) {
	//Se envió un id para eliminar
	$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');
	
	$sql = "DELETE FROM vehiculos WHERE ID_VEHICULO = " . $_GET['id'];
	
	$bd->exec($sql);
	
	header('Location: vehiculo.php');
}
else {
	//No se envió id
	echo "Error!";
}

?>