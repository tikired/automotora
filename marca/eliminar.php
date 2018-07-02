<?php
if (isset($_GET['id'])) {
	//Se envió un id para eliminar
	$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');
	
	$sql = "DELETE FROM marca_vehiculos WHERE ID_MARCA_VEHICULO = " . $_GET['id'];
	
	$bd->exec($sql);
	
	header('Location: marca.php');
}
else {
	//No se envió id
	echo "Error!";
}

?>