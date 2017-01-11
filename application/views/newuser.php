<div id="container">
	<h1 id="titulo">Tienda de Regalos Fredy</h1>
     <h3>Nuevo Usuario</h3>
	<div class="container">
    <?php
     echo form_open('login/crearnuevoUsuario');
     echo form_label('Nombre:');?>
     <input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"/>
     <br>

     <?php
     echo form_label('Apellido Paterno:');?>
     <input type="text" name="paterno" value="<?php echo set_value('paterno'); ?>"/>
     <br>
     
     <?php
     echo form_label('Apellido Materno:');?>
     <input type="text" name="materno" value="<?php echo set_value('materno'); ?>"/>
     <br>
     
     <?php
     echo form_label('Fecha de Nacimiento:');?>
     <input type="date" name="fecha_nac" value="<?php echo set_value('fecha'); ?>"/>
     <br>
     
     <?php
     echo form_label('Sexo:');?>
     <input type="text" name="sexo" value="<?php echo set_value('sexo'); ?>"/>
     <br>
     
     <?php
     echo form_label('Login:');?>
     <input type="text" name="login" value="<?php echo set_value('login'); ?>"/>
     <br>
     <?php
     echo form_label('Password:');?>
     <input type="password" name="password" value="<?php echo set_value('password'); ?>"/>
     <br><br><br>
     <?php 
     echo form_submit(array('name'=>'submit','class'=>'btn btn-danger'),'Cancelar'); 
     echo form_submit(array('name'=>'submit','class'=>'btn btn-success'),'Aceptar'); 
     echo form_close();?>
     </div>