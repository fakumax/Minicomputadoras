$(document).ready(function() {
  $('.select2').select2();
});
//Funciones genericas
function nuevaVentana(theURL,winName='nuevaVentana',features='', myWidth='1024', myHeight='768', isCenter='true') {
	if(window.screen)if(isCenter)if(isCenter=="true"){
		var myLeft = (screen.width-myWidth)/2;
		var myTop = (screen.height-myHeight)/2;
		features+=(features!='')?',':'';
		features+=',left='+myLeft+',top='+myTop;
	}
	window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}
function borrarFormato(campo) {//Borrar formato del campo: borrarFormato('nombre');
	$('#'+campo).parent().parent().attr("class", "form-group");
	$('#'+campo).parent().children('span').text('').hide();
}
function formato(campo, msg = '') {//Formato de Error: formato('nombre', 'Ingrese algo'); y de Éxito: formato('nombre');
	if (msg) {
		$('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
		$('#'+campo).parent().children('span').text(msg).show();
	} else {
		$('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
		$('#'+campo).parent().children('span').text(msg).hide();
	}
}
function Icono(campo,tipo = 'ok') {//Icono Error: Icono('nombre', 'error'); y de Ok: Icono('nombre')
	if (tipo != 'ok') {
		$("#icono_"+campo).remove();
		$('#'+campo).parent().append("<span id='icono_"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
	} else {
		$("#icono_"+campo).remove();
		$('#'+campo).parent().append("<span id='icono_"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	}
}
function mostrarMensaje(campo, tipo='success') {//Mensaje Ok: mostrarMensaje('nombre'); y de Error: mostrarMensaje('nombre', 'error');
	var color, msg;
	if (tipo=='success')
		msg="<strong>¡Bien hecho!</strong> Los datos se grabaron correctamente.";
	else {
		tipo='danger';
		msg="<strong>¡Error!</strong> Los datos no se pudieron grabar, verifique los campos ingresados.";
	}

	//<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	var cerrar = document.createElement("a");
	cerrar.setAttribute('class', 'close');
	cerrar.setAttribute('data-dismiss', 'alert');
	cerrar.setAttribute('aria-label', 'close');
	cerrar.innerHTML = "&times;";

	//<div class="alert alert-success alert-dismissable fade in"></div>
	var mensajeAux = document.createElement("div");
	mensajeAux.setAttribute('class', 'alert alert-'+tipo+' alert-dismissable fade in');
	mensajeAux.innerHTML = msg;
	mensajeAux.appendChild(cerrar);

	//Elimina el mensaje anterior y agrega el nuevo
	limpiarMensaje(campo);
	document.getElementById(campo).appendChild(mensajeAux);
}
function mensaje(campo, mensaje, tipo='success') {//Mensaje Ok: mostrarMensaje('nombre'); y de Error: mostrarMensaje('nombre', 'error');
	var color, msg;

	if (tipo=='success')
		msg="<strong>¡Aviso!</strong> "+mensaje+".";
	else {
		msg="<strong>¡Error!</strong> "+mensaje+"."; tipo='danger';
	}

	//<div class="alert alert-success alert-dismissable fade in"></div>
	var mensajeAux = document.createElement("div");
	mensajeAux.setAttribute('class', 'alert alert-'+tipo+' alert-dismissable fade in');
	mensajeAux.innerHTML = msg;

	//Elimina el mensaje anterior y agrega el nuevo
	limpiarMensaje(campo);
	document.getElementById(campo).appendChild(mensajeAux);
}
function limpiarMensaje(campo) {//Limpiar mensaje: limpiarMensaje('mensaje');
	mensaje = document.getElementById(campo);
	while (mensaje.hasChildNodes()) mensaje.removeChild(mensaje.firstChild);
}
function campoValido(campo) {//Devuelve true si el campo esta correscto: campoValido('nombre')
	if ( $('#'+campo).parent().parent().hasClass('form-group has-success has-feedback') ) return true;
	else return false;
}
function campoNoValido(campo) {//Devuelve true si el campo no esta correscto: campoNoValido('nombre')
	if ( $('#'+campo).parent().parent().hasClass('form-group has-error has-feedback') ) return true;
	else return false;
}
function isNV(campo) {//Devuelve true si el campo no esta correscto: campoNoValido('nombre')
	if ( $('#'+campo).parent().parent().hasClass('form-group has-error has-feedback') ) return true;
	else return false;
}
function cargando(campo) {//Agrega imagen cargando ajax
	$('#'+campo).html('<img src="img/ajax-loader.gif"> Cargando...');
}
function formatoDataTable() {//Funciones formato data table
	$('.data-table').dataTable({
		//Con esto oculta la opcion de ordenar cuado tiene class="no-ordenar"
		"order": [],
		"columnDefs": [ {
			"targets"  : 'no-ordenar',
			"orderable": false,
		}],
	    	//Detalla las opciones de exportación de la tabla
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
					columns: [ 0, ':visible' ]
				}
			},
			{
				extend: 'csvHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excelHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				orientation: 'landscape',
				//pageSize: 'LEGAL',
				exportOptions: {
					columns: ':visible'
					//columns: [ 0, 1, 2, 5 ]
				}
			},
			//Opcion para ocultar columnas
			'colvis'
		],
		//Detalla la paginación de la tabla
		"lengthMenu": [[7,10, 25, 50, -1], [7, 10, 25, 50, "Todo"]]
	} );
}
function formatoDateTimePicker2(fecha_desde, fecha_hasta) {//Funciones formato data table
    $('.datetimepicker').datetimepicker({
      //https://uxsolutions.github.io/bootstrap-datepicker/
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      //forceParse: 0,
      format: "yyyy-mm-dd",
      startDate: fecha_desde,
      endDate: fecha_hasta,
      language: "es"
      });
}
function formatoDateTimePicker() {//Funciones formato data table
    $('.datetimepicker').datetimepicker({
      //https://uxsolutions.github.io/bootstrap-datepicker/
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      //forceParse: 0,
      format: "yyyy-mm-dd",
      orientation: "top right",
      language: "es"
      });
}
function radioIsChecked(nombre){
	var radio = $('[name='+nombre+']');
	for(var i=0; i<radio.length; i++) {
		if(radio[i].checked) {
			return true;
		}
	}
	return false;
}
function validarRadio(campo){
	var radio = $('[name='+campo+']');
	var seleccionado = false;
	for(var i=0; i<radio.length; i++) {
		if(radio[i].checked) {
			seleccionado = true;
		}
	}
	if (seleccionado) formato(campo);
	else formato(campo, 'El campo ingresado no es válido.');
}
function validarText(campo){
	var text = document.getElementById(campo).value;
	if ( text == null ||  text.length == 0 ) formato(campo, 'El campo ingresado no es válido.');
	else formato(campo);
}
function validarTextNum(campo){
	var text = document.getElementById(campo).value;
	if ( text == null ||  text.length == 0 || isNaN(text) ) formato(campo, 'El campo ingresado no es válido.');
	else formato(campo);
}