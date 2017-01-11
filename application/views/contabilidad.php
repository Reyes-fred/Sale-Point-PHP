
<div id="container" >
	
    <h3>Ganancia total hasta el presente mes</h3>
		<table class="table table-bordered">
		<tr class="success">
        <td class="lead">Id Nota</td>
        <td class="lead">Fecha</td>
        <td class="lead">Total</td>
      </tr>
          <?php foreach($productos->result() as $row) { ?>
          <tr class="success">
          	<td><?php echo $row->id_notas;?></td>
          	<td><?php echo $row->fecha_compra;?></td>
          	<td><?php echo $row->ganancia;?></td>
          </tr>
          <?php }?>
      	</table>
	</div>

