<?php

$bd = new PDO('mysql:host=localhost;dbname=auto', 'root', '');

$sql = "SELECT * FROM marca_vehiculos";

$resultado = $bd->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
    	<script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <title>Marca Vehículos</title>
	<script>
		function confirmar() {
			var conf;
			conf = confirm("¿Está seguro que desea eliminar la marca del vehículo?");
			return conf;
		}
	</script>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
      <a class="navbar-brand" href="marca.php">MANTENEDOR DE MARCAS</a>
    </div>
<ul class="nav navbar-nav">
<li><a class="active" href="../usuario/usuarios.php">Usuarios</a></li>
<li><a href="marca.php">Marca de Vehículos</a></li> 
<li><a href="../vehiculo/vehiculo.php">Vehículos</a></li> 
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
				    <th>Modelo</th>
				    <th>Precio</th>
				    <th>Editar</th>
				    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
				<?php
				foreach($resultado as $fila) {
				?>
                <tr>
                    <td><?php echo $fila['ID_MARCA_VEHICULO']; ?></td>
				    <td><?php echo $fila['MARCA_VEHICULO']; ?></td> 
				    <td><?php echo $fila['MODELO_VEHICULO']; ?></td>
				    <td><?php echo $fila['PRECIO']; ?></td>
                    <td>
                        <a href="modificar.php?id=<?php echo $fila['ID_MARCA_VEHICULO']; ?>">Modificar</a>
                    </td>
                    <td>
						<a href="eliminar.php?id=<?php echo $fila['ID_MARCA_VEHICULO']; ?>" onclick="javascript:return confirmar();">Eliminar</a>
                    </td>
                </tr>
				<?php
				}
				?>
            </tbody>
        </table>
        <hr>
            <button type="button" class="btn btn-primary btn-block" onclick="window.location.href='nuevo.php'">Nueva Marca</button>
    </main>
    </div>
</body>
</html>