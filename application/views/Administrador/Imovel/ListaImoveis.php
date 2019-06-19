<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página do Administrador</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7a19d3ed6e.js"></script>
    </head>



    <body>

        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <div class="row col-12">
                    <div class="col-md-4">
                        <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Admin/pagina">
                            <h2> <i class="fas fa-user-cog" style="color: red;"></i>
                                Administrador </h2>
                        </a>
                    </div>
                </div>
            </div>
        </nav>


        <div class="container" >
            <div class="row justify-content-md-center">
                <table class="table table-bordered bg-white text-center" style="margin-top: 10px;">
                    <thead  class="thead-light">
                        <tr>
                            <th scope="col"> Locador </th>
                            <th scope="col"> Garagem </th>
                            <th scope="col"> Dormitórios </th>
                            <th scope="col"> Preço </th>
                            <th scope="col"> Área Total</th>
                            <th scope="col"> Área Construida</th>
                            <th scope="col"> Rua </th>
                            <th scope="col"> Número Residêncial</th>
                            <th scope="col"> Categoria </th>
                            <th scope="col"> Sala de Estar </th>
                            <th scope="col"> Banheiros </th>
                            <th scope="col"> Cozinha </th>
                            <th scope="col"> Área de Serviço </th>
                            <th scope="col"> Ações </th>
                        </tr>     
                    </thead>
                    <tbody>
                        <?php
                        foreach ($imoveis as $key => $i) {
                            echo '<tr>';
                            echo '<td scope="row">' . $i->nomeLocador . '</td>';
                            echo '<td scope="row">' . $i->numero_garagem . '</td>';
                            echo '<td scope="row">' . $i->quantidade_dormitorio . '</td>';
                            echo '<td scope="row">' . $i->preco_imovel . '</td>';
                            echo '<td scope="row">' . $i->area_total . '</td>';
                            echo '<td scope="row">' . $i->area_construida . '</td>';
                            echo '<td scope="row">' . $i->nomeRua . '</td>';
                            echo '<td scope="row">' . $i->numero_residencial . '</td>';
                            echo '<td scope="row">' . $i->nomeCategoria . '</td>';
                            echo '<td scope="row">' . $i->sala_estar . '</td>';
                            echo '<td scope="row">' . $i->numero_banheiro . '</td>';
                            echo '<td scope="row">' . $i->cozinha . '</td>';
                            echo '<td scope="row">' . $i->area_servico . '</td>';
                            
                            echo '<td scope="row" style="text-align: center;">'
                            . '<a href="' . $this->config->base_url() . 'Imovel/alterar/' . $i->id_imovel . '" class="btn btn-danger col-md-12" style="margin-right:4px;"><i class="far fa-edit"></i></a>'
                            . '<a href="' . $this->config->base_url() . 'Imovel/deletar/' . $i->id_imovel . '" class="btn btn-outline-secondary col-md-12"><i class="far fa-trash-alt"></i></a>'
                            . '<a href="' . $this->config->base_url() . 'Imovel/ocultar' . $i->id_imovel . '" class="btn btn-outline-info col-md-12" style="margin-right:4px;"> Ocultar </a></td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>

    </body>
</html>