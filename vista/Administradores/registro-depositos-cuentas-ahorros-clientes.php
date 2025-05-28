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
        <title>Aco Emprendedores | Registro Dep&oacute;sitos Cuentas de Ahorro</title>
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
        <link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/select2/css/select2.min.css">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

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
                                    <h4 style="font-weight: 600;">Dep&oacute;sito Cuentas de Ahorro</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Cuentas</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dep&oacute;sito Cuentas de Ahorro</a></li>
                        </ol>
                    </div>
                    <div class="row">

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
                                        <h4>Dep&oacute;sito Cuentas de Ahorro </h4><br>
                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                            <div class="card overflow-hidden">
                                                <div class="text-center p-3 overlay-box ">
                                                    <div class="profile-photo">
                                                        <img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <h3 class="mt-3 mb-1 text-white"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h3>
                                                    <p class="text-white mb-0">Cliente </p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">N&uacute;mero Documento &Uacute;nico de Identidad</span> <strong class="text-muted"><?php echo $Gestiones->getDuiUsuarios(); ?> </strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">N&uacute;mero de Identificaci&oacute;n Tributaria</span> <strong class="text-muted"><?php echo $Gestiones->getNitUsuarios(); ?> </strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Estado de la Cuenta</span> <strong class="text-muted"><?php echo ucfirst($Gestiones->getEstadoCuentaAhorroClientes()); ?> </strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Saldo Actual</span> <strong class="text-muted">$<?php echo number_format($Gestiones->getSaldoCuentaAhorroClientes(), 2); ?> USD </strong></li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <form data-id="<?php if (!empty($Gestiones->getUltimoIdTransaccionesDepositosRetirosCuentas())) {
                                                                            echo $Gestiones->getUltimoIdTransaccionesDepositosRetirosCuentas() + 1;
                                                                        }  ?>" data-user-id="<?php echo $_GET['idusuario']; ?>" name="calculadora" id="ingreso-deposito-cuentas-ahorro-clientes" method="post" autocomplete="off" enctype="multipart/form-data">
                                                            <input type="hidden" name="SaldoActualCuentaClientes" onKeyUp="CalcularNuevoSaldoCliente()" value="<?php echo $Gestiones->getSaldoCuentaAhorroClientes(); ?>">
                                                            <input type="hidden" id="val-numerocuentaahorro" name="NumeroCuentaAhorrosClientes" value="<?php echo $Gestiones->getNumeroCuentaAhorroClientes(); ?>">
                                                            <input type="hidden" name="IdUsuarioCuentaAhorro" value="<?php echo $_GET['idusuario']; ?>">
                                                            <input type="hidden" name="IdCuentaAhorro" value="<?php echo $Gestiones->getIdCuentaAhorroClientes(); ?>">
                                                            <div class="row form-validation">
                                                                <div style="margin:0; padding:0;" id="resultados_ajax"></div>
                                                                <div class="col-lg-12 mb-5">
                                                                    <div class="form-group">
                                                                        <label class="text-label">Ingrese el monto a depositar <span class="text-danger">*</span></label>
                                                                        <small>El monto m&aacute;ximo de dep&oacute;sito es de $3,000.00 USD</small>
                                                                        <div class="col-lg-12">
                                                                            <input type="text" class="form-control" id="val-montodepositocuentaahorro" name="SaldoDepositoCuentaClientes" placeholder="$ USD" onInput="ValidarMontoApertura()" onkeypress="return (event.charCode <= 57)" onKeyUp="CalcularNuevoSaldoCliente()">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <small>* Por favor tomar en cuenta que el monto m&aacute;ximo por cada transferencia es de $3,000.00 USD. Verifique que todos los datos sean correctos antes de procesar la informaci&oacute;n.</small>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="form-group">
                                                                <div style="margin: 0 auto;" class="col-lg-8">
                                                                    <div class="widget-stat card">
                                                                        <div class="card-body p-4">
                                                                            <div class="media ai-icon">
                                                                                <span class="mr-3 bgl-success text-success">
                                                                                    <svg fill="#2bc155" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="35" height="35">
                                                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                                                        <path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v14h16V5H4zm4.5 9H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z" />
                                                                                    </svg>
                                                                                </span>
                                                                                <div class="media-body">
                                                                                    <p class="mb-1">Nuevo Saldo Final Cliente</p>
                                                                                    <h4 class="mb-0">$ <input style="border: 0; width: 6em;" type="text" name="resultado" value="<?php echo $Gestiones->getSaldoCuentaAhorroClientes(); ?>" disabled> USD</h4>
                                                                                    <span class="badge badge-success">No. Cuenta -> <?php echo $Gestiones->getNumeroCuentaAhorroClientes(); ?></span>
                                                                                    <br><small>Cliente: <?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></small>
                                                    <li class="list-group-item d-flex justify-content-between"><small>* Al finalizar la transacci&oacute;n, ser&aacute; redirigido al comprobante efectuado el cual deber&aacute; entregar en f&iacute;sico al cliente final.</small></li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-0 mt-0">
                    <button class="btn btn-primary btn-lg btn-block" id="registronuevascuentas" type="submit"><i class="fa fa-credit-card-alt"></i> Registrar Dep&oacute;sito No. Cuenta -> <?php echo $Gestiones->getNumeroCuentaAhorroClientes(); ?></button>
                </div>
                </li>
                </form>
                </ul>
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
        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-ingreso-nuevas-cuentas-ahorro-clientes.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/ComprobarDisponibilidadNumeroCuentaAhorroClientes.js"></script>
        <!-- Datatable -->
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/datatables.init.js"></script>
        <!-- Toastr -->
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/toastr/js/toastr.min.js"></script>
        <!-- All init script -->
        <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/toastr-init.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/select2/js/select2.full.min.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/select2-init.js"></script>
        <script>
            // COMPROBAR SI CANTIDAD RECIBIDA ES IGUAL O MENOR A LA REQUERIDA. CANTIDADES MAYORES NO SON POSIBLES DE PROCESAR
            $('#registronuevascuentas').prop('disabled', true); // BLOQUEAR BOTON DE ENVIO POR DEFECTO
            function ValidarMontoApertura() {
                var DepositoMaximoApertura = 3000; // COMPROBACION MONTO MAXIMO DE DEPOSITO
                let IngresoDepositoClientes = $('#val-montodepositocuentaahorro').val(); // COMPROBACION DE DEPOSITO INGRESADO POR CLIENTES
                $('#registronuevascuentas').prop('disabled', true); // BLOQUEAR BOTON DE ENVIO POR DEFECTO
                let activador = document.getElementById("val-montodepositocuentaahorro")
                activador.addEventListener("keyup", () => {
                    if (activador.value > DepositoMaximoApertura || activador.value == 0 || activador.value < 0) {
                        // SI EL MONTO INGRESADO ES MENOR AL QUE SE REQUIERE, NO SE PODRA PROCESAR LA SOLICITUD DE PAGOS DE CLIENTES
                        $('#registronuevascuentas').prop('disabled', true);
                        // CASO CONTRARIO, PERMITIR PROCESAR LOS PAGOS DE CLIENTES
                    } else {
                        $('#registronuevascuentas').prop('disabled', false);
                    }
                }) // CIERRE activador.addEventListener("keyup", () => 
            }
            // CALCULAR NUEVO SALDO FINAL -> CUENTAS DE AHORRO CLIENTES
            function CalcularNuevoSaldoCliente() {
                // VARIABLES GLOBALES
                var SaldoActualCuentaClientes = document.calculadora.SaldoActualCuentaClientes.value;
                var SaldoDepositoCuentaClientes = document.calculadora.SaldoDepositoCuentaClientes.value;
                try {
                    // INICIALIZACION DE VARIABLES GLOBALES
                    SaldoActualCuentaClientes = (isNaN(parseFloat(SaldoActualCuentaClientes))) ? 0 : parseFloat(SaldoActualCuentaClientes);
                    SaldoDepositoCuentaClientes = (isNaN(parseFloat(SaldoDepositoCuentaClientes))) ? 0 : parseFloat(SaldoDepositoCuentaClientes);
                    // CALCULO NUEVO SALDO FINAL CLIENTES
                    CalcularNuevoSaldoClientes = SaldoActualCuentaClientes + SaldoDepositoCuentaClientes;
                    // IMPRESION DE RESULTADO
                    document.calculadora.resultado.value = CalcularNuevoSaldoClientes.toFixed(2);
                } catch (e) {}
            }
        </script>

    </body>

    </html>

<?php } ?>