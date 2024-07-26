<?php 
$con = mysqli_connect("localhost", "root", "root", "Siace_Final");
$Codigo = mysqli_real_escape_string($con, $_POST["Codigo_de_verificacion"]);
$email = mysqli_real_escape_string($con, $_POST["email_de_verificacion"]);

$CollecUser = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email' and token = '$Codigo'");
if ($CollecUser->num_rows >= 1) {
	$update = mysqli_query($con, "UPDATE usuarios SET `confirmado` = 'si', `token` = NULL 
	WHERE (`token` = '$Codigo');");

	if($update){
		header("location: ../login.php");
	}else{
		echo "ocurrio un error";
	}
}else{
	echo "no jalo";
}

 ?>