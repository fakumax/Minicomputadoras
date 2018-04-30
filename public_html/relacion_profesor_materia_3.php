<?php
include("funciones.php");
conectar();

switch($_REQUEST['accion']) { 
	case "Listado":
		if ( isset($_REQUEST['accion2']) ){
			if ( $_REQUEST['accion2']=='Agregar' )
			{
				$precio_costo=0;
				$descuento=0;
				$cantidad=0;
				if ( isset($_REQUEST['id_insumo']) && !empty($_REQUEST['id_insumo']) ){$id_insumo=$_REQUEST['id_insumo'];}
				if ( isset($_REQUEST['id_producto']) && !empty($_REQUEST['id_producto']) ){$id_producto=$_REQUEST['id_producto'];}
				if ( isset($_REQUEST['cantidad']) && !empty($_REQUEST['cantidad']) ){$cantidad=$_REQUEST['cantidad'];}
				$insert_receta=consulta("INSERT INTO tbreceta (cantidad, fk_prod, fk_subp) VALUES ('$cantidad','$id_producto','$id_insumo')");
			}

			if ( $_REQUEST['accion2']=='Eliminar' )
			{
				if ( isset($_REQUEST['id']) && !empty($_REQUEST['id']) ){$id=intval($_REQUEST['id']);}
				$delete=consulta("DELETE FROM tbreceta WHERE pk_receta='".$id."'");
			}
		}
		$id_profesor = mysqli_real_escape_string($cn,(strip_tags($_REQUEST['id_profesor'], ENT_QUOTES)));

		$sql = "
		SELECT persona_id AS profesor_id, CONCAT(apellido, ', ', persona.nombre) AS profesor, materia_id, materia.nombre AS materia
		FROM persona_materia , persona, materia 
		WHERE persona.id = persona_id 
		AND materia.id = materia_id";
		$sTable = "tbreceta R";
		if ( !($id_profesor == "" || $id_profesor == 0) ) $sql .= " AND persona_id = $id_profesor";
		$sql .= " ORDER BY persona_id ASC";	
		$query =  consulta($sql);
		?>
		<div class="table-responsive">
			<table class="table table-hover table-condensed data-table">
				<thead>
				<tr>
					<th class='text-center'>PROFESOR</th>
					<th class='text-center'>MATERIA</th>
					<th class='text-center'>ACCIONES</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$color=0;
				$profesor_id=0;
				while ($row=traer_registro($query)){
					if ( $profesor_id <> intval($row["profesor_id"]) ) {$color++;}
					$profesor_id=$row["profesor_id"];
					$profesor=$row["profesor"];
					$materia_id=$row["materia_id"];
					$materia=$row["materia"];
					if($color % 2 == 0){
						?> <tr class="warning"> <?php 
					}else{
						?> <tr> <?php 
					}
					?>
						<td class='text-center'><?php echo $profesor;?></a></td>
						<td class='text-center'><?php echo $materia;?></td>
						<td class="text-center">
	          				<a href="#" class="btn btn-default btn-sm" title="Desvincular Materia" onclick="//eliminar('<?php echo $pk_receta;?>')"><i class="glyphicon glyphicon-trash"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
		    </table>
		</div>
		<?php //echo paginacion($pagina, $total_paginas);?>
		<?php
	break;


	case "fechas":
		$sql_fechas="SELECT DATE(MIN(fecha_hora)) AS fecha_desde, DATE(MAX(fecha_hora)) AS fecha_hasta FROM tbcaja";
		$row=traer_registro(consulta($sql_fechas));
        $fecha_desde=$row['fecha_desde'];
        $fecha_hasta=$row['fecha_hasta'];
		?>
	        <div class="form-group row">
	          <label for="fecha_desde" class="col-md-offset-1 col-md-2 control-label">Fecha Desde</label>
	          <div class="col-md-2">
	            <input type="text" class="form-control input-sm" id="fecha_desde" value="<?php echo $fecha_desde;?>">
	          </div>
	          <label for="fecha_hasta" class="col-md-2 control-label">Fecha Hasta</label>
	          <div class="col-md-2">
	            <input type="text" class="form-control input-sm" id="fecha_hasta" value="<?php echo $fecha_hasta;?>">
	          </div>
	          <button type="submit" class="col-md-offset-1 btn btn-default">
	            <span class="glyphicon glyphicon-search"></span> Buscar
	          </button>
	        </div>
        <?php 
	break;



	case "empleado":
		session_start(); 
		$sql_empleado=consulta("SELECT * FROM tbpersona WHERE tipo = 'E'");
		while ($rw=mysqli_fetch_array($sql_empleado)){
		$id_empleado=$rw["pk_persona"];
		$nombre_empleado=$rw["nombre"];
		if ($id_empleado==$_SESSION['usuario']) $selected="selected";
		else $selected="";
		?>
		<option value="<?php echo $id_empleado?>" <?php echo $selected;?>><?php echo $nombre_empleado?></option>
		<?php 
		}
	break;


	case "Persona":
		if (isset($_REQUEST['term']))/* Si está definida la variable donde se ingresan los digitos */
		{
		 	$return_arr = array();
			$fetch = consulta("SELECT pk_persona, dni_cuit, nombre, telefono, direccion, email FROM tbpersona WHERE nombre like '%" . mysqli_real_escape_string($cn,($_REQUEST['term'])) . "%' LIMIT 0 ,50");
			while ($row = traer_registro($fetch)) {
				$id_persona=$row['pk_persona'];
				$row_array['value']=$row['nombre'];
				$row_array['id_persona']=$row['pk_persona'];
				$row_array['nombre_persona']=$row['nombre'];
				$row_array['telefono_persona']=$row['telefono'];
				$row_array['direccion_persona']=$row['direccion'];
				$row_array['email_persona']=$row['email'];
				array_push($return_arr,$row_array);
			}
		 	echo json_encode($return_arr);
		}
	break;


	case "Productos":
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($cn,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('pk_prod', 'descripcion');//Columnas de busqueda
		 $sTable = "tbproducto";
		if ( $_REQUEST['q'] != "" )
		{
			$sWhere = "";
			$sWhere .= "WHERE ((tipo = 'I' OR tipo = 'A' OR tipo = 'O') AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= '))';
		}
		else
		{
			$sWhere = "WHERE (tipo = 'I' OR tipo = 'A' OR tipo = 'O')";
		}
		//paginacion($paginas, $tpaginas);
		$pagina = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //cuántos registros desea mostrar
		$offset = ($pagina - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query = consulta("SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= traer_registro($count_query);
		$numrows = $row['numrows'];
		$total_paginas = ceil($numrows/$per_page);
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query =  consulta($sql);
		//loop through fetched data
		if ($numrows>0){
  			//$res10 = consulta("SELECT pk_prod, descripcion, tipo, preciocosto, precioventa, fk_medida FROM tbproducto");
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th class='text-center'>Código</th>
					<th>Producto</th>
					<th><span class="pull-right">Proporción</span></th>
					<th class='text-center' style="width: 36px;">Agregar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_producto=$row['pk_prod'];
					$codigo_producto=$row['pk_prod'];
					$nombre_producto=$row['descripcion'];
					?>
					<tr>
						<td class='text-center'><?php echo $codigo_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td class='col-xs-1'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1">
						</div></td>
						<td class='text-center'><a class='btn btn-info' href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
					<?php echo paginacion($pagina, $total_paginas);?>
					</span></td>
				</tr>
			  </table>
			</div>

			<?php
		}
	break;


	case "Dinero":
	    //Variables por GET
	    $tipo=$_REQUEST['tipo'];
	    $id_empleado=intval($_REQUEST['id_empleado']);
	    $observacion=$_REQUEST['observacion'];
		// Toma la fecha y hora de Argentina
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$fecha_hora=date("Y-m-d H:i:s",time()); 
		//Grabar datos
		if ($tipo=='I'){
			$ingreso=$_REQUEST['importe'];
			$insert_caja=consulta("INSERT INTO tbcaja (tipo_operacion, fecha_hora, num_comprob, ingreso , egreso, observacion, fk_empleado) VALUES ('$tipo', '$fecha_hora', 7, $ingreso, NULL, '$observacion', $id_empleado)");
		}
	    if ($tipo=='E'){
			$egreso=$_REQUEST['importe'];
			$insert_caja=consulta("INSERT INTO tbcaja (tipo_operacion, fecha_hora, num_comprob, ingreso , egreso, observacion, fk_empleado) VALUES ('$tipo', '$fecha_hora', 7, NULL, $egreso, '$observacion', $id_empleado)");
	    }
		echo $insert_caja;
	break;


	case "Persona2":
		$id=$_REQUEST['id'];
		$sql = "
		SELECT  
		P.pk_persona AS pk_persona, 
		P.dni_cuit AS dni_cuit, 
		P.nombre AS nombre, 
		P.sexo AS sexo, 
		P.telefono AS telefono, 
		P.direccion AS direccion, 
		P.email AS email, 
		P.fechanac AS fechanac, 
		P.tipo AS tipo, 
		PRO.fk_empresa AS fk_empresa, 
		PRO.observ AS observ
		FROM tbpersona P
		LEFT JOIN tbproveedor PRO ON P.pk_persona=PRO.fk_persona
		WHERE P.pk_persona = '$id'
		ORDER BY P.pk_persona ASC";
		$jsondata = array();
		$tbpersona = consulta($sql); 
		while( $registro = $tbpersona->fetch_object() ) $jsondata[] = $registro;
		// $row=traer_registro(consulta($totales_cab));
		// $jsondata['pk_persona'] = $row['pk_persona'];
		// $jsondata['dni_cuit'] = $row['dni_cuit'];
		// $jsondata['nombre'] = $row['nombre'];
		// $jsondata['sexo'] = $row['sexo'];
		// $jsondata['telefono'] = $row['telefono'];
		// $jsondata['direccion'] = $row['direccion'];
		// $jsondata['email'] = $row['email'];
		// $jsondata['fechanac'] = $row['fechanac'];
		// $jsondata['tipo'] = $row['tipo'];
		// $jsondata['fk_empresa'] = $row['fk_empresa'];
		// $jsondata['observ'] = $row['observ'];
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata, JSON_FORCE_OBJECT);
	break;
}

desconectar();
?>