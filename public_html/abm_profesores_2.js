$(document).on('ready', inicio);

function inicio(){
	listadoProfesor();
	//altaProfesor();
	//editarProfesor();
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

function altaProfesor(){
	$('#descripcion').on('blur', validarAltaProducto);
	$('#cant_min').on('blur', validarAltaProducto);
	$('#p_costo').on('blur', validarAltaProducto);
	$('#p_venta').on('blur', validarAltaProducto);
	$('input[name=iva]').on('click', validarAltaProducto);
	$('input[name=medida]').on('click', validarAltaProducto);
	$('#enviar').on('click', validarAltaProducto);
	$('#limpiar').on('click', validarAltaProducto);
	$('#tipo').on('change', inicializarAltaProducto);
	inicializarAltaProducto();
}

function validarAltaProducto(evento){
	var id = evento.target.id; //console.log('Id seleccionado: '+id);
	if (id == 'descripcion' || id == 'enviar') validarText('descripcion');
	if (id == 'cant_min' || id == 'enviar') validarTextNum('cant_min');
	if (id == 'p_costo' || id == 'enviar') validarTextNum('p_costo');
	if (id == 'p_venta' || id == 'enviar') validarTextNum('p_venta');
	if (id == 'ivaN' || id == 'ivaR' || id == 'ivaA' || id == 'enviar') validarRadio('iva');
	if (id == 'medidaU' || id == 'medidaG' || id == 'medidaL' || id == 'enviar') validarRadio('medida');
	if (id == 'enviar') {
		var formatoValidoAltaProducto = true;
		if ( $('#tipo').val().trim() == 'P' && ( isNV('descripcion') || isNV('cant_min') || isNV('p_venta') || isNV('iva') || isNV('medida') ) ) { mostrarMensaje('mensaje', 'error'); formatoValidoAltaProducto = false; }
		if ( $('#tipo').val().trim() == 'I' && ( isNV('descripcion') || isNV('cant_min') || isNV('p_costo') || isNV('iva') || isNV('medida') ) ) { mostrarMensaje('mensaje', 'error'); formatoValidoAltaProducto = false; }
		if ( ($('#tipo').val().trim() == 'O' || $('#tipo').val().trim() == 'A') && ( isNV('descripcion') || isNV('cant_min') || isNV('p_costo') || isNV('p_venta') || isNV('iva') || isNV('medida') ) ) { mostrarMensaje('mensaje', 'error'); formatoValidoAltaProducto = false; }
		if (formatoValidoAltaProducto) {
			$.ajax({
				url: 'abm_profesors_3.php',
				data: $("#frm_altaproducto").serialize(),
				type: 'post',
				success: function(response){
					console.log('enviarAltaProducto: '+response);
					listadoProducto();
				}
			});
			mostrarMensaje('mensaje');
		}
	}
	if (id == 'limpiar') {
		borrarFormato('descripcion');
		borrarFormato('cant_min');
		borrarFormato('p_costo');
		borrarFormato('p_venta');
		borrarFormato('iva');
		borrarFormato('medida');
		limpiarMensaje('mensaje');
		$('#frm_altaproducto')[0].reset();
		inicializarAltaProducto();
	}
}

function inicializarAltaProducto(){
	$('span.help-block').hide();
	$('#div_p_venta').show();
	$('#div_p_costo').show();
	if ($('#tipo').val().trim() == 'P') {
		$('#div_p_costo').hide(); $('#p_costo').val(''); borrarFormato('p_costo');
	}
	if ($('#tipo').val().trim() == 'I'){
		$('#div_p_venta').hide(); $('#p_venta').val(''); borrarFormato('p_venta');
	}
	$('#tipo').focus();
}

function editarProfesor(){
	$('#mod_descripcion').on('blur', validarEditarProducto);
	$('#mod_cant_min').on('blur', validarEditarProducto);
	$('#mod_p_costo').on('blur', validarEditarProducto);
	$('#mod_p_venta').on('blur', validarEditarProducto);
	$('input[name=mod_iva]').on('click', validarEditarProducto);
	$('input[name=mod_medida]').on('click', validarEditarProducto);
	$('#mod_descuento').on('blur', validarEditarProducto);
	$('#mod_enviar').on('click', validarEditarProducto);
	$('#mod_tipo').on('change', inicializarEditarProducto);
}

function validarEditarProducto(evento)
{
	var id = evento.target.id; //console.log('Id seleccionado: '+id);
	if (id == 'mod_descripcion') validarText('mod_descripcion');
	if (id == 'mod_cant_min') validarTextNum('mod_cant_min');
	if (id == 'mod_p_costo') validarTextNum('mod_p_costo');
	if (id == 'mod_p_venta') validarTextNum('mod_p_venta');
	if (id == 'mod_ivaN' || id == 'mod_ivaR' || id == 'mod_ivaA') validarRadio('mod_iva');
	if (id == 'mod_medidaU' || id == 'mod_medidaG' || id == 'mod_medidaL') validarRadio('mod_medida');
	if (id == 'mod_descuento') validarTextNum('mod_descuento');
	if (id == 'mod_enviar') {
		var formatoValidoEditarProducto = true;
		if ( $('#mod_tipo').val().trim() == 'P' && ( isNV('mod_descripcion') || isNV('mod_cant_min') || isNV('mod_p_venta') || isNV('mod_iva') || isNV('mod_medida')  || isNV('mod_descuento') ) ) { mostrarMensaje('mod_mensaje', 'error'); formatoValidoEditarProducto = false; }
		if ( $('#mod_tipo').val().trim() == 'I' && ( isNV('mod_descripcion') || isNV('mod_cant_min') || isNV('mod_p_costo') || isNV('mod_iva') || isNV('mod_medida') || isNV('mod_descuento') ) ) { mostrarMensaje('mod_mensaje', 'error'); formatoValidoEditarProducto = false; }
		if ( ($('#mod_tipo').val().trim() == 'O' || $('#mod_tipo').val().trim() == 'A') && ( isNV('mod_descripcion') || isNV('mod_cant_min') || isNV('mod_p_costo') || isNV('mod_p_venta') || isNV('mod_iva') || isNV('mod_medida') || isNV('mod_descuento') ) ) { mostrarMensaje('mod_mensaje', 'error'); formatoValidoEditarProducto = false; }
		if (formatoValidoEditarProducto) {
			$.ajax({
				url: 'abm_profesors_3.php',
				data: $("#frm_editarproducto").serialize(),
				type: 'post',
				success: function(response){
					console.log('enviarEditarProducto: '+response);
					listadoProducto();
				}
			});
			mostrarMensaje('mod_mensaje');
		}
	}
}

function inicializarEditarProducto(){
	$('span.help-block').hide();
	$('#div_mod_p_venta').show();
	$('#div_mod_p_costo').show();
	if ($('#mod_tipo').val().trim() == 'P') {
		$('#div_mod_p_costo').hide(); $('#mod_p_costo').val(0); borrarFormato('mod_p_costo');
	}
	if ($('#mod_tipo').val().trim() == 'I'){
		$('#div_mod_p_venta').hide(); $('#mod_p_venta').val(0); borrarFormato('mod_p_venta');
	}
	$('#mod_tipo').focus();
}

function editar_profesor(id)
{
	$('#frm_editarproducto')[0].reset();

	var tipo_producto = $("#tipo_producto"+id).text()
	var descripcion_producto = $("#descripcion_producto"+id).text()
	var cantmin_producto = $("#cantmin_producto"+id).text()
	var precio_costo_producto = $("#precio_costo_producto"+id).text()
	var precio_venta_producto = $("#precio_venta_producto"+id).text()
	var iva_producto = $("#iva_producto"+id).text()
	var medida_producto = $("#medida_producto"+id).text()
	var descuento_producto = $("#descuento_producto"+id).text()

	console.log('id: '+id);
	console.log('tipo_producto: '+tipo_producto);
	console.log('descripcion_producto: '+descripcion_producto);
	console.log('cantmin_producto: '+cantmin_producto);
	console.log('precio_costo_producto: '+precio_costo_producto);
	console.log('precio_venta_producto: '+precio_venta_producto);
	console.log('iva_producto: '+iva_producto);
	console.log('medida_producto: '+medida_producto);
	console.log('descuento_producto: '+descuento_producto);

	$("#mod_id").val(id);
	$("#mod_descripcion").val(descripcion_producto);
	$("#mod_cant_min").val(cantmin_producto);
	$("#mod_p_costo").val(precio_costo_producto);
	$("#mod_p_venta").val(precio_venta_producto);
	$("#mod_descuento").val(descuento_producto);

	$('#mod_tipo option[value="P"]').removeAttr("selected");
	$('#mod_tipo option[value="I"]').removeAttr("selected");
	$('#mod_tipo option[value="A"]').removeAttr("selected");
	$('#mod_tipo option[value="O"]').removeAttr("selected");
	if (tipo_producto == 'Producto') $('#mod_tipo option[value="P"]').attr("selected", "selected");
	else if (tipo_producto == 'Insumo') $('#mod_tipo option[value="I"]').attr("selected", "selected");
	else if (tipo_producto == 'Ambos') $('#mod_tipo option[value="A"]').attr("selected", "selected");
	else $('#mod_tipo option[value="O"]').attr("selected", "selected");

	if (iva_producto == 21) $("#mod_ivaN").attr('checked', true);
	else if (iva_producto == 27) $("#mod_ivaA").attr('checked', true);
	else $("#mod_ivaR").attr('checked', true);

	if (medida_producto == 'Gramo') $("#mod_medidaG").attr('checked', true);
	else if (medida_producto == 'Unidad') $("#mod_medidaU").attr('checked', true);
	else $("#mod_medidaL").attr('checked', true);

	borrarFormato('mod_descripcion');
	borrarFormato('mod_cant_min');
	borrarFormato('mod_p_costo');
	borrarFormato('mod_p_venta');
	borrarFormato('mod_iva');
	borrarFormato('mod_medida');
	borrarFormato('mod_descuento');
	limpiarMensaje('mod_mensaje');

	inicializarEditarProducto();
}

function eliminar_profesor(id)
{
	console.log(id);
	if (confirm('Realmente deseas eliminar el producto seleccionada'+' (id='+id+')')) {
		$.ajax({
			url: 'abm_profesores_3.php',
			data: {id:id, accion:'Baja'},
			type: 'post',
			success: function(response){
				console.log('enviarBajaProducto: '+response);
				listadoProducto();
			}
		});
	}
}

