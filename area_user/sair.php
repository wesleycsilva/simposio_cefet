<?php
#TODO arrumar essa página
session_start();

$_SESSION['idSimposista'];
$_SESSION['email'];
$_SESSION['nome'];
$_SESSION['controle'];
session_destroy();
echo "<script>self.location = '../index.php' </script>";
