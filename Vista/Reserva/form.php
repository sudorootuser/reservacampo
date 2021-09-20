<?php require 'Controladores//Reserva//Cont_Campo.php';
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
            <label for="recipient-name" class="col-form-label">Titular de la Reserva:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" id="username" name="username" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de la Reserva:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" id="email" name="email" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Télefono del Titular:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <input type="phone" class="form-control" id="phone" name="phone" required="required" maxLength="10" minLength="10">
            </div>
          </div>
          <!-- maxLength="10" minLength="10" -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email del Titular:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <input type="email" class="form-control" id="email2" name="email2" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cancha:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </div>
              <select name="cbx_campo" id="cbx_campo" class="form-control" aria-label="Default select example">
                <option value="0">Seleccionar Cancha</option>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_Campo']; ?></option>
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