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
$image = addslashes($_FILES['imagen']['tmp_name']);
$name = addslashes($_FILES['imagen']['name']);
$image = file_get_contents($image);
$image = base64_encode($image);


$idBuscar = $_SESSION['usuario'];
$queryID = $link ->query("SELECT id_user FROM Usuario WHERE correo = '".$idBuscar."' "); 
$row = mysqli_fetch_array($queryID);
$query= $link ->query("UPDATE  Usuario SET  nombre ='".$nombre."', apellido = '".$apellidos."', correo = '".$email."', telefono = '".$tlf."', contrasenya = '".$encryptPasswd."', foto='".$image."' WHERE id_user = '".$row[0]."' ");
$_SESSION["usuario"] = $email;
if(!$query)
	$_SESSION['ok2']=0;
else
	$_SESSION['ok2']=1;
?>

<div>
<a></a>
<a href="cuenta.php">volver al perfil</a>
</div>

