<?php
/**
 * Controlador de Biblioteca.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla Libros.
 * Permite insertar, eliminar, modificar y consultar la tabla Libros.
 * @author Marc Expósito 2018
 * @author Manuel Gonzalez 2018
 * @author Francisco Alejandro Lopez 2018
 */
class Prueba extends CI_Controller {


		public function index() {
		$this->showintadmin();
	}
/**
 * Muestra una tabla con los datos de la tabla Libros.
 */
	public function showintadmin()
	{

		$this->load->view('upload_multiple');
	}


/**
	 * Funcion de subida de imagenes libros al servidor
	 *
	 */

	public function Upload(){
	    $id_libro="1";
		$output = '';
		if($_FILES["files"]["name"] != '')
		{
			print_r($_FILES);
			$config["upload_path"] = './assets/'.$id_libro;
			$config["allowed_types"] = 'gif|jpg|pdf';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$_FILES["files"]["name"] = $_FILES["files"]["name"];
			$_FILES["files"]["type"] = $_FILES["files"]["type"];
			$_FILES["files"]["tmp_name"] = $_FILES["files"]["tmp_name"];
			$_FILES["files"]["error"] = $_FILES["files"]["error"];
			$_FILES["files"]["size"] = $_FILES["files"]["size"];
			if($this->upload->do_upload('files'))
			{
				$data = $this->upload->data();
				$output .= '1';
			}
			else
			{
				$output .= '0';
			}
			echo $output;   
		}
		else { $output .= '0'; }
		echo $output;
 	}


	public function buscador(){
		$resultado=$this->bibliotecaModel->busqueda_libros();
		
	}

	

}