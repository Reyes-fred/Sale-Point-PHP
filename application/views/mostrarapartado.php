
<div id="container" class="pull-left">

    <h3>Descripcion apartado</h3>
    <br>
		<table class="table table-bordered">
		<tr class="success">
        <td class="lead">Id venta</td>
        <td class="lead">Nombre</td>
        <td class="lead">Paterno</td>
        <td class="lead">Direccion</td>
       <td class="lead">Telefono</td>
       <td class="lead">Cantidad Abonada</td>
       <td class="lead">Total</td>
      </tr>
          <?php foreach($productos->result() as $row) { ?>
          <tr >
          	<td><?php echo $row->id_venta;?></td>
          	<td><?php echo $row->nombre;?></td>
          	<td><?php echo $row->paterno;?></td>
            <td><?php echo $row->direccion;?></td>
            <td><?php echo $row->telefono;?></td>
            <td><?php echo $row->cantidad;}?></td>
             <td> <?php 
$total=0;
foreach($productos->result() as $row) {
  $total=$total+$row->precio_venta*$row->unidades;}
echo $total;
  ?> </td>
          </tr>

         
      	</table>
<?php
     echo form_open('login/abonar');
     echo form_label('Abonar:');?>
     <input type="text" name="abono" value="<?php echo set_value('abono'); ?>"/>
     <input type="hidden" name="id_nota" value="<?php foreach($productos->result() as $row) {
      echo $row->id_venta;    } ?>"/>
      <input type="hidden" name="total" value="<?php echo $total; ?>"/>
<?php 
     echo form_submit(array('name'=>'submit','class'=>'btn btn-default'),'Aceptar'); 
     echo form_close();?>
	</div>

