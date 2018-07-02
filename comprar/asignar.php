<?php

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$sql2 = "SELECT ID_USUARIO, CONCAT(NOMBRE_USUARIO,' ',APELLIDO_USUARIO) AS NOMBRE_USUARIO FROM usuarios";

$resultadoUsuarios = $bd->query($sql2);

$mensaje = "";

if (isset($_GET['id']) && isset($_POST['usuario']) && isset($_POST['patente'])) {

	$sql = "INSERT INTO patente (ID_VEHICULO, ID_USUARIO, PLACA_PATENTE) VALUES('".$_GET['id']."', '".$_POST['usuario']."',
	 '".$_POST['patente']."')";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se vendió el auto correctamente.";
	
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
		<h2>Comprar</h2>
		
		<p><?php echo $mensaje; ?></p>
		
		<form name="modificar" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<table>
			<tr>
				<td>Usuario:</td>
				<td>
				<select name="usuario" class="form-control">
				<?php
				foreach($resultadoUsuarios as $fila) {
				?>
					<option value="<?php echo $fila['ID_USUARIO']; ?>"><?php echo $fila['NOMBRE_USUARIO']; ?></option>
				<?php
				}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Patente:</td>
				<td><input class="form-control" type="text" name="patente" maxlength="500" required></td>
			</tr>
			<tr>
				<td colspan="2">
					<input class="btn btn-primary btn-block" type="reset">
					<input class="btn btn-primary btn-block" type="submit">
					<button type="button" class="btn btn-primary btn-block" onclick="window.location.href='comprar.php'">Volver</button>
				</td>
			</tr>
		</table>
		</form>
    </main>
    </div>
</body>
</html>