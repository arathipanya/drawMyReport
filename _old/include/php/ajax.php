<?php
//require('./modules/drawMyReport/include/php/fpdf/fpdf.php');
require('./fpdf/fpdf.php');

$save = str_replace('data:image/png;base64,', '', $_POST['image'] );

$code = file_put_contents( '../img/image.png', base64_decode( $save ) );

header('Content-Type: image/png');
readfile('../img/image.png');

//return base64_decode( $save );

/*
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->image('../img/image.png', null, null, 0);
$pdf->Output('../img/image2.pdf');
*/
?>
