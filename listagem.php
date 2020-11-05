<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listagem das Gpus</title>
	<!--Link dos nossos arquivos CSS e JS padrão-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/scripts.js"></script>
	<!--Link dos arquivos CSS e JS do Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="img/icon.JPG" style="width: 40px; height: 40px;">
    <br>
</head>

<body>
<header>
		<br>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand navbar-brand" href="http://localhost/trabalhos/placasvideo/">GpuXpress
				<img src="img/icon.jpg" href="http://localhost/trabalhos/placasvideo/" alt="" style="margin-left: 20px;  width: 40px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item ">
						<a class="nav-link" href="http://localhost/trabalhos/placasvideo/">Home <span class="sr-only">(atual)</span></a>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/trabalhos/placasvideo/cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item active">
						<a class="nav-link" href="http://localhost/trabalhos/placasvideo/listagem.php">listagem</a>
                    </li>
					
				</ul>

			</div>
        </nav>
        <br>
	</header>
    <?php
        include_once "placaslista.php";
        include_once "placaslistaview.php";
        include_once "placasvid.php";
        include_once "gpuDAO.php";
        
        session_start();
    
        if(isset($_SESSION["logado"])){
            if($_SESSION["logado"]==false){
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
        


        $valor = "";
        $campo = "";
        $operacao = "";
        $ordenacao = "";

        if(isset($_POST["btnFiltro"])){
            $valor = $_POST["txtFiltro"];
            $campo = $_POST["selTipoFiltro"];
            $operacao = $_POST["selOperacao"];
            $ordenacao = $_POST["selOrdenacao"];

            if($_POST["btnFiltro"]=="inserir"){
                header("Location: cadastro.php");
            } else if($_POST["btnFiltro"]=="desfazer"){
                $placas = gpuDAO::getPlacas("codigo", "asc", "", "");
            } else if($_POST["btnFiltro"]=="filtrar"){
                if($valor==""){
                    $placas = gpuDAO::getPlacas($campo, $ordenacao, "", "");
                } else {
                    $placas = gpuDAO::getPlacas($campo, $ordenacao, $operacao, $valor);
                }
            }

        } else {
            $placas = gpuDAO::getPlacas("codigo", "asc", "", "");
        }

    ?>

    <br>
    <div class="container">
        <div class="row text-center" id="cabecalhoLista">
            <div class="col-md-12" style="color:white">
                <h1>Listagem de Placas de vídeo</h1>
                <br>
            </div>
        
            <div class="col-md-12 text-center">

                <form method="post" action="listagem.php">
                    <div class="row">
                        <div class="col-md-1"  style="color:white; font-size:1.5em;">
                            Filtro
                        </div>
                        <div class="col-md-2">
                            <input class="ajustavel" type="text" name="txtFiltro" id="txtFiltro" value="">
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel" name="selTipoFiltro" id="selTipoFiltro">
                                <option value="marca">Marca</option>
                                <option value="memoria">Memória</option>
                                <option value="tipo_memoria">Tipo de memória</option>
                                <option value="nome">Nome</option>
                                <option value="bit">Bit</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel" name="selOperacao" id="selOperacao">
                                <option value="=">Igual</option>
                                <option value="<>">Diferente</option>
                                <option value=">">Maior</option>
                                <option value=">=">Maior ou igual</option>
                                <option value="<">Menor</option>
                                <option value="<=">Menor ou igual</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel" name="selOrdenacao" id="selOrdenacao">
                                <option value="asc">Crescente</option>
                                <option value="desc">Decrescente</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-primary" type="submit" name="btnFiltro" value="filtrar" style="padding:0px!important;">
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-danger" type="submit" name="btnFiltro" value="desfazer" style="padding:0px!important;">
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-success" type="submit" name="btnFiltro" value="inserir" style="padding:0px!important;">
                        </div>
                    </div>
                </form>
            </div>  
        </div> 

    
        <?php
            PlacaListaView::geraLista($placas);

            if(isset($_POST["btnFiltro"])){
                echo "
                    <script>
                        $('#txtFiltro').val('$valor');
                        $('#selTipoFiltro').val('$campo');
                        $('#selOperacao').val('$operacao');
                        $('#selOrdenacao').val('$ordenacao');
                    </script>
                ";
            }
        ?>
    
    
    
    </div>


</body>