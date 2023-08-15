<?php
require_once '../sessao.php';

if (! $logado) {
    die("Você não tem permissão paa acessar essa página.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="../login_definitivo_aluno/css/bootstrap.min.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet">
    <script src="../login_definitivo_aluno/js/popper.min.js" ></script>
	<script src="../login_definitivo_aluno/js/bootstrap.min.js" ></script>
    <script src="../login_definitivo_aluno aluno/js/bootstrap.bundle.min.js"></script> 
</head>
<body>
    <nav class="site-nav " >
        <div class="container">
            <div class="site-navigation">
                     <a href="index.html" class="logo m-0 mt-0 float-start"><img src="Logoifcbranco.png" alt="Image" width="80px" class="img-fluid"></a>
                <ul class="js-clone-nav d-lg-inline-block text-start site-menu float-end">       
                    <li class="cta-button"><a href="#">Historico</a></li>
                </ul>
                
            </div>
        </div>
    </nav>

    <br>
    <br>
    <br>
    <br>
    <br>
    



    <div class="section section-1">
        <div class="container">
            <div class="row">
                   
                <div class="col-sm-12 col-md-12 col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                       <div class="feature box-shadow ">
                            <div class="row">
                                 <div>
                                     <div class="text">
                                    <h3 class="heading">Gerador de QR Code</h3>
                                        </div>
                                </div>
                            </div>

                                <div class="d-flex justify-content-center">
                                    <div id="imprimir" class="col-sm-4 col-md-4 col-lg-4 ">
                                        <form method="post">
                                            <input type="submit" name="gerar_qr" value="Gerar QR Code">

                                            <?php

                                                if (isset($_POST['gerar_qr'])) {
                                                    include('../conexao.php');
                                                    include('../sessao.php');
                                                    // Include the qrlib file
                                                    include 'phpqrcode/qrlib.php';

                                                    if ($_SESSION['tipo_user'] == "Discente") {
                                                        // Consulta SQL
                                                        $sql = "SELECT Matricula FROM usuario WHERE Nome_usuario = '".$_SESSION['usuario']."'";
                                                        // Executa a consulta e armazena o resultado em uma variável
                                                        $result = $conn->query($sql);

                                                        // Verifica se a consulta retornou algum resultado
                                                        if ($result->num_rows > 0) {
                                                            // Percorre cada linha do resultado
                                                            while ($row = $result->fetch_assoc()) {
                                                                // Aqui você pode acessar os valores das colunas por meio do nome da coluna
                                                                $MatResult = $row["Matricula"];
                                                                
                                                                // Nome único para cada arquivo QR code
                                                                $qrFileName = 'qrcode_' . $MatResult . '.png';

                                                                // QR Code generation using png()
                                                                QRcode::png($MatResult, $qrFileName);
                                                                echo '<img src="' . $qrFileName . '" alt="QR Code">';
                                                            }
                                                        } else {
                                                            echo "Nenhum resultado encontrado.";
                                                        }
                                                    } elseif ($_SESSION['tipo_user'] == "Docente") {
                                                        // Consulta SQL
                                                        $sql = "SELECT RMI FROM usuario WHERE Nome_usuario = '".$_SESSION['usuario']."'";
                                                        // Executa a consulta e armazena o resultado em uma variável
                                                        $result = $conn->query($sql);

                                                        // Verifica se a consulta retornou algum resultado
                                                        if ($result->num_rows > 0) {
                                                            // Percorre cada linha do resultado
                                                            while ($row = $result->fetch_assoc()) {
                                                                // Aqui você pode acessar os valores das colunas por meio do nome da coluna
                                                                $RMIResult = $row["RMI"];

                                                                // Nome único para cada arquivo QR code
                                                                $qrFileName = 'qrcode_' . $RMIResult . '.png';

                                                                // QR Code generation using png()
                                                                QRcode::png($RMIResult, $qrFileName);
                                                                echo '<img src="' . $qrFileName . '" alt="QR Code">';
                                                            }
                                                        } else {
                                                            echo "Nenhum resultado encontrado.";
                                                        }
                                                    }
                                                }
                                            ?>
                                        </form>
                                    </div>
                                </div>

                                <div class="d-flex flex-row-reverse">
                                    <a  onClick="window.print()" href="" ><i class="uil uil-print"></i></a>
                                </div>
                            
        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


</body>
</html>