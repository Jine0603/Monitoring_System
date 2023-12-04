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
    'position' => 'C',
    'align' => 'C',
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
    $location = $rows['location'];

    $pdf->Text(100, 94, $ref_num);


// output the barcode as HTML object
// set font
$pdf->SetFont('helvetica', 'B', 5);

// add a page
$pdf->AddPage();
// Start Transformation
$pdf->write1DBarcode($assetid, 'C128', 20, 111, '', 11, 0.5, $style, 'N');
$pdf->StartTransform();
// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(111, 46.5);
$pdf->Image('images/logome.jpg', '', '', 70, 10, '', '', 'T', false, 300, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(107, 58, 185, 58); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 10); // Set the new font
$pdf->Text(108, 59, '827 EDSA, Quezon City . 410-1155 . 929-9911');

// Reset font to previous settings
$pdf->SetFont('helvetica', '', 5);

// FORM 
$pdf->ScaleXY(170, -15, 75);
$pdf->Rect(48, 55.5, 63.5, 47.5, 'D');
// 1st Column
$pdf->Text(50, 70.3, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 70, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(51, 73, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(85.1, 70, 28.3, 7.5, 'D');
$pdf->Text(85, 70.4, 'Location');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(87, 73, $location);

// // 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 77.5, 41.7, 7, 'D');
$pdf->Text(50, 77.9, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(51, 80.5, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(94.4, 78, 23, 7.4, 'D');
$pdf->Text(94.2, 78.5, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(95, 81.5, $date_purchase);

// // 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 85.4, 67.5, 7, 'D');
$pdf->Text(50, 85.8, 'SERIAL NO');

// // 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(50, 92.5, 67.5, 7, 'D');
$pdf->Text(50, 93, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(51, 95.3, $assetname);


$pdf->StopTransform();

// $pdf->Cell(0, 0, '---------------------------------------------------------------------------CUT HERE------------------------------------------------------------------------------', 0, 1);

$pdf->Output('GenerateBCode.pdf', 'I');



//============================================================+
// END OF FILE
//============================================================+