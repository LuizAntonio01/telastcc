<?php 
if (isset($_POST['NomeUser'])) { $p_NomeUser = ucfirst($_POST['NomeUser']);};
if (isset($_POST['senha'])) {$p_Senha = $_POST['senha'];};
if (isset($_POST['matricula'])) {$p_Matricula = $_POST['matricula'];};
if (isset($_POST['tipo_usuario'])) {$p_tipo_usuario = $_POST['tipo_usuario'];};





if($p_tipo_usuario == "Discente"){
    $sql ="INSERT INTO usuario (`Tipo_usuario`, `Nome_usuario`, `RMI`, `Matricula`, `Senha`, `status`) 
    VALUES ('$p_tipo_usuario', '$p_NomeUser', NULL, '$p_Matricula', '$p_Senha', '1');";
}else{
    $sql ="INSERT INTO usuario (`Tipo_usuario`, `Nome_usuario`, `RMI`, `Matricula`, `Senha`, `status`) 
    VALUES ('$p_tipo_usuario', '$p_NomeUser', '$p_Matricula', NULL, '$p_Senha', '1');";
}

include("conexao.php");

if ($conn->query($sql) === TRUE) {
    echo "
                <script>
                alert ('Dados Inseridos Com Sucesso!!');
                window.location='./login_definitivo_aluno/index.php';
                </script>
                ";
} else {
    echo "
                <script>
                alert ('ERRO Na Inserção Dos Dados');
                window.location='./login_definitivo_aluno/index.php';
                </script>
                " . $conn->error;
}

$conn->close();

?>