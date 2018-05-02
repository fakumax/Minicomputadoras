$(document).on('ready', inicio);

function inicio(){
	listadoMateria();
	altaMateria();
	editarMateria();
}

function listadoMateria(){
	$.ajax({
		url: 'abm_materias_3.php?accion=Listado',
		beforeSend: cargando('resultado'),
		success: function(response){
			$('#resultado').html(response).fadeIn('slow');
			formatoDataTable();
		}
	});
}

function limpiarAltaMateria(){
	borrarFormato('nombre');
	borrarFormato('descripcion');
	limpiarMensaje('mensaje');
	$('#frm_altamateria')[0].reset();
}

function altaMateria(){
	$('#nombre').on('blur', validarAltaMateria);
	$('#descripcion').on('blur', validarAltaMateria);
	$('#enviar').on('click', validarAltaMateria);
	$('#limpiar').on('click', validarAltaMateria);
}

function validarAltaMateria(evento){
	var id = evento.target.id; //console.log('Id seleccionado: '+id);
	if (id == 'nombre' || id == 'enviar') validarText('nombre');
	if (id == 'descripcion' || id == 'enviar') validarText('descripcion');
	if (id == 'enviar') {
		var formatoValidoAltaMateria = true;
		if ( isNV('nombre') || isNV('descripcion') ) { mostrarMensaje('mensaje', 'error'); formatoValidoAltaMateria = false; }
		if (formatoValidoAltaMateria) {
			$.ajax({
				url: 'abm_materias_3.php',
				data: $("#frm_altamateria").serialize(),
				type: 'post',
				success: function(response){
					console.log('enviarAltaMateria: '+response);
					listadoMateria();
				}
			});
			mostrarMensaje('mensaje');
		}
	}
	if (id == 'limpiar') {
		limpiarAltaMateria();
	}
}

function editarMateria(){
	$('#mod_nombre').on('blur', validarEditarMateria);
	$('#mod_descripcion').on('blur', validarEditarMateria);
	$('#mod_enviar').on('click', validarEditarMateria);
}

function validarEditarMateria(evento)
{
	var id = evento.target.id; //console.log('Id seleccionado: '+id);
	if (id == 'mod_nombre') validarText('mod_nombre');
	if (id == 'mod_descripcion') validarText('mod_descripcion');
	if (id == 'mod_enviar') {
		var formatoValidoEditarMateria = true;
		if ( isNV('mod_nombre') || isNV('mod_descripcion') ) { mostrarMensaje('mod_mensaje', 'error'); formatoValidoEditarMateria = false; }
		if (formatoValidoEditarMateria) {
			//console.log($("#frm_editarmateria").serialize());
			$.ajax({
				url: 'abm_materias_3.php',
				data: $("#frm_editarmateria").serialize(),
				type: 'post',
				success: function(response){
					console.log('enviarEditarMateria: '+response);
					listadoMateria();
				}
			});
			mostrarMensaje('mod_mensaje');
		}
	}
}

function editar_materia(id)
{
	$('#frm_editarmateria')[0].reset();
	var nombre_materia = $("#nombre_materia"+id).text()
	var descripcion_materia = $("#descripcion_materia"+id).text()
	var anio_materia = $("#anio_materia"+id).text()
	var clave_materia = $("#clave_materia"+id).text()

	$("#mod_id").val(id);
	$("#mod_nombre").val(nombre_materia);
	$("#mod_descripcion").val(descripcion_materia);
	$("#mod_clave").val(clave_materia);

	$('#mod_anio option[value="1"]').removeAttr("selected");
	$('#mod_anio option[value="2]').removeAttr("selected");
	$('#mod_anio option[value="3"]').removeAttr("selected");
	if (anio_materia == 'Primero') $('#mod_anio option[value="1"]').attr("selected", "selected");
	else if (anio_materia == 'Segundo') $('#mod_anio option[value="2"]').attr("selected", "selected");
	else if (anio_materia == 'Tercero') $('#mod_anio option[value="3"]').attr("selected", "selected");

	borrarFormato('mod_nombre');
	borrarFormato('mod_descripcion');
	limpiarMensaje('mod_mensaje');
}

function eliminar_materia(id)
{
	var nombre = $("#nombre_materia"+id).text()
	alertify.confirm('Borrar registro', '¿Realmente deseas eliminar la materia "'+nombre+'"?',
		function(){
			$.ajax({
				url: 'abm_materias_3.php',
				data: {id:id, accion:'Baja'},
				type: 'post',
				success: function(response){
					console.log('enviarBajaMateria: '+response);
					listadoMateria();
					//alertify.success('Registro borrado');
				}
			})
		},
		function(){
			//alertify.error('Operación Cancelada')
		}
	);
}

