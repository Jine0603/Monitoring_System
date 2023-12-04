<?php
include 'Include/config.php';
$br_id = json_decode($_GET['try']);
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




$counter = 0;

foreach ($br_id as $barcode){


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
WHERE assigned_tbl.id = '$barcode'";

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
$counter++; 



if($counter == 1){
    
// Add a page
$pdf->AddPage();
// Start Transformation

if ($employee_assigned == ''){
    $pdf->StartTransform();
    // // Reset font to previous settings
    $pdf->SetFont('helvetica', '', 5);
    
    // FORM 
    $pdf->ScaleXY(150, -15, 73);
    $pdf->Rect(14, 40, 63.5, 49, 'D');
    
    // Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
    $pdf->SetXY(26, 42);
    $pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);
    
    $pdf->SetLineWidth(0.1);
    $pdf->Line(24.8, 49, 66.8, 49); // Adjust the coordinates as needed
    
    // New Text below the line
    $pdf->SetFont('helvetica', 'B', 5); // Set the new font
    $pdf->Text(25.8, 49.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');
    
    $pdf->write1DBarcode($assetid, 'C128', 21, 80.5, '', 9, 0.4, $style, 'N');
    // 1st Column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->Text(15.5, 55.3, 'COMPANY');
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(15.8, 55, 33, 7, 'D');
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Text(17, 58.5, $company);
    
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(94, 50, 70);
    $pdf->Rect(48.7, 54, 28.3, 7.5, 'D');
    $pdf->Text(48.5, 54.5, 'LOCATION');
    $pdf->SetFont('helvetica', 'B', 5.7);
    $pdf->Text(50, 58, $location);
    
    // 2nd column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(13.6, 61.5, 41.7, 7, 'D');
    $pdf->Text(13.5, 62, 'TAG NO/ASSET NO');
    $pdf->SetFont('helvetica', 'B', 8);
    $pdf->Text(15, 64.6, $assetid);
    
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(94, 50, 70);
    $pdf->Rect(55.6, 61, 23.1, 7.4, 'D');
    $pdf->Text(55.5, 61.5, 'DATE PURCHASE');
    $pdf->SetFont('helvetica', 'B', 8);
    $pdf->Text(56.5, 64.5, $date_purchase);
    
    // 3rd Column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(11.3, 68.4, 67.4, 7, 'D');
    $pdf->Text(11.4, 69, 'SERIAL NO');
    
    // 4th Column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(11.3, 75.4, 67.5, 7, 'D');
    $pdf->Text(11.4, 76, 'ASSET NAME');
    $pdf->SetFont('helvetica', 'B', 9);
    $pdf->Text(13, 78.2, $assetname);
    
    $pdf->StopTransform();
}else if ($employee_assigned != 1){
$pdf->StartTransform();

// // Reset font to previous settings
$pdf->SetFont('helvetica', '', 5);

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(14, 40, 63.5, 47, 'D');

// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(26, 42);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(24.8, 49, 66.8, 49); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(25.8, 49.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 16.5, 78.2, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(15.5, 55.3, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(15.8, 55, 38, 6.5, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(17, 58, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(54, 54, 23, 7, 'D');
$pdf->Text(53.8, 54.5, 'TAG NO');

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(13.5, 61.5, 'DEPARTMENT');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(13.6, 61, 40.4, 6.5, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(15, 64, $department);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(54.3, 60.4, 24.4, 6.9, 'D');
$pdf->Text(54.3, 61, 'ASSET NO');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(55.5, 64, $assetid);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(11.3, 67.3, 43, 6.5, 'D');
$pdf->Text(11.4, 67.8, 'ASSET DESCRIPTION');
$pdf->SetFont('helvetica', 'B', 7.8);
$pdf->Text(13, 70, $assetname);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(54.6, 67.1, 26, 7, 'D');
$pdf->Text(54.6, 67.7, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(8.8, 74, 18, 6.5, 'D');
$pdf->Text(9, 74.5, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(10, 77, $date_purchase);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(25.3, 74.3, 57.3, 6.9, 'D');
$pdf->Text(25.2, 74.8, 'ASSIGNED TO');
$pdf->SetFont('helvetica', 'B', 7.8);
$pdf->Text(27, 77, $assigned);

$pdf->StopTransform();
}else if ($employee_assigned == 1){
 $pdf->StartTransform();
// // Reset font to previous settings
$pdf->SetFont('helvetica', '', 5);

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(14, 40, 63.5, 49, 'D');

// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(26, 42);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(24.8, 49, 66.8, 49); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(25.8, 49.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 21, 80.5, '', 9, 0.4, $style, 'N');
// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(15.5, 55.3, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(15.8, 55, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(17, 58.5, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(48.7, 54, 28.3, 7.5, 'D');
$pdf->Text(48.5, 54.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(51, 57.5, $department);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(13.6, 61.5, 41.7, 7, 'D');
$pdf->Text(13.5, 62, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(15, 64.6, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(55.6, 61, 23.1, 7.4, 'D');
$pdf->Text(55.5, 61.5, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(56.5, 64.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(11.3, 68.4, 67.4, 7, 'D');
$pdf->Text(11.4, 69, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(11.3, 75.4, 67.5, 7, 'D');
$pdf->Text(11.4, 76, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(13, 78.2, $assetname);

$pdf->StopTransform();
}

}elseif($counter == 2){
// $pdf->Cell(0, 0, '---------------------------------------------------------------------------CUT 2------------------------------------------------------------------------------', 0, 1);
if ($employee_assigned == ''){
    $pdf->StartTransform();

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(85, 40, 63.5, 49, 'D');

$pdf->SetXY(96, 42);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(95, 49, 137, 49); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(96.5, 49.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 92, 80.5, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(86.3, 55.3, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(86.6, 55, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(87.5, 58, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(124, 54, 28.3, 7.5, 'D');
$pdf->Text(124, 54.5, 'LOCATION');
$pdf->SetFont('helvetica', 'B', 5.7);
$pdf->Text(125, 58, $location);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(89, 61.5, 41.7, 7, 'D');
$pdf->Text(88.7, 62, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(90, 64.6, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(135.8, 61, 23.1, 7.4, 'D');
$pdf->Text(135.7, 61.5, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(136.7, 64.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 68.4, 67.4, 7, 'D');
$pdf->Text(91.4, 69, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 75.4, 67.4, 7, 'D');
$pdf->Text(91.5, 76, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(92.9, 78.2, $assetname);


$pdf->StopTransform();

}else if ($employee_assigned != 1){

    $pdf->StartTransform();
    $pdf->ScaleXY(150, -15, 73);
    $pdf->Rect(85, 40, 63.5, 47, 'D');
    
    $pdf->SetXY(96, 42);
    $pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);
    
    $pdf->SetLineWidth(0.1);
    $pdf->Line(95, 49, 137, 49); // Adjust the coordinates as needed
    
    // New Text below the line
    $pdf->SetFont('helvetica', 'B', 5); // Set the new font
    $pdf->Text(96.5, 49.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');
    
    $pdf->write1DBarcode($assetid, 'C128', 87.5, 78.2, '', 9, 0.4, $style, 'N');
    // 1st Column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->Text(86.3, 55.3, 'COMPANY');
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(86.6, 55, 38, 6.5, 'D');
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Text(87.5, 58, $company);
    
    
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(94, 50, 70);
    $pdf->Rect(129.4, 54, 23, 7, 'D');
    $pdf->Text(129, 54.5, 'TAG NO');
    
    // 2nd column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(89, 61, 40.4, 6.5, 'D');
    $pdf->Text(88.7, 61.5, 'DEPARTMENT');
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Text(90, 64, $department);
    
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(94, 50, 70);
    $pdf->Rect(134.5, 60.4, 24.4, 6.9, 'D');
    $pdf->Text(134.1, 61, 'ASSET NO');
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Text(135, 64, $assetid);
    
    // 3rd Column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(91.5, 67.3, 43, 6.5, 'D');
    $pdf->Text(91.3, 67.8, 'ASSET DESCRIPTION');
    $pdf->SetFont('helvetica', 'B', 7.8);
    $pdf->Text(93, 70, $assetname);
    
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(94, 50, 70);
    $pdf->Rect(139.9, 67.1, 26, 7, 'D');
    $pdf->Text(139.5, 67.7, 'SERIAL NO');
    
    // 4th Column
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(100, 50, 80);
    $pdf->Rect(94.2, 74, 18, 6.5, 'D');
    $pdf->Text(94, 74.5, 'DATE PURCHASE');
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Text(95, 77, $date_purchase);
    
    $pdf->SetFont('helvetica', '', 5);
    $pdf->ScaleXY(94, 50, 70);
    $pdf->Rect(116.2, 74.3, 57.1, 6.9, 'D');
    $pdf->Text(116, 74.8, 'ASSIGNED TO');
    $pdf->SetFont('helvetica', 'B', 7.8);
    $pdf->Text(118, 77, $assigned);
    
    $pdf->StopTransform();
    }else if ($employee_assigned == 1){
    $pdf->StartTransform();

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(85, 40, 63.5, 49, 'D');

$pdf->SetXY(96, 42);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(95, 49, 137, 49); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(96.5, 49.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 91, 80.5, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(86.3, 55.3, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(86.6, 55, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(87.5, 58, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(124, 54, 28.3, 7.5, 'D');
$pdf->Text(124, 54.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(126, 57.3, $department);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(89, 61.5, 41.7, 7, 'D');
$pdf->Text(88.7, 62, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(90, 64.6, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(135.8, 61, 23.1, 7.4, 'D');
$pdf->Text(135.7, 61.5, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(136.7, 64.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 68.4, 67.4, 7, 'D');
$pdf->Text(91.4, 69, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 75.4, 67.4, 7, 'D');
$pdf->Text(91.5, 76, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(92.9, 78.2, $assetname);


$pdf->StopTransform();
}

}elseif($counter == 3){

    // $pdf->Cell(0, 0, '---------------------------------------------------------------------------CUT HERE------------------------------------------------------------------------------', 0, 1);
    if ($employee_assigned == ''){
        $pdf->StartTransform();

        // FORM 
        $pdf->ScaleXY(150, -15, 73);
        $pdf->Rect(14, 95, 63.5, 49, 'D');
        
        // Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
        $pdf->SetXY(26, 97);
        $pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);
        
        $pdf->SetLineWidth(0.1);
        $pdf->Line(24.8, 104, 66.8, 104); // Adjust the coordinates as needed
        
        // New Text below the line
        $pdf->SetFont('helvetica', 'B', 5); // Set the new font
        $pdf->Text(25.8, 104.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

        $pdf->write1DBarcode($assetid, 'C128', 21, 135.5, '', 9, 0.4, $style, 'N');
        
        // 1st Column
        $pdf->SetFont('helvetica', '', 5);
        $pdf->Text(15.5, 110.7, 'COMPANY');
        $pdf->ScaleXY(100, 50, 80);
        $pdf->Rect(15.8, 110.5, 33, 7, 'D');
        $pdf->SetFont('helvetica', 'B', 7);
        $pdf->Text(17, 113.8, $company);
        
        $pdf->SetFont('helvetica', '', 5);
        $pdf->ScaleXY(94, 50, 70);
        $pdf->Rect(48.7, 113, 28.3, 7.5, 'D');
        $pdf->Text(48.5, 113.5, 'LOCATION');
        $pdf->SetFont('helvetica', 'B', 5.6);
        $pdf->Text(50, 117, $location);
        
        // 2nd column
        $pdf->SetFont('helvetica', '', 5);
        $pdf->ScaleXY(100, 50, 80);
        $pdf->Rect(13.6, 120.5, 41.7, 7, 'D');
        $pdf->Text(13.5, 121, 'TAG NO/ASSET NO');
        $pdf->SetFont('helvetica', 'B', 8);
        $pdf->Text(15, 123.8, $assetid);
        
        $pdf->SetFont('helvetica', '', 5);
        $pdf->ScaleXY(94, 50, 70);
        $pdf->Rect(55.6, 123.7, 23.1, 7.5, 'D');
        $pdf->Text(55.5, 124, 'DATE PURCHASE');
        $pdf->SetFont('helvetica', 'B', 8);
        $pdf->Text(56.5, 127.5, $date_purchase);
        
        // 3rd Column
        $pdf->SetFont('helvetica', '', 5);
        $pdf->ScaleXY(100, 50, 80);
        $pdf->Rect(11.3, 131.2, 67.4, 7, 'D');
        $pdf->Text(11.4, 131.5, 'SERIAL NO');
        
        // 4th Column
        $pdf->SetFont('helvetica', '', 5);
        $pdf->ScaleXY(100, 50, 80);
        $pdf->Rect(11.3, 138.2, 67.4, 7, 'D');
        $pdf->Text(11.4, 138.5, 'ASSET NAME');
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Text(13, 141, $assetname);
        
        $pdf->StopTransform();
    
    }else if ($employee_assigned != 1){
// 3ND FORM
$pdf->StartTransform();
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(14, 95, 63.5, 47, 'D');

// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(26, 97);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(24.8, 104, 66.8, 104); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(25.8, 104.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 16.5, 133.5, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(15.5, 110.7, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(15.8, 110.5, 38, 6.5, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(17, 113.5, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(54, 113, 23, 7, 'D');
$pdf->Text(53.8, 113.5, 'TAG NO');


// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(13.6, 120, 40.4, 6.5, 'D');
$pdf->Text(13.5, 120.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(15, 123, $department);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(54.3, 123.2, 24.4, 6.9, 'D');
$pdf->Text(54.3, 123.5, 'ASSET NO');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(55.5, 126.5, $assetid);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(11.3, 130.1, 43, 6.5, 'D');
$pdf->Text(11.4, 130.5, 'ASSET DESCRIPTION');
$pdf->SetFont('helvetica', 'B', 7.8);
$pdf->Text(13, 132.8, $assetname);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(54.6, 134, 26, 6.9, 'D');
$pdf->Text(54.6, 134.4, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(8.8, 140.9, 18, 6.5, 'D');
$pdf->Text(9, 141.5, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(10, 144, $date_purchase);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(25.3, 145.4, 57.3, 6.9, 'D');
$pdf->Text(25.2, 146, 'ASSIGNED TO');
$pdf->SetFont('helvetica', 'B', 7.8);
$pdf->Text(27, 148.5, $assigned);

$pdf->StopTransform();

}else if ($employee_assigned == 1){
    $pdf->StartTransform();

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(14, 95, 63.5, 49, 'D');

// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->SetXY(26, 97);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(24.8, 104, 66.8, 104); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(25.8, 104.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 21, 135.5, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(15.5, 110.7, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(15.8, 110.5, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(17, 113.8, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(48.7, 113, 28.3, 7.5, 'D');
$pdf->Text(48.5, 113.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(51, 116.4, $department);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(13.6, 120.5, 41.7, 7, 'D');
$pdf->Text(13.5, 121, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(15, 123.8, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(55.6, 123.7, 23.1, 7.5, 'D');
$pdf->Text(55.5, 124, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(56.5, 127.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(11.3, 131.2, 67.4, 7, 'D');
$pdf->Text(11.4, 131.5, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(11.3, 138.2, 67.4, 7, 'D');
$pdf->Text(11.4, 138.5, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(13, 141, $assetname);

$pdf->StopTransform();
}

}elseif($counter == 4){
// $pdf->Cell(0, 0, '---------------------------------------------------------------------------CUT HERE------------------------------------------------------------------------------', 0, 1);
if ($employee_assigned == ''){
    $pdf->StartTransform();

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(85, 95, 63.5, 49, 'D');

$pdf->SetXY(96, 97);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(95, 104, 137, 104); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(96.5, 104.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 92, 135.7, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(86.3, 110.7, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(86.6, 110.5, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(87.5, 113.8, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(124, 113, 28.3, 7.5, 'D');
$pdf->Text(124, 113.5, 'LOCATION');
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(125, 117, $location);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(89, 120.5, 41.7, 7, 'D');
$pdf->Text(88.7, 121, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(90, 123.8, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(135.8, 123.7, 23.1, 7.4, 'D');
$pdf->Text(135.7, 124, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(136.7, 127.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 131.2, 67.4, 7, 'D');
$pdf->Text(91.4, 131.5, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 138.2, 67.4, 7, 'D');
$pdf->Text(91.5, 138.5, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(92.9, 141, $assetname);

$pdf->StopTransform();
}else if ($employee_assigned != 1){

$pdf->StartTransform();
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(85, 95, 63.5, 47, 'D');

$pdf->SetXY(96, 97);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(95, 104, 137, 104); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(96.5, 104.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');

$pdf->write1DBarcode($assetid, 'C128', 87.5, 133.5, '', 9, 0.4, $style, 'N');
// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(86.3, 110.7, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(86.6, 110.5, 38, 6.5, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(87.5, 113.5, $company);


$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(129.4, 113, 23, 7, 'D');
$pdf->Text(129, 113.5, 'TAG NO');

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(89, 120, 40.4, 6.5, 'D');
$pdf->Text(88.7, 120.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(90, 123, $department);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(134.5, 123.2, 24.4, 6.9, 'D');
$pdf->Text(134.1, 123.5, 'ASSET NO');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(135, 126.5, $assetid);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 130.1, 43, 6.5, 'D');
$pdf->Text(91.3, 130.5, 'ASSET DESCRIPTION');
$pdf->SetFont('helvetica', 'B', 7.8);
$pdf->Text(93, 132.8, $assetname);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(139.9, 134, 26, 7, 'D');
$pdf->Text(139.5, 134.4, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);

$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(94.2, 140.9, 18, 6.5, 'D');

$pdf->Text(94, 141.5, 'DATE PURCHASE');

$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(95, 144, $date_purchase);



$pdf->SetFont('helvetica', '', 5);

$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(116.2, 145.4, 57.1, 6.9, 'D');

$pdf->Text(116, 146, 'ASSIGNED TO');

$pdf->SetFont('helvetica', 'B', 7.8);
$pdf->Text(118, 148.5, $assigned);

$pdf->StopTransform();
}else if ($employee_assigned == 1){
    
    $pdf->StartTransform();

// FORM 
$pdf->ScaleXY(150, -15, 73);
$pdf->Rect(85, 95, 63.5, 49, 'D');

$pdf->SetXY(96, 97);
$pdf->Image('images/logome.jpg', '', '', 40, 6, '', '', 'T', false, 200, '', false, false, array(0, 0, 0, 0.5), false, false, false);

$pdf->SetLineWidth(0.1);
$pdf->Line(95, 104, 137, 104); // Adjust the coordinates as needed

// New Text below the line
$pdf->SetFont('helvetica', 'B', 5); // Set the new font
$pdf->Text(96.5, 104.5, '827 EDSA, Quezon City . 410-1155 . 929-9911');


$pdf->write1DBarcode($assetid, 'C128', 92, 135.7, '', 9, 0.4, $style, 'N');

// 1st Column
$pdf->SetFont('helvetica', '', 5);
$pdf->Text(86.3, 110.7, 'COMPANY');
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(86.6, 110.5, 33, 7, 'D');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Text(87.5, 113.8, $company);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(124, 113, 28.3, 7.5, 'D');
$pdf->Text(124, 113.5, 'DEPARTMENT');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(126, 116.4, $department);

// 2nd column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(89, 120.5, 41.7, 7, 'D');
$pdf->Text(88.7, 121, 'TAG NO/ASSET NO');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(90, 123.8, $assetid);

$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(94, 50, 70);
$pdf->Rect(135.8, 123.7, 23.1, 7.4, 'D');
$pdf->Text(135.7, 124, 'DATE PURCHASE');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Text(136.7, 127.5, $date_purchase);

// 3rd Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 131.2, 67.4, 7, 'D');
$pdf->Text(91.4, 131.5, 'SERIAL NO');

// 4th Column
$pdf->SetFont('helvetica', '', 5);
$pdf->ScaleXY(100, 50, 80);
$pdf->Rect(91.5, 138.2, 67.4, 7, 'D');
$pdf->Text(91.5, 138.5, 'ASSET NAME');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Text(92.9, 141, $assetname);

$pdf->StopTransform();
}

unset($counter);

$counter = 0;

}


}





$pdf->Output('GenerateBCode.pdf', 'I');



//============================================================+
// END OF FILE
//============================================================+