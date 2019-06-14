<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página do Administrador</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7a19d3ed6e.js"></script>
    </head>

    <style>

        /*body {background-size: cover;}*/
        /*Você também pode centralizar o background utilizando o seguinte código: background-position: center;. Exemplo:*/

        body {background-size: cover; background-position: center;}
        /*Se o seu tema não tiver a opção de carregar uma imagem de fundo, então você pode carregá-la utilizando o seguinte código: background-image:url('LINK');. Exemplo:*/

        body {background-size: cover; background-image: url('https://www.bing.com/th?id=OIP.Z8wavCrXBj8WmuC6RUrgXgHaFj&pid=Api&rs=1&p=0');}
    </style> 

    <body>

        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <div class="row col-12">
                    <div class="col-md-4">
                        <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Admin">
                            <h2> <i class="fas fa-user-cog" style="color: red;"></i>
                                Administrador </h2>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container" style="margin-top: 20px;">
            <div class="row justify-content-md-center">
                <div class="col-12 align-self-center">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cadastro de Imóvel</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-row">
                                    <input type="hidden" name="id" value="<?= (isset($imovel)) ? $imovel->id_imovel : ''; ?>">

                                    <div class="form-group col-md-4">
                                        <label for="cd_locador" style="margin-left: 10px; margin-top: 10px"> Locador: </label>
                                        <select id="cd_locador" class="form-control" name="cd_locador">
                                            <option selected>Selecione um Locador...</option>
                                            <?php
                                            foreach ($locadores as $key => $l) {
                                                ?> 

                                                <option value="<?= $l->id_locador ?>"><?= $l->nome_locador ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="numero_garagem" style="margin-left: 10px; margin-top: 10px"> Vaga de Garagem: </label>
                                        <input type="text" name="numero_garagem" id="numero_garagem" class="form-control" value="<?= (isset($imovel)) ? $imovel->numero_garagem : ''; ?>" >
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="quantidade_dormitorio" style="margin-left: 10px; margin-top: 10px"> Dormitórios: </label>
                                        <input type="text" name="quantidade_dormitorio" id="quantidade_dormitorio" class="form-control" value="<?= (isset($imovel)) ? $imovel->quantidade_dormitorio : ''; ?>" >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="preco_imovel" style="margin-left: 10px; margin-top: 10px"> Preço do Imóvel: </label>
                                        <input type="text" name="preco_imovel" id="preco_imovel" class="form-control" value="<?= (isset($imovel)) ? $imovel->preco_imovel : ''; ?>">
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="area_total" style="margin-left: 10px; margin-top: 10px"> Área Total/Terreno: </label>
                                        <input type="text" name="area_total" id="area_total" class="form-control" value="<?= (isset($imovel)) ? $imovel->area_total : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="area_construida" style="margin-left: 10px; margin-top: 10px"> Área Construída: </label>
                                        <input type="text" name="area_construida" id="area_construida" class="form-control" value="<?= (isset($imovel)) ? $imovel->area_construida : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="cd_rua" style="margin-left: 10px; margin-top: 10px"> Rua: </label>
                                        <select id="cd_rua" class="form-control" name="cd_rua">
                                            <option selected>Selecione uma Rua...</option>
                                            <?php
                                            foreach ($ruas as $key => $r) {
                                                ?> 

                                                <option value="<?= $r->id_rua ?>"><?= $r->nome_rua ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="numero_residencial" style="margin-left: 10px; margin-top: 10px"> Número Residêncial: </label>
                                        <input type="text" name="numero_residencial" id="numero_residencial" class="form-control" value="<?= (isset($imovel)) ? $imovel->numero_residencial : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cd_categoria" style="margin-left: 10px; margin-top: 10px"> Categoria: </label>
                                        <select id="cd_categoria" class="form-control" name="cd_categoria">
                                            <option selected>Selecione uma Categoria...</option>
                                            <?php
                                            foreach ($categorias as $key => $ca) {
                                                ?> 

                                                <option value="<?= $ca->id_categoria ?>"><?= $ca->nome_categoria ?></option>
                                            <?php }
                                            ?>
                                        </select>    
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sala_estar" style="margin-left: 10px; margin-top: 10px"> Sala de Estar: </label>
                                        <input type="text" name="sala_estar" id="sala_estar" class="form-control" value="<?= (isset($imovel)) ? $imovel->sala_estar : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="numero_banheiro" style="margin-left: 10px; margin-top: 10px"> Quantidade de Banheiros: </label>
                                        <input type="text" name="numero_banheiro" id="numero_banheiro" class="form-control" value="<?= (isset($imovel)) ? $imovel->numero_banheiro : ''; ?>">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="cozinha" style="margin-left: 10px; margin-top: 10px"> Quantidade de Cozinhas: </label>
                                        <input type="text" name="cozinha" id="cozinha" class="form-control" value="<?= (isset($imovel)) ? $imovel->cozinha : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="area_servico" style="margin-left: 10px; margin-top: 10px"> Área de Serviço: </label>
                                        <input type="text" name="area_servico" id="area_servico" class="form-control" value="<?= (isset($imovel)) ? $imovel->area_servico : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="input-group md-12">
                                            <div class="custom-file">
                                                <input type="file" name="userfile" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                                <label class="custom-file-label" for="inputGroupFile03">Selecione uma foto para o Imóvel...</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (!empty($imovel->imagem) && file_exists('./uploads/' . $imovel->imagem)) {
                                        echo '<div class="form-group text-center"><img src="' . base_url('uploads/' . $imovel->imagem) . '" width="100" height="100"></div>';
                                    }
                                    ?>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger" value="Submit">Salvar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
