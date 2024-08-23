<?php

class RepositorioStatu{

	public static function obtenerTodosLosStatus($conexion, $estado) {
		$status = array();
	
		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM statu WHERE statu = :statu";

				
				$sentencia = $conexion->prepare($sql);

				$sentencia->bindParam(':statu', $estado, PDO::PARAM_STR);

				$sentencia->execute();
	
				while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
					$statu = new Statu(
						$fila['statu'],
						$fila['nombre']
					);
	
					$status[] = $statu;
				}
			} catch (PDOException $ex) {
				echo "Error en la consulta: " . $ex->getMessage();
			}
		}
	
		return $status;
	}
	public static function insertarStatu($conexion, $statu){
		if (isset($conexion)) {
			try{

				$sql = "INSERT INTO statu(statu, nombre) VALUES(:statu, :nombre)";

				$sentencia = $conexion -> prepare($sql);

				$nombre = $statu->obtenerNombre();
				$statut = $statu->obtenerStatu();
				
				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':statu', $statut, PDO::PARAM_STR);
				
				$sentencia -> execute();
				return true;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}

	public static function obtenerStatuPorNombre($conexion, $nombre) {
	    $statu = null;
	    if (isset($conexion) && !empty($nombre)) {
	        try {
	            $sql = "SELECT * FROM statu WHERE nombre = :nombre";
	            $sentencia = $conexion->prepare($sql);
	            $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
	            $sentencia->execute();

	            if ($sentencia->rowCount() > 0) {
	                $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
	                $statu = new Statu(
	                    $fila['statu'],
	                    $fila['nombre']
	                );
	            }
	        } catch (PDOException $ex) {
	            echo "Error en la consulta: " . $ex->getMessage();
	        }
	    }

	    return $statu;
	}

	public static function updateStatu($conexion, $nombrestatu, $ip_addr){
		$StatuAc = false;
		$estado = "offline";

		if ((new CheckDevice())->ping($ip_addr))
			$estado = "online";
		else 
			$estado = "offline";
		

		if (isset($conexion)) {
			try{

				$sql = "UPDATE statu SET statu= :statu WHERE nombre=:nombre";

				$sentencia = $conexion -> prepare($sql);

				$nombre = $nombrestatu;
				$statut = $estado;
				
				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':statu', $statut, PDO::PARAM_STR);

				$sentencia -> execute();
				return $estado;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
	public static function deleteStatu($conexion, $nombre){
		$statuEl = false;

		if (isset($conexion)) {
			try{
				$sql = "DELETE FROM statu WHERE nombre = :nombre";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				
				$empleadoel= $sentencia -> execute();
				
				return $statuEl;
				
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
}