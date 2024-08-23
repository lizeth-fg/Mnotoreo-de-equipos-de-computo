<?php

class RepositorioEquipo{

	public static function obtenerTodosLosEquipos($conexion) {
    $equipos = array();

    if (isset($conexion)) {
        try {
            $sql = "SELECT * FROM equipo";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();

            while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $equipo = new Equipo(
                    $fila['equipo'],
                    $fila['nombre'],
                    $fila['ip'],
					$fila['mac'],
					$fila['marca'],
                    $fila['num_serie'],
                    $fila['num_inventario']
                );
				RepositorioStatu::updateStatu($conexion, $fila['nombre'], $fila['ip']);
                $equipos[] = $equipo;
            }
        } catch (PDOException $ex) {
            echo "Error en la consulta: " . $ex->getMessage();
        }
    }

    return $equipos;
}

	public static function obtenerNumeroEquipos($conexion){
		$totalEquipos = null;

		if (isset($conexion)) {
			try {
				$sql = "SELECT COUNT(*) as total FROM equipo";	

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();

				$totalEquipos = $resultado['total'];	
			} catch (PDOException $ex) {
				print "ERROR: " . $ex -> getMessage();		
			}		
		}

		return $totalEquipos;
	}

	public static function insertarEquipo($conexion, $equipo){
		if (isset($conexion)) {
			try{

				$sql = "INSERT INTO equipo(equipo, nombre, ip, mac, marca, num_serie, num_inventario) 
				VALUES(:equipo, :nombre, :ip,  :mac, :marca, :num_serie, :num_inventario)";

				$sentencia = $conexion -> prepare($sql);

				$equipot = $equipo->obtenerEquipo();
				$nombre = $equipo->obtenerNombre();
				$ip = $equipo->obtenerIp();
				$mac = $equipo->obtenerMac();
				$marca = $equipo->obtenerMarca();
				$num_serie = $equipo->obtenerNumeroSerie();
				$num_inventario = $equipo->obtenerNumeroInventario();
				
				$sentencia->bindParam(':equipo', $equipot, PDO::PARAM_STR);
				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':ip', $ip, PDO::PARAM_STR);
				$sentencia->bindParam(':mac', $mac, PDO::PARAM_STR);
				$sentencia->bindParam(':marca', $marca, PDO::PARAM_STR);
				$sentencia->bindParam(':num_serie', $num_serie, PDO::PARAM_STR);
				$sentencia->bindParam(':num_inventario', $num_inventario, PDO::PARAM_STR);
				
				$sentencia -> execute();
				return true;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}

	public static function obtenerEquipoPorNombre($conexion, $equipo_nombre) {
	    $equipo = null;
	    if (isset($conexion) && !empty($equipo_nombre)) {
	        try {
	            $sql = "SELECT * FROM equipo WHERE nombre = :nombre";
	            $sentencia = $conexion->prepare($sql);
	            $sentencia->bindParam(':nombre', $equipo_nombre, PDO::PARAM_STR);
	            $sentencia->execute();

	            if ($sentencia->rowCount() > 0) {
	                $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
	                $equipo = new Equipo(
						$fila['equipo'],
						$fila['nombre'],
						$fila['ip'],
						$fila['mac'],
						$fila['marca'],
						$fila['num_serie'],
						$fila['num_inventario']
					);
	
	            }
	        } catch (PDOException $ex) {
	            echo "Error en la consulta: " . $ex->getMessage();
	        }
	    }

	    return $equipo;
	}

	public static function updateEquipo($conexion, $equipo){
		$equipoAc = false;

		if (isset($conexion)) {
			try{

				$sql = "UPDATE equipo SET equipo = :equipo, nombre = :nombre, ip= :ip,
				 mac = :mac, marca = :marca, num_serie = :num_serie, num_inventario = :num_inventario WHERE nombre=:nombre";

				$sentencia = $conexion -> prepare($sql);

				$equipot = $equipo->obtenerEquipo();
				$nombre = $equipo->obtenerNombre();
				$ip = $equipo->obtenerIp();
				$mac = $equipo->obtenerMac();
				$marca = $equipo->obtenerMarca();
				$num_serie = $equipo->obtenerNumeroSerie();
				$num_inventario = $equipo->obtenerNumeroInventario();
				
				$sentencia->bindParam(':equipo', $equipot, PDO::PARAM_STR);
				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':ip', $ip, PDO::PARAM_STR);
				$sentencia->bindParam(':mac', $mac, PDO::PARAM_STR);
				$sentencia->bindParam(':marca', $marca, PDO::PARAM_STR);
				$sentencia->bindParam(':num_serie', $num_serie, PDO::PARAM_STR);
				$sentencia->bindParam(':num_inventario', $num_inventario, PDO::PARAM_STR);

				$equipoAc= $sentencia -> execute();
				return true;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
	public static function deleteEquipo($conexion, $nombreEqu){
		$equipoEl = false;

		if (isset($conexion)) {
			try{

				$sql = "DELETE FROM equipo WHERE nombre = :nombre";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':nombre', $nombreEqu, PDO::PARAM_STR);
				
				$equipoEl= $sentencia -> execute();
				
				return $equipoEl;
				
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
}