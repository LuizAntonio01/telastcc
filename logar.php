<?php
require_once './sessao.php';
include("./conexao.php");

$p_NomeUser = $_POST['NomeUser'] ?? NULL;
$p_senha = $_POST['senha'] ?? NULL;


$p_tipo_usuario = "SELECT Tipo_usuario FROM usuario WHERE Nome_usuario = '$p_NomeUser'"; //---------------

// Executa a consulta e armazena o resultado em uma variável 
$result = $conn->query($p_tipo_usuario);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Obtem o resultado como uma matriz associativa
    $row = $result->fetch_assoc();
    
    // Acesse o valor da coluna "Tipo_usuario"
    $Result_tipo_usuario = $row["Tipo_usuario"];}         // <---- resultado query 

//----------------------------------------------------------------------------------------------------------

$NomeUserdb = "SELECT Nome_usuario FROM usuario WHERE Nome_usuario = '$p_NomeUser'";//----------------

// Executa a consulta e armazena o resultado em uma variável
$result = $conn->query($NomeUserdb);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Obtem o resultado como uma matriz associativa
    $row = $result->fetch_assoc();
    
    // Acesse o valor da coluna "Nome_usuario"
    $Result_NomeUser_db = $row["Nome_usuario"];}  // <---- resultado query
//------------------------------------------------------------------------------------------------------------------                                                                            /*Logar doscente */

$senha_db= "SELECT Senha FROM usuario WHERE Senha = '$p_senha' && Nome_usuario = '$p_NomeUser'";//------------------------------------------

// Executa a consulta e armazena o resultado em uma variável
$result = $conn->query($senha_db);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Obtem o resultado como uma matriz associativa
    $row = $result->fetch_assoc();
    
    // Acesse o valor da coluna "Senha"
    $Result_senha_db = $row["Senha"];
}     else {                                    // <---- resultado query 
    echo "<p>Erro na consulta: </p>" . $conn->error;
}
//--------------------------------------------------------------------------------------------------------



if ($p_NomeUser == $Result_NomeUser_db && $p_senha == $Result_senha_db) {
    if($Result_tipo_usuario == "Discente" || $Result_tipo_usuario == "Docente"){
        $_SESSION['usuario'] = $Result_NomeUser_db;
        $_SESSION['senha'] = $Result_senha_db;
        $_SESSION['tipo_user'] = $Result_tipo_usuario;
        $_SESSION['session_id'] = session_id();
        header('Location: http://localhost/telastcc/Tela_Aluno/Telaaluno.php');
    } elseif ($Result_tipo_usuario == "Sisae") {
        $_SESSION['usuario'] = $Result_NomeUser_db;
        $_SESSION['senha'] = $Result_senha_db;
        $_SESSION['tipo_user'] = $Result_tipo_usuario;
        $_SESSION['session_id'] = session_id();
        header('Location: http://localhost/telastcc/Tela_inicio/index.php');         
    }
} else {
    session_unset();
    session_destroy();
    header('Location: http://localhost/telastcc/login_definitivo_aluno/index.php');
    echo "<p>senha ou usuario incorreto</p>";
   
}

?>