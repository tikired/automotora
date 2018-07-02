<?php

$where = "";

if (isset($_GET['precio']) && $_GET['precio'] > 0) {
	$where = "WHERE PRECIO <= ".$_GET['precio'];
}

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$sql = "SELECT 
			CONCAT(Mv.MARCA_VEHICULO,' ',Mv.MODELO_VEHICULO) AS MARCA_VEHICULO,
			CONCAT(Us.NOMBRE_USUARIO,' ',Us.APELLIDO_USUARIO) AS NOMBRE_USUARIO,
			PLACA_PATENTE,
			Mv.PRECIO
		FROM patente Pa 
		INNER JOIN vehiculos Ve 
			ON Ve.ID_VEHICULO = Pa.ID_VEHICULO
		INNER JOIN marca_vehiculos Mv
			ON Ve.ID_MARCA_VEHICULO = Mv.ID_MARCA_VEHICULO
		INNER JOIN usuarios Us 
			ON Us.ID_USUARIO = Pa.ID_USUARIO ".$where;


$resultado = $bd->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
    <script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <title>Registro</title>
	<script>
		function confirmar() {
			var conf;
			conf = confirm("¿Está seguro que desea eliminar el vehículo?");
			return conf;
		}
	</script>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
	      <a class="navbar-brand" href="vehiculo.php">REGISTRO</a>
	    </div>
	<ul class="nav navbar-nav">
		<li><a href="../usuario/usuarios.php">Usuarios</a></li>
		<li><a href="../marca/marca.php">Marca de Vehículos</a></li> 
		<li><a href="../vehiculo/vehiculo.php">Vehículos</a></li> 
		<li><a href="../comprar/comprar.php">Comprar</a></li> 
		<li><a class="active" href="patente.php">Registro de Compras (Patentes)</a></li> 
	</ul>
	</div>
	</nav>
	<hr>
    <div class="container">
<main>
	<form name="nuevo" method="get" action="">
		<table class="table" style="width: 450px;">
		<tr>
			<td>Precio Máximo: </td>
			<td><input class="form-control" type="number" name="precio" min="1000" max="999999999" value="<?php echo $marca['PRECIO']; ?>"></td>
			<td><input class="btn btn-primary btn-block" type="submit" value="Filtrar"></td>
			</tr>
		</table>
	</form>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Vehículo</th>
				    <th>Usuario</th> 
				    <th>Patente</th>
				    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
				<?php
				foreach($resultado as $fila) {
				?>
                <tr>
                    <td><?php echo $fila['MARCA_VEHICULO']; ?></td>
				    <td><?php echo $fila['NOMBRE_USUARIO']; ?></td>
				    <td><?php echo $fila['PLACA_PATENTE']; ?></td> 
				    <td><?php echo $fila['PRECIO']; ?></td> 
                </tr>
				<?php
				}
				?>
            </tbody>
        </table>
    </main>
    </div>
</body>
</html>