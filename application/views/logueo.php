<div class="container">
	
     <center><h2 id="titulo">Punto de Venta Regalos Fredy</h2></center>
	<br><br><br><br>
     
     <div id="vecentro">
    <?php
     echo form_open('login/validaUsuario');
     echo form_error('login');?>
     <label>Usuario</label>
     <input type="text" name="login" value="<?php echo set_value('login'); ?>"/>
     <br><br>
     <?php 
     echo form_error('password');
     ?>
     <label>Contraseña</label>
     <?php
     echo form_input(array('name'=>'password','type'=>'password')).'<br/>';
     echo "<br>";
     echo form_submit(array('name'=>'submit','class'=>'btn btn-success' ,'id'=>'input1'),'Autentificar'); 
     echo form_close();?>
     </div>
     <br>
     <div id="vecentro">
     <?php
     echo form_open('login/nuevoUsuario');
     echo form_submit(array('name'=>'submit','class'=>'btn btn-info' ,'id'=>'input1'),'Nuevo Usuario'); 
	echo form_close();?>
     </div>
     
</div>