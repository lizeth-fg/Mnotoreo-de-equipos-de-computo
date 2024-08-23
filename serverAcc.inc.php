
<?php
    include_once 'autoload.inc.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $contentType = $_SERVER["CONTENT_TYPE"];

        if (strpos($contentType, "application/json") !== false) {
            $datosJSON = file_get_contents('php://input');
            $datos = json_decode($datosJSON, true);
        }

        Conexion::abrirConexion();
        if (isset($datos['accion'])) {
            if ($datos['accion'] == "eliminar") {
                    RepositorioEquipo::deleteEquipo(Conexion::obtenerConexion(), $datos['codigo']);
                    RepositorioStatu::deleteStatu(Conexion::obtenerConexion(), $datos['codigo']);

    
                echo 'Correcto';
            }
        }else if(isset($_POST['update']) || isset($_POST['nuevo']) ){
        
            $nEquipo = new Equipo($_POST['equipoIn'],
                                    $_POST['nombreIn'],
                                    $_POST['ipIn'],
                                    $_POST['macIn'],
                                    $_POST['marcaIn'],
                                    $_POST['numserieIn'],
                                    $_POST['numinvIn']);

            if(isset($_POST['update'])){
                RepositorioEquipo::updateEquipo(Conexion::obtenerConexion(), $nEquipo);
            }else{
                RepositorioEquipo::insertarEquipo(Conexion::obtenerConexion(), $nEquipo);

                $nStatu = new Statu("offline", $_POST['nombreIn']);
                RepositorioStatu::insertarStatu(Conexion::obtenerConexion(), $nStatu);
            }

        }
        Conexion::cerrarConexion();
    }else{
        echo 'Solicitud invalida.';
    }
?>