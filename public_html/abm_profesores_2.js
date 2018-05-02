$(document).on('ready', inicio);

function inicio(){
	listadoProfesor();
	altaProfesor();
	editarProfesor();
}

function listadoProfesor(){
	$.ajax({
		url: 'abm_profesores_3.php?accion=Listado',
		beforeSend: cargando('resultado'),
		success: function(response){
			$('#resultado').html(response).fadeIn('slow');
			formatoDataTable();
		}
	});
}

function limpiarAltaProfesor(){
	borrarFormato('dni');
	borrarFormato('apellido');
	borrarFormato('nombre');
	limpiarMensaje('mensaje');
	$('#frm_altaprofesor')[0].reset();
}

function altaProfesor(){
	$('#dni').on('blur', validarAltaProfesor);
	$('#apellido').on('blur', validarAltaProfesor);
	$('#nombre').on('blur', validarAltaProfesor);
	$('#enviar').on('click', validarAltaProfesor);
	$('#limpiar').on('click', validarAltaProfesor);
}

function validarAltaProfesor(evento){
	var id = evento.target.id; //console.log('Id seleccionado: '+id);
	if (id == 'dni' || id == 'enviar') validarTextNum('dni');
	if (id == 'apellido' || id == 'enviar') validarText('apellido');
	if (id == 'nombre' || id == 'enviar') validarText('nombre');
	if (id == 'enviar') {
		var formatoValidoAltaProfesor = true;
		if ( isNV('dni') || isNV('apellido') || isNV('nombre') ) { mostrarMensaje('mensaje', 'error'); formatoValidoAltaProfesor = false; }
		if (formatoValidoAltaProfesor) {
			$.ajax({
				url: 'abm_profesores_3.php',
				data: $("#frm_altaprofesor").serialize(),
				type: 'post',
				success: function(response){
					console.log('enviarAltaProfesor: '+response);
					listadoProfesor();
				}
			});
			mostrarMensaje('mensaje');
		}
	}
	if (id == 'limpiar') {
		limpiarAltaProfesor();
	}
}

function editarProfesor(){
	$('#mod_dni').on('blur', validarEditarProfesor);
	$('#mod_apellido').on('blur', validarEditarProfesor);
	$('#mod_nombre').on('blur', validarEditarProfesor);
	$('#mod_enviar').on('click', validarEditarProfesor);
}

function validarEditarProfesor(evento)
{
	var id = evento.target.id; //console.log('Id seleccionado: '+id);
	if (id == 'mod_dni') validarTextNum('mod_dni');
	if (id == 'mod_apellido') validarText('mod_apellido');
	if (id == 'mod_nombre') validarText('mod_nombre');
	if (id == 'mod_enviar') {
		var formatoValidoEditarProfesor = true;
		if ( isNV('mod_dni') || isNV('mod_apellido') || isNV('mod_nombre') ) { mostrarMensaje('mod_mensaje', 'error'); formatoValidoEditarProfesor = false; }
		if (formatoValidoEditarProfesor) {
			//console.log($("#frm_editarprofesor").serialize());
			$.ajax({
				url: 'abm_profesores_3.php',
				data: $("#frm_editarprofesor").serialize(),
				type: 'post',
				success: function(response){
					console.log('enviarEditarProfesor: '+response);
					listadoProfesor();
				}
			});
			mostrarMensaje('mod_mensaje');
		}
	}
}

function editar_profesor(id)
{
	$('#frm_editarprofesor')[0].reset();
	var dni_profesor = $("#dni_profesor"+id).text()
	var apellido_profesor = $("#id"+id).data( "apellido" );
	var nombre_profesor = $("#id"+id).data( "nombre" );
	var telefono_profesor = $("#telefono_profesor"+id).text()
	var email_profesor = $("#email_profesor"+id).text()

	$("#mod_id").val(id);
	$("#mod_dni").val(dni_profesor);
	$("#mod_apellido").val(apellido_profesor);
	$("#mod_nombre").val(nombre_profesor);
	$("#mod_telefono").val(telefono_profesor);
	$("#mod_email").val(email_profesor);

	borrarFormato('mod_dni');
	borrarFormato('mod_apellido');
	borrarFormato('mod_nombre');
	limpiarMensaje('mod_mensaje');
}

function eliminar_profesor(id)
{
	var nombre = $("#nombre_profesor"+id).text()
	alertify.confirm('Borrar registro', '¿Realmente deseas eliminar al profesor "'+nombre+'"?',
		function(){
			$.ajax({
				url: 'abm_profesores_3.php',
				data: {id:id, accion:'Baja'},
				type: 'post',
				success: function(response){
					console.log('enviarBajaProfesor: '+response);
					listadoProfesor();
					//alertify.success('Registro borrado');
				}
			})
		},
		function(){
			//alertify.error('Operación Cancelada')
		}
	);
}

