<div class="containerNav">
    <img src="../img/iconos/agregar.png" alt="nuevo">
    <h2>Nuevo</h2>
</div>

<form id="miFormulario" enctype="multipart/form-data" method="post">
    <p>Crearas un nuevo elemento para <b>Equipo</b>.</p>
    <div class="VerBox">
        <h2>Equipo:</h2>
        <input type="text" id="equipoIn" name="equipoIn" required></input>
    </div>
    <div class="VerBox">
        <h2>Nombre:</h2>
        <input type="text" id="nombreIn" name="nombreIn" required></input>
        <i>Este ya no puede cambiarse despues, ya que funciona como ID.</i>
    </div>
    <div class="VerBox">
        <h2>IP:</h2>
        <input type="text" id="ipIn" name="ipIn" required></input>
    </div>
    <div class="VerBox">
        <h2>MAC:</h2>
        <input type="text" id="macIn" name="macIn" required></input>
    </div>
    <div class="VerBox">
        <h2>Marca:</h2>
        <input type="text" id="marcaIn" name="marcaIn" required></input>
    </div>
    <div class="VerBox">
        <h2>Numero de Serie:</h2>
        <input type="text" id="numserieIn" name="numserieIn" required></input>
    </div>
    <div class="VerBox">
        <h2>Numero de Inventario:</h2>
        <input type="text" id="numinvIn" name="numinvIn" required></input>
    </div>
    <div class="EnviarCon">
        <center><input class="botonDiv" type="submit" id="registrar" name="registrar" value="Guardar"></center>
    </div>
</form>

