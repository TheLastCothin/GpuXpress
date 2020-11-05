<?php
    include "conexao.php";

    class gpuDAO{
        
        //Básico de uma classe DAO
        //inserir
        //atualizar
        //excluir

        public static function inserir($gpu){
            $con = Conexao::getConexao();
            $sql = $con->
                prepare("insert into placas values (null,?,?,?,?,?,?,?,?)");
            
            $nome = $gpu->getNome();
            $modelo = $gpu->getModelo();
            $marca = $gpu->getMarca();
            $memoria = $gpu->getMemoria();
            $tipo_memoria = $gpu->getTipo_memoria();
            $clock = $gpu->getClock();
            $foto = $gpu->getFoto();
            $bit = $gpu->getBit();
            
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $modelo);
            $sql->bindParam(3, $marca);
            $sql->bindParam(4, $memoria);
            $sql->bindParam(5, $tipo_memoria);
            $sql->bindParam(6, $clock);
            $sql->bindParam(7, $foto);
            $sql->bindParam(8, $bit);
            
            $sql->execute();
        }

        //Quero que o excluir possa funcionar de 3 formas:
            //Recebendo um pokemon
            //Recebendo o nome do pokemon
            //Recebendo o código do pokemon
        public static function excluir($placa){
            $con = Conexao::getConexao();
           
            $sql = null;
            if(is_numeric($placa)){
                $sql=$con->prepare("delete from placas where codigo = ?");
                $sql->bindParam(1, $placa);
            } else if(is_string($placa)){
                $sql=$con->prepare("delete from placas where nome = ?");
                $sql->bindParam(1, $placa);
            } else {
                $nome = $placa->getNome();
                $sql=$con->prepare("delete from placas where nome = ?");
                $sql->bindParam(1, $nome);
            }
            $sql->execute();  
        }
        public static function atualizar($placa){
            $con = Conexao::getConexao();
            $codigo = $placa->getCodigo();
            $nome = $placa->getNome();
            $modelo = $placa->getModelo();
            $marca = $placa->getMarca();
            $memoria = $placa->getMemoria();
            $tipo_memoria = $placa->getTipo_memoria();
            $clock = $placa->getClock();
            $foto = $placa->getFoto();
            $bit = $placa->getBit();

            if($codigo>0){
                $sql = $con->prepare("update placas set nome=?, modelo=?, marca=?, 
                memoria=?, tipo_memoria=?, clock=?, foto=? where codigo=?");
                $sql->bindParam(8, $codigo);
            } else {
                $sql = $con->prepare("update placas set nome=?, modelo=?, marca=?, 
                memoria=?, tipo_memoria=?, clock=?, foto=? where nome=?");
                $sql->bindParam(8, $nome);
            }
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $modelo);
            $sql->bindParam(3, $marca);
            $sql->bindParam(4, $memoria);
            $sql->bindParam(5, $tipo_memoria);
            $sql->bindParam(6, $clock);
            $sql->bindParam(7, $foto); 
            $sql->bindParam(8, $bit);  
            $sql->execute();
            
        }

        //Ao dar um get pokemon (localizando o pokemon no banco e devolvendo uma instancia)
        //queremos que se possa usar ou o código ou o nome
        public static function getPlaca($identificacao){
            $con = Conexao::getConexao();
            $sql = null;

            if(is_numeric($identificacao)){
                $sql = $con->prepare("select * from placas where codigo=?");
                $sql->bindParam(1, $identificacao);
            } else {
                $sql = $con->prepare("select * from placas where nome=?");
                $sql->bindParam(1, $identificacao);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $gpu = null;
            if($registro = $sql->fetch()){
                $gpu = new GPU(
                    $registro["codigo"],
                    $registro["nome"],
                    $registro["marca"],
                    $registro["modelo"],
                    $registro["memoria"],
                    $registro["tipo_memoria"],
                    $registro["clock"],
                    $registro["foto"],
                    $registro["bit"]
                );
            }

            return $gpu;

        }

        public static function getPlacas($campo, $ordem, $operador, $valor){
            var_dump($campo);
            var_dump($ordem);
            var_dump($operador);
            var_dump($valor);
            $con = Conexao::getConexao();
            if($operador=="")
            $sql = $con->prepare("select * from placas order by $campo $ordem");
          else{
            $sql = $con->prepare("select * from placas where 
            $campo $operador ? order by $campo $ordem");
            $sql->bindParam(1, $valor);
          }
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $gpuLista = array();

            while($registro = $sql->fetch()){
                $placa = new GPU(
                    $registro["codigo"],
                    $registro["nome"],
                    $registro["marca"],
                    $registro["modelo"],
                    $registro["memoria"],
                    $registro["tipo_memoria"],
                    $registro["clock"],
                    $registro["foto"],
                    $registro["bit"]
                );
                $gpuLista[] = $placa;
            }
            return $gpuLista;
        }
    }

?>