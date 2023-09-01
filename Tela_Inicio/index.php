<?php
include('../conexao.php');
require_once '../sessao.php';

if (!$logado) {
    die("Você não tem permissão para acessar essa página.");
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

    <link href=".\css\bootstrap.min.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

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
                        <form method="post" action="../logout.php"><input class="btn btn-outline-light my-4 border-2" type="submit" value="Logout"></form>
                    </li>
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

                        <div class="d-flex flex-row-reverse bd-highlight">
                            

                        </div>
                        <form class="form-inline" method="post">
                                <div class="col-10 form-group">
                                <div class="input-group mb-3">
                                    <input id="filtro" name="filtro" type="text" class="form-control" placeholder=" Filtrar por nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="uil uil-search"></i></button>
                                </div>
                                    <!-- <label for="filtro" class=" text-light form-label">Filtrar por nome:</label>
                                    <input type="text" id="filtro" name="filtro" class=" form-control">
                                    <button type="submit" class="col-1 btn btn-outline-light"><i class="uil uil-search"></i></button> -->

                                </div>

                            </form>
                        <div class="row mt-0 px-5 table-responsive">

                            <span class="col-4 text-start fs-2 fw-semibold border-bottom border-dark pb-0 mb-4">Historico aluno:</span>

                            <table id="myTable" class="table table-hover table-dark caption-top">

                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Matricula</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data / Hora</th>
                                        <th scope="col">Tipo</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php

                                    $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : NULL;

                                    if (!empty($filtro)) {

                                        $sql = "SELECT usuario.Nome_usuario, usuario.Matricula, trafego.TIPO_TRAFEGO, trafego.HORA, trafego.DIA
                                        FROM usuario
                                        INNER JOIN trafego ON usuario.Cod_usuario = trafego.FKCODUSUARIO
                                        WHERE usuario.Tipo_usuario = 'Discente' AND (usuario.Nome_usuario = '$filtro' OR '$filtro' = '')";

                                        $result = $conn->query($sql);

                                        // Preencher a tabela
                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<td scope='col'>" . $row["Matricula"] . "</td>";
                                                echo "<td scope='col'>" . $row["Nome_usuario"] . "</td>";
                                                echo "<td scope='col'>" . $row["DIA"] . " / " . $row["HORA"] . "</td>";
                                                echo "<td scope='col'>" . $row["TIPO_TRAFEGO"] . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    } else {

                                        // Verifique se $_SESSION["tipo_user"] está definido
                                        $sql = "SELECT usuario.Nome_usuario, usuario.Matricula, trafego.TIPO_TRAFEGO, trafego.HORA, trafego.DIA
										FROM usuario
										INNER JOIN trafego ON usuario.Cod_usuario = trafego.FKCODUSUARIO
										WHERE usuario.Tipo_usuario = 'Discente'";

                                        $result = $conn->query($sql);

                                        // Preencher a tabela
                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<td scope='col'>" . $row["Matricula"] . "</td>";
                                                echo "<td scope='col'>" . $row["Nome_usuario"] . "</td>";
                                                echo "<td scope='col'>" . $row["DIA"] . " / " . $row["HORA"] . "</td>";
                                                echo "<td scope='col'>" . $row["TIPO_TRAFEGO"] . "</td>";
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

</html>