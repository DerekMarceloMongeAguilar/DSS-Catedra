<?php
// SOLO  USUARIOS ADMINISTRADORES
if ($_SESSION['id_rol'] == 1) {
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
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=inicioadministradores">Mi Inicio</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=perfiladministradores">Mi Perfil</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "consulta-completa-usuarios-clientes" || $_GET['cashmanhagestion'] == "modificar-usuarios-administrador" || $_GET['cashmanhagestion'] == "registro-detalles-usuarios-administrador") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span class="nav-text">Usuarios</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a <?php if ($_GET['cashmanhagestion'] == "registro-detalles-usuarios-administrador") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=registro-usuarios-administrador">Registrar Usuarios</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-completa-usuarios-clientes" || $_GET['cashmanhagestion'] == "modificar-usuarios-administrador") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-general-usuarios-administrador">Consultar Usuarios</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "modificar-roles-usuarios") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="nav-text">Roles</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=registrar-nuevos-roles-usuarios">Registrar Roles</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "modificar-roles-usuarios") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-roles-usuarios">Consultar Roles</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "consulta-productos-especifica-cashmanha" || $_GET['cashmanhagestion'] == "modificar-productos-cashmanha") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="nav-text">Productos</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=registrar-nuevos-productos-administrador">Registrar Productos</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-productos-especifica-cashmanha" || $_GET['cashmanhagestion'] == "modificar-productos-cashmanha") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consultar-productos-cashmanha">Consultar Productos</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['cashmanhagestion'] == "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes" || $_GET['cashmanhagestion'] == "gestionador-cuotas-contratos-solicitudes-creditos-clientes" || $_GET['cashmanhagestion'] == "primera-revision-gestionar-solicitudes-creditos-clientes") {
                        echo "class='mm-active'";
                    } ?>><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                        <svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="nav-text">Cr&eacute;ditos</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=asignacion-nuevos-creditos-clientes">Asignar Nuevos Cr&eacute;ditos</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-aprobados-activos">Cr&eacute;ditos Aprobados</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-reestructurar-creditos-clientes">Reestructurar Cr&eacute;ditos</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-denegados">Cr&eacute;ditos Rechazados</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=listado-general-creditos-cancelados">Cr&eacute;ditos Cancelados</a></li>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=gestionar-reestructuracion-solicitudes-creditos-clientes">Mis Solicitudes Cr&eacute;ditos [Reestructurar]</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "gestionador-cuotas-contratos-solicitudes-creditos-clientes") {
                                    echo 'class="active-element-menu"';
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-gestiones-creditos-clientes-aprobadas">Contratos y Cuotas [Solicitudes Aprobadas]</a></li>
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
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=registro-nuevas-cuentas-ahorro-clientes">Registro Nuevas Cuentas Ahorro</a></li>
                        <li><a <?php if ($_GET['cashmanhagestion'] == "consulta-transacciones-general-cuentas-clientes" || $_GET['cashmanhagestion'] == "retiros-cuentas-ahorros-clientes" || $_GET['cashmanhagestion'] == "deposito-cuentas-ahorros-clientes") {
                                    echo "class='active-element-menu'";
                                } ?> href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=gestionador-cuentas-ahorros-clientes">Consultar Cuentas Ahorro</a></li>
                        <?php
                        // MOSTRAR OPCION SOLAMENTE SI CUENTA CON CUENTA DE AHORRO DISPONIBLE
                        if ($_SESSION['comprobacioncuenta_ahorros'] == "si") {
                        ?>
                            <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-transacciones-cuentas-clientes">Consultar Mi Cuenta Ahorro</a></li>
                        <?php } ?>
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-transacciones-procesadas-cuentas-clientes">Consultar Transacciones Cuentas Ahorro</a></li>
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
                        <li><a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=consulta-general-transacciones-procesadas-clientes">Listado de Transacciones</a></li>
                        <?php
                        // MOSTRAR UNICAMENTE SI USUARIO POSEE CREDITO ACTIVO
                        if ($_SESSION['comprobacioncreditos_clientes'] == "si") {
                        ?>
                            
                        <?php } ?>
                        
                    </ul>
                </li>
            </ul>

            <div class="add-menu-sidebar">
                <p style="font-size: .6rem;"><strong>&copy; Copyright <?php echo date('Y'); ?> ACO Emprenprendedores</strong></p>

            </div>
            <div class="copyright">

            </div>
        </div>
    </div>
<?php } ?>