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
$pdf->SetFont('Arial','B',16); 
$pdf->SetX(3);             
$pdf->Cell(2.8, 0.9, 'KP-IF-02', 1, 0, 'L');
$pdf->Ln(1.5);   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(2, 0.6, 'Nomor', 0, 0, 'L');
	$pdf->Cell(8, 0.6, ':..... /UN22.4/TU/KP-IF/03/2018', 0, 0, 'L');
	$pdf->Cell(8, 0.6, 'Pontianak, 06 Juni 2018', 0, 0, 'L');
	$pdf->Ln();	
	$pdf->SetX(3);
	$pdf->Cell(2, 0.6, 'Lampiran', 0, 0, 'L');
	$pdf->Cell(9, 0.6, ': 1 lembar', 0, 0, 'L');
	$pdf->Ln();	 
	$pdf->SetX(3);
	$pdf->Cell(2, 0.6, 'Perihal', 0, 0, 'L');
	$pdf->Cell(9, 0.6, ': Evaluasi Proposal KP dan Penunjukan', 0, 0, 'L');
	$pdf->Ln();	 
	$pdf->SetX(3);
	$pdf->Cell(2, 0.6, '', 0, 0, 'L');
	$pdf->Cell(9, 0.6, '  Dosen Pembimbing Kerja Praktek', 0, 0, 'L');
	$pdf->Ln(1.3);
	$pdf->SetX(3);
	$pdf->Cell(6, 0.8, 'Kepada, Yth.', 0, 0, 'L');
	$pdf->Ln();		
	$pdf->SetX(3);
	$pdf->SetFont('Arial','B',11); 
	$pdf->Cell(9, 0.8, 'Bapak/Ibu Dosen Program Studi Teknik Informatika', 0, 0, 'L');
	$pdf->Cell(6, 0.8, '', 0, 0, 'L');
	$pdf->Ln();		
	$pdf->SetX(3);
	$pdf->SetFont('Arial','B',11); 
	$pdf->Cell(9, 0.8, 'Fakultas Teknik Universitas Tanjungpura', 0, 0, 'L');
	$pdf->Cell(6, 0.8, '', 0, 0, 'L');
	$pdf->Ln();	
		$pdf->SetFont('Arial','',11); 	
	$pdf->SetX(3);
	$pdf->Cell(3.9, 0.8, 'Di -Tempat', 0, 0, 'L');
	$pdf->Ln(1.3);
	$pdf->SetX(3);             
	$pdf->MultiCell(15,0.5,'Berdasarakan hasil evaluasi Proposal Kerja Praktek Mahasiswa Program Studi Teknik Informatika semeseter gasal 2017/2018, maka berikut disampaikan daftar nama mahasiswa peserta dan dosen pembimbing kerja praktek (daftar terlampir). Untuk itu mohon kepada Bapak/Ibu untuk dapat memberikan bimbingan kepada mahasiswa bersangkutan, agar pelaksanaan kerja praktek dapat berjalan lancar dan sesuai waktu yang ditetapkan. Adapun jadwal pelaksanaan kerja praktek adalah sebagai berikut:',0,'J');
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
	$pdf->Cell(1, 0.5, '1', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Pengajuan Proposal KP', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 April - 31 Mei 2018', 1, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '2', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Evaluasi Proposal KP', 0, 0, 'L');
	$pdf->Cell(5, 0.5, '06 Juni Mei 2018', 1, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '3', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Penerbitan Surat Pengantar KP', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '25 - 29 Juni 2018', 1, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '4', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Pelaksanaan KP', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 Juli 2018', 1, 0, 'L');   
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '5', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Pengajuan Seminar KP', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 Juli 2018', 1, 0, 'L');   
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '6', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Pelaksanaan KP', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 Juli 2018', 1, 0, 'L');  
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.5, '6', 1, 0, 'C');
	$pdf->Cell(9, 0.5, 'Revisi dan Pengumpulan Laporan KP', 1, 0, 'L');
	$pdf->Cell(5, 0.5, '01 Juli 2018', 1, 0, 'L');   
	$pdf->Ln(1);	
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Demikian surat pengantar ini disampaikan, atas perhatian dan kerjasama bapak/ibu kami ucapkan terimakasih.',0,'J');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->Cell(1, 0.5, '', 0, 0, 'L');
	$pdf->Cell(9, 0.5, '', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'Ketua,', 0, 0, 'L');
	$pdf->Ln(1.5);   
	$pdf->SetX(3);
	$pdf->Cell(1, 0.5, '', 0, 0, 'L');
	$pdf->Cell(9, 0.5, '', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'Novi Safriadi, S.T., M.T.', 0, 0, 'L');
	$pdf->Ln();   
	$pdf->SetX(3);
	$pdf->Cell(1, 0.5, '', 0, 0, 'L');
	$pdf->Cell(9, 0.5, '', 0, 0, 'L');
	$pdf->Cell(5, 0.5, 'NIP. 198411032008011003', 0, 0, 'L');

$pdf = new FPDF('L','cm','A4');
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
	$no = 1;
	foreach ($kpdua as $data) {
	$pdf->SetFont('Arial','',11);  
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Lampiran Surat',0,'J');
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'Nomor :..... /UN22.4/TU/KP-IF/03/2018',0,'J');
	$pdf->SetFont('Arial','B',11); 
	$pdf->SetX(3);             
	$pdf->MultiCell(15.5,0.5,'DAFTAR NAMA PESERTA KERJA PRAKTEK DAN DOSEN PEMBIMBING',0,'J');
	$pdf->Ln();	
	$pdf->SetX(3);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(1, 0.6, 'No.', 1, 0, 'C');
	$pdf->Cell(3.5, 0.6, 'NIM', 1, 0, 'C');
	$pdf->Cell(4.1, 0.6, 'Nama', 1, 0, 'C');
	$pdf->Cell(11, 0.6, 'Lokasi KP / Judul', 1, 0, 'C');
	$pdf->Cell(5, 0.6, 'Dosen Pembimbing', 1, 0, 'C');
	$pdf->Ln();	
	$pdf->SetX(3);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(1, 0.6, ''.$no++.'.', 1, 0, 'C');
	$pdf->Cell(3.5, 0.6, ''.$data->NIM.'', 1, 0, 'C');
	$pdf->Cell(4.1, 0.6, ''.$data->Username.'', 1, 0, 'C');
	$pdf->Cell(11, 0.6, ''.$data->Alamat.'', 1, 0, 'J');
	$pdf->Cell(5, 0.6, ''.$data->Dosen_pembimbing.'', 1, 0, 'C');
}
$pdf->Output();
?>
          












		



		


