<?php
require_once '../sessão.php';
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link href="../login definitivo aluno/css/bootstrap.min.css" rel="stylesheet" >
    <script src="../login definitivo aluno/js/popper.min.js" ></script>
	<script src="../login definitivo aluno/js/bootstrap.min.js" ></script>
    <script src="../login definitivo aluno/js/bootstrap.bundle.min.js"></script>
   

	<title>SDC</title>

<style>

body {background-color: rgb(31, 32, 41
	);

        }
/* ----inicio navbar---- */
.dropdown-item {
	color: white;
}

.navbar-brand { text-decoration-color : #ffeba7;}

.nav-link {
	color: white;
}

/* ----final navbar----  */

.table-container {
  background-color: #2b2e38;
  max-width: 750px;
  margin: 10px auto;
  

}

table {

  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 10px;
  background-color: #2b2e38;
  color: white;}

th {
  background-color: #2b2e38;
 
}

tr:nth-child(even) {
  background-color: #2b2e38;
}


button {
  border-radius: 9px;
  padding: 2px 5px;
  background-color: #4CAF50;
  border: none;
  color: white;
  cursor: pointer;
  margin-right: 3px;
}
 
button:hover {
  background-color: #338836;
}

button:active {
  background-color: #186a1b;
  transform: translateY(1px);
}

/* fichario */

.content {
	
	border-radius: 0px 0px 9px 9px;
}
 .tab1

* {
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
}



.tab {
	
  width: 700px;
  margin: 100px auto;
}

.tab input[type] {
  display: none;
}
/*envolve todo o nosso conteúdo*/
.tab label {
  white-space: nowrap;
  background-color: #2b2e3867;
  border-top-right-radius: 9px;
  border-top-left-radius: 9px;
  color: white;
  display: block;
  float: left;
  padding: 4px 86px;
  margin-right: 1px;
  cursor: pointer;
  transition: background-color .3s;
}

.tab label:hover,
.tab input:checked + label {
  background: #2b2e38;
  color: #fff;
}

.tabs {
  color: white;	
  clear: both;
  perspective: 400px;
  -webkit-perspective: 400px;
}

.tabs .content {
  background: #2b2e38;
  width: 700px;
  position: absolute;
  border: 2px solid #2b2e38;
  padding: 10px 30px 40px;
  /* line-height: 1.4em;
  opacity: 0;
  /* transform: rotateX(-20deg);
  transform-origin: top center;
  transition: opacity .3s, transform 1s;
  z-index: 0; */ 
}

#tab1:checked ~ .tabs .content:nth-of-type(1),
#tab2:checked ~ .tabs .content:nth-of-type(2),
#tab3:checked ~ .tabs .content:nth-of-type(3),
#tab4:checked ~ .tabs .content:nth-of-type(4) {
  
  opacity: 1;
  z-index: 1;
}
		/* fichario  */
</style>

</head>
<body>
	
	<nav class="navbar  navbar-expand-lg bg-body-tertiary" data-bs-theme="dark"  >
		<div class="container-fluid" >


			  
			  <a class="navbar-brand"  href="#" >texto</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#"></a>
			  </li>

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Turmas
				</a>
				<ul class="dropdown-menu">
				  		<li><a class="dropdown-item" href="#">1° A</a></li>
				  		<li><a class="dropdown-item" href="#">1° B</a></li>
				  		<li><a class="dropdown-item" href="#">1° H</a></li>
				    <li><hr class="dropdown-divider"></li>
				  		<li><a class="dropdown-item" href="#">2° A</a></li>
				  		<li><a class="dropdown-item" href="#">2° B</a></li>
				  		<li><a class="dropdown-item" href="#">2° H</a></li>
				    <li><hr class="dropdown-divider"></li>
				  		<li><a class="dropdown-item" href="#">3° A</a></li>
						<li><a class="dropdown-item" href="#">3° B</a></li>
				        <li><a class="dropdown-item" href="#">3° H</a></li>
					<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="#">Tecnologia em <br> REDE DE COMPUTADORES</a></li>
				    <li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="#">Licenciatura em <br>MATEMÁTICA</a></li>
				    <li><hr class="dropdown-divider"></li>
			    <li><a class="dropdown-item" href="#">Tecnologia em <br>GESTÃO DE TURISMO</a></li>
				  
				</ul>
			  </li>
			  <li class="nav-item">
				<a class="nav-link">Permissões</a>
			  </li>
			</ul>
			<form class="d-flex" role="search">
			  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-light" type="submit">Search</button>
			</form>
		  </div>
		</div>
	  </nav>

	  <div class="tab">
		<div class="row">
		<div class="col-4">	
		<input type="radio" name="tabs" id="tab1" checked>
		<label for="tab1">1° ano</label>
		</div>
		
		<div class="col-4">	
		<input type="radio" name="tabs" id="tab2">
		<label for="tab2">2° ano</label>
		</div>

		<div class="col-4">	
		<input type="radio" name="tabs" id="tab3">
		<label for="tab3">3° ano</label>
		</div>	
		</div>
		<div class="tabs">
		  <div class="content">
			<div class="table-container">
        <table class="table1">
          <thead>
            <tr>
              <th>aaaaaa</th>
             
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Row 1, Column 1</td>
              
			
			  <td><a href="URL"><button>botão</button></a></td>
            </tr>
            <tr>
              <td>Row 2, Column 1</td>
            
             
			  <td><a href="URL"><button>botão</button></a></td>
            </tr>
            <tr>
              <td>Row 3, Column 1</td>
             
			
			  <td><a href="URL"><button>botão</button></a></td>
            </tr>
          </tbody>
        </table>
      </div>

		  </div>
		  
		  <div class="content">
			<div class="table-container">
				<table class="table2">
					<thead>
					  <tr>
						<th>olhou</th>
					   
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Row 1, Column 1</td>
						
						
						<td><a href="URL"><button>botão</button></a></td>
					  </tr>
					  <tr>
						<td>Row 2, Column 1</td>
					  
						
						<td><a href="URL"><button>botão</button></a></td>
					  </tr>
					  <tr>
						<td>Row 3, Column 1</td>
					   
						
						<td><a href="URL"><button>liberar</button></a></td>
					  </tr>
					</tbody>
				  </table>
			  </div>
		  </div>
		  
		  <div class="content">
			<div class="table-container">
				<table class="table3">
					<thead>
					  <tr>
						<th>oia</th>
					   
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>nome aluno 1</td>
						
						
						<td><a href="URL"><button>liberar</button></a></td>
					  </tr>
					  <tr>
						<td>nome aluno 2</td>
					  
						
						<td><a href="URL"><button>liberar</button></a></td>
					  </tr>
					  <tr>
						<td>nome aluno 3</td>
					   
						
						<td><a href="URL"><button>liberar</button></a></td>
					  </tr>
					</tbody>
				  </table>
			  </div>
		  </div>
		  
		</div>
	  </div>

</body>
</html>