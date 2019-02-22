     <?php

     for ($i = 0; $i < count($listaBusqueda); $i++) {
          $bus = $listaBusqueda[$i];
          //echo $bus->id;

                 echo "<img src='".base_url("assets/libros/".$bus->id."/1.jpg")."' >";
             }
     ?>


