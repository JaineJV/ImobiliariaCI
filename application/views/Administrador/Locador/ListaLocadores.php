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
                        <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Admin">
                            <h2> <i class="fas fa-user-cog" style="color: red;"></i>
                                Administrador </h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Locador/cadastrar" style="margin-top: 30px;" alt="Cadastrar mais Locadores">
                    <button type="submit" class="btn btn-outline-danger">CADASTRAR</button>
                </a>
            </div>
        </nav>
        
        
<div class="container" >
    <div class="row justify-content-md-center">
        <table class="table table-bordered bg-white text-center" style="margin-top: 10px;">
            <thead  class="thead-light">
                <tr>
                    <th scope="col"> Nome: </th>
                    <th scope="col"> CPF: </th>
                    <th scope="col"> Telefone: </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Ações </th>
                </tr>     
            </thead>
            <tbody>
                <?php
                foreach ($locadores as $key => $l) {
                    echo '<tr>';
                    echo '<td scope="row">' . $l->nome_locador . '</td>';
                    echo '<td scope="row">' . $l->cpf . '</td>';
                    echo '<td scope="row">' . $l->telefone . '</td>';
                    echo '<td scope="row">' . $l->email. '</td>';
                    echo '<td scope="row" style="text-align: center;">'
                    . '<a href="' . $this->config->base_url() . 'Locador/alterar/' . $l->id_locador . '" class="btn btn-danger" style="margin-right:4px;"><i class="far fa-edit"></i> Alterar </a>'
                    . '<a href="' . $this->config->base_url() . 'Locador/deletar/' . $l->id_locador . '" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i> Deletar </a></td>';

                    echo '</tr>';
                }
                ?>

            </tbody>

        </table>
    </div>
</div>
        
    </body>
</html>