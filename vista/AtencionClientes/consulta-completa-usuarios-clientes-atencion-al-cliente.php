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
        <title>Aco Emprendedores | Consulta Datos [<?php echo $Gestiones->getCodigoUsuarios(); ?>]</title>
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
        <link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/dist/mc-calendar.min.css" />

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
                                    <h4 style="font-weight: 600;">Detalle Usuarios</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Usuarios</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Consultar Detalle Usuarios</a></li>
                        </ol>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile card card-body px-3 pt-3 pb-0">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo"></div>
                                    </div>
                                    <div class="profile-info">
                                        <div class="profile-photo">
                                            <img style="width: 100%; max-width: 220px; max-height: 130px" src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <div class="profile-details">
                                            <div class="profile-name px-3 pt-2">
                                                <h4 class="text-primary mb-0"><?php echo $Gestiones->getNombresUsuarios();
                                                                                echo " ";
                                                                                echo $Gestiones->getApellidosUsuarios() ?></h4>
                                                <p><span><i class="mdi mdi-coffee-to-go"></i></span> Rol: Administrador </p>
                                            </div>
                                            <div class="profile-email px-2 pt-2">
                                                <h4 class="text-muted mb-0"><?php echo $Gestiones->getCodigoUsuarios() ?></h4>
                                                <p><span><i class="mdi mdi-lan-pending"></i></span> Usuario</p>
                                            </div>
                                            <div class="profile-email px-2 pt-2">
                                                <h4 class="text-muted mb-0"><?php if ($Gestiones->getEstadoUsuarios() == "activo") {
                                                                                echo '<span style="color: #00b894;">usuario ';
                                                                                echo $Gestiones->getEstadoUsuarios();
                                                                                echo '</span>';
                                                                            } else if ($Gestiones->getEstadoUsuarios() == "bloqueado") {
                                                                                echo '<span style="color: #d63031;">usuario ';
                                                                                echo $Gestiones->getEstadoUsuarios();
                                                                                echo '</span>';
                                                                            } else if ($Gestiones->getEstadoUsuarios() == "inactivo") {
                                                                                echo '<span style="color: #fdcb6e;">usuario ';
                                                                                echo $Gestiones->getEstadoUsuarios();
                                                                                echo '</span>';
                                                                            }  ?></h4>
                                                <p><span><i class="mdi mdi-file-account"></i></span> Estado</p>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> Preguntas Frecuentes</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#detalles_usuarios" data-toggle="tab" class="nav-link active show">Detalles Completo Usuario</a>
                                            </li>
                                            <li class="nav-item"><a href="#documentos_usuarios" data-toggle="tab" class="nav-link">Documentos Personales</a>
                                            </li>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="detalles_usuarios" class="tab-pane fade active show"><br>
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4">Informaci&oacute;n Personal</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Nombres <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getNombresUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Apellidos <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo  $Gestiones->getApellidosUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Correo Electr&oacute;nico <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getCorreoUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Dui <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getDuiUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Nit <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getNitUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Tel&eacute;fono Principal <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getTelefonoUsuarios() == "") {
                                                                                        echo "No Disponible";
                                                                                    } else {
                                                                                        echo $Gestiones->getTelefonoUsuarios();
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Celular <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getCelularUsuarios() == "") {
                                                                                        echo "No Disponible";
                                                                                    } else {
                                                                                        echo $Gestiones->getCelularUsuarios();
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Estado Civil <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getEstadoCivilUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">G&eacute;nero <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getGeneroUsuarios() == "m") {
                                                                                        echo "Hombre";
                                                                                    } else if ($Gestiones->getGeneroUsuarios() == "f") {
                                                                                        echo "Mujer";
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Direcci&oacute;n Completa <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getDireccionUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Empresa d&oacute;nde labora <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getEmpresaUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Cargo <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getCargoEmpresaUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Direcci&oacute;n Trabajo <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getDireccionTrabajoUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Tel&eacute;fono Trabajo <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getTelefonoTrabajoUsuarios() == "") {
                                                                                        echo "No disponible";
                                                                                    } else {
                                                                                        echo $Gestiones->getTelefonoTrabajoUsuarios();
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Fecha Nacimiento <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php $Fecha = $Gestiones->getFechaNacimientoUsuarios();
                                                                                    $FechaCompleta = strtotime($Fecha);
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
                                                                                    $ObtenerAnio = date("Y", $FechaCompleta);
                                                                                    echo " ";
                                                                                    echo $ObtenerAnio;
                                                                                    ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Edad <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php // OBTENER FECHA COMPLETA REGISTRADA
                                                                                    $Fecha = $Gestiones->getFechaNacimientoUsuarios();
                                                                                    // CALCULAR EDAD ANTES DE CUMPLEAÑOS
                                                                                    $FechaCumpleanos = new DateTime($Fecha);
                                                                                    $Ahora = new DateTime();
                                                                                    // COMPRUEBA SEGUN AÑO -> MES -> DIA
                                                                                    $CalcularEdad = $Ahora->diff($FechaCumpleanos);
                                                                                    echo $CalcularEdad->y;
                                                                                    echo " A&ntilde;os";
                                                                                    ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="documentos_usuarios" class="tab-pane fade"><br>
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <div class="alert alert-light alert-dismissible alert-alt solid fade show">
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                                                            <strong>Tomar Nota: </strong> Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
                                                                                                        $PrimerNombre = explode(' ', $Nombre, 2);
                                                                                                        print_r($PrimerNombre[0]); ?>, es su responsabilidad verificar que todos los datos deben coincidir antes de realizar cualquier transacci&oacute;n con dicho usuario. <strong>Si usted encuentra irregularidades, o simplemente el Dui se encuentra vencido. Expl&iacute;quele al usuario los motivos del por qu&eacute; su transacci&oacute;n no puede ser completada.</strong>
                                                        </div>
                                                        <h4 class="text-primary"><i class="ti-bookmark"></i> Documento &Uacute;nico de Identidad [Frente] <i class="ti-layout-media-left"></i> </h4><br>
                                                        <img style="max-width: 500px; margin: 0 auto; display: block;" class="img-fluid" src="<?php echo $UrlGlobal;
                                                                                                                                                echo "vista/images/fotoduifrontal/";
                                                                                                                                                echo $Gestiones->getFotoDuiFrontalUsuarios(); ?>"><br><br>
                                                        <h4 class="text-primary"><i class="ti-bookmark"></i> Documento &Uacute;nico de Identidad [Reverso] <i class="ti-layout-media-right"></i> </h4><br>
                                                        <img style="max-width: 500px; margin: 0 auto; display: block;" class="img-fluid" src="<?php echo $UrlGlobal;
                                                                                                                                                echo "vista/images/fotoduireverso/";
                                                                                                                                                echo $Gestiones->getFotoDuiReversoUsuarios(); ?>"><br><br>
                                                        <h4 class="text-primary"><i class="ti-bookmark"></i> N&uacute;mero de Identificaci&oacute;n Tributaria</h4><br>
                                                        <img style="max-width: 500px; margin: 0 auto; display: block;" class="img-fluid" src="<?php echo $UrlGlobal;
                                                                                                                                                echo "vista/images/fotonit/";
                                                                                                                                                echo $Gestiones->getFotoNitUsuarios(); ?>"><br><br>
                                                        <h4 class="text-primary"><i class="ti-bookmark"></i> Firma de Usuario</h4><br>
                                                        <img style="max-width: 500px; margin: 0 auto; display: block;" class="img-fluid" src="<?php echo $UrlGlobal;
                                                                                                                                                echo "vista/images/fotofirmas/";
                                                                                                                                                echo $Gestiones->getFotoFirmaUsuarios(); ?>"><br><br>
                                                        <h4 class="text-primary"><i class="ti-bookmark"></i> Descarga Multimedia</h4><br>
                                                        <!-- DESCARGA DUI FRENTE DOCUMENTO -->
                                                        <a href="<?php echo $UrlGlobal;
                                                                    echo "vista/images/fotoduifrontal/";
                                                                    echo $Gestiones->getFotoDuiFrontalUsuarios(); ?>" download="DetalleUsuarioMultimediaDuiFrente_<?php echo $Gestiones->getFotoDuiFrontalUsuarios(); ?>">
                                                            <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i></span>Descargar Dui [Frente]</button>
                                                            <!-- DESCARGA DUI REVERSO DOCUMENTO -->
                                                            <a href="<?php echo $UrlGlobal;
                                                                        echo "vista/images/fotoduireverso/";
                                                                        echo $Gestiones->getFotoDuiReversoUsuarios(); ?>" download="DetalleUsuarioMultimediaDuiReverso_<?php echo $Gestiones->getFotoDuiReversoUsuarios(); ?>">
                                                                <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i></span>Descargar Dui [Reverso]</button>
                                                                <!-- DESCARGA NIT -->
                                                                <a href="<?php echo $UrlGlobal;
                                                                            echo "vista/images/fotonit/";
                                                                            echo $Gestiones->getFotoNitUsuarios(); ?>" download="DetalleUsuarioMultimediaNit_<?php echo $Gestiones->getFotoNitUsuarios(); ?>">
                                                                    <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i></span>Descargar Nit</button>
                                                                    <!-- DESCARGA FIRMA -->
                                                                    <a href="<?php echo $UrlGlobal;
                                                                                echo "vista/images/fotofirmas/";
                                                                                echo $Gestiones->getFotoFirmaUsuarios(); ?>" download="DetalleUsuarioMultimediaFirma_<?php echo $Gestiones->getFotoFirmaUsuarios(); ?>">
                                                                        <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i></span>Descargar Firma</button>
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

        <!--removeIf(production)-->

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
        <!-- Time ago -->
        <script src="<?php echo $UrlGlobal; ?>vista/js/jquery.timeago.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/control_tiempo.js"></script>
    </body>

    </html>
<?php } ?>