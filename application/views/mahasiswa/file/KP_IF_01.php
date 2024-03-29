<?php
		$pdf = new FPDF('P','cm','A4');
		$pdf->SetMargins(2,1,4);
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',11);                         
		$pdf->Image('assets/fotos/untan.png',3,1.18,2.5,2.5);                         
		$pdf->SetX(5.8);             
		$pdf->MultiCell(13.5,0.6,'KEMENTERIAN RISET, TEKNOLOGI, DAN  PENDIDIKAN TINGGI',0,'L');
		$pdf->SetFont('Arial','',14); 
		$pdf->SetX(5.8);             
		$pdf->MultiCell(13.5,0.6,'UNIVERSITAS TANJUNGPURA',0,'L');                         
		$pdf->SetFont('Arial','',16);             
		$pdf->SetX(5.8);            
		$pdf->MultiCell(13.5,0.6,'FAKULTAS TEKNIK',0,'L');    
		$pdf->SetFont('Arial','B',16);                     
		$pdf->SetX(5.8);             
		$pdf->MultiCell(13.5,0.6,'PROGRAM STUDI TEKNIK INFORMATIKA',0,'L');     
		$pdf->SetFont('Arial','',11);        
		$pdf->SetX(5.8);             
		$pdf->MultiCell(13.5,0.6,'Jl. Prof. H. Hadari Nawawi  Pontianak 78124 Telp. (0561) 740186',0,'L');    
		$pdf->Ln();  
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
		foreach ($kpsatu as $data) {
			# code...
		
		$pdf->SetX(3.5);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(0.5, 0.6, '1.', 0, 0, 'L');
			$pdf->Cell(6, 0.6, 'Nama Mahasiswa', 0, 0, 'L');
			$pdf->Cell(4, 0.6, ': '.$data->Username.'' , 0, 0, 'L');
			$pdf->Ln();	
			$pdf->SetX(3.5);
			$pdf->Cell(0.5, 0.6, '2.', 0, 0, 'L');
			$pdf->Cell(6, 0.6, 'Nomor Induk Mahasiswa 	', 0, 0, 'L');
			$pdf->Cell(4, 0.6, ': '.$data->NIM.' ', 0, 0, 'L');
			$pdf->Ln();
			$pdf->SetX(3.5);
			$pdf->Cell(0.5, 0.6, '3.', 0, 0, 'L');	
			$pdf->Cell(6, 0.6, 'Program Studi', 0, 0, 'L');
			$pdf->Cell(4, 0.6, ': Teknik Informatika', 0, 0, 'L');
			$pdf->Ln();	
			$pdf->SetX(3.5);
			$pdf->Cell(0.5, 0.6, '4.', 0, 0, 'L');
			$pdf->Cell(6, 0.6, 'Jumlah SKS/IPK		', 0, 0, 'L');
			$pdf->Cell(4, 0.6, ': '.$this->session->userdata('SKS').' / '.$this->session->userdata('IPK').' ', 0, 0, 'L');
		$pdf->Ln(1);	
		$pdf->SetX(3);             
		$pdf->MultiCell(16.5,0.6,'Dengan ini mengajukan permohonan untuk melaksanakan Kerja Praktek pada Semester: Genap Tahun Akademik 2017/2018:',0,'J'); 
		$pdf->Ln();
			$pdf->SetX(3.5);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(6.5, 0.6, '1. Nama Instansi/Perusahaan', 0, 0, 'L');
			$pdf->Cell(4, 0.6, ': '.$data->Nama_perusahaan.' ', 0, 0, 'L');
			$pdf->Ln();	
			$pdf->SetX(3.5);
			$pdf->Cell(6.5, 0.6, '2. Alamat	 	', 0, 0, 'L');
			$pdf->Cell(4, 0.6, ': '.$data->Alamat.' ', 0, 0, 'L');
			$pdf->Ln();
			$pdf->SetX(3.5);	
			$pdf->Cell(6.5, 0.6, '3. Judul	', 0, 0, 'L');
			$pdf->MultiCell(9.5, 0.6, ': '.$data->Judul.' ',  0, 'J');
		$pdf->Ln(1);	
		$pdf->SetX(3);             
		$pdf->MultiCell(16.5,0.6,'Untuk melengkapi persyaratan akademik/administrasi maka bersama ini saya lampirkan:',0,'J'); 
			$pdf->Ln();	
			$pdf->SetX(3);
			$pdf->Cell(6.5, 0.6, '-	 Fotocopy Kartu Mahasiswa', 0, 0, 'L');
			$pdf->Ln();	
			$pdf->SetX(3);
			$pdf->Cell(6.5, 0.6, '-  Fotocopy Daftar mata kuliah yang telah lulus (Transkrip Nilai)', 0, 0, 'L');
			$pdf->Ln();	
			$pdf->SetX(3);
			$pdf->Cell(6.5, 0.6, '-  Fotocopy Lembar Isian Rencana Studi (LIRS) ', 0, 0, 'L');
			$pdf->Ln();	
			$pdf->SetX(3);
			$pdf->Cell(6.5, 0.6, '-  Proposal Rencana KP', 0, 0, 'L');
		$pdf->Ln(1);	
		$pdf->SetX(3);             
		$pdf->MultiCell(16.5,0.6,'Demikian permohonan ini disampaikan, atas perhatian yang diberikan saya ucapkan terima kasih.
		',0,'J ');
			$pdf->Ln();
			$pdf->SetX(3);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10, 0.6, 'Menyetujui,		', 0, 0, 'L');
			$pdf->Cell(5, 0.6, 'Pontianak, 31 Mei 2018', 0, 0, 'L');
			$pdf->Ln();
			$pdf->SetX(3);
			$pdf->Cell(10, 0.6, 'Dosen Pembimbing Akademik', 0, 0, 'L');
			$pdf->Cell(5, 0.6, 'Mahasiswa,', 0, 0, 'L');
			$pdf->Ln(3);	
			$pdf->SetX(3);
			$pdf->Cell(10, 0.6, ''.$data->Dosen_pa.'', 0, 0, 'L');
			$pdf->Cell(5, 0.6, ''.$data->Username.'', 0, 0, 'L');
			$pdf->Ln();
			$pdf->SetX(3);
			$pdf->Cell(10, 0.6, ''.$data->NIP.'', 0, 0, 'L');
			$pdf->Cell(5, 0.6, ''.$data->NIM.'', 0, 0, 'L');
		  }
		$pdf->Output();

?>