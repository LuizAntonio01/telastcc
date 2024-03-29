<?php
require_once '../sessao.php';

if (! $logado) {
    die("Você não tem permissão para acessar essa página.");
    //header('Location: http://192.168.0.104:8080/telastcc/login_definitivo_aluno/index.php'); 
    header('Location: http://192.168.25.134:8080/telastcc/login_definitivo_aluno/index.php'); 
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador De Acesso</title>
    <link rel="icon"  type="image/ico"  href="../login_definitivo_aluno/img/Logo.jpeg" /> <!--icon titulo-->
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
                    <li class="cta-button"><a href="../Tela Historico/Telahistorico.php">Historico</a></li>
                    <li ><form  method="post" action="../logout.php" ><input class="btn btn-outline-light my-4" type="submit" value="Logout"></form></li>
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
                                    
                                        <form method="post" class="justify-content-center">
                                            

                                            <?php 
                                            include('../conexao.php');
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
                                                                $_SESSION["Matricula"] = $MatResult;
                                                               }
                                                        }
                                                    } elseif ($_SESSION['tipo_user'] == "Docente") {

                                                        $sql = "SELECT RMI FROM usuario WHERE Nome_usuario = '".$_SESSION['usuario']."'";
                                                        // Executa a consulta e armazena o resultado em uma variável
                                                        $result = $conn->query($sql);

                                                        // Verifica se a consulta retornou algum resultado
                                                        if ($result->num_rows > 0) {
                                                            // Percorre cada linha do resultado
                                                            while ($row = $result->fetch_assoc()) {
                                                                // Aqui você pode acessar os valores das colunas por meio do nome da coluna
                                                                $RMIResult = $row["RMI"];
                                                                $_SESSION["RMI"] = $RMIResult;
                                                                }
                                                            }
                                                        }

                                                if (isset($_POST['gerar_qr'])) {
                                                    
 

                                                    if ($_SESSION['tipo_user'] == "Discente") {
                                                        
                                                                
                                                                // Nome único para cada arquivo QR code
                                                                $qrFileName = 'qrcode_' . $MatResult . '.webp';
                                                                $caminhoImagem = './Tela_Aluno/qrcode_' . $MatResult . '.webp';
                                                                $_SESSION['caminho_imagem'] = $caminhoImagem;

                                                                // QR Code generation using png()
                                                                QRcode::png($MatResult, $qrFileName,  QR_ECLEVEL_Q , 8, 1);
                                                                echo '<div class="mt-5 mb-3 img-fluid imprimir"><img id="imprimir" src="' . $qrFileName . '" alt="QR Code"></div>';
                                                            
                                                        } elseif($_SESSION['tipo_user'] == "Docente") {
                                                            
                                                            // Nome único para cada arquivo QR code
                                                                $qrFileName = 'qrcode_' . $RMIResult . '.webp';
                                                                $caminhoImagem = './Tela_Aluno/qrcode_' . $RMIResult . '.webp';
                                                                $_SESSION['caminho_imagem'] = $caminhoImagem;

                                                                // QR Code generation usando png()
                                                                QRcode::png($RMIResult, $qrFileName, QR_ECLEVEL_Q , 8, 1);
                                                                echo '<img  class="mt-5 mb-3 img-fluid imprimir" id="imprimir" src="' . $qrFileName . '" alt="QR Code">';
                                                        }else {
                                                            echo "Nenhum resultado encontrado.";
                                                        }
        
                                                         
                                                    }
  
                                        
                                            ?>
                                            </br>
                                            <input class="btn mx-4 btn-dark" type="submit" name="gerar_qr" value="Gerar QR Code">
                                        </form>
                                   
                                    
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