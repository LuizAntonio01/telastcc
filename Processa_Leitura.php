<?php
include('./conexao.php');

$v = $_GET['v'];
// Consulta SQL
$sql = "SELECT Matricula, Cod_usuario, status, Tipo_usuario FROM esp32db.usuario WHERE Matricula = $v";

$result = $conn->query($sql);

if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["Matricula"] == $v && $row["status"] == 0) {
            echo 1;
            
            // Consulta SQL
            $usuarioCod = $row["Cod_usuario"];
            $sql = "SELECT TIPO_TRAFEGO FROM trafego WHERE FKCODUSUARIO = $usuarioCod ORDER BY COD_TRAFEGO DESC LIMIT 1";

            $resultTrafego = $conn->query($sql);

            $rowTrafego = $resultTrafego->fetch_assoc();

            switch ($rowTrafego["TIPO_TRAFEGO"]) {
                case "Entrada":
                    //Consulta SQL de inserção de Saída
                    $sql = "INSERT INTO trafego (TIPO_TRAFEGO, FKCODUSUARIO, FKCODCATRACA) VALUES ('Saída', $usuarioCod, 1)";
                    $conn->query($sql);
                    break;
                case "Saída":
                    //SQL de inserção de Entrada
                    $sql = "INSERT INTO trafego (TIPO_TRAFEGO, FKCODUSUARIO, FKCODCATRACA) VALUES ('Entrada', $usuarioCod, 1)";
                    $conn->query($sql);
                    break;
                case "":
                    //Consulta SQL de inserção de Primeira Entrada
                    $sql = "INSERT INTO trafego (TIPO_TRAFEGO, FKCODUSUARIO, FKCODCATRACA) VALUES ('Entrada', $usuarioCod, 1)";
                    $conn->query($sql);
                    break;
            }
        } else {
            //echo "Erro: Nenhuma correspondência encontrada para Matrícula = $v.";
            echo 0;
        }
    }
} else {
    $sql = "SELECT RMI, Cod_usuario FROM esp32db.usuario WHERE RMI = $v";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            if ($row["RMI"] == $v) {
                echo 1;
                
                // Consulta SQL
                $usuarioCod = $row["Cod_usuario"];
                $sql = "SELECT TIPO_TRAFEGO FROM trafego WHERE FKCODUSUARIO = $usuarioCod ORDER BY COD_TRAFEGO DESC LIMIT 1";

                $resultTrafego = $conn->query($sql);

                    $rowTrafego = $resultTrafego->fetch_assoc();

                    switch ($rowTrafego["TIPO_TRAFEGO"]) {
                        case "Entrada":
                            // Consulta SQL de inserção de Saída
                            $sql = "INSERT INTO trafego (TIPO_TRAFEGO, FKCODUSUARIO, FKCODCATRACA) VALUES ('Saída', $usuarioCod, 1)";
                            $conn->query($sql);
                            break;
                        case "Saída":
                            // Consulta SQL de inserção de Entrada
                            $sql = "INSERT INTO trafego (TIPO_TRAFEGO, FKCODUSUARIO, FKCODCATRACA) VALUES ('Entrada', $usuarioCod, 1)";
                            $conn->query($sql);
                            break;
                        case "":
                            // Consulta SQL de inserção de Primeira Entrada
                            $sql = "INSERT INTO trafego (TIPO_TRAFEGO, FKCODUSUARIO, FKCODCATRACA) VALUES ('Entrada', $usuarioCod, 1)";
                            $conn->query($sql);
                            break;
                    }
               
            } else {
                //echo "Erro: Nenhuma correspondência encontrada para RMI";
                echo 0;
            }

        }
    } else {
        echo "0";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
