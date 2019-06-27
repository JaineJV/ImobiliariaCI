<div class="container" style="margin-top: 10px">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header bg-danger text-light">BUSCAR IMÓVEL</h5>
            <div class="card-body">
                <form action="<?= $this->config->base_url(); ?>Buscar" method="POST">
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="nomeOperador">Operador</label><br>
                            <select id="nomeOperador" class="form-control" name="nomeOperador">
                                <option value="0" selected required="required">Selecione um Operador...</option>
                                <?php
                                foreach ($operadores as $key => $o) {
                                    ?> 

                                    <option value="<?= $o->id_operador ?>"><?= $o->tipo_operador ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="nomeCidade">Cidade</label><br>
                            <select id="nomeCidade" class="form-control" name="nomeCidade">
                                <option value="0" selected>Selecione uma Cidade...</option>
                                <?php
                                foreach ($cidades as $key => $ci) {
                                    ?> 

                                    <option value="<?= $ci->id_cidade ?>"><?= $ci->nome_cidade ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="nomeCategoria">Categoria</label><br>
                            <select id="nomeCategoria" class="form-control" name="nomeCategoria">
                                <option value="0" selected>Selecione uma Categoria...</option>
                                <?php
                                foreach ($categorias as $key => $ca) {
                                    ?> 

                                    <option value="<?= $ca->id_categoria ?>"><?= $ca->nome_categoria ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="nomeBairro">Bairro</label><br>
                            <select id="nomeBairro" class="form-control" name="nomeBairro">
                                <option value="0" selected>Selecione um Bairro...</option>
                                <?php
                                foreach ($bairros as $key => $b) {
                                    ?> 

                                    <option value="<?= $b->id_bairro ?>"><?= $b->nome_bairro ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="text-center">

                        <button type="submit" class="btn btn-danger col-md-3" value="Submit" style="margin-top: 10px;">BUSCAR</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>