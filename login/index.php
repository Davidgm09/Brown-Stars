<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<script type="text/javascript" src="../codi.js"></script>
</head>
<body>
	<?php
		if(isset($_REQUEST['complogin'])){
			$complogin = $_REQUEST['complogin'];
			echo "¡El usuario o la contraseña no son correctos!";
		}else {
			$complogin="";
		}
	?>
	<h1>Login</h1>
	<p class="mensaje" id="mensaje"></p>
	<form method="post" action="./services/login.proc.php" onsubmit="return login()">
		<input id="user" type="text" name="user" value='<?php echo $complogin ?>' placeholder="Inserta el usuario..." ><br/>
		<input id="password" type="password" name="password" placeholder="Inserta el password" ><br/><br/>
		<input type="submit" name="Enviar">
	</form>
</body>
</html>