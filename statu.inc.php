<?php
    Conexion::abrirConexion();

	// Obtener todos los empleados de la base de datos
	
    $statusOn = RepositorioStatu::obtenerTodosLosStatus(Conexion::obtenerConexion(), "Online");
    $statusOff = RepositorioStatu::obtenerTodosLosStatus(Conexion::obtenerConexion(), "Offline");

	Conexion::cerrarConexion(); 
?>
<div id="statu" class="contenidoPA">
    <div class="conNav">
        <div class="containerNav">
            <img src="img/iconos/interrogation.png" alt="Home">
            <h2>Statu</h2>
        </div>
    </div>
    <div class="contenidoPA">
        <p>Esta es una lista de los elementos de <b>Statu</b></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Online</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody id="onlineTable">
                <?php foreach ($statusOn as $statu) { ?>
                <tr data-codigo="<?php echo $statu->obtenerNombre(); ?>" onclick="obtenerCodigo(this, 'equipo')">
                    <td><p><?php echo $statu->obtenerStatu(); ?></p></td>
                    <td><?php echo $statu->obtenerNombre(); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <table border="1">
            <thead>
                <tr>
                    <th>Offline</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody id="offlineTable">
                <?php foreach ($statusOff as $statu) { ?>
                <tr data-codigo="<?php echo $statu->obtenerNombre(); ?>" onclick="obtenerCodigo(this, 'equipo')">
                    <td><p><?php echo $statu-> obtenerStatu(); ?></p></td>
                    <td><?php echo $statu->obtenerNombre(); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>