<?php
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
		<title>Aco Emprendedores | Asignaci&oacute;n Nuevos Cr&eacute;ditos</title>
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
            Chat box start
        ***********************************-->
			<div class="chatbox">
				<div class="chatbox-close"></div>
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="chat" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
								<div class="card-header chat-list-header text-center">
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Chat List</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
									<ul class="contacts">
										<li class="name-first-letter">A</li>
										<li class="active dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Archie Parker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Alfie Mason</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">B</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Bashid Samim</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Breddie Ronan</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Ceorge Carson</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">D</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Darry Parker</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Denry Hunter</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">J</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Jack Ronan</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Jacob Tucker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>James Logan</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Joshua Weston</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">O</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oliver Acker</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oscar Weston</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card chat dz-chat-history-box d-none">
								<div class="card-header chat-list-header text-center">
									<a href="#" class="dz-chat-history-back">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" />
												<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
											</g>
										</svg>
									</a>
									<div>
										<h6 class="mb-1">Chat with Khelesh</h6>
										<p class="mb-0 text-success">Online</p>
									</div>
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<circle fill="#000000" cx="5" cy="12" r="2" />
													<circle fill="#000000" cx="12" cy="12" r="2" />
													<circle fill="#000000" cx="19" cy="12" r="2" />
												</g>
											</svg></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
											<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
											<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
											<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
										</ul>
									</div>
								</div>
								<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
								</div>
								<div class="card-footer type_msg">
									<div class="input-group">
										<textarea class="form-control" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="alerts" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card">
								<div class="card-header chat-list-header text-center">
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Notications</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
									<ul class="contacts">
										<li class="name-first-letter">SEVER STATUS</li>
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">KK</div>
												<div class="user_info">
													<span>David Nester Birthday</span>
													<p class="text-primary">Today</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SOCIAL</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
												<div class="user_info">
													<span>Perfection Simplified</span>
													<p>Jame Smith commented on your status</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SEVER STATUS</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="tab-pane fade" id="notes">
							<div class="card mb-sm-3 mb-md-0 note_card">
								<div class="card-header chat-list-header text-center">
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Notes</h6>
										<p class="mb-0">Add New Nots</p>
									</div>
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
									<ul class="contacts">
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>New order placed..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Youtube, a video-sharing website..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>john just buy your product..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--**********************************
            Chat box End
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
									Asignar Nuevos Cr&eacute;ditos
								</div>
							</div>

							<ul class="navbar-nav header-right">
								<li class="nav-item dropdown header-profile">
									<a class="nav-link" href="#" role="button" data-toggle="dropdown">
										<div class="header-info">
											<span class="text-black">Hola, <strong><?php $Nombre = $_SESSION['nombre_usuario'];
																					$PrimerNombre = explode(' ', $Nombre, 2);
																					print_r($PrimerNombre[0]); ?></strong></span>
											<p class="fs-12 mb-0">Super Admin</p>
										</div>
										<img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $_SESSION['foto_perfil']; ?>" width="20" alt="" />
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="./app-profile.html" class="dropdown-item ai-icon">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
											<span class="ml-2">Profile </span>
										</a>
										<a href="./email-inbox.html" class="dropdown-item ai-icon">
											<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
												<polyline points="22,6 12,13 2,6"></polyline>
											</svg>
											<span class="ml-2">Inbox </span>
										</a>
										<a href="./page-login.html" class="dropdown-item ai-icon">
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
												<polyline points="16 17 21 12 16 7"></polyline>
												<line x1="21" y1="12" x2="9" y2="12"></line>
											</svg>
											<span class="ml-2">Logout </span>
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
								<li><a href="index.html">Mi Perfil</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
								</svg>
								<span class="nav-text">Usuarios</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="#">Registrar Usuarios</a></li>
								<li><a href="#">Consultar Usuarios</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
								</svg>
								<span class="nav-text">Roles</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="#">Registrar Roles</a></li>
								<li><a href="#">Consultar Roles</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
								</svg>
								<span class="nav-text">Productos</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="#">Registrar Productos</a></li>
								<li><a href="#">Consultar Productos</a></li>
							</ul>
						</li>
						<li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
								</svg>
								<span class="nav-text">Cr&eacute;ditos</span>
							</a>
							<ul aria-expanded="false">
								<li><a class="active-element-menu" href="#">Asignar Nuevos Cr&eacute;ditos</a></li>
								<li><a href="#">Consultar Cr&eacute;ditos</a></li>
							</ul>
						</li>
					</ul>

					<div class="add-menu-sidebar">
						<p>Generate Monthly Credit Report</p>
						<a href="javascript:void(0);">
							<svg width="24" height="12" viewBox="0 0 24 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.725 5.14889C23.7248 5.14861 23.7245 5.14828 23.7242 5.148L18.8256 0.272997C18.4586 -0.0922062 17.865 -0.0908471 17.4997 0.276184C17.1345 0.643169 17.1359 1.23675 17.5028 1.602L20.7918 4.875H0.9375C0.419719 4.875 0 5.29472 0 5.8125C0 6.33028 0.419719 6.75 0.9375 6.75H20.7917L17.5029 10.023C17.1359 10.3882 17.1345 10.9818 17.4998 11.3488C17.865 11.7159 18.4587 11.7172 18.8256 11.352L23.7242 6.477C23.7245 6.47672 23.7248 6.47639 23.7251 6.47611C24.0923 6.10964 24.0911 5.51414 23.725 5.14889Z" fill="white" />
							</svg>
						</a>
					</div>
					<div class="copyright">
						<p><strong>&copy; Copyright <?php echo date('Y'); ?> ACO EMPRENDEDORES Todos Los Derechos Reservados</strong></p>
						<p>Made with <i class="fa fa-heart"></i> by DexignZone</p>
					</div>
				</div>
			</div>
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
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Asignar Nuevos Cr&eacute;ditos</a></li>
						</ol>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div id="accordion-six" class="accordion accordion-with-icon accordion-danger-solid">
								<div class="accordion__item">
									<div class="accordion__header collapsed" data-toggle="collapse" data-target="#with-icon_collapseOne">
										<span class="accordion__header--icon"></span>
										<span class="accordion__header--text">Tomar Nota:</span>
										<span class="accordion__header--indicator indicator_bordered"></span>
									</div>
									<div id="with-icon_collapseOne" class="accordion__body collapse" data-parent="#accordion-six">
										<div class="accordion__body--text">
											<i class="ti-direction"></i> Usted podr&aacute; iniciar un nuevo tr&aacute;mite de cr&eacute;ditos a nuestros clientes ya sean nuevos o antiguos. Por favor tome en cuenta que una vez iniciado un tr&aacute;mite; queda sujeto a aprobaci&oacute;n del &aacute;rea asignada. <strong>Para filtrar resultados, en el buscador; por favor ingrese el n&uacute;mero de documento &uacute;nico de identidad (DUI) o n&uacute;mero de identificaci&oacute;n tributaria (NIT) del cliente a procesar.</strong>
										</div>
									</div>
								</div>
								<div class="card-body">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#home8">
												<span>
													<i class="ti ti-shortcode"></i>
												</span>
											</a>
										</li>
									</ul>
									<!-- Tab panes -->
									<div class="tab-content tabcontent-border">
										<div class="tab-pane fade show active" id="home8" role="tabpanel">
											<div class="pt-4">
												<h4>Asignar Nuevos Cr&eacute;ditos Clientes</h4><br>
												<p>Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
																$PrimerNombre = explode(' ', $Nombre, 2);
																print_r($PrimerNombre[0]); ?>, en este apartado encontrar&aacute;s el listado completo de todos los usuarios registrados que poseen perfil completo y est&aacute;n aptos para iniciar tr&aacute;mites de nuevos cr&eacute;ditos.<strong> Este listado es general, sin aplicar filtros; ni tomando en cuenta record crediticio. Para mayor informaci&oacute;n consultar &aacute;reas espec&iacute;ficas.</strong></p>
												<div class="table-responsive">
													<table style="width: 100%;" id="example5" class="display min-w850">
														<thead>
															<tr>
																<th></th>
																<th>Nombres</th>
																<th>Apellidos</th>
																<th>Correo</th>
																<th>DUI</th>
																<th>NIT</th>
																<th></th>
															</tr>
														</thead>
														<tbody>
															<?php
															while ($filas = mysqli_fetch_array($consulta)) {
																echo ' 
													<tr>
													<td><img class="rounded-circle" width="35" src="';
																echo $UrlGlobal;
																echo 'vista/images/fotoperfil/';
																echo $filas['fotoperfil'];
																echo '" alt=""></td>
													<td>';
																echo $filas['nombres'];
																echo '</td>
													<td>';
																echo $filas['apellidos'];
																echo '</td>
													<td>';
																echo $filas['correo'];
																echo '</td>
													<td><a href="javascript:void()" class="badge badge-circle badge-outline-info">';
																echo $filas['dui'];
																echo '</a></td>
													<td><a href="javascript:void()" class="badge badge-circle badge-outline-info">';
																echo $filas['nit'];
																echo '</a></td>
                                                    <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a target="_blank" class="dropdown-item" href="';
																echo $UrlGlobal;
																echo 'controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-informacion&idusuario=';
																echo $filas['idusuarios'];
																echo '"><i class="ti ti-wallet"></i> Asignar Nuevo Cr&eacute;dito</a>
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
				<p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
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
	</body>

	</html>
<?php } ?>