<?php
    Conexion::abrirConexion();

	// Obtener todos los empleados de la base de datos
	
    $equipos = RepositorioEquipo::obtenerTodosLosEquipos(Conexion::obtenerConexion());

	Conexion::cerrarConexion(); 
?>
<div id="equipo" class="contenidoPA ocultar">
    <div class="conNav">
        <div class="containerNav">
            <img src="img/iconos/computer.png" alt="Home">
            <h2>Equipo</h2>
        </div>
        <div class="containerNav rowRe">
            <img src="img/iconos/verde/busqueda.png" id="botonBuscar" class="imgBoton" onclick="buscar('equipoBus', 'equipo')" ;>
            <input type="text" class="barraBuscar" id="equipoBus" placeholder="Escribe el nombre.">
        </div>
        <div class="containerNav">
            <div class="botonDiv" onclick="nuevo('equipo')">
                <img src="img/iconos/agregar.png" alt="Nuevo">
                <h2>Nuevo</h2>
            </div>
        </div>
    </div>
    <div class="contenidoPA">
        <p>Esta es una lista de los elementos de <b>Equipo</b></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Equipo</th>
                    <th>Nombre</th>
                    <th>Ip</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo) { ?>
                <tr data-codigo="<?php echo $equipo->obtenerNombre(); ?>" onclick="obtenerCodigo(this, 'equipo')">
                    <td><?php echo $equipo->obtenerEquipo(); ?></td>
                    <td><?php echo $equipo->obtenerNombre(); ?></td>
                    <td><?php echo $equipo->obtenerIp();?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    include_once "partes/statu.inc.php";
    ?>
</div>