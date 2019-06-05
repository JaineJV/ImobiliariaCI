<!DOCTYPE html>
<!--
@ Vianna
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Imobiliaria Colinas </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../ImobiliariaCI/Estilo.css">

    </head>
    <body>
        <nav id="fixo" class="navbar navbar-expand-lg navbar-light bg-light" style="height: 100px;">
            <div class="container">
                <div class="row col-12">
                    <a class="navbar-brand" href="#"><img class="bg-light" src="../ImobiliariaCI/Imagens/logo.png" alt="LOGO"/></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end col-8" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <div class="dropdown col-md-6">
                                <button class="btn btn-light dropdown-toggle text-danger" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Imóveis
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button">Alugar</button>
                                    <button class="dropdown-item" type="button">Comprar</button>
                                </div>
                            </div>
                            <a class="nav-item nav-link col-md-6 text-danger" href="<?= $this->config->base_url() . 'Indices/listar'; ?>">Índices</a>
                            <a class="nav-item nav-link col-md-6 text-danger" href="<?= $this->config->base_url() . 'Sobre/mostrar'; ?>">Sobre</a>
                            <a class="nav-item nav-link col-md-6 text-danger" href="#">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <figure class="">
            <span class="trs next"></span>
            <span class="trs prev"></span>

            <div id="slider">
                <a href="#" class="trs">
                    <img src="../ImobiliariaCI/Imagens/slide.jpg" alt=""/>
                </a>
                <a href="#" class="trs">
                    <img src="../ImobiliariaCI/Imagens/slidee.jpg" alt=""/>
                </a>
                <a href="#" class="trs">
                    <img src="../ImobiliariaCI/Imagens/Saomiguel2.jpg" alt=""/>
                </a>
            </div>


            <figcaption></figcaption>
        </figure>
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header bg-danger text-light">BUSCAR IMÓVEL</h5>
                    <div class="card-body">
                        <div action="" method="POST">
                            <input type="hidden" name="id" value="<?= (isset($imovel)) ? $imovel->id : ''; ?>">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="id_operador">Operador</label><br>
                                    <select id="id_operador" class="form-control" name="id_operador">
                                        <option selected>Selecione um Operador...</option>
                                        <?php
                                        foreach ($operadores as $key => $o) {
                                            ?> 

                                            <option value="<?= $o->id ?>"><?= $o->cd_operador ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="id_cidade">Cidade</label><br>
                                    <select id="id_cidade" class="form-control" name="id_cidade">
                                        <option selected>Selecione uma Cidade...</option>
                                        <?php
                                        foreach ($cidades as $key => $ci) {
                                            ?> 

                                            <option value="<?= $ci->id ?>"><?= $ci->cd_cidade ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="id_categoria">Categoria</label><br>
                                    <select id="id_categoria" class="form-control" name="id_categoria">
                                        <option selected>Selecione uma Categoria...</option>
                                        <?php
                                        foreach ($categorias as $key => $ca) {
                                            ?> 

                                            <option value="<?= $ca->id ?>"><?= $ca->cd_categoria ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Bairro</label><br>
                                    <select id="" class="form-control" name="id_bairro">
                                        <option selected>Selecione um Bairro...</option>
                                        <?php
                                        foreach ($bairros as $key => $b) {
                                            ?> 

                                            <option value="<?= $b->id ?>"><?= $b->cd_bairro ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 10px;">
                                <div class="col-md-3">
                                    <label for="">Dormitórios</label><br>
                                    <select id="" class="form-control" name="qtd_dormitorio">
                                        <option selected>Selecione o N° de Dormitórios...</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3 ou mais</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="qtd_banheiro">Banheiros</label><br>
                                    <select id="qtd_banheiro" class="form-control" name="qtd_banheiro">
                                        <option selected>Selecione o N° de Banheiros...</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3 ou mais</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="qtd_garagem">Garagem</label><br>
                                    <select id="qtd_garagem" class="form-control" name="qtd_garagem">
                                        <option selected>Selecione o N° de Garagens...</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3 ou mais</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="vlminimo">Valor Mínimo</label><br>
                                    <select id="vlminimo" class="form-control" name="vlminimo">
                                        <option></option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="vlmaximo">Valor máximo</label><br>
                                    <select id="vlmaximo" class="form-control" name="vlmaximo">
                                        <option></option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-danger col-md-3" id="buscar" style="margin-top: 10px;">BUSCAR</a>
                        </div>
                    </div>
                </div>
            </div>


