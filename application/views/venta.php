
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
 </script>
 <script>
 var id,precio,cantidad;
 $(document).ready(function(){
 var cnt = 2;
 id = "'id_"+cnt+"'";
 precio = "'precio_"+cnt+"'";
 cantidad = "'cantidad_"+cnt+"'";
 
 $("#anc_add").click(function(){
 $('#tbl1 tr').last().after('<tr><td><input type="text" name="id_'+cnt+'" value="<?php echo set_value('id'); ?>"></td><td><input type="text" name="precio_'+cnt+'" value="<?php echo set_value('precio'); ?>"></td><td><input type="text" name="cantidad_'+cnt+'" value="<?php echo set_value('cantidad'); ?>"></td><td><input type="hidden" name="fila" value="'+cnt+'"></td></tr>');
 cnt++;
 });
 
$("#anc_rem").click(function(){
if($('#tbl1 tr').size()>1){
 $('#tbl1 tr:last-child').remove();
 }else{
 alert('One row should be present in table');
 }
 });
 
});
 </script>

<div id="container" class="pull-right">
    <br><br><br><br><br>
    <h3>Venta</h3>
    
 <?php
     echo form_open('login/venta');?>
 <table  id="tbl1" border="1" class="table table-bordered" >
 <tr class="success">
        <td >Id</td>
        <td >Precio</td>
        <td >Cantidad</td>
      </tr>
 <tr>
   <td ><input type="text" name="id_1" value="<?php echo set_value('id_1'); ?>"></td>
   <td><input type="text" name="precio_1" value="<?php echo set_value('precio_1'); ?>"></td>
   <td><input type="text" name="cantidad_1" value="<?php echo set_value('cantidad_1'); ?>"></td>
</tr>
 
</table>
<a href="javascript:void(0);" id='anc_add'>Agregar Producto</a>
 <a href="javascript:void(0);" id='anc_rem'>Eliminar Producto</a>
<?php 

     echo form_submit(array('name'=>'submit','class'=>'btn btn-default'),'Realizar Venta'); 
     echo form_close();?>
        
  </div>
