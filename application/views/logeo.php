

<div id="container">
	<h1>Ingresa tus datos al sistema!</h1>

	<div id="container">
		<?php
			echo form_open('login/validaUsuario');
			echo form_error('username');
			echo form_label('Username:');
			<input type="text" name="Login" value="<?php echo set_value('Login');?>/>"
			<br/>
			<?php
			echo form_error()
		
	</div>

