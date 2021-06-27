<?php


$pdf = new FPDF('P','cm','A4');
$pdf->SetMargins(2,1,4);
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);                         
$pdf->Image('assets/fotos/untan.png',3,1.18,2.5,2.5);                         
$pdf->SetX(5);             
$pdf->MultiCell(13.5,0.6,'KEMENTERIAN RISET, TEKNOLOGI, DAN  PENDIDIKAN TINGGI',0,'C');
$pdf->SetFont('Arial','',14); 
$pdf->SetX(5);             
$pdf->MultiCell(13.5,0.6,'UNIVERSITAS TANJUNGPURA',0,'C');                         
$pdf->SetFont('Arial','',16);             
$pdf->SetX(5);            
$pdf->MultiCell(13.5,0.6,'FAKULTAS TEKNIK',0,'C');    
$pdf->SetFont('Arial','B',16);                     
$pdf->SetX(5);             
$pdf->MultiCell(13.5,0.6,'PROGRAM STUDI INFORMATIKA',0,'C');     
$pdf->SetFont('Arial','',11);        
$pdf->SetX(5);             
$pdf->MultiCell(13.5,0.6,'Jl. Prof. H. Hadari Nawawi  Pontianak 78124 Telp. (0561) 740186',0,'C');    
$pdf->Ln();  
$pdf->Line(3,4,18,4);             
$pdf->SetLineWidth(0.1);             
$pdf->Line(3,4,18,4);                         
$pdf->SetLineWidth(0); 

$pdf->SetX(3);     
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(2.5, 0.8, 'KP-IF-03', 1, 0, 'L');
$pdf->Ln(1);   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(2, 0.5, 'Nomor', 0, 0, 'L');
	$pdf->Cell(8, 0.5, ': 101/UN22.4/TU/TI/04/2018', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'Pontianak, 06 Juni 2018', 0, 0, 'R');
	$pdf->Ln();	
	$pdf->SetX(3);
	$pdf->Cell(2, 0.5, 'Lampiran', 0, 0, 'L');
	$pdf->Cell(9, 0.5, ': 1 lembar', 0, 0, 'L');
	$pdf->Ln();	 
	$pdf->SetX(3);
	$pdf->Cell(2, 0.5, 'Perihal', 0, 0, 'L');
	$pdf->Cell(9, 0.5, ': Pengantar Kerja Praktek', 0, 0, 'L');
	$pdf->Ln(1);
	$pdf->SetX(3);
	$pdf->Cell(6, 0.6, 'Kepada, Yth.', 0, 0, 'L');
	$pdf->Ln();		
	$pdf->SetX(3);
	$pdf->SetFont('Arial','B',11); 
	$pdf->Cell(3.9, 0.6, 'Bapak/Ibu Pimpinan', 0, 0, 'L');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(9, 0.6, '................................', 0, 0, 'L');
	$pdf->Ln();		
	$pdf->SetX(3);
	$pdf->Cell(3.9, 0.6, 'Di -Tempat', 0, 0, 'L');
	$pdf->Ln(1);
	$pdf->SetX(3);
	$pdf->Cell(3.9, 0.6, 'Dengan Hormat,', 0, 0, 'L');
	$pdf->Ln();	
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Sehubungan dengan permohonan mahasiswa kami untuk melaksanakan Kerja Praktek pada semester gasal tahun ajaran 2017/2018, yang bertempat pada instirusi/kantor yang bapak/ibu pimpin, maka dengan ini kami mohon untuk dapat menerima mahasiswa kami dalam melaksanakan Kerja Praktek tersebut.',0,'J');
	
	$pdf->SetX(3);             
	$pdf->Cell(15,0.5,'Adapun nama mahasiswa yang dimaksud adalah:',0,'J');
	$pdf->Ln();
	$pdf->SetX(3);
	$pdf->Cell(4.5, 0.6, 'NIM / Nama', 0, 0, 'L');
	// $pdf->Cell(9, 0.6, ': '.$d['nim'].' / '.$d['nama'].'', 0, 0, 'L');
	$pdf->Ln();	
	$pdf->SetX(3);
	$pdf->Cell(4.5, 0.6, 'Judul Kerja Praktek', 0, 0, 'L');
	// $pdf->Cell(9, 0.6, ': '.$d['judul'].'', 0, 0, 'L');
	$pdf->Ln();	
	$pdf->SetX(3);
	$pdf->Cell(4.5, 0.6, 'Dosen Pembimbing', 0, 0, 'L');
	$pdf->Cell(9, 0.6, ': Novi Safriadi, S.T., M.T', 0, 0, 'L');
	$pdf->Ln(0.8);	
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Untuk mendukung pelaksanaan Kerja Praktek, setiuap mahasiswa diperlukan Pembimbing Lapangan yang ditunjuk oleh Pimpinan Instansi/kantor dan diberikan formulir KP-IF-04 sebagai pernyataan kesediaan menjadi Pembimbing Lapangan. Pembimbing Lapangan bertugas membimbing dan mengarahkan mahasiswa dalam mengerjakan kerja Praktek, serta memberikan penilaian lapangan dan menghadiri seminar Kerja Praktek.',0,'J');
	$pdf->Ln(0.3);	
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Perlu juga kami informasikan bahwa pelaksanaan Kerja Praktek Program Studi Teknik Informatika pada semester genap tahun ajaran 2016/2017 adalah sebagai berikut:',0,'J');  
	$pdf->Ln(); 
	$pdf->SetX(3);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(1, 0.5, 'No', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Kegiatan', 1, 0, 'C');
	$pdf->Cell(5, 0.5, 'Tanggal', 1, 0, 'C');
	$pdf->Ln();
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '1', 1, 0, 'L');
	$pdf->Cell(9, 0.5, 'Pelaksanaan Kerja Praktek', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 April - 31 Mei 2018', 1, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '2', 1, 0, 'L');
	$pdf->Cell(9, 0.5, 'Pengajuan Seminar Kerja Praktek', 0, 0, 'L');
	$pdf->Cell(5, 0.5, '06 Juni Mei 2018', 1, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '3', 1, 0, 'L');
	$pdf->Cell(9, 0.5, 'Pelaksanaan Seminar Kerja Praktek', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '25 - 29 Juni 2018', 1, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '4', 1, 0, 'L');
	$pdf->Cell(9, 0.5, 'Revisi dan Pengumpulan Laporan Kerja Praktek', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 Juli 2018', 1, 0, 'L');   
	$pdf->Ln(1);	
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Demikian surat pengantar ini disampaikan, atas perhatian dan kerjasama bapak/ibu kami ucapkan terimakasih.',0,'J');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->Cell(1, 0.5, '', 0, 0, 'L');
	$pdf->Cell(9, 0.5, '', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'Ketua,', 0, 0, 'L');
	$pdf->Ln(2);   
	$pdf->SetX(3);
	$pdf->Cell(1, 0.5, '', 0, 0, 'L');
	$pdf->Cell(9, 0.5, '', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'Novi Safriadi, S.T., M.T.', 0, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->Cell(1, 0.5, '', 0, 0, 'L');
	$pdf->Cell(9, 0.5, '', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'NIP. 198411032008011003', 0, 0, 'L');

$pdf->Output();
?>
          












		



		


