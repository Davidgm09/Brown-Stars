<?php
include "./connection.php";

$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];
$encript = md5($pass);

$queryid = "SELECT id_usuario FROM usuarios WHERE nom_usu='$user'";
$resultid = mysqli_query($conn,$queryid);
$rowid = mysqli_fetch_array($resultid);
$iduser = $rowid['id_usuario'];
$complogin = $user;

//Entra si está configurada la variable del formulario del login
if(isset($_REQUEST['user'])){

	$query = "SELECT * FROM usuarios WHERE nom_usu='$user' AND pass_usu='$pass'";

	$result = mysqli_query($conn,$query);
	//La variable $result debería de tener como mínimo un registro coincidente
	if(!empty($result) && mysqli_num_rows($result)==1){
		$row = mysqli_fetch_array($result);
		//Creo una nueva sesión y defino $_SESSION['nombre']
		session_start();
		$_SESSION['nombre']=$user;
		//Voy a mi sitio personal
		header("Location: ../../home.php?variableid=".$iduser);
	}else{
		//Ha fallado la autenticación vuelvo a index.php
		header("Location: ../index.php?complogin=".$complogin);
	}
//Si no está configurada la variable del formulario del login vuelve al index.php
}else{
	header("Location: ../index.php?complogin=".$complogin);
}	
?>