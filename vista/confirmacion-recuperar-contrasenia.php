<?php
// NO PERMITIR INGRESO SIN ENVIO DE PARAMETRO
if (!isset($_GET['cashmanha'])) {
    header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
}
if ($_GET['cashmanha'] != "confirmacion-recuperacion-cuentas") {
    header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
}
?>

<!DOCTYPE html>
<html lang="ES-SV" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Aco Emprendedores | Recuperar Contrase&ntilde;a</title>
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
    <link href="<?php echo $UrlGlobal; ?>vista/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <img style="width: 100%; max-width: 300px;" src="../vista/images/nuevo-correo-electronico.svg">
                <div class="col-md-6">
                    <div class="alert alert-success left-icon-big alert-dismissible fade show"">
                        <div class=" media">
                        <div class="alert-left-icon-big">
                            <span><i class="mdi mdi-email-alert"></i></span>
                        </div>
                        <div class="media-body">
                            <h6 class="mt-1 mb-2">Estimado usuario(a)</h6>
                            <p class="mb-0">Su solicitud de restablecimiento de su cuenta ha sido procesada con &eacute;xito. Por favor revise su correo y siga las instrucciones ah&iacute; descritas. <br> <br>¿Problemas? por favor comun&iacute;quese al siguiente correo: <a href="mailto:soporte@acoemprendedores.com">soporte@acoemprendedores.com</a> Nuestro equipo de soporte t&eacute;cnico se comunicar&aacute; con usted en el menor tiempo posible.<br><br>Atentamente: Equipo de recuperaciones de cuentas - Aco Emprendedores<strong></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


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
</body>

</html>