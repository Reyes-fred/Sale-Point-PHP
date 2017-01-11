<div id="container">
	<h1>Bienvenidos a las vacantes de la bolsa!</h1>

	<div class="container">
		<table class="table table-bordered">
		<tr class="success">
        <td class="lead">Descripcion</td>
      </tr>
          <?php foreach($detalle_Vacante->result() as $row) { ?>
          <tr class="success">
          	<td><?php echo $row->descripcion_larga;?></td>
          </tr>
          <?php }?>
      	</table>
	</div>
