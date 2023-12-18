<?php
include 'Include/config.php';
$ref_num = $_GET['id'];
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
require_once 'Library/TCPDF/autoload.php';
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set the barcode content and type

$pdf->SetFont('helvetica', '', 10);

// define barcode style
$style = array(
    // 'position' => 'L',
    // 'align' => 'L',
    'stretch' => true,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    // 'fontsize' => 6,
    'stretchtext' => 4
    
);

$sql = "SELECT assigned_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,item_tbl.date_purchase,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
dep_tbl.department,position_tbl.position As position,assigned_tbl.acc_id,
assigned_tbl.item_id,assigned_tbl.employee_assigned,assigned_tbl.companyid,assigned_tbl.locationid,assigned_tbl.departmentid,assigned_tbl.positionid,assigned_tbl.status,assigned_tbl.cateid,assigned_tbl.assigned_date
FROM assigned_tbl
LEFT  JOIN employee_tbl ON employee_tbl.id           = assigned_tbl.employee_assigned
LEFT  JOIN location_assigned ON location_assigned.id = assigned_tbl.locationid
LEFT  JOIN categ_tbl ON categ_tbl.categories         = assigned_tbl.cateid
LEFT  JOIN com_tbl ON com_tbl.id                     = assigned_tbl.companyid
LEFT  JOIN dep_tbl ON dep_tbl.id                     = assigned_tbl.departmentid
LEFT  JOIN position_tbl ON position_tbl.id           = assigned_tbl.positionid
LEFT  JOIN item_tbl ON item_tbl.id                   = assigned_tbl.item_id
WHERE assigned_tbl.id = '$ref_num'";

$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($query);
    $company = $rows['company'];
    $assetid = $rows['cateid'].'-'.$rows['assetid'];
    $department = $rows['department'];
    $assetname = $rows['assetname'];
    $date_purchase = $rows['date_purchase'];
    $assigned = $rows['firstname'].' '.$rows['lastname'];


// output the barcode as HTML object
// set font
$pdf->SetFont('helvetica', 'B', 5);

// add a page
$pdf->AddPage();
// Start Transformation
$pdf->StartTransform();

// Reset font to previous settings
$pdf->SetFont('helvetica', '', 5);

// FORM 
$pdf->ScaleXY(170, -15, 73);
$pdf->Rect(48, 55.5, 63.5, 49, 'D');

// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(58.5, 57);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(58, 63.5, 99, 63.5); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(59, 64, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 55, 94.5, '', 9, 0.4, $style, 'N');
// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(50, 70.3, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 70, 38, 6.5, 'D');
$pdf->SetFont('helvetica', 'B', 5.2);
$pdf->Text(51, 73, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(90.5, 70, 23, 7, 'D');
$pdf->Text(90, 70.3, 'TAG NO');

// // 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 77, 40.5, 6.5, 'D');
$pdf->Text(50, 77.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(51, 80, $department);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(93, 77.4, 24.6, 7, 'D');
$pdf->Text(93, 77.8, 'ASSET NO');
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(93.5, 81, $assetid);

// // 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 84.4, 43, 6.5, 'D');
$pdf->Text(50, 84.8, 'ASSET DESCRIPTION');
$pdf->SetFont('helvetica', 'B', 4);
$pdf->Text(51, 88, $assetname);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(95.8, 85.3, 26.1, 7, 'D');
$pdf->Text(95.3, 85.8, 'SERIAL NO');

// // 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 92.3, 18, 6.5, 'D');
$pdf->Text(50, 92.8, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(51, 95.5, $date_purchase);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(69.1, 93.7, 57.4, 7, 'D');
$pdf->Text(69, 94.5, 'ASSIGNED TO');
$pdf->SetFont('helvetica', 'B', 6.5);
$pdf->Text(70, 97, $assigned);

$pdf->StopTransform();

// $pdf->Cell(0, 0, '---------------------------------------------------------------------------CUT HERE------------------------------------------------------------------------------', 0, 1);

$pdf->Output('GenerateBCode.pdf', 'I');



//============================================================+
// END OF FILE
//============================================================+