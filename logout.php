<?php 
include("./sessao.php");
unlink($_SESSION['caminho_imagem']);
session_unset();
session_destroy();
header('Location: http://192.168.0.104:8080/telastcc/login_definitivo_aluno/index.php');
exit();
?>