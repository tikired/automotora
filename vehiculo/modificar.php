<?php

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$mensaje = "";

if (isset($_POST['patente'])) {
	//Se reciben datos nuevos para insertar
	
	$sql = "UPDATE vehiculos SET ID_MARCA_VEHICULO = '{$_POST['vehiculo']}', PATENTE = '{$_POST['patente']}' WHERE ID_VEHICULO = {$_POST['id']}";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se modificó el vehiculo correctamente.";
	
}



if (isset($_GET['id'])) {
	//Se envió id para modificar
	$sql = "SELECT * FROM vehiculos WHERE ID_VEHICULO = ".$_GET['id'];
	
	$resultado = $bd->query($sql);
	$marca = $resultado->fetch();
	
}
else {
	//No se envió id
	die("Error!");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    	<script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <title>Vehículos</title>
</head>

<!-- Cuerpo de la página -->
<body>
    <main>
    <div class="container">
		<h2>Modificar Vehículo</h2>
		
		<p><?php echo $mensaje; ?></p>
		
		<form name="modificar" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<table>
			<tr>
				<td>ID Marca:</td>
				<td><input class="form-control" type="text" name="vehiculo" maxlength="500" value="<?php echo $marca['ID_MARCA_VEHICULO']; ?>" required></td>
			</tr>
			<tr>
				<td>Patente:</td>
				<td><input class="form-control" type="text" name="patente" maxlength="500" value="<?php echo $marca['PATENTE']; ?>" required></td>
			</tr>
			<tr>
				<td colspan="2">
					<input class="btn btn-primary btn-block" type="reset">
					<input class="btn btn-primary btn-block" type="submit">
					<button type="button" class="btn btn-primary btn-block" onclick="window.location.href='vehiculo.php'">Volver</button>
				</td>
			</tr>
		</table>
		</form>
    </main>
    </div>
</body>
</html>