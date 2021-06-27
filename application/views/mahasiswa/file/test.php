<?php

// Page header
function Header()
{
    // Logo
    $this->Image('assets/fotos/untan.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','',11);
    // Move to the right
    $this->Cell(10);
    // Title
    $this->Cell(80,10,'UNIVERSITAS TANJUNGPURA',0,0,'L');
    $this->Cell(80,10,'FAKULTAS TEKNIK JURUSAN INFORMATIKA	',0,0,'L');
	$this->SetFont('Arial','B',11);
	$this->Cell(80,10,'PROGRAM STUDI SARJANA INFORMATIKA',0,0,'L');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
		$pdf = new FPDF('P','cm','A4');
		$pdf->SetMargins(2,1,4);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->Line(3,4.2,18,4.2);             
		$pdf->SetLineWidth(0.1);             
		$pdf->Line(3,4.2,18,4.2);                         
		$pdf->SetLineWidth(0);     
		$pdf->SetFont('Arial','B',16); 
		$pdf->SetX(3);             
		$pdf->Cell(2.5, 0.8, 'KP-IF-01', 1, 0, 'L');
		$pdf->Ln(1);    
		$pdf->SetFont('Arial','B',14); 
		$pdf->SetX(3);             
		$pdf->MultiCell(16.5,1,'PERMOHONAN PENGAJUAN KERJA PRAKTEK',0,'C');   
		$pdf->SetFont('Arial','',11); 
		$pdf->SetX(3);             
		$pdf->MultiCell(16.5,1,'Yang Bertanda Tangan Di bawah ini,',0,'L'); 
		
		$pdf->Output();

?>