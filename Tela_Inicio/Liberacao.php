<?php
include("../conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Matricula'])) {
        $Matricula = $_POST["Matricula"];
        $usuario_nome = $_POST['usuario_nome'];

        // Use consultas preparadas para evitar injeções SQL
        $stmt = $conn->prepare("UPDATE usuario SET status = ? WHERE Matricula = ?");
        $novo_status = 0;

        $stmt->bind_param("ii", $novo_status, $Matricula);

        if ($stmt->execute()) {
           
            header("Location: Tela_Liberacao.php");
             // Aguarde 10 segundos
            sleep(60);

            // Agora, execute a segunda alteração para definir o status de volta para 1
            $novo_status = 1;
            $stmt = $conn->prepare("UPDATE usuario SET status = ? WHERE Matricula = ?");
            $stmt->bind_param("ii", $novo_status, $Matricula);
            
            if ($stmt->execute()) {
               
            } else {
                echo"   
                alert ('Erro status não foi redefinido'. $stmt->error);
                ";
            }

            // Encerre o script PHP aqui
            exit;
        } else {
            echo json_encode(array("success" => false, "error" => $stmt->error));

            // Encerre o script PHP aqui
            exit;
        }
    } else {
        echo json_encode(array("success" => false, "error" => "Matrícula não foi enviada corretamente."));

        // Encerre o script PHP aqui
        exit;
    }
}
