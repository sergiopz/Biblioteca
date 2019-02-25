     <?php

     for ($i = 0; $i < count($listaBusqueda); $i++) {
          $bus = $listaBusqueda[$i];
          //echo $bus->id;

                 //echo "<img src='".base_url("assets/libros/".$bus->id."/1.jpg")."' >";
                 //echo $bus->titulo; 



                 echo"




                 <div class='card' style='width: 18rem;'>

                 <a href='#'><img class='card-img-top'  src='".base_url("assets/libros/".$bus->id."/1.jpg")."' ></a>


                

					 
					  <div class='card-body'>
					    <h5 class='card-title'>$bus->titulo</h5>
					    
					    <a href='#' class='btn btn-primary'>Ver libro</a>
					  </div>
				</div>";











             }
     ?>


