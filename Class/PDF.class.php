<?php

require ('Lib/fpdf/fpdf.php');
require ('class/BD.class.php');
require ('connections/Config.php');

class PDF extends FPDF{
	 
	function Header(){
    	// Logo
    	$this->Image('assets/pictures/php.jpg',10,6,60,15,'','../index.php');
    	// Arial bold 15
    	$this->SetFont('Arial','B',15);
    	// Move to the right
    	$this->Cell(80);
    	// Title
    	$this->Cell(100,10,'Relatorio de clientes cadastrados',0,0,'C');
    	// Line break
    	$this->Ln(20);
	}
	
	function footer(){
		
		
    // Position at 1.5 cm from bottom
    	$this->SetY(-15);
    //informa a font
    	$this->SetFont('Arial','IB',10);
    // numero da pagina
    	$this->Cell(0,10,"Template Revendedora - Page".$this->PageNo().'/{nb}',0,0,'C');
	
	}	
		
		
	function FancyTable($header,$nome){
		
		// Colors, line width and bold fontn
	
		$this->SetFillColor(0,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(255);
		$this->SetLineWidth(.5);
		$this->SetFont('Arial','B',10);
		// Header
		$w = array(18,53,30,25,45,18,30,53);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		//$this->SetFillColor(224,235,222);
		$this->SetTextColor(0);
		$this->SetFont('Arial','',9);
		// Data
		$fill = true;
		$Color=true;
		$con = "select * from clientes where nomeCliente like :nome";
		$result = BD::getConn()->prepare($con);	
		$result->bindValue(':nome' , "%{$nome}%");
		$result->execute() or die(var_dump(BD::getConn()->errorCode()));
		foreach($result->fetchAll() as $row)
		{
				if ($Color){
					$this->SetFillColor(20,140,225);
				}else{
					$this->SetFillColor(224,235,255);	
				}
				$this->Cell($w[0],6,$row['id'],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row['nomeCliente'],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row['cpf'],'LR',0,'C',$fill);
				$this->Cell($w[3],6,$row['celularCliente'],'LR',0,'C',$fill);	
				$this->Cell($w[4],6,$row['rua'],'LR',0,'L',$fill);
				$this->Cell($w[5],6,$row['numeroCasa'],'LR',0,'L',$fill);
				$this->Cell($w[6],6,$row['complemento'],'LR',0,'L',$fill);
				$this->Cell($w[7],6,$row['email'],'LR',0,'L',$fill);
				$this->Ln();
				$Color=!$Color;
				
		}		
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
}