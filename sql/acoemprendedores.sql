-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: May 28, 2025 at 04:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acoemprendedores`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActivarCuentasAhorroRegistradasClientes` (IN `_idcuentas` INT)   UPDATE cuentas SET estadocuenta="activa" WHERE idcuentas=_idcuentas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActivarProductosCashManHa` (IN `_idproducto` INT)   UPDATE productos SET estado="activo" WHERE idproducto=_idproducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionDatosCuenta_InicioSesionUsuariosPrimeraVez` (IN `_idusuarios` INT, IN `_codigousuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_nuevousuario` CHAR(2))   UPDATE usuarios SET codigousuario = _codigousuario, contrasenia=_contrasenia, nuevousuario=_nuevousuario WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionDatosNuevasSolicitudesCreditos_PrimeraRevision` (IN `_idcreditos` INT, IN `_tipocliente` VARCHAR(50), IN `_montocredito` DECIMAL(9,2), IN `_interescredito` FLOAT, IN `_plazocredito` INT, IN `_cuotamensual` DECIMAL(9,2), IN `_salariocliente` DECIMAL(9,2), IN `_saldocredito` DECIMAL(9,2), IN `_estado` VARCHAR(30), IN `_observacion_gerencia` VARCHAR(1500), IN `_progreso_solicitud` TINYINT(4), IN `_fecha_ultimarevision` TIMESTAMP, IN `_usuario_gestionando` VARCHAR(255))   UPDATE creditos SET tipocliente=_tipocliente, montocredito=_montocredito, interescredito=_interescredito, plazocredito=_plazocredito, cuotamensual=_cuotamensual, salariocliente=_salariocliente, saldocredito = _saldocredito, observacion_gerencia=_observacion_gerencia, estado=_estado, progreso_solicitud=_progreso_solicitud, fecha_ultimarevision=_fecha_ultimarevision, usuario_gestionando=_usuario_gestionando WHERE idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionRevisionFinalPresidencia_SolicitudCreditoClientes` (IN `_idcreditos` INT, IN `_estado` VARCHAR(30), IN `_observacion_presidencia` VARCHAR(1500), IN `_progreso_solicitud` TINYINT(4), IN `_fecha_ultimarevision` TIMESTAMP, IN `_usuario_gestionando` VARCHAR(255))   UPDATE creditos SET estado=_estado, observacion_presidencia=_observacion_presidencia, progreso_solicitud=_progreso_solicitud, fecha_ultimarevision=_fecha_ultimarevision, usuario_gestionando=_usuario_gestionando WHERE idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionSaldoCreditosClientes_ReestructuracionSolicitudes` (IN `idcreditos` INT, IN `_saldocredito` DECIMAL(9,2))   UPDATE creditos SET saldocredito=_saldocredito WHERE idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionTicketsReportesFallosPlataforma` (IN `_idreporte` INT, IN `_estado` VARCHAR(50), IN `_comentarioactualizacion` VARCHAR(3000), IN `_empleado_gestion` VARCHAR(255))   UPDATE reporteproblemasplataforma SET estado=_estado, comentarioactualizacion=_comentarioactualizacion, empleado_gestion=_empleado_gestion WHERE idreporte=_idreporte$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasAdministradoresConFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_codigousuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_fotoperfil` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasAdministradoresSinFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_codigousuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasClientesConFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_fotoperfil` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasClientesSinFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasGerenciaConFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_fotoperfil` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasGerenciaSinFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasPresidenciaConFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_codigousuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_fotoperfil` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasPresidenciaSinFoto` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_codigousuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDetallesUsuarios` (IN `_idusuarios` INT, IN `_dui` VARCHAR(10), IN `_nit` VARCHAR(17), IN `_telefono` VARCHAR(9), IN `_celular` VARCHAR(9), IN `_telefonotrabajo` VARCHAR(9), IN `_direccion` VARCHAR(255), IN `_empresa` VARCHAR(255), IN `_cargo` VARCHAR(255), IN `_direcciontrabajo` VARCHAR(255), IN `_fechanacimiento` DATE, IN `_genero` CHAR(1), IN `_estadocivil` VARCHAR(30))   UPDATE detalleusuarios SET dui=_dui, nit=_nit, telefono=_telefono, celular=_celular, telefonotrabajo=_telefonotrabajo, direccion=_direccion, empresa=_empresa, cargo=_cargo, direcciontrabajo=_direcciontrabajo, fechanacimiento=_fechanacimiento, genero=_genero, estadocivil=_estadocivil WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AnularDepositosTransaccionesCuentasClientes` (IN `_idtransaccioncuentas` INT)   UPDATE transaccionescuentasclientes SET estadotransaccion="AnularDeposito" WHERE idtransaccioncuentas=_idtransaccioncuentas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AnularRetirosTransaccionesCuentasClientes` (IN `_idtransaccioncuentas` INT)   UPDATE transaccionescuentasclientes SET estadotransaccion="AnularRetiro" WHERE idtransaccioncuentas=_idtransaccioncuentas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BloquearCuentasAhorroRegistradasClientes` (IN `_idcuentas` INT)   UPDATE cuentas SET estadocuenta="bloqueada" WHERE idcuentas=_idcuentas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BloquearUsuarios_Clientes` (IN `_idusuarios` INT)   UPDATE usuarios SET estado_usuario="bloqueado" WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CambioContraseniaRecuperacion` (IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255))   UPDATE usuarios SET contrasenia=_contrasenia WHERE correo=_correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CambioEstadoCodigoSeguridad` ()   UPDATE vista_calculoexpiracion_codigocambiocredencialesusuarios SET estado="vencido" WHERE minutos_expiracion>6 AND estado="usado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CambioEstadoToken` (IN `_correo` VARCHAR(255), IN `_token` VARCHAR(255), IN `_codigo` INT, IN `_estado` VARCHAR(15))   UPDATE recuperacion SET estado="usado" WHERE correo=_correo AND token=_token AND codigo=_codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CerrarCuentasAhorroRegistradasClientes` (IN `_idcuentas` INT)   UPDATE cuentas SET estadocuenta="cerrada" WHERE idcuentas=_idcuentas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ComprobacionRegistroNuevasSolicitudesCrediticias_Clientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultardisponibilidadnuevoscreditosclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompletaRolesDeUsuariosRegistrados` ()   SELECT * FROM vista_rolesdeusuarioscompleto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompleta_CuotasGeneradasClientes_CreditosActivos` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompleta_CuotasGeneradasClientes_CreditosCancelados` (IN `_idusuarios` INT, IN `_idcreditos` INT)   SELECT * FROM vista_consultacuotashistoricocreditosclientes WHERE idusuarios=_idusuarios AND idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompleta_ReportesFallosPlataforma` ()   SELECT * FROM vista_consultareportesfallosplataforma ORDER BY fecharegistroreporte ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaConfirmacionIngresoReferenciasPersonalesClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultanuevo_prestamopersonal_asignado_clientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCuotasVencidasClientes` (IN `_idcuotas` INT)   SELECT DATEDIFF(CURDATE() , (select MAX(fechavencimiento)
                             from cuotas 
                             where idcuotas = _idcuotas))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosClientes_NuevasCuentasAhorrosDepositoPlazoFijo` ()   SELECT * FROM vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosClientes_TransferenciasCuentasAhorros` (IN `_numerocuenta` INT)   SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas WHERE numerocuenta=_numerocuenta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosGenerales_InicioPlataformaAdministradores` ()   SELECT * FROM vista_consulta_datosgeneralesresultadosinicioadmins$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosGenerales_InicioPlataformaGerencia` ()   SELECT * FROM vista_detalleinterfazgerencia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosGenerales_InicioPlataformaPresidencia` ()   SELECT * FROM vista_consultadetallesinterfazpresidencia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosSolicitudCrediticiaClientes_Historicos` (IN `_idusuarios` INT, IN `_idcreditos` INT)   SELECT * FROM vista_datosgeneralescreditoscanceladoshistoricoclientes  WHERE idusuarios=_idusuarios AND idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosVehiculos_PrestamosdeVehiculosClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultadatosprestamosdevehiculosclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDetalleCompletoTransacciones_PagoCuotasCreditosEmpleados` (IN `_empleado_gestion` VARCHAR(255))   SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE empleado_gestion=_empleado_gestion ORDER BY fecha DESC LIMIT 200$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDetalleComprobanteDepositoCuentasAhorroClientes` (IN `_idtransaccioncuentas` INT, IN `_idusuarios` INT)   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE  idtransaccioncuentas=_idtransaccioncuentas AND idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDetalleComprobanteDepositoCuentasAhorroClientes_P1` (IN `_idusuarios` INT)   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDisponibilidadCodigoUnicoProductos` (IN `_codigo` VARCHAR(255))   SELECT * FROM productos WHERE codigo=_codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDisponibilidadUsuariosUnicos` (IN `_codigousuario` VARCHAR(255))   SELECT * FROM usuarios WHERE codigousuario=_codigousuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaCuotasClientes_OrdenPagoSistemaPagos` (IN `_idusuarios` INT, IN `_idcuotas` INT)   SELECT * FROM vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios AND idcuotas=_idcuotas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaDatosCuentasAhorroClientesCashmanha` (IN `_idusuarios` INT)   SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaRolesDeUsuarios` (IN `_idrol` INT)   SELECT * from vista_rolesdeusuarioscompleto WHERE idrol=_idrol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaSolicitudesCreditosAprobadas_EnCurso` (IN `_idusuarios` INT)   SELECT * FROM vista_consultadetallessolicitudescreditosaprobadosclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaSolicitudesReestructuracionCreditosClientes` (IN `_usuario_empleado` VARCHAR(255))   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="reestructuracion" AND usuario_empleado=_usuario_empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaTransaccionesCuentasClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultadetallecompletotransaccionescuentasclientes WHERE idusuarios=_idusuarios ORDER BY fecha DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecifica_ReportesFallosPlataforma` (IN `_idreporte` INT)   SELECT * FROM vista_consultareportesfallosplataforma WHERE idreporte=_idreporte$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralCompletaUsuarios` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacompletausuariosdetalles WHERE completoperfil="si" AND idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralListadoClientesNuevosCreditos` ()   SELECT * FROM vista_consulta_asignarnuevoscreditosclientes WHERE completoperfil="si"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralProductosRegistrados` (IN `_idproducto` INT)   SELECT * FROM vista_productoscashmanha WHERE idproducto=_idproducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralReestructuracionCreditosClientes` ()   SELECT * FROM vista_consultageneralreestructuracioncreditosclientes WHERE cuotas_generadas="no" AND estado="reestructuracion"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralSolicitudesCreditosDenegadasClientes` ()   SELECT * FROM vista_consultageneralreestructuracioncreditosclientes WHERE cuotas_generadas="no" AND estado="denegado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralTransaccionesCuentasClientesAnuladas` ()   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE estadotransaccion="AnularDeposito" OR estadotransaccion="AnularRetiro" ORDER BY fecha DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralTransaccionesCuentasClientesProcesadas` ()   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE estadotransaccion="Procesada" ORDER BY fecha DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralUsuariosBloqueados` ()   SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="bloqueado" AND completoperfil="si"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralUsuariosInactivos` ()   SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="inactivo" AND completoperfil="si"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralUsuariosRegistrados` ()   SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="activo" AND completoperfil="si"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGestionadorCuotasMensualesContratos_CreditosAprobados` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="aprobado" OR estado="cancelado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaIdUnicoCreditos_ProductosClientes` (IN `_idusuarios` INT)   SELECT idcreditos, idproducto, nombreproducto, progreso_solicitud FROM vista_consultanuevo_prestamopersonal_asignado_clientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaListadoCuentasAhorrosRegistradas` ()   SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas ORDER BY nombres ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaListadoGeneralCreditosAprobados_EnCurso` ()   SELECT * FROM vista_consultadetallessolicitudescreditosaprobadosclientes WHERE estado="aprobado" OR estado="cancelado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaListadoGeneralCuotasClientesMorosos` ()   SELECT * FROM vista_consultaclientesmorosos WHERE dias_incumplimiento>0 AND estadocuota="pendiente" ORDER BY dias_incumplimiento DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaMensajesBandejaEntradaUsuariosCashmanHa` (IN `_idusuariosdestinatario` INT)   SELECT * FROM vista_bandejaentradamensajescashmanha WHERE idusuariosdestinatario=_idusuariosdestinatario AND ocultarmensaje="no" ORDER BY fechamensaje DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNombresCompletos_EnviarMensajeriaNuevaUsuariosCashManHa` ()   SELECT idusuarios, nombres, apellidos, codigousuario FROM usuarios ORDER BY nombres ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNotificacionesRecortada_BarraHerramientasPlataforma` (IN `_idusuarios` INT)   SELECT titulonotificacion,descripcionnotificacion,fechanotificacion,clasificacionnotificacion FROM vista_notificacionesrecibidasusuarios WHERE idusuarios=_idusuarios AND ocultarnotificacion="no" ORDER BY fechanotificacion DESC LIMIT 25$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNuevasAsignacioneCreditosClientes_PrimeraRevision` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="en proceso"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNuevasAsignacioneCreditosClientes_SegundaRevision` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="aprobacioninicial"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarAvanceCreditosClientes_InterfazInicioClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacalculoavancecreditos_interfazclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarConfiguracionCuentaUsuarios` (IN `_idusuarios` INT)   SELECT * FROM vista_configuracionusuariosgeneral WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCopiaContratoCreditos_Clientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacopiascontrato_suscritocreditosclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCorreoRecuperacion` (IN `_correo` VARCHAR(255))   SELECT * FROM usuarios WHERE correo=_correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDatosClientes_CreditosCanceladosFiniquitoCancelacion` (IN `_idusuarios` INT, IN `_idhistorico` INT)   SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" AND idusuarios=_idusuarios AND idhistorico=_idhistorico$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetallesMensajesBandejaEntradaUsuariosCashmanHa` (IN `_idusuariosdestinatario` INT, IN `_idmensajeria` INT)   SELECT * FROM vista_bandejaentradamensajescashmanha WHERE idusuariosdestinatario=_idusuariosdestinatario AND idmensajeria=_idmensajeria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDisponibilidadNumeroCuentaAhorroClientes` (IN `_numerocuenta` INT)   SELECT * FROM cuentas WHERE numerocuenta=_numerocuenta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaReestructuracionesCreditosNuevasSolicitudesClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="reestructuracion"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEstadoSolicitudCrediticia_BienvenidaPortalClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultaestadosolicitudcredito_portalclientesbienvenida WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarExistenciaCuentaAhorros_SistemaTransferenciasClientes` (IN `_numerocuenta` INT)   SELECT * FROM cuentas WHERE numerocuenta=_numerocuenta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarExistenciasReferenciasClientesCreditos` (IN `_idusuarios` INT)   SELECT * FROM vista_consultaexistenciareferenciasclientes WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarListadoCreditosClientesCancelados` ()   SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarListadoCreditosClientesCanceladosPortalClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" AND idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMisTransaccionesProcesadasClientes_Especifica` (IN `_idusuarios` INT)   SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE idusuarios=_idusuarios ORDER BY fecha DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarNotificacionesRecibidasUsuarios` (IN `_idusuarios` INT)   SELECT * FROM vista_notificacionesrecibidasusuarios WHERE idusuarios=_idusuarios AND ocultarnotificacion="no" ORDER BY fechanotificacion DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarNumeroUsuarios` ()   SELECT * FROM vista_configuracionusuariosgeneral$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPerfilUsuarios` (IN `_idusuarios` INT)   SELECT * FROM vista_detallesusuarios WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosCashManHARegistrados_Activos` ()   SELECT * FROM vista_productoscashmanha WHERE estado="activo"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosCashManHARegistrados_Expirados` ()   SELECT * FROM vista_productoscashmanha WHERE estado="expirado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosCashManHARegistrados_Inactivos` ()   SELECT * FROM vista_productoscashmanha WHERE estado="inactivo"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosDisponibles_NuevosCreditos` ()   SELECT * FROM vista_consultaproductosnuevoscreditos WHERE estado="activo"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTransaccionesProcesadasClientes_General` ()   SELECT * FROM vista_consultatransaccionesclientesgeneral ORDER BY fecha DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTransaccionesProcesadasClientes_PortalInicioClientes` (IN `_idusuarios` INT)   SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE idusuarios=_idusuarios ORDER BY fecha DESC LIMIT 51$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTransaccionesProcesadasClientes_UltimasTransacciones` ()   SELECT * FROM vista_consultatransaccionesclientesgeneral ORDER BY fecha DESC LIMIT 200$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUltimoIdTransaccion_CuentasClientes` ()   SELECT idtransaccioncuentas, idusuarios FROM vista_consultatransaccionescuentasclientes ORDER BY fecha DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaSolicitudesCreditosAprobadas` ()   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="aprobado" AND cuotas_generadas="no"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaSolicitudesCreditosProcesadas_EmpleadosAtencionClientes` (IN `_usuario_empleado` VARCHAR(255))   SELECT * FROM vista_contadorcreditosgestionados_empleadosatencionclientes WHERE usuario_empleado=_usuario_empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaTotalIngresosTransaccionesCreditos_EmpleadosAtencion` (IN `_empleado_gestion` VARCHAR(255))   SELECT * FROM vista_calculoingresostransacciones_empleadosatencionclientes WHERE empleado_gestion=_empleado_gestion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaTransacciones_PagosCreditosClientes` (IN `_idusuarios` INT, IN `_idcuotas` INT)   SELECT * FROM vista_transaccionespagocuotascreditosclientes WHERE idusuarios=_idusuarios AND idcuotas=_idcuotas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosGestorNuevosCreditos` (IN `_idusuarios` INT)   SELECT * FROM vista_consulta_asignarnuevoscreditosclientes WHERE idusuarios=_idusuarios AND completoperfil="si"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosIngresoNuevasSolicitudesCreditos` ()   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="en proceso"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosIngresoNuevasSolicitudesCreditosUltimaRevision` ()   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="aprobacioninicial"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosPerfilIncompleto` (IN `_quienregistro` VARCHAR(255))   SELECT * FROM vista_usuariosperfilincompleto WHERE completoperfil="no" AND estado_usuario="activo" AND quienregistro=_quienregistro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ContadorTransaccionesProcesadas_EmpleadosAtencionClientes` (IN `_empleado_gestion` VARCHAR(255))   SELECT * FROM vista_contadortransacciones_empleadosatencionclientes WHERE empleado_gestion=_empleado_gestion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConteoCuotasCanceladasClientes` (IN `_idusuarios` INT)   SELECT idusuarios,estadocuota from vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios AND estadocuota="cancelado"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DesactivarProductosCashmanHa` (IN `_idproducto` INT)   UPDATE productos SET estado="inactivo" WHERE idproducto=_idproducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DesactivarUsuarios_Clientes` (IN `_idusuarios` INT)   UPDATE usuarios SET estado_usuario="inactivo" WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarRolesUsuarios` (IN `_idrol` INT)   DELETE FROM roles WHERE idrol=_idrol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarSolicitudesCrediticiasCanceladas_Clientes` (IN `_idcreditos` INT)   DELETE FROM creditos WHERE idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EnvioHistoricoSolicitudesCreditos` (IN `_idcreditos` INT)   DELETE FROM creditos WHERE idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Evaluar_IncumplimientosPagosCuotasClientes` (IN `__idcuotas` INT)   UPDATE cuotas SET estadocuota="SI" WHERE idcuotas=_idcuotas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ExpirarProductosCashmanHa` (IN `_idproducto` INT)   UPDATE productos SET estado="expirado" WHERE idproducto=_idproducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IngresoSolicitudNuevosPrestamosClientes_NuevasAsignaciones` (IN `_idusuarios` INT, IN `_idproducto` INT, IN `_tipocliente` VARCHAR(50), IN `_montocredito` DECIMAL(9,2), IN `_interescredito` FLOAT, IN `_plazocredito` INT, IN `_cuotamensual` DECIMAL(9,2), IN `_fechasolicitud` DATE, IN `_salariocliente` DECIMAL(9,2), IN `_saldocredito` DECIMAL(9,2), IN `_observaciones` VARCHAR(1500), IN `_usuario_empleado` VARCHAR(255))   INSERT INTO creditos (idusuarios,idproducto,tipocliente,montocredito,interescredito,plazocredito,cuotamensual,fechasolicitud,salariocliente,saldocredito,observaciones,usuario_empleado) VALUES (_idusuarios,_idproducto,_tipocliente,_montocredito,_interescredito,_plazocredito,_cuotamensual,_fechasolicitud,_salariocliente,_saldocredito,_observaciones,_usuario_empleado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IniciarSesion` (IN `Usuario` VARCHAR(255), IN `Pass` VARCHAR(255))   BEGIN
SELECT * FROM usuarios WHERE (codigousuario=Usuario OR correo=Usuario) AND contrasenia=Pass AND estado_usuario="activo";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarConfiguracionCuentaUsuarios_Administradores` (IN `_idusuarios` INT, IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_codigousuario` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_idrol` INT, IN `_estado_usuario` VARCHAR(25))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, correo=_correo, idrol=_idrol, estado_usuario=_estado_usuario WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarDetallesUsuarios_Clientes` (IN `_idusuarios` INT, IN `_dui` VARCHAR(10), IN `_nit` VARCHAR(17), IN `_telefono` VARCHAR(9), IN `_celular` VARCHAR(9), IN `_telefonotrabajo` VARCHAR(9), IN `_direccion` VARCHAR(255), IN `_empresa` VARCHAR(255), IN `_cargo` VARCHAR(255), IN `_direcciontrabajo` VARCHAR(255), IN `_fechanacimiento` DATE, IN `_genero` CHAR(1), IN `_estadocivil` VARCHAR(30), IN `_fotoduifrontal` VARCHAR(255), IN `_fotoduireverso` VARCHAR(255), IN `_fotonit` VARCHAR(255), IN `_fotofirma` VARCHAR(255))   UPDATE detalleusuarios SET dui=_dui,nit=_nit,telefono=_telefono,celular=_celular,telefonotrabajo=_telefonotrabajo,direccion=_direccion,empresa=_empresa,cargo=_cargo,direcciontrabajo=_direcciontrabajo,fechanacimiento=_fechanacimiento,genero=_genero,estadocivil=_estadocivil,fotoduifrontal=_fotoduifrontal,fotoduireverso=_fotoduireverso,fotonit=_fotonit,fotofirma=_fotofirma WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarProductosRegistradosCashManHa` (IN `_idproducto` INT, IN `_codigo` VARCHAR(255), IN `_nombreproducto` VARCHAR(255), IN `_descripcionproducto` VARCHAR(255), IN `_requisitosproductos` VARCHAR(1000), IN `_estado` VARCHAR(15))   UPDATE productos SET codigo=_codigo, nombreproducto=_nombreproducto, descripcionproducto=_descripcionproducto, requisitosproductos=_requisitosproductos, estado=_estado WHERE idproducto=_idproducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarReferenciasPersonalesLaboralesClientes` (IN `_idreferencias` INT, IN `_idcreditos` INT, IN `_idproducto` INT, IN `_nombres_referencia1` VARCHAR(255), IN `_apellidos_referencia1` VARCHAR(255), IN `_empresa_referencia1` VARCHAR(255), IN `_profesion_oficioreferencia1` VARCHAR(255), IN `_telefono_referencia1` VARCHAR(9), IN `_nombres_referencia2` VARCHAR(255), IN `_apellidos_referencia2` VARCHAR(255), IN `_empresa_referencia2` VARCHAR(255), IN `_profesion_oficioreferencia2` VARCHAR(255), IN `_telefono_referencia2` VARCHAR(255))   UPDATE referenciaspersonales SET idcreditos=_idcreditos, idproducto=_idproducto, nombres_referencia1=_nombres_referencia1, apellidos_referencia1=_apellidos_referencia1, empresa_referencia1=_empresa_referencia1, profesion_oficioreferencia1=_profesion_oficioreferencia1, telefono_referencia1=_telefono_referencia1, nombres_referencia2=_nombres_referencia2, apellidos_referencia2=_apellidos_referencia2, empresa_referencia2=_empresa_referencia2,profesion_oficioreferencia2=_profesion_oficioreferencia2, telefono_referencia2=_telefono_referencia2 WHERE idreferencias=_idreferencias$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarRolesUsuarios` (IN `_idrol` INT, IN `_nombrerol` VARCHAR(75), IN `_descripcionrol` VARCHAR(255))   UPDATE roles SET nombrerol=_nombrerol, descripcionrol=_descripcionrol WHERE idrol=_idrol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarDetallesDatosClientes_FacturacionCreditosCashManHa` (IN `_idcuotas` INT, IN `_idusuarios` INT)   SELECT * FROM vista_detallesfacturacioncreditosclientes WHERE idcuotas=_idcuotas AND idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarDetallesDatosClientes_FacturacionCreditosHistoricos` (IN `_idhistoricotransaccion` INT, IN `_idusuarios` INT, IN `_idcreditos` INT, IN `_idcuotas` INT)   SELECT * FROM vista_detallesfacturacioncreditosclienteshistoricos WHERE idhistoricotransaccion=_idhistoricotransaccion AND idusuarios=_idusuarios AND idcreditos=_idcreditos AND idcuotas=_idcuotas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `OcultarMensajesRecibidos_MensajeriaInternaUsuariosCashManHa` (IN `_idmensajeria` INT)   UPDATE mensajeria SET ocultarmensaje="si" WHERE idmensajeria=_idmensajeria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `OcultarNotificacionesRecibidasUsuarios` (IN `_idnotificacion` INT)   UPDATE notificaciones SET ocultarnotificacion="si" WHERE idnotificacion=_idnotificacion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ReactivarUsuarios_Clientes` (IN `_idusuarios` INT)   UPDATE usuarios SET estado_usuario="activo" WHERE idusuarios=_idusuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ReestablecerContrasenias` (IN `_correo` VARCHAR(255), IN `_token` VARCHAR(255), IN `_codigo` INT)   BEGIN
INSERT INTO recuperacion (correo,token,codigo) VALUES (_correo,_token,_codigo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarAccesosUsuarios` (IN `_dispositivo` VARCHAR(255), IN `_sistemaoperativo` VARCHAR(255), IN `_idusuarios` INT)   INSERT INTO accesos (dispositivo,sistemaoperativo,idusuarios) VALUES (_dispositivo,_sistemaoperativo,_idusuarios)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCuotasMensualesHistoricoCreditosClientes` (IN `_idcreditos` INT, IN `_idproducto` INT, IN `_idusuarios` INT, IN `_montocancelar` DECIMAL(9,2), IN `_nombreproducto` VARCHAR(255), IN `_montocapital` DECIMAL(9,2), IN `_fechavencimiento` DATE)   INSERT INTO historicocuotascreditos (idcreditos,idproducto,idusuarios,montocancelar,nombreproducto,montocapital,fechavencimiento) VALUES (_idcreditos,_idproducto,_idusuarios,_montocancelar,_nombreproducto,_montocapital,_fechavencimiento)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCuotasMensualesNuevosCreditosClientes` (IN `_idcreditos` INT, IN `_idproducto` INT, IN `_idusuarios` INT, IN `_montocancelar` DECIMAL(9,2), IN `_nombreproducto` VARCHAR(255), IN `_montocapital` DECIMAL(9,2), IN `_fechavencimiento` DATE)   INSERT INTO cuotas (idcreditos,idproducto,idusuarios,montocancelar,nombreproducto,montocapital,fechavencimiento) VALUES (_idcreditos,_idproducto,_idusuarios,_montocancelar,_nombreproducto,_montocapital,_fechavencimiento)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarDetallesUsuarios_Clientes` (IN `_dui` VARCHAR(10), IN `_nit` VARCHAR(17), IN `_telefono` VARCHAR(9), IN `_celular` VARCHAR(9), IN `_telefonotrabajo` VARCHAR(9), IN `_direccion` VARCHAR(255), IN `_empresa` VARCHAR(255), IN `_cargo` VARCHAR(255), IN `_direcciontrabajo` VARCHAR(255), IN `_fechanacimiento` DATE, IN `_genero` CHAR(1), IN `_estadocivil` VARCHAR(30), IN `_fotoduifrontal` VARCHAR(255), IN `_fotoduireverso` VARCHAR(255), IN `_fotonit` VARCHAR(255), IN `_fotofirma` VARCHAR(255), IN `_idusuarios` INT)   INSERT INTO detalleusuarios (dui,nit,telefono,celular,telefonotrabajo,direccion,empresa,cargo,direcciontrabajo,fechanacimiento,genero,estadocivil,fotoduifrontal,fotoduireverso,fotonit,fotofirma,idusuarios) VALUES (_dui,_nit,_telefono,_celular,_telefonotrabajo,_direccion,_empresa,_cargo,_direcciontrabajo,_fechanacimiento,_genero,_estadocivil,_fotoduifrontal,_fotoduireverso,_fotonit,_fotofirma,_idusuarios)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarNuevosClientesAdministradores` (IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_codigousuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_idrol` INT, IN `_quienregistro` VARCHAR(255))   INSERT INTO usuarios (nombres,apellidos,codigousuario,contrasenia,correo,idrol,quienregistro) VALUES (_nombres,_apellidos,_codigousuario,_contrasenia,_correo,_idrol,_quienregistro)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarNuevosProductosCashManHa` (IN `_codigo` VARCHAR(255), IN `_nombreproducto` VARCHAR(255), IN `_descripcionproducto` VARCHAR(255), IN `_requisitosproductos` VARCHAR(1000), IN `_estado` VARCHAR(15))   INSERT INTO productos (codigo,nombreproducto,descripcionproducto,requisitosproductos,estado) VALUES (_codigo,_nombreproducto,_descripcionproducto,_requisitosproductos,_estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarSolicitudesCreditosClientesHistorico_Cancelados` (IN `_idusuarios` INT, IN `_idproducto` INT, IN `_idcreditos` INT, IN `_montocredito` DECIMAL(9,2), IN `_interescredito` FLOAT, IN `_plazocredito` INT, IN `_cuotamensual` DECIMAL(9,2), IN `_estado` VARCHAR(30))   INSERT INTO historicocreditos (idusuarios,idproducto,idcreditos,montocredito,interescredito,plazocredito,cuotamensual,estado) VALUES (_idusuarios,_idproducto,_idcreditos,_montocredito,_interescredito,_plazocredito,_cuotamensual,_estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarTransferenciasEnviadasClientes` (IN `_numerocuenta` INT, IN `_monto` DECIMAL(9,2), IN `_referencia` VARCHAR(255), IN `_estado` VARCHAR(50), IN `_idusuarios` INT, IN `_idusuariodestino` INT, IN `_idproducto` INT, IN `_idcuentas` INT, IN `_idcuentadestino` INT)   INSERT INTO transferencias (numerocuenta,monto,referencia,estado,idusuarios,idusuariodestino ,idproducto,idcuentas,idcuentadestino) VALUES (_numerocuenta,_monto,_referencia,_estado,_idusuarios,_idusuariodestino ,_idproducto,_idcuentas,_idcuentadestino)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroCodigoSeguridadTransferenciasCuentasClientes` (IN `_codigoseguridad` INT, IN `_idusuarios` INT)   INSERT INTO codigostransferencias (codigoseguridad,idusuarios) VALUES(_codigoseguridad,_idusuarios)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroCopiaContratoClientesFinal` (IN `_idcreditos` INT, IN `_copiacontratocliente` VARCHAR(255))   UPDATE creditos SET copiacontratocliente=_copiacontratocliente, proceso_finalizado="si" WHERE idcreditos=_idcreditos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroDepositoCuentasAhorrosClientesCashManHa` (IN `_idusuarios` INT, IN `_idproducto` INT, IN `_idcuentas` INT, IN `_referencia` VARCHAR(255), IN `_monto` DECIMAL(9,2), IN `_empleado_gestion` VARCHAR(255), IN `_tipotransaccion` VARCHAR(50), IN `_estadotransaccion` VARCHAR(50), IN `_saldonuevocuenta_transaccion` DECIMAL(9,2))   INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES (_idusuarios,_idproducto,_idcuentas,_referencia,_monto,_empleado_gestion,_tipotransaccion,_estadotransaccion,_saldonuevocuenta_transaccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroInformacionVehiculosCreditosClientes` (IN `_idcreditos` INT, IN `_idproducto` INT, IN `_idusuarios` INT, IN `_placa` VARCHAR(8), IN `_clase` VARCHAR(30), IN `_anio` INT, IN `_capacidad` VARCHAR(5), IN `_asientos` VARCHAR(5), IN `_marca` VARCHAR(255), IN `_modelo` VARCHAR(255), IN `_numeromotor` VARCHAR(17), IN `_chasisgrabado` VARCHAR(17), IN `_chasisvin` VARCHAR(17), IN `_color` VARCHAR(40))   INSERT INTO datosvehiculoscreditos (idcreditos,idproducto,idusuarios,placa,clase,anio,capacidad,asientos,marca,modelo,numeromotor,chasisgrabado,chasisvin,color) VALUES (_idcreditos,_idproducto,_idusuarios,_placa,_clase,_anio,_capacidad,_asientos,_marca,_modelo,_numeromotor,_chasisgrabado,_chasisvin,_color)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevasCuentasAhorroClientesCashmanha` (IN `_numerocuenta` INT, IN `_montocuenta` DECIMAL(9,2), IN `_idproducto` INT, IN `_idusuarios` INT)   INSERT INTO cuentas (numerocuenta,montocuenta,idproducto,idusuarios) VALUES (_numerocuenta,_montocuenta,_idproducto,_idusuarios)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevasReferenciasPersonalesLaboralesClientes` (IN `_idcreditos` INT, IN `_idusuarios` INT, IN `_idproducto` INT, IN `_nombres_referencia1` VARCHAR(255), IN `_apellidos_referencia1` VARCHAR(255), IN `_empresa_referencia1` VARCHAR(255), IN `_profesion_oficioreferencia1` VARCHAR(255), IN `_telefono_referencia1` VARCHAR(9), IN `_nombres_referencia2` VARCHAR(255), IN `_apellidos_referencia2` VARCHAR(255), IN `_empresa_referencia2` VARCHAR(255), IN `_profesion_oficioreferencia2` VARCHAR(255), IN `_telefono_referencia2` VARCHAR(9))   INSERT INTO referenciaspersonales (idcreditos,idusuarios,idproducto,nombres_referencia1,apellidos_referencia1,empresa_referencia1,profesion_oficioreferencia1,telefono_referencia1,nombres_referencia2,apellidos_referencia2,empresa_referencia2,profesion_oficioreferencia2,telefono_referencia2) VALUES (_idcreditos,_idusuarios,_idproducto,_nombres_referencia1,_apellidos_referencia1,_empresa_referencia1,_profesion_oficioreferencia1,_telefono_referencia1,_nombres_referencia2,_apellidos_referencia2,_empresa_referencia2,_profesion_oficioreferencia2,_telefono_referencia2)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevosMensajesUsuarios_MensajeriaCashManHa` (IN `_idusuarios` INT, IN `_nombremensaje` VARCHAR(255), IN `_asuntomensaje` VARCHAR(255), IN `_detallemensaje` VARCHAR(5000), IN `_idusuariosdestinatario` INT)   INSERT INTO mensajeria (idusuarios,nombremensaje,asuntomensaje,detallemensaje,idusuariosdestinatario) VALUES (_idusuarios,_nombremensaje,_asuntomensaje,_detallemensaje,_idusuariosdestinatario)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevosRolesDeUsuarios` (IN `_nombrerol` VARCHAR(75), IN `_descripcionrol` VARCHAR(255))   INSERT INTO roles (nombrerol,descripcionrol) VALUES (_nombrerol,_descripcionrol)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroPagoCuotasCreditosClientes_OrdenPagosCashManHa` (IN `_idusuarios` INT, IN `_idproducto` INT, IN `_idcreditos` INT, IN `_idcuotas` INT, IN `_referencia` VARCHAR(255), IN `_monto` DECIMAL(9,2), IN `_dias_incumplimiento` INT, IN `_empleado_gestion` VARCHAR(255))   INSERT INTO transacciones (idusuarios,idproducto,idcreditos,idcuotas,referencia,monto,dias_incumplimiento,empleado_gestion) VALUES (_idusuarios,_idproducto,_idcreditos,_idcuotas,_referencia,_monto,_dias_incumplimiento,_empleado_gestion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroReportesFallosPlataforma` (IN `_idusuarios` INT, IN `_nombrereporte` VARCHAR(255), IN `_descripcionreporte` VARCHAR(3000), IN `_fotoreporte` VARCHAR(255), IN `_fecharegistroreporte` DATETIME, IN `_estado` VARCHAR(50))   INSERT INTO reporteproblemasplataforma (idusuarios,nombrereporte,descripcionreporte,fotoreporte,fecharegistroreporte,estado) VALUES (_idusuarios,_nombrereporte,_descripcionreporte,_fotoreporte,_fecharegistroreporte,_estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroRetiroCuentasAhorrosClientesCashManHa` (IN `_idusuarios` INT, IN `_idproducto` INT, IN `_idcuentas` INT, IN `_referencia` VARCHAR(255), IN `_monto` DECIMAL(9,2), IN `_empleado_gestion` VARCHAR(255), IN `_tipotransaccion` VARCHAR(50), IN `_estadotransaccion` VARCHAR(50), IN `_saldonuevocuenta_transaccion` DECIMAL(9,2))   INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES (_idusuarios,_idproducto,_idcuentas,_referencia,_monto,_empleado_gestion,_tipotransaccion,_estadotransaccion,_saldonuevocuenta_transaccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ReporteCompletoIniciosdeSesionesUsuarios` (IN `_idusuarios` INT)   SELECT * FROM vista_reporteiniciosdesesiones WHERE idusuarios=_idusuarios ORDER BY fechaacceso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SumatoriaIncumplimientoMora_CuotasClientes` ()   UPDATE cuotas SET montocancelar=montocancelar+5.99 WHERE incumplimiento_pago="SI"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificarCodigoSeguridad` (IN `_codigo` INT, IN `_correo` VARCHAR(255), IN `_token` VARCHAR(255))   SELECT * FROM recuperacion WHERE codigo=_codigo AND correo=_correo AND token=_token AND estado="nousado" ORDER BY idrecuperaciones DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Verificar_ValidacionCodigoSeguridadTransferencias` (IN `_codigoseguridad` INT, IN `_idusuarios` INT)   SELECT * FROM vista_codigosseguridadtransferenciasclientes WHERE codigoseguridad = _codigoseguridad AND idusuarios = _idusuarios AND estado="Valido"$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accesos`
--

CREATE TABLE `accesos` (
  `idacceso` int(11) NOT NULL,
  `fechaacceso` timestamp NOT NULL DEFAULT current_timestamp(),
  `dispositivo` varchar(255) NOT NULL,
  `sistemaoperativo` varchar(255) NOT NULL,
  `idusuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesos`
--

INSERT INTO `accesos` (`idacceso`, `fechaacceso`, `dispositivo`, `sistemaoperativo`, `idusuarios`) VALUES
(1, '2025-05-27 01:12:02', 'JUAN', 'Windows NT', 12),
(161, '2025-05-28 01:26:21', 'JUAN', 'Windows NT', 12),
(162, '2025-05-28 01:33:47', 'JUAN', 'Windows NT', 14),
(163, '2025-05-28 01:34:34', 'JUAN', 'Windows NT', 14),
(164, '2025-05-28 01:35:28', 'JUAN', 'Windows NT', 12),
(165, '2025-05-28 01:51:19', 'JUAN', 'Windows NT', 15),
(166, '2025-05-28 01:52:14', 'JUAN', 'Windows NT', 15),
(167, '2025-05-28 01:52:30', 'JUAN', 'Windows NT', 12),
(168, '2025-05-28 01:56:58', 'JUAN', 'Windows NT', 16),
(169, '2025-05-28 01:57:36', 'JUAN', 'Windows NT', 16),
(170, '2025-05-28 02:10:08', 'JUAN', 'Windows NT', 12),
(171, '2025-05-28 02:10:29', 'JUAN', 'Windows NT', 14),
(172, '2025-05-28 02:11:21', 'JUAN', 'Windows NT', 15),
(173, '2025-05-28 02:14:44', 'JUAN', 'Windows NT', 12),
(174, '2025-05-28 02:19:46', 'JUAN', 'Windows NT', 17),
(175, '2025-05-28 02:20:14', 'JUAN', 'Windows NT', 17),
(176, '2025-05-28 02:21:17', 'JUAN', 'Windows NT', 17),
(177, '2025-05-28 02:21:46', 'JUAN', 'Windows NT', 12),
(178, '2025-05-28 02:25:12', 'JUAN', 'Windows NT', 18),
(179, '2025-05-28 02:25:59', 'JUAN', 'Windows NT', 18),
(180, '2025-05-28 02:27:22', 'JUAN', 'Windows NT', 18);

-- --------------------------------------------------------

--
-- Table structure for table `codigostransferencias`
--

CREATE TABLE `codigostransferencias` (
  `idcodigo` int(11) NOT NULL,
  `codigoseguridad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(50) NOT NULL DEFAULT 'Valido',
  `idusuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codigostransferencias`
--

INSERT INTO `codigostransferencias` (`idcodigo`, `codigoseguridad`, `fecha`, `estado`, `idusuarios`) VALUES
(1, 380035, '2025-03-24 06:06:51', 'Valido', 8),
(2, 670719, '2025-03-25 03:29:12', 'Valido', 7);

-- --------------------------------------------------------

--
-- Table structure for table `creditos`
--

CREATE TABLE `creditos` (
  `idcreditos` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `tipocliente` varchar(50) NOT NULL,
  `montocredito` decimal(9,2) NOT NULL,
  `interescredito` float NOT NULL,
  `plazocredito` int(11) NOT NULL,
  `cuotamensual` decimal(9,2) NOT NULL,
  `fechasolicitud` date NOT NULL,
  `salariocliente` decimal(9,2) NOT NULL,
  `saldocredito` decimal(15,6) DEFAULT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'en proceso',
  `observaciones` varchar(1500) DEFAULT NULL,
  `observacion_gerencia` varchar(1500) DEFAULT NULL,
  `observacion_presidencia` varchar(1500) DEFAULT NULL,
  `usuario_empleado` varchar(255) NOT NULL,
  `progreso_solicitud` tinyint(4) NOT NULL DEFAULT 10,
  `progreso_pagocredito` tinyint(4) NOT NULL DEFAULT 0,
  `fecha_ultimarevision` timestamp NULL DEFAULT NULL,
  `usuario_gestionando` varchar(255) DEFAULT NULL,
  `cuotas_generadas` char(2) NOT NULL DEFAULT 'no',
  `copiacontratocliente` varchar(255) DEFAULT NULL,
  `estadocrediticio` varchar(255) NOT NULL DEFAULT 'Nuevo Cliente',
  `proceso_finalizado` char(2) NOT NULL DEFAULT 'no',
  `enviaralhistorico` char(2) NOT NULL DEFAULT 'no',
  `ocultartransacciones_clientes` char(2) NOT NULL DEFAULT 'no',
  `creditoactivo` char(2) NOT NULL DEFAULT 'si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditos`
--

INSERT INTO `creditos` (`idcreditos`, `idusuarios`, `idproducto`, `tipocliente`, `montocredito`, `interescredito`, `plazocredito`, `cuotamensual`, `fechasolicitud`, `salariocliente`, `saldocredito`, `estado`, `observaciones`, `observacion_gerencia`, `observacion_presidencia`, `usuario_empleado`, `progreso_solicitud`, `progreso_pagocredito`, `fecha_ultimarevision`, `usuario_gestionando`, `cuotas_generadas`, `copiacontratocliente`, `estadocrediticio`, `proceso_finalizado`, `enviaralhistorico`, `ocultartransacciones_clientes`, `creditoactivo`) VALUES
(10, 1, 2, 'asalariado', 10000.00, 10.95, 90, 155.07, '2025-04-06', 2505.88, 9333.333334, 'aprobado', 'Cliente cumple con todos los estandares.', 'aprobado', 'Aprobado', 'marco.almagro', 100, 0, '2025-04-07 17:30:38', 'ester.cuenca', 'si', '062332_624e77592cd00_ContratoPrPersonal02-03343322-4.pdf', 'Nuevo Cliente', 'si', 'no', 'no', 'si'),
(11, 10, 3, 'independiente', 2950000.00, 6.9, 15, 20408.05, '2025-04-06', 95898.88, 2884444.444444, 'aprobado', 'Cliente cumple con todos los estandares. Posee una sociedad fuerte.', 'aprobado', 'Aprobado', 'marco.almagro', 100, 0, '2025-04-07 17:49:53', 'ester.cuenca', 'si', '062351_624e7beb02acf_ContratoPrHipotecas-00000001-0.pdf', 'Nuevo Cliente', 'si', 'no', 'no', 'si'),
(12, 7, 4, 'asalariado', 45000.00, 30.8, 90, 784.20, '2025-04-07', 2500.00, 45000.000000, 'aprobado', 'Cumple con todos los estandares', 'Aprobado', 'Aprobado', 'daniel.rivera', 100, 0, '2025-04-08 06:24:55', 'ester.cuenca', 'si', '071828_624f81a46e82f_ContratoPrVehiculos-00000000-7.pdf', 'Nuevo Cliente', 'si', 'no', 'no', 'si');

--
-- Triggers `creditos`
--
DELIMITER $$
CREATE TRIGGER `EnviarSolicitudesCreditosDenegadas_HistoricoCreditos` AFTER DELETE ON `creditos` FOR EACH ROW INSERT INTO historicocreditos (idusuarios,idproducto,idcreditos,montocredito,interescredito,plazocredito,cuotamensual,estado) VALUES (old.idusuarios,old.idproducto,old.idcreditos,old.montocredito,old.interescredito,old.plazocredito,old.cuotamensual,old.estado)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `idcuentas` int(11) NOT NULL,
  `numerocuenta` int(12) NOT NULL,
  `montocuenta` decimal(9,2) NOT NULL,
  `fechaapertura` timestamp NOT NULL DEFAULT current_timestamp(),
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `estadocuenta` varchar(50) NOT NULL DEFAULT 'activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`idcuentas`, `numerocuenta`, `montocuenta`, `fechaapertura`, `idproducto`, `idusuarios`, `estadocuenta`) VALUES
(1, 101462573, 2200.00, '2025-03-24 05:27:43', 1, 7, 'activa'),
(2, 104176523, 2100.00, '2025-03-24 06:02:28', 1, 8, 'activa'),
(3, 105321467, 6500.00, '2025-03-25 04:43:59', 1, 9, 'activa'),
(4, 106741235, 10500.00, '2025-03-25 06:08:45', 1, 1, 'activa'),
(5, 101537246, 75000.00, '2025-03-26 05:19:49', 1, 10, 'activa');

--
-- Triggers `cuentas`
--
DELIMITER $$
CREATE TRIGGER `HabilitarSistemaCuentasClientes_PortalCashman` AFTER INSERT ON `cuentas` FOR EACH ROW UPDATE usuarios SET poseecuenta="si" WHERE idusuarios=NEW.idusuarios
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cuotas`
--

CREATE TABLE `cuotas` (
  `idcuotas` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `montocancelar` decimal(9,2) NOT NULL,
  `estadocuota` varchar(30) NOT NULL DEFAULT 'pendiente',
  `nombreproducto` varchar(255) NOT NULL,
  `montocapital` decimal(9,2) NOT NULL,
  `fechavencimiento` date NOT NULL,
  `incumplimiento_pago` char(2) NOT NULL DEFAULT 'NO',
  `disponiblehistorico` char(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuotas`
--

INSERT INTO `cuotas` (`idcuotas`, `idcreditos`, `idproducto`, `idusuarios`, `montocancelar`, `estadocuota`, `nombreproducto`, `montocapital`, `fechavencimiento`, `incumplimiento_pago`, `disponiblehistorico`) VALUES
(19, 10, 2, 1, 155.07, 'cancelado', 'Préstamos Personales', 111.11, '2025-05-06', 'NO', 'no'),
(20, 10, 2, 1, 155.07, 'cancelado', 'Préstamos Personales', 111.11, '2025-06-06', 'NO', 'no'),
(21, 10, 2, 1, 155.07, 'cancelado', 'Préstamos Personales', 111.11, '2025-07-06', 'NO', 'no'),
(22, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-08-08', 'NO', 'no'),
(23, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-09-06', 'NO', 'no'),
(24, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-10-06', 'NO', 'no'),
(25, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-11-07', 'NO', 'no'),
(26, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-12-06', 'NO', 'no'),
(27, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-01-06', 'NO', 'no'),
(28, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-02-06', 'NO', 'no'),
(29, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-03-06', 'NO', 'no'),
(30, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-04-06', 'NO', 'no'),
(31, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-05-08', 'NO', 'no'),
(32, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-06-06', 'NO', 'no'),
(33, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-07-06', 'NO', 'no'),
(34, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-08-07', 'NO', 'no'),
(35, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-09-06', 'NO', 'no'),
(36, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-10-06', 'NO', 'no'),
(37, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-11-06', 'NO', 'no'),
(38, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-12-06', 'NO', 'no'),
(39, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-01-08', 'NO', 'no'),
(40, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-02-06', 'NO', 'no'),
(41, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-03-06', 'NO', 'no'),
(42, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-04-08', 'NO', 'no'),
(43, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-05-06', 'NO', 'no'),
(44, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-06-06', 'NO', 'no'),
(45, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-07-08', 'NO', 'no'),
(46, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-08-06', 'NO', 'no'),
(47, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-09-06', 'NO', 'no'),
(48, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-10-07', 'NO', 'no'),
(49, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-11-06', 'NO', 'no'),
(50, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-12-06', 'NO', 'no'),
(51, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-01-06', 'NO', 'no'),
(52, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-02-06', 'NO', 'no'),
(53, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-03-06', 'NO', 'no'),
(54, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-04-07', 'NO', 'no'),
(55, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-05-06', 'NO', 'no'),
(56, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-06-06', 'NO', 'no'),
(57, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-07-07', 'NO', 'no'),
(58, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-08-06', 'NO', 'no'),
(59, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-09-08', 'NO', 'no'),
(60, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-10-06', 'NO', 'no'),
(61, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-11-06', 'NO', 'no'),
(62, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2025-12-08', 'NO', 'no'),
(63, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-01-06', 'NO', 'no'),
(64, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-02-06', 'NO', 'no'),
(65, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-03-06', 'NO', 'no'),
(66, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-04-06', 'NO', 'no'),
(67, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-05-06', 'NO', 'no'),
(68, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-06-08', 'NO', 'no'),
(69, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-07-06', 'NO', 'no'),
(70, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-08-06', 'NO', 'no'),
(71, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-09-07', 'NO', 'no'),
(72, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-10-06', 'NO', 'no'),
(73, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-11-06', 'NO', 'no'),
(74, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2026-12-07', 'NO', 'no'),
(75, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-01-06', 'NO', 'no'),
(76, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-02-08', 'NO', 'no'),
(77, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-03-08', 'NO', 'no'),
(78, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-04-06', 'NO', 'no'),
(79, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-05-06', 'NO', 'no'),
(80, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-06-07', 'NO', 'no'),
(81, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-07-06', 'NO', 'no'),
(82, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-08-06', 'NO', 'no'),
(83, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-09-06', 'NO', 'no'),
(84, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-10-06', 'NO', 'no'),
(85, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-11-08', 'NO', 'no'),
(86, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2027-12-06', 'NO', 'no'),
(87, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-01-06', 'NO', 'no'),
(88, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-02-07', 'NO', 'no'),
(89, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-03-06', 'NO', 'no'),
(90, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-04-06', 'NO', 'no'),
(91, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-05-08', 'NO', 'no'),
(92, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-06-06', 'NO', 'no'),
(93, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-07-06', 'NO', 'no'),
(94, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-08-07', 'NO', 'no'),
(95, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-09-06', 'NO', 'no'),
(96, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-10-06', 'NO', 'no'),
(97, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-11-06', 'NO', 'no'),
(98, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2028-12-06', 'NO', 'no'),
(99, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-01-08', 'NO', 'no'),
(100, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-02-06', 'NO', 'no'),
(101, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-03-06', 'NO', 'no'),
(102, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-04-06', 'NO', 'no'),
(103, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-05-07', 'NO', 'no'),
(104, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-06-06', 'NO', 'no'),
(105, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-07-06', 'NO', 'no'),
(106, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-08-06', 'NO', 'no'),
(107, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-09-06', 'NO', 'no'),
(108, 10, 2, 1, 155.07, 'pendiente', 'Préstamos Personales', 111.11, '2029-10-08', 'NO', 'no'),
(109, 11, 3, 10, 20408.05, 'cancelado', 'Préstamos Hipotecarios', 16388.89, '2025-05-06', 'NO', 'no'),
(110, 11, 3, 10, 20408.05, 'cancelado', 'Préstamos Hipotecarios', 16388.89, '2025-06-06', 'NO', 'no'),
(111, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-07-06', 'NO', 'no'),
(112, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-08-08', 'NO', 'no'),
(113, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-09-06', 'NO', 'no'),
(114, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-10-06', 'NO', 'no'),
(115, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-11-07', 'NO', 'no'),
(116, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-12-06', 'NO', 'no'),
(117, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-01-06', 'NO', 'no'),
(118, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-02-06', 'NO', 'no'),
(119, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-03-06', 'NO', 'no'),
(120, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-04-06', 'NO', 'no'),
(121, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-05-08', 'NO', 'no'),
(122, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-06-06', 'NO', 'no'),
(123, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-07-06', 'NO', 'no'),
(124, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-08-07', 'NO', 'no'),
(125, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-09-06', 'NO', 'no'),
(126, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-10-06', 'NO', 'no'),
(127, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-11-06', 'NO', 'no'),
(128, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-12-06', 'NO', 'no'),
(129, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-01-08', 'NO', 'no'),
(130, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-02-06', 'NO', 'no'),
(131, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-03-06', 'NO', 'no'),
(132, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-04-08', 'NO', 'no'),
(133, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-05-06', 'NO', 'no'),
(134, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-06-06', 'NO', 'no'),
(135, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-07-08', 'NO', 'no'),
(136, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-08-06', 'NO', 'no'),
(137, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-09-06', 'NO', 'no'),
(138, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-10-07', 'NO', 'no'),
(139, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-11-06', 'NO', 'no'),
(140, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-12-06', 'NO', 'no'),
(141, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-01-06', 'NO', 'no'),
(142, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-02-06', 'NO', 'no'),
(143, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-03-06', 'NO', 'no'),
(144, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-04-07', 'NO', 'no'),
(145, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-05-06', 'NO', 'no'),
(146, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-06-06', 'NO', 'no'),
(147, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-07-07', 'NO', 'no'),
(148, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-08-06', 'NO', 'no'),
(149, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-09-08', 'NO', 'no'),
(150, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-10-06', 'NO', 'no'),
(151, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-11-06', 'NO', 'no'),
(152, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2025-12-08', 'NO', 'no'),
(153, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-01-06', 'NO', 'no'),
(154, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-02-06', 'NO', 'no'),
(155, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-03-06', 'NO', 'no'),
(156, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-04-06', 'NO', 'no'),
(157, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-05-06', 'NO', 'no'),
(158, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-06-08', 'NO', 'no'),
(159, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-07-06', 'NO', 'no'),
(160, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-08-06', 'NO', 'no'),
(161, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-09-07', 'NO', 'no'),
(162, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-10-06', 'NO', 'no'),
(163, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-11-06', 'NO', 'no'),
(164, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2026-12-07', 'NO', 'no'),
(165, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-01-06', 'NO', 'no'),
(166, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-02-08', 'NO', 'no'),
(167, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-03-08', 'NO', 'no'),
(168, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-04-06', 'NO', 'no'),
(169, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-05-06', 'NO', 'no'),
(170, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-06-07', 'NO', 'no'),
(171, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-07-06', 'NO', 'no'),
(172, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-08-06', 'NO', 'no'),
(173, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-09-06', 'NO', 'no'),
(174, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-10-06', 'NO', 'no'),
(175, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-11-08', 'NO', 'no'),
(176, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2027-12-06', 'NO', 'no'),
(177, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-01-06', 'NO', 'no'),
(178, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-02-07', 'NO', 'no'),
(179, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-03-06', 'NO', 'no'),
(180, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-04-06', 'NO', 'no'),
(181, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-05-08', 'NO', 'no'),
(182, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-06-06', 'NO', 'no'),
(183, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-07-06', 'NO', 'no'),
(184, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-08-07', 'NO', 'no'),
(185, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-09-06', 'NO', 'no'),
(186, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-10-06', 'NO', 'no'),
(187, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-11-06', 'NO', 'no'),
(188, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2028-12-06', 'NO', 'no'),
(189, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-01-08', 'NO', 'no'),
(190, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-02-06', 'NO', 'no'),
(191, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-03-06', 'NO', 'no'),
(192, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-04-06', 'NO', 'no'),
(193, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-05-07', 'NO', 'no'),
(194, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-06-06', 'NO', 'no'),
(195, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-07-06', 'NO', 'no'),
(196, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-08-06', 'NO', 'no'),
(197, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-09-06', 'NO', 'no'),
(198, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-10-08', 'NO', 'no'),
(199, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-11-06', 'NO', 'no'),
(200, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2029-12-06', 'NO', 'no'),
(201, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-01-07', 'NO', 'no'),
(202, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-02-06', 'NO', 'no'),
(203, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-03-06', 'NO', 'no'),
(204, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-04-08', 'NO', 'no'),
(205, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-05-06', 'NO', 'no'),
(206, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-06-06', 'NO', 'no'),
(207, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-07-08', 'NO', 'no'),
(208, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-08-06', 'NO', 'no'),
(209, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-09-06', 'NO', 'no'),
(210, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-10-07', 'NO', 'no'),
(211, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-11-06', 'NO', 'no'),
(212, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2030-12-06', 'NO', 'no'),
(213, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-01-06', 'NO', 'no'),
(214, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-02-06', 'NO', 'no'),
(215, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-03-06', 'NO', 'no'),
(216, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-04-07', 'NO', 'no'),
(217, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-05-06', 'NO', 'no'),
(218, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-06-06', 'NO', 'no'),
(219, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-07-07', 'NO', 'no'),
(220, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-08-06', 'NO', 'no'),
(221, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-09-08', 'NO', 'no'),
(222, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-10-06', 'NO', 'no'),
(223, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-11-06', 'NO', 'no'),
(224, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2031-12-08', 'NO', 'no'),
(225, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-01-06', 'NO', 'no'),
(226, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-02-06', 'NO', 'no'),
(227, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-03-08', 'NO', 'no'),
(228, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-04-06', 'NO', 'no'),
(229, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-05-06', 'NO', 'no'),
(230, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-06-07', 'NO', 'no'),
(231, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-07-06', 'NO', 'no'),
(232, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-08-06', 'NO', 'no'),
(233, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-09-06', 'NO', 'no'),
(234, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-10-06', 'NO', 'no'),
(235, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-11-08', 'NO', 'no'),
(236, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2032-12-06', 'NO', 'no'),
(237, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-01-06', 'NO', 'no'),
(238, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-02-07', 'NO', 'no'),
(239, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-03-07', 'NO', 'no'),
(240, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-04-06', 'NO', 'no'),
(241, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-05-06', 'NO', 'no'),
(242, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-06-06', 'NO', 'no'),
(243, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-07-06', 'NO', 'no'),
(244, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-08-08', 'NO', 'no'),
(245, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-09-06', 'NO', 'no'),
(246, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-10-06', 'NO', 'no'),
(247, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-11-07', 'NO', 'no'),
(248, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2033-12-06', 'NO', 'no'),
(249, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-01-06', 'NO', 'no'),
(250, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-02-06', 'NO', 'no'),
(251, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-03-06', 'NO', 'no'),
(252, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-04-06', 'NO', 'no'),
(253, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-05-08', 'NO', 'no'),
(254, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-06-06', 'NO', 'no'),
(255, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-07-06', 'NO', 'no'),
(256, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-08-07', 'NO', 'no'),
(257, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-09-06', 'NO', 'no'),
(258, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-10-06', 'NO', 'no'),
(259, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-11-06', 'NO', 'no'),
(260, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2034-12-06', 'NO', 'no'),
(261, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-01-08', 'NO', 'no'),
(262, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-02-06', 'NO', 'no'),
(263, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-03-06', 'NO', 'no'),
(264, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-04-06', 'NO', 'no'),
(265, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-05-07', 'NO', 'no'),
(266, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-06-06', 'NO', 'no'),
(267, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-07-06', 'NO', 'no'),
(268, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-08-06', 'NO', 'no'),
(269, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-09-06', 'NO', 'no'),
(270, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-10-08', 'NO', 'no'),
(271, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-11-06', 'NO', 'no'),
(272, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2035-12-06', 'NO', 'no'),
(273, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-01-07', 'NO', 'no'),
(274, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-02-06', 'NO', 'no'),
(275, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-03-06', 'NO', 'no'),
(276, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-04-07', 'NO', 'no'),
(277, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-05-06', 'NO', 'no'),
(278, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-06-06', 'NO', 'no'),
(279, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-07-07', 'NO', 'no'),
(280, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-08-06', 'NO', 'no'),
(281, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-09-08', 'NO', 'no'),
(282, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-10-06', 'NO', 'no'),
(283, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-11-06', 'NO', 'no'),
(284, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2036-12-08', 'NO', 'no'),
(285, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2037-01-06', 'NO', 'no'),
(286, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2037-02-06', 'NO', 'no'),
(287, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2037-03-06', 'NO', 'no'),
(288, 11, 3, 10, 20408.05, 'pendiente', 'Préstamos Hipotecarios', 16388.89, '2037-04-06', 'NO', 'no'),
(289, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-05-09', 'NO', 'no'),
(290, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-06-07', 'NO', 'no'),
(291, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-07-07', 'NO', 'no'),
(292, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-08-08', 'NO', 'no'),
(293, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-09-07', 'NO', 'no'),
(294, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-10-07', 'NO', 'no'),
(295, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-11-07', 'NO', 'no'),
(296, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-12-07', 'NO', 'no'),
(297, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-01-09', 'NO', 'no'),
(298, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-02-07', 'NO', 'no'),
(299, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-03-07', 'NO', 'no'),
(300, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-04-07', 'NO', 'no'),
(301, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-05-08', 'NO', 'no'),
(302, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-06-07', 'NO', 'no'),
(303, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-07-07', 'NO', 'no'),
(304, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-08-07', 'NO', 'no'),
(305, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-09-07', 'NO', 'no'),
(306, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-10-09', 'NO', 'no'),
(307, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-11-07', 'NO', 'no'),
(308, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-12-07', 'NO', 'no'),
(309, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-01-08', 'NO', 'no'),
(310, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-02-07', 'NO', 'no'),
(311, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-03-07', 'NO', 'no'),
(312, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-04-08', 'NO', 'no'),
(313, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-05-07', 'NO', 'no'),
(314, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-06-07', 'NO', 'no'),
(315, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-07-08', 'NO', 'no'),
(316, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-08-07', 'NO', 'no'),
(317, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-09-09', 'NO', 'no'),
(318, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-10-07', 'NO', 'no'),
(319, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-11-07', 'NO', 'no'),
(320, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-12-09', 'NO', 'no'),
(321, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-01-07', 'NO', 'no'),
(322, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-02-07', 'NO', 'no'),
(323, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-03-07', 'NO', 'no'),
(324, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-04-07', 'NO', 'no'),
(325, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-05-07', 'NO', 'no'),
(326, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-06-09', 'NO', 'no'),
(327, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-07-07', 'NO', 'no'),
(328, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-08-07', 'NO', 'no'),
(329, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-09-08', 'NO', 'no'),
(330, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-10-07', 'NO', 'no'),
(331, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-11-07', 'NO', 'no'),
(332, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2025-12-08', 'NO', 'no'),
(333, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-01-07', 'NO', 'no'),
(334, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-02-09', 'NO', 'no'),
(335, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-03-09', 'NO', 'no'),
(336, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-04-07', 'NO', 'no'),
(337, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-05-07', 'NO', 'no'),
(338, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-06-08', 'NO', 'no'),
(339, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-07-07', 'NO', 'no'),
(340, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-08-07', 'NO', 'no'),
(341, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-09-07', 'NO', 'no'),
(342, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-10-07', 'NO', 'no'),
(343, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-11-09', 'NO', 'no'),
(344, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2026-12-07', 'NO', 'no'),
(345, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-01-07', 'NO', 'no'),
(346, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-02-08', 'NO', 'no'),
(347, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-03-08', 'NO', 'no'),
(348, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-04-07', 'NO', 'no'),
(349, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-05-07', 'NO', 'no'),
(350, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-06-07', 'NO', 'no'),
(351, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-07-07', 'NO', 'no'),
(352, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-08-09', 'NO', 'no'),
(353, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-09-07', 'NO', 'no'),
(354, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-10-07', 'NO', 'no'),
(355, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-11-08', 'NO', 'no'),
(356, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2027-12-07', 'NO', 'no'),
(357, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-01-07', 'NO', 'no'),
(358, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-02-07', 'NO', 'no'),
(359, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-03-07', 'NO', 'no'),
(360, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-04-07', 'NO', 'no'),
(361, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-05-08', 'NO', 'no'),
(362, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-06-07', 'NO', 'no'),
(363, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-07-07', 'NO', 'no'),
(364, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-08-07', 'NO', 'no'),
(365, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-09-07', 'NO', 'no'),
(366, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-10-09', 'NO', 'no'),
(367, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-11-07', 'NO', 'no'),
(368, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2028-12-07', 'NO', 'no'),
(369, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-01-08', 'NO', 'no'),
(370, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-02-07', 'NO', 'no'),
(371, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-03-07', 'NO', 'no'),
(372, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-04-09', 'NO', 'no'),
(373, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-05-07', 'NO', 'no'),
(374, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-06-07', 'NO', 'no'),
(375, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-07-09', 'NO', 'no'),
(376, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-08-07', 'NO', 'no'),
(377, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-09-07', 'NO', 'no'),
(378, 12, 4, 7, 784.20, 'pendiente', 'Préstamos de Vehículos', 500.00, '2029-10-08', 'NO', 'no');

--
-- Triggers `cuotas`
--
DELIMITER $$
CREATE TRIGGER `CambioEstadoComprobadorCuotasMensualesClientes` AFTER INSERT ON `cuotas` FOR EACH ROW UPDATE creditos SET cuotas_generadas="si" WHERE idcreditos=NEW.idcreditos
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `HabilitarSistemaPortalClientes_Creditos` AFTER INSERT ON `cuotas` FOR EACH ROW UPDATE usuarios SET habilitarsistema="si" WHERE idusuarios=NEW.idusuarios
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `datosvehiculoscreditos`
--

CREATE TABLE `datosvehiculoscreditos` (
  `iddatosvehiculos` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `clase` varchar(30) NOT NULL,
  `anio` int(11) NOT NULL,
  `capacidad` varchar(5) NOT NULL,
  `asientos` varchar(5) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `numeromotor` varchar(17) NOT NULL,
  `chasisgrabado` varchar(17) NOT NULL,
  `chasisvin` varchar(17) NOT NULL,
  `color` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datosvehiculoscreditos`
--

INSERT INTO `datosvehiculoscreditos` (`iddatosvehiculos`, `idcreditos`, `idproducto`, `idusuarios`, `placa`, `clase`, `anio`, `capacidad`, `asientos`, `marca`, `modelo`, `numeromotor`, `chasisgrabado`, `chasisvin`, `color`) VALUES
(1, 12, 4, 7, 'P488487', 'DEPORTIVO', 2020, '4.00', '4.00', 'BMW', 'i 8', 'WBY2Z2C57FV674366', 'WBY2Z2C57FV674366', 'WBY2Z2C57FV674366', 'Blanco Metalico');

-- --------------------------------------------------------

--
-- Table structure for table `detalleusuarios`
--

CREATE TABLE `detalleusuarios` (
  `iddetalle` int(11) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(17) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `telefonotrabajo` varchar(9) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `direcciontrabajo` varchar(255) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `estadocivil` varchar(30) NOT NULL,
  `fotoduifrontal` varchar(255) NOT NULL,
  `fotoduireverso` varchar(255) NOT NULL,
  `fotonit` varchar(255) NOT NULL,
  `fotofirma` varchar(255) NOT NULL,
  `idusuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalleusuarios`
--

INSERT INTO `detalleusuarios` (`iddetalle`, `dui`, `nit`, `telefono`, `celular`, `telefonotrabajo`, `direccion`, `empresa`, `cargo`, `direcciontrabajo`, `fechanacimiento`, `genero`, `estadocivil`, `fotoduifrontal`, `fotoduireverso`, `fotonit`, `fotofirma`, `idusuarios`) VALUES
(1, '03343322-4', '0614-220319-000-0', '2121-0099', '7755-3333', '2208-8988', 'Lorem de ipsum av lorem No 44 Av Amapolas Ote Block \"E\" PERFEITO! SI!!!!', 'CashMan H.A', 'Administrador Sistemas', 'Col Cumbres De Cuscatlán Pje 10 Políg Q No 105', '1998-12-25', 'm', 'Comprometido', '011817_62479631a8465_DuiFrontal.jpg', '011817_62479631a846d_DuiReverso.jpg', '011817_62479631a846d_NitFrontal.jpg', '011817_62479631a846d_Firma.png', 1),
(2, '00000000-1', '0611-140887-111-2', '7766-8888', '7788-7777', '7799-9988', 'Bo La Esperanza 5 Av Sur No 13, Santa Rosa de Lima', 'CashMan H.A', 'Administradora de Sistemas', 'Col Cumbres De Cuscatlán Pje 10 Políg Q No 105', '1987-09-14', 'f', 'Casada', '231526_623b909be2389_DuiFrontal.jpg', '231526_623b909be2390_DuiReverso.jpg', '231526_623b909be2390_NitFrontal.jpg', '231526_623b909be2390_Firma.png', 2),
(3, '00000000-2', '0611-220499-111-1', '2211-3333', '7899-1233', '2211-4455', 'Col La Rábida 29 Cl Ote No 730, San Salvador', 'CashMan H.A', 'Administrador de Sistemas', 'Col Cumbres De Cuscatlán Pje 10 Políg Q No 105', '1999-04-22', 'm', 'Comprometido', '231535_623b92915aedf_DuiFrontal.jpg', '231535_623b92915aee6_DuiReverso.jpg', '231535_623b92915aee6_NitFrontal.jpg', '231535_623b92915aee6_Firma.png', 3),
(4, '00000000-3', '0611-220495-009-1', '2211-2222', '2211-2233', '7788-7777', 'Resid Cdad Real Políg L-Sevilla No 01, San Juan Opico', 'CashMan H.A', 'Presidencia CEO', 'Col Cumbres De Cuscatlán Pje 10 Políg Q No 105', '1995-04-22', 'f', 'Casada', '231542_623b9462e7859_DuiFrontal.jpg', '231542_623b9462e7860_DuiReverso.jpg', '231542_623b9462e7860_NitFrontal.jpg', '231542_623b9462e7860_Firma.png', 4),
(5, '00000000-4', '0611-220999-112-2', '2234-4999', '2234-4950', '2233-9944', 'Bo El Calvario Cl Alberto Masferrer No 44-B Sto Tomás, Santo Tomás', 'CashMan H.A', 'Gerencia', 'Col Cumbres De Cuscatlán Pje 10 Políg Q No 105', '1999-09-22', 'm', 'Casado', '231600_623b98609eb9d_DuiFrontal.jpg', '231600_623b98609eba4_DuiReverso.jpg', '231600_623b98609eba4_NitFrontal.jpg', '231600_623b98609eba4_Firma.png', 5),
(6, '00000000-6', '0611-291280-112-1', '2233-2111', '2233-2112', '2244-2221', ' Autop Nte Cond San Francisco No 14', 'CashMan H.A', 'Atención al Cliente', 'Col Cumbres De Cuscatlán Pje 10 Políg Q No 105', '1980-12-29', 'm', 'Casado', '231607_623b9a3445811_DuiFrontal.jpg', '231607_623b9a3445818_DuiReverso.jpg', '231607_623b9a3445818_NitFrontal.jpg', '231607_623b9a3445818_Firma.png', 6),
(7, '00000000-7', '0611-220997-112-2', '2244-3344', '7889-0099', '2218-0440', 'Villa Constitución Cl Ppal No G-1 Galera Quemada Nejapa, Nejapa', 'Industrias Topaz', 'Jefa RR.HH', 'Bo San Antonio Cl Ppal 1 Cuadra Antes De Telecom', '1997-09-22', 'm', 'Soltero', '231652_623ba4acba391_DuiFrontal.jpg', '231652_623ba4acba3a0_DuiReverso.jpg', '231652_623ba4acba3a0_NitFrontal.jpg', '231652_623ba4acba3a0_Firma.png', 7),
(9, '00000000-8', '0611-050590-112-2', '2211-4455', '7994-7748', '2299-8484', 'Col San José Cl A La Playa Loc 5 Metalío, Metalio', 'Grupo LEMUS', 'Atención al Cliente', 'Z Ind Plan De La Laguna Cl Circunv Políg A Bod 1 Antgo Cusca', '1990-05-05', 'f', 'Divorciada', '231732_623bae2953054_DuiFrontal.jpg', '231732_623bae295305b_DuiReverso.jpg', '231732_623bae295305b_NitFrontal.jpg', '231732_623bae295305b_Firma.png', 8),
(10, '00000000-9', '0612-221194-112-2', '2211-4446', '7878-4636', '2947-1122', 'Rpto Bosques Del Matazano C C Matazano Loc 10 Soya, Soyapango', 'Grupo OCEANO', 'Ventas y Marketing', 'Cond Cuscatlán Fnl 4 Cl Pte y 25 Av Nte No 220', '1994-11-22', 'f', 'Divorciada', '241608_623cebd785835_DuiFrontal.jpg', '241608_623cebd785842_DuiReverso.jpg', '241608_623cebd785842_NitFrontal.jpg', '241608_623cebd785842_Firma.png', 9),
(11, '00000001-0', '0611-260197-117-1', '2299-4400', '7755-0099', '2310-0690', 'Col La Sultana Cl Las Rosas No 37 Antg Cusc, Tonacatepeque', 'SERSAPROSA', 'Dpto Riesgos Jurídicos', 'Urb Universitaria Cl Los Pinos No 20', '1997-01-26', 'm', 'Soltero', '251707_623e4b353d628_DuiFrontal.jpg', '251707_623e4b353d634_DuiReverso.jpg', '251707_623e4b353d634_NitFrontal.jpg', '251707_623e4b353d634_Firma.png', 10),
(12, '00000001-4', '0613-220387-122-8', '2298-7783', '7904-8389', '2211-9983', 'Lorem de ipsum av lorem No 44', 'Grupo Q', 'Agente de ventas (telefónico)', 'Calle La Reforma, NO 450-E Colonia Escalón (Edificio contact-center).', '1987-03-22', 'm', 'Divorciado', '011816_624795cce0504_DuiFrontal.jpg', '011816_624795cce050b_DuiReverso.jpg', '011816_624795cce050b_NitFrontal.jpg', '011816_624795cce050b_Firma.png', 11),
(13, '12345678-9', '4332-211445-532-1', '2134-4542', '8594-0391', '2345-5222', 'Colonia Las Margaritas, Soyapango', 'Aco Emprendedores', 'Presidente General', 'Colonia Escalón, Santa Tecla', '1985-02-20', 'm', 'Casado', '271933_683667e28e492_DuiEnfrente.jpg', '271933_683667e28e49a_DuiReverso.jpg', '271933_683667e28e49a_NIT.jpg', '271933_683667e28e49a_FirmaDigital.png', 14),
(14, '22311423-4', '4221-456784-312-1', '2145-6151', '7869-5949', '2345-5222', 'Santa Elena, San Martín', 'Aco Emprendedores', 'Gerente de área de Sistemas', 'Colonia Escalón, Santa Tecla', '1992-04-01', 'm', 'Casado', '271950_68366be6a23bb_DuiEnfrente.jpg', '271950_68366be6a23c1_DuiReverso.jpg', '271950_68366be6a23c1_NIT.jpg', '271950_68366be6a23c1_FirmaDigital.png', 15),
(15, '12345432-3', '1234-532212-312-2', '2334-5643', '9796-8564', '2345-5222', 'Nueva Concepción, Chalatenango', 'Aco Emprendedores', 'Atención al Cliente', 'Colonia Escalón, Santa Tecla', '1998-09-16', 'm', 'Comprometido', '271956_68366d583544e_DuiEnfrente.jpg', '271956_68366d5835453_DuiReverso.jpg', '271956_68366d5835453_NIT.jpg', '271956_68366d5835453_FirmaDigital.png', 16),
(16, '43212345-2', '1235-232432-411-2', '2391-9239', '7382-9109', '2550-4161', 'Colonia Buena Vista, San Bartolo', 'Applaudo', 'Desarrollador', 'PLaza San Benito, San Salvador', '2001-01-08', 'm', 'Soltero', '272019_683672a75f33d_DuiEnfrente.jpg', '272019_683672a75f342_DuiReverso.jpg', '272019_683672a75f342_NIT.jpg', '272019_683672a75f342_FirmaDigital.png', 17),
(17, '23452123-4', '0023-230402-323-3', '2019-2392', '7293-8292', '2550-4161', 'Colonia Buena Vista. San Bartolo', 'Applaudo', 'Desarrollador', 'Plaza San Benito, San Salvador', '1999-12-01', 'm', 'Divorciado', '272024_683673f49c518_DuiEnfrente.jpg', '272024_683673f49c51e_DuiReverso.jpg', '272024_683673f49c51e_NIT.jpg', '272024_683673f49c51e_FirmaDigital.png', 18);

--
-- Triggers `detalleusuarios`
--
DELIMITER $$
CREATE TRIGGER `ComprobacionCompletarPerfilUsuarios` AFTER INSERT ON `detalleusuarios` FOR EACH ROW UPDATE usuarios SET completoperfil="si" WHERE idusuarios=NEW.idusuarios
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `historicocreditos`
--

CREATE TABLE `historicocreditos` (
  `idhistorico` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `montocredito` decimal(9,2) NOT NULL,
  `interescredito` float NOT NULL,
  `plazocredito` int(11) NOT NULL,
  `cuotamensual` decimal(9,2) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historicocreditos`
--

INSERT INTO `historicocreditos` (`idhistorico`, `idusuarios`, `idproducto`, `idcreditos`, `montocredito`, `interescredito`, `plazocredito`, `cuotamensual`, `estado`) VALUES
(1, 1, 2, 8, 1550.00, 10.05, 12, 168.48, 'cancelado'),
(2, 1, 2, 9, 340.00, 6, 6, 70.08, 'cancelado'),
(3, 8, 2, 13, 1500.00, 11.6, 12, 165.49, 'cancelado');

--
-- Triggers `historicocreditos`
--
DELIMITER $$
CREATE TRIGGER `HabilitarNuevasSolicitudesCrediticias_Clientes` AFTER INSERT ON `historicocreditos` FOR EACH ROW UPDATE usuarios SET habilitarnuevoscreditos="si" WHERE idusuarios=new.idusuarios
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `historicocuotascreditos`
--

CREATE TABLE `historicocuotascreditos` (
  `idhistorico` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `montocancelar` decimal(9,2) NOT NULL,
  `nombreproducto` varchar(255) NOT NULL,
  `montocapital` decimal(9,2) NOT NULL,
  `fechavencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historicocuotascreditos`
--

INSERT INTO `historicocuotascreditos` (`idhistorico`, `idcreditos`, `idproducto`, `idusuarios`, `montocancelar`, `nombreproducto`, `montocapital`, `fechavencimiento`) VALUES
(1, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-05-06'),
(2, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-06-06'),
(3, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-07-06'),
(4, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-08-08'),
(5, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-09-06'),
(6, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-10-06'),
(7, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-11-07'),
(8, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-12-06'),
(9, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-01-06'),
(10, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-02-06'),
(11, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-03-06'),
(12, 8, 2, 1, 168.48, 'Préstamos Personales', 129.17, '2025-04-06'),
(13, 9, 2, 1, 70.08, 'Préstamos Personales', 56.67, '2025-05-06'),
(14, 9, 2, 1, 70.08, 'Préstamos Personales', 56.67, '2025-06-06'),
(15, 9, 2, 1, 70.08, 'Préstamos Personales', 56.67, '2025-07-06'),
(16, 9, 2, 1, 70.08, 'Préstamos Personales', 56.67, '2025-08-08'),
(17, 9, 2, 1, 70.08, 'Préstamos Personales', 56.67, '2025-09-06'),
(18, 9, 2, 1, 70.08, 'Préstamos Personales', 56.67, '2025-10-06'),
(19, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-10-05'),
(20, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-11-07'),
(21, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-12-05'),
(22, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-01-05'),
(23, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-02-06'),
(24, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-03-06'),
(25, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-04-05'),
(26, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-05-05'),
(27, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-06-05'),
(28, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-07-05'),
(29, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-08-07'),
(30, 13, 2, 8, 165.49, 'Préstamos Personales', 125.00, '2025-09-05');

--
-- Triggers `historicocuotascreditos`
--
DELIMITER $$
CREATE TRIGGER `ComprobacionSolicitudCrediticiaCanceladaClientes_EnvioHistorico` AFTER INSERT ON `historicocuotascreditos` FOR EACH ROW UPDATE creditos SET enviaralhistorico="si" WHERE idcreditos =NEW.idcreditos
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `OcultarTransaccionesProcesadasPortalClientes_CreditosCancelados` AFTER INSERT ON `historicocuotascreditos` FOR EACH ROW UPDATE creditos SET ocultartransacciones_clientes="si" WHERE idcreditos=new.idcreditos
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `historicotransacciones`
--

CREATE TABLE `historicotransacciones` (
  `idhistoricotransaccion` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idcuotas` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `dias_incumplimiento` int(11) NOT NULL,
  `empleado_gestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historicotransacciones`
--

INSERT INTO `historicotransacciones` (`idhistoricotransaccion`, `idusuarios`, `idproducto`, `idcreditos`, `idcuotas`, `referencia`, `monto`, `fecha`, `dias_incumplimiento`, `empleado_gestion`) VALUES
(1, 1, 2, 8, 1, 'TCH#34d41aafcd', 168.48, '2025-04-07 17:11:35', 0, 'marco.almagro'),
(2, 1, 2, 8, 2, 'TCH#229b89be58', 168.48, '2025-04-07 17:11:45', 0, 'marco.almagro'),
(3, 1, 2, 8, 3, 'TCH#dea8c73929', 168.48, '2025-04-07 17:11:57', 0, 'marco.almagro'),
(4, 1, 2, 8, 4, 'TCH#1f4973ddf2', 168.48, '2025-04-07 17:12:13', 0, 'marco.almagro'),
(5, 1, 2, 8, 5, 'TCH#da52925946', 168.48, '2025-04-07 17:12:30', 0, 'marco.almagro'),
(6, 1, 2, 8, 6, 'TCH#c16b6cfb8b', 168.48, '2025-04-07 17:12:49', 0, 'marco.almagro'),
(7, 1, 2, 8, 7, 'TCH#6974b763c1', 168.48, '2025-04-07 17:13:00', 0, 'marco.almagro'),
(8, 1, 2, 8, 8, 'TCH#ae3f0c14bd', 168.48, '2025-04-07 17:13:11', 0, 'marco.almagro'),
(9, 1, 2, 8, 9, 'TCH#c63864c939', 168.48, '2025-04-07 17:13:20', 0, 'marco.almagro'),
(10, 1, 2, 8, 10, 'TCH#b2d3adde2f', 168.48, '2025-04-07 17:13:31', 0, 'marco.almagro'),
(11, 1, 2, 8, 11, 'TCH#99ef3a857e', 168.48, '2025-04-07 17:13:40', 0, 'marco.almagro'),
(12, 1, 2, 8, 12, 'TCH#6a92299bf2', 168.48, '2025-04-07 17:13:59', 0, 'marco.almagro'),
(13, 1, 2, 9, 13, 'TCH#6796adce31', 70.08, '2025-04-07 17:24:37', 0, 'daniel.rivera'),
(14, 1, 2, 9, 14, 'TCH#43d6bbe88b', 70.08, '2025-04-07 17:24:48', 0, 'daniel.rivera'),
(15, 1, 2, 9, 15, 'TCH#5328ffcee0', 70.08, '2025-04-07 17:25:15', 0, 'daniel.rivera'),
(16, 1, 2, 9, 16, 'TCH#c5a467a7a2', 70.08, '2025-04-07 17:25:28', 0, 'daniel.rivera'),
(17, 1, 2, 9, 17, 'TCH#a1a17cf1dc', 70.08, '2025-04-07 17:25:40', 0, 'daniel.rivera'),
(18, 1, 2, 9, 18, 'TCH#ac01b24e4c', 70.08, '2025-04-07 17:26:03', 0, 'daniel.rivera'),
(19, 1, 2, 10, 19, 'TCH#82517863ac', 155.07, '2025-04-07 17:32:35', 0, 'marco.almagro'),
(20, 1, 2, 10, 20, 'TCH#b35e19c00a', 155.07, '2025-04-07 17:32:50', 0, 'marco.almagro'),
(21, 1, 2, 10, 21, 'TCH#1cdd80a7fc', 155.07, '2025-04-07 17:33:04', 0, 'marco.almagro'),
(22, 10, 3, 11, 109, 'TCH#0ad1ad91a9', 20408.05, '2025-04-07 17:52:10', 0, 'marco.almagro'),
(23, 10, 3, 11, 110, 'TCH#7a64afb416', 20408.05, '2025-04-07 17:52:23', 0, 'marco.almagro'),
(24, 8, 2, 13, 379, 'TCH#9b28c94038', 165.49, '2025-09-06 00:45:53', 0, 'marco.almagro'),
(25, 8, 2, 13, 380, 'TCH#01a0db7d46', 165.49, '2025-09-06 00:46:04', 0, 'marco.almagro'),
(26, 8, 2, 13, 381, 'TCH#7851daf0f7', 165.49, '2025-09-06 00:46:16', 0, 'marco.almagro'),
(27, 8, 2, 13, 382, 'TCH#9adcc2a844', 165.49, '2025-09-06 00:46:26', 0, 'marco.almagro'),
(28, 8, 2, 13, 383, 'TCH#d64dc07e01', 165.49, '2025-09-06 00:46:36', 0, 'marco.almagro'),
(29, 8, 2, 13, 384, 'TCH#034fcadc1e', 165.49, '2025-09-06 00:46:46', 0, 'marco.almagro'),
(30, 8, 2, 13, 385, 'TCH#a9c7a1577b', 165.49, '2025-09-06 00:46:56', 0, 'marco.almagro'),
(31, 8, 2, 13, 386, 'TCH#1a4230b484', 165.49, '2025-09-06 00:47:05', 0, 'marco.almagro'),
(32, 8, 2, 13, 387, 'TCH#6042359520', 165.49, '2025-09-06 00:47:15', 0, 'marco.almagro'),
(33, 8, 2, 13, 388, 'TCH#b176a6c157', 165.49, '2025-09-06 00:47:25', 0, 'marco.almagro'),
(34, 8, 2, 13, 389, 'TCH#93e1f82f9c', 165.49, '2025-09-06 00:47:35', 0, 'marco.almagro'),
(35, 8, 2, 13, 390, 'TCH#8836f44f62', 165.49, '2025-09-06 00:47:55', 0, 'marco.almagro');

-- --------------------------------------------------------

--
-- Table structure for table `mensajeria`
--

CREATE TABLE `mensajeria` (
  `idmensajeria` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `nombremensaje` varchar(255) NOT NULL,
  `asuntomensaje` varchar(255) NOT NULL,
  `detallemensaje` varchar(5000) NOT NULL,
  `fechamensaje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idusuariosdestinatario` int(11) NOT NULL,
  `ocultarmensaje` char(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensajeria`
--

INSERT INTO `mensajeria` (`idmensajeria`, `idusuarios`, `nombremensaje`, `asuntomensaje`, `detallemensaje`, `fechamensaje`, `idusuariosdestinatario`, `ocultarmensaje`) VALUES
(1, 1, 'Bienvenida Portal', 'Saludos Cordiales', 'Por medio de la presente, quisiera expresarle la más sincera bienvenida como nuevo cliente de nuestra compañia. Esperamos suplir sus necesidades financieras y que todos sus planes sean de muchos éxitos.', '2025-03-24 05:13:28', 7, 'no'),
(2, 2, 'Reportes Fallos', 'Consulta gestiones reportes fallos', 'Buen día estimado, informar sobre la disponibilidad de reportes de fallos de plataforma para todos los usuarios y clientes.', '2025-03-25 05:44:15', 1, 'no');

--
-- Triggers `mensajeria`
--
DELIMITER $$
CREATE TRIGGER `EnvioNotificacionNuevosMensajesUsuarios` AFTER INSERT ON `mensajeria` FOR EACH ROW INSERT INTO notificaciones (idusuarios,titulonotificacion,descripcionnotificacion,clasificacionnotificacion) VALUES (new.idusuariosdestinatario,"Nuevo Mensaje Recibido","Por favor revisa tu bandeja de entrada, has recibido un nuevo mensaje","nuevomensaje")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idnotificacion` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `titulonotificacion` varchar(255) NOT NULL,
  `descripcionnotificacion` varchar(255) NOT NULL,
  `fechanotificacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `clasificacionnotificacion` varchar(100) NOT NULL,
  `ocultarnotificacion` char(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`idnotificacion`, `idusuarios`, `titulonotificacion`, `descripcionnotificacion`, `fechanotificacion`, `clasificacionnotificacion`, `ocultarnotificacion`) VALUES
(1, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#34d41aafcd', '2025-04-07 17:11:35', 'pagorecibido', 'no'),
(2, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#229b89be58', '2025-04-07 17:11:45', 'pagorecibido', 'no'),
(3, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#dea8c73929', '2025-04-07 17:11:57', 'pagorecibido', 'no'),
(4, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#1f4973ddf2', '2025-04-07 17:12:13', 'pagorecibido', 'no'),
(5, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#da52925946', '2025-04-07 17:12:30', 'pagorecibido', 'no'),
(6, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#c16b6cfb8b', '2025-04-07 17:12:49', 'pagorecibido', 'no'),
(7, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#6974b763c1', '2025-04-07 17:13:00', 'pagorecibido', 'no'),
(8, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#ae3f0c14bd', '2025-04-07 17:13:11', 'pagorecibido', 'no'),
(9, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#c63864c939', '2025-04-07 17:13:20', 'pagorecibido', 'no'),
(10, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#b2d3adde2f', '2025-04-07 17:13:31', 'pagorecibido', 'no'),
(11, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#99ef3a857e', '2025-04-07 17:13:40', 'pagorecibido', 'no'),
(12, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#6a92299bf2', '2025-04-07 17:13:59', 'pagorecibido', 'no'),
(13, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#6796adce31', '2025-04-07 17:24:37', 'pagorecibido', 'no'),
(14, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#43d6bbe88b', '2025-04-07 17:24:48', 'pagorecibido', 'no'),
(15, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#5328ffcee0', '2025-04-07 17:25:15', 'pagorecibido', 'no'),
(16, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#c5a467a7a2', '2025-04-07 17:25:28', 'pagorecibido', 'no'),
(17, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#a1a17cf1dc', '2025-04-07 17:25:40', 'pagorecibido', 'no'),
(18, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#ac01b24e4c', '2025-04-07 17:26:03', 'pagorecibido', 'no'),
(19, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#82517863ac', '2025-04-07 17:32:35', 'pagorecibido', 'no'),
(20, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#b35e19c00a', '2025-04-07 17:32:50', 'pagorecibido', 'no'),
(21, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#1cdd80a7fc', '2025-04-07 17:33:04', 'pagorecibido', 'no'),
(22, 10, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#0ad1ad91a9', '2025-04-07 17:52:10', 'pagorecibido', 'no'),
(23, 10, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#7a64afb416', '2025-04-07 17:52:23', 'pagorecibido', 'no'),
(24, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#82517863ac', '2025-04-08 05:52:49', 'pagorecibido', 'no'),
(25, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#b35e19c00a', '2025-04-08 05:52:49', 'pagorecibido', 'no'),
(26, 1, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#1cdd80a7fc', '2025-04-08 05:52:49', 'pagorecibido', 'no'),
(27, 10, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#0ad1ad91a9', '2025-04-08 05:52:49', 'pagorecibido', 'no'),
(28, 10, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#7a64afb416', '2025-04-08 05:52:49', 'pagorecibido', 'no'),
(29, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#9b28c94038', '2025-09-06 00:45:53', 'pagorecibido', 'no'),
(30, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#01a0db7d46', '2025-09-06 00:46:04', 'pagorecibido', 'no'),
(31, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#7851daf0f7', '2025-09-06 00:46:16', 'pagorecibido', 'no'),
(32, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#9adcc2a844', '2025-09-06 00:46:26', 'pagorecibido', 'no'),
(33, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#d64dc07e01', '2025-09-06 00:46:36', 'pagorecibido', 'no'),
(34, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#034fcadc1e', '2025-09-06 00:46:46', 'pagorecibido', 'no'),
(35, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#a9c7a1577b', '2025-09-06 00:46:56', 'pagorecibido', 'no'),
(36, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#1a4230b484', '2025-09-06 00:47:05', 'pagorecibido', 'no'),
(37, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#6042359520', '2025-09-06 00:47:15', 'pagorecibido', 'no'),
(38, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#b176a6c157', '2025-09-06 00:47:25', 'pagorecibido', 'no'),
(39, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#93e1f82f9c', '2025-09-06 00:47:35', 'pagorecibido', 'no'),
(40, 8, 'Pago Cuota Mensual Recibido', 'Pago efectuado con éxito referencia TCH#8836f44f62', '2025-09-06 00:47:55', 'pagorecibido', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombreproducto` varchar(255) NOT NULL,
  `descripcionproducto` varchar(255) NOT NULL,
  `requisitosproductos` varchar(1000) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idproducto`, `codigo`, `nombreproducto`, `descripcionproducto`, `requisitosproductos`, `estado`) VALUES
(1, 'CAhorrosPe-CHSA', 'Cuentas de Ahorro Personales', 'Cuentas de ahorro personales simples, sin libreta express.', 'Mayor de 18 años, apertura mínima de $25.00 USD, DUI o NIT.\r\nPoseer un crédito activo o bien tener un histórico de crédito anterior con la empresa.', 'activo'),
(2, 'PrPersonal-CHSA', 'Préstamos Personales', 'Préstamo pago en ventanilla, orientado a la consolidación de deudas, traslado de préstamos o  gastos personales.  Aplica para asalariados o profesional independiente.', 'Plazo máximo hasta 6 años,\r\nMontos desde $1,500 hasta $50,0000.\r\nEdad desde 21 hasta 70 años. Fotocopia de DUI Y NIT,\r\nAsalariado con 6 meses o más de laborar en la empresa (ingresos mínimos $600.00),\r\nEstado de cuenta de AFP,\r\nConstancia de salario vigente, debidamente sellada y firmada.\r\nCopia de recibo de agua, luz o teléfono fijo,\r\nEstados de cuenta vigentes de las deudas a cancelar\r\nProfesional independiente con 3 años en la gestión(ingreso mínimos de $1,200),\r\nPropietario que declara a título personal(ingresos mínimos de $5,100)\r\nUltimas 3 declaraciones de renta', 'activo'),
(3, 'PrHipoteca-CHSA', 'Préstamos Hipotecarios', 'Préstamos hipotecarios con tasas de interés competitivas, se financia hasta un 90% del valor total del inmueble', '', 'activo'),
(4, 'PrVehiculo-CHSA', 'Préstamos de Vehículos', 'Préstamo orientado a financiar la compra de vehículo nuevo exclusivamente (No aplica vehículos comerciales; Camiones, Buses, Microbuses)', 'Asalariados', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `recuperacion`
--

CREATE TABLE `recuperacion` (
  `idrecuperaciones` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) NOT NULL DEFAULT 'nousado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recuperacion`
--

INSERT INTO `recuperacion` (`idrecuperaciones`, `correo`, `token`, `codigo`, `fecha`, `estado`) VALUES
(1, 'dan@gmail.com', '973a9afcf6', 10236, '2025-03-23 02:15:43', 'nousado'),
(2, 'dan@gmail.com', '96540bceb5', 44571, '2025-03-29 02:41:38', 'nousado'),
(3, 'dan@gmail.com', '83e35e7792', 30483, '2025-03-29 02:48:10', 'usado'),
(4, 'dan@gmail.com', 'f3fdab2ff7', 89357, '2025-03-29 02:51:41', 'usado'),
(5, 'jp2004321@gmail.com', 'c51025f95a', 61423, '2025-05-26 22:51:09', 'nousado'),
(6, 'jp2004321@gmail.com', '6e569166bb', 55728, '2025-05-26 22:51:24', 'nousado'),
(7, 'jp2004321@gmail.com', '3a497f10da', 36150, '2025-05-26 22:52:21', 'nousado'),
(8, 'jp2004321@gmail.com', 'a6be3871fc', 34305, '2025-05-26 22:52:49', 'nousado'),
(9, 'jp2004321@gmail.com', '40da3caf29', 18277, '2025-05-26 23:12:19', 'nousado'),
(10, 'jp2004321@gmail.com', '981c4be488', 90265, '2025-05-26 23:14:37', 'nousado'),
(11, 'jp2004321@gmail.com', '2b79715c10', 33448, '2025-05-26 23:24:43', 'nousado'),
(12, 'jp2004321@gmail.com', '4c68cbb57c', 98523, '2025-05-27 00:42:11', 'nousado'),
(13, 'jp2004321@gmail.com', '0e3dc3c25f', 75997, '2025-05-27 00:46:40', 'usado');

-- --------------------------------------------------------

--
-- Table structure for table `referenciaspersonales`
--

CREATE TABLE `referenciaspersonales` (
  `idreferencias` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `nombres_referencia1` varchar(255) NOT NULL,
  `apellidos_referencia1` varchar(255) NOT NULL,
  `empresa_referencia1` varchar(255) NOT NULL,
  `profesion_oficioreferencia1` varchar(255) NOT NULL,
  `telefono_referencia1` varchar(9) NOT NULL,
  `nombres_referencia2` varchar(255) NOT NULL,
  `apellidos_referencia2` varchar(255) NOT NULL,
  `empresa_referencia2` varchar(255) NOT NULL,
  `profesion_oficioreferencia2` varchar(255) NOT NULL,
  `telefono_referencia2` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referenciaspersonales`
--

INSERT INTO `referenciaspersonales` (`idreferencias`, `idcreditos`, `idusuarios`, `idproducto`, `nombres_referencia1`, `apellidos_referencia1`, `empresa_referencia1`, `profesion_oficioreferencia1`, `telefono_referencia1`, `nombres_referencia2`, `apellidos_referencia2`, `empresa_referencia2`, `profesion_oficioreferencia2`, `telefono_referencia2`) VALUES
(3, 10, 1, 2, 'Maria del Carmen', 'Mendoza', 'SigmaQ', 'Jefa RR.HH', '7648-3838', 'Rosmi Adonay', 'Chavez', 'SIgmaQ', 'Despachador Operativo', '7738-4847'),
(4, 11, 10, 3, 'Joaquin', 'Topaz', 'Industrias Topaz', 'CEO', '7453-8447', 'Sandra Avila', 'Bahia', 'Textufil', 'CO-CEO', '7399-4858'),
(5, 12, 7, 4, 'Josue', 'Hernandez', 'Grupo Q', 'Vendedor / Atencion al Cliente', '7484-3993', 'Rodrigo', 'Mendoza', 'FUSALMO', 'Jefe Proyeccion Social', '7784-8747');

-- --------------------------------------------------------

--
-- Table structure for table `reporteproblemasplataforma`
--

CREATE TABLE `reporteproblemasplataforma` (
  `idreporte` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `nombrereporte` varchar(255) NOT NULL,
  `descripcionreporte` varchar(3000) NOT NULL,
  `fotoreporte` varchar(255) NOT NULL,
  `fecharegistroreporte` datetime NOT NULL,
  `fechaactualizacionreporte` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(50) NOT NULL,
  `comentarioactualizacion` varchar(3000) DEFAULT NULL,
  `empleado_gestion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(75) NOT NULL,
  `descripcionrol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idrol`, `nombrerol`, `descripcionrol`) VALUES
(1, 'administrador', 'Usuarios administradores, encargados del mantenimiento de Aco Emprendedores.'),
(2, 'presidencia', 'Usuarios del departamento de presidencia Aco Emprendedores, incluido CEO general de la empresa.'),
(3, 'gerencia', 'Todo el personal operativo del departamento de gerencia Aco Emprendedores'),
(4, 'atencionclientes', 'Todo el personal operativo del departamento de atención al cliente.'),
(5, 'clientes', 'Clientes Aco Emprendedores los cuales poseen al menos un producto asociado con la empresa');

-- --------------------------------------------------------

--
-- Table structure for table `transacciones`
--

CREATE TABLE `transacciones` (
  `idtransaccion` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idcuotas` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `dias_incumplimiento` int(11) NOT NULL,
  `empleado_gestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transacciones`
--

INSERT INTO `transacciones` (`idtransaccion`, `idusuarios`, `idproducto`, `idcreditos`, `idcuotas`, `referencia`, `monto`, `fecha`, `dias_incumplimiento`, `empleado_gestion`) VALUES
(19, 1, 2, 10, 19, 'TCH#82517863ac', 155.07, '2025-04-07 17:32:35', 0, 'marco.almagro'),
(20, 1, 2, 10, 20, 'TCH#b35e19c00a', 155.07, '2025-04-07 17:32:50', 0, 'marco.almagro'),
(21, 1, 2, 10, 21, 'TCH#1cdd80a7fc', 155.07, '2025-04-07 17:33:04', 0, 'marco.almagro'),
(22, 10, 3, 11, 109, 'TCH#0ad1ad91a9', 20408.05, '2025-04-07 17:52:10', 0, 'marco.almagro'),
(23, 10, 3, 11, 110, 'TCH#7a64afb416', 20408.05, '2025-04-07 17:52:23', 0, 'marco.almagro');

--
-- Triggers `transacciones`
--
DELIMITER $$
CREATE TRIGGER `CambioEstadoCancelacionCreditosClientes_UltimaCuotaPagada` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN

	-- VARIABLE DE DATO SALDO CREDITO CLIENTES

   DECLARE _saldocredito decimal(15,6);

   -- OBTENER LAS CONSULTA DE LOS DATOS REQUERIDOS

   SET

    _saldocredito := (

      SELECT saldocredito

      FROM creditos

      WHERE idcreditos = NEW.idcreditos

    );

   -- SI EL SALDO ES IGUAL A CERO "0" ENTONCES CLIENTE HA TERMINADO DE PAGAR SU RESPONSABILIDAD CREDITICIA Y AUTOMATICAMENTE EL CREDITO TOMA EL ESTADO << CANCELADO >>

   IF _saldocredito<1 THEN

   SET _saldocredito=0;

   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;

   END IF;

   IF _saldocredito<0 THEN

   SET _saldocredito=0;

   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;

   END IF;

   IF _saldocredito = 0 THEN

   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;

   END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CambioEstadoCrediticio_EstadoExcelenteCreditosClientes` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN
	-- VARIABLE GLOBAL PARA OBTENER CONSULTA
	DECLARE _cuotas_pagadas INT;
    DECLARE _estadocrediticio varchar(255);
 	SET
    	_cuotas_pagadas := (
      		SELECT cuotas_pagadas
      		FROM vista_contadorpagosatiempo_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    SET
    	_estadocrediticio := (
      		SELECT estadocrediticio
      		FROM vista_contadorpagosatiempo_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    -- SI CLIENTES NO PRESENTA MAYORES RETRASOS Y ES NUEVO CLIENTE, ESTADO SERA EXCELENTE
	IF _cuotas_pagadas>=10 THEN
    	IF _estadocrediticio="Nuevo Cliente" THEN
			UPDATE creditos SET estadocrediticio="Excelente" WHERE idcreditos = NEW.idcreditos;
       	END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CambioEstadoCuotasVencidas` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN
	DECLARE _incumplimiento_pago char(2);
    SET
    _incumplimiento_pago := (
      SELECT incumplimiento_pago
      FROM cuotas
      WHERE idcuotas = NEW.idcuotas
    );
    IF _incumplimiento_pago="SI" THEN
    	UPDATE cuotas SET incumplimiento_pago="PT" WHERE idcuotas=NEW.idcuotas; 
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CambioEstadoCuotas_OrdenPagoCreditosClientes` AFTER INSERT ON `transacciones` FOR EACH ROW UPDATE cuotas SET estadocuota="cancelado" WHERE idcuotas=new.idcuotas
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CambioEstadoRecordCrediticio_CreditocClientes` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN
	-- VARIABLE GLOBAL PARA OBTENER CONSULTA
	DECLARE _cuotas_pagadas_tarde INT;
 	SET
    	_cuotas_pagadas_tarde := (
      		SELECT cuotas_pagadas_tarde
      		FROM vista_contadorpagoscuotastardias_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    -- SI CLIENTE PRESENTA 2 RETRASOS, SERA REGULAR
	IF _cuotas_pagadas_tarde>=2 THEN
		UPDATE creditos SET estadocrediticio="Regular" WHERE idcreditos = NEW.idcreditos;
    -- SI CLIENTE PRESENTA MAS DE 5 RETRASOS, SERA DEFICIENTE
	IF _cuotas_pagadas_tarde>5 THEN
    	UPDATE creditos SET estadocrediticio="Deficiente" WHERE idcreditos = NEW.idcreditos;
	END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `EnvioNotificacionPagoRecibidoClientesCashmanHa` AFTER INSERT ON `transacciones` FOR EACH ROW INSERT INTO notificaciones (idusuarios,titulonotificacion,descripcionnotificacion,clasificacionnotificacion) SELECT CONCAT(new.idusuarios),CONCAT("Pago Cuota Mensual Recibido"),CONCAT("Pago efectuado con éxito referencia ",new.referencia),CONCAT("pagorecibido")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `RecalcularSaldoFinal_CreditosClientes` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocredito decimal(9,2);
   DECLARE _saldocredito decimal(15,6);
   DECLARE _plazocredito INT;
   DECLARE _idproducto INT;
    -- CALCULAR EL CAPITAL AUTOMATICAMENTE
   DECLARE calculocapital decimal(15,6);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocredito := (
      SELECT montocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   SET
    _plazocredito := (
      SELECT plazocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
    SET
    _idproducto := (
      SELECT idproducto
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   SET
    _saldocredito := (
      SELECT saldocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   -- CALCULO CAPITAL PRESTAMOS HIPOTECARIOS -> CONVERSION A MESES
   IF _idproducto=3 THEN
   SET calculocapital=_montocredito/(_plazocredito*12);
   -- CALCULO DEMÁS PRODUCTOS
   ELSE 
   SET calculocapital=_montocredito/_plazocredito;
   END IF;
   -- ACTUALIZAR CAPITAL DE CLIENTE ESPECIFICO
   UPDATE creditos SET saldocredito=saldocredito-calculocapital WHERE idcreditos=new.idcreditos;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `RegistroTransaccionesCuotasCreditosClientes_Historico` AFTER INSERT ON `transacciones` FOR EACH ROW INSERT INTO historicotransacciones (idusuarios,idproducto,idcreditos,idcuotas,referencia,monto,fecha,dias_incumplimiento,empleado_gestion) VALUES (NEW.idusuarios,NEW.idproducto,NEW.idcreditos,NEW.idcuotas,NEW.referencia,NEW.monto,NEW.fecha,NEW.dias_incumplimiento,NEW.empleado_gestion)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaccionescuentasclientes`
--

CREATE TABLE `transaccionescuentasclientes` (
  `idtransaccioncuentas` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcuentas` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `empleado_gestion` varchar(255) NOT NULL,
  `tipotransaccion` varchar(50) NOT NULL,
  `estadotransaccion` varchar(50) NOT NULL,
  `saldonuevocuenta_transaccion` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaccionescuentasclientes`
--

INSERT INTO `transaccionescuentasclientes` (`idtransaccioncuentas`, `idusuarios`, `idproducto`, `idcuentas`, `referencia`, `monto`, `fecha`, `empleado_gestion`, `tipotransaccion`, `estadotransaccion`, `saldonuevocuenta_transaccion`) VALUES
(1, 8, 1, 2, 'TDCA-CH#13f32b8d82018a4d', 2070.00, '2025-03-24 06:03:40', 'daniel.rivera', 'Entrada', 'Procesada', 2100.00),
(2, 7, 1, 1, 'TDCA-CH#a072a7f54a6ecf6e', 50.00, '2025-03-24 06:04:25', 'daniel.rivera', 'Entrada', 'Procesada', 400.00),
(3, 8, 1, 2, 'TOCCA-CH#0e49bd8bece245f08f', 75.00, '2025-03-24 06:07:21', 'Clientes', 'EnvioTransferencia', 'Procesada', 75.00),
(4, 7, 1, 2, 'TOCCA-CH#0e49bd8bece245f08f', 75.00, '2025-03-24 06:07:21', 'Clientes', 'DepositoTransferencia', 'Procesada', 75.00),
(5, 7, 1, 1, 'TRCA-CH#f67d08f667bc7de9', 50.00, '2025-03-25 02:53:14', 'daniel.rivera', 'Salida', 'Procesada', 425.00),
(6, 7, 1, 1, 'TRCA-CH#19507cbb5e5a449f', 25.00, '2025-03-25 02:56:39', 'daniel.rivera', 'Salida', 'Procesada', 400.00),
(7, 8, 1, 2, 'TRCA-CH#5ddf2092729922c1', 25.00, '2025-03-25 02:58:00', 'daniel.rivera', 'Salida', 'Procesada', 2000.00),
(8, 7, 1, 1, 'TDCA-CH#1ea65a9365e12dec', 1900.00, '2025-03-25 02:58:56', 'daniel.rivera', 'Entrada', 'Procesada', 2300.00),
(9, 7, 1, 1, 'TOCCA-CH#89da69d48b48eb23dd', 100.00, '2025-03-25 03:29:30', 'Clientes', 'EnvioTransferencia', 'Procesada', 100.00),
(10, 8, 1, 1, 'TOCCA-CH#89da69d48b48eb23dd', 100.00, '2025-03-25 03:29:30', 'Clientes', 'DepositoTransferencia', 'Procesada', 100.00),
(11, 9, 1, 3, 'TDCA-CH#d50c7a5860aa1db8', 3000.00, '2025-03-25 04:44:42', 'marco.almagro', 'Entrada', 'Procesada', 6500.00);

--
-- Triggers `transaccionescuentasclientes`
--
DELIMITER $$
CREATE TRIGGER `AnularTransaccionesCuentasClientes` AFTER UPDATE ON `transaccionescuentasclientes` FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _estadotransaccion varchar(50);
   DECLARE _monto decimal(9,2);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _estadotransaccion := (
      SELECT estadotransaccion
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    SET
    _monto := (
      SELECT monto
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
   -- CALCULO REINTEGRO TRANSACCION ANULADA A CUENTAS DE CLIENTES
   IF _estadotransaccion="AnularRetiro" THEN
   UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentas;
   END IF;
   IF _estadotransaccion="AnularDeposito" THEN
   UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
   END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `RecalcularSaldoFinal_CuentasAhorroClientes` AFTER INSERT ON `transaccionescuentasclientes` FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE _tipotransaccion varchar(50);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    SET
    _tipotransaccion := (
      SELECT tipotransaccion
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    -- VALIDAR SI EL CLIENTE REALIZA UN DEPOSITO O RETIRO A SU CUENTA
    IF (_tipotransaccion = "Entrada") THEN
    UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentas;
    END IF;
    IF (_tipotransaccion = "Salida") THEN
    UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transferencias`
--

CREATE TABLE `transferencias` (
  `idtransferencia` int(11) NOT NULL,
  `numerocuenta` int(11) DEFAULT NULL,
  `monto` decimal(9,2) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) DEFAULT 'NoProcesado',
  `idusuarios` int(11) DEFAULT NULL,
  `idusuariodestino` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idcuentas` int(11) DEFAULT NULL,
  `idcuentadestino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transferencias`
--

INSERT INTO `transferencias` (`idtransferencia`, `numerocuenta`, `monto`, `referencia`, `fecha`, `estado`, `idusuarios`, `idusuariodestino`, `idproducto`, `idcuentas`, `idcuentadestino`) VALUES
(1, 101462573, 75.00, 'TOCCA-CH#0e49bd8bece245f08f', '2025-03-24 06:07:21', 'Procesada', 8, 7, 1, 2, 1),
(2, 104176523, 100.00, 'TOCCA-CH#89da69d48b48eb23dd', '2025-03-25 03:29:30', 'Procesada', 7, 8, 1, 1, 2);

--
-- Triggers `transferencias`
--
DELIMITER $$
CREATE TRIGGER `RecalcularSaldoFinal_TransferenciasClientes` AFTER INSERT ON `transferencias` FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE _tipotransaccion varchar(50);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transferencias
      WHERE idtransferencia   = NEW.idtransferencia  
    ); 
    -- RESTAR SALDO DE TRANSFERENCIA CUENTA DE ORIGEN CLIENTE
    UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
    -- SUMAR SALDO A FAVOR DE TRANSFERENCIA RECIBIDA CLIENTE
    UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentadestino;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `RegistroMovimientosTransferencias_EnvioTransferencias` AFTER INSERT ON `transferencias` FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE montocuenta decimal(9,2);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
    SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transferencias
      WHERE idtransferencia   = NEW.idtransferencia  
    ); 
    -- REGISTRAR MOVIMIENTO ENVIO DE TRANSFERENCIA CLIENTES
    INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES(new.idusuarios,new.idproducto,new.idcuentas,new.referencia,new.monto,"Clientes","EnvioTransferencia","Procesada",_monto);
    INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES(new.idusuariodestino,new.idproducto,new.idcuentas,new.referencia,new.monto,"Clientes","DepositoTransferencia","Procesada",_monto);
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `codigousuario` varchar(255) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fotoperfil` varchar(255) DEFAULT 'foto_usuarios_nuevos.png',
  `idrol` int(11) NOT NULL,
  `estado_usuario` varchar(25) NOT NULL DEFAULT 'activo',
  `completoperfil` varchar(2) NOT NULL DEFAULT 'no',
  `habilitarsistema` char(2) NOT NULL DEFAULT 'no',
  `nuevousuario` char(2) NOT NULL DEFAULT 'si',
  `poseecuenta` char(2) NOT NULL DEFAULT 'no',
  `poseecredito` char(2) NOT NULL DEFAULT 'no',
  `habilitarnuevoscreditos` char(2) NOT NULL DEFAULT 'si',
  `quienregistro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombres`, `apellidos`, `codigousuario`, `contrasenia`, `correo`, `fotoperfil`, `idrol`, `estado_usuario`, `completoperfil`, `habilitarsistema`, `nuevousuario`, `poseecuenta`, `poseecredito`, `habilitarnuevoscreditos`, `quienregistro`) VALUES
(1, 'Daniel', 'Rivera', 'daniel.rivera', 'prueba1234', 'dan@gmail.com', '211543_6214078166f67_b2.PNG', 1, 'activo', 'si', 'si', 'no', 'si', 'si', 'si', 'daniel.rivera'),
(2, 'Norma', 'Boix', 'norma.boix', 'f7GC9/YfeAzBc', 'normaboix@yahoo.es', 'foto_usuarios_nuevos.png', 1, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'daniel.rivera'),
(3, 'Avelino', 'Blanco', 'avelino.blanco', 'f7GC9/YfeAzBc', 'avelinoblanco@gmail.com', 'foto_usuarios_nuevos.png', 1, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'daniel.rivera'),
(4, 'Ester', 'Cuenca', 'ester.cuenca', 'f7GC9/YfeAzBc', 'estercuenca@gmail.com', 'foto_usuarios_nuevos.png', 2, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'daniel.rivera'),
(5, 'Faustino', 'Padron', 'faustino.padron', 'f7GC9/YfeAzBc', 'faustopadron@gmail.com', 'foto_usuarios_nuevos.png', 3, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'daniel.rivera'),
(6, 'Marco', 'Almagro', 'marco.almagro', 'f7GC9/YfeAzBc', 'marco111@gmail.com', 'foto_usuarios_nuevos.png', 4, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'daniel.rivera'),
(7, 'Jenifer Abigail', 'Castañeda', 'jenifer.abigail', 'f7GC9/YfeAzBc', 'jeniferabg@gmail.com', 'foto_usuarios_nuevos.png', 5, 'activo', 'si', 'si', 'no', 'si', 'no', 'si', 'daniel.rivera'),
(8, 'Maria Cristina', 'Frances Rosas', 'maria.frances', 'f7GC9/YfeAzBc', 'mariacristinaf@yahoo.com', 'foto_usuarios_nuevos.png', 5, 'inactivo', 'si', 'si', 'no', 'si', 'no', 'si', 'daniel.rivera'),
(9, 'Luz Mancebo', 'Llabrés', 'luz.mancebo', 'f7GC9/YfeAzBc', 'luzmcllabres@gmail.com', 'foto_usuarios_nuevos.png', 5, 'bloqueado', 'si', 'si', 'no', 'si', 'no', 'si', 'daniel.rivera'),
(10, 'Leonel Alexander', 'Franco González', 'leonel.franco', 'e1LW4NPXPhoo.', 'modificarcorreoreal@gmail.com', 'foto_usuarios_nuevos.png', 5, 'activo', 'si', 'si', 'si', 'si', 'no', 'si', 'daniel.rivera'),
(11, 'Javier Ernesto', 'Ponce Díaz', 'javier.ponce', 'f7GC9/YfeAzBc', 'javierponcedi1@yahoo.es', 'foto_usuarios_nuevos.png', 5, 'bloqueado', 'si', 'si', 'no', 'no', 'no', 'si', 'daniel.rivera'),
(12, 'Juan', 'Pérez', 'j.perez', 'bbgdsIzj0umBk', 'jp2004321@gmail.com', 'foto_usuarios_nuevos.png', 1, 'activo', 'si', 'si', 'no', 'si', 'si', 'si', 'daniel.rivera'),
(14, 'Abner', 'Rivera', 'abner.rivera', 'f1S4MU2hsrV1.', 'abner@gmail.com', 'foto_usuarios_nuevos.png', 2, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'j.perez'),
(15, 'Andrés', 'Navidad', 'andres.navidad', '5c.F7AQkrSGIs', 'andres@gmail.com', 'foto_usuarios_nuevos.png', 3, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'j.perez'),
(16, 'Mario', 'Alvarado', 'mario.alvarado', 'e1tyhrmC1Y3tY', 'mario@gmail.com', 'foto_usuarios_nuevos.png', 4, 'activo', 'si', 'no', 'no', 'no', 'no', 'si', 'j.perez'),
(17, 'Kenneth', 'Mongue', 'kenneth.mongue', 'f1ByUFt6nZ3Jc', 'kenneth@gmail.com', 'foto_usuarios_nuevos.png', 5, 'activo', 'si', 'si', 'no', 'si', 'no', 'si', 'j.perez'),
(18, 'Derek', 'Mongue', 'derek.mongue', '40vfEpsCALzIk', 'derek@gmail.com', 'foto_usuarios_nuevos.png', 5, 'activo', 'si', 'si', 'no', 'si', 'no', 'si', 'j.perez');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_bandejaentradamensajescashmanha`
-- (See below for the actual view)
--
CREATE TABLE `vista_bandejaentradamensajescashmanha` (
`idmensajeria` int(11)
,`idusuarios` int(11)
,`idusuariosdestinatario` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`fotoperfil` varchar(255)
,`nombremensaje` varchar(255)
,`asuntomensaje` varchar(255)
,`detallemensaje` varchar(5000)
,`fechamensaje` timestamp
,`ocultarmensaje` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculaduracioncodigoseguridad_transferencias`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculaduracioncodigoseguridad_transferencias` (
`idcodigo` int(11)
,`codigoseguridad` int(11)
,`minutos_expiracion` varchar(21)
,`estado` varchar(50)
,`idusuarios` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculocuentasahorooregistradas_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculocuentasahorooregistradas_interfaces` (
`numero_cuentasahorro_registradas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculocuotasregistradas_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculocuotasregistradas_interfaces` (
`numero_cuotas_registrados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculocuotasvencidas_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculocuotasvencidas_interfaces` (
`numero_cuotas_vencidas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculodiasfechavencimiento_cuotasclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculodiasfechavencimiento_cuotasclientes` (
`idcuotas` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`montocancelar` decimal(9,2)
,`estadocuota` varchar(30)
,`fechavencimiento` date
,`incumplimiento_pago` char(2)
,`dias_incumplimiento` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculoexpiracion_codigocambiocredencialesusuarios`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculoexpiracion_codigocambiocredencialesusuarios` (
`idrecuperaciones` int(11)
,`correo` varchar(255)
,`token` varchar(255)
,`codigo` int(11)
,`minutos_expiracion` varchar(21)
,`estado` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculoingresostransacciones_empleadosatencionclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculoingresostransacciones_empleadosatencionclientes` (
`empleado_gestion` varchar(255)
,`monto_transacciones_empleados` decimal(31,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculonumerocuotascanceladas_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculonumerocuotascanceladas_interfaces` (
`numero_cuotas_canceladas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculonumerocuotaspagadastarde_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculonumerocuotaspagadastarde_interfaces` (
`numero_cuotas_pagadas_tarde` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculonumerotransferencias_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculonumerotransferencias_interfaces` (
`numero_transferencias` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculoproductosregistrados_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculoproductosregistrados_interfaces` (
`numero_productos_registrados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculotransaccionescreditos_interfaces`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculotransaccionescreditos_interfaces` (
`numero_transacciones_creditos` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_calculo_ultimaactividad_ticketsreportesplataforma`
-- (See below for the actual view)
--
CREATE TABLE `vista_calculo_ultimaactividad_ticketsreportesplataforma` (
`idreporte` int(11)
,`idusuarios` int(11)
,`codigousuario` varchar(255)
,`estado` varchar(50)
,`dias_ultima_actividad` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_codigosseguridadtransferenciasclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_codigosseguridadtransferenciasclientes` (
`idcodigo` int(11)
,`codigoseguridad` int(11)
,`fecha` timestamp
,`estado` varchar(50)
,`idusuarios` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_configuracionusuariosgeneral`
-- (See below for the actual view)
--
CREATE TABLE `vista_configuracionusuariosgeneral` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`correo` varchar(255)
,`fotoperfil` varchar(255)
,`estado_usuario` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacalculoavancecreditos_interfazclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacalculoavancecreditos_interfazclientes` (
`idcreditos` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`nombreproducto` varchar(255)
,`codigo` varchar(255)
,`interescredito` float
,`cuotamensual` decimal(9,2)
,`montocredito` decimal(9,2)
,`plazocredito` int(11)
,`enviaralhistorico` char(2)
,`cuotas_canceladas` bigint(21)
,`montocapital` decimal(9,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacalculocuotascanceladas_creditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacalculocuotascanceladas_creditosclientes` (
`idcreditos` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`montocapital` decimal(9,2)
,`cuotas_canceladas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaclientesmorosos`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaclientesmorosos` (
`idcuotas` int(11)
,`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`dui` varchar(10)
,`nombreproducto` varchar(255)
,`montocancelar` decimal(9,2)
,`estadocuota` varchar(30)
,`fechavencimiento` date
,`incumplimiento_pago` char(2)
,`dias_incumplimiento` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaclientes_creditoscancelados`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaclientes_creditoscancelados` (
`idhistorico` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`idcreditos` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`fotoperfil` varchar(255)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`estado` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacompletanuevassolicitudescreditosclientesgestiones`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacompletanuevassolicitudescreditosclientesgestiones` (
`idusuarios` int(11)
,`idcreditos` int(11)
,`idproducto` int(11)
,`tipocliente` varchar(50)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`saldocredito` decimal(15,6)
,`fechasolicitud` date
,`salariocliente` decimal(9,2)
,`progreso_solicitud` tinyint(4)
,`estado` varchar(30)
,`observaciones` varchar(1500)
,`observacion_gerencia` varchar(1500)
,`observacion_presidencia` varchar(1500)
,`usuario_empleado` varchar(255)
,`cuotas_generadas` char(2)
,`estadocrediticio` varchar(255)
,`proceso_finalizado` char(2)
,`enviaralhistorico` char(2)
,`creditoactivo` char(2)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`fotoperfil` varchar(255)
,`idrol` int(11)
,`dui` varchar(10)
,`nit` varchar(17)
,`telefono` varchar(9)
,`celular` varchar(9)
,`telefonotrabajo` varchar(9)
,`direccion` varchar(255)
,`empresa` varchar(255)
,`cargo` varchar(255)
,`direcciontrabajo` varchar(255)
,`fechanacimiento` date
,`nombres_referencia1` varchar(255)
,`apellidos_referencia1` varchar(255)
,`empresa_referencia1` varchar(255)
,`profesion_oficioreferencia1` varchar(255)
,`telefono_referencia1` varchar(9)
,`nombres_referencia2` varchar(255)
,`apellidos_referencia2` varchar(255)
,`empresa_referencia2` varchar(255)
,`profesion_oficioreferencia2` varchar(255)
,`telefono_referencia2` varchar(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacompletausuariosdetalles`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacompletausuariosdetalles` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`correo` varchar(255)
,`fotoperfil` varchar(255)
,`idrol` int(11)
,`estado_usuario` varchar(25)
,`completoperfil` varchar(2)
,`quienregistro` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`telefono` varchar(9)
,`celular` varchar(9)
,`telefonotrabajo` varchar(9)
,`direccion` varchar(255)
,`empresa` varchar(255)
,`cargo` varchar(255)
,`direcciontrabajo` varchar(255)
,`fechanacimiento` date
,`genero` char(1)
,`estadocivil` varchar(30)
,`fotoduifrontal` varchar(255)
,`fotoduireverso` varchar(255)
,`fotonit` varchar(255)
,`fotofirma` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacopiascontrato_suscritocreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacopiascontrato_suscritocreditosclientes` (
`idusuarios` int(11)
,`copiacontratocliente` varchar(255)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacuotasgeneradas_creditosaprobadosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacuotasgeneradas_creditosaprobadosclientes` (
`idcuotas` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`idcreditos` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`fotoperfil` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`montocancelar` decimal(9,2)
,`estadocuota` varchar(30)
,`nombreproducto` varchar(255)
,`montocapital` decimal(9,2)
,`fechavencimiento` date
,`incumplimiento_pago` char(2)
,`dias_incumplimiento` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultacuotashistoricocreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultacuotashistoricocreditosclientes` (
`idhistoricotransaccion` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`idcreditos` int(11)
,`idcuotas` int(11)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`referencia` varchar(255)
,`montocancelar` decimal(9,2)
,`fecha` timestamp
,`dias_incumplimiento` int(11)
,`empleado_gestion` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultadatosprestamosdevehiculosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultadatosprestamosdevehiculosclientes` (
`iddatosvehiculos` int(11)
,`idcreditos` int(11)
,`idproducto` int(11)
,`idusuarios` int(11)
,`placa` varchar(8)
,`clase` varchar(30)
,`anio` int(11)
,`capacidad` varchar(5)
,`asientos` varchar(5)
,`marca` varchar(255)
,`modelo` varchar(255)
,`numeromotor` varchar(17)
,`chasisgrabado` varchar(17)
,`chasisvin` varchar(17)
,`color` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultadetallecompletotransaccionescuentasclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultadetallecompletotransaccionescuentasclientes` (
`idtransaccioncuentas` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`idcuentas` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`numerocuenta` int(12)
,`referencia` varchar(255)
,`monto` decimal(9,2)
,`fecha` timestamp
,`empleado_gestion` varchar(255)
,`tipotransaccion` varchar(50)
,`estadotransaccion` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultadetallesinterfazpresidencia`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultadetallesinterfazpresidencia` (
`numero_productos_registrados` bigint(21)
,`numero_cuotas_registrados` bigint(21)
,`numero_cuentasahorro_registradas` bigint(21)
,`numero_transacciones_creditos` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultadetallessolicitudescreditosaprobadosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultadetallessolicitudescreditosaprobadosclientes` (
`idusuarios` int(11)
,`idcreditos` int(11)
,`idproducto` int(11)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`fechasolicitud` date
,`estado` varchar(30)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`correo` varchar(255)
,`fotoperfil` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaestadosolicitudcredito_portalclientesbienvenida`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaestadosolicitudcredito_portalclientesbienvenida` (
`idusuarios` int(11)
,`estado` varchar(30)
,`progreso_solicitud` tinyint(4)
,`nombreproducto` varchar(255)
,`codigo` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaexistenciacuotasmensualesclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaexistenciacuotasmensualesclientes` (
`idcuotas` int(11)
,`idcreditos` int(11)
,`idproducto` int(11)
,`idusuarios` int(11)
,`nombreproducto` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaexistenciareferenciasclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaexistenciareferenciasclientes` (
`idreferencias` int(11)
,`idcreditos` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`nombres_referencia1` varchar(255)
,`apellidos_referencia1` varchar(255)
,`empresa_referencia1` varchar(255)
,`profesion_oficioreferencia1` varchar(255)
,`telefono_referencia1` varchar(9)
,`nombres_referencia2` varchar(255)
,`apellidos_referencia2` varchar(255)
,`empresa_referencia2` varchar(255)
,`profesion_oficioreferencia2` varchar(255)
,`telefono_referencia2` varchar(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultageneralreestructuracioncreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultageneralreestructuracioncreditosclientes` (
`idusuarios` int(11)
,`idcreditos` int(11)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`estado` varchar(30)
,`fechasolicitud` date
,`cuotas_generadas` char(2)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`fotoperfil` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultageneralusuarios`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultageneralusuarios` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`correo` varchar(255)
,`fotoperfil` varchar(255)
,`idrol` int(11)
,`estado_usuario` varchar(25)
,`completoperfil` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultalistadogeneralcuentasahorrosregistradas`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultalistadogeneralcuentasahorrosregistradas` (
`idcuentas` int(11)
,`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`fotoperfil` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`numerocuenta` int(12)
,`montocuenta` decimal(9,2)
,`estadocuenta` varchar(50)
,`fechaapertura` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultanuevo_prestamopersonal_asignado_clientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultanuevo_prestamopersonal_asignado_clientes` (
`idproducto` int(11)
,`idcreditos` int(11)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`fechasolicitud` date
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`progreso_solicitud` tinyint(4)
,`progreso_pagocredito` tinyint(4)
,`estado` varchar(30)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`idusuarios` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultanumeroreportesfallasplataformageneral`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultanumeroreportesfallasplataformageneral` (
`numero_reportes_registrados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultanumerosolicitudesrecuperaciones`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultanumerosolicitudesrecuperaciones` (
`numero_solicitudes_recuperaciones` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaproductosnuevoscreditos`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaproductosnuevoscreditos` (
`idproducto` int(11)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`estado` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultaproductosregistrados`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultaproductosregistrados` (
`numero_productos_registrados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultardisponibilidadnuevoscreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultardisponibilidadnuevoscreditosclientes` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`habilitarnuevoscreditos` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultareportesfallosplataforma`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultareportesfallosplataforma` (
`idreporte` int(11)
,`idusuarios` int(11)
,`codigousuario` varchar(255)
,`nombrereporte` varchar(255)
,`descripcionreporte` varchar(3000)
,`fotoreporte` varchar(255)
,`fecharegistroreporte` datetime
,`fechaactualizacionreporte` timestamp
,`estado` varchar(50)
,`comentarioactualizacion` varchar(3000)
,`empleado_gestion` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultatransaccionesclientesgeneral`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultatransaccionesclientesgeneral` (
`idcuotas` int(11)
,`idusuarios` int(11)
,`referencia` varchar(255)
,`monto` decimal(9,2)
,`fecha` timestamp
,`empleado_gestion` varchar(255)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`habilitarnuevoscreditos` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultatransaccionescuentasclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultatransaccionescuentasclientes` (
`idtransaccioncuentas` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`idcuentas` int(11)
,`numerocuenta` int(12)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`referencia` varchar(255)
,`monto` decimal(9,2)
,`fecha` timestamp
,`empleado_gestion` varchar(255)
,`tipotransaccion` varchar(50)
,`estadotransaccion` varchar(50)
,`saldonuevocuenta_transaccion` decimal(9,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`dui` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consultausuariosregistrados`
-- (See below for the actual view)
--
CREATE TABLE `vista_consultausuariosregistrados` (
`numero_usuarios_registrados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consulta_asignarnuevoscreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_consulta_asignarnuevoscreditosclientes` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`correo` varchar(255)
,`fotoperfil` varchar(255)
,`completoperfil` varchar(2)
,`estado_usuario` varchar(25)
,`habilitarnuevoscreditos` char(2)
,`dui` varchar(10)
,`nit` varchar(17)
,`telefono` varchar(9)
,`celular` varchar(9)
,`telefonotrabajo` varchar(9)
,`direccion` varchar(255)
,`empresa` varchar(255)
,`cargo` varchar(255)
,`direcciontrabajo` varchar(255)
,`fechanacimiento` date
,`genero` char(1)
,`estadocivil` varchar(30)
,`fotoduifrontal` varchar(255)
,`fotoduireverso` varchar(255)
,`fotonit` varchar(255)
,`fotofirma` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_consulta_datosgeneralesresultadosinicioadmins`
-- (See below for the actual view)
--
CREATE TABLE `vista_consulta_datosgeneralesresultadosinicioadmins` (
`numero_usuarios_registrados` bigint(21)
,`numero_productos_registrados` bigint(21)
,`numero_reportes_registrados` bigint(21)
,`numero_solicitudes_recuperaciones` bigint(21)
,`numero_cuotas` bigint(21)
,`numero_transacciones` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_contadorcreditosgestionados_empleadosatencionclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_contadorcreditosgestionados_empleadosatencionclientes` (
`usuario_empleado` varchar(255)
,`numero_creditos_gestionados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_contadorincumplimientopagoscreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_contadorincumplimientopagoscreditosclientes` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`total_incumplimientos_pagos` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_contadorpagosatiempo_creditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_contadorpagosatiempo_creditosclientes` (
`idusuarios` int(11)
,`idcreditos` int(11)
,`idcuotas` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`estadocrediticio` varchar(255)
,`cuotas_pagadas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_contadorpagoscuotastardias_creditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_contadorpagoscuotastardias_creditosclientes` (
`idusuarios` int(11)
,`idcreditos` int(11)
,`idcuotas` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`estadocrediticio` varchar(255)
,`cuotas_pagadas_tarde` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_contadortransacciones_empleadosatencionclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_contadortransacciones_empleadosatencionclientes` (
`numero_transacciones_empleados_atencionclientes` bigint(21)
,`empleado_gestion` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_datosgeneralescreditoscanceladoshistoricoclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_datosgeneralescreditoscanceladoshistoricoclientes` (
`idhistorico` int(11)
,`idproducto` int(11)
,`idusuarios` int(11)
,`idcreditos` int(11)
,`montocredito` decimal(9,2)
,`interescredito` float
,`plazocredito` int(11)
,`cuotamensual` decimal(9,2)
,`estado` varchar(30)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`fotoperfil` varchar(255)
,`nombreproducto` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_detallecompletotransaccionesempleados`
-- (See below for the actual view)
--
CREATE TABLE `vista_detallecompletotransaccionesempleados` (
`idtransaccion` int(11)
,`idusuarios` int(11)
,`idproducto` int(11)
,`idcreditos` int(11)
,`idcuotas` int(11)
,`referencia` varchar(255)
,`monto` decimal(9,2)
,`fecha` timestamp
,`dias_incumplimiento` int(11)
,`empleado_gestion` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_detalleinterfazgerencia`
-- (See below for the actual view)
--
CREATE TABLE `vista_detalleinterfazgerencia` (
`numero_productos_registrados` bigint(21)
,`numero_cuotas_registrados` bigint(21)
,`numero_cuentasahorro_registradas` bigint(21)
,`numero_transacciones_creditos` bigint(21)
,`numero_cuotas_pagadas_tarde` bigint(21)
,`numero_cuotas_canceladas` bigint(21)
,`numero_transferencias` bigint(21)
,`numero_cuotas_vencidas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_detallesfacturacioncreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_detallesfacturacioncreditosclientes` (
`idcuotas` int(11)
,`idcreditos` int(11)
,`idproducto` int(11)
,`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`cuotamensual` decimal(9,2)
,`montocancelar` decimal(9,2)
,`nombreproducto` varchar(255)
,`codigo` varchar(255)
,`montocapital` decimal(9,2)
,`fechavencimiento` date
,`referencia` varchar(255)
,`fecha` timestamp
,`dias_incumplimiento` int(11)
,`empleado_gestion` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_detallesfacturacioncreditosclienteshistoricos`
-- (See below for the actual view)
--
CREATE TABLE `vista_detallesfacturacioncreditosclienteshistoricos` (
`idhistoricotransaccion` int(11)
,`idusuarios` int(11)
,`idcreditos` int(11)
,`idcuotas` int(11)
,`idproducto` int(11)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`dui` varchar(10)
,`nit` varchar(17)
,`referencia` varchar(255)
,`montocredito` decimal(9,2)
,`cuotamensual` decimal(9,2)
,`montocancelar` decimal(9,2)
,`fecha` timestamp
,`dias_incumplimiento` int(11)
,`empleado_gestion` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_detallesusuarios`
-- (See below for the actual view)
--
CREATE TABLE `vista_detallesusuarios` (
`iddetalle` int(11)
,`dui` varchar(10)
,`nit` varchar(17)
,`telefono` varchar(9)
,`celular` varchar(9)
,`telefonotrabajo` varchar(9)
,`direccion` varchar(255)
,`empresa` varchar(255)
,`cargo` varchar(255)
,`direcciontrabajo` varchar(255)
,`fechanacimiento` date
,`genero` char(1)
,`estadocivil` varchar(30)
,`idusuarios` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_notificacionesrecibidasusuarios`
-- (See below for the actual view)
--
CREATE TABLE `vista_notificacionesrecibidasusuarios` (
`idnotificacion` int(11)
,`idusuarios` int(11)
,`titulonotificacion` varchar(255)
,`descripcionnotificacion` varchar(255)
,`fechanotificacion` timestamp
,`clasificacionnotificacion` varchar(100)
,`ocultarnotificacion` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_numerocuotasregistradas`
-- (See below for the actual view)
--
CREATE TABLE `vista_numerocuotasregistradas` (
`numero_cuotas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_numerotransaccionesprocesadas`
-- (See below for the actual view)
--
CREATE TABLE `vista_numerotransaccionesprocesadas` (
`numero_transacciones` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_productoscashmanha`
-- (See below for the actual view)
--
CREATE TABLE `vista_productoscashmanha` (
`idproducto` int(11)
,`codigo` varchar(255)
,`nombreproducto` varchar(255)
,`descripcionproducto` varchar(255)
,`requisitosproductos` varchar(1000)
,`estado` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_reporteiniciosdesesiones`
-- (See below for the actual view)
--
CREATE TABLE `vista_reporteiniciosdesesiones` (
`idacceso` int(11)
,`fechaacceso` timestamp
,`dispositivo` varchar(255)
,`sistemaoperativo` varchar(255)
,`idusuarios` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_rolesdeusuarioscompleto`
-- (See below for the actual view)
--
CREATE TABLE `vista_rolesdeusuarioscompleto` (
`idrol` int(11)
,`nombrerol` varchar(75)
,`descripcionrol` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_transaccionespagocuotascreditosclientes`
-- (See below for the actual view)
--
CREATE TABLE `vista_transaccionespagocuotascreditosclientes` (
`idtransaccion` int(11)
,`idusuarios` int(11)
,`idcuotas` int(11)
,`referencia` varchar(255)
,`monto` decimal(9,2)
,`fecha` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_usuariosperfilincompleto`
-- (See below for the actual view)
--
CREATE TABLE `vista_usuariosperfilincompleto` (
`idusuarios` int(11)
,`nombres` varchar(255)
,`apellidos` varchar(255)
,`codigousuario` varchar(255)
,`correo` varchar(255)
,`fotoperfil` varchar(255)
,`idrol` int(11)
,`estado_usuario` varchar(25)
,`completoperfil` varchar(2)
,`quienregistro` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vista_bandejaentradamensajescashmanha`
--
DROP TABLE IF EXISTS `vista_bandejaentradamensajescashmanha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_bandejaentradamensajescashmanha`  AS SELECT `mensajeria`.`idmensajeria` AS `idmensajeria`, `mensajeria`.`idusuarios` AS `idusuarios`, `mensajeria`.`idusuariosdestinatario` AS `idusuariosdestinatario`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`fotoperfil` AS `fotoperfil`, `mensajeria`.`nombremensaje` AS `nombremensaje`, `mensajeria`.`asuntomensaje` AS `asuntomensaje`, `mensajeria`.`detallemensaje` AS `detallemensaje`, `mensajeria`.`fechamensaje` AS `fechamensaje`, `mensajeria`.`ocultarmensaje` AS `ocultarmensaje` FROM (`mensajeria` left join `usuarios` on(`mensajeria`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculaduracioncodigoseguridad_transferencias`
--
DROP TABLE IF EXISTS `vista_calculaduracioncodigoseguridad_transferencias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculaduracioncodigoseguridad_transferencias`  AS SELECT `codigostransferencias`.`idcodigo` AS `idcodigo`, `codigostransferencias`.`codigoseguridad` AS `codigoseguridad`, concat(timestampdiff(MINUTE,`codigostransferencias`.`fecha`,current_timestamp())) AS `minutos_expiracion`, `codigostransferencias`.`estado` AS `estado`, `codigostransferencias`.`idusuarios` AS `idusuarios` FROM `codigostransferencias` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculocuentasahorooregistradas_interfaces`
--
DROP TABLE IF EXISTS `vista_calculocuentasahorooregistradas_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculocuentasahorooregistradas_interfaces`  AS SELECT count(0) AS `numero_cuentasahorro_registradas` FROM `cuentas` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculocuotasregistradas_interfaces`
--
DROP TABLE IF EXISTS `vista_calculocuotasregistradas_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculocuotasregistradas_interfaces`  AS SELECT count(0) AS `numero_cuotas_registrados` FROM `cuotas` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculocuotasvencidas_interfaces`
--
DROP TABLE IF EXISTS `vista_calculocuotasvencidas_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculocuotasvencidas_interfaces`  AS SELECT count(0) AS `numero_cuotas_vencidas` FROM `cuotas` WHERE `cuotas`.`incumplimiento_pago` = 'SI\'SI' ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculodiasfechavencimiento_cuotasclientes`
--
DROP TABLE IF EXISTS `vista_calculodiasfechavencimiento_cuotasclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculodiasfechavencimiento_cuotasclientes`  AS SELECT `cuotas`.`idcuotas` AS `idcuotas`, `cuotas`.`idusuarios` AS `idusuarios`, `cuotas`.`idproducto` AS `idproducto`, `cuotas`.`montocancelar` AS `montocancelar`, `cuotas`.`estadocuota` AS `estadocuota`, `cuotas`.`fechavencimiento` AS `fechavencimiento`, `cuotas`.`incumplimiento_pago` AS `incumplimiento_pago`, to_days(current_timestamp()) - to_days(`cuotas`.`fechavencimiento`) AS `dias_incumplimiento` FROM `cuotas` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculoexpiracion_codigocambiocredencialesusuarios`
--
DROP TABLE IF EXISTS `vista_calculoexpiracion_codigocambiocredencialesusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculoexpiracion_codigocambiocredencialesusuarios`  AS SELECT `recuperacion`.`idrecuperaciones` AS `idrecuperaciones`, `recuperacion`.`correo` AS `correo`, `recuperacion`.`token` AS `token`, `recuperacion`.`codigo` AS `codigo`, concat(timestampdiff(MINUTE,`recuperacion`.`fecha`,current_timestamp())) AS `minutos_expiracion`, `recuperacion`.`estado` AS `estado` FROM `recuperacion` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculoingresostransacciones_empleadosatencionclientes`
--
DROP TABLE IF EXISTS `vista_calculoingresostransacciones_empleadosatencionclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculoingresostransacciones_empleadosatencionclientes`  AS SELECT `transacciones`.`empleado_gestion` AS `empleado_gestion`, sum(`transacciones`.`monto`) AS `monto_transacciones_empleados` FROM `transacciones` GROUP BY `transacciones`.`empleado_gestion` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculonumerocuotascanceladas_interfaces`
--
DROP TABLE IF EXISTS `vista_calculonumerocuotascanceladas_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculonumerocuotascanceladas_interfaces`  AS SELECT count(0) AS `numero_cuotas_canceladas` FROM `cuotas` WHERE `cuotas`.`estadocuota` = 'cancelado\'cancelado' ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculonumerocuotaspagadastarde_interfaces`
--
DROP TABLE IF EXISTS `vista_calculonumerocuotaspagadastarde_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculonumerocuotaspagadastarde_interfaces`  AS SELECT count(0) AS `numero_cuotas_pagadas_tarde` FROM `cuotas` WHERE `cuotas`.`incumplimiento_pago` = 'PT\'PT' ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculonumerotransferencias_interfaces`
--
DROP TABLE IF EXISTS `vista_calculonumerotransferencias_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculonumerotransferencias_interfaces`  AS SELECT count(0) AS `numero_transferencias` FROM `transferencias` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculoproductosregistrados_interfaces`
--
DROP TABLE IF EXISTS `vista_calculoproductosregistrados_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculoproductosregistrados_interfaces`  AS SELECT count(0) AS `numero_productos_registrados` FROM `productos` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculotransaccionescreditos_interfaces`
--
DROP TABLE IF EXISTS `vista_calculotransaccionescreditos_interfaces`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculotransaccionescreditos_interfaces`  AS SELECT count(0) AS `numero_transacciones_creditos` FROM `transacciones` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_calculo_ultimaactividad_ticketsreportesplataforma`
--
DROP TABLE IF EXISTS `vista_calculo_ultimaactividad_ticketsreportesplataforma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_calculo_ultimaactividad_ticketsreportesplataforma`  AS SELECT `reporteproblemasplataforma`.`idreporte` AS `idreporte`, `reporteproblemasplataforma`.`idusuarios` AS `idusuarios`, `usuarios`.`codigousuario` AS `codigousuario`, `reporteproblemasplataforma`.`estado` AS `estado`, to_days(current_timestamp()) - to_days(`reporteproblemasplataforma`.`fechaactualizacionreporte`) AS `dias_ultima_actividad` FROM (`reporteproblemasplataforma` join `usuarios` on(`reporteproblemasplataforma`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_codigosseguridadtransferenciasclientes`
--
DROP TABLE IF EXISTS `vista_codigosseguridadtransferenciasclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_codigosseguridadtransferenciasclientes`  AS SELECT `codigostransferencias`.`idcodigo` AS `idcodigo`, `codigostransferencias`.`codigoseguridad` AS `codigoseguridad`, `codigostransferencias`.`fecha` AS `fecha`, `codigostransferencias`.`estado` AS `estado`, `codigostransferencias`.`idusuarios` AS `idusuarios` FROM `codigostransferencias` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_configuracionusuariosgeneral`
--
DROP TABLE IF EXISTS `vista_configuracionusuariosgeneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_configuracionusuariosgeneral`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`correo` AS `correo`, `usuarios`.`fotoperfil` AS `fotoperfil`, `usuarios`.`estado_usuario` AS `estado_usuario` FROM `usuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacalculoavancecreditos_interfazclientes`
--
DROP TABLE IF EXISTS `vista_consultacalculoavancecreditos_interfazclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacalculoavancecreditos_interfazclientes`  AS SELECT `creditos`.`idcreditos` AS `idcreditos`, `creditos`.`idusuarios` AS `idusuarios`, `creditos`.`idproducto` AS `idproducto`, `productos`.`nombreproducto` AS `nombreproducto`, `productos`.`codigo` AS `codigo`, `creditos`.`interescredito` AS `interescredito`, `creditos`.`cuotamensual` AS `cuotamensual`, `creditos`.`montocredito` AS `montocredito`, `creditos`.`plazocredito` AS `plazocredito`, `creditos`.`enviaralhistorico` AS `enviaralhistorico`, `vista_consultacalculocuotascanceladas_creditosclientes`.`cuotas_canceladas` AS `cuotas_canceladas`, `vista_consultacalculocuotascanceladas_creditosclientes`.`montocapital` AS `montocapital` FROM ((`creditos` join `productos` on(`creditos`.`idproducto` = `productos`.`idproducto`)) join `vista_consultacalculocuotascanceladas_creditosclientes` on(`vista_consultacalculocuotascanceladas_creditosclientes`.`idusuarios` = `creditos`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacalculocuotascanceladas_creditosclientes`
--
DROP TABLE IF EXISTS `vista_consultacalculocuotascanceladas_creditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacalculocuotascanceladas_creditosclientes`  AS SELECT `cuotas`.`idcreditos` AS `idcreditos`, `cuotas`.`idusuarios` AS `idusuarios`, `cuotas`.`idproducto` AS `idproducto`, `cuotas`.`montocapital` AS `montocapital`, count(0) AS `cuotas_canceladas` FROM `cuotas` WHERE `cuotas`.`estadocuota` = 'cancelado' GROUP BY `cuotas`.`idusuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaclientesmorosos`
--
DROP TABLE IF EXISTS `vista_consultaclientesmorosos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaclientesmorosos`  AS SELECT `vista_calculodiasfechavencimiento_cuotasclientes`.`idcuotas` AS `idcuotas`, `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `detalleusuarios`.`dui` AS `dui`, `productos`.`nombreproducto` AS `nombreproducto`, `vista_calculodiasfechavencimiento_cuotasclientes`.`montocancelar` AS `montocancelar`, `vista_calculodiasfechavencimiento_cuotasclientes`.`estadocuota` AS `estadocuota`, `vista_calculodiasfechavencimiento_cuotasclientes`.`fechavencimiento` AS `fechavencimiento`, `vista_calculodiasfechavencimiento_cuotasclientes`.`incumplimiento_pago` AS `incumplimiento_pago`, `vista_calculodiasfechavencimiento_cuotasclientes`.`dias_incumplimiento` AS `dias_incumplimiento` FROM (((`vista_calculodiasfechavencimiento_cuotasclientes` join `usuarios` on(`vista_calculodiasfechavencimiento_cuotasclientes`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`vista_calculodiasfechavencimiento_cuotasclientes`.`idproducto` = `productos`.`idproducto`)) join `detalleusuarios` on(`usuarios`.`idusuarios` = `detalleusuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaclientes_creditoscancelados`
--
DROP TABLE IF EXISTS `vista_consultaclientes_creditoscancelados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaclientes_creditoscancelados`  AS SELECT `historicocreditos`.`idhistorico` AS `idhistorico`, `historicocreditos`.`idusuarios` AS `idusuarios`, `historicocreditos`.`idproducto` AS `idproducto`, `historicocreditos`.`idcreditos` AS `idcreditos`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `usuarios`.`fotoperfil` AS `fotoperfil`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `historicocreditos`.`montocredito` AS `montocredito`, `historicocreditos`.`interescredito` AS `interescredito`, `historicocreditos`.`plazocredito` AS `plazocredito`, `historicocreditos`.`cuotamensual` AS `cuotamensual`, `historicocreditos`.`estado` AS `estado` FROM (((`historicocreditos` join `usuarios` on(`historicocreditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `historicocreditos`.`idproducto`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `historicocreditos`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacompletanuevassolicitudescreditosclientesgestiones`
--
DROP TABLE IF EXISTS `vista_consultacompletanuevassolicitudescreditosclientesgestiones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacompletanuevassolicitudescreditosclientesgestiones`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `creditos`.`idcreditos` AS `idcreditos`, `creditos`.`idproducto` AS `idproducto`, `creditos`.`tipocliente` AS `tipocliente`, `creditos`.`montocredito` AS `montocredito`, `creditos`.`interescredito` AS `interescredito`, `creditos`.`plazocredito` AS `plazocredito`, `creditos`.`cuotamensual` AS `cuotamensual`, `creditos`.`saldocredito` AS `saldocredito`, `creditos`.`fechasolicitud` AS `fechasolicitud`, `creditos`.`salariocliente` AS `salariocliente`, `creditos`.`progreso_solicitud` AS `progreso_solicitud`, `creditos`.`estado` AS `estado`, `creditos`.`observaciones` AS `observaciones`, `creditos`.`observacion_gerencia` AS `observacion_gerencia`, `creditos`.`observacion_presidencia` AS `observacion_presidencia`, `creditos`.`usuario_empleado` AS `usuario_empleado`, `creditos`.`cuotas_generadas` AS `cuotas_generadas`, `creditos`.`estadocrediticio` AS `estadocrediticio`, `creditos`.`proceso_finalizado` AS `proceso_finalizado`, `creditos`.`enviaralhistorico` AS `enviaralhistorico`, `creditos`.`creditoactivo` AS `creditoactivo`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`fotoperfil` AS `fotoperfil`, `usuarios`.`idrol` AS `idrol`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `detalleusuarios`.`telefono` AS `telefono`, `detalleusuarios`.`celular` AS `celular`, `detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`, `detalleusuarios`.`direccion` AS `direccion`, `detalleusuarios`.`empresa` AS `empresa`, `detalleusuarios`.`cargo` AS `cargo`, `detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`, `detalleusuarios`.`fechanacimiento` AS `fechanacimiento`, `referenciaspersonales`.`nombres_referencia1` AS `nombres_referencia1`, `referenciaspersonales`.`apellidos_referencia1` AS `apellidos_referencia1`, `referenciaspersonales`.`empresa_referencia1` AS `empresa_referencia1`, `referenciaspersonales`.`profesion_oficioreferencia1` AS `profesion_oficioreferencia1`, `referenciaspersonales`.`telefono_referencia1` AS `telefono_referencia1`, `referenciaspersonales`.`nombres_referencia2` AS `nombres_referencia2`, `referenciaspersonales`.`apellidos_referencia2` AS `apellidos_referencia2`, `referenciaspersonales`.`empresa_referencia2` AS `empresa_referencia2`, `referenciaspersonales`.`profesion_oficioreferencia2` AS `profesion_oficioreferencia2`, `referenciaspersonales`.`telefono_referencia2` AS `telefono_referencia2` FROM ((((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) join `referenciaspersonales` on(`referenciaspersonales`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `creditos`.`idproducto`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacompletausuariosdetalles`
--
DROP TABLE IF EXISTS `vista_consultacompletausuariosdetalles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacompletausuariosdetalles`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`correo` AS `correo`, `usuarios`.`fotoperfil` AS `fotoperfil`, `usuarios`.`idrol` AS `idrol`, `usuarios`.`estado_usuario` AS `estado_usuario`, `usuarios`.`completoperfil` AS `completoperfil`, `usuarios`.`quienregistro` AS `quienregistro`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `detalleusuarios`.`telefono` AS `telefono`, `detalleusuarios`.`celular` AS `celular`, `detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`, `detalleusuarios`.`direccion` AS `direccion`, `detalleusuarios`.`empresa` AS `empresa`, `detalleusuarios`.`cargo` AS `cargo`, `detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`, `detalleusuarios`.`fechanacimiento` AS `fechanacimiento`, `detalleusuarios`.`genero` AS `genero`, `detalleusuarios`.`estadocivil` AS `estadocivil`, `detalleusuarios`.`fotoduifrontal` AS `fotoduifrontal`, `detalleusuarios`.`fotoduireverso` AS `fotoduireverso`, `detalleusuarios`.`fotonit` AS `fotonit`, `detalleusuarios`.`fotofirma` AS `fotofirma` FROM (`usuarios` left join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacopiascontrato_suscritocreditosclientes`
--
DROP TABLE IF EXISTS `vista_consultacopiascontrato_suscritocreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacopiascontrato_suscritocreditosclientes`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `creditos`.`copiacontratocliente` AS `copiacontratocliente`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario` FROM (`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacuotasgeneradas_creditosaprobadosclientes`
--
DROP TABLE IF EXISTS `vista_consultacuotasgeneradas_creditosaprobadosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacuotasgeneradas_creditosaprobadosclientes`  AS SELECT `cuotas`.`idcuotas` AS `idcuotas`, `usuarios`.`idusuarios` AS `idusuarios`, `productos`.`idproducto` AS `idproducto`, `creditos`.`idcreditos` AS `idcreditos`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`fotoperfil` AS `fotoperfil`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `creditos`.`montocredito` AS `montocredito`, `creditos`.`interescredito` AS `interescredito`, `creditos`.`plazocredito` AS `plazocredito`, `creditos`.`cuotamensual` AS `cuotamensual`, `cuotas`.`montocancelar` AS `montocancelar`, `cuotas`.`estadocuota` AS `estadocuota`, `cuotas`.`nombreproducto` AS `nombreproducto`, `cuotas`.`montocapital` AS `montocapital`, `cuotas`.`fechavencimiento` AS `fechavencimiento`, `cuotas`.`incumplimiento_pago` AS `incumplimiento_pago`, to_days(current_timestamp()) - to_days(`cuotas`.`fechavencimiento`) AS `dias_incumplimiento` FROM ((((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `cuotas`.`idproducto`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultacuotashistoricocreditosclientes`
--
DROP TABLE IF EXISTS `vista_consultacuotashistoricocreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultacuotashistoricocreditosclientes`  AS SELECT `historicotransacciones`.`idhistoricotransaccion` AS `idhistoricotransaccion`, `historicotransacciones`.`idusuarios` AS `idusuarios`, `historicotransacciones`.`idproducto` AS `idproducto`, `historicotransacciones`.`idcreditos` AS `idcreditos`, `historicotransacciones`.`idcuotas` AS `idcuotas`, `historicocreditos`.`montocredito` AS `montocredito`, `historicocreditos`.`interescredito` AS `interescredito`, `historicocreditos`.`plazocredito` AS `plazocredito`, `historicocreditos`.`cuotamensual` AS `cuotamensual`, `historicotransacciones`.`referencia` AS `referencia`, `historicotransacciones`.`monto` AS `montocancelar`, `historicotransacciones`.`fecha` AS `fecha`, `historicotransacciones`.`dias_incumplimiento` AS `dias_incumplimiento`, `historicotransacciones`.`empleado_gestion` AS `empleado_gestion` FROM (`historicotransacciones` join `historicocreditos` on(`historicotransacciones`.`idcreditos` = `historicocreditos`.`idcreditos`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultadatosprestamosdevehiculosclientes`
--
DROP TABLE IF EXISTS `vista_consultadatosprestamosdevehiculosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultadatosprestamosdevehiculosclientes`  AS SELECT `datosvehiculoscreditos`.`iddatosvehiculos` AS `iddatosvehiculos`, `datosvehiculoscreditos`.`idcreditos` AS `idcreditos`, `datosvehiculoscreditos`.`idproducto` AS `idproducto`, `datosvehiculoscreditos`.`idusuarios` AS `idusuarios`, `datosvehiculoscreditos`.`placa` AS `placa`, `datosvehiculoscreditos`.`clase` AS `clase`, `datosvehiculoscreditos`.`anio` AS `anio`, `datosvehiculoscreditos`.`capacidad` AS `capacidad`, `datosvehiculoscreditos`.`asientos` AS `asientos`, `datosvehiculoscreditos`.`marca` AS `marca`, `datosvehiculoscreditos`.`modelo` AS `modelo`, `datosvehiculoscreditos`.`numeromotor` AS `numeromotor`, `datosvehiculoscreditos`.`chasisgrabado` AS `chasisgrabado`, `datosvehiculoscreditos`.`chasisvin` AS `chasisvin`, `datosvehiculoscreditos`.`color` AS `color` FROM `datosvehiculoscreditos` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultadetallecompletotransaccionescuentasclientes`
--
DROP TABLE IF EXISTS `vista_consultadetallecompletotransaccionescuentasclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultadetallecompletotransaccionescuentasclientes`  AS SELECT `transaccionescuentasclientes`.`idtransaccioncuentas` AS `idtransaccioncuentas`, `transaccionescuentasclientes`.`idusuarios` AS `idusuarios`, `transaccionescuentasclientes`.`idproducto` AS `idproducto`, `transaccionescuentasclientes`.`idcuentas` AS `idcuentas`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `cuentas`.`numerocuenta` AS `numerocuenta`, `transaccionescuentasclientes`.`referencia` AS `referencia`, `transaccionescuentasclientes`.`monto` AS `monto`, `transaccionescuentasclientes`.`fecha` AS `fecha`, `transaccionescuentasclientes`.`empleado_gestion` AS `empleado_gestion`, `transaccionescuentasclientes`.`tipotransaccion` AS `tipotransaccion`, `transaccionescuentasclientes`.`estadotransaccion` AS `estadotransaccion` FROM (((`transaccionescuentasclientes` join `usuarios` on(`transaccionescuentasclientes`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`transaccionescuentasclientes`.`idproducto` = `productos`.`idproducto`)) join `cuentas` on(`transaccionescuentasclientes`.`idcuentas` = `cuentas`.`idcuentas`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultadetallesinterfazpresidencia`
--
DROP TABLE IF EXISTS `vista_consultadetallesinterfazpresidencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultadetallesinterfazpresidencia`  AS SELECT `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` AS `numero_productos_registrados`, `vista_calculocuotasregistradas_interfaces`.`numero_cuotas_registrados` AS `numero_cuotas_registrados`, `vista_calculocuentasahorooregistradas_interfaces`.`numero_cuentasahorro_registradas` AS `numero_cuentasahorro_registradas`, `vista_calculotransaccionescreditos_interfaces`.`numero_transacciones_creditos` AS `numero_transacciones_creditos` FROM (((`vista_calculoproductosregistrados_interfaces` left join `vista_calculocuotasregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculocuentasahorooregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculotransaccionescreditos_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultadetallessolicitudescreditosaprobadosclientes`
--
DROP TABLE IF EXISTS `vista_consultadetallessolicitudescreditosaprobadosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultadetallessolicitudescreditosaprobadosclientes`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `creditos`.`idcreditos` AS `idcreditos`, `creditos`.`idproducto` AS `idproducto`, `creditos`.`montocredito` AS `montocredito`, `creditos`.`interescredito` AS `interescredito`, `creditos`.`plazocredito` AS `plazocredito`, `creditos`.`cuotamensual` AS `cuotamensual`, `creditos`.`fechasolicitud` AS `fechasolicitud`, `creditos`.`estado` AS `estado`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`correo` AS `correo`, `usuarios`.`fotoperfil` AS `fotoperfil`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit` FROM ((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaestadosolicitudcredito_portalclientesbienvenida`
--
DROP TABLE IF EXISTS `vista_consultaestadosolicitudcredito_portalclientesbienvenida`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaestadosolicitudcredito_portalclientesbienvenida`  AS SELECT `creditos`.`idusuarios` AS `idusuarios`, `creditos`.`estado` AS `estado`, `creditos`.`progreso_solicitud` AS `progreso_solicitud`, `productos`.`nombreproducto` AS `nombreproducto`, `productos`.`codigo` AS `codigo` FROM ((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`creditos`.`idproducto` = `productos`.`idproducto`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaexistenciacuotasmensualesclientes`
--
DROP TABLE IF EXISTS `vista_consultaexistenciacuotasmensualesclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaexistenciacuotasmensualesclientes`  AS SELECT `cuotas`.`idcuotas` AS `idcuotas`, `cuotas`.`idcreditos` AS `idcreditos`, `cuotas`.`idproducto` AS `idproducto`, `cuotas`.`idusuarios` AS `idusuarios`, `cuotas`.`nombreproducto` AS `nombreproducto` FROM `cuotas` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaexistenciareferenciasclientes`
--
DROP TABLE IF EXISTS `vista_consultaexistenciareferenciasclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaexistenciareferenciasclientes`  AS SELECT `referenciaspersonales`.`idreferencias` AS `idreferencias`, `referenciaspersonales`.`idcreditos` AS `idcreditos`, `usuarios`.`idusuarios` AS `idusuarios`, `referenciaspersonales`.`idproducto` AS `idproducto`, `referenciaspersonales`.`nombres_referencia1` AS `nombres_referencia1`, `referenciaspersonales`.`apellidos_referencia1` AS `apellidos_referencia1`, `referenciaspersonales`.`empresa_referencia1` AS `empresa_referencia1`, `referenciaspersonales`.`profesion_oficioreferencia1` AS `profesion_oficioreferencia1`, `referenciaspersonales`.`telefono_referencia1` AS `telefono_referencia1`, `referenciaspersonales`.`nombres_referencia2` AS `nombres_referencia2`, `referenciaspersonales`.`apellidos_referencia2` AS `apellidos_referencia2`, `referenciaspersonales`.`empresa_referencia2` AS `empresa_referencia2`, `referenciaspersonales`.`profesion_oficioreferencia2` AS `profesion_oficioreferencia2`, `referenciaspersonales`.`telefono_referencia2` AS `telefono_referencia2` FROM (`referenciaspersonales` join `usuarios` on(`referenciaspersonales`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultageneralreestructuracioncreditosclientes`
--
DROP TABLE IF EXISTS `vista_consultageneralreestructuracioncreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultageneralreestructuracioncreditosclientes`  AS SELECT `a`.`idusuarios` AS `idusuarios`, `a`.`idcreditos` AS `idcreditos`, `a`.`montocredito` AS `montocredito`, `a`.`interescredito` AS `interescredito`, `a`.`plazocredito` AS `plazocredito`, `a`.`cuotamensual` AS `cuotamensual`, `a`.`estado` AS `estado`, `a`.`fechasolicitud` AS `fechasolicitud`, `a`.`cuotas_generadas` AS `cuotas_generadas`, `b`.`nombres` AS `nombres`, `b`.`apellidos` AS `apellidos`, `b`.`codigousuario` AS `codigousuario`, `b`.`fotoperfil` AS `fotoperfil`, `c`.`dui` AS `dui`, `c`.`nit` AS `nit` FROM ((`creditos` `a` join `usuarios` `b` on(`a`.`idusuarios` = `b`.`idusuarios`)) join `detalleusuarios` `c` on(`a`.`idusuarios` = `c`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultageneralusuarios`
--
DROP TABLE IF EXISTS `vista_consultageneralusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultageneralusuarios`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`correo` AS `correo`, `usuarios`.`fotoperfil` AS `fotoperfil`, `usuarios`.`idrol` AS `idrol`, `usuarios`.`estado_usuario` AS `estado_usuario`, `usuarios`.`completoperfil` AS `completoperfil` FROM `usuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultalistadogeneralcuentasahorrosregistradas`
--
DROP TABLE IF EXISTS `vista_consultalistadogeneralcuentasahorrosregistradas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultalistadogeneralcuentasahorrosregistradas`  AS SELECT `cuentas`.`idcuentas` AS `idcuentas`, `cuentas`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`fotoperfil` AS `fotoperfil`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `cuentas`.`numerocuenta` AS `numerocuenta`, `cuentas`.`montocuenta` AS `montocuenta`, `cuentas`.`estadocuenta` AS `estadocuenta`, `cuentas`.`fechaapertura` AS `fechaapertura` FROM ((`cuentas` join `usuarios` on(`cuentas`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`cuentas`.`idusuarios` = `detalleusuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultanuevo_prestamopersonal_asignado_clientes`
--
DROP TABLE IF EXISTS `vista_consultanuevo_prestamopersonal_asignado_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultanuevo_prestamopersonal_asignado_clientes`  AS SELECT `creditos`.`idproducto` AS `idproducto`, `creditos`.`idcreditos` AS `idcreditos`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `creditos`.`fechasolicitud` AS `fechasolicitud`, `creditos`.`montocredito` AS `montocredito`, `creditos`.`interescredito` AS `interescredito`, `creditos`.`plazocredito` AS `plazocredito`, `creditos`.`progreso_solicitud` AS `progreso_solicitud`, `creditos`.`progreso_pagocredito` AS `progreso_pagocredito`, `creditos`.`estado` AS `estado`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`idusuarios` AS `idusuarios` FROM ((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `creditos`.`idproducto`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultanumeroreportesfallasplataformageneral`
--
DROP TABLE IF EXISTS `vista_consultanumeroreportesfallasplataformageneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultanumeroreportesfallasplataformageneral`  AS SELECT count(`reporteproblemasplataforma`.`idreporte`) AS `numero_reportes_registrados` FROM `reporteproblemasplataforma` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultanumerosolicitudesrecuperaciones`
--
DROP TABLE IF EXISTS `vista_consultanumerosolicitudesrecuperaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultanumerosolicitudesrecuperaciones`  AS SELECT count(`recuperacion`.`idrecuperaciones`) AS `numero_solicitudes_recuperaciones` FROM `recuperacion` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaproductosnuevoscreditos`
--
DROP TABLE IF EXISTS `vista_consultaproductosnuevoscreditos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaproductosnuevoscreditos`  AS SELECT `productos`.`idproducto` AS `idproducto`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `productos`.`estado` AS `estado` FROM `productos` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultaproductosregistrados`
--
DROP TABLE IF EXISTS `vista_consultaproductosregistrados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultaproductosregistrados`  AS SELECT count(`productos`.`idproducto`) AS `numero_productos_registrados` FROM `productos` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultardisponibilidadnuevoscreditosclientes`
--
DROP TABLE IF EXISTS `vista_consultardisponibilidadnuevoscreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultardisponibilidadnuevoscreditosclientes`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`habilitarnuevoscreditos` AS `habilitarnuevoscreditos` FROM `usuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultareportesfallosplataforma`
--
DROP TABLE IF EXISTS `vista_consultareportesfallosplataforma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultareportesfallosplataforma`  AS SELECT `reporteproblemasplataforma`.`idreporte` AS `idreporte`, `reporteproblemasplataforma`.`idusuarios` AS `idusuarios`, `usuarios`.`codigousuario` AS `codigousuario`, `reporteproblemasplataforma`.`nombrereporte` AS `nombrereporte`, `reporteproblemasplataforma`.`descripcionreporte` AS `descripcionreporte`, `reporteproblemasplataforma`.`fotoreporte` AS `fotoreporte`, `reporteproblemasplataforma`.`fecharegistroreporte` AS `fecharegistroreporte`, `reporteproblemasplataforma`.`fechaactualizacionreporte` AS `fechaactualizacionreporte`, `reporteproblemasplataforma`.`estado` AS `estado`, `reporteproblemasplataforma`.`comentarioactualizacion` AS `comentarioactualizacion`, `reporteproblemasplataforma`.`empleado_gestion` AS `empleado_gestion` FROM (`reporteproblemasplataforma` join `usuarios` on(`reporteproblemasplataforma`.`idusuarios` = `usuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultatransaccionesclientesgeneral`
--
DROP TABLE IF EXISTS `vista_consultatransaccionesclientesgeneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultatransaccionesclientesgeneral`  AS SELECT `cuotas`.`idcuotas` AS `idcuotas`, `transacciones`.`idusuarios` AS `idusuarios`, `transacciones`.`referencia` AS `referencia`, `transacciones`.`monto` AS `monto`, `transacciones`.`fecha` AS `fecha`, `transacciones`.`empleado_gestion` AS `empleado_gestion`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`habilitarnuevoscreditos` AS `habilitarnuevoscreditos` FROM ((`transacciones` join `usuarios` on(`transacciones`.`idusuarios` = `usuarios`.`idusuarios`)) join `cuotas` on(`cuotas`.`idcuotas` = `transacciones`.`idcuotas`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultatransaccionescuentasclientes`
--
DROP TABLE IF EXISTS `vista_consultatransaccionescuentasclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultatransaccionescuentasclientes`  AS SELECT `transaccionescuentasclientes`.`idtransaccioncuentas` AS `idtransaccioncuentas`, `transaccionescuentasclientes`.`idusuarios` AS `idusuarios`, `transaccionescuentasclientes`.`idproducto` AS `idproducto`, `transaccionescuentasclientes`.`idcuentas` AS `idcuentas`, `cuentas`.`numerocuenta` AS `numerocuenta`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `transaccionescuentasclientes`.`referencia` AS `referencia`, `transaccionescuentasclientes`.`monto` AS `monto`, `transaccionescuentasclientes`.`fecha` AS `fecha`, `transaccionescuentasclientes`.`empleado_gestion` AS `empleado_gestion`, `transaccionescuentasclientes`.`tipotransaccion` AS `tipotransaccion`, `transaccionescuentasclientes`.`estadotransaccion` AS `estadotransaccion`, `transaccionescuentasclientes`.`saldonuevocuenta_transaccion` AS `saldonuevocuenta_transaccion` FROM ((((`transaccionescuentasclientes` join `usuarios` on(`transaccionescuentasclientes`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`transaccionescuentasclientes`.`idusuarios` = `detalleusuarios`.`idusuarios`)) join `productos` on(`transaccionescuentasclientes`.`idproducto` = `productos`.`idproducto`)) join `cuentas` on(`transaccionescuentasclientes`.`idcuentas` = `cuentas`.`idcuentas`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`
--
DROP TABLE IF EXISTS `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `detalleusuarios`.`dui` AS `dui` FROM (`usuarios` join `detalleusuarios` on(`usuarios`.`idusuarios` = `detalleusuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consultausuariosregistrados`
--
DROP TABLE IF EXISTS `vista_consultausuariosregistrados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consultausuariosregistrados`  AS SELECT count(`usuarios`.`idusuarios`) AS `numero_usuarios_registrados` FROM `usuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consulta_asignarnuevoscreditosclientes`
--
DROP TABLE IF EXISTS `vista_consulta_asignarnuevoscreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consulta_asignarnuevoscreditosclientes`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`correo` AS `correo`, `usuarios`.`fotoperfil` AS `fotoperfil`, `usuarios`.`completoperfil` AS `completoperfil`, `usuarios`.`estado_usuario` AS `estado_usuario`, `usuarios`.`habilitarnuevoscreditos` AS `habilitarnuevoscreditos`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `detalleusuarios`.`telefono` AS `telefono`, `detalleusuarios`.`celular` AS `celular`, `detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`, `detalleusuarios`.`direccion` AS `direccion`, `detalleusuarios`.`empresa` AS `empresa`, `detalleusuarios`.`cargo` AS `cargo`, `detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`, `detalleusuarios`.`fechanacimiento` AS `fechanacimiento`, `detalleusuarios`.`genero` AS `genero`, `detalleusuarios`.`estadocivil` AS `estadocivil`, `detalleusuarios`.`fotoduifrontal` AS `fotoduifrontal`, `detalleusuarios`.`fotoduireverso` AS `fotoduireverso`, `detalleusuarios`.`fotonit` AS `fotonit`, `detalleusuarios`.`fotofirma` AS `fotofirma` FROM (`usuarios` left join `detalleusuarios` on(`usuarios`.`idusuarios` = `detalleusuarios`.`idusuarios`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_consulta_datosgeneralesresultadosinicioadmins`
--
DROP TABLE IF EXISTS `vista_consulta_datosgeneralesresultadosinicioadmins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_consulta_datosgeneralesresultadosinicioadmins`  AS SELECT `vista_consultausuariosregistrados`.`numero_usuarios_registrados` AS `numero_usuarios_registrados`, `vista_consultaproductosregistrados`.`numero_productos_registrados` AS `numero_productos_registrados`, `vista_consultanumeroreportesfallasplataformageneral`.`numero_reportes_registrados` AS `numero_reportes_registrados`, `vista_consultanumerosolicitudesrecuperaciones`.`numero_solicitudes_recuperaciones` AS `numero_solicitudes_recuperaciones`, `vista_numerocuotasregistradas`.`numero_cuotas` AS `numero_cuotas`, `vista_numerotransaccionesprocesadas`.`numero_transacciones` AS `numero_transacciones` FROM (((((`vista_consultausuariosregistrados` left join `vista_consultaproductosregistrados` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_consultanumeroreportesfallasplataformageneral` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_consultanumerosolicitudesrecuperaciones` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_numerocuotasregistradas` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_numerotransaccionesprocesadas` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_contadorcreditosgestionados_empleadosatencionclientes`
--
DROP TABLE IF EXISTS `vista_contadorcreditosgestionados_empleadosatencionclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_contadorcreditosgestionados_empleadosatencionclientes`  AS SELECT `creditos`.`usuario_empleado` AS `usuario_empleado`, count(0) AS `numero_creditos_gestionados` FROM `creditos` GROUP BY `creditos`.`usuario_empleado` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_contadorincumplimientopagoscreditosclientes`
--
DROP TABLE IF EXISTS `vista_contadorincumplimientopagoscreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_contadorincumplimientopagoscreditosclientes`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, count(0) AS `total_incumplimientos_pagos` FROM (`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) WHERE `cuotas`.`incumplimiento_pago` = 'PT' GROUP BY `usuarios`.`idusuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_contadorpagosatiempo_creditosclientes`
--
DROP TABLE IF EXISTS `vista_contadorpagosatiempo_creditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_contadorpagosatiempo_creditosclientes`  AS SELECT `cuotas`.`idusuarios` AS `idusuarios`, `creditos`.`idcreditos` AS `idcreditos`, `cuotas`.`idcuotas` AS `idcuotas`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `creditos`.`estadocrediticio` AS `estadocrediticio`, count(`cuotas`.`incumplimiento_pago`) AS `cuotas_pagadas` FROM ((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) WHERE `cuotas`.`incumplimiento_pago` = 'NO' AND `cuotas`.`estadocuota` = 'cancelado' GROUP BY `cuotas`.`idusuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_contadorpagoscuotastardias_creditosclientes`
--
DROP TABLE IF EXISTS `vista_contadorpagoscuotastardias_creditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_contadorpagoscuotastardias_creditosclientes`  AS SELECT `cuotas`.`idusuarios` AS `idusuarios`, `creditos`.`idcreditos` AS `idcreditos`, `cuotas`.`idcuotas` AS `idcuotas`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `creditos`.`estadocrediticio` AS `estadocrediticio`, count(`cuotas`.`incumplimiento_pago`) AS `cuotas_pagadas_tarde` FROM ((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) WHERE `cuotas`.`incumplimiento_pago` = 'PT' GROUP BY `cuotas`.`idusuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_contadortransacciones_empleadosatencionclientes`
--
DROP TABLE IF EXISTS `vista_contadortransacciones_empleadosatencionclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_contadortransacciones_empleadosatencionclientes`  AS SELECT count(0) AS `numero_transacciones_empleados_atencionclientes`, `transacciones`.`empleado_gestion` AS `empleado_gestion` FROM `transacciones` GROUP BY `transacciones`.`empleado_gestion` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_datosgeneralescreditoscanceladoshistoricoclientes`
--
DROP TABLE IF EXISTS `vista_datosgeneralescreditoscanceladoshistoricoclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_datosgeneralescreditoscanceladoshistoricoclientes`  AS SELECT `historicocreditos`.`idhistorico` AS `idhistorico`, `historicocreditos`.`idproducto` AS `idproducto`, `historicocreditos`.`idusuarios` AS `idusuarios`, `historicocreditos`.`idcreditos` AS `idcreditos`, `historicocreditos`.`montocredito` AS `montocredito`, `historicocreditos`.`interescredito` AS `interescredito`, `historicocreditos`.`plazocredito` AS `plazocredito`, `historicocreditos`.`cuotamensual` AS `cuotamensual`, `historicocreditos`.`estado` AS `estado`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`fotoperfil` AS `fotoperfil`, `productos`.`nombreproducto` AS `nombreproducto` FROM ((`historicocreditos` join `usuarios` on(`historicocreditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`historicocreditos`.`idproducto` = `productos`.`idproducto`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_detallecompletotransaccionesempleados`
--
DROP TABLE IF EXISTS `vista_detallecompletotransaccionesempleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_detallecompletotransaccionesempleados`  AS SELECT `transacciones`.`idtransaccion` AS `idtransaccion`, `transacciones`.`idusuarios` AS `idusuarios`, `transacciones`.`idproducto` AS `idproducto`, `transacciones`.`idcreditos` AS `idcreditos`, `transacciones`.`idcuotas` AS `idcuotas`, `transacciones`.`referencia` AS `referencia`, `transacciones`.`monto` AS `monto`, `transacciones`.`fecha` AS `fecha`, `transacciones`.`dias_incumplimiento` AS `dias_incumplimiento`, `transacciones`.`empleado_gestion` AS `empleado_gestion` FROM `transacciones` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_detalleinterfazgerencia`
--
DROP TABLE IF EXISTS `vista_detalleinterfazgerencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_detalleinterfazgerencia`  AS SELECT `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` AS `numero_productos_registrados`, `vista_calculocuotasregistradas_interfaces`.`numero_cuotas_registrados` AS `numero_cuotas_registrados`, `vista_calculocuentasahorooregistradas_interfaces`.`numero_cuentasahorro_registradas` AS `numero_cuentasahorro_registradas`, `vista_calculotransaccionescreditos_interfaces`.`numero_transacciones_creditos` AS `numero_transacciones_creditos`, `vista_calculonumerocuotaspagadastarde_interfaces`.`numero_cuotas_pagadas_tarde` AS `numero_cuotas_pagadas_tarde`, `vista_calculonumerocuotascanceladas_interfaces`.`numero_cuotas_canceladas` AS `numero_cuotas_canceladas`, `vista_calculonumerotransferencias_interfaces`.`numero_transferencias` AS `numero_transferencias`, `vista_calculocuotasvencidas_interfaces`.`numero_cuotas_vencidas` AS `numero_cuotas_vencidas` FROM (((((((`vista_calculoproductosregistrados_interfaces` left join `vista_calculocuotasregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculocuentasahorooregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculotransaccionescreditos_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculonumerocuotaspagadastarde_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculonumerocuotascanceladas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculonumerotransferencias_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculocuotasvencidas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_detallesfacturacioncreditosclientes`
--
DROP TABLE IF EXISTS `vista_detallesfacturacioncreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_detallesfacturacioncreditosclientes`  AS SELECT `cuotas`.`idcuotas` AS `idcuotas`, `cuotas`.`idcreditos` AS `idcreditos`, `cuotas`.`idproducto` AS `idproducto`, `cuotas`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `creditos`.`cuotamensual` AS `cuotamensual`, `cuotas`.`montocancelar` AS `montocancelar`, `cuotas`.`nombreproducto` AS `nombreproducto`, `productos`.`codigo` AS `codigo`, `cuotas`.`montocapital` AS `montocapital`, `cuotas`.`fechavencimiento` AS `fechavencimiento`, `transacciones`.`referencia` AS `referencia`, `transacciones`.`fecha` AS `fecha`, `transacciones`.`dias_incumplimiento` AS `dias_incumplimiento`, `transacciones`.`empleado_gestion` AS `empleado_gestion` FROM (((((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) join `transacciones` on(`transacciones`.`idcuotas` = `cuotas`.`idcuotas`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `cuotas`.`idproducto`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_detallesfacturacioncreditosclienteshistoricos`
--
DROP TABLE IF EXISTS `vista_detallesfacturacioncreditosclienteshistoricos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_detallesfacturacioncreditosclienteshistoricos`  AS SELECT `historicotransacciones`.`idhistoricotransaccion` AS `idhistoricotransaccion`, `historicotransacciones`.`idusuarios` AS `idusuarios`, `historicotransacciones`.`idcreditos` AS `idcreditos`, `historicotransacciones`.`idcuotas` AS `idcuotas`, `historicotransacciones`.`idproducto` AS `idproducto`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `historicotransacciones`.`referencia` AS `referencia`, `historicocreditos`.`montocredito` AS `montocredito`, `historicocreditos`.`cuotamensual` AS `cuotamensual`, `historicotransacciones`.`monto` AS `montocancelar`, `historicotransacciones`.`fecha` AS `fecha`, `historicotransacciones`.`dias_incumplimiento` AS `dias_incumplimiento`, `historicotransacciones`.`empleado_gestion` AS `empleado_gestion` FROM ((((`historicotransacciones` join `historicocreditos` on(`historicotransacciones`.`idcreditos` = `historicocreditos`.`idcreditos`)) join `usuarios` on(`historicotransacciones`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`historicotransacciones`.`idusuarios` = `detalleusuarios`.`idusuarios`)) join `productos` on(`historicotransacciones`.`idproducto` = `productos`.`idproducto`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_detallesusuarios`
--
DROP TABLE IF EXISTS `vista_detallesusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_detallesusuarios`  AS SELECT `detalleusuarios`.`iddetalle` AS `iddetalle`, `detalleusuarios`.`dui` AS `dui`, `detalleusuarios`.`nit` AS `nit`, `detalleusuarios`.`telefono` AS `telefono`, `detalleusuarios`.`celular` AS `celular`, `detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`, `detalleusuarios`.`direccion` AS `direccion`, `detalleusuarios`.`empresa` AS `empresa`, `detalleusuarios`.`cargo` AS `cargo`, `detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`, `detalleusuarios`.`fechanacimiento` AS `fechanacimiento`, `detalleusuarios`.`genero` AS `genero`, `detalleusuarios`.`estadocivil` AS `estadocivil`, `detalleusuarios`.`idusuarios` AS `idusuarios` FROM `detalleusuarios` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_notificacionesrecibidasusuarios`
--
DROP TABLE IF EXISTS `vista_notificacionesrecibidasusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_notificacionesrecibidasusuarios`  AS SELECT `notificaciones`.`idnotificacion` AS `idnotificacion`, `notificaciones`.`idusuarios` AS `idusuarios`, `notificaciones`.`titulonotificacion` AS `titulonotificacion`, `notificaciones`.`descripcionnotificacion` AS `descripcionnotificacion`, `notificaciones`.`fechanotificacion` AS `fechanotificacion`, `notificaciones`.`clasificacionnotificacion` AS `clasificacionnotificacion`, `notificaciones`.`ocultarnotificacion` AS `ocultarnotificacion` FROM `notificaciones` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_numerocuotasregistradas`
--
DROP TABLE IF EXISTS `vista_numerocuotasregistradas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_numerocuotasregistradas`  AS SELECT count(`cuotas`.`idcuotas`) AS `numero_cuotas` FROM `cuotas` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_numerotransaccionesprocesadas`
--
DROP TABLE IF EXISTS `vista_numerotransaccionesprocesadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_numerotransaccionesprocesadas`  AS SELECT count(`transacciones`.`idtransaccion`) AS `numero_transacciones` FROM `transacciones` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_productoscashmanha`
--
DROP TABLE IF EXISTS `vista_productoscashmanha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_productoscashmanha`  AS SELECT `productos`.`idproducto` AS `idproducto`, `productos`.`codigo` AS `codigo`, `productos`.`nombreproducto` AS `nombreproducto`, `productos`.`descripcionproducto` AS `descripcionproducto`, `productos`.`requisitosproductos` AS `requisitosproductos`, `productos`.`estado` AS `estado` FROM `productos` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_reporteiniciosdesesiones`
--
DROP TABLE IF EXISTS `vista_reporteiniciosdesesiones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporteiniciosdesesiones`  AS SELECT `accesos`.`idacceso` AS `idacceso`, `accesos`.`fechaacceso` AS `fechaacceso`, `accesos`.`dispositivo` AS `dispositivo`, `accesos`.`sistemaoperativo` AS `sistemaoperativo`, `accesos`.`idusuarios` AS `idusuarios` FROM `accesos` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_rolesdeusuarioscompleto`
--
DROP TABLE IF EXISTS `vista_rolesdeusuarioscompleto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_rolesdeusuarioscompleto`  AS SELECT `roles`.`idrol` AS `idrol`, `roles`.`nombrerol` AS `nombrerol`, `roles`.`descripcionrol` AS `descripcionrol` FROM `roles` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_transaccionespagocuotascreditosclientes`
--
DROP TABLE IF EXISTS `vista_transaccionespagocuotascreditosclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_transaccionespagocuotascreditosclientes`  AS SELECT `transacciones`.`idtransaccion` AS `idtransaccion`, `transacciones`.`idusuarios` AS `idusuarios`, `transacciones`.`idcuotas` AS `idcuotas`, `transacciones`.`referencia` AS `referencia`, `transacciones`.`monto` AS `monto`, `transacciones`.`fecha` AS `fecha` FROM `transacciones` ;

-- --------------------------------------------------------

--
-- Structure for view `vista_usuariosperfilincompleto`
--
DROP TABLE IF EXISTS `vista_usuariosperfilincompleto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuariosperfilincompleto`  AS SELECT `usuarios`.`idusuarios` AS `idusuarios`, `usuarios`.`nombres` AS `nombres`, `usuarios`.`apellidos` AS `apellidos`, `usuarios`.`codigousuario` AS `codigousuario`, `usuarios`.`correo` AS `correo`, `usuarios`.`fotoperfil` AS `fotoperfil`, `usuarios`.`idrol` AS `idrol`, `usuarios`.`estado_usuario` AS `estado_usuario`, `usuarios`.`completoperfil` AS `completoperfil`, `usuarios`.`quienregistro` AS `quienregistro` FROM `usuarios` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`idacceso`),
  ADD KEY `accesos_ibfk_1` (`idusuarios`);

--
-- Indexes for table `codigostransferencias`
--
ALTER TABLE `codigostransferencias`
  ADD PRIMARY KEY (`idcodigo`),
  ADD KEY `codigostransferencias_ibfk_1` (`idusuarios`);

--
-- Indexes for table `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`idcreditos`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`idcuentas`),
  ADD UNIQUE KEY `numerocuenta` (`numerocuenta`),
  ADD UNIQUE KEY `idusuarios` (`idusuarios`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indexes for table `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`idcuotas`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `cuotas_ibfk_2` (`idcreditos`);

--
-- Indexes for table `datosvehiculoscreditos`
--
ALTER TABLE `datosvehiculoscreditos`
  ADD PRIMARY KEY (`iddatosvehiculos`),
  ADD KEY `datosvehiculoscreditos_ibfk_1` (`idcreditos`),
  ADD KEY `datosvehiculoscreditos_ibfk_2` (`idproducto`),
  ADD KEY `datosvehiculoscreditos_ibfk_3` (`idusuarios`);

--
-- Indexes for table `detalleusuarios`
--
ALTER TABLE `detalleusuarios`
  ADD PRIMARY KEY (`iddetalle`),
  ADD UNIQUE KEY `dui` (`dui`,`nit`),
  ADD KEY `detalleusuarios_ibfk_1` (`idusuarios`);

--
-- Indexes for table `historicocreditos`
--
ALTER TABLE `historicocreditos`
  ADD PRIMARY KEY (`idhistorico`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idcreditos` (`idcreditos`);

--
-- Indexes for table `historicocuotascreditos`
--
ALTER TABLE `historicocuotascreditos`
  ADD PRIMARY KEY (`idhistorico`),
  ADD KEY `historicocuotascreditos_ibfk_2` (`idproducto`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idcreditos` (`idcreditos`);

--
-- Indexes for table `historicotransacciones`
--
ALTER TABLE `historicotransacciones`
  ADD PRIMARY KEY (`idhistoricotransaccion`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indexes for table `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD PRIMARY KEY (`idmensajeria`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idusuariosdestinatario` (`idusuariosdestinatario`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `idusuarios` (`idusuarios`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indexes for table `recuperacion`
--
ALTER TABLE `recuperacion`
  ADD PRIMARY KEY (`idrecuperaciones`);

--
-- Indexes for table `referenciaspersonales`
--
ALTER TABLE `referenciaspersonales`
  ADD PRIMARY KEY (`idreferencias`),
  ADD KEY `referenciaspersonales_ibfk_1` (`idcreditos`),
  ADD KEY `referenciaspersonales_ibfk_2` (`idproducto`),
  ADD KEY `referenciaspersonales_ibfk_3` (`idusuarios`);

--
-- Indexes for table `reporteproblemasplataforma`
--
ALTER TABLE `reporteproblemasplataforma`
  ADD PRIMARY KEY (`idreporte`),
  ADD KEY `idusuarios` (`idusuarios`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `nombrerol` (`nombrerol`);

--
-- Indexes for table `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`idtransaccion`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idcreditos` (`idcreditos`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idcuotas` (`idcuotas`);

--
-- Indexes for table `transaccionescuentasclientes`
--
ALTER TABLE `transaccionescuentasclientes`
  ADD PRIMARY KEY (`idtransaccioncuentas`),
  ADD KEY `idusuarios` (`idusuarios`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `transaccionescuentasclientes_ibfk_3` (`idcuentas`);

--
-- Indexes for table `transferencias`
--
ALTER TABLE `transferencias`
  ADD PRIMARY KEY (`idtransferencia`),
  ADD KEY `transferencias_ibfk_1` (`idusuarios`),
  ADD KEY `transferencias_ibfk_2` (`idproducto`),
  ADD KEY `transferencias_ibfk_3` (`idcuentas`),
  ADD KEY `transferencias_ibfk_4` (`idusuariodestino`),
  ADD KEY `transferencias_ibfk_5` (`idcuentadestino`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD UNIQUE KEY `codigousuario` (`codigousuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `usuarios_ibfk_1` (`idrol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesos`
--
ALTER TABLE `accesos`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `codigostransferencias`
--
ALTER TABLE `codigostransferencias`
  MODIFY `idcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creditos`
--
ALTER TABLE `creditos`
  MODIFY `idcreditos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `idcuentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `idcuotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `datosvehiculoscreditos`
--
ALTER TABLE `datosvehiculoscreditos`
  MODIFY `iddatosvehiculos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detalleusuarios`
--
ALTER TABLE `detalleusuarios`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `historicocreditos`
--
ALTER TABLE `historicocreditos`
  MODIFY `idhistorico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historicocuotascreditos`
--
ALTER TABLE `historicocuotascreditos`
  MODIFY `idhistorico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `historicotransacciones`
--
ALTER TABLE `historicotransacciones`
  MODIFY `idhistoricotransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mensajeria`
--
ALTER TABLE `mensajeria`
  MODIFY `idmensajeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recuperacion`
--
ALTER TABLE `recuperacion`
  MODIFY `idrecuperaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `referenciaspersonales`
--
ALTER TABLE `referenciaspersonales`
  MODIFY `idreferencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reporteproblemasplataforma`
--
ALTER TABLE `reporteproblemasplataforma`
  MODIFY `idreporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idtransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transaccionescuentasclientes`
--
ALTER TABLE `transaccionescuentasclientes`
  MODIFY `idtransaccioncuentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transferencias`
--
ALTER TABLE `transferencias`
  MODIFY `idtransferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `accesos_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `codigostransferencias`
--
ALTER TABLE `codigostransferencias`
  ADD CONSTRAINT `codigostransferencias_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `creditos`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `creditos_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `creditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE;

--
-- Constraints for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`),
  ADD CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Constraints for table `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `cuotas_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION,
  ADD CONSTRAINT `cuotas_ibfk_2` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE,
  ADD CONSTRAINT `cuotas_ibfk_3` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION;

--
-- Constraints for table `datosvehiculoscreditos`
--
ALTER TABLE `datosvehiculoscreditos`
  ADD CONSTRAINT `datosvehiculoscreditos_ibfk_1` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE,
  ADD CONSTRAINT `datosvehiculoscreditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  ADD CONSTRAINT `datosvehiculoscreditos_ibfk_3` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `detalleusuarios`
--
ALTER TABLE `detalleusuarios`
  ADD CONSTRAINT `detalleusuarios_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `historicocreditos`
--
ALTER TABLE `historicocreditos`
  ADD CONSTRAINT `historicocreditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Constraints for table `historicocuotascreditos`
--
ALTER TABLE `historicocuotascreditos`
  ADD CONSTRAINT `historicocuotascreditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Constraints for table `historicotransacciones`
--
ALTER TABLE `historicotransacciones`
  ADD CONSTRAINT `historicotransacciones_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Constraints for table `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD CONSTRAINT `mensajeria_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajeria_ibfk_2` FOREIGN KEY (`idusuariosdestinatario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `referenciaspersonales`
--
ALTER TABLE `referenciaspersonales`
  ADD CONSTRAINT `referenciaspersonales_ibfk_1` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referenciaspersonales_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `referenciaspersonales_ibfk_3` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `reporteproblemasplataforma`
--
ALTER TABLE `reporteproblemasplataforma`
  ADD CONSTRAINT `reporteproblemasplataforma_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE;

--
-- Constraints for table `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE,
  ADD CONSTRAINT `transacciones_ibfk_3` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  ADD CONSTRAINT `transacciones_ibfk_4` FOREIGN KEY (`idcuotas`) REFERENCES `cuotas` (`idcuotas`) ON DELETE CASCADE;

--
-- Constraints for table `transaccionescuentasclientes`
--
ALTER TABLE `transaccionescuentasclientes`
  ADD CONSTRAINT `transaccionescuentasclientes_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaccionescuentasclientes_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaccionescuentasclientes_ibfk_3` FOREIGN KEY (`idcuentas`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE;

--
-- Constraints for table `transferencias`
--
ALTER TABLE `transferencias`
  ADD CONSTRAINT `transferencias_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `transferencias_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  ADD CONSTRAINT `transferencias_ibfk_3` FOREIGN KEY (`idcuentas`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE,
  ADD CONSTRAINT `transferencias_ibfk_4` FOREIGN KEY (`idusuariodestino`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `transferencias_ibfk_5` FOREIGN KEY (`idcuentadestino`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `CambioEstadoCuotasClientes_IncumplimientoPagos` ON SCHEDULE EVERY 100 SECOND STARTS '2025-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculodiasfechavencimiento_cuotasclientes SET incumplimiento_pago="SI" WHERE dias_incumplimiento>0 AND estadocuota="pendiente"$$

CREATE DEFINER=`root`@`localhost` EVENT `CambioEstadosCodigoSeguridad` ON SCHEDULE EVERY 30 SECOND STARTS '2025-04-08 00:00:00' ON COMPLETION PRESERVE ENABLE DO CALL CambioEstadoCodigoSeguridad()$$

CREATE DEFINER=`root`@`localhost` EVENT `CambioEstadoTicketsReportesPlataforma_Inactividad` ON SCHEDULE EVERY 2 MINUTE STARTS '2025-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculo_ultimaactividad_ticketsreportesplataforma SET estado="cerrado" WHERE estado="resuelto" OR estado="no resuelto" OR dias_ultima_actividad>3$$

CREATE DEFINER=`root`@`localhost` EVENT `ExpirarCodigoSeguridad_TransferenciasClientes` ON SCHEDULE EVERY 30 SECOND STARTS '2025-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculaduracioncodigoseguridad_transferencias SET estado="Vencido" WHERE minutos_expiracion>2$$

CREATE DEFINER=`root`@`localhost` EVENT `SumatoriaMoraCuotasClientesVencidas` ON SCHEDULE EVERY 1 DAY STARTS '2025-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cuotas SET montocancelar=montocancelar+5.99 WHERE incumplimiento_pago="SI"$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
