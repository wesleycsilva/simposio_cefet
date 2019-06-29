<?php
#TODO arrumar essa página
session_start("usuarios");

unset($_SESSION['idEscola']);
unset($_SESSION['nomeEscola']);
unset($_SESSION['codigoEscola']);
unset($_SESSION['descricaoEscola']);
unset($_SESSION['cnpjEscola']);
unset($_SESSION['bdHost']);
unset($_SESSION['bdBanco']);
unset($_SESSION['bdUser']);
unset($_SESSION['bdPassword']);
unset($_SESSION['logoEscola']);

unset($_SESSION['codigoUsuario']);
unset($_SESSION["nome"]);
unset($_SESSION["email"]);
unset($_SESSION["situacao"]);
unset($_SESSION["login"]);
unset($_SESSION["senha"]);
unset($_SESSION["idPerfil"]);
unset($_SESSION["primeiroNome"]);
session_destroy();
echo "<script>self.location = 'index.php' </script>";
