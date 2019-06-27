
<div class="container">
<div class="row text-center">
    
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class = "carousel-item active">
            <img src = "<?= base_url('uploads/588ee1571edbf13a06dd966893f02478.png') ?>" class = "d-block img-fluid" alt = "...">
        </div>
        <?php
        foreach ($sliders as $s) {
            if($s->imagem !== '588ee1571edbf13a06dd966893f02478.png'){
            echo '<div class = "carousel-item">';
            echo '<img src = "' . base_url('uploads/' . $s->imagem) . '" class = "d-block img-fluid w-100" alt = "...">';
            echo '</div>';
            }
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>