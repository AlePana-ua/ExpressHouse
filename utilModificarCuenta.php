<?php 
session_start();



include_once "conexionBD.inc";

$nombre = $_POST['first_name'];
$apellidos = $_POST['last_name'];
$email = $_POST['email'];
$tlf=strval($_POST['phone']);
$pwd = $_POST['password'];
/*Recogemos el contenido del fichero*/

/*Hacer un if/else para las pwd*/
$image = addslashes($_FILES['imagen']['tmp_name']);
$name = addslashes($_FILES['imagen']['name']);
$image = file_get_contents($image);
$image = base64_encode($image);


$idBuscar = $_SESSION['usuario'];
$queryID = $link ->query("SELECT id_user FROM Usuario WHERE correo = '".$idBuscar."' "); /*ESTA FUNCIONA HAY QUE VER SI SE HACE LOGOUT, UNA VEZ SE CAMBIA EL CORREO PETA EL SESSION*/
$row = mysqli_fetch_array($queryID);
$query= $link ->query("UPDATE  Usuario SET  nombre ='".$nombre."', apellido = '".$apellidos."', correo = '".$email."', telefono = '".$tlf."', contrasenya = '".$pwd."', foto='".$image."' WHERE id_user = '".$row[0]."' ");
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

