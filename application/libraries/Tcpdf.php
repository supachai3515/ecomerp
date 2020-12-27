<?php

require_once APPPATH . 'third_party/TCPDF/tcpdf.php';


class MYPDF extends TCPDF {

    var $CustomHeaderText = "Header";

    //Page header
    public function Header() {
        
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        //$this->SetFont('helvetica', 'B', 20);
        $this->SetFont('thsarabun', 'B', 22, '', true);
        $this->SetY(15);
        
        // $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0);
        // $this->Line(10, 20, 200, 20, $style);

        //$pdf->Cell(0, 0, 'TEST CELL STRETCH: no stretch', 1, 1, 'C', 0, '', 0);

        // Title
        $this->Cell(0, 15, $this->CustomHeaderText, 1, 1, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('thsarabun', 'I', 14);
        // Page number
        $this->Cell(0, 10, 'หน้า '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
