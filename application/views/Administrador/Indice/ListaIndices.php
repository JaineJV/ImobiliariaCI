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
            <div class="justify-content-end">
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Indice/cadastrar" style="margin-top: 30px;" alt="Cadastrar mais Locadores">
                    <button type="submit" class="btn btn-outline-danger">CADASTRAR</button>
                </a>
            </div>
        </nav>
        
        
<div class="container" >
    <div class="row justify-content-md-center">
        <table class="table table-bordered bg-white text-center" style="margin-top: 10px;">
            <thead  class="thead-light">
                <tr>
                    <th scope="col"> Tipo </th>
                    <th scope="col"> Data </th>
                    <th scope="col"> Percentual </th>
                    <th scope="col"> Valor </th>
                    <th scope="col"> Ações </th>
                </tr>     
            </thead>
            <tbody>
                <?php
                foreach ($indices as $key => $in) {
                    echo '<tr>';
                    echo '<td scope="row">' . $in->tipo . '</td>';
                    echo '<td scope="row">' . $in->data . '</td>';
                    echo '<td scope="row">' . $in->percentual . '</td>';
                    echo '<td scope="row">' . $in->valor . '</td>';
                    echo '<td scope="row" style="text-align: center;">'
                    . '<a href="' . $this->config->base_url() . 'Indice/alterar/' . $in->id_indice . '" class="btn btn-danger" style="margin-right:4px;"><i class="far fa-edit"></i> Alterar </a>'
                    . '<a href="' . $this->config->base_url() . 'Indice/deletar/' . $in->id_indice . '" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i> Deletar </a></td>';

                    echo '</tr>';
                }
                ?>

            </tbody>

        </table>
    </div>
</div>
        
    </body>
</html>