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
// NO PERMITIR INGRESO SI PARAMETRO NO EXISTE
if (empty($_GET['idusuario'])) {
    // MOSTRAR PAGINA DE ERROR 404 SI NO EXISTE INFORMACION QUE MOSTRAR
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// SI LOS USUARIOS INICIAN POR PRIMERA VEZ, MOSTRAR PAGINA DONDE DEBERAN REALIZAR EL CAMBIO OBLIGATORIO DE SU CONTRASEÑA GENERADA AUTOMATICAMENTE
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestiones-nuevos-usuarios-registrados');
    // CASO CONTRARIO, MOSTRAR PORTAL DE USUARIOS -> SEGUN ROL DE USUARIO ASIGNADO
} else {
    // IMPORTANDO MODELO DE CONTEO CUOTAS CANCELADAS CLIENTES
    require('../modelo/mConteoCuotasClientesCanceladas.php');
    // VALIDACION SI EXISTE UN MONTO DE FINANCIAMIENTO A MOSTRAR -> SI NO EXISTE INDICA QUE NO EXISTE CLIENTE ASIGNADO O SU CREDITO HA CAMBIADO DE ESTADO
    if ($Gestiones->getMontoFinanciamientoCreditos() > 0) {
        if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
            $CalculoCuotaMensualCapital = $Gestiones->getMontoFinanciamientoCreditos() / ($Gestiones->getTiempoPlazoCreditos() * 12);
        } else {
            $CalculoCuotaMensualCapital = $Gestiones->getMontoFinanciamientoCreditos() / ($Gestiones->getTiempoPlazoCreditos());
        }
    } else {
        // MOSTRAR PAGINA DE ERROR 404 SI NO EXISTE INFORMACION QUE MOSTRAR
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
    } // CIERRE if ($Gestiones->getMontoFinanciamientoCreditos() > 0) 
?>

    <!DOCTYPE html>
    <html lang="ES-SV">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Aco Emprendedores | Estado de Cuenta <?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?> </title>
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
                                    <h4 style="font-weight: 600;">Consulta Solicitud Aprobada Clientes</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Cr&eacute;ditos</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cr&eacute;ditos Aprobados</a></li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $Gestiones->getNombreProductos(); ?> [Activo]</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="profile-photo">
                                            <img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?> </h3>
                                        <p class="text-muted">Cliente</p>
                                        <!-- DATOS DE PRODUCTOS Y CREDITOS -->
                                        <div style="display: flex; flex-wrap: wrap;" class="col-xl-12 col-lg-12">
                                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                                <div class="widget-stat card">
                                                    <div class="card-body  p-4">
                                                        <div class="media ai-icon">
                                                            <span class="mr-3 bgl-success text-success">
                                                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body">
                                                                <p class="mb-1">Financiamiento</p>
                                                                <h4 <?php if ($Gestiones->getMontoFinanciamientoCreditos() >= 100000) {
                                                                        echo 'style="font-size: 1.4rem"';
                                                                    } ?> class="mb-0"><?php echo number_format($Gestiones->getMontoFinanciamientoCreditos(), 2); ?></h4>
                                                                <span class="badge badge-success">
                                                                    <?php
                                                                    // CALCULO DE PORCENTAJE AVANCE CREDITICIO
                                                                    if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                                                                        $TotalCuotas = $Gestiones->getTiempoPlazoCreditos() * 12;
                                                                    } else {
                                                                        $TotalCuotas = $Gestiones->getTiempoPlazoCreditos();
                                                                    }
                                                                    $CalculoPorcentajeAvance = (NumeroCuotasCanceladadClientes($conectarsistema2, $IdUsuarios) * 100) / $TotalCuotas;
                                                                    if ($CalculoPorcentajeAvance == 0) {
                                                                        echo '0.0%';
                                                                    } else {
                                                                        echo number_format($CalculoPorcentajeAvance, 2);
                                                                        echo '%';
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                                <div class="widget-stat card">
                                                    <div class="card-body  p-4">
                                                        <div class="media ai-icon">
                                                            <span class="mr-3 bgl-danger text-danger">
                                                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body">
                                                                <p class="mb-1">Saldo Actual</p>
                                                                <h4 <?php if ($Gestiones->getSaldoActualCreditos() >= 100000) {
                                                                        echo 'style="font-size: 1.4rem"';
                                                                    } ?> class="mb-0"><?php echo number_format($Gestiones->getSaldoActualCreditos(), 2); ?></h4>
                                                                <span class="badge badge-danger">Activo</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                                <div class="widget-stat card">
                                                    <div class="card-body  p-4">
                                                        <div class="media ai-icon">
                                                            <span class="mr-3 bgl-info text-info">
                                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body">
                                                                <p class="mb-1">Plazo</p>
                                                                <h4 class="mb-0"><?php echo $Gestiones->getTiempoPlazoCreditos(); ?></h4>
                                                                <span class="badge badge-info"><?php if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                                                                                                    echo "A&ntilde;os";
                                                                                                } else {
                                                                                                    echo "Meses";
                                                                                                } ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                                <div class="widget-stat card">
                                                    <div class="card-body  p-4">
                                                        <div class="media ai-icon">
                                                            <span class="mr-3 bgl-dark text-dark">
                                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body">
                                                                <p class="mb-1">Inter&eacute;s</p>
                                                                <h4 class="mb-0"><?php echo number_format($Gestiones->getTasaInteresCreditos(), 2); ?>%</h4>
                                                                <span class="badge badge-dark">Mensual</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-sm-6">
                                                <div class="widget-stat card <?php if ($Gestiones->getEstadoCrediticioClientes() == "Excelente") {
                                                                                    echo 'bg-secondary';
                                                                                } else if ($Gestiones->getEstadoCrediticioClientes() == "Deficiente") {
                                                                                    echo 'bg-danger';
                                                                                } else if ($Gestiones->getEstadoCrediticioClientes() == "Regular") {
                                                                                    echo 'bg-warning';
                                                                                } else if ($Gestiones->getEstadoCrediticioClientes() == "Nuevo Cliente") {
                                                                                    echo 'bg-dark';
                                                                                } ?>">
                                                    <div class="card-body p-4">
                                                        <div class="media">
                                                            <span class="mr-3">
                                                                <i class="flaticon-381-heart"></i>
                                                            </span>
                                                            <div class="media-body text-white text-right">
                                                                <p class="mb-1">Estado Crediticio de: <strong><?php echo $Gestiones->getNombresUsuarios();
                                                                                                                echo ' ';
                                                                                                                echo $Gestiones->getApellidosUsuarios(); ?></strong></p>
                                                                <h3 class="text-white"><?php echo $Gestiones->getEstadoCrediticioClientes(); ?></h3>
                                                                <h6 style="font-size: .6rem;" class="text-white"><?php if ($Gestiones->getEstadoCrediticioClientes() == "Excelente") {
                                                                                                                        echo 'No presenta incumplimientos hasta este momento';
                                                                                                                    } else if ($Gestiones->getEstadoCrediticioClientes() == "Deficiente") {
                                                                                                                        echo 'Presenta m&uacute;ltiples retrasos en el cumplimiento de su solicitud crediticia';
                                                                                                                    } else if ($Gestiones->getEstadoCrediticioClientes() == "Regular") {
                                                                                                                        echo 'Cumple con su responsabilidad crediticia, pero ha presentado retrasos en el mismo';
                                                                                                                    } else if ($Gestiones->getEstadoCrediticioClientes() == "Nuevo Cliente") {
                                                                                                                        echo 'A&uacute;n no podemos procesar su estado crediticio. Cliente nuevo';
                                                                                                                    } ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-responsive-sm">
                                                <thead class="thead-info">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Estado</th>
                                                        <th>Vencimiento</th>
                                                        <th>Cuota</th>
                                                        <th>Capital</th>
                                                        <th>Saldo Final</th>
                                                        <th>¿Mora?</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                                                        // SI EL CREDITO ES HIPOTECARIO, SE REALIZA EL CALCULO AL NUMERO DE MESES EN TOTAL, YA QUE EL REGISTRO DE PREVIO FUE REALIZADO EN BASE A LOS AÑOS DE FINANCIAMIENTO
                                                        $CalculoDiasPrestamos = ($Gestiones->getTiempoPlazoCreditos() * 12) + 1;
                                                    } else {
                                                        $CalculoDiasPrestamos = $Gestiones->getTiempoPlazoCreditos() + 1;
                                                    }
                                                    // FECHA INICIO DE CREDITO -> SEGUN INGRESO DE SOLICITUD CREDITICIA
                                                    $FechaSolicitud = $Gestiones->getFechaIngresoSolicitudCreditos();
                                                    $IntervaloFecha = new DateInterval('P1D'); // INTERVALO 1 DIA A LA VEZ -> EN UN SOLO MES
                                                    $InicioCreditos = new DateTime($Gestiones->getFechaIngresoSolicitudCreditos()); // ASIGNAR INICIO DE CALCULO ESTADO DE CUENTE CLIENTES
                                                    $FinCreditos = new DateTime(date("Y-m-d", strtotime($FechaSolicitud . "+ $CalculoDiasPrestamos month"))); // CALCULO FINAL DE ESTADO DE CUENTA CLIENTES
                                                    $IntervaloFecha = new DateInterval('P1M'); // INTERVALO 1 VEZ AL MES
                                                    $CuotasMensualesGeneradas = new DatePeriod($InicioCreditos, $IntervaloFecha, $FinCreditos); // GENERAR EL CALCULO SEGUN EL PERIODO ASIGNADO AL CLIENTE
                                                    // EXTRAER FECHA COMPLETA COMO ENTERO PARA COMPROBACIONES
                                                    $ExtraerFecha = strtotime($FechaSolicitud);
                                                    $ObtenerMes = date("m", $ExtraerFecha); // OBTENER MES EN CUESTION DE SOLICITUD DE CREDITO
                                                    $ObtenerDia = date("d", $ExtraerFecha); // OBTENER DIA EN CUESTION DE SOLICITUD DE CREDITO
                                                    $ContadorCuotas = 0; // INICIALIZAR CONTADOR DE CUOTAS ASIGNADAS
                                                    $SaldoInicialCredito = $Gestiones->getMontoFinanciamientoCreditos(); // OBTENER EL MONTO DEL SALDO INICIAL DEL CREDITO SEGUN PRODUCTO ASOCIADO AL CLIENTE
                                                    foreach ($CuotasMensualesGeneradas as $DiaAsignado) {
                                                        while ($filas = mysqli_fetch_array($consulta1)) {
                                                            $ContadorCuotas++; // AUMENTO EN 1 SEGUN EL RANGO A CUMPLIR -> "N" CUOTAS
                                                            echo '
						<tr>
							<th>';
                                                            echo $ContadorCuotas;
                                                            echo '</th>
								<td>';
                                                            echo $Gestiones->getNombreProductos();
                                                            echo '</td>
								<td>';
                                                            if ($filas['estadocuota'] == "pendiente") {
                                                                echo '<span class="badge badge-danger">';
                                                                echo ucfirst($filas['estadocuota']);
                                                                echo '</span>';
                                                            } else if ($filas['estadocuota'] == "cancelado") {
                                                                echo '<span class="badge badge-success">';
                                                                echo ucfirst($filas['estadocuota']);
                                                                echo '</span>';
                                                            }
                                                            echo '
								</td>
							<td>';
                                                            $FechaVencimientoCuotas = date_create($filas['fechavencimiento']);
                                                            echo date_format($FechaVencimientoCuotas, "d-m-Y");
                                                            echo '
						</td>
							<td class="color-primary">$';
                                                            echo number_format($filas['montocancelar'], 2);
                                                            echo ' USD</td>
							<td class="color-primary">$';
                                                            echo number_format($CalculoCuotaMensualCapital, 2);
                                                            echo ' USD</td>
							<td class="color-primary">$';
                                                            $SaldoInicialCredito = $SaldoInicialCredito - $CalculoCuotaMensualCapital;
                                                            echo number_format($SaldoInicialCredito, 2);
                                                            echo ' USD</td>
							<td>';
                                                            if ($filas['incumplimiento_pago'] == "NO") {
                                                                echo '<span class="badge badge-success">';
                                                                echo $filas['incumplimiento_pago'];
                                                            } else if ($filas['incumplimiento_pago'] == "SI") {
                                                                echo '<span class="badge badge-danger">';
                                                                echo $filas['incumplimiento_pago'];
                                                            } else if ($filas['incumplimiento_pago'] == "PT") {
                                                                echo '<span class="badge badge-warning">';
                                                                echo $filas['incumplimiento_pago'];
                                                            }
                                                            echo '</span>';
                                                            echo '</td>
						</tr>';
                                                        } // CIERRE while($filas=mysqli_fetch_array($consulta1))
                                                    } // CIERRE foreach($CuotasMensualesGeneradas as $DiaAsignado) 
                                                    ?>
                                                </tbody>
                                            </table>
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
                    <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-enviar-solicitudes-creditos-clientes-historico.js"></script>
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