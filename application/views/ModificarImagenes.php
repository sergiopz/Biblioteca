<!DOCTYPE html>
<html>

	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
<body>
	<div id="bimba">

		<?php

		echo form_open_multipart("Libros/UploadPaginas");
        //echo form_open("peliculas/insertPeliculas");
        //id : <input type='text' name='id'/><br/>

        echo "
            <fieldset>
                
               
                Despues de la pagina <input type='text' name='pagina'/><br/>
                cartel: <input type='file' name='files' /><br/>  ";
              
            echo "<br/>
                </fieldset>
            ";

       

        echo"       
                <input type='hidden' name='do' value='insertPelicula'/>
                <input  type='submit' name='Enviar' value='Insertar'/>
                </form>
        ";

         ?>     
            



		<div id="cualquiera">
			<?php  
			
			$directorio = "assets/libros/9";
			$arrayPag = scandir($directorio);
			$num_pag = count($arrayPag)-1;
			echo $num_pag;
			
			
				echo "<table>";
					echo "<tr>";
						for($i = 1;$i<$num_pag;$i++){
								if($i%4==0){
									echo "</tr>";
									echo "<tr>";
								}
									echo "<td>";
									
									
									echo "<img src='".base_url("assets/libros/9/$i.jpg")."' height='200px' width='150px'>".
											
												"<input type='hidden' name='id' value=''>".
												"<input type='hidden' name='num_pag' value='$num_pag'>".
												"<input type='hidden' name='pagina_ant' value='".($i-1)."'>";

													echo "<a href='".site_url("Libros/deletepag/9/$i/$num_pag")."' class='btnBorrar'>Borrar</a> ";

													echo "<a href='".site_url("Libros/cambiarDerecha/9/$i")."' class=''>derecha</a> <br>";

													echo "<a href='".site_url("Libros/cambiarIzquierda/9/$i")."' class=''>izquierda</a>";
										
												
								
									echo "<p class='numeroPagina'>$i</p>";
								echo "</td>";

								echo "
									</form>
									<br>
									<br>
									<br><br>";

							}
					echo "</tr>";
				echo "</table>";		
					
			?>
		</div>
	</div>	
</body>

</html>

