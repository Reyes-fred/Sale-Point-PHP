
<div id="container" class="pull-left">
    <h3>Productos</h3>
    <h4>Id Nota: <?php foreach($productos->result() as $row) {echo $row->id_nota;break;}?> </h4>
    <h4>Fecha: <?php foreach($productos->result() as $row) {echo $row->fecha_compra;break;}?> </h4>
    <h4>Empleado: <?php foreach($productos->result() as $row) {echo $row->nombre."  "; echo $row->paterno; break;}?> </h4>
		<table class="table table-bordered">
		<tr class="success">
        <td class="lead">Id Producto</td>
        <td class="lead">Unidades</td>
        <td class="lead">Precio Vendido</td>
        <td class="lead">SubTotal</td>
      </tr>
          <?php foreach($productos->result() as $row) { ?>
          <tr class="success">
          	<td><?php echo $row->id_producto;?></td>
          	<td><?php echo $row->unidades;?></td>
            <td><?php echo $row->precio_venta;?></td>
            <td><?php echo $row->precio_venta*$row->unidades;?></td>
          </tr>
          <?php }?>
      	</table>
<h3>Total: 
<?php 
$total=0;
foreach($productos->result() as $row) {
  $total=$total+$row->precio_venta*$row->unidades;}
echo $total;
  ?>
</h3>

 <?php
     echo form_open('login/finalizarventa');
     echo form_label('Monto:');?>
     <input type="text" name="cantidad" value="<?php echo set_value('cantidad'); ?>"/>
     <input type="hidden" name="total" value="<?php echo $total;  ?>"/>
     <br>
<?php 
     echo form_submit(array('name'=>'submit','class'=>'btn btn-success','id'=>'input1'),'Finalizar Venta'); 
     echo form_close();
     ?>


      <?php
     echo form_open('login/ventaapartado');?>
      <input type="hidden" name="id_nota" value="<?php foreach($productos->result() as $row) {echo $row->id_nota;break;}?>"/>
     <?php
     echo form_submit(array('name'=>'submit','class'=>'btn btn-info','id'=>'input1'),'Apartar'); 
     echo form_close();?>

	</div>

