<?php
include('../conexao.php');
require_once '../sessao.php';


if (!$logado) {
    die("Você não tem permissão para acessar essa página.");
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <link href=".\css\bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <script src=".\js\bootstrap.bundle.min.js"></script>
    <script src=".\js\popper.min.js"></script>
    <script src=".\js\bootstrap.min.js"></script>
</head>

<body>
    <nav class="site-nav ">
        <div class="container">
            <div class="site-navigation">
                <a class="logo m-0 mt-0 float-start"><img src="../Tela_Aluno\logoifcbranco.png" alt="Image" width="80px" class="img-fluid"></a>
                <ul class="js-clone-nav d-lg-inline-block text-start site-menu float-end">
                    <li>
                    <li class="cta-button"><a href="index.php">Historicos</a></li>
                    <li><form method="post" action="../logout.php"><input class="btn btn-outline-light my-4 border-2" type="submit" value="Logout"></form></li>                    </li>
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
            <div class="col-sm-12 col-md-12 col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="feature box-shadow ">
                    <div class=" me-5 mt-3 ">


                        <form class="form-inline d-flex flex-row-reverse" method="get">
                            <div class="col-3 form-group">
                                <div class="input-group mb-3">
                                    <input id="filtro" name="filtro" type="text" class="form-control" placeholder=" Filtro Por Nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="uil uil-search"></i></button>
                                </div>
                            </div>

                        </form>
                        <div class="row mt-0 ps-5 table-responsive">

                            <span class="col-4 text-start text-black-50 fs-2 fw-semibold border-bottom border-dark pb-0 mb-4">Liberação Aluno:</span>

                            <table id="myTable" class="table table-hover table-dark caption-top">

                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Matricula</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Ação</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php

                                    $filtro = isset($_GET['filtro']) ? ucfirst($_GET['filtro']) : NULL;

                                    if (!empty($filtro)) {

                                        $sql = "SELECT Nome_usuario, Matricula
										FROM usuario
                                        WHERE usuario.Tipo_usuario = 'Discente' AND (usuario.Nome_usuario = '$filtro' OR '$filtro' = '')
                                        ORDER BY usuario.Nome_usuario ASC";

                                        $result = $conn->query($sql);

                                        // Preencher a tabela
                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr class='align-middle'>";
                                                echo "<td scope='col-2'>" . $row["Matricula"] . "</td>";
                                                echo "<td scope='col-8'>" . $row["Nome_usuario"] . "</td>";
                                                echo "<td scope='col-2'><form method='post' id='liberar-form' action='./Liberacao.php'> 
                                                                            <input type='hidden' name='usuario_nome' value='" . $row["Nome_usuario"] . "'>
                                                                            <input type='hidden' name='Matricula' value='" . $row["Matricula"] . "'>
                                                                            <button type='submit' class='btn btn-outline-success mt-auto' >Liberar</button>                                                                     
                                                                        </form></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    } else {

                                        // Verifique se $_SESSION["tipo_user"] está definido
                                        $sql = "SELECT Nome_usuario, Matricula
										FROM usuario
										WHERE usuario.Tipo_usuario = 'Discente'
                                        ORDER BY usuario.Nome_usuario ASC";

                                        $result = $conn->query($sql);

                                        // Preencher a tabela
                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr class='align-middle'>";
                                                echo "<td scope='col-2'>" . $row["Matricula"] . "</td>";
                                                echo "<td scope='col-8'>" . $row["Nome_usuario"] . "</td>";
                                                echo "<td scope='col-2'><form method='post' id='liberar-form' action='./Liberacao.php'>         
                                                                            <input type='hidden' name='usuario_nome' value='" . $row["Nome_usuario"] . "'>
                                                                            <input type='hidden' name='Matricula' value='" . $row["Matricula"] . "'>
                                                                            <button type='submit' class='btn btn-outline-success mt-1' >Liberar</button> 
                                                                        </form></td>";

                                                echo "</tr>";
                                            }
                                        }
                                    }

                                    ?>
                                </tbody>

                            </table>

                        </div>

                    </div>


                </div>
            </div>
        </div>
</body>
<script>
    $(document).ready(function() {
        $("#liberar-form").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "Liberação.php",
                data: $("#liberar-form").serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $("#resultado").html("Usuário liberado com sucesso!");

                        // Aguarda 10 segundos e, em seguida, atualiza a página
                        setTimeout(function() {
                            location.reload();
                        }, 600000); // 10000 ms = 10 segundos
                    } else {
                        $("#resultado").html("Erro ao liberar o usuário: " + response.error);
                    }
                },
                error: function() {
                    $("#resultado").html("Erro ao comunicar com o servidor.");
                }
            });
        });
    });
</script>


</html>