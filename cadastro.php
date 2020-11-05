<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--Tags básicas do head-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de placas de vídeo</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/trabalhos/placasvideo/cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://localhost/trabalhos/placasvideo/listagem.php">listagem</a>
                    </li>


                </ul>

            </div>
        </nav>
        <br>
    </header>
    <?php
    include_once "placasvid.php";
    include_once "gpuDAO.php";
    include_once "imagem.php";
    //error_reporting( E_ALL ^E_NOTICE ); 

  session_start();
  
        if(isset($_SESSION["logado"])){
            if($_SESSION["logado"]==false){
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
        


    if (!isset($_SESSION["modo"])) {
        $_SESSION["modo"] = 1;
    }

    $codigo = "";
    $nome = "";
    $modelo = "";
    $marca = "";
    $memoria = "";
    $tipo_memoria = "";
    $clock = "";
    $foto = "semfoto.jpg";
    $bit = "";

    if (isset($_POST["botaoAcao"])) {
        if ($_POST["botaoAcao"] == "Gravar") {

            $codigo = null;
            $nome = $_POST["nome"];
            $modelo = $_POST["modelo"];
            $marca = $_POST["marca"];
            $memoria = $_POST["memoria"];
            $tipo_memoria = $_POST["tipo_memoria"];
            $clock = $_POST["clock"];
            $arquivo = $_FILES["fileFoto"];
            $bit = $_POST["bit"];
            if ($arquivo != "" && $arquivo != null)
                $foto = imagem::uploadImagem($arquivo, 2000, 2000, 5000, "img/");
            else
                $foto = "";
            $pAux = new GPU(
                $codigo,
                $nome,
                $modelo,
                $marca,
                $foto,
                $memoria,
                $tipo_memoria,
                $clock,
                $bit
            );
            if ($_SESSION["modo"] == 1)
                gpuDAO::inserir($pAux);
            else
                gpuDAO::atualizar($pAux);
        } else if ($_POST["botaoAcao"] == "Excluir") {
            gpuDAO::excluir($_POST["nome"]);
        }

        //Coloca em modo de inserção caso for clicado no botão Excluir ou Inserir
        //Assim, a próxima vez que o botão gravar for clicado, sabemos se devemos
        //Inserir ou Atualizar o Pokemon. Além disso, também conseguimos saber se
        //devemos recarregar os valores dos inputs ou trazer somente vazio
        if (isset($_POST["botaoAcao"])) {
            if ($_POST["botaoAcao"] == "Excluir" || $_POST["botaoAcao"] == "Limpar") {
                $_SESSION["modo"] = 1; //insercao
            } elseif ($_POST["botaoAcao"] == "Cancelar") {
                header("Location: listagem.php");
            } else {
                $_SESSION["modo"] = 2; //atualização
            }
        }
    }
    if (isset($_POST["selPlaca"])) {
        $gpu = gpuDAO::getPlaca($_POST["selPlaca"]);
        $nome = $gpu->getNome();
        $marca = $gpu->getModelo();
        $modelo = $gpu->getMarca();
        $tipo_memoria = $gpu->getMemoria();
        $clock = $gpu->getTipo_memoria();
        $foto = $gpu->getClock();
        $memoria = $gpu->getFoto();
        $bit = $gpu->getBit();
        $_SESSION["modo"] = 2;
    } else {
        $_SESSION["modo"] = 1;
    }


    ?>
    <form method="post" action="cadastro.php" enctype="multipart/form-data">

        <br><br>
        <div class="row" id="areaCadastro">
            <div class="col-md-4 offset-md-4">
                <img src="img/<?php echo $foto; ?>" style="width:100%; height:100%;">
            </div>
            <div class="col-md-4 offset-md-4">
                <input type="file" name="fileFoto">

            </div>

            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 featurette-heading" style="color: white;">
                        <h1>Cadastro de Placas de Vídeo</h1>
                    </div>
                </div>
                <div class="offset-md-4 col-md-4" style="color:white">
                    <strong><label for="nome">Nome</label></strong>
                    <input type="text" name="nome" value=<?php echo "$nome"; ?>>
                </div>
                <div class="col-md-4 offset-md-4" style="color:white">
                    <strong><label for="modelo">Modelo</label></strong>
                    <input type="text" name="modelo" value=<?php echo "$modelo"; ?>>
                </div>
                <div class="col-md-4 offset-md-4" style="color:white">
                    <strong><label for="marca">Marca</label></strong>
                    <input type="text" name="marca" value=<?php echo "$marca"; ?>>
                </div>
                <div class="col-md-4 offset-md-4" style="color:white">
                    <strong><label for="memoria">Memória</label></strong>
                    <input type="number" name="memoria" value=<?php echo "$memoria"; ?>>
                </div>
                <div class="col-md-4 offset-md-4" style="color:white">
                    <strong><label for="tipo_memoria">Tipo da memória</label></strong>
                    <input type="text" name="tipo_memoria" value=<?php echo "$tipo_memoria"; ?>>
                </div>
                <div class="col-md-4 offset-md-4" style="color:white">
                    <strong><label for="clock">Clock</label></strong>
                    <input type="number" name="clock" value=<?php echo "$clock"; ?>>
                </div>
                <div class="col-md-4 offset-md-4" style="color:white">
                    <strong><label for="clock">Bit</label></strong>
                    <input type="number" name="bit" value=<?php echo "$bit"; ?>>
                    <br>
                </div>
                <div class="row text-center">
                
                <div class="col-md-6" style="margin-top: 20px;"><input type="submit" name="botaoAcao" value="Inserir" class="btn btn-primary" /></div>
                <div class="col-md-6" style="margin-top: 20px;"><input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success" /></div>
                <div class="col-md-6" style="margin-top: 20px;"><input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger" /></div>
                <div class="col-md-6" style="margin-top: 20px;"><input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning" /> </div>
            </div>
                <br>

            </div>
            

    </form>


    </div>


</body>