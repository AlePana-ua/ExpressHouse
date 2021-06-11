<?php 
session_start();

include_once "conexionBD.inc";

$nombre = $_POST['first_name'];
$apellidos = $_POST['last_name'];
$email = $_POST['email'];
$tlf=strval($_POST['phone']);
$pwd = $_POST['password'];


$encryptPasswd = password_hash($pwd, PASSWORD_DEFAULT,[10]);
/*Recogemos el contenido del fichero*/

/*Hacer un if/else para las pwd*/

if($_FILES['imagen']['size'] != 0){
	$image = addslashes($_FILES['imagen']['tmp_name']);
	$name = addslashes($_FILES['imagen']['name']);
	$image = file_get_contents($image);
	$image = base64_encode($image);
}else{
	$image = null;
}



$idBuscar = $_SESSION['usuario'];
$queryID = $link ->query("SELECT id_user,contrasenya FROM Usuario WHERE correo = '".$idBuscar."' "); 
$query = "UPDATE Usuario SET  nombre ='".$nombre."', apellido = '".$apellidos."', correo = '".$email."', telefono = '".$tlf."'" ;

$row = mysqli_fetch_array($queryID);

if($pwd != $row["contrasenya"]  && $image == null) {
	$query .= ", contrasenya = '".$pwd."'";
}else if($pwd == $row["contrasenya"]  && $image != null){
	$query .= ", foto = '".$image."'";
}else if ($pwd != $row["contrasenya"]  && $image != null){
	$query .= ", contrasenya = '".$pwd."', foto = '".$image."'" ;
}
$query .= " WHERE id_user = '".$row[0]."'; ";
if($queryID = $link ->query($query)){
	echo "Todo ok";
	$_SESSION["usuario"] = $email;
}else{
	echo $link->error;
} 

?>

<div>
<a></a>
<a href="cuenta.php">volver al perfil</a>
</div>