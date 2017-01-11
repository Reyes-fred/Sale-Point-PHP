<div id="container">
	
     <h3>Ingresa el numero de folio de venta</h3>
	<div class="container">
    <?php
     echo form_open('login/buscarapartado');
     echo form_label('Folio:');?>
     <input type="text" name="id_nota" value="<?php echo set_value('id_nota'); ?>"/>
     <br>
<br>
     <?php 
     echo form_submit(array('name'=>'submit','class'=>'btn btn-success','id'=>'input2'),'Buscar'); 
     echo form_close();?>
     </div>