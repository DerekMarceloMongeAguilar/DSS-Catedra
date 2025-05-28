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
    // COMPROBACION DE SOLICITUDES DE CREDITOS CLIENTES -> VER ESTADO DE SOLICITUD CREDITICIA [CUANDO LAS CUOTAS MENSUALES AUN NO HAN SIDO GENERADAS EN EL SISTEMA -> ENTIENDASE QUE CREDITO AUN NO HA SIDO APROBADO]
    if ($_SESSION['habilitar_sistema'] == "si") {
?>

        <!DOCTYPE html>
        <html lang="ES-SV">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>Aco Emprendedores | Consultar Mi Cuenta de Ahorro</title>
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
                                        <h4 style="font-weight: 600;">Transacciones Cuentas Clientes</h4>
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
                                            <a href="<?php echo $UrlGlobal ?>controlador/cGestionesCashman.php?cashmanhagestion=perfilclientes" class="dropdown-item ai-icon">
                                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <span class="ml-2">Mi Perfil </span>
                                            </a>
                                            <a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=mensajeria-cashmanha-usuarios-clientes" class="dropdown-item ai-icon">
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
                // IMPORTAR MENU USUARIOS ROL CLIENTES
                require('../vista/MenuNavegacion/menu-clientes.php');
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
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Consultar Cuentas Ahorro</a></li>
                            </ol>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="text-center p-5 overlay-box">
                                        <img src="<?php echo $UrlGlobal; ?>vista/images/logo-negro.png" width="100" class="img-fluid rounded-circle" alt="">
                                        <h3 class="mt-3 mb-0 text-white">Cuentas de Ahorro Personales</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="bgl-primary rounded p-3">
                                                    <h4 class="mb-0 text-success"><?php echo ucfirst($Gestiones->getEstadoCuentaAhorroClientes()); ?></h4>
                                                    <small>Estado Cuenta</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bgl-primary rounded p-3">
                                                    <h4 class="mb-0">$ <?php echo number_format($Gestiones->getSaldoCuentaAhorroClientes(), 2); ?> USD</h4>
                                                    <small>Saldo Disponible</small>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="card text-white bg-primary">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Nombre del Cliente: </strong></span><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></li>
                                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>N&uacute;mero de Cuenta del Cliente: </strong></span><?php echo $Gestiones->getNumeroCuentaAhorroClientes(); ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-center">Listado Completo de Transacciones Procesadas</h5>
                                    <p style="width: 90%; margin: .95rem auto; display: block;">Estimado(a) cliente, en este momento esta consultando su estado de cuenta completo de su cuenta de ahorros n&uacute;mero: <?php echo $Gestiones->getNumeroCuentaAhorroClientes(); ?>. Si posee alguna inquietud, comun&iacute;quese a nuestra l&iacute;nea de atenci&oacute;n al cliente por tel&eacute;fono o visitando nuestra sucursal.</p>
                                    <div class="table-responsive card overflow-hidden text-center p-5">
                                        <table style="width: 100%;" id="example5" class="display min-w850">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No. Referencia</th>
                                                    <th>Monto</th>
                                                    <th>Fecha / Hora</th>
                                                    <th>Estado</th>
                                                    <th>Tipo Transacci&oacute;n</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($filas = mysqli_fetch_array($consulta1)) {
                                                    echo ' 
													<tr>
													<td><img class="rounded-circle" width="35" src="';
                                                    echo $UrlGlobal;
                                                    echo 'vista/images/folder.gif" alt=""></td>
													<td>';
                                                    echo $filas['referencia'];
                                                    echo '</td>
													<td>';
                                                    if (ucfirst($filas['estadotransaccion']) == "AnularDeposito") {
                                                        echo "-";
                                                    } else if (ucfirst($filas['estadotransaccion']) == "AnularRetiro") {
                                                        echo "+";
                                                    }
                                                    if ($filas['tipotransaccion'] == "EnvioTransferencia") {
                                                        echo "-";
                                                    } else if ($filas['tipotransaccion'] == "DepositoTransferencia") {
                                                        echo "+";
                                                    }
                                                    echo ' $';
                                                    echo number_format($filas['monto'], 2);
                                                    echo ' USD</td>
													<td>';
                                                    $FechaCancelacion = date_create($filas['fecha']);
                                                    echo date_format($FechaCancelacion, "d/m/Y H:i:s");
                                                    echo '</td>
                                                    <td><a href="javascript:void()" class="badge badge-rounded badge-';
                                                    if (ucfirst($filas['estadotransaccion']) == "AnularDeposito" || ucfirst($filas['estadotransaccion']) == "AnularRetiro") {
                                                        echo "dark";
                                                    } else {
                                                        echo "success";
                                                    }
                                                    echo '">';
                                                    if (ucfirst($filas['estadotransaccion']) == "AnularDeposito" || ucfirst($filas['estadotransaccion']) == "AnularRetiro") {
                                                        echo "Anulado";
                                                    } else {
                                                        echo ucfirst($filas['estadotransaccion']);
                                                    }
                                                    echo '</a></td>	
                                            <td><a href="javascript:void()" class="badge badge-rounded badge-';
                                                    if (ucfirst($filas['tipotransaccion']) == "Entrada") {
                                                        echo "success";
                                                    } else if (ucfirst($filas['tipotransaccion']) == "Salida") {
                                                        echo "danger";
                                                    } else if (ucfirst($filas['tipotransaccion']) == "EnvioTransferencia") {
                                                        echo "danger";
                                                    } else if (ucfirst($filas['tipotransaccion']) == "DepositoTransferencia") {
                                                        echo "success";
                                                    }
                                                    echo '">';
                                                    if (ucfirst($filas['tipotransaccion']) == "Entrada") {
                                                        echo "Dep&oacute;sito";
                                                    } else if (ucfirst($filas['tipotransaccion']) == "Salida") {
                                                        echo "Retiro";
                                                    } else if (ucfirst($filas['tipotransaccion']) == "EnvioTransferencia" || ucfirst($filas['tipotransaccion']) == "DepositoTransferencia") {
                                                        echo "Transferencias";
                                                    }
                                                    echo '</a></td>	
													<td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a target="_blank" class="dropdown-item" href="';
                                                    echo $UrlGlobal;
                                                    echo 'controlador/cGestionesCashman.php?cashmanhagestion=impresion-comprobantes-transacciones-cuentas-clientes&idtransaccionesclientes=';
                                                    echo $filas['idtransaccioncuentas'];
                                                    echo '&idusuarioscuentas=';
                                                    echo $filas['idusuarios'];
                                                    echo '"><i class="ti-eye"></i> Ver Comprobante de Pago</a>
														</div>
													</div>
												</td>									
												</tr>
													';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer mt-0">
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
                        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-ingreso-nuevos-usuarios-administradores.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-desactivar-productos-cashmanha.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-expirar-productos-cashmanha.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-activar-productos-cashmanha.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarUsuarioUnico.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarCorreoPerfilUsuarios.js"></script>
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
<?php } else {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=bienvenida-clientes');
    }
} ?>