<?php

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$mensaje = "";

if (isset($_POST['marca']) && isset($_POST['modelo'])) {
	//Se reciben datos nuevos para insertar
	
	$sql = "UPDATE marca_vehiculos SET MARCA_VEHICULO = '{$_POST['marca']}', MODELO_VEHICULO = '{$_POST['modelo']}', PRECIO = '{$_POST['precio']}' WHERE ID_MARCA_VEHICULO = {$_POST['id']}";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se modificó la marca correctamente.";
	
}



if (isset($_GET['id'])) {
	//Se envió id para modificar
	$sql = "SELECT * FROM marca_vehiculos WHERE ID_MARCA_VEHICULO = ".$_GET['id'];
	
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
    <title>Marca de Vehículos</title>
</head>

<!-- Cuerpo de la página -->
<body>
    <main>
    <div class="container">
		<h2>Modificar Marca</h2>
		
		<p><?php echo $mensaje; ?></p>
		
		<form name="modificar" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<table>
			<tr>
				<td>Marca:</td>
				<td><input class="form-control" type="text" name="marca" maxlength="500" value="<?php echo $marca['MARCA_VEHICULO']; ?>" required></td>
			</tr>
			<tr>
				<td>Modelo:</td>
				<td><input class="form-control" type="text" name="modelo" maxlength="500" value="<?php echo $marca['MODELO_VEHICULO']; ?>" required></td>
			</tr>
			<tr>
				<td>Precio:</td>
				<td><input class="form-control" type="number" name="precio" min="1000" max="99999999" value="<?php echo $marca['PRECIO']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input class="btn btn-primary btn-block" type="reset">
					<input class="btn btn-primary btn-block" type="submit">
					<button type="button" class="btn btn-primary btn-block" onclick="window.location.href='marca.php'">Volver</button>
				</td>
			</tr>
		</table>
		</form>
    </main>
    </div>
</body>
</html>