<?php
    Conexion::abrirConexion();

	// Obtener todos los empleados de la base de datos
	
    $zonas = RepositorioZona::obtenerTodosLasZonas(Conexion::obtenerConexion());

	Conexion::cerrarConexion();
?>
<div id="zona" class="contenidoPA ocultar">
    <div class="conNav">
        <div class="containerNav">
            <img src="img/iconos/marker.png" alt="Home">
            <h2>Zonas</h2>
        </div>
        <div class="containerNav rowRe">
            <img src="img/iconos/verde/busqueda.png" id="botonBuscar" class="imgBoton" onclick="buscar('zonaBus','zona')" ;>
            <input type="text" class="barraBuscar" id="zonaBus" placeholder="Escribe el nombre.">
        </div>
        <div class="containerNav">
            <div class="botonDiv" onclick="nuevo('zona')">
                <img src="img/iconos/agregar.png" alt="Nuevo">
                <h2>Nuevo</h2>
            </div>
        </div>
    </div>
    <div class="contenidoPA">
        <p>Esta es una lista de los elementos de <b>Zonas</b></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Zona</th>
                    <th>Nombre de Zona</th>
                    <th>Nomenclatura</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zonas as $zona) { ?>
                <tr data-codigo="<?php echo $zona->obtenerNombreZona(); ?>" onclick="obtenerCodigo(this,'zona')">
                    <td><?php echo $zona->obtenerZona(); ?></td>
                    <td><?php echo $zona->obtenerNombreZona(); ?></td>
                    <td><?php echo $zona->obtenerNomenclatura(); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>