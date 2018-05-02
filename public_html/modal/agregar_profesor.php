<!-- //Modal Parte1 -->
  <div class="modal fade" id="nuevoProfesor" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Agregar Profesor</h4>
        </div>
        <div class="modal-body">
<!-- //Modal Parte1 -->

          <form class="form-horizontal" id="frm_altaprofesor" name="frm_altaprofesor" action="#" method="post" enctype="application/x-www-form-urlencoded">

          <!-- //Mensajes -->
          <div id="mensaje"></div>

          <!-- //Accion -->
          <input type="hidden" name="accion" value="Alta">

          <!-- div_dni -->
          <div class="form-group" id="div_dni">
          <label class="col-md-3 control-label" for="dni">DNI(*):</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="dni" id="dni" placeholder="Ingrese su DNI" required>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_apellido -->
          <div class="form-group" id="div_apellido">
          <label class="col-md-3 control-label" for="apellido">Apellido(*):</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" required>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_nombre -->
          <div class="form-group" id="div_nombre">
          <label class="col-md-3 control-label" for="nombre">Nombre(*):</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" required>
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_telefono -->
          <div class="form-group" id="div_telefono">
          <label class="col-md-3 control-label" for="telefono">Teléfono:</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" name="telefono" id="telefono" autocomplete='tel-national' placeholder="Ingrese su teléfono">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_email -->
          <div class="form-group" id="div_email">
          <label class="col-md-3 control-label" for="email">Email:</label> 
          <div class="col-md-9">
          <input class="form-control" type="text" id="email" name="email" autocomplete='email' placeholder="Ingrese su email">
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