<?php
require('fpdf/fpdf.php');

include 'conexion.php';


// Fetch data from articulos table
$sql = "SELECT * FROM articulos";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Create instance of FPDF
    $pdf = new FPDF();
    
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Table header
    $pdf->Cell(40, 10, 'ID', 1);
    $pdf->Cell(60, 10, 'Descripcion', 1);
    $pdf->Cell(40, 10, 'Cant', 1);
    $pdf->Cell(40, 10, 'Vr. Unitario', 1);
    $pdf->Ln();

    // Table data
    $pdf->SetFont('Arial', '', 12);
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['id'], 1);
        $pdf->Cell(60, 10, $row['des'], 1);
        $pdf->Cell(40, 10, $row['cant'], 1, 0,'R');
        $pdf->Cell(40, 10, '$ '.number_format($row['vru']), 1, 0,'R');
        $pdf->Ln();
    }

    // Output the PDF
    $pdf->Output();
} else {
    echo "No records found.";
}

$con->close();
?>