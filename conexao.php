<?php
// Criando conexão com o banco de dados
$conn = mysqli_connect('194.195.213.74','luiz','tcc','esp32db',3333);
// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>
