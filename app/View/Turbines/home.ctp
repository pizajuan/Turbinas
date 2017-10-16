<table class="highlight">
  <thead>
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Creada</th>
        <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($turbines as $turbine) :?>
      <tr>
        <td><?php echo $turbine['Turbina']['name']; ?></td>
        <td><?php echo $turbine['Turbina']['type']; ?></td>
        <td><?php echo date('d/m/Y',strtotime($turbine['Turbina']['created_at']));?></td>
        <td>
          <form method="post" action="turbines/deleteTurbine" style="display:inline-block;">
            <input type="hidden" name="id" value="<?php echo $turbine['Turbina']['id']; ?>"/>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          </form>
          
          <a class="waves-effect waves-light btn modal-trigger openEditModal" href="#modal2" data-id="<?php echo $turbine['Turbina']['id']; ?>" data-name="<?php echo $turbine['Turbina']['name']; ?>" data-type="<?php echo $turbine['Turbina']['type']; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
          
          
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="modal1" class="modal">
  <form action="turbines/saveTurbine" method="post">
  <div class="modal-content">
    <h4>Nueva Turbina</h4>
      Nombre de Turbina:<br>
      <input type="text" name="name"><br>
      Tipo de Turbina:<br>
      <input type="text" name="type"><br><br>
  </div>
  <div class="modal-footer">
    <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Guardar">
    <input type="button" class="modal-action modal-close waves-effect waves-green btn-flat " value="Cancelar">
  </div>
  </form>
</div>

<div id="modal2" class="modal">
  <form action="turbines/editTurbine" method="post">
  <div class="modal-content">
    <h4>Modificar Turbina</h4>
      <input type="hidden" name="id" id="editId">
      Nombre de Turbina:<br>
      <input type="text" name="name" id="editName"><br>
      Tipo de Turbina:<br>
      <input type="text" name="type" id="editType"><br><br>
  </div>
  <div class="modal-footer">
    <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Guardar">
    <input type="button" class="modal-action modal-close waves-effect waves-green btn-flat " value="Cancelar">
  </div>
  </form>
</div>