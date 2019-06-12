<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página do Administrador</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7a19d3ed6e.js"></script>
    </head>

    <style>
        #footer{
            margin-top: 10px; position:absolute;
            bottom:auto;
            width:100%;
        }
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
                    <div class="col-md-5">
                        <a class="navbar-brand" href="#"><img class="bg-light" src="../ImobiliariaCI/Imagens/logo.png" alt="LOGO"/>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="navbar-brand" href="#" style="margin-top: 30px;">
                            <h2> <i class="fas fa-user-cog" style="color: red;"></i>
                                Administrador </h2>
                        </a>
                    </div>
                </div>

            </div>
            <div class="justify-content-end">
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Admin/cadastrar" style="margin-top: 30px;" alt="Cadastrar mais Administradores">
                    <i class="fas fa-users-cog"></i>
                </a>
            </div>
        </nav>
