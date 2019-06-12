<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <title> Cadastro de Usuário - Sistema Imobiliária</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <style>

            /*body {background-size: cover;}*/
            /*Você também pode centralizar o background utilizando o seguinte código: background-position: center;. Exemplo:*/

            body {background-size: cover; background-position: center;}
            /*Se o seu tema não tiver a opção de carregar uma imagem de fundo, então você pode carregá-la utilizando o seguinte código: background-image:url('LINK');. Exemplo:*/

            body {background-size: cover; background-image: url('https://jooinn.com/images/abstract-red-background-3.png');}
        </style>
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        echo(isset($mensagem) ? $mensagem : '');
        ?>

        <div class="container">
            <div class="row justify-content-md-center" style="margin-top: 15%;">
                <div class="card mx-auto">
                <div class="card-header bg-danger text-light"> Cadastro de Administrador </div>
                <div class="card-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <input type="hidden" name="id" value="<?= (isset($admin)) ? $admin->id_admin : ''; ?>">
                        <div class="col-md-11 mb-3">
                            <label for="nome" style="margin-left: 10px; margin-top: 10px"> Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= (isset($admin)) ? $admin->nome : ''; ?>" style="margin-left: 12px;">
                        </div>
                        <div class="col-md-11 mb-3">
                            <label for="email" style="margin-left: 10px;"> Email: </label>
                            <input type="text" name="email" id="email" class="form-control" value="<?= (isset($admin)) ? $admin->email : ''; ?>" style="margin-left: 12px;">
                        </div>
                        <div class="col-md-11 mb-3">
                            <label for="senha" style="margin-left: 10px;"> Senha: </label>
                            <input type="password" name="senha" id="senha" class="form-control" value="" style="margin-left: 12px;">
                        </div>
                    </div>
                    <hr>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <button class="btn btn-warning" type="submit" value="Submit"><i class="far fa-share-square"></i> Enviar </button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>

    </body>
</html>
