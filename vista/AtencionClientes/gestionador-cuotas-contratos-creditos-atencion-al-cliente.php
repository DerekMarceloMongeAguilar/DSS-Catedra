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
    // AL FINALIZAR PROCESO DE SOLICITUD CREDITICIA, LOS PROCESOS CREDITICIOS DE NUEVOS CLIENTES NO TENDRAN ACCESO A ESTA SECCION
    if ($Gestiones->getComprobacion_ProcesoFinalizadoClientes() == "no") {
?>

        <!DOCTYPE html>
        <html lang="ES-SV">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>Aco Emprendedores | Gestionador de Cuotas y Contratos Nuevos Clientes</title>
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
            <style>
                table.dataTable thead {
                    background-color: #a29bfe
                }
            </style>
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
                                        Contratos y Cuotas Mensuales
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
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Inicio</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Cr&eacute;ditos</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Gestionar Cuotas y Contratos</a></li>

                            </ol>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="email-left-box generic-width px-0 mb-5">
                                            <div class="p-0">
                                                <a href="" class="btn btn-primary btn-block"><?php echo $Gestiones->getNombreProductos(); ?></a>
                                                <br>
                                            </div>
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h6 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h6>
                                                <p style="font-size: .8rem;">Generar Contrato y Cuotas Mensuales</p>
                                            </div>
                                        </div>
                                        <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="right-box-padding">
                                                        <div class="toolbar mb-4" role="toolbar">
                                                            <div class="btn-group mb-1">
                                                                <button type="button" class="btn btn-success light px-3"><i class="fa fa-money"></i> Est&aacute; solicitud de cr&eacute;dito ha sido aprobada en las &aacute;reas correspondientes </button>
                                                            </div>
                                                        </div>
                                                        <div class="read-content">
                                                            <div class="media pt-3">
                                                                <img class="mr-2 rounded" width="50" alt="image" src="<?php echo $UrlGlobal; ?>vista/images/logo-negro.png">
                                                                <div class="media-body mr-2">
                                                                    <h5 class="text-primary mb-0 mt-1">ACO EMPRENDEDORES S.V</h5>
                                                                    <p class="mb-0">Entrega de Contrato Colectivo - <?php echo $Gestiones->getNombreProductos(); ?></p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="media mb-2 mt-3">
                                                                <div class="media-body"><span class="pull-right" id="HoraActual"></span>
                                                                    <h5 class="my-1 text-primary">Resumen de Contrato Colectivo</h5>
                                                                    <p class="read-content-email">
                                                                        ¿Problemas?: departamentojuridico@acoemprendedores.com</p>
                                                                </div>
                                                            </div>
                                                            <div class="read-content-body">
                                                                <h5 class="mb-4">Por favor dar lectura al resumen de contrato antes de iniciar nuevas acciones.</h5>
                                                                <p class="mb-2">Estimado(a) cliente <strong><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?>,</strong> usted inici&oacute; una nueva solicitud de cr&eacute;dito con nuestra empresa el d&iacute;a <?php $Fecha = $Gestiones->getFechaIngresoSolicitudCreditos();
                                                                                                                                                                                                                                                                                                                    $FechaCompleta = strtotime($Fecha);
                                                                                                                                                                                                                                                                                                                    $ObtenerAnio = date("Y", $FechaCompleta);
                                                                                                                                                                                                                                                                                                                    $ObtenerMes = date("m", $FechaCompleta);
                                                                                                                                                                                                                                                                                                                    $ObtenerDia = date("d", $FechaCompleta);
                                                                                                                                                                                                                                                                                                                    echo $ObtenerDia;
                                                                                                                                                                                                                                                                                                                    echo " de ";
                                                                                                                                                                                                                                                                                                                    // VALIDACIONES SEGUN MES OBTENIDO
                                                                                                                                                                                                                                                                                                                    if ($ObtenerMes == 1) {
                                                                                                                                                                                                                                                                                                                        echo "Enero";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 2) {
                                                                                                                                                                                                                                                                                                                        echo "Febrero";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 3) {
                                                                                                                                                                                                                                                                                                                        echo "Marzo";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 4) {
                                                                                                                                                                                                                                                                                                                        echo "Abril";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 5) {
                                                                                                                                                                                                                                                                                                                        echo "Mayo";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 6) {
                                                                                                                                                                                                                                                                                                                        echo "Junio";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 7) {
                                                                                                                                                                                                                                                                                                                        echo "Julio";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 8) {
                                                                                                                                                                                                                                                                                                                        echo "Agosto";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 9) {
                                                                                                                                                                                                                                                                                                                        echo "Septiembre";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 10) {
                                                                                                                                                                                                                                                                                                                        echo "Octubre";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 11) {
                                                                                                                                                                                                                                                                                                                        echo "Noviembre";
                                                                                                                                                                                                                                                                                                                    } else if ($ObtenerMes == 12) {
                                                                                                                                                                                                                                                                                                                        echo "Diciembre";
                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                    echo ' del ' . $ObtenerAnio; ?>. En el cual se le di&oacute; estudio y las respectivas &aacute;reas asignadas han emitido un dictamen favorable de <strong>aprobaci&oacute;n</strong> en su solicitud.</p>

                                                                <p class="mb-2">Raz&oacute;n por la cual su cr&eacute;dito queda estructurado de la siguiente manera:</p>

                                                                <p class="mb-2"><strong><?php echo $Gestiones->getNombreProductos(); ?></strong> financiamiento por un monto de <strong>$<?php echo number_format($Gestiones->getMontoFinanciamientoCreditos(), 2); ?> USD</strong> para un plazo de <strong><?php echo $Gestiones->getTiempoPlazoCreditos(); ?> <?php if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                                                                                                                                                                                                                                                                                                                                                                        echo 'a&ntilde;os';
                                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                                        echo 'meses';
                                                                                                                                                                                                                                                                                                                                                                    } ?></strong> a una tasa de inter&eacute;s mensual del <strong><?php echo $Gestiones->getTasaInteresCreditos(); ?> %</strong>.</p>

                                                                <p class="mb-2">Tomando en cuenta todo lo anterior, por pol&iacute;ticas de nuestra empresa el d&iacute;a asignado de su cuota mensual ser&aacute; el mismo en el cual usted inicio su tr&aacute;mite de cr&eacute;dito, el cual corresponde al <strong><?php echo $ObtenerDia; ?> de cada mes por los pr&oacute;ximos <?php echo $Gestiones->getTiempoPlazoCreditos(); ?> <?php if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                echo 'a&ntilde;os';
                                                                                                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                echo 'meses';
                                                                                                                                                                                                                                                                                                                                                                                                                                            } ?> o cuando usted decida concluir con su responsabilidad hacia nuestra empresa. <span style="color: #f00;"> Iniciando su responsabilidad de pago el pr&oacute;ximo mes.</span></strong></p>

                                                                <p class="mb-2">Respecto a los fines de semana, el tratamiento de esos d&iacute;as es con los s&aacute;bados se le sumar&aacute;n dos d&iacute;as posterior a su fecha de pago, de igual forma con los domingos pero con la diferencia que le ser&aacute; sumado un d&iacute;a &uacute;nicamente.</p>

                                                                <h5 class="pt-3">Lorem Ipsum Dolor</h5>
                                                                <p>ACO EMPRENDEDORES H.A S.A de C.V</p>
                                                                <hr>
                                                            </div>
                                                            <div class="read-content-attachment">
                                                                <h6><i class="fa fa-folder-open mb-2"></i> Primer Paso
                                                                    <span></span>
                                                                </h6>
                                                                <div class="row attachment">
                                                                    <div class="col-auto">
                                                                        <p>* Imprimir estado de cuenta pagar&eacute; cuotas mensualues y registrar cuotas mensuales asignadas en el sistema de pagos <strong>(<?php
                                                                                                                                                                                                                if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                                                                                                                                                                                                                    echo $Gestiones->getTiempoPlazoCreditos() * 12;
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo $Gestiones->getTiempoPlazoCreditos();
                                                                                                                                                                                                                } ?> meses)</strong></p>
                                                                        <a target="_blank" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=impresion-estado-cuenta-cuotas-nuevos-creditos-atencion-al-cliente&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn btn-outline-info"><i class="fa fa-hourglass-start"></i> Generar Estado de Cuenta</a><br>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if ($Gestiones->getNombreProductos() == "Préstamos de Vehículos") {
                                                            ?>
                                                                <hr>
                                                                <div class="read-content-attachment">
                                                                    <h6><i class="fa fa-folder-open mb-2"></i> Segundo Paso
                                                                        <span></span>
                                                                    </h6>
                                                                    <div class="row attachment">
                                                                        <div class="col-auto">
                                                                            <?php
                                                                            if (empty($Gestiones->getNumeroPlaca())) {
                                                                            ?>
                                                                                <p>* Por favor solicite los formularios al cliente, e ingrese la informaci&oacute;n solicitada en los siguientes campos:</p>
                                                                                <form id="registro-datos-vehiculos-contratos" class="validacion-registro-datos-vehiculos-contrato" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                                    <div class="row form-validation">
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <input type="hidden" name="idusuariocredito" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
                                                                                            <input type="hidden" name="idcredito" value="<?php echo $Gestiones->getIdCreditos(); ?>">
                                                                                            <input type="hidden" name="idproductocredito" value="<?php echo $Gestiones->getIdProductos(); ?>">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Placa <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-numeroplacavehiculo" name="val-numeroplacavehiculo" placeholder="Ingrese el n&uacute;mero de placa...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Clase <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-tipoclasevehiculo" name="val-tipoclasevehiculo" placeholder="Ingrese la clase del veh&iacute;culo...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">A&ntilde;o <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-aniovehiculo" name="val-aniovehiculo" placeholder="Ingrese el a&ntilde;o del veh&iacute;culo...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Capacidad <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-capacidadvehiculo" name="val-capacidadvehiculo" placeholder="Ingrese la capacidad del veh&iacute;culo...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Asientos <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-asientosvehiculo" name="val-asientosvehiculo" placeholder="Ingrese el n&uacute;mero de asientos...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Marca <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-marcavehiculo" name="val-marcavehiculo" placeholder="Ingrese la marca del veh&iacute;culo...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Modelo <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-modelovehiculo" name="val-modelovehiculo" placeholder="Ingrese el modelo del veh&iacute;culo...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">N&uacute;mero de Motor <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-numeromotorvehiculo" name="val-numeromotorvehiculo" placeholder="Ingrese el n&uacute;mero del motor...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">N&uacute;mero de Chasis Grabado <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-numerochasisvehiculo" name="val-numerochasisvehiculo" placeholder="Ingrese el n&uacute;mero de chasis grabado...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">N&uacute;mero de Chasis VIN <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-numerochasisvinvehiculo" name="val-numerochasisvinvehiculo" placeholder="Ingrese el Chasis VIN...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-12 mb-2">
                                                                                            <div class="form-group">
                                                                                                <label class="text-label">Color <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text" class="form-control" id="val-colorvehiculo" name="val-colorvehiculo" placeholder="Ingrese el color del veh&iacute;culo...">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- ENVIO DATOS -->
                                                                                    <button type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="ti-car"></i></span>Registrar Especificaciones de Veh&iacute;culos</button>
                                                                                </form>
                                                                            <?php } else { ?>
                                                                                <div class="alert alert-success solid alert-dismissible fade show">
                                                                                    <strong>Perfecto!</strong> Los respectivos datos solicitados del veh&iacute;culo han sido registrados con &eacute;xito. Ahora puedes generar el contrato al cliente final.
                                                                                </div>
                                                                            <?php } ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <hr>
                                                                <div class="read-content-attachment">
                                                                    <h6><i class="fa fa-folder-open mb-2"></i> Tercer Paso
                                                                        <span></span>
                                                                    </h6>
                                                                    <div class="row attachment">
                                                                        <div class="col-auto">
                                                                            <p>* Imprimir contrato final de solicitud crediticia aprobada del cliente. <strong>El cual deber&aacute; firmar el cliente y entregar una copia del mismo.<span style="color: #f00;"> Todos los clientes tendr&aacute;n disponible la copia del mismo en su portal.</span></strong></p>
                                                                            <a target="_blank" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=impresion-contrato-final-clientes&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn btn-outline-info"><i class="fa fa-gavel"></i> Generar Contrato de Solicitud Crediticia</a><br>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="read-content-attachment">
                                                                    <h6><i class="fa fa-folder-open mb-2"></i> Cuarto Paso
                                                                        <span></span>
                                                                    </h6>
                                                                    <div class="row attachment">
                                                                        <div class="col-auto">
                                                                            <p>* Subir copia de contrato final clientes, aseg&uacute;rese de elegir el archivo correcto</p>
                                                                            <div class="alert alert-warning solid alert-dismissible fade show">
                                                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                                                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                                                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                                                                </svg>
                                                                                <strong>¡Advertencia!</strong> ¿Est&aacute; seguro de registrar este documento? <strong>Es una acci&oacute;n sin retorno ya que todo el proceso de asignaci&oacute;n de nuevos cr&eacute;ditos finalizar&iacute;a autom&aacute;ticamente.</strong> Por favor verifique que todo ha sido completado con &eacute;xito antes de realizar esta acci&oacute;n.
                                                                            </div>
                                                                            <form id="registro-contrato-copia-clientes" class="validacion-registro-datos-vehiculos-contrato" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                                <div class="row form-validation">
                                                                                    <div class="col-lg-12 mb-2">
                                                                                        <div class="form-group">
                                                                                            <label class="text-label">Adjuntar Documento <span class="text-danger">*</span></label>
                                                                                            <div class="col-lg-12">
                                                                                                <input name="idcreditocontrato" type="hidden" value="<?php echo $Gestiones->getIdCreditos(); ?>">
                                                                                                <input type="file" <?php if (empty($Gestiones->getNumeroPlaca())) {
                                                                                                                        echo "disabled style='cursor: no-drop;''";
                                                                                                                    } ?> name="val-copiacontratousuarios" id="val-copiacontratousuarios" class="dropify" accept=".pdf" data-allowed-file-extensions="pdf" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p>* Le recordamos si ha omitido un paso anterior y usted hace clic en el bot&oacute;n. NO podr&aacute; revertir esta acci&oacute;n, ya que el proceso finaliza autom&aacute;ticamente.</p>
                                                                                    <!-- ENVIO DATOS -->
                                                                                    <button <?php if (empty($Gestiones->getNumeroPlaca())) {
                                                                                                echo "disabled style='cursor: no-drop;''";
                                                                                            } ?> type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-file-pdf-o"></i></span>Registrar Contrato Final Clientes</button>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            <?php } else { ?>
                                                                <hr>
                                                                <div class="read-content-attachment">
                                                                    <h6><i class="fa fa-folder-open mb-2"></i> Segundo Paso
                                                                        <span></span>
                                                                    </h6>
                                                                    <div class="row attachment">
                                                                        <div class="col-auto">
                                                                            <p>* Imprimir contrato final de solicitud crediticia aprobada del cliente. <strong>El cual deber&aacute; firmar el cliente y entregar una copia del mismo.<span style="color: #f00;"> Todos los clientes tendr&aacute;n disponible la copia del mismo en su portal.</span></strong></p>
                                                                            <a target="_blank" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=impresion-contrato-final-clientes&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn btn-outline-info"><i class="fa fa-gavel"></i> Generar Contrato de Solicitud Crediticia</a><br>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="read-content-attachment">
                                                                    <h6><i class="fa fa-folder-open mb-2"></i> Tercer Paso
                                                                        <span></span>
                                                                    </h6>
                                                                    <div class="row attachment">
                                                                        <div class="col-auto">
                                                                            <p>* Subir copia de contrato final clientes, aseg&uacute;rese de elegir el archivo correcto</p>
                                                                            <div class="alert alert-warning solid alert-dismissible fade show">
                                                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                                                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                                                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                                                                </svg>
                                                                                <strong>¡Advertencia!</strong> ¿Est&aacute; seguro de registrar este documento? <strong>Es una acci&oacute;n sin retorno ya que todo el proceso de asignaci&oacute;n de nuevos cr&eacute;ditos finalizar&iacute;a autom&aacute;ticamente.</strong> Por favor verifique que todo ha sido completado con &eacute;xito antes de realizar esta acci&oacute;n.
                                                                            </div>
                                                                            <form id="registro-contrato-copia-clientes" class="validacion-registro-datos-vehiculos-contrato" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                                <div class="row form-validation">
                                                                                    <div class="col-lg-12 mb-2">
                                                                                        <div class="form-group">
                                                                                            <label class="text-label">Adjuntar Documento <span class="text-danger">*</span></label>
                                                                                            <div class="col-lg-12">
                                                                                                <input name="idcreditocontrato" type="hidden" value="<?php echo $Gestiones->getIdCreditos(); ?>">
                                                                                                <input type="file" name="val-copiacontratousuarios" id="val-copiacontratousuarios" class="dropify" accept=".pdf" data-allowed-file-extensions="pdf" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p>* Le recordamos si ha omitido un paso anterior y usted hace clic en el bot&oacute;n. NO podr&aacute; revertir esta acci&oacute;n, ya que el proceso finaliza autom&aacute;ticamente.</p>
                                                                                    <!-- ENVIO DATOS -->
                                                                                    <button type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-file-pdf-o"></i></span>Registrar Contrato Final Clientes</button>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            <?php } ?>

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
                <!-- Datatable -->
                <script src="<?php echo $UrlGlobal; ?>vista/vendor/datatables/js/jquery.dataTables.min.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/datatables.init.js"></script>
                <!-- Toastr -->
                <script src="<?php echo $UrlGlobal; ?>vista/vendor/toastr/js/toastr.min.js"></script>
                <!-- All init script -->
                <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/toastr-init.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-registro-datos-vehiculos-contratos.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-ingreso-copias-contratos-clientes.js"></script>
                <!-- Mask -->
                <script src="<?php echo $UrlGlobal; ?>vista/js/mask.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/js/mascara-datos-vehiculos-contratos-clientes.js"></script>
                <!-- Dropzone JavaScript -->
                <script src="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.js"></script>
                <!-- Dropify JavaScript -->
                <script src="<?php echo $UrlGlobal; ?>vista/dropify/dist/js/dropify.min.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/js/dropzone-configuration.js"></script>
                <!-- Time ago -->
                <script src="<?php echo $UrlGlobal; ?>vista/js/jquery.timeago.js"></script>
                <script src="<?php echo $UrlGlobal; ?>vista/js/control_tiempo.js"></script>
                <script>
                    showTime();

                    function showTime() {
                        FechaActual = new Date();
                        Hora = FechaActual.getHours() % 12 || 12;
                        Minuto = FechaActual.getMinutes();
                        Segundo = FechaActual.getSeconds();
                        if (Hora < 10) Hora = 0 + Hora;
                        if (Hora < 10) Hora = "0" + Hora;
                        if (Minuto < 10) Minuto = "0" + Minuto;
                        if (Segundo < 10) Segundo = "0" + Segundo;
                        $("#HoraActual").text(Hora + ":" + Minuto + ":" + Segundo);
                        setTimeout("showTime()", 1000);
                    }
                </script>







        </body>

        </html>
<?php } else {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
    }
}  ?>