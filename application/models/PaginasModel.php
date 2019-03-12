<?php
    class PaginasModel extends CI_Model {
        
    // Devolver todos los valores de la tabla editorial   
    


    //Modificar una editorial de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function CambiarDerecha($id_libro,$num_pag) {

        $total_imagenes = count(glob('assets/libros/'.$id_libro.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                echo $num_pag ;
                echo $total_imagenes;
                    if ($num_pag<$total_imagenes-1) {
                        //Coge la pagina a la derecha de la que quieres mover y le cambia el nombre
                        $oldDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                        $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                        rename($oldDir,$newDir);
                        //Coge la pagina que quieres mover y la cambia a la derecha
                        $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                        $newDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                        rename($oldDir,$newDir);
                        //Coge la pagina de la derecha y la pone a la del principio
                        $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                        $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                        rename($oldDir,$newDir);
                    }
          
        }

         public function CambiarIzquierda($id_libro,$num_pag) {

            if ($num_pag!=0) {
                    //Coge la pagina a la izquierda de la que quieres mover y le cambia el nombre
                    $oldDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                    $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                    rename($oldDir,$newDir);
                    //Coge la pagina que quieres mover y la cambia a la izquierda
                    $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    $newDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                    rename($oldDir,$newDir);
                    //Muevela pagina a de la izquierda y la pone a la del principio
                    $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                    $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    rename($oldDir,$newDir);

        
                    }
          
        }



         public function Eliminar($id_libro,$num_pag,$cant_pag) {


             $filename="assets/libros/".$id_libro."/".$num_pag.".jpg";
                $res=unlink($filename);

                if($res){
                    for($i=$num_pag;$i<$cant_pag-1;$i++){
                        $oldDir="assets/libros/$id_libro/".($i+1).".jpg";
                        $newDir="assets/libros/$id_libro/".$i.".jpg";
                        rename($oldDir,$newDir);
                    }    
                return $mensaje=1;  

                }
                else{
                   return $mensaje=2;
                }


         }

         
}