<?php

class RepositorioAgencia{

	public static function obtenerTodosLasAgencias($conexion) {
    $agencias = array();

    if (isset($conexion)) {
        try {
            $sql = "SELECT * FROM agencia";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();

            while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $agencia = new Agencia(
                    $fila['agencia'],
                    $fila['nombre'],
                    $fila['zona'],
					$fila['literal'],
                );

                $agencias[] = $agencia;
            }
        } catch (PDOException $ex) {
            echo "Error en la consulta: " . $ex->getMessage();
        }
    }

    return $agencias;
}

	public static function obtenerNumeroAgencias($conexion){
		$totalEmpleados = null;

		if (isset($conexion)) {
			try {
				$sql = "SELECT COUNT(*) as total FROM agencia";	

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();

				$totalAgencias = $resultado['total'];	
			} catch (PDOException $ex) {
				print "ERROR: " . $ex -> getMessage();		
			}		
		}

		return $totalAgencias;
	}

	public static function insertarAgencia($conexion, $agencia){
		if (isset($conexion)) {
			try{

				$sql = "INSERT INTO agencia(agencia, nombre, zona, literal) VALUES(:agencia, :nombre, :zona,  :literal)";

				$sentencia = $conexion -> prepare($sql);

				$nombre = $agencia->obtenerNombre();
				$zona = $agencia->obtenerZona();
				$agenciat = $agencia->obtenerAgencia();
				$literal = $agencia->obtenerLiteral();
				
				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':zona', $zona, PDO::PARAM_STR);
				$sentencia->bindParam(':agencia', $agenciat, PDO::PARAM_STR);
				$sentencia->bindParam(':literal', $literal, PDO::PARAM_STR);
				
				$sentencia -> execute();
				return true;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}

	public static function obtenerAgenciaPorNombre($conexion, $agencia_nombre) {
	    $agencia = null;
	    if (isset($conexion) && !empty($agencia_nombre)) {
	        try {
	            $sql = "SELECT * FROM agencia WHERE nombre = :nombre";
	            $sentencia = $conexion->prepare($sql);
	            $sentencia->bindParam(':nombre', $agencia_nombre, PDO::PARAM_STR);
	            $sentencia->execute();

	            if ($sentencia->rowCount() > 0) {
	                $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
	                $agencia = new Agencia(
	                    $fila['agencia'],
	                    $fila['nombre'],
	                  	$fila['zona'],
	                    $fila['literal']
	                );
	            }
	        } catch (PDOException $ex) {
	            echo "Error en la consulta: " . $ex->getMessage();
	        }
	    }

	    return $agencia;
	}

	public static function updateAgencia($conexion, $agencia){
		$agenciaAc = false;

		if (isset($conexion)) {
			try{

				$sql = "UPDATE agencia SET zona = :zona, agencia = :agencia, literal = :literal WHERE nombre = :nombre";

				$sentencia = $conexion -> prepare($sql);

				$nombre = $agencia->obtenerNombre();
				$zona = $agencia->obtenerZona();
				$agenciat = $agencia->obtenerAgencia();
				$literal = $agencia->obtenerLiteral();

				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':zona', $zona, PDO::PARAM_STR);
				$sentencia->bindParam(':agencia', $agenciat, PDO::PARAM_STR);
				$sentencia->bindParam(':literal', $literal, PDO::PARAM_STR);

				$agenciaAc = $sentencia -> execute();
				return $agenciaAc;
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
	public static function deleteAgencia($conexion, $nombreAge){
		$agenciaEl = false;

		if (isset($conexion)) {
			try{

				$sql = "DELETE FROM agencia WHERE nombre = :nombre";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':nombre', $nombreAge, PDO::PARAM_STR);
				
				$empleadoel= $sentencia -> execute();
				
				return $empleadoel;
				
			}catch(PDOException $ex){
				print "ERROR: " . $ex -> getMessage();
			}
		}
	}
}