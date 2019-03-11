<?php
include "fpdf/fpdf.php";
//Sacamos el ancho y alto de una imagen como referencia
$data = getimagesize("assets/libros/$id/1.jpg");

	$width = $data[0]/118.11;	
	$height = $data[1]/118.11;
	

	/*Creamos unas hojas del pdf en cm con la medida transformada en cm a 300 ppt //1 cm a 300 ppp = 118,11 px 
	ajustamos el ancho y el alto de las imagenes al contenedor y a la portada y contraportada le hacemos
	un ajuste de posicion al total del contenedor para que se quede en mitad ya que estas son de menor ancho*/
		$pdf = new FPDF('L','cm',array($width , $height));

		$total_imagenes = count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
		for($i=0;$i<$total_imagenes ;$i++){
			if(($i==0)||($i==count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE))-1)){
				$pdf->AddPage();
				
				   $pdf->Image('assets/libros/'.$id.'/'.$i.'.jpg', $width/4,0,  $width/2 , $height);
			}else{
		   $pdf->AddPage();
		   $pdf->Image('assets/libros/'.$id.'/'.$i.'.jpg',0,0, $width , $height);
			}
		}
$pdf->output();
?>