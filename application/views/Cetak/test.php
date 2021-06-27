<?php 
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetX(60);
        $pdf->SetFont('Arial','B',12);                
        $pdf->MultiCell(160,6,'REKAPITULASI PROPOSAL KERJA PRAKTEK',0,'L');
        $pdf->SetFont('Arial','',14); 
        $pdf->SetX(60);         
        $pdf->MultiCell(160,6,'UNIVERSITAS TANJUNGPURA',0,'L');                         
        $pdf->SetFont('Arial','',14);             
        $pdf->SetX(60);  
        $pdf->MultiCell(160,6,'FAKULTAS TEKNIK',0,'L');    
        $pdf->SetFont('Arial','B',14);                     
              $pdf->SetX(60);  
        $pdf->MultiCell(160,6,'PROGRAM STUDI INFORMATIKA',0,'L');     
        $pdf->SetFont('Arial','',11);        
        $pdf->SetX(60);  
        $pdf->MultiCell(160,6,'Jl. Prof. H. Hadari Nawawi  Pontianak 78124 Telp. (0561) 740186',0,'L');    
        $pdf->Ln(1);  
        $pdf->Line(20,42,190,42);             
        $pdf->SetLineWidth(1);             
        $pdf->Line(20,42,190,42);                         
        $pdf->SetLineWidth(0);     
        $pdf->Ln();
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',10);
        $pdf->MultiCell(160,4,$ket,0,'L');
        $pdf->Ln();  
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10, 8, 'No', 1, 0, 'C');
        $pdf->Cell(25, 8, 'Periode', 1, 0, 'C');
        $pdf->Cell(30, 8,'NIM',1,0,'C');
        $pdf->Cell(45, 8,'Nama',1,0,'C');
        $pdf->Cell(30, 8,'NIP',1,0,'C');
        $pdf->Cell(30, 8,'Berkas',1,1,'C');
        $no = 1;
        foreach ($proposal as $data){
            $pdf->SetX(20);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,6,$no++ ,1,0,'C');
            $pdf->Cell(25,6,$data->Tahun,1,0,'C');
            $pdf->Cell(30,6,$data->NIM,1,0);
            $pdf->Cell(45,6,$data->nama,1,0);
            $pdf->Cell(30,6,$data->NIP,1,0);
            $pdf->Cell(30,6,$data->Berkas,1,1); 
        }
        $pdf->Output();  
?>