<?php
include("conexion.php");
include('fpdf.php');

// Verificar si se envió el identificador del FUT
if (!isset($_GET['nfut']) || empty($_GET['nfut'])) {
    die("No se proporcionó el identificador del FUT.");
}

$nfut = $_GET['nfut'];

// Consultar los datos del FUT
$sql = "SELECT f.nfut, f.codusuario, f.asunto, f.descripcion, f.fecha, f.estado 
        FROM fut f
        WHERE f.nfut = '$nfut'";
$result = mysqli_query($cn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("No se encontraron datos para el identificador proporcionado.");
}

$data = mysqli_fetch_assoc($result);

// Extiende la clase FPDF
class PDF extends FPDF {
    // Función para agregar una página con imagen de fondo
    function addPageWithBackground($imgPath, $orientation = 'l', $size = 'A4') {
        $this->AddPage($orientation, $size);
        $this->Image($imgPath, 0, 0, $this->w, $this->h);
    }
}

// Crea una instancia de PDF
$pdf = new PDF();

// Agrega una página con la imagen de fondo
$pdf->addPageWithBackground('FUT.jpg');

$pdf->SetFont('Arial', 'B', 16);

// Encabezado
$pdf->Cell(0, 10, 'FUT - UNJFSC', 0, 1, 'C');
$pdf->Ln(10);

// Datos del FUT
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Identificador:', 0, 0);
$pdf->Cell(0, 10, $data['nfut'], 0, 1);
$pdf->Cell(50, 10, 'Codigo del Usuario:', 0, 0);
$pdf->Cell(0, 10, $data['codusuario'], 0, 1);
$pdf->Cell(50, 10, 'Asunto:', 0, 0);
$pdf->MultiCell(0, 10, $data['asunto']);
$pdf->Cell(50, 10, 'Descripcion:', 0, 0);
$pdf->MultiCell(0, 10, $data['descripcion']);
$pdf->Cell(50, 10, 'Fecha:', 0, 0);
$pdf->Cell(0, 10, $data['fecha'], 0, 1);
$pdf->Cell(50, 10, 'Estado:', 0, 0);
$pdf->Cell(0, 10, $data['estado'], 0, 1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Generado por el sistema de mesa de partes - UNJFSC', 0, 1, 'C');

// Salida del PDF
$pdf->Output();
?>
