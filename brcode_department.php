<?php
include 'Include/config.php';
$br_id = $_GET['id'];
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
WHERE assigned_tbl.id = '$br_id'";

$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($query);
    $company = $rows['company'];
    $assetid = $rows['cateid'].'-'.$rows['assetid'];
    $department = $rows['department'];
    $assetname = $rows['assetname'];
    $date_purchase = $rows['date_purchase'];
    $assigned = $rows['firstname'].' '.$rows['lastname'];
    $employee_assigned = $rows['employee_assigned'];
    $loca = $rows['locationid'];
    $location = $rows['location'];


// output the barcode as HTML object
// set font
$pdf->SetFont('helvetica', 'B', 5);

    
// Add a page
$pdf->AddPage();
// Start Transformation

 $pdf->StartTransform();
// // Reset font to previous settings
$pdf->SetFont('helvetica', '', 5);

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(60, 60, 63.5, 49, 'D');

// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(71, 62);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(70, 69, 112, 69); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(71, 69.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 67, 100.5, '', 9, 0.4, $style, 'N');
// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(62, 75.5, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(62.1, 75, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 4.6);
$pdf->Text(62.5, 79, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(98, 75.3, 28.2, 7.5, 'D');
$pdf->Text(98, 75.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 5.5);
$pdf->Text(99, 79.5, $department);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(62.9, 82.8, 41.6, 7, 'D');
$pdf->Text(63, 83, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 6.5);
$pdf->Text(64, 86, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(108, 83.6, 23.1, 7.5, 'D');
$pdf->Text(108, 84, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 6.5);
$pdf->Text(109, 87.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(63.7, 91.1, 67.4, 7, 'D');
$pdf->Text(64, 91.4, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(63.7, 98.1, 67.4, 7, 'D');
$pdf->Text(63.7, 98.4, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(64, 102, $assetname);

$pdf->StopTransform();





$pdf->Output('GenerateBCode.pdf', 'I');



//============================================================+
// END OF FILE
//============================================================+