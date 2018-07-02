<?php

$mensajeMarca = "";

if (isset($_POST['marca'])) {
	//Se reciben datos nuevos para insertar
	$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');
	
	$sql = "INSERT INTO marca_vehiculos(MARCA_VEHICULO, MODELO_VEHICULO, PRECIO) VALUES ('{$_POST['marca']}', '{$_POST['modelo']}', '{$_POST['precio']}')";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensajeMarca = "Se insertó la nueva marca correctamente.";
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    	<script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <title>Marcas</title>
</head>

<!-- Cuerpo de la página -->
<body>
    <main>
    <div class="container">
		<h2>Ingresar Nueva Marca</h2>
		
		<p><?php echo $mensajeMarca; ?></p>
		
		<form name="nuevo" method="post" action="">
		<table>
			<tr>
				<td>Marca:</td>
				<td><input class="form-control" type="text" name="marca" maxlength="500" required></td>
			</tr>
			<tr>
				<td>Modelo:</td>
				<td><input class="form-control" type="text" name="modelo" maxlength="500" required></td>
			</tr>
			<tr>
			<tr>
				<td>Precio:</td>
				<td><input class="form-control" type="number" name="precio" min="1000" max="99999999" required></td>
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