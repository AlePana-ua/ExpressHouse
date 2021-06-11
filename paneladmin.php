<?php 
  session_start();

  // Titulo de la página
  $pageTitle = 'Panel de administrador'; 

  include 'header.php'; 
  include 'seguridadAdmin.php'
?>
<link href="css/admin.css" rel="stylesheet" type="text/css">
<aside class="sidebar">
  <nav>
    <ul>
      <h3>Administrador</h3>
      <li><a href="lista_usuarios.php">Usuarios</a></li>
      <li><a href="lista_anuncios.php">Anuncios</a></li>
      <li><a href="lista_denuncias.php">Denuncias</a></li>
      <li><a href="lista_resenyas.php">Reseñas</a></li>
    </ul>
  </nav>
</aside>
<?php include 'footer.php'; ?>
