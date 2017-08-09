<?php
require('../fpdf/fpdf.php');
include ('../Connections/Config.php');

__autoload('BD'); //iniciando a classe do Banco de dados 

//iniciiando a classe PDF
__autoload('PDF');

$pdf = new PDF();
// Column headings
$pdf->AliasNbPages();
$header = array('Nome','Tel', 'Cel', 'Complemento','E-mail','Moradia','logradouro','CEP');
$pdf->SetFont('Helvetica','',9);
$pdf->AddPage('L');
$pdf->FancyTable($header);
$pdf->Output();

?>