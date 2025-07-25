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
        <title>Aco Emprendedores | Registro Nuevas Cuentas de Ahorro</title>
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
                                    <h4 style="font-weight: 600;">Registrar Cuentas de Ahorro</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Cuentas</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Registrar Nuevas Cuentas de Ahorro</a></li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div id="accordion-six" class="accordion accordion-with-icon accordion-danger-solid">
                                <div class="accordion__item">
                                    <div class="accordion__header collapsed" data-toggle="collapse" data-target="#with-icon_collapseOne">
                                        <span class="accordion__header--icon"></span>
                                        <span class="accordion__header--text">Por favor, antes de continuar</span>
                                        <span class="accordion__header--indicator indicator_bordered"></span>
                                    </div>
                                    <div id="with-icon_collapseOne" class="accordion__body collapse" data-parent="#accordion-six">
                                        <div class="accordion__body--text">
                                            <i class="ti-direction"></i> Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
                                                                                        $PrimerNombre = explode(' ', $Nombre, 2);
                                                                                        print_r($PrimerNombre[0]); ?>, el registro de nuevas cuentas de ahorro personales es abierto para todos los clientes que la deseen solicitar y aperturar. Clientes que posean un producto o nuevos clientes pueden solicitarla sin problemas. Los requisitos son: <strong>Ser mayor de 18 a&ntilde;os, documento &uacute;nico de identidad, y realizar el primer dep&oacute;sito por un valor m&iacute;nimo de apertura de $25.00 USD.</strong>
                                        </div>
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
                                                <h4>Registrar Nuevas Cuentas de Ahorro </h4><br>
                                                <p>El n&uacute;mero de cuenta se genera autom&aacute;ticamente. Por favor haga clic en el campo y compruebe que el mismo sea v&aacute;lido. Si el mensaje le indica que ya esta en uso, simplemente refresque la p&aacute;gina hasta que el mensaje le indique que es v&aacute;lido. Si usted no acata lo anterior e intenta procesar la informaci&oacute;n <strong>NO podr&aacute; continuar con la solicitud.</strong><br><br></p>
                                                <form id="ingreso-nuevas-cuentas-ahorro-clientes" class="validacion-registro-cuentas-ahorros" method="post" autocomplete="off" enctype="multipart/form-data">
                                                    <div style="margin:0; padding:0;" id="resultados_ajax"></div>
                                                    <div class="row form-validation">
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">N&uacute;mero &Uacute;nico de Cuenta de Ahorro <span class="text-danger">*</span></label>
                                                                <small>Coloque el cursor sobre el campo hasta que aparezca el siguiente &iacute;cono <img style="width: 15px;" class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/help-cursor.png"> y haga clic</small>
                                                                <div class="col-lg-12">
                                                                    <input style="cursor: help;" type="text" class="form-control" id="val-numerocuentaahorro" name="val-numerocuentaahorro" placeholder="Ingrese el número único de cuenta de ahorro" value="10<?php $NumeroCuentaAleatorio = range(1, 7);
                                                                                                                                                                                                                                                                shuffle($NumeroCuentaAleatorio);
                                                                                                                                                                                                                                                                foreach ($NumeroCuentaAleatorio as $ValorFinal) {
                                                                                                                                                                                                                                                                    echo $ValorFinal;
                                                                                                                                                                                                                                                                } ?>" readonly onclick="comprobarNumeroCuentaAhorroCliente()">
                                                                    <div class="col-md-12">
                                                                        <span id="estadonumerocuenta"></span>
                                                                    </div>
                                                                    <p><img style="width: 25px; margin: 1rem 0 0 0; display:none;" src="../vista/images/Spinner.svg" id="loaderIcon" /></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Ingrese el monto de apertura <span class="text-danger">*</span></label>
                                                                <small>El monto m&iacute;nimo de apertura es de $25.00 USD</small>
                                                                <div class="col-lg-12">
                                                                    <input type="text" class="form-control" id="val-montodepositoapertura" name="val-montodepositoapertura" placeholder="$ USD" onInput="ValidarMontoApertura()" onkeypress="return (event.charCode <= 57)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Seleccione un cliente <span class="text-danger">*</span></label>
                                                                <small>Para filtrar resultados, d&iacute;gite el n&uacute;mero de DUI</small>
                                                                <div class="col-lg-12">
                                                                    <select class="js-example-theme-single" id="val-clientecuentaahorro" name="val-clientecuentaahorro">
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
                                                                                echo $filas['dui'];
                                                                                echo ']</option>
																';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- ENVIO DATOS -->
                                                    <button id="registronuevascuentas" type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="ti-save-alt"></i></span>Registrar Nueva Cuenta de Ahorro</button>
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
            // COMPROBAR SI CANTIDAD RECIBIDA ES IGUAL O MAYOR A LA REQUERIDA. CANTIDADES MENORES NO SON POSIBLES DE PROCESAR
            $('#registronuevascuentas').prop('disabled', true); // BLOQUEAR BOTON DE ENVIO POR DEFECTO
            function ValidarMontoApertura() {
                var DepositoMinimoApertura = 25; // COMPROBACION CONTRASEÃ‘A GENERADA
                let IngresoDepositoClientes = $('#val-montodepositoapertura').val(); // COMPROBACION DE CUOTA REQUERIDA
                $('#registronuevascuentas').prop('disabled', true); // BLOQUEAR BOTON DE ENVIO POR DEFECTO
                let activador = document.getElementById("val-montodepositoapertura")
                activador.addEventListener("keyup", () => {
                    if (activador.value < DepositoMinimoApertura) {
                        // SI EL MONTO INGRESADO ES MENOR AL QUE SE REQUIERE, NO SE PODRA PROCESAR LA SOLICITUD DE PAGOS DE CLIENTES
                        $('#registronuevascuentas').prop('disabled', true);
                        // CASO CONTRARIO, PERMITIR PROCESAR LOS PAGOS DE CLIENTES
                    } else {
                        $('#registronuevascuentas').prop('disabled', false);
                    }
                }) // CIERRE activador.addEventListener("keyup", () => 
            }
        </script>

    </body>

    </html>
<?php } ?>