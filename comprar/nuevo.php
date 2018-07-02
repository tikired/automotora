<?php

$mensajeAuto = "";

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$sql2 = "SELECT ID_MARCA_VEHICULO, CONCAT(MARCA_VEHICULO,' ',MODELO_VEHICULO) AS MARCA_VEHICULO FROM marca_vehiculos";

$resultadoMarcas = $bd->query($sql2);

if (isset($_POST['marca'])) {
	//Se reciben datos nuevos para insertar


	
	$sql = "INSERT INTO vehiculos(ID_MARCA_VEHICULO) VALUES ('{$_POST['marca']}')";

	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensajeAuto = "Se insertó el vehículo correctamente.";
	
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
		<h2>Ingresar Nuevo Vehículo</h2>
		
		<p><?php echo $mensajeAuto; ?></p>
		
		<form name="nuevo" method="post" action="">
		<table>
			<tr>
				<td>Marca:</td>
				<td>
				<select name="marca" class="form-control">
				<?php
				foreach($resultadoMarcas as $fila) {
				?>
					<option value="<?php echo $fila['ID_MARCA_VEHICULO']; ?>"><?php echo $fila['MARCA_VEHICULO']; ?></option>
				<?php
				}
				?>
				</select>
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