<?php

include "fpdf/fpdf.php";

$pdf = new FPDF();



 $total_imagenes = count(glob('assets/libros/12/{*.jpg,*.gif,*.png}',GLOB_BRACE));
 for($i=1;$i<$total_imagenes ;$i++){

$pdf->AddPage();
$pdf->Image('assets/libros/12/'.$i.'.jpg',0,0, 210 , 297);

}

//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)

//$pdf->MultiCell(190,40, $pdf->Image($url_imagen, $pdf->GetX()+40, $pdf->GetY()+3, 100) ,0,"C");









$pdf->output();


?>