<?php
    session_start();

    $_SESSION['usuario']=false;
    $_SESSION['passwd']=false;
    $_SESSION['admin']=false;
    header("location: index.php");
?>