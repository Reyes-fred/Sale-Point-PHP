<div id="container">
	<h1>Tienda de Regalos Fredy</h1>
     <h3>Nuevo Usuario</h3>
	<div class="container">
    <?php
     echo form_open('login/apartado');
     echo form_label('Nombre:');?>
     <input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"/>
     <br>

     <?php
     echo form_label('Apellido Paterno:');?>
     <input type="text" name="paterno" value="<?php echo set_value('paterno'); ?>"/>
     <br>
     
     
     <?php
     echo form_label('Dirección:');?>
     <input type="text" name="direccion" value="<?php echo set_value('direccion'); ?>"/>
     <br>
     
     <?php
     echo form_label('Telefono:');?>
     <input type="text" name="telefono" value="<?php echo set_value('telefono'); ?>"/>
     <br>
     
     <?php
     echo form_label('Cantidad:');?>
     <input type="text" name="cantidad" value="<?php echo set_value('cantidad'); ?>"/>
     <br>
     <input type="hidden" name="id_nota" value="<?php echo $idnota; ?>"/>
     <?php 
     echo form_submit(array('name'=>'submit','class'=>'btn btn-default'),'Aceptar'); 
     echo form_close();?>
     </div>