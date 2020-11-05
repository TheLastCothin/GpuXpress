<?php

    class GpuView{

        public static function gerarCard($gpu){
            $nomeGPU = $gpu->getNome();
            $modelo = $gpu->getModelo();
            $marca = $gpu->getMarca();
            $foto = $gpu->getFoto();
            $memoria = $gpu->getMemoria();
            $tipo_memoria = $gpu->getTipo_memoria();
            $clock = $gpu->getClock();
            $bit = $gpu->getBit();
           
            echo "
            <div class='row featurette'>
			<div class='col-md-5'>
				<img class='featurette-image img-fluid mx-auto img-thumbnail' data-src='holder.js/500x500/auto' alt='500x500' style='background-color: rgba(0,0,0,0.9); color: white; width: 600px; height: 450px;' src='img/$clock' data-holder-rendered='true'>
			</div>
			<div class='col-md-7 order-md-2' style='color: white;'>
                <br>
                <br>
				<h1 class='featurette-heading'>$nomeGPU</h1>
                <h2 class='featurette-heading'>$marca</h2>
                <h2 class='featurette-heading'>$modelo</h2>
				<h2 class='featurette-heading'>$memoria</h2>
                <h2 class='featurette-heading'>Clock Base:$tipo_memoria MHz</h1>	
                <h2 class='featurette-heading'>$bit-Bit</h1>
              
			</div>
		</div>
           ";
        }//public static gerarCard
    }//Class GPUview
?>