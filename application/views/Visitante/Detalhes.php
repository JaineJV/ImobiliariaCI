<div class="container ">
    <h2 class="text-danger" style="margin-top: 10px;"> Sobre o Imóvel </h2>
    <hr class="bg-info">
<div class="row col-12">

<?php
foreach ($imovel as $i){
    if( $i->id_imovel){
    echo '<div class="col-md-6">';
    echo '<h4 class="text-danger"> Características do Imóvel </h4>';
    echo '<hr>';
    echo '<p> Código: '.$i->id_imovel.'</p>';
    echo '<p> Categoria: '.$i->nomeCategoria.'</p>';
    echo '<p> Operador: '.$i->nomeOperador.'</p>';
    echo '<p> Banheiro: '.$i->numero_banheiro.'</p>';
    echo '<p> Dormitório: '.$i->quantidade_dormitorio.'</p>';
    echo '<p> Garagem: '.$i->numero_garagem.'</p>';
    echo '<p> Cozinha: '.$i->cozinha.'</p>';
    echo '<p> Número Residencial: '.$i->numero_residencial.'</p>';
    echo '<p> Sala de Estar: '.$i->sala_estar.'</p>';
    echo '<p> Área Construída: '.$i->area_construida.' m²</p>';
    echo '<p> Área Total: '.$i->area_total.' m²</p>';
    echo '<p> Valor: R$'.$i->preco_imovel.',00</p>';
    echo '</div>';
    echo '<img class="img-fluid col-md-6 mb-2" style="max-height:500px; max-width:500px;" src="' . $this->config->base_url() . 'Imagens/' . $i->imagem . '">';
}}
?>
</div>
</div>