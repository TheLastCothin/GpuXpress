<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GpuXpress</title>
	<!--Link dos nossos arquivos CSS e JS padrão-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/scripts.js"></script>
	<!--Link dos arquivos CSS e JS do Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="icon" href="img/icon.JPG" style="width: 40px; height: 40px;">
	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<header>
		<br>
		<div class="container">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand navbar-brand" href="http://localhost/trabalhos/placasvideo/">GpuXpress
				<img src="img/icon.jpg" alt="" style="margin-left: 20px;  width: 40px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/trabalhos/placasvideo/">Home <span class="sr-only">(atual)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/trabalhos/placasvideo/cadastro.php">Cadastro</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/trabalhos/placasvideo/listagem.php">listagem</a>
                    </li>
					
				</ul>

			</div>
		</nav>
		<br>
		</div>
	</header>

	<?php
	include_once "placasvid.php";
	include_once "gpuview.php";
	include_once "placaslista.php";
	include_once "gpuDAO.php";
	include_once "usuarioDAO.php";

	$con = Conexao::getConexao();

	session_start();
	
	$_SESSION["logado"] = false;

	if(isset($_POST["entrar"])){
		$usuario = $_POST["txtUsuario"];
		$senha = $_POST["txtSenha"];
		echo "verificar";
		if(UsuarioDAO::logar($usuario, $senha)){
			$_SESSION["logado"] = true;		
			echo "logou";
			header("Location: cadastro.php");
		}

	}
	
	?>
	<br>
<div class="container">
		<br>
		<form method="post" action="index.php">
			<div class="row">
				<div class="col-md-5" style="font-size:1.2em; color:white;">
					<strong>Edição das Placas</strong>
				</div>
				<div class="col-md-1 text-center" style="font-size:1.2em; color:white;">
					Usuário:	
				</div>
				<div class="col-md-2">
					<input class='ajustavel' type='text' name='txtUsuario' value='' style="color:black">	
				</div>
				<div class="col-md-1 text-center" style="font-size:1.2em; color:white;">
					Senha:
				</div>
				<div class="col-md-2">
					<input class='ajustavel' type='password' name='txtSenha' value='' style="color:black">	
				</div>
				<div class="col-md-1">
					<button class='btn-primary' type='submit' name='entrar' value='entrar'>Entrar</button>	
				</div>
			</div>
		</form>
		<br>

	<div class="container">
		<div class="row text-center" style="background-color:#212529;" id="titulo">
			<div class="col-md-12">
				<h1>Placas de vídeo</h1>
			</div>
		</div>


		<div class="row text-center">

			<?php
			/*
				$lista = new PokemonLista();
				$lista->carregarPokemons();

				$pokelista = $lista->getPokelista();
		
				foreach($pokelista as $pokemon){
					PokemonView::gerarCard($pokemon);
				}
				*/
				$gpuLista = gpuDAO::getPlacas("nome", "asc", "", "");
		
				foreach($gpuLista as $gpu){
					GpuView::gerarCard($gpu);
				}

			?>


		</div>
		
		</div>
	</div>
</body>

</html>