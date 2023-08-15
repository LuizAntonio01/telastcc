<!DOCTYPE html>
<html>
<head>
    <title>Gerador de QR Code</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="gerar_qr" value="Gerar QR Code">
    </form>
<?php

if (isset($_POST['gerar_qr'])) {
include('../conexao.php');
include('../sessao.php');
// Include the qrlib file
include 'phpqrcode/qrlib.php';


// Consulta SQL
$sql = "SELECT Matricula FROM usuario WHERE Nome_usuario = '".$_SESSION['usuario']."' AND Senha = '".$_SESSION['senha']."'";
// Executa a consulta e armazena o resultado em uma variável
$result = $conn->query($sql);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Percorre cada linha do resultado
    while ($row = $result->fetch_assoc()) {
        // Aqui você pode acessar os valores das colunas por meio do nome da coluna
        $MatResult = $row["Maticula"];
        

    }
} else {
    echo "Nenhum resultado encontrado.";
    echo "seu usuario é " . $_SESSION['usuario'];
    echo "<br>sua senha é " . $_SESSION['senha'];

}
        // QR Code generation using png()
        // When this function has only the
        // text parameter it directly
        // outputs QR in the browser
        QRcode::png($MatResult);

    }
    ?>
</body>
</html>


