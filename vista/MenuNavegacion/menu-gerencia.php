<?php
// SOLO  USUARIOS GERENCIA
if ($_SESSION['id_rol'] == 3) {
?>
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="nav-text">Inicio</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=iniciogerencia">Mi Inicio</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=perfilgerencia">Mi Perfil</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "consulta-productos-especifica-cashmanha-gerencia" || $_GET['cashmanhagestion'] == "modificar-productos-cashmanha-gerencia") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="nav-text">Productos</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-productos-especifica-cashmanha-gerencia" || $_GET['cashmanhagestion'] == "modificar-productos-cashmanha-gerencia") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consultar-productos-cashmanha-gerencia">Consultar Productos</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="nav-text">Cr&eacute;ditos</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=asignacion-nuevos-creditos-clientes-gerencia">Asignar Nuevos Cr&eacute;ditos</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-aprobados-activos-gerencia">Cr&eacute;ditos Aprobados</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=gestionar-solicitudes-creditos-asignados-clientes-gerencia">Consulta Revisi&oacute;n Solicitudes Cr&eacute;ditos</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-reestructurar-creditos-clientes-gerencia">Reestructurar Cr&eacute;ditos</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-denegados-gerencia">Cr&eacute;ditos Rechazados</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-cancelados-gerencia">Cr&eacute;ditos Cancelados</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "consulta-transacciones-general-cuentas-clientes" || $_GET['cashmanhagestion'] == "retiros-cuentas-ahorros-clientes" || $_GET['cashmanhagestion'] == "deposito-cuentas-ahorros-clientes") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg fill="LightSlateGrey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M22 7h1v10h-1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v3zm-2 10h-6a5 5 0 0 1 0-10h6V5H4v14h16v-2zm1-2V9h-7a3 3 0 0 0 0 6h7zm-7-4h3v2h-3v-2z" />
                        </svg>
                        <span class="nav-text">Cuentas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-transacciones-general-cuentas-clientes" || $_GET['cashmanhagestion'] == "retiros-cuentas-ahorros-clientes" || $_GET['cashmanhagestion'] == "deposito-cuentas-ahorros-clientes") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=gestionador-cuentas-ahorros-clientes-gerencia">Consultar Cuentas Ahorro</a></li>
                        <?php
                        // MOSTRAR OPCION SOLAMENTE SI CUENTA CON CUENTA DE AHORRO DISPONIBLE
                        if ($_SESSION['comprobacioncuenta_ahorros'] == "si") {
                        ?>
                    
                        <?php } ?>
                    </ul>
                </li>
               
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg fill="LightSlateGrey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M4 6.414L.757 3.172l1.415-1.415L5.414 5h15.242a1 1 0 0 1 .958 1.287l-2.4 8a1 1 0 0 1-.958.713H6v2h11v2H5a1 1 0 0 1-1-1V6.414zM6 7v6h11.512l1.8-6H6zm-.5 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm12 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                        </svg>
                        <span class="nav-text">Transacciones</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-general-transacciones-procesadas-clientes-gerencia">Listado de Transacciones</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-general-mis-transacciones-procesadas-clientes-gerencia">Mis Transacciones</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-aprobados-activos-gerencia">Transacciones Por Cliente</a></li>
                    </ul>
                </li>
                <?php
                if ($_SESSION['comprobacioncuenta_ahorros'] == "si") {
                ?>
                    <li <?php if ($_GET['cashmanhagestion'] == "sistema-pagos-creditos-cashmanha-clientes" || $_GET['cashmanhagestion'] == "validacion-datos-transferencia-otras-cuentas-clientes") {
                            echo 'class="mm-active"';
                        } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                            <svg fill="LightSlateGrey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0H24V24H0z" />
                                <path d="M12 13c1.657 0 3 1.343 3 3 0 .85-.353 1.616-.92 2.162L12.17 20H15v2H9v-1.724l3.693-3.555c.19-.183.307-.438.307-.721 0-.552-.448-1-1-1s-1 .448-1 1H9c0-1.657 1.343-3 3-3zm6 0v4h2v-4h2v9h-2v-3h-4v-6h2zM4 12c0 2.527 1.171 4.78 3 6.246v2.416C4.011 18.933 2 15.702 2 12h2zm8-10c5.185 0 9.449 3.947 9.95 9h-2.012C19.446 7.054 16.08 4 12 4 9.536 4 7.332 5.114 5.865 6.865L8 9H2V3l2.447 2.446C6.28 3.336 8.984 2 12 2z" />
                            </svg>
                            <span class="nav-text">Transferencias</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a <?php if ($_GET['cashmanhagestion'] == "validacion-datos-transferencia-otras-cuentas-clientes") {
                                        echo 'class="active-element-menu"';
                                    } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=transferencia-otras-cuentas-clientes-gerencia">Transferir Dinero Otras Cuentas</a></li>
                        </ul>
                    </li>
                <?php } ?>
                
            </ul>

            <div class="add-menu-sidebar">
                <p style="font-size: .6rem;"><strong>&copy; Copyright <?php echo date('Y'); ?> ACO Emprendedores</strong></p>

            </div>
            <div class="copyright">

            </div>
        </div>
    </div>
<?php } ?>