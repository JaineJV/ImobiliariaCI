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
                        <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Admin/pagina">
                            <h2> <i class="fas fa-user-cog" style="color: red;"></i>
                                Administrador </h2>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        $mensagem = $this->session->flashdata('mensagem');
        echo(isset($mensagem) ? $mensagem : '');
        ?>
        <div class="container" style="margin-top: 20px;">
            <div class="row justify-content-md-center">
                <div class="col-12 align-self-center">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cadastro de Imagem para o Slider</h3>
                        </div>
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="POST">
                                <div class="form-row">
                                    <input type="hidden" name="id" value="<?= (isset($slider)) ? $slider->id_slider : ''; ?>">

                                    <div class="form-group col-md-3">
                                        <label for="legenda" style="margin-left: 10px; margin-top: 10px"> Legenda para Imagem: </label>
                                        <input type="text" name="legenda" id="legenda" class="form-control" value="<?= (isset($slider)) ? $slider->legenda : ''; ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="input-group md-12">
                                            <div class="custom-file">
                                                <input type="file" name="userfile" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                                <label class="custom-file-label" for="inputGroupFile03">Selecione uma Imagem...</label>
                                            </div>
                                        </div>

                                        <?php
                                        if (!empty($slider->imagem) && file_exists('./uploads/' . $slider->imagem)) {
                                            echo '<div class="form-group text-center"><img src="' . base_url('uploads/' . $slider->imagem) . '" width="100" height="100"></div>';
                                        }
                                        ?>
                                    </div>
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
