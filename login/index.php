<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<script type="text/javascript" src="validacion_login.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

</head>
<body>

	<div class="login-content">
		<div class="ventana-login">
		
		
		<form class="login-form" method="post" action="./services/login.proc.php" onsubmit="return login()">
			<div class="avatar">
				<img src="../img/img/avatar1.png" class="avatar-img">
			</div>

			<p class="mensaje" id="mensaje"></p>

			<?php
			if(isset($_REQUEST['complogin'])){
				$complogin = $_REQUEST['complogin'];
			}else {
				$complogin="";
			}
		?>

			<label class="label-form">Email</label>
			<input class="input-form" id="user" type="text" name="user" value='<?php echo $complogin ?>' placeholder="Inserta el usuario..." ><br/>
			<label class="label-form">Password</label>
			<input class="input-form" id="password" type="password" name="password" placeholder="Inserta el password..." ><br/><br/>
			<div align="center">
			<?php
			if(isset($_REQUEST['complogin'])){
				echo "¡El usuario o la contraseña no son correctos!";
				echo "<br>";
				echo "<br>";
			}
		?>
			</div>
			<input class="sumb-form" type="submit" name="Enviar">
		</form>
		</div>
	</div>
</body>
</html>