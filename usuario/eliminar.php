<?php
if (isset($_GET['id'])) {
	//Se envió un id para eliminar
	$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');
	
	$sql = "DELETE FROM usuarios WHERE ID_USUARIO = " . $_GET['id'];
	
	$bd->exec($sql);
	
	header('Location: usuarios.php');
}
else {
	//No se envió id
	echo "Error!";
}

?>