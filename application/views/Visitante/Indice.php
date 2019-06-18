<div class="container" >
    <h2 class="text-danger"> Índices </h2>
    <hr class="bg-info">
    <div class="row col-md-12">
        <div class="col-md-12">



            <?php
            foreach ($header as $key => $in) {
                echo '<div class="card" style="margin-top: 10px;">';
                echo '<div class="card-header text-center bg-danger text-white">' . $in->tipo . '</div>';
                echo '<div class="card-body">';
                echo '<table class="table text-center">';
                echo '<thead  class="thead">';
                echo '<tr>';
                echo '<th scope="col"> Referente </th>';
                echo '<th scope="col"> Variação(%) </th>';
                echo '<th scope="col"> Valor(R$) </th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
               
                
                 foreach ($indices as $key => $values) {
                     if($values->tipo==$in->tipo){
                      echo '<tr>';
                         echo '<td scope="row">' . $values->data . '</td>';
                         echo '<td scope="row">' . $values->percentual . '</td>';
                         echo '<td scope="row">' . $values->valor . '</td>';
                     echo '</tr>';
                     
                     }
                 }
                
               


                echo '</tbody>';

                echo '</table>';
                echo '</div>';
                echo '</div>';
            }
            ?>


        </div>
    </div>
</div>
</body>
</html>