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
		<title>Aco Emprendedores</title>
		<!-- Favicon icon -->

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
		<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/select2/css/select2.min.css">
		<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
		<style>
			table.dataTable thead {
				background-color: #a29bfe
			}
		</style>

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
									<h4 style="font-weight: 600;">Enviar Nuevos Mensajes</h4>
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
										<a href="<?php echo $UrlGlobal ?>controlador/cGestionesCashman.php?cashmanhagestion=perfilatencionclientes" class="dropdown-item ai-icon">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
											<span class="ml-2">Mi Perfil </span>
										</a>
										<a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=mensajeria-cashmanha-usuarios-atencion-al-cliente" class="dropdown-item ai-icon">
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
			// IMPORTAR MENU USUARIOS ROL ATENCION AL CLIENTE
			require('../vista/MenuNavegacion/menu-atencio-al-cliente.php');
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
							<li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Compose</a></li>
						</ol>
					</div>
					<!-- row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<div class="email-left-box px-0 mb-3">
										<div class="p-0">
											<a style="cursor: no-drop;" href="javascript:void(0)" class="btn btn-primary btn-block">Enviar Nuevo Mensaje</a>
										</div>
										<div class="mail-list mt-4">
											<a href="email-inbox.html" class="list-group-item"><i class="fa fa-inbox font-18 align-middle mr-2"></i> Recibidos <span class="badge badge-primary badge-sm float-right"><?php echo NumeroMensajesRecibidosUsuarios($conectarsistema5, $_SESSION['id_usuario']); ?></span> </a>
										</div>
										<div class="intro-title d-flex justify-content-between">
											<h5>Consideraciones</h5>
											<i class="fa fa-chevron-down" aria-hidden="true"></i>
										</div>
										<div class="mail-list mt-4">
											<a href="email-inbox.html" class="list-group-item"><span class="icon-warning"><i class="fa fa-circle" aria-hidden="true"></i></span>
												Urgentes </a>
											<a href="email-inbox.html" class="list-group-item"><span class="icon-primary"><i class="fa fa-circle" aria-hidden="true"></i></span>
												Informativos </a>
											<a href="email-inbox.html" class="list-group-item"><span class="icon-success"><i class="fa fa-circle" aria-hidden="true"></i></span>
												Nuevos Productos </a>
											<a href="email-inbox.html" class="list-group-item"><span class="icon-dpink"><i class="fa fa-circle" aria-hidden="true"></i></span>
												No Spam </a>
										</div>
									</div>
									<div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
										<div class="compose-content">
											<form id="envio-datos-mensajeriausuarios" class="validacion-registro-mensajeria" method="post" autocomplete="off">
												<div class="form-group">
													<label class="text-label">Seleccione su destinatario <span class="text-danger">*</span></label>
													<div class="mb-4">
														<select class="js-example-theme-single" id="val-destinatario" name="val-destinatario">
															<option value="">Seleccionar un usuario...</option>
															<?php
															while ($filas = mysqli_fetch_array($consulta)) {
																// NO MOSTRAR USUARIO LOGUEADO EN LISTADO COMPLETO DE USUARIOS
																if ($filas['idusuarios'] != $_SESSION['id_usuario']) {
																	echo '
																	<option value="';
																	echo $filas['idusuarios'];
																	echo '">';
																	echo $filas['nombres'];
																	echo ' ';
																	echo $filas['apellidos'];
																	echo ' [';
																	echo $filas['codigousuario'];
																	echo ']</option>
																';
																}
															}
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="text-label">Ingrese el nombre de su mensaje <span class="text-danger">*</span></label>
													<input type="text" class="form-control bg-transparent" id="val-nombremensaje" name="val-nombremensaje" placeholder=" Nombre: ">
												</div>
												<div class="form-group">
													<label class="text-label">Ingrese el asunto de su mensaje <span class="text-danger">*</span></label>
													<input type="text" class="form-control bg-transparent" id="val-asuntomensaje" name="val-asuntomensaje" placeholder=" Asunto: ">
												</div>
												<div class="form-group">
													<label class="text-label">Escriba aqu&iacute; su mensaje <span class="text-danger">*</span></label>
													<textarea class="textarea_editor form-control bg-transparent" id="val-mensajecompleto" name="val-mensajecompleto" rows="15" placeholder=" Mensaje: ..."></textarea>
												</div>
												<div class="text-left mt-4 mb-5">
													<button class="btn btn-primary btn-sl-sm mr-2" type="submit"><span class="mr-2"><i class="fa fa-paper-plane"></i></span>Enviar Mensaje</button>
												</div>
											</form>
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
			<!-- Dropzone JavaScript -->
			<script src="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.js"></script>
			<!-- Dropify JavaScript -->
			<script src="<?php echo $UrlGlobal; ?>vista/dropify/dist/js/dropify.min.js"></script>
			<script src="<?php echo $UrlGlobal; ?>vista/js/dropzone-configuration.js"></script>
			<script src="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
			<script src="<?php echo $UrlGlobal; ?>vista/js/alerta-envio-mensajeria-usuarios-cashmanha.js"></script>
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
			<script src="<?php echo $UrlGlobal; ?>vista/vendor/select2/js/select2.full.min.js"></script>
			<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/select2-init.js"></script>

	</body>

	</html>
<?php } ?>