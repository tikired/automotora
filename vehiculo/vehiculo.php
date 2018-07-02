<?php

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$sql = "SELECT Ve.ID_VEHICULO, CONCAT(Mv.MARCA_VEHICULO,' ',Mv.MODELO_VEHICULO) AS MARCA_VEHICULO FROM vehiculos Ve INNER JOIN marca_vehiculos Mv ON Ve.ID_MARCA_VEHICULO = Mv.ID_MARCA_VEHICULO";


$resultado = $bd->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
    <script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <title>Vehículos</title>
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
	      <a class="navbar-brand" href="vehiculo.php">MANTENEDOR DE VEHÍCULOS</a>
	    </div>
	<ul class="nav navbar-nav">
		<li><a href="../usuario/usuarios.php">Usuarios</a></li>
		<li><a href="../marca/marca.php">Marca de Vehículos</a></li> 
		<li><a class="active" href="vehiculo.php">Vehículos</a></li> 
		<li><a href="../comprar/comprar.php">Comprar</a></li>
		<li><a href="../patente/patente.php">Registro de Compras (Patentes)</a></li>   
	</ul>
	</div>
	</nav>
	<hr>
    <div class="container">
<main>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Id</th>
				    <th>Marca Vehículo</th> 
				    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
				<?php
				foreach($resultado as $fila) {
				?>
                <tr>
                    <td><?php echo $fila['ID_VEHICULO']; ?></td>
				    <td><?php echo $fila['MARCA_VEHICULO']; ?></td> 
                    <td>
						<a href="eliminar.php?id=<?php echo $fila['ID_VEHICULO']; ?>" onclick="javascript:return confirmar();">Eliminar</a>
                    </td>
                </tr>
				<?php
				}
				?>
            </tbody>
        </table>
        <hr>
            <button type="button" class="btn btn-primary btn-block" onclick="window.location.href='nuevo.php'">Nuevo vehículo</button>
    </main>
    </div>
</body>
</html>