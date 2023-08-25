<?php 
include("./sessao.php");
unlink($_SESSION['caminho_imagem']);
session_unset();
session_destroy();
header('Location: http://localhost/telastcc/login_definitivo_aluno/index.php');
exit();
?>