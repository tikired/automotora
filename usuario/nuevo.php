<?php

$mensaje = "";

if (isset($_POST['nombre'])) {
	//Se reciben datos nuevos para insertar
	$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');
	
	$sql = "INSERT INTO usuarios(NOMBRE_USUARIO, APELLIDO_USUARIO, FECHA_NACIMIENTO) VALUES ('{$_POST['nombre']}', '{$_POST['apellido']}', '{$_POST['fecha']}')";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se insertó el nuevo usuario correctamente.";
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
        <script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <title>Usuarios</title>
</head>

<!-- Cuerpo de la página -->
<body>  
    <main>
    <div class="container">
		<h2>Ingresar Nuevo Usuario</h2>
		
		<p><?php echo $mensaje; ?></p>  
		<form name="nuevo" method="post" action="">
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input class="form-control" type="text" name="nombre" maxlength="500" required></td>
			</tr>
			<tr>
				<td>Apellido:</td>
				<td><input class="form-control" type="text" name="apellido" maxlength="500" required></td>
			</tr>
			<tr>
			<tr>
				<td>Fecha de Nacimiento:</td>
				<td><input class="form-control" type="date" name="fecha" required></td>
			</tr>  
			<br />
			<tr>
				<td colspan="2">
					<input type="reset" class="btn btn-primary btn-block">
					<input type="submit" class="btn btn-primary btn-block">
					<button type="button" class="btn btn-primary btn-block" onclick="window.location.href='usuarios.php'">Volver</button>
				</td>
			</tr>
		</form>
    </main>
    </div>
</body>
</html>