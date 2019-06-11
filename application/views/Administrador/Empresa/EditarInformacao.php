<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Página do Administrador</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
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
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Empresa/mostrar"><button id="visualizar" name="visualizar" type="submit" class="btn btn-danger btn-lg" value="Submit">Visualizar Texto</button></a>
            </div>
        </nav>
        <div id="summernote" ></div>

        <div class="text-center" style="margin-top: 10px;">
            <button id="salvarSobre" name="salvarSobre" onclick="myFunction()" type="submit" class="btn btn-danger btn-lg" value="Submit">Salvar</button>
        </div>

        <script>
            $('#summernote').summernote({
                placeholder: 'Escreva aqui um pouco mais sobre a Empresa...',
                tabsize: 2,
                height: 500
            });
            function myFunction() {
                var sobreEmpresa = $('#summernote').summernote('code');
                console.log(sobreEmpresa);
            }
        </script>

    </body>
</html>