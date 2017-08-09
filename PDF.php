<?php
    
    require ('class/PDF.class.php');

    $pdf = new PDF();
    $pdf->AliasNbPages(); 
    $pdf->AddPage('L','A4');    
    $nome = filter_input(INPUT_GET,'seacher');		
    $header =array('Id','Nome do cliente','CPF','Celular','Rua','Numero','Complemento','email');
    $pdf->FancyTable($header,$nome);
    $pdf->output();
?>