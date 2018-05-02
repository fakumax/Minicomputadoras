<!-- //Modal Parte1 -->
  <div class="modal fade" id="editarProfesor" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Editar Profesor</h4>
        </div>
        <div class="modal-body">
<!-- //Modal Parte1 -->

          <form class="form-horizontal" id="frm_editarprofesor" name="frm_editarprofesor" action="#" method="post" enctype="application/x-www-form-urlencoded">

          <!-- //Mensajes -->
          <div id="mod_mensaje"></div>

          <!-- //Accion -->
          <input type="hidden" name="accion" value="Modificar">

          <!-- //Id -->
          <input type="hidden" id="mod_id" name="mod_id">

          <!-- div_mod_dni -->
          <div class="form-group" id="div_mod_dni">
          <label class="col-md-3 control-label" for="mod_dni">DNI(*):</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="mod_dni" id="mod_dni" placeholder="Ingrese su DNI" required>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_apellido -->
          <div class="form-group" id="div_mod_apellido">
          <label class="col-md-3 control-label" for="mod_apellido">Apellido(*):</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="mod_apellido" id="mod_apellido" placeholder="Ingrese su apellido" required>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_nombre -->
          <div class="form-group" id="div_mod_nombre">
          <label class="col-md-3 control-label" for="mod_nombre">Nombre(*):</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="mod_nombre" id="mod_nombre" placeholder="Ingrese su nombre" required>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_telefono -->
          <div class="form-group" id="div_mod_telefono">
          <label class="col-md-3 control-label" for="mod_telefono">Teléfono:</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="mod_telefono" id="mod_telefono" autocomplete='tel-national' placeholder="Ingrese su teléfono">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_mod_email -->
          <div class="form-group" id="div_mod_email">
          <label class="col-md-3 control-label" for="mod_email">Email:</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" id="mod_email" name="mod_email" autocomplete='email' placeholder="Ingrese su email">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <div class="form-group">
          <div class="col-md-12">
          <span class="help-block text-center">(*) Campos obligatorios</span>
          </div>
          </div>

<!-- //Modal Parte2 --> 
        </div>
        <div class="modal-footer">
          <div class="form-group">
          <!-- btnEnviar -->
          <input class="btn btn-primary" type="button" name="mod_enviar" id="mod_enviar" value="Guargar datos">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- //Modal Parte2 --> 