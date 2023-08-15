<?php 
if (isset($_POST['NomeUser'])) { $p_NomeUser =  $_POST['NomeUser'];};
if (isset($_POST['senha'])) {$p_Senha = $_POST['senha'];};
if (isset($_POST['matricula'])) {$p_Matricula = $_POST['matricula'];};
if (isset($_POST['tipo_usuario'])) {$p_tipo_usuario = $_POST['tipo_usuario'];};


if($p_tipo_usuario == "Discente"){
    $sql ="INSERT INTO usuario (`Tipo_usuario`, `Nome_usuario`, `RMI`, `Matricula`, `Senha`) 
    VALUES ('$p_tipo_usuario', '$p_NomeUser', NULL, '$p_Matricula', '$p_Senha');";
}else{
    $sql ="INSERT INTO usuario (`Tipo_usuario`, `Nome_usuario`, `RMI`, `Matricula`, `Senha`) 
    VALUES ('$p_tipo_usuario', '$p_NomeUser', '$p_Matricula', NULL, '$p_Senha');";
}

include("conexao.php");

if ($conn->query($sql) === TRUE) {
    echo "<p>Dados inseridos com sucesso!</p>";
} else {
    echo "<p>Erro ao inserir os dados:</p>" . $conn->error;
}

$conn->close();

?>