<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Login do Administrador - Sistema Imobiliaria</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <style>

            /*body {background-size: cover;}*/
            /*Você também pode centralizar o background utilizando o seguinte código: background-position: center;. Exemplo:*/

            body {background-size: cover; background-position: center;}
            /*Se o seu tema não tiver a opção de carregar uma imagem de fundo, então você pode carregá-la utilizando o seguinte código: background-image:url('LINK');. Exemplo:*/

            body {background-size: cover; background-image: url('https://jooinn.com/images/abstract-red-background-3.png');}
        </style>

    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card mx-auto" style="max-width: 300px;">
                <div class="card-header bg-danger text-light"> Login Administrador </div>
                <div class="card-body">
                    <?php
                    $mensagem = $this->session->flashdata('mensagem');
                    if (isset($mensagem)) {
                        echo $mensagem;
                    }
                    ?>
                    <form action="" method="POST" name="login">
                        <div class="form-group">
                            <label for="email">E-mail: </label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="senha"> Senha: </label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger text-center"><i class="fas fa-check"></i> Acessar </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
