<div class="containerNav">
    <img src="../img/iconos/lapiz.png" alt="ojo">
    <h2>Editar</h2>
</div>

<form id="miFormulario" enctype="multipart/form-data" method="post">
    <p>Estas por editar los datos de <b><?php echo $codigo ?></b> desde <b>Equipo</b>.</p>
    <div class="VerBox">
        <h2>Equipo:</h2>
        <input type="text" id="equipoIn" name="equipoIn" value="<?php echo $equipo->obtenerEquipo(); ?>"></input>
    </div>
    <div class="VerBox opa05">
        <h2>Nombre:</h2>
        <input type="text" id="nombreIn" name="nombreIn" value="<?php echo $equipo->obtenerNombre(); ?>" readonly></input>
        <i>Este ya no puede cambiarse, ya que funciona como ID.</i>
    </div>
    <div class="VerBox">
        <h2>IP:</h2>
        <input type="text" id="ipIn" name="ipIn" value="<?php echo $equipo->obtenerIp(); ?>"></input>
    </div>
    <div class="VerBox">
        <h2>MAC:</h2>
        <input type="text" id="macIn" name="macIn" value="<?php echo $equipo->obtenerMac(); ?>"></input>
    </div>
    <div class="VerBox">
        <h2>Marca:</h2>
        <input type="text" id="marcaIn" name="marcaIn" value="<?php echo $equipo->obtenerMarca(); ?>"></input>
    </div>
    <div class="VerBox">
        <h2>Numero de Serie:</h2>
        <input type="text" id="numserieIn" name="numserieIn" value="<?php echo $equipo->obtenerNumeroSerie(); ?>"></input>
    </div>
    <div class="VerBox">
        <h2>Numero de Inventario:</h2>
        <input type="text" id="numinvIn" name="numinvIn" value="<?php echo $equipo->obtenerNumeroInventario(); ?>"></input>
    </div>
    <div class="EnviarCon">
        <center><input class="botonDiv" type="submit" id="registrar" name="registrar" value="Guardar"></center>
    </div>
</form>

