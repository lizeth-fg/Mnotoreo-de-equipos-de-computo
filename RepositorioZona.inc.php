<?php

class RepositorioZona{
	public static function obtenerTodosLasZonas($conexion) {
		$zonas = array();
	
		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM zona";
				$sentencia = $conexion->prepare($sql);
				$sentencia->execute();
	
				while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
					$zona = new Zona(
						$fila['zona'],
						$fila['nombre_zona'],
						$fila['Nomenclatura']
					);
	
					$zonas[] = $zona;
				}
			} catch (PDOException $ex) {
				echo "Error en la consulta: " . $ex->getMessage();
			}
		}
	
		return $zonas;
	}
	
		public static function obtenerNumeroZonas($conexion){
			$totalZonas = null;
	
			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM zona";	
	
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
	
					$totalZonas = $resultado['total'];	
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();		
				}		
			}
	
			return $totalZonas;
		}
	public static function insertarZona($conexion, $zona){
		if (isset($conexion)) {
			try{

				$sql = "INSERT INTO zona(zona, nombre_zona, Nomenclatura) VALUES(:zona, :nombre_zona, :nomenclatura)";

				$sentencia = $conexion -> prepare($sql);

				$zonat = $zona->obtenerZona();
				$nombrez = $zona->obtenerNombreZona();
				$nomclatura = $zona->obtenerNomenclatura();
				
				$sentencia->bindParam(':nombre_zona', $nombrez, PDO::PARAM_STR);
				$sentencia->bindParam(':zona', $zonat, PDO::PARAM_STR);
				$sentencia->bindParam(':nomenclatura', $nomclatura, PDO::PARAM_STR);
				
				$sentencia -> execute();
				return true;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}

	public static function obtenerZonaPorNombre($conexion, $nombre) {
	    $zona = null;
	    if (isset($conexion) && !empty($nombre)) {
	        try {
	            $sql = "SELECT * FROM zona WHERE nombre_zona = :nombre";
	            $sentencia = $conexion->prepare($sql);
	            $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
	            $sentencia->execute();

	            if ($sentencia->rowCount() > 0) {
	                $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
	                $zona = new Zona(
	                    $fila['zona'],
	                    $fila['nombre_zona'],
	                    $fila['Nomenclatura']
	                );
	            }
	        } catch (PDOException $ex) {
	            echo "Error en la consulta: " . $ex->getMessage();
	        }
	    }

	    return $zona;
	}

	public static function updateZona($conexion, $zona){
		$ZonaAc = false;

		if (isset($conexion)) {
			try{

				$sql = "UPDATE zona SET zona = :zona, nombre_zona = :nombre_zona, Nomenclatura = :nomenclatura WHERE nombre_zona =:nobre_zona";

				$sentencia = $conexion -> prepare($sql);

				$nombre = $zona->obtenerNombreZona();
				$zonat = $zona->obtenerZona();
				$nomen = $zona->obtenerNomenclatura();

				
				$sentencia->bindParam(':nombre_zona', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':zona', $zonat, PDO::PARAM_STR);
				$sentencia->bindParam(':nomenclatura', $nomen, PDO::PARAM_STR);

				$ZonaAc= $sentencia -> execute();
				return true;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
	public static function deleteZona($conexion, $nombre){
		$zonaEl = false;

		if (isset($conexion)) {
			try{

				$sql = "DELETE FROM zona WHERE nombre_zona = :nombre";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				
				$empleadoel= $sentencia -> execute();
				
				return $zonaEl;
				
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
}