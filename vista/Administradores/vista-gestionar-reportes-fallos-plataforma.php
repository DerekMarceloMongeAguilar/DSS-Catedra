<?php
// IMPORTANDO MODELO DE CLIMA EN TIEMPO REAL -> API CLIMA OPENWEATHERMAP
require('../modelo/mAPIClima_Openweathermap.php');
// IMPORTANDO MODELO DE CONTEO NUMERO DE NOTIFICACIONES RECIBIDAS
require('../modelo/mConteoNotificacionesRecibidasUsuarios.php');
// IMPORTANDO MODELO DE CONTEO NUMERO DE MENSAJES RECIBIDOS
require('../modelo/mConteoMensajesBandejaEntrada_MensajeriaInterna.php');
// DATOS DE LOCALIZACION -> IDIOMA ESPAÑOL -> ZONA HORARIA EL SALVADOR (UTC-6)
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/El_Salvador');
// OBTENER HORA LOCAL
$hora = new DateTime("now");
// NO PERMITIR INGRESO SI PARAMETRO NO HA SIDO ESPECIFICADO
if (empty($_GET['idreporte'])) {
	header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// NO PERMITIR INGRESO SI NO EXISTE INFORMACION QUE MOSTRAR
if (empty($Gestiones->getIdReportePlataforma())) {
	header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
// SI LOS USUARIOS INICIAN POR PRIMERA VEZ, MOSTRAR PAGINA DONDE DEBERAN REALIZAR EL CAMBIO OBLIGATORIO DE SU CONTRASEÑA GENERADA AUTOMATICAMENTE
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
	header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestiones-nuevos-usuarios-registrados');
	// CASO CONTRARIO, MOSTRAR PORTAL DE USUARIOS -> SEGUN ROL DE USUARIO ASIGNADO
} else {
?>

	<!DOCTYPE html>
	<html lang="ES-SV">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Aco Emprendedores | Actualizaci&oacute;n Reportes Fallos Plataforma</title>
		<!-- Favicon icon -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192" href="<?php echo $UrlGlobal; ?>vista/images/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $UrlGlobal; ?>vista/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $UrlGlobal; ?>vista/images/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $UrlGlobal; ?>vista/images/favicon-16x16.png">
		<link rel="manifest" href="<?php echo $UrlGlobal; ?>vista/images/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo $UrlGlobal; ?>vista/images/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
		<link href="<?php echo $UrlGlobal; ?>vista/css/style.css" rel="stylesheet">
		<!-- Daterange picker -->
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<!-- Clockpicker -->
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
		<!-- asColorpicker -->
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
		<!-- Material color picker -->
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
		<!-- Pick date -->
		<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/themes/default.css">
		<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/themes/default.date.css">
		<!-- Bootstrap Dropzone CSS -->
		<link href="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<!-- Bootstrap Dropzone CSS -->
		<link href="<?php echo $UrlGlobal; ?>vista/dropify/dist/css/dropify.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
		<!-- Toastr -->
		<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/toastr/css/toastr.min.css">
		<!-- Datatable -->
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	</head>

	<body>

		<!--*******************
        Preloader start
    ********************-->
		<div id="preloader">
			<div class="sk-three-bounce">
				<div class="sk-child sk-bounce1"></div>
				<div class="sk-child sk-bounce2"></div>
				<div class="sk-child sk-bounce3"></div>
			</div>
		</div>
		<!--*******************
        Preloader end
    ********************-->


		<!--**********************************
        Main wrapper start
    ***********************************-->
		<div id="main-wrapper">

			<!--**********************************
            Nav header start
        ***********************************-->
			<div class="nav-header">
				<a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=inicioadministradores" class="brand-logo">
					<h3>Aco Emprendedores</h3>
				</a>

				<div class="nav-control">
					<div class="hamburger">
						<span class="line"></span><span class="line"></span><span class="line"></span>
					</div>
				</div>
			</div>
			<!--**********************************
            Nav header end
        ***********************************-->

			<!--**********************************
            Header start
        ***********************************-->
			<div class="header">
				<div class="header-content">
					<nav class="navbar navbar-expand">
						<div class="collapse navbar-collapse justify-content-between">
							<div class="header-left">
								<div class="dashboard_bar">
									<h4 style="font-weight: 600;">Actualizaci&oacute;n Reportes Fallos Plataforma</h4>
								</div>
							</div>

							<ul class="navbar-nav header-right">
								<li class="nav-item dropdown header-profile">
									<a class="nav-link" href="#" role="button" data-toggle="dropdown">
										<div class="header-info">
											<span class="text-black">Hola, <strong><?php $Nombre = $_SESSION['nombre_usuario'];
																					$PrimerNombre = explode(' ', $Nombre, 2);
																					print_r($PrimerNombre[0]); ?></strong></span>
											<p class="fs-12 mb-0">
												<!-- VALIDACION SEGUN ROLES DE USUARIOS -->
												<?php if ($_SESSION['id_rol'] == 1) {
													echo "Administradores";
												} else if ($_SESSION['id_rol'] == 2) {
													echo "Presidencia";
												} else if ($_SESSION['id_rol'] == 3) {
													echo "Gerencia";
												} else if ($_SESSION['id_rol'] == 4) {
													echo "Atenci&oacute;n al Cliente";
												} else if ($_SESSION['id_rol'] == 5) {
													echo "Clientes";
												} ?>
											</p>
										</div>
										<img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $_SESSION['foto_perfil']; ?>" width="20" alt="" />
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="<?php echo $UrlGlobal ?>controlador/cGestionesCashman.php?cashmanhagestion=perfiladministradores" class="dropdown-item ai-icon">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
											<span class="ml-2">Mi Perfil </span>
										</a>
										<a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=mensajeria-cashmanha-usuarios" class="dropdown-item ai-icon">
											<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
												<polyline points="22,6 12,13 2,6"></polyline>
											</svg>
											<span class="ml-2">Inbox </span>
										</a>
										<a href="<?php echo $UrlGlobal ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=cerrarsesion" class="dropdown-item ai-icon">
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
												<polyline points="16 17 21 12 16 7"></polyline>
												<line x1="21" y1="12" x2="9" y2="12"></line>
											</svg>
											<span class="ml-2">Cerrar Sesi&oacute;n </span>
										</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

			<!--**********************************
            Sidebar start
        ***********************************-->
			<?php
			// IMPORTAR MENU DE NAVEGACION PARA USUARIOS ROL ADMINISTRADORES
			require('../vista/MenuNavegacion/menu-administradores.php');
			?>
			<!--**********************************
            Sidebar end
        ***********************************-->

			<!--**********************************
            Content body start
        ***********************************-->
			<div class="content-body">
				<div class="container-fluid">
					<div class="page-titles">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Inicio</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Problemas</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Actualizar Reportes Problemas</a></li>
						</ol>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="alert alert-secondary alert-dismissible fade show">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
									<path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
								</svg>
								<strong>Este reporte ha sido registrado el : <?php $Registro = date_create($Gestiones->getFechaRegistroReportePlataforma());
																				echo date_format($Registro, "d-m-Y");
																				echo ' a las ';
																				echo date_format($Registro, "H:i:s");
																				echo ' <i class="ti-hand-point-right"></i> por el usuario ';
																				echo $Gestiones->getCodigoUsuarios(); ?></strong>.
							</div>
							<?php
							if ($Gestiones->getEstadoReportePlataforma() == "pendiente") {
							?>
								<div class="alert alert-danger alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
										<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
										<line x1="15" y1="9" x2="9" y2="15"></line>
										<line x1="9" y1="9" x2="15" y2="15"></line>
									</svg>
									<strong>¡Atenci&oacute;n! El estado de este reporte es [Pendiente]. Ning&uacute;n empleado se encuentra gestion&aacute;ndolo.</strong>
								</div>
							<?php } else if ($Gestiones->getEstadoReportePlataforma() == "en proceso") { ?>
								<div class="alert alert-warning alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
										<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
										<line x1="12" y1="9" x2="12" y2="13"></line>
										<line x1="12" y1="17" x2="12.01" y2="17"></line>
									</svg>
									<strong>¡Ticket en proceso! El empleado <?php echo $Gestiones->getEmpleadoGestionandoReportePlataforma(); ?> se encuentra gestion&aacute;ndolo.</strong>
								</div>
							<?php } else if ($Gestiones->getEstadoReportePlataforma() == "no resuelto") { ?>
								<div class="alert alert-danger alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
										<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
										<line x1="15" y1="9" x2="9" y2="15"></line>
										<line x1="9" y1="9" x2="15" y2="15"></line>
									</svg>
									<strong>¡Atenci&oacute;n! Este ticket de problema no pudo ser resuelto. No se encontr&oacute; la causa de alg&uacute;n fallo o el usuario no espec&iacute;fico correctamente el problema.</strong>
								</div>
							<?php } else if ($Gestiones->getEstadoReportePlataforma() == "resuelto") { ?>
								<div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
										<polyline points="9 11 12 14 22 4"></polyline>
										<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
									</svg>
									<strong>¡Ticket Resuelto! Se ha solventado con &eacute;xito el problema de este ticket.<br>Gestionado por &uacute;ltima vez por el empleado: <?php echo $Gestiones->getEmpleadoGestionandoReportePlataforma(); ?></strong>
								</div>
							<?php } else if ($Gestiones->getEstadoReportePlataforma() == "cerrado") { ?>
								<div class="alert alert-dark alert-dismissible fade show">
									<i style="font-size: 1.4rem; font-weight: bold;" class="ti-na"></i>
									<strong>¡Ticket Cerrado! Gestionado por &uacute;ltima vez por el empleado: <?php echo $Gestiones->getEmpleadoGestionandoReportePlataforma(); ?></strong>
								</div>
							<?php } ?>
							<div class="alert alert-dark alert-dismissible fade show">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
									<polyline points="9 11 12 14 22 4"></polyline>
									<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
								</svg>
								<strong>&Uacute;ltima actualizaci&oacute;n de este reporte :</strong> <?php $Registro = date_create($Gestiones->getFechaActualizacionReportePlataforma());
																										echo date_format($Registro, "d-m-Y");
																										echo ' a las ';
																										echo date_format($Registro, "H:i:s"); ?>.
							</div>
						</div>
						<div class="card-body">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#home8">
										<span>
											<i class="ti-cloud-up"></i>
										</span>
									</a>
								</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content tabcontent-border">
								<div class="tab-pane fade show active" id="home8" role="tabpanel">
									<div class="pt-4">

										<br>
										<form id="actualizacion-reportesfallos" class="validacion-registro-ticket-problemas" method="post" autocomplete="off" enctype="multipart/form-data">
											<div class="row form-validation">
												<div class="col-lg-12 mb-2">
													<div class="form-group">
														<input type="hidden" name="idunicoreportefalloplataforma" value="<?php echo $Gestiones->getIdReportePlataforma(); ?>">
														<label class="text-label">Nombre de Ticket Reporte <span class="text-danger">*</span></label>
														<div class="col-lg-12">
															<input style="cursor: no-drop;" type="text" class="form-control" id="val-nombrereporte" name="val-nombrereporte" placeholder="Ingrese el nombre del ticket del reporte" value="<?php echo $Gestiones->getNombreReportePlataforma(); ?>" disabled>
														</div>
													</div>
												</div>
												<div class="col-lg-12 mb-2">
													<div class="form-group">
														<label class="text-label">Descripci&oacute;n Completa <span class="text-danger">*</span></label>
														<div class="col-lg-12">
															<textarea style="cursor: no-drop;" class="form-control" placeholder="Ingrese la descripci&oacute;n completa de su ticket de reporte" id="val-descripcion-reporte" name="val-descripcion-reporte" rows="10" disabled><?php echo $Gestiones->getDescripcionReportePlataforma(); ?></textarea>
														</div>
													</div>
												</div>
												<div class="col-lg-12 mb-2">
													<div class="form-group">
														<label class="text-label">Fotograf&iacute;a de Reporte <span class="text-danger">*</span></label>
														<div class="col-lg-12">
															<img style="max-width: 600px; display: block; margin: auto;" class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/fotoreportesplataforma/<?php echo $Gestiones->getFotoReportePlataforma(); ?>">
														</div>
													</div>
												</div>
												<div class="col-lg-12 mb-2">
													<div class="form-group">
														<label class="text-label">Seleccione un Estado <span class="text-danger">*</span></label>
														<div class="col-lg-12">
															<select <?php if ($Gestiones->getEstadoReportePlataforma() == "no resuelto" || $Gestiones->getEstadoReportePlataforma() == "resuelto" || $Gestiones->getEstadoReportePlataforma() == "cerrado") {
																		echo 'style="cursor: no-drop;" disabled';
																	} ?> class="form-control" id="val-estado-reporte-plataforma" name="val-estado-reporte-plataforma">
																<?php
																if ($Gestiones->getEstadoReportePlataforma() == "pendiente") {
																?>
																	<option value="">Seleccione una opci&oacute;n...</option>
																	<option value="en proceso">Ticket En Proceso</option>
																	<option value="no resuelto">Ticket No Resuelto</option>
																	<option value="resuelto">Ticket Resuelto</option>
																<?php
																} else if ($Gestiones->getEstadoReportePlataforma() == "en proceso") {
																?>
																	<option value="en proceso">Ticket En Proceso</option>
																	<option value="no resuelto">Ticket No Resuelto</option>
																	<option value="resuelto">Ticket Resuelto</option>
																<?php
																} else if ($Gestiones->getEstadoReportePlataforma() == "no resuelto") {
																?>
																	<option value="no resuelto">Ticket No Resuelto</option>
																<?php
																} else if ($Gestiones->getEstadoReportePlataforma() == "resuelto") {
																?>
																	<option value="resuelto">Ticket Resuelto</option>
																<?php
																} else if ($Gestiones->getEstadoReportePlataforma() == "cerrado") {
																?>
																	<option value="cerrado">Ticket Cerrado</option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-12 mb-2">
													<div class="form-group">
														<label class="text-label">Comentario de Actualizaci&oacute;n <span class="text-danger">*</span></label>
														<div class="col-lg-12">
															<textarea <?php if ($Gestiones->getEstadoReportePlataforma() == "no resuelto" || $Gestiones->getEstadoReportePlataforma() == "resuelto" || $Gestiones->getEstadoReportePlataforma() == "cerrado") {
																			echo 'style="cursor: no-drop;" disabled';
																		} ?> class="form-control" placeholder="Ingrese el comentario de actualizaci&oacute;n de este reporte" id="val-comentario-reporte" name="val-comentario-reporte" rows="6"><?php if (!empty($Gestiones->getComentarioActualizacionReportePlataforma())) {
																																																														echo $Gestiones->getComentarioActualizacionReportePlataforma();
																																																													} ?></textarea>
														</div>
													</div>
												</div>
											</div>
											<!-- ENVIO DATOS -->
											<button <?php if ($Gestiones->getEstadoReportePlataforma() == "no resuelto" || $Gestiones->getEstadoReportePlataforma() == "resuelto" || $Gestiones->getEstadoReportePlataforma() == "cerrado") {
														echo 'style="cursor: no-drop;" disabled';
													} ?> type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="ti-pencil"></i></span>Actualizar Ticket de Fallos</button><br><br>
											<?php if ($Gestiones->getEstadoReportePlataforma() == "no resuelto") { ?>
												<div class="alert alert-danger alert-dismissible fade show">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
														<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
														<line x1="15" y1="9" x2="9" y2="15"></line>
														<line x1="9" y1="9" x2="15" y2="15"></line>
													</svg>
													<strong>¡Atenci&oacute;n! Este ticket de problema no pudo ser resuelto. No se encontr&oacute; la causa de alg&uacute;n fallo o el usuario no espec&iacute;fico correctamente el problema.</strong>
												</div>
											<?php } else if ($Gestiones->getEstadoReportePlataforma() == "resuelto") { ?>
												<div class="alert alert-success alert-dismissible fade show">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
														<polyline points="9 11 12 14 22 4"></polyline>
														<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
													</svg>
													<strong>¡Ticket Resuelto! Se ha solventado con &eacute;xito el problema de este ticket.<br>Gestionado por &uacute;ltima vez por el empleado: <?php echo $Gestiones->getEmpleadoGestionandoReportePlataforma(); ?></strong>
												</div>
											<?php } else if ($Gestiones->getEstadoReportePlataforma() == "cerrado") { ?>
												<div class="alert alert-dark alert-dismissible fade show">
													<i style="font-size: 1.4rem; font-weight: bold;" class="ti-na"></i>
													<strong>¡Ticket Cerrado! Gestionado por &uacute;ltima vez por el empleado: <?php echo $Gestiones->getEmpleadoGestionandoReportePlataforma(); ?></strong>
												</div>
											<?php } ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>

		</div>
		</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->


		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright &copy; <?php echo date('Y'); ?> ACO EMPRENDEDORES</p>
			</div>
		</div>
		<!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

		<!--**********************************
           Support ticket button end
        ***********************************-->


		</div>
		<!--**********************************
        Main wrapper end
    ***********************************-->

		<!--**********************************
        Scripts
    ***********************************-->
		<!-- Required vendors -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/global/global.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/custom.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/deznav-init.js"></script>
		<!-- Jquery Validation -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-validation/jquery.validate.min.js"></script>
		<!-- Form validate init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery.validate-init.js"></script>
		<!-- Daterangepicker -->
		<!-- momment js is must -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/moment/moment.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- clockpicker -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
		<!-- asColorPicker -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asColor/jquery-asColor.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
		<!-- Material color picker -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
		<!-- pickdate -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/picker.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/picker.time.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/picker.date.js"></script>



		<!-- Daterangepicker -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/bs-daterange-picker-init.js"></script>
		<!-- Clockpicker init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/clock-picker-init.js"></script>
		<!-- asColorPicker init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery-asColorPicker.init.js"></script>
		<!-- Material color picker init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/material-date-picker-init.js"></script>
		<!-- Pickdate -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/pickadate-init.js"></script>
		<!-- Mask -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/mask.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/mascaras-datos.js"></script>
		<!-- Dropzone JavaScript -->
		<script src="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.js"></script>
		<!-- Dropify JavaScript -->
		<script src="<?php echo $UrlGlobal; ?>vista/dropify/dist/js/dropify.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/dropzone-configuration.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/alerta-actualizacion-reportes-fallos-plataforma.js"></script>
		<!-- Datatable -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/datatables.init.js"></script>
		<!-- Time ago -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/jquery.timeago.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/control_tiempo.js"></script>
		<!-- Toastr -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/toastr/js/toastr.min.js"></script>
		<!-- All init script -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/toastr-init.js"></script>

	</body>

	</html>
<?php } ?>