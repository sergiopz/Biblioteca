<?php
//Controlador de Autores
    include_once("Seguridad.php");
    class Libros extends Seguridad {
        
        public function __construct() {
            parent::__construct();
            $this->load->model("LibrosModel");
            $this->load->model("InstitutosModel");
            $this->load->model("EditorialesModel");
            $this->load->model("UsuariosModel");
            $this->load->model("AutoresModel");
            $this->load->model("CategoriasModel");
            

        }

/* FUNCION COMENTADA DE PRUEBA
        public function index() {
               if($this->security_check()){
            $this->load->view("example");
        }
            
        }*/

              public function salir() {

                $this->cerrar_sesion();



            
            

          
   
            
        }





        public function ModificarPaginas($id) {
               if($this->security_check()){

          
                   $datos["id"]=$id;



            $this->load->view("ModificarImagenes",$datos);
        

        }
    }


        /*Funcion que carga la vista de libros y sus datos*/ 
        public function VistaAjax() {
            if($this->security_check()){
            $data["listaInstitutos"] = $this->InstitutosModel->getAll();
            $data["listaEditoriales"] = $this->EditorialesModel->getAll();           
            $data["listaUsuarios"] = $this->UsuariosModel->getAll();
            if($this->session->userdata('tipoUsuario')==0){
                $data["listaLibros"] = $this->LibrosModel->getAll();
            }else if($this->session->userdata('tipoUsuario')==1){
                $data["listaLibros"] = $this->LibrosModel->getLibros($this->session->userdata('idUsuario'));
            }
           
            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $data["listaAutoresLibros"] = $this->LibrosModel->getAutoresLibros();
            $data["listaLibrosCategorias"] = $this->LibrosModel->getLibrosCategorias();
            $data["listaAutores"] = $this->AutoresModel->getAll();
            

            $data["nombreVista"] = "LibroAjax";
            $this->load->view("plantilla" , $data);
        }
    }
        /*Funcion que inserta un libro */    
        public function InsertarLibro(){ 
            if($this->security_check()){
            $id=$this->LibrosModel->getMax();
            if($id==0){
                $id=1;
            }
            $isbn = $this->input->get_post("isbn");
            $titulo= $this->input->get_post("titulo");
            $descripcion = $this->input->get_post("descripcion");
            $fecha = $this->input->get_post("fecha");
            $paginas = $this->input->get_post("paginas");
            $idInstituto= $this->input->get_post("idInstituto");
            $idUsuario = $this->session->userdata('idUsuario');
            $idEditorial = $this->input->get_post("idEditorial");
            $idAutor = $this->input->post('idAutor');
            $idCategoria = $this->input->post('idCategoria');


            $r=$this->LibrosModel->InsertarLibro($isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);

            for ($i = $cont=0; $i < count($idAutor); $i++) {
                $autor = $idAutor[$i];
                $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
            }
            for ($i = $cont=0; $i < count($idCategoria); $i++) {
                $categoria = $idCategoria[$i];
                $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
            }
            

            if ($r== 0) { 
                $this->VistaAjax();
                
            } else {
                $this->carpeta($id);
                $this->VistaAjax();
            }
        }
    }


        public function carpeta($id){
            if($this->security_check()){
            $ruta = "assets/libros/$id";
            mkdir($ruta);
        }
    }


        /*Funcion que elimina un libro */
        public function EliminarLibro($id){
            if($this->security_check()){
            $r=$this->LibrosModel->EliminarLibro($id);
            if ($r== 0) { 
                echo"Fallo al eliminar libro";
                
            } else {
                $r1=$this->LibrosModel->EliminarAutorLibro($id);
                $r2=$this->LibrosModel->EliminarLibroCategoria($id);
                if($r1==0 || $r2==0){
                    echo"Fallo al eliminar libro";
                }else{
                echo"Libro eliminado con exito"; 
               } 
            }
        }
    }

        /*Funcion que Modifica un libro */
        public function ModificarLibro(){
            if($this->security_check()){
            $id = $this->input->get_post("id");
            $isbn = $this->input->get_post("isbn");
            $titulo= $this->input->get_post("titulo");
            $descripcion = $this->input->get_post("descripcion");
            $fecha = $this->input->get_post("fecha");
            $paginas = $this->input->get_post("paginas");
            $idInstituto= $this->input->get_post("idInstituto");
            $idUsuario = $this->input->get_post("idUsuario");
            $idEditorial = $this->input->get_post("idEditorial");
            $idAutor = $this->input->get_post('idAutor');
            //var_dump($_POST);
            $idCategoria = $this->input->get_post('idCategoria');

            //Recibe un libro y luego borra los registros de tablas ajenas e inserta las nuevas
            $r=$this->LibrosModel->ModificarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);
            $r1=$this->LibrosModel->EliminarAutorLibro($id);
            for ($i = $cont=0; $i < count($idAutor); $i++) {
                $autor = $idAutor[$i];
                $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
            }
            $r2=$this->LibrosModel->EliminarLibroCategoria($id);
            for ($i = $cont=0; $i < count($idCategoria); $i++) {
                $categoria = $idCategoria[$i];
                $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
            }
            

            if ($r== 0) { 
                $this->VistaAjax();
                
            } else {
                $this->VistaAjax();
            }
        }
    }




public function showintadmin($id){
    if($this->security_check()){

    
        $datos["id"]=$id;
   



        $this->load->view('upload_multiple',$datos);
    }
}


/**
     * Funcion de subida de imagenes libros al servidor
     *
     */

   
           public function Upload($id){
            if($this->security_check()){

            

              
                $resultado_subida = $this->LibrosModel->subirImagenPelicula($id);
                if ($resultado_subida["codigo"] == 1) {
                    // Éxito
                    $img_name=$resultado_subida["mensaje"];
                    //var_dump($img_name);



                    
                $total_imagenes = count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                $oldDir= "assets/libros/".$id."/".$img_name;
                $newDir="assets/libros/".$id."/".$total_imagenes.".jpg";
                $confirm=rename($oldDir,$newDir);
        
                  

                } else {
                    // Fallo
                    $data["mensaje"] = "Error al subir la imagen de la película";
 

                }
                
               
        } 
     }




     public function deletepag($id_libro,$num_pag,$cant_pag){
        if($this->security_check()){

       
    
            $filename="assets/libros/".$id_libro."/".$num_pag.".jpg";
           // echo "numero de pagina ".$num_pag;
          
            $res=unlink($filename);
            //echo $res;

            if($res){
                for($i=$num_pag;$i<$cant_pag-1;$i++){
                    $oldDir="assets/libros/$id_libro/".($i+1).".jpg";
                    $newDir="assets/libros/$id_libro/".$i.".jpg";
                    rename($oldDir,$newDir);
                }
            }


                     
          // header("location:ModificarImagenes.php");


                 //  $datos["id"]=9;

              // $this->load->view("ModificarImagenes",$datos);

        }


                $datos["id"]=$id_libro;



            $this->load->view("ModificarImagenes",$datos);


        

    }


      public function cambiarDerecha($id_libro,$num_pag){
        if($this->security_check()){

             $total_imagenes = count(glob('assets/libros/$id_libro/{*.jpg,*.gif,*.png}',GLOB_BRACE));


            if ($num_pag<$total_imagenes) {
                # code...
            

                
        
                 $oldDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                    $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                    rename($oldDir,$newDir);

            
                    $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    $newDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                    rename($oldDir,$newDir);


                     $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                    $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    rename($oldDir,$newDir);
               
        }
      }
    }

         public function cambiarIzquierda($id_libro,$num_pag){
            if($this->security_check()){

                if ($num_pag!=1) {
                    # code...
                
                
        
                 $oldDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                    $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                    rename($oldDir,$newDir);

            
                    $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    $newDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                    rename($oldDir,$newDir);


                     $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                    $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    rename($oldDir,$newDir);
            }

          
                   //$datos["id"]=$id_libro;



            //$this->load->view("ModificarImagenes",$datos);
            
        }
    }



            public function UploadPaginas(){
                if($this->security_check()){



                         $total_imagenes = count(glob('assets/libros/9/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                         $pagina = $this->input->get_post("pagina");
                         $id = $this->input->get_post("idlibro");

                         echo $pagina;
                        

                    

                      
                        $resultado_subida = $this->LibrosModel->subirImagenPelicula($id);
                        if ($resultado_subida["codigo"] == 1) {
                            // Éxito
                            $img_name=$resultado_subida["mensaje"];
                            echo $img_name;
                            //var_dump($img_name);



                            
                       
                       for($i=$total_imagenes;$i>=$pagina;$i--){
                            $oldDir="assets/libros/".$id."/".$i.".jpg";
                            $newDir="assets/libros/".$id."/".($i+1).".jpg";
                            rename($oldDir,$newDir);
                        }

                            //$cambio = count(glob('assets/libros/9/{*.jpg,*.gif,*.png}',GLOB_BRACE));


                            $oldDir="assets/libros/".$id."/".$img_name;
                            $newDir="assets/libros/".$id."/".$pagina.".jpg";
                            rename($oldDir,$newDir);

                         //$this->SustitucionPagina($img_name, $pagina);
                          //$this->SustitucionPagina($img_name, $pagina);









                          

                        } else {
                            // Fallo
                           
         

                        }

                        //$datos["id"]=$id;



            //$this->load->view("ModificarImagenes",$datos);

            redirect("http://localhost/biblioteca/index.php/libros/ModificarPaginas/9");


            }
                
      }

}
