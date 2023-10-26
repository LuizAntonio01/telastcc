
<!doctype html>
<html lang="pt-BR">
<head>
  <title>Gerenciador De Acesso</title>
  <link rel="icon"  type="image/ico"  href="img/Logo.jpeg" /> <!--icon titulo-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <!-- <link href="http://192.168.0.104:8080/telastcc/login_definitivo_aluno/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://192.168.0.104:8080/telastcc/login_definitivo_aluno/js/popper.min.js" ></script>
  <script src="http://192.168.0.104:8080/telastcc/login_definitivo_aluno/js/bootstrap.min.js" ></script>
  <script src="http://192.168.0.104:8080/telastcc/login_definitivo_aluno/js/bootstrap.bundle.min.js"></script>   -->

  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <script src="./js/popper.min.js" ></script>
  <script src="./js/bootstrap.min.js" ></script>
  <script src="./js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="style.css">
</head>
<body>
	<script>
        // Use a função alert() para exibir a mensagem do PHP como um alerta
        var mensagemPHP = "<?php echo $mensagem; ?>";
        if (mensagemPHP !== "") {
            alert(mensagemPHP);
        }
    </script>
	
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Login</span><span>Cadastro</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<Form class="section text-center" action="../logar.php" method="post">

											<h4 class="mb-4 pb-3">Login</h4>
											<div class="form-group">
												<input type="text" class="form-style" required title="Por favor, preencha este campo" placeholder="Nome Completo" name="NomeUser" id="NomeUser">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" class="form-style" required title="Por favor, preencha este campo" name="Senha" placeholder="Senha" id="senha">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" class="btn mt-4" >Login</button>
										
					  
					  
				      					</Form>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<form class="section text-center" action="../cadastro.php" method="post">
											<h4 class="mb-3 pb-3">Cadastro</h4>

											<div class="form-group">
												<input type="text" class="form-style" required title="Por favor, preencha este campo" placeholder="Nome Completo" name="NomeUser">
												<i class="input-icon uil uil-user"></i>
											</div>


											<div class="form-group mt-2">
												<input type="password" class="form-style" required title="Por favor, preencha este campo" placeholder="Senha" name="senha">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>

											<div class="form-group mt-2">
												<input type="text" class="form-style" required title="Por favor, preencha este campo" placeholder="Matricula" name="matricula">
												<i class="input-icon uil  uil-file-alt"></i>
											</div>	

											<div class="form-group mt-2">
												<label>Tipo:</label>
												
												<div class="form-check form-check-inline ms-4">
													<input class="form-check-input" id="discente" title="Aluno" type="radio"  value="Discente" name="tipo_usuario">
													<label class="form-check-label" title="Aluno" for="discente">Discente</label>
												</div>
												<div class="form-check form-check-inline mx-3">
													<input class="form-check-input" id="docente" title="Professor" type="radio"  value="Docente" name="tipo_usuario">
													<label class="form-check-label" title="Professor" for="docente">Docente</label>
												</div>
												
											</div>
										    <button type="submit" class="btn mt-4" >Registre-se</button> 
				      					</form>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>

</body>
</html>
