<?php

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$mensaje = "";

if (isset($_POST['nombre']) && isset($_POST['apellido'])) {
	//Se reciben datos nuevos para insertar
	
	$sql = "UPDATE usuarios SET NOMBRE_USUARIO = '{$_POST['nombre']}', APELLIDO_USUARIO = '{$_POST['apellido']}', FECHA_NACIMIENTO = '{$_POST['fecha']}' WHERE ID_USUARIO = {$_POST['id']}";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se modificó el usuario correctamente.";
	
}



if (isset($_GET['id'])) {
	//Se envió id para modificar
	$sql = "SELECT * FROM usuarios WHERE ID_USUARIO = ".$_GET['id'];
	
	$resultado = $bd->query($sql);
	$usuario = $resultado->fetch();
	
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
    <title>Modificar</title>
</head>

<!-- Cuerpo de la página -->
<body>
    <main>
    <div class="container">
		<h2>Modificar Usuario</h2>
		
		<p><?php echo $mensaje; ?></p>
		
		<form name="modificar" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input class="form-control" type="text" name="nombre" maxlength="500" value="<?php echo $usuario['NOMBRE_USUARIO']; ?>" required></td>
			</tr>
			<tr>
				<td>Apellido:</td>
				<td><input class="form-control" type="text" name="apellido" maxlength="500" value="<?php echo $usuario['APELLIDO_USUARIO']; ?>" required></td>
			</tr>
			<tr>
				<td>Fecha Nacimiento:</td>
				<td><input class="form-control" type="date" name="fecha" value="<?php echo $usuario['FECHA_NACIMIENTO']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input class="btn btn-primary btn-block" type="reset">
					<input class="btn btn-primary btn-block" type="submit">
					<button type="button" class="btn btn-primary btn-block" onclick="window.location.href='usuarios.php'">Volver</button>
				</td>
			</tr>
		</table>
		</form>
    </main>
    </div>
</body>
</html>