<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contoh_fpdf extends CI_Controller {
 
function __construct()
  {
    parent::__construct();
    $this->load->library('pdf');
}



public function index()
  {
    global $title;
    $fpdf = new PDF('L');
    $title = 'Contoh Kop' ;
    $fpdf->SetTitle($title );
    $fpdf->AliasNbPages();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(40,10,'Hello World! its make with fPDF');
    $fpdf->Output();
}


buat pdf.php di application/libraries
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class Pdf extends FPDF{

function __construct($orientation='L', $unit='mm', $size='A4')
  {
    parent::__construct($orientation,$unit,$size);
}

function Header(){   
    global $title ;
    $lebar = $this->w;
    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/2);
    $this->Cell($w,9,$title  ,0,0,'C');
    $this->Ln();
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->Ln(10);
}                


function Footer() {               
        $this->SetY(-15);   
        $lebar = $this->w;   
        $this->SetFont('Arial','I',8);           
        $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
        $this->SetY(-15);
        $this->SetX(0);       
        $this->Ln(1);
        $hal = 'Page : '.$this->PageNo().'/{nb}' ;
        $this->Cell($this->GetStringWidth($hal ),10,$hal );   
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $tanggal  = 'Printed : '.date('d-m-Y  h:i-a').' ';
        $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-20);   
        $this->Cell($this->GetStringWidth($tanggal),10,$tanggal );   
       
  }               


}