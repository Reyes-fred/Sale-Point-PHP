
<div id="container" class="pull-left">
	<h1>Tienda Regalos Fredy</h1>
<br>
    <h3>Productos</h3>
		<table class="table table-bordered">
		<tr class="success">
        <td >Id</td>
        <td >Nombre</td>
        <td >Precio</td>
        <td >Cantidad en almacen</td>
       
      </tr>
          <?php foreach($productos->result() as $row) { ?>
          <tr >
          	<td><?php echo $row->id_producto;?></td>
          	<td><?php echo $row->nombre;?></td>
          	<td><?php echo $row->precio;?></td>
            <td><?php echo $row->stock;?></td>
            
          </tr>
          <?php }?>
      	</table>


	</div>

