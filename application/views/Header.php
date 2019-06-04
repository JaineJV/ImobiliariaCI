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
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="operador">Operador</label><br>
                                <select id="operador" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="cidade">Cidade</label><br>
                                <select id="cidade" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Categoria</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Bairro</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row" style="margin-top: 10px;">
                            <div class="col-md-3">
                                <label for="">Dormitórios</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Banheiros</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="">Garagem</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="">Valor Mínimo</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="">Valor máximo</label><br>
                                <select id="" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                        </div>
                        <div class="text-center">
                        <a href="#" class="btn btn-danger col-md-3" id="buscar" style="margin-top: 10px;">BUSCAR</a>
                        </div>
                    </div>
                </div>
            </div>
      

