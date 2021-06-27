<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');
// require 'vendor/autoload.php';
use Dompdf\Dompdf;
class Mypdf
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();

	}

	public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'potrait') 
	{
		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		// render the HTML as PDF
		$dompdf->render();
		$dompdf->Stream($filename . ".pdf", array("Attachment" => FALSE));



	// 	// use Dompdf\Dompdf;

	// 	// instantiate and use the dompdf class
	// 	$dompdf = new Dompdf();
	// 	$dompdf->loadHtml($html);

	// 	// (Optional) Setup the paper size and orientation
	// 	$dompdf->setPaper('A4', 'landscape');

	// 	// Render the HTML as PDF
	// 	$dompdf->render();

	// 	// Output the generated PDF to Browser
	// 	$dompdf->stream();
	 }
}