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
                <div class="col-4 align-self-center">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cadastro de Operador</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-row text-center">
                                    <input type="hidden" name="id" value="<?= (isset($operador)) ? $operador->id_operador : ''; ?>">
                                    
                                    
                                    <div class="col-md-11 mb-3">
                                        <label for="tipo_operador"> Operador: </label>
                                        <input type="text" name="tipo_operador" id="tipo_operador" class="form-control" value="<?= (isset($operador)) ? $operador->tipo_operador : ''; ?>" style="margin-left: 12px;">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success" value="Submit">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
