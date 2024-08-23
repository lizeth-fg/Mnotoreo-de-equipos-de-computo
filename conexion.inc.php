<?php

class Conexion {
	private static $conexion;

	public static function abrirConexion(){
		if(!isset($conexion)){
			try {
				$nombreServidor = 'localhost';
				$nombreUsuario = 'root';
				$password = '';
				$nombreDB = 'maquinas';
				
				self::$conexion = new PDO("mysql:host=$nombreServidor; dbname=$nombreDB", $nombreUsuario, $password);
				self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$conexion -> exec("SET CHARACTER SET utf8");

			} catch (PDOException $ex) {
				print "ERROR: " . $ex -> getMessage() . "<br>";
				die();
			}
		}
	}

	public static function cerrarConexion(){
		if (isset(self::$conexion)) {
			self::$conexion = null;
		}
	}

	public static function obtenerConexion(){
		return self::$conexion;
	}
}