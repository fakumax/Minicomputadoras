<!-- //Modal Parte1 -->
  <div class="modal fade" id="cambiarClave" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Cambiar Contraseña</h4>
        </div>
        <div class="modal-body">
<!-- //Modal Parte1 -->

          <form class="form-horizontal" id="frm_cambiarclave" name="frm_cambiarclave" action="ajax/abm_personas_proc.php" method="post" enctype="application/x-www-form-urlencoded">

          <!-- //Mensajes -->
          <div id="mensaje_clave"></div>

          <!-- //Id -->
          <input type="hidden" id="cambiar_id" name="cambiar_id">

          <!-- div_cambiar_clave -->
          <div class="form-group" id="div_cambiar_clave">
          <label class="col-md-4 control-label" for="cambiar_clave">Contraseña:</label> 
          <div class="col-md-8">
          <input class="form-control" type="password" name="cambiar_clave" id="cambiar_clave" placeholder="Ingrese su Contraseña">
          <span class="help-block text-left"></span>
          </div>
          </div>

          <!-- div_cambiar_clave2 -->
          <div class="form-group" id="div_cambiar_clave2">
          <label class="col-md-4 control-label" for="cambiar_clave2">Repite contraseña:</label> 
          <div class="col-md-8">
          <input class="form-control" type="password" name="cambiar_clave2" id="cambiar_clave2" placeholder="Repita su Contraseña">
          <span class="help-block text-left"></span>
          </div>
          </div>

<!-- //Modal Parte2 --> 
        </div>
        <div class="modal-footer">
          <div class="form-group">
          <!-- btnEnviar -->
          <input class="btn btn-primary" type="button" name="enviar" id="cambiar_enviar" value="Cambiar Contraseña">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
<!-- //Modal Parte2 --> 
