<?php
    class GPU{
        //PRIMEIRO: ATRIBUTOS (CARACTERISTICAS = VARIAVEIS)
        private $codigo;
        private $nome;
        private $modeloGPU;
        private $marca;
        private $foto;
        private $memoria;
        private $tipo_memoria;
        private $clock;
        private $bit;

        //SEGUNDO: MÉTODOS (AÇÕES = FUNCTIONS)

        //CONSTRUTOR: método que diz como um novo objeto da classe deve ser construido
        public function __construct($codigo, $nome, $modeloGPU, $marca, $foto, $memoria,$tipo_memoria,
        $clock, $bit){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->modeloGPU = $modeloGPU;
            $this->marca = $marca;
            $this->foto = $foto;
            $this->memoria = $memoria;
            $this->tipo_memoria = $tipo_memoria;   
            $this->clock = $clock;
            $this->bit =  $bit;
        }

        //GETTERS: métodos que devolvem o valor de um atributo
        public function getCodigo(){
            return $this->codigo;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function getModelo(){
            return $this->modeloGPU;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function getFoto(){
            return $this->foto;
        }

        public function getMemoria(){
            return $this->memoria;
        }

        public function getTipo_memoria(){
            return $this->tipo_memoria;
        }

        public function getClock(){
            return $this->clock;
        }

        public function getBit(){
            return $this->bit;
        }

        //SETTERS: métodos que permitem alterar o valor de um atributo
        public function setNome($novonome){
            $this->nome = $novonome;
        }

        public function setModeloGPU($novamodeloGPU){
            $this->modeloGPU = $novamodeloGPU;
        }

        public function setMarca($novamarca){
            $this->marca = $novamarca;
        }

        public function setFoto($novafoto){
            $this->foto = $novafoto;
        }

        public function setMemoria($novaMemoria){
            $this->memoria = $novaMemoria;
        }

        public function setTipoMemoria($novatipo_memoria){
            $this->tipo_memoria = $novatipo_memoria;
        }

        public function setClock($novaClock){
            $this->clock = $novaClock;
        }

        public function setBit($novaBit){
            $this->bit= $novaBit;
        }
        //TOSTRING: método que retorna o objeto em forma de um texto
        public function __toString(){
            $texto = "";
            $texto = $texto . "Nome: " . $this->nome . "<br>";
            $texto = $texto . "Modelo: " . $this->modeloGPU . "<br>";
            $texto = $texto . "Marca: " . $this->marca . "<br>";
            $texto = $texto . "Quantidade de memória: " . $this->memoria . "<br>";
            $texto = $texto . "Tipo de memória: " . $this->tipo_memoria . "<br>";
            $texto = $texto . "Clock base: " . $this->clock . "<br>";
            $texto = $texto . "Bit: " . $this->bit . "<br>";
            return $texto;
        }

        //MÉTODOS ESPECIAIS: qualquer método que não seja construct, get, set ou toString

    }


?>