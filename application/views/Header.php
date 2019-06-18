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
                    <a class="navbar-brand" href="<?= $this->config->base_url(); ?>"><img class="bg-light" src="../ImobiliariaCI/Imagens/logo.png" alt="LOGO"/></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end col-8" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link col-md-6 text-danger" href="<?= $this->config->base_url() . 'Imovel/listarVisitante'; ?>">Imóveis</a>
                            <a class="nav-item nav-link col-md-6 text-danger" href="<?= $this->config->base_url() . 'Indice/mostrarVisitante'; ?>">Índices</a>
                            <a class="nav-item nav-link col-md-6 text-danger" href="<?= $this->config->base_url() . 'Empresa/mostrarVisitante'; ?>">Sobre</a>
                            <a class="nav-item nav-link col-md-6 text-danger" href="<?= $this->config->base_url() . 'EmailController'; ?>">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

       




