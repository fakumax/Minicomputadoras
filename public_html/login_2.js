$(document).on('ready', inicio);

function inicio(){
	limpiarLogin();
	validarLogin();
	cambiarClave();
	registrarUsuario();
}

function validarLogin(){
	alertify.success('Administrador-(admin/admin) Profesor-(profesor/profesor) Alumno-(33333333/33333333)');
	$('#clave').on('keypress', function(e) { if(e.which == 13) validarAcceso(e); });
	$('#login').on('click', validarAcceso);
}

function validarAcceso(evento){
	//var id = evento.target.id; //console.log('Id seleccionado: '+id);
	$.ajax({
		url: 'login_3.php?accion=Ingresar',
		data: $("#loginform").serialize(),
		type: 'post',
		success: function(response){
			console.log('Acceso: '+response);
			if (response=='ok') $(location).attr('href','principal.php');
			if (response=='error') mostrarMensaje2('mensaje_login', 'Verifique los datos', 'error');
			if (response=='cambiar_clave') {
				limpiarCambiarClave();
				$("#cambiarClave").modal();
				$("#cambiar_id").val($("#clave").val());
			}
		}
	});
}

function registrarUsuario(){
	$('#registrar').on('click', validarRegistro);
}

function validarRegistro(evento){
	$.ajax({
		url: 'login_3.php?accion=Registrar',
		data: $("#registroFrm").serialize(),
		type: 'post',
		success: function(response){
			console.log('Registro: '+response);
			if (response=='ok') {
				mostrarMensaje('mensaje_registro');
				mostrarMensaje2('mensaje_login', 'Los datos se grabaron');
				alertify.alert('Registro exitoso!', 'En su primer acceso deberá ingresar su DNI como Contraseña provisoria.');
			}
			if (response=='error') mostrarMensaje('mensaje_registro', 'error');
		}
	});
}

function cambiarClave(){
	var enter = 13;
	$('#cambiar_clave2').on('keypress', function(e) { if(e.which == enter) validarCambiarClave(e, enter); });
	$('#cambiar_clave').on('blur', validarCambiarClave);
	$('#cambiar_clave2').on('blur', validarCambiarClave);
	$('#cambiar_enviar').on('click', validarCambiarClave);
}

function validarCambiarClave(evento, enter=0)
{
	var id = evento.target.id;
	console.log('Id seleccionado: '+id);
	if (id == 'cambiar_clave' || id == 'cambiar_enviar') validarText('cambiar_clave');
	if (id == 'cambiar_clave2' || id == 'cambiar_enviar') {
		var campo = 'cambiar_clave2';
		var clave = document.getElementById('cambiar_clave').value;
		var clave2 = document.getElementById('cambiar_clave2').value;
		if ( clave != clave2) formato(campo, 'Este campo no coincide con la contraseña ingresada.');
		else formato(campo);
	}
	if (id == 'cambiar_enviar' || enter == 13) {
		var formatoValidoCambiarClave = true;
		if ( ( isNV('cambiar_clave') || isNV('cambiar_clave2') ) ) { mostrarMensaje('mensaje_clave', 'error'); formatoValidoCambiarClave = false; }
		if (formatoValidoCambiarClave) {
			console.log($("#frm_cambiarclave").serialize());
			$.ajax({
				url: 'login_3.php?accion=Cambiar_Clave',
				data: $("#frm_cambiarclave").serialize(),
				type: 'post',
				success: function(response){
					console.log('CambiarClave: '+response);
					if (response=='ok') mostrarMensaje('mensaje_clave');
					if (response=='error') mostrarMensaje('mensaje_clave', 'error');
				}
			});
		}
	}
}

function limpiarLogin(){
	$('#loginform')[0].reset();
	limpiarMensaje('mensaje_login');
}

function limpiarRegistro(){
	$('#registroFrm')[0].reset();
	borrarFormato('dni');
	borrarFormato('apellido');
	borrarFormato('nombre');
	borrarFormato('telefono');
	borrarFormato('email');
	limpiarMensaje('mensaje_registro');
}

function limpiarCambiarClave(){
	$('#frm_cambiarclave')[0].reset();
	borrarFormato('cambiar_clave');
	borrarFormato('cambiar_clave2');
	limpiarMensaje('mensaje_clave');
	$("#cambiar_id").val(clave);
}