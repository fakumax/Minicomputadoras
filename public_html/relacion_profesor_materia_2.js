$(document).on('ready', inicio);

function inicio(){
	listado();
	// $('#producto').on('change', function()	{
	// 	listado();
	// });
}

function listado(page=1)
{
	var id_profesor = $('#profesor').val().trim();
	$.ajax({
		url:'relacion_profesor_materia_3.php?accion=Listado&page='+page+'&id_profesor='+id_profesor,
		beforeSend: cargando('resultado'),
		success:function(datos){
			$("#resultados").html(datos);
			formatoDataTable();
		}
	})
	//load();
}
function load(page=1)
{
	var q= $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'relacion_profesor_materia_3.php?accion=Productos&page='+page+'&q='+q,
		beforeSend: cargando('loader'),
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
		}
	})
}

function agregar (id)
{
	var cantidad=document.getElementById('cantidad_'+id).value;
	var id_producto = $('#producto').val().trim();
	//Inicia validacion
	if (isNaN(cantidad))
	{
		alert('Esto no es un numero');
		document.getElementById('cantidad_'+id).focus();
		return false;
	}
	if (parseInt(id_producto) == 0)
	{
		alert('Debe seleccionar un producto, para agregar insumos');
		document.getElementById('producto').focus();
		return false;
	}
	//Fin validacion
	$.ajax({
		url: "abm_recetas_3.php?accion=Listado&accion2=Agregar",
		data: "id_insumo="+id+"&id_producto="+id_producto+"&cantidad="+cantidad,
		beforeSend: cargando('resultado'),
		success:function(datos){
			$("#resultados").html(datos);
			formatoDataTable();
		}
	});
}

function eliminar (id)
{
	var id_producto = $('#producto').val().trim();
	$.ajax({
		url: "abm_recetas_3.php?accion=Listado&accion2=Eliminar&id="+id+"&id_producto="+id_producto,
		beforeSend: cargando('resultado'),
		success:function(datos){
			$("#resultados").html(datos);
			formatoDataTable();
		}
	});
}
