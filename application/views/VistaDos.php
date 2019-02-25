     <?php
      echo "<div class='container librosBuscados'>";
      echo "<h2 id='lastBooks' class='display-4 text-left'>Busqueda: $tituloBuqueda</h2>";
      echo "<div class='row' >";
      for ($i = 0; $i < count($listaBusqueda); $i++) {
          $bus = $listaBusqueda[$i];

          echo"

          <div class='col-3'>
            <div class='card' style='width: 18rem;'>

              <a href='".site_url("Buscador/Visor/$bus->id")."'><img class='card-img-top'  src='".base_url("assets/libros/".$bus->id."/0.jpg")."' ></a>

					    <div class='card-body'>
					      <h5 class='card-title text-center'>$bus->titulo</h5> 
					      <a href='#' class='btn btn-primary center'>Ver libro</a>
              </div>
 
				    </div>
          </div>
          <div class='col-1'></div>";
          
        }
          echo "</div>
          </div>";
     ?>


