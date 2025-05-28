<?php

class conexion
{
	private $servidor = "localhost"; // NOMBRE SERVIDOR
	private $usuario = "root"; // USUARIO SERVIDOR
	private $clave = ""; // CONTRASEÑA SERVIDOR (SI LO REQUIERE)
	private $base = "acoemprendedores"; // NOMBRE DE BASE DE DATOS
	public $establecerconexion; // VARIABLE PUBLICA DE CONEXION*/
	// DATOS DE CONECTIVIDAD BD -> SISTEMA
	public function setServidor($obteniendoservidor)
	{
		$this->servidor = $obteniendoservidor;
	}
	public function getServidor()
	{
		return $this->servidor;
	}

	// CONECTAR SISTEMA Y COMPROBACION DE CONEXION
	public function conectar($bd)
	{
		$miconexion = new mysqli($this->servidor, $this->usuario, $this->clave, $bd,3306);
		if ($miconexion->connect_errno) {
			/*echo*/
			$mensaje = "Lo sentimos, ha ocurrido un error de conexion" . $miconexion->connect_error;
		} else {
			/*echo*/
			$mensaje = "Enhorabuena, conexion exitosa";
			$this->establecerconexion = $miconexion;
		}
		return $mensaje;
	}
	// INICIO DE SESION -> TODOS LOS USUARIOS
	public function IniciarSesionUsuarios($conectarsistema, $usuario, $contrasenia)
	{
		$resultado = mysqli_query($conectarsistema, "CALL IniciarSesion('$usuario','$contrasenia');");
		return $resultado;
	}
} // CIERRE CLASE CONEXION

// CONECTAR SISTEMA CON BASE DE DATOS {CONEXION PRINCIPAL TODO EL SISTEMA}
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema = $conectando->establecerconexion;
/*
	-> CONEXIONES AUXILIARES -> GESTIONES ESPECIFICAS Aco Emprendedores
	DISPONIBLES EN MULTIPLES CONSULTAS REALIZADAS EN UNA SOLA PAGINA
*/
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema1 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema2 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema3 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema4 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema5 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema6 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("acoemprendedores");
$conectarsistema7 = $conectando->establecerconexion;
