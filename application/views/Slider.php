 <figure class="">
            <span class="trs next"></span>
            <span class="trs prev"></span>

            <div id="slider">
                <?php
                foreach ($sliders as $s){?>
                <a href="<?= $this->config->base_url() ?>Empresa/sobre" class="trs">
                    <?php
                echo '<img src="'. $this->config->base_url() . 'uploads/' . $s->imagem .'" alt=""/>';
                ?>
                </a>;
                
                <?php
                } 
                        ?>
            </div>