<!-- //Modal Parte1 -->
  <div class="modal fade" id="nuevaMateria" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Agregar Materia</h4>
        </div>
        <div class="modal-body">
<!-- //Modal Parte1 -->

          <form class="form-horizontal" id="frm_altamateria" name="frm_altamateria" action="#" method="post" enctype="application/x-www-form-urlencoded">

          <!-- //Mensajes -->
          <div id="mensaje"></div>

          <!-- //Accion -->
          <input type="hidden" name="accion" value="Alta">

          <!-- div_nombre -->
          <div class="form-group" id="div_nombre">
          <label class="col-md-4 control-label" for="nombre">Nombre(*):</label> 
          <div class="col-md-8">
          <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_descripcion -->
          <div class="form-group" id="div_descripcion">
          <label class="col-md-4 control-label" for="descripcion">Descripcion(*):</label> 
          <div class="col-md-8">
          <input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Ingrese Descripcion">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_anio -->
          <div class="form-group" id="div_anio">
          <label class="col-md-4 control-label" for="anio">Año(*):</label>
          <div class="col-md-8">
          <select class="form-control" name="anio" id="anio">
          <option value="1" id="anio1" selected>Primero</option>
          <option value="2" id="anio2">Segundo</option>
          <option value="3" id="anio3">Tercero</option>
          </select>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_clave -->
          <div class="form-group" id="div_clave">
          <label class="col-md-4 control-label" for="clave">Clave:</label> 
          <div class="col-md-8">
          <input class="form-control" type="text" name="clave" id="clave" placeholder="Ingrese Clave">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <div class="form-group" id="div_ayuda">
          <div class="col-md-12">
          <span class="help-block text-center">(*) Campos obligatorios</span>
          </div>
          </div>
          
<!-- //Modal Parte2 --> 
        </div>
        <div class="modal-footer">
          <div class="form-group">
          <!-- btnLimpiar -->
          <input class="btn btn-danger" type="button" name="limpiar" id="limpiar" value="Limpiar">
          <!-- btnEnviar -->
          <input class="btn btn-primary" type="button" name="enviar" id="enviar" value="Guargar datos">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- //Modal Parte2 --> 