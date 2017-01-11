<div id="container">
	<h1>Bienvenidos a las vacantes de la bolsa!</h1>

	<div class="container">
		<table class="table table-bordered">
		<tr class="success">
        <td class="lead">Salario</td>
        <td class="lead">Horario</td>
        <td class="lead">Descripción corta</td>
      </tr>
          <?php foreach($vacantes->result() as $row) { ?>
          <tr class="success">
          	<td><?php echo $row->salario;?></td>
          	<td><?php echo $row->horario;?></td>
          	<td><?php echo $row->descripcion_corta;?></td>
          </tr>
          <?php }?>
      	</table>
	</div>
