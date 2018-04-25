<?php
include("funciones.php");
conectar();

switch($_REQUEST['accion']) { 
	case "Listado":
		$tbproducto = consulta("SELECT pk_prod, descripcion, tipo, IFNULL(preciocosto,0) AS preciocosto, IFNULL(precioventa,0) AS precioventa, iva, IFNULL(descuento,0) AS descuento, IFNULL(cantidad,0) AS cantidad, IFNULL(cantmin,0) AS cantmin, fk_medida FROM tbproducto");
		?>
		<div class="table-responsive">
		  <table class="table table-hover table-condensed text-center data-table">
		    <thead>
		      <tr>
		        <th class="text-center">Id</th>
		        <th class="text-center">Descripción</th>
		        <th class="text-center">Tipo</th>
		        <th class="text-center">P. Costo</th>
		        <th class="text-center">P. Venta</th>
		        <th class="text-center">Iva</th>
 		        <th class="text-center">Descuento</th> 
		        <th class="text-center">Cantidad</th>
		        <th class="text-center">C. Mínima</th>
		        <th class="text-center">Medida</th>
		        <th class="text-center no-ordenar">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php while ($regg = traer_registro($tbproducto)){ 
		        $id = $regg['pk_prod'];
		        $p_costo =$regg['preciocosto'];
		        $p_venta =$regg['precioventa'];
		        $cantidad =$regg['cantidad'];
		        $descuento =$regg['descuento'];
                    if ($regg['fk_medida']=="G") {$medida="Gramo";}
                elseif ($regg['fk_medida']=="L") {$medida="Litro";}
                elseif ($regg['fk_medida']=="U") {$medida="Unidad";}
                    if ($regg['tipo']=="P"){$tipo="Producto"; $color="success";}
                elseif ($regg['tipo']=="I"){$tipo="Insumo"; $color="primary";}
                elseif ($regg['tipo']=="A"){$tipo="Ambos"; $color="info";}
                elseif ($regg['tipo']=="O"){$tipo="Otro"; $color="warning";}
		        ?>
		        <tr>
		          <td><?php echo $id;?></td>
		          <td id="descripcion_producto<?php echo $id;?>"><a href="abm_recetas.php?prod=<?php echo $id;?>"><?php echo $regg['descripcion'];?></a></td>
		          <td id="tipo_producto<?php echo $id;?>"><span class='label label-<?php echo $color;?>'><?php echo $tipo;?></span></td>
		          <td id="precio_costo_producto<?php echo $id;?>"><?php echo $p_costo;?></td>
		          <td id="precio_venta_producto<?php echo $id;?>"><?php echo $p_venta;?></td>
		          <td id="iva_producto<?php echo $id;?>"><?php echo $regg['iva'];?></td>
 		          <td id="descuento_producto<?php echo $id;?>"><?php echo $descuento;?></td> 
		          <td id="cantidad_producto<?php echo $id;?>"><?php echo $cantidad;?></td>
		          <td id="cantmin_producto<?php echo $id;?>"><a href="pedido_de_insumos.php"><?php echo $regg['cantmin'];?></a></td>
		          <td id="medida_producto<?php echo $id;?>"><?php echo $medida;?></td>
		          <td>
		          <span>
		          <!--Botón Editar persona-->
		          <a href="#" class="btn btn-default btn-sm" title="Editar producto" onclick="editar_producto('<?php echo $id;?>');" data-toggle="modal" data-target="#editarProducto"><i class="glyphicon glyphicon-edit"></i></a>
		          <!--Botón Borrar persona-->
		          <a href="#" class="btn btn-default btn-sm" title="Borrar producto" onclick="eliminar_producto('<?php echo $id;?>')"><i class="glyphicon glyphicon-trash"></i></a>
		          </span>
		          </td>
		        </tr>
		      <?php } ?>
		    </tbody>
		  </table>
		</div>
		<?php
	break;


	case "Alta":
		$id_prod = ultimo_id('pk_prod', 'tbproducto') + 1;
		$tipo=$_REQUEST['tipo'];
		$p_costo=$_REQUEST['p_costo'];
		$p_venta=$_REQUEST['p_venta'];
		if ($_REQUEST['iva'] == 'N') $iva=21.0;
		if ($_REQUEST['iva'] == 'R') $iva=17.5;
		if ($_REQUEST['iva'] == 'A') $iva=27.0;
		$cant_min=$_REQUEST['cant_min'];
		$medida=$_REQUEST['medida'];
		$descripcion=$_REQUEST['descripcion'];

		if ($tipo=='P') {
			$agregarProducto = "INSERT INTO tbproducto (pk_prod, descripcion, tipo, preciocosto, precioventa, iva, cantmin, fk_medida) VALUES ($id_prod, '$descripcion', '$tipo', 0, $p_venta, $iva, $cant_min, '$medida')";
		}
		else if ($tipo=='P') {
			$agregarProducto = "INSERT INTO tbproducto (pk_prod, descripcion, tipo, preciocosto, precioventa, iva, cantmin, fk_medida) VALUES ($id_prod, '$descripcion', '$tipo', $p_costo, 0, $iva, $cant_min, '$medida')";
		}
		else{
			$agregarProducto = "INSERT INTO tbproducto (pk_prod, descripcion, tipo, preciocosto, precioventa, iva, cantmin, fk_medida) VALUES ($id_prod, '$descripcion', '$tipo', $p_costo, $p_venta, $iva, $cant_min, '$medida')";
		}

		if (consulta($agregarProducto) === TRUE) {
			echo "INSERT INTO tbproducto id = '$id_prod'\n";
			$insert_receta=consulta("INSERT INTO tbreceta (cantidad, fk_prod, fk_subp) VALUES (1,$id_prod,$id_prod)");
		}
		else echo "Error INSERT INTO tbproducto id = '$id_prod'\n";
	break;


	case "Modificar":
		$id_prod = $_REQUEST['mod_id'];
		$tipo=$_REQUEST['mod_tipo'];
		$p_costo=$_REQUEST['mod_p_costo'];
		$p_venta=$_REQUEST['mod_p_venta'];
		if ($_REQUEST['mod_iva'] == 'N') $iva=21.0;
		if ($_REQUEST['mod_iva'] == 'R') $iva=17.5;
		if ($_REQUEST['mod_iva'] == 'A') $iva=27.0;
		$cant_min=$_REQUEST['mod_cant_min'];
		$medida=$_REQUEST['mod_medida'];
		$descripcion=$_REQUEST['mod_descripcion'];
		$descuento=$_REQUEST['mod_descuento'];
		
		$modificarProducto = "UPDATE tbproducto SET descripcion = '$descripcion', tipo = '$tipo', preciocosto = $p_costo, precioventa = $p_venta, iva = $iva, cantmin = $cant_min, descuento = $descuento, fk_medida = '$medida' WHERE pk_prod = '$id_prod'";
		if (consulta($modificarProducto) === TRUE) echo "UPDATE tbproducto id = '$id_prod'\n";
		else echo "Error UPDATE tbproducto id = '$id_prod'\n";
	break;


	case "Baja":
		$id = $_REQUEST['id'];
		$eliminarProducto = "DELETE FROM tbproducto WHERE pk_prod = $id";
		if (consulta($eliminarProducto) === TRUE)
			echo "DELETE FROM tbproducto id = '$id'\n";
		else echo "Error DELETE FROM tbproducto id = '$id'\n";	
	break;


	case "Cargo":
		?><!--Listado de opciones select cargo-->
		<option value="" selected>Seleccione una opción</option>
		<?php 
		$tbcargo = consulta("SELECT pk_cargo, cargo, sueldobasico FROM tbcargo");
		while ( $regg = traer_registro($tbcargo) ) 
		{ ?><option value="<?php echo $regg['pk_cargo'];?>"><?php echo $regg['cargo'];?></option><?php }
	break;


	case "Empresa":
		?><!--Listado de opciones select empresa-->
		<option value="" selected>Seleccione una opción</option>
		<?php 
		$tbempresa = consulta("SELECT pk_empresa, razonsocial, cuit, telefono FROM tbempresa");
		while ($regg = traer_registro($tbempresa)) 
		{ ?><option value="<?php echo $regg['pk_empresa'];?>"><?php echo $regg['razonsocial'];?></option><?php 
		}
	break;


	case "JSON":
		$sql = "SELECT  P.pk_persona, P.dni_cuit, P.nombre, P.sexo, P.telefono, P.direccion, P.email, P.fechanac, P.tipo, 
		                E.fecha_ingreso, E.fk_cargo, 
		                PRO.fk_empresa, PRO.observ 
		        FROM (tbpersona P 
		        LEFT JOIN tbempleado E ON P.pk_persona=E.fk_persona) 
		        LEFT JOIN tbproveedor PRO ON P.pk_persona=PRO.fk_persona 
		        ORDER BY P.pk_persona ASC";
		$tbpersona = consulta($sql); $jsondata = array();
		while( $registro = $tbpersona->fetch_object() ) $jsondata[] = $registro;
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata, JSON_FORCE_OBJECT);
	break;
}

desconectar();
?>