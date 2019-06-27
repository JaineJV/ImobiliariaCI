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
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>Slider/cadastrar" style="margin-top: 30px;" alt="Cadastrar mais Locadores">
                    <button type="submit" class="btn btn-outline-danger">CADASTRAR</button>
                </a>
            </div>
        </nav>

        <div class="container mt-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Visualização das Imagens</li>
                </ol>
            </nav>
            <div class="alert alert-light mt-3 " role="alert">
                <?php
                $mensagem = $this->session->flashdata('mensagem');
                if (isset($mensagem)) {
                    echo $mensagem;
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-7">
                        <?php
                        foreach ($sliders as $s) {

                            echo '<button type="button" class="btn btn-light mr-4 mb-3 mt-4 shadow text-center"><img class="img-fluid mb-2" style="max-height:150px; max-width:150px;" src="' . $this->config->base_url() . 'uploads/' . $s->imagem . '">';
                            echo '<hr>';
                            echo '<h6 class="mb-5">' . $s->legenda . '</h6>';
                            echo '<a href="' . $this->config->base_url() . 'Slider/alterar/' . $s->id_slider . '" class="btn btn-danger" style="margin-right:4px;"><i class="far fa-edit"></i> Alterar </a>';
                            echo '<a href="' . $this->config->base_url() . 'Slider/deletar/' . $s->id_slider . '" class="btn btn-outline-secondary"><i class="far fa-edit"></i> Deletar </a>';
                            echo '</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

            
    </body>
</html>