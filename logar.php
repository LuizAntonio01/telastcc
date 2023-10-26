<?php
include("./sessao.php");
include("./conexao.php");
session_regenerate_id(true);



$p_NomeUser = $_POST['NomeUser'] ?? '';
$p_senha = $_POST['Senha'] ?? '';

// Verifique se os valores foram fornecidos
if ($p_NomeUser !== NULL && $p_senha !== NULL) {
    // Evite injeção SQL usando declarações preparadas
    $stmt = $conn->prepare("SELECT Tipo_usuario, Nome_usuario, Senha FROM usuario WHERE Nome_usuario = ? AND Senha = ?");
    $stmt->bind_param("ss", $p_NomeUser, $p_senha);
    $stmt->execute();

    // Armazene os resultados
    $stmt->bind_result($tipoUsuario, $nomeUsuario, $senha);

        // Verifique se os resultados foram encontrados
        if ($stmt->fetch()) {
            
            if ($tipoUsuario == "Discente" || $tipoUsuario == "Docente") {
                $_SESSION['usuario'] = $nomeUsuario;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo_user'] = $tipoUsuario;
                $_SESSION['session_id'] = session_id();
                //header('Location: http://192.168.0.104:8080/telastcc/Tela_Aluno/Telaaluno.php');
                header('Location: http://192.168.0.106:8080/telastcc/Tela_Aluno/Telaaluno.php');

            } elseif ($tipoUsuario == "Sisae") {
                $_SESSION['usuario'] = $nomeUsuario;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo_user'] = $tipoUsuario;
                $_SESSION['session_id'] = session_id();
                //header('Location: http://192.168.0.104:8080/telastcc/Tela_inicio/index.php');
                header('Location: http://192.168.0.106:8080/telastcc/Tela_inicio/index.php');

            }
            
            } else {
                echo "
                <script>
                alert ('Senha ou Usuario incorreto!!');
                window.location='./login_definitivo_aluno/index.php';
                </script>
                ";
                session_unset();
                session_destroy();
            
            
    } 
    
}

// Feche a declaração    
$stmt->close();
// Não se esqueça de fechar a conexão com o banco de dados depois
$conn->close();

?>