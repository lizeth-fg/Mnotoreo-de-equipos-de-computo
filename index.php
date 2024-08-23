<?php
	include_once 'app/autoload.inc.php';
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<link rel="icon" type="image/x-icon" href="favicon.jpg">
	<link rel="stylesheet" type="text/css" href="css/g_estilos.css">
	<link rel="stylesheet" type="text/css" href="css/elementos_g.css">
	<link rel="stylesheet" type="text/css" href="css/animations.css">
</head>
<body>
	<div class="nav sombra">
		<img id="icono" src="favicon.jpg">
	</div>
	<div class="content">
		<div id="menu">
			<h2>Menu</h2>
			<div id="reB" class="menuSel">
				<img src="img/iconos/home.png">
				<p>Resumen</p>			
			</div>
			<div id="eqB">
				<img src="img/iconos/computer.png">
				<p>Equipos</p>			
			</div>
		</div>
		<div id="contenido"> <!-- area del contenido -->
			<?php
				include_once "partes/resumen.inc.php";
				include_once "partes/equipo.inc.php";
			?>
		</div>
	</div>
	<script type="text/javascript" src="js/acciones.js"></script>
	<script type="text/javascript">
		function obtenerCodigo(fila, tipo) {
       		const codigo = fila.getAttribute('data-codigo');
        	window.location.href = 'Mostrar/?codigo=' + codigo + '&tipo=' + tipo;
    	}
    	function buscar(id , tipo) {
    		codigo = document.getElementById(id).value;
    		if (codigo.length) {
        		window.location.href = 'Mostrar/?codigo=' + codigo + '&tipo=' + tipo;
        	}
    	}
		function nuevo(tipo) {
        	window.location.href = 'Nuevo/?tipo=' + tipo;
    	}
	</script>
</body>
</html>