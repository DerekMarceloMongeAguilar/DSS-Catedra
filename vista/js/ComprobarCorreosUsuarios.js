
function comprobarUsuario() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "../modelo/consulta-correo-recuperacion.php",
	data:'val-email='+$("#val-email").val(),
	type: "POST",
	success:function(data){
		$("#estadousuario").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
}