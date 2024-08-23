<?php
    Conexion::abrirConexion();

	// Obtener todos los empleados de la base de datos
	
    $agencias = RepositorioAgencia::obtenerTodosLasAgencias(Conexion::obtenerConexion());

	Conexion::cerrarConexion(); 
?>
<div id="agencia" class="contenidoPA ocultar">
    <div class="conNav">
        <div class="containerNav">
            <img src="img/iconos/building.png" alt="Home">
            <h2>Agencia</h2>
        </div>
        <div class="containerNav rowRe">
            <img src="img/iconos/verde/busqueda.png" id="botonBuscar" class="imgBoton" onclick="buscar('agenciaBus','agencia')" ;>
            <input type="text" class="barraBuscar" id="agenciaBus" placeholder="Escribe el nombre.">
        </div>
        <div class="containerNav">
            <div class="botonDiv" onclick="nuevo('agencia')">
                <img src="img/iconos/agregar.png" alt="Nuevo">
                <h2>Nuevo</h2>
            </div>
        </div>
    </div>
    <div class="contenidoPA">
        <p>Esta es una lista de los elementos de <b>Agencia</b></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Agencia</th>
                    <th>Zona</th>
                    <th>Nombre</th>
                    <th>Literal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agencias as $agencia) { ?>
                <tr data-codigo="<?php echo $agencia->obtenerNombre(); ?>" onclick="obtenerCodigo(this, 'agencia')">
                    <td><?php echo $agencia->obtenerAgencia(); ?></td>
                    <td><?php echo $agencia->obtenerZona(); ?></td>
                    <td><?php echo $agencia->obtenerNombre(); ?></td>
                    <td><?php echo $agencia->obtenerLiteral();?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>