<?php
require 'Controladores//Extra//Cont_Extra.php';
require 'Controladores//Cont_Perfil_User.php';
?>
<!-- add/edit form modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Crear / Actualizar <i class="fa fa-user-circle-o" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Raquetas:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i>
              </div>
              <input type="number" class="form-control" id="raquetas" name="raquetas" placeholder="Ingrese la Cantidad" required="required" minLength="2" min="2">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Pelotas:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <input type="number" class="form-control" id="pelotas" name="pelotas" required="required" placeholder="Ingrese la Cantidad">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Uniformes:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <input type="number" class="form-control" id="uniformes" name="uniformes" required="required" placeholder="Ingrese la Cantidad">
            </div>
          </div>
          <!-- maxLength="10" minLength="10" -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Dia:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" id="dia" name="dia" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Titular de la Reserva:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <select name="cbx_campo" id="cbx_campo" class="form-control" aria-label="Default select example">
                <option value="0">Seleccionar Titular</option>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['titular_Reserva']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success" id="addButton">Enviar</button>
          <input type="hidden" name="action" value="adduser">
          <input type="hidden" name="userid" id="userid" value="">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add/edit form modal end -->