<div class="containerNav">
    <img src="../img/iconos/ojo.png" alt="ojo">
    <h2>Ver</h2>
</div>
    <p>Estas viendo los datos de <b><?php echo $codigo ?></b> desde <b>Equipo</b>.</p>
    <div class="VerBox">
        <h2>Equipo:</h2>
        <p><?php echo $equipo->obtenerEquipo(); ?></p>
    </div>
    <div class="VerBox">
        <h2>Nombre:</h2>
        <p id="nombre"><?php echo $equipo->obtenerNombre(); ?></p>
    </div>
    <div class="VerBox">
        <h2>IP:</h2>
        <p><?php echo $equipo->obtenerIp(); ?></p>
    </div>
    <div class="VerBox">
        <h2>MAC:</h2>
        <p><?php echo $equipo->obtenerMac(); ?></p>
    </div>
    <div class="VerBox">
        <h2>Marca:</h2>
        <p><?php echo $equipo->obtenerMarca(); ?></p>
    </div>
    <div class="VerBox">
        <h2>Numero de Serie:</h2>
        <p><?php echo $equipo->obtenerNumeroSerie(); ?></p>
    </div>
    <div class="VerBox">
        <h2>Numero de Inventario:</h2>
        <p><?php echo $equipo->obtenerNumeroInventario(); ?></p>
    </div>
    <div class="VerBox">
        <h2>Statu:</h2>
        <p><?php echo $statu->obtenerStatu(); ?></p>
    </div>
