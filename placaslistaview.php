<?php

    class PlacaListaView{

        public static function geraLista($lista){

            echo "
            <form action='cadastro.php' method='post'>
                <div class='row' style='background-color:#555555; color:#FFFFFF;'>
                    <div class='col-md-1'>

                    </div>
                    <div class='col-md-1 text-center'>
                        Código
                    </div>
                    <div class='col-md-3'>
                        Nome
                    </div>
                    <div class='col-md-1'>
                        Modelo
                    </div>
                    <div class='col-md-1'>
                        Marca
                    </div>
                    <div class='col-md-1'>
                        Memória
                    </div>
                    <div class='col-md-2'>
                        Tipo de memória
                    </div>
                    <div class='col-md-1'>
                        Clock
                    </div>
                    <div class='col-md-1'>
                        Bit
                    </div>
                </div>
            ";

            $cont = 0;

            foreach($lista as $gpu){
                    $cont++;
                    $cor = "#BBBBBB";
                    if($cont%2 == 0){
                        $cor = "#DDDDDD";
                    }
                 
                    $codigo =  $gpu->getCodigo();
                    $nome =  $gpu->getNome();
                    $modelo =  $gpu->getModelo();
                    $marca =  $gpu->getMarca();
                    $memoria =  $gpu->getMemoria();
                    $tipo_memoria =  $gpu->getTipo_memoria();
                    $clock =  $gpu->getClock();
                    $foto =  $gpu->getFoto();
                    $bit = $gpu->getBit();

                    echo "
                        <div class='row' style='background-color: $cor; border: 1px solid #AAAAAA;'>
                            <div class='col-md-1 semEspaco' style='padding-left: 0 !important; padding-right: 0 !important; height: 90px; '>
                                <button class='btn' type='submit' name='selPlaca' value= $codigo style='height:100%; width:100%; padding:0px!important;'>
                                    <img src= 'img/$clock ' style='height:100%; width:100%;'>
                                </button> 
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center; justify-content: center;'>
                                <div>$codigo</div>
                            </div>
                            <div class='col-md-3' style='display:flex; align-items:center;'>
                                $nome
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                            $marca
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                             $modelo
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                            $foto
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                            $memoria
                            </div>
                            <div class='col-md-1 offset-md-1 ' style='display:flex; align-items:center;'>   
                           $tipo_memoria
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                            $bit
                            </div>
                            
                            <div class='col-md-1 offset-md-11'>
                            <button class='btn' type='submit' name='selPlaca' value= $codigo style='height:100%; background-color:transparent;'>
                            <img src= 'img/edit.png' style='height:80%; width:80%;'>
                            </button> 
                            </div>
                           

                        </div>
                    ";


            }

            echo "</form>";


        }

    }



?>