<div class="container">
    <h2 class="text-danger" style="margin-top:10px;"> Resultado da Busca </h2>
    <hr class="bg-info">
</div>



<div class="alert alert-light mt-3 " role="alert">
                <?php
                $mensagem = $this->session->flashdata('mensagem');
                if (isset($mensagem)) {
                    echo $mensagem;
                }
                ?>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                        <?php
                        if(count($imoveis)>0){
                        foreach ($imoveis as $i) {
                            if($i->status == 1){
                            echo '<button type="button" class="btn btn-light mr-4 mb-3 mt-4 shadow text-center"><img class="img-fluid mb-2" style="max-height:200px; max-width:200px;" src="' . $this->config->base_url() . 'Imagens/' . $i->imagem . '">';
                            echo '<hr>';
                            echo '<h6 "> Valor: R$' . $i->preco_imovel . '</h6>';
                            echo '<h6 class="mb-5"> Bairro: ' . $i->nomeBairro . '</h6>';
                            echo '<a href="' . $this->config->base_url() . 'Imovel/detalhes/' . $i->id_imovel . '" class="btn btn-danger"><i class="far fa-edit"></i> DETALHES </a>';
                            echo '</button>';
                        }
                        
                            }
                        }else{
                            echo "<div class='alert alert-warning'>Nenhum imóvel encontrado.</div>";
                        }
                        ?>
                </div>
            </div>