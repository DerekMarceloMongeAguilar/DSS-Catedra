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
        <title>Aco Emprendedores | Inicio</title>
        <!-- Favicon icon -->

        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo $UrlGlobal; ?>vista/images/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/chartist/css/chartist.min.css">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?php echo $UrlGlobal; ?>vista/css/style.css" rel="stylesheet">
        <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

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
                                    <h4 style="font-weight: 600;">Inicio</h4>
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
                                        <a href="./email-inbox.html" class="dropdown-item ai-icon">
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
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="font-size: .9rem;" class="card-title">
                                            <?php if ($hora->format('G') >= 7 && $hora->format('G') < 16) {
                                                echo '<img style="width: 30px;" class="img-fluid" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/sun.gif">';
                                            } else  if ($hora->format('G') >= 16 && $hora->format('G') < 18) {
                                                echo '<img style="width: 30px;" class="img-fluid" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/sunrise.gif">';
                                            } else  if ($hora->format('G') >= 18 && $hora->format('G') <= 23) {
                                                echo '<img style="width: 30px;" class="img-fluid" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/night.gif">';
                                            } else  if ($hora->format('G') >= 0 && $hora->format('G') < 6) {
                                                echo '<img style="width: 30px;" class="img-fluid" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/night.gif">';
                                            } else  if ($hora->format('G') >= 5 && $hora->format('G') < 7) {
                                                echo '<img style="width: 30px;" class="img-fluid" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/sunrise.gif">';
                                            }    ?>
                                            <?php if ($hora->format('G') >= 0 && $hora->format('G') <= 4) {
                                                echo "Buenas Noches";
                                            } else if ($hora->format('G') >= 5 && $hora->format('G') < 12) {
                                                echo "Buenas D&iacute;as";
                                            } else if ($hora->format('G') >= 12 && $hora->format('G') < 18) {
                                                echo "Buenas Tardes";
                                            } else if ($hora->format('G') >= 18 && $hora->format('G') <= 23) {
                                                echo "Buenas Noches";
                                            } ?>, <strong><?php $Nombre = $_SESSION['nombre_usuario'];
                                                            $PrimerNombre = explode(' ', $Nombre, 2);
                                                            print_r($PrimerNombre[0]); ?></strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; flex-wrap: wrap;" class="col-xl-12 col-xxl-12 col-lg-12">
                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Transacciones</h4>
                                        <h3><?php if (empty($Gestiones->getTotalTransaccionesProcesadas_AtencionClientes())) {
                                                echo "0";
                                            } else {
                                                echo $Gestiones->getTotalTransaccionesProcesadas_AtencionClientes();
                                            } ?></h3>
                                        <div class="progress mb-2">
                                            <div class="progress-bar progress-animated bg-primary" style="width: 100%"></div>
                                        </div>
                                        <small>Total de Transacciones Procesadas</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Solicitudes Clientes</h4>
                                        <h3><?php if (empty($Gestiones->getTotalSolicitudesCreditosProcesadas_AtencionClientes())) {
                                                echo "0";
                                            } else {
                                                echo $Gestiones->getTotalSolicitudesCreditosProcesadas_AtencionClientes();
                                            } ?></h3>
                                        <div class="progress mb-2">
                                            <div class="progress-bar progress-animated bg-warning" style="width: 100%"></div>
                                        </div>
                                        <small>Solicitudes de Cr&eacute;ditos Clientes</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Total Ingresos +</h4>
                                        <h3>$<?php echo number_format($Gestiones->getTotalIngresosTransaccionesCreditos_AtencionClientes(), 2); ?></h3>
                                        <div class="progress mb-2">
                                            <div class="progress-bar progress-animated bg-success" style="width: 100%"></div>
                                        </div>
                                        <small>Ingresos de Transacciones</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h4 class="fs-20 text-black">&Uacute;ltimas Transacciones Procesadas</h4>
                                    <p class="mb-0 fs-13">Detalle de las &uacute;ltimas 50 transacciones procesadas <strong>(cr&eacute;ditos)</strong></p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive card-table">
                                        <table class="table bg-warning-hover text-center">
                                            <?php
                                            $ContadorTransacciones = 0;
                                            $ComprobarConsultaTransacciones = 0;
                                            while ($filas = mysqli_fetch_array($consulta2)) {
                                                if ($ComprobarConsultaTransacciones == 0)
                                                    $ComprobarConsultaTransacciones = 1;
                                                $ContadorTransacciones++;
                                                echo '<tr>
                                                <td style="font-size: .85rem">';
                                                echo '[' . $ContadorTransacciones;
                                                echo ']</td>
                                                    <td style="font-size: .85rem">';
                                                echo $filas['referencia'];
                                                echo '</td>
                                                    <td style="font-size: .85rem" class="text-left">';
                                                echo '<span class="mr-1">
                                                    <img style="width: 100%; max-width: 28px;" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/shopping-basket.gif">
                                                </span>
                                                Pago Cuota Mensual [';
                                                echo $filas['nombres'];
                                                echo ' ';
                                                echo $filas['apellidos'];
                                                echo ']<br>Bol.->';
                                                echo $filas['idcuotas'];
                                                echo ' - Referencia: ';
                                                echo $filas['referencia'];
                                                echo '';
                                                echo '</td>
                                                    <td style="font-size: .85rem" class="text-left">$';
                                                echo number_format($filas['monto'], 2);
                                                echo '</td>
                                                    <td style="font-size: .85rem" class="text-left">';
                                                $FechaTransaccion = date_create($filas['fecha']);
                                                echo date_format($FechaTransaccion, "d-m-Y");
                                                echo '</td>
                                                <td style="font-size: .85rem" class="text-left">';
                                                $FechaTransaccion = date_create($filas['fecha']);
                                                echo date_format($FechaTransaccion, "H:i:s");
                                                echo '</td>
                                                </tr>';
                                            }
                                            // SI  EXISTEN REGISTROS, MOSTRAR THEAD DE TABLA PRINCIPAL
                                            if ($ComprobarConsultaTransacciones == 1) {
                                                echo ' <thead style="background: #000; color: #fff;">
                                            <tr>
                                                <th class="text-left">[No]</th>
                                                <th class="text-left"><i class="fa fa-database"></i> Referencia</th>
                                                <th class="text-center"><i class="fa fa-info-circle"></i> Descripci&oacute;n Transacciones</th>
                                                <th><i class="fa fa-money"></i> Monto</th>
                                                <th class="text-right"><i class="fa fa-calendar"></i> Fecha</th>
                                                <th class="text-right"><i class="fa fa-clock-o"></i> Hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            }
                                            // SI NO EXISTEN REGISTROS, NO HAY CONSULTA QUE MOSTRAR
                                            if ($ComprobarConsultaTransacciones == 0) {
                                                echo '
												<div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
												<div class="card">
													<div class="card-body text-center ai-icon  text-primary">
														<img style="width: 80px" class="img-fluid" src="';
                                                echo $UrlGlobal;
                                                echo 'vista/images/coffee-cup.gif">
														<h4 class="my-2">No tienes ninguna transacci&oacute;n procesada hasta ahora...</h4>
													</div>
												</div>
											</div>
												';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                                if ($ComprobarConsultaTransacciones == 1) {
                                    echo '
                                    <div class="card-footer border-0 pt-0 text-center">
                                    <a href="javascript:void(0);" class="btn-link"><i class="fa fa-caret-right ml-2 scale-2"></i> Detalle Simple de Transacciones Procesadas</a>
                                </div>
                                    ';
                                }
                                ?>
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
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/custom.min.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/deznav-init.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/owl-carousel/owl.carousel.js"></script>



        <!-- Chart piety plugin files -->
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/peity/jquery.peity.min.js"></script>


        <!-- Dashboard 1 -->
        <script src="<?php echo $UrlGlobal; ?>vista/js/dashboard/dashboard-1.js"></script>
        <!-- Time ago -->
        <script src="<?php echo $UrlGlobal; ?>vista/js/jquery.timeago.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/control_tiempo.js"></script>

    </body>

    </html>
<?php } ?>