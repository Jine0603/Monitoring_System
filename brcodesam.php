<?php
$ref_num = $_GET['id_barcode'];
//============================================================+
// File name   : example_1d_html.php
// Version     : 1.0.000
// Begin       : 2011-07-21
// Last Update : 2013-03-19
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2009-2013 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with TCPDF.  If not, see <http://www.gnu.org/licenses/>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description : Example for tcpdf_barcodes_1d.php class
//
//============================================================+

/**
 * @file
 * Example for tcpdf_barcodes_1d.php class
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.000
 * @group barcode
 * @group 1d
 * @group html
 * @group comparable
 */

// include 1D barcode class (search for installation path)
require_once 'Barcode Generator/vendor/autoload.php';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set the barcode content and type
$pdf->SetFont('helvetica', '', 10);

// define barcode style
$style = array(
    'position' => 'C',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 20,
    'stretchtext' => 4
);

// PRINT VARIOUS 1D BARCODES
$pdf->AddPage();
// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
$pdf->Cell(0, 1, 'Attach This Barcode In The Document Paper.', 0, 1, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->write1DBarcode($ref_num, 'C128', '', '', '', 50, 1, $style, 'N');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();



// $pdf->Cell(0, 0, 'CUT HERE', 0, 1);
// Draw the "Cut Here" line
$pdf->SetLineWidth(0.1);
$pdf->Line(0, 90, 250, 90); // Adjust the coordinates as needed

$pdf->SetLineWidth(0.1);
$pdf->Line(0, 10, 250, 10); // Adjust the coordinates as needed


// $pdf->Cell(0, 0, '---------------------------------------------------------------------------CUT HERE------------------------------------------------------------------------------', 0, 1);


// output the barcode as HTML object

$pdf->Output('GenerateBCode.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+