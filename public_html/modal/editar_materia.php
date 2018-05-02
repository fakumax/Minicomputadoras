<!-- //Modal Parte1 -->
  <div class="modal fade" id="editarMateria" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Editar Materia</h4>
        </div>
        <div class="modal-body">
<!-- //Modal Parte1 -->

          <form class="form-horizontal" id="frm_editarmateria" name="frm_editarmateria" action="#" method="post" enctype="application/x-www-form-urlencoded">

          <!-- //Mensajes -->
          <div id="mod_mensaje"></div>

          <!-- //Accion -->
          <input type="hidden" name="accion" value="Modificar">

          <!-- //Id -->
          <input type="hidden" id="mod_id" name="mod_id">

          <!-- div_mod_nombre -->
          <div class="form-group" id="div_mod_nombre">
          <label class="col-md-4 control-label" for="mod_nombre">Nombre(*):</label> 
          <div class="col-md-8">
          <input class="form-control" type="text" name="mod_nombre" id="mod_nombre" placeholder="Ingrese Nombre">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_descripcion -->
          <div class="form-group" id="div_mod_descripcion">
          <label class="col-md-4 control-label" for="mod_descripcion">Descripcion(*):</label> 
          <div class="col-md-8">
          <input class="form-control" type="text" name="mod_descripcion" id="mod_descripcion" placeholder="Ingrese Descripcion">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_anio -->
          <div class="form-group" id="div_mod_anio">
          <label class="col-md-4 control-label" for="mod_anio">Año(*):</label>
          <div class="col-md-8">
          <select class="form-control" name="mod_anio" id="mod_anio">
          <option value="1" id="mod_anio1" selected>Primero</option>
          <option value="2" id="mod_anio2">Segundo</option>
          <option value="3" id="mod_anio3">Tercero</option>
          </select>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_clave -->
          <div class="form-group" id="div_mod_clave">
          <label class="col-md-4 control-label" for="mod_clave">Clave:</label> 
          <div class="col-md-8">
          <input class="form-control" type="text" name="mod_clave" id="mod_clave" placeholder="Ingrese Clave">
          <span class="help-block text-left"></span>
          </div>
          </div>

<!-- //Modal Parte2 --> 
        </div>
        <div class="modal-footer">
          <div class="form-group">
          <!-- btnEnviar -->
          <input class="btn btn-primary" type="button" name="mod_enviar" id="mod_enviar" value="Actualizar datos">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- //Modal Parte2 --> 