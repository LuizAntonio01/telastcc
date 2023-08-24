<?php
include('../conexao.php');
require_once '../sessao.php';

if (! $logado) {
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
    <link href="../login_definitivo_aluno/css/bootstrap.min.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet">
    <script src="../login_definitivo_aluno/js/popper.min.js" ></script>
	<script src="../login_definitivo_aluno/js/bootstrap.min.js" ></script>
    <script src="../login_definitivo_aluno/js/bootstrap.bundle.min.js"></script>  
</head>
<body>
    <nav class="site-nav ">
        <div class="container">
            <div class="site-navigation">
                     <a href="index.html" class="logo m-0 mt-0 float-start"><img src="../Tela_Aluno\logoifcbranco.png" alt="Image" width="80px" class="img-fluid"></a>
                <ul class="js-clone-nav d-lg-inline-block text-start site-menu float-end">       
                    <li class="cta-button p-1"><a href="../Tela_Aluno/Telaaluno.php">Inicio</a></li>
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
                             <div class="d-flex flex-row-reverse me-5 mt-3 ">
							 <div class="dropdown">
								<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									Turmas
								</button>
								<ul class="dropdown-menu dropdown-menu-dark " aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item filter-option" href="#" data-filter="all">Mostrar Todas as Turmas</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="1°A">1°A</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="2°A">2°A</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="3°A">3°A</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="1°B">1°B</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="2°B">2°B</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="3°B">3°B</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="1°H">1°H</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="2°H">2°H</a></li>
									<li><a class="dropdown-item filter-option" href="#" data-filter="3°H">3°H</a></li>
								</ul>
							</div>
                        
                            
							


                            <div class="row mt-0 px-5 table-responsive">    
                                
                                <table id="myTable" class="table table-hover table-dark caption-top">
                                    <caption class="text-start fs-2 fw-semibold border-bottom border-dark pb-0 mb-4">Historico aluno:</caption>
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">Matricula</th>
										<th scope="col">Turma</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data /  Hora</th>
                                        <th scope="col">Tipo</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php 
                
                                        // Verifique se $_SESSION["tipo_user"] está definido
										$sql = "SELECT usuario.Nome_usuario, usuario.Turma, usuario.Matricula, trafego.TIPO_TRAFEGO, trafego.HORA, trafego.DIA
										FROM usuario
										INNER JOIN trafego ON usuario.Cod_usuario = trafego.FKCODUSUARIO
										WHERE usuario.Tipo_usuario = 'Discente'";
										
											$result = $conn->query($sql);
																					
											// Preencher a tabela
											if ($result->num_rows > 0) {
												
												while ($row = $result->fetch_assoc()) {
													
													echo "<tr>";
													echo "<td scope='col'>" . $row["Matricula"] . "</td>";
													echo "<td scope=".'col'.">" . $row["Turma"] . "</td>";
													echo "<td scope=".'col'.">" . $row["Nome_usuario"] . "</td>";
													echo "<td scope=".'col'.">" . $row["DIA"] . " / " . $row["HORA"] . "</td>";
													echo "<td scope=".'col'.">" . $row["TIPO_TRAFEGO"] . "</td>";
													echo "</tr>";
												}

											}
									?>
                                    </tbody>
                                    
                                </table>

								<script>

									const filterOptions = document.querySelectorAll(".filter-option");
									const tableRows = document.querySelectorAll("#myTable tr");

									filterOptions.forEach(option => {
										option.addEventListener("click", function() {
											const filterValue = this.getAttribute("data-filter");

											tableRows.forEach(row => {
												if (filterValue === "all" || row.querySelector("td:first-child").textContent === filterValue) {
													row.classList.remove("d-none");
												} else {
													row.classList.add("d-none");
												}

											});
										});
									});
								</script>
                            </div>
        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>