<?php
require "../FPDF/fpdf.php";
require "../config.php";


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');
$pdf->Cell(190,10,utf8_decode("Relatório de Saidas"),0,0,"C");
$pdf->Ln(15);

$pdf->setFont("Arial","",7);
$pdf->Cell(35,7,utf8_decode("Produto"),1,0,"C");
$pdf->Cell(25,7,utf8_decode("Categoria"),1,0,"C");
$pdf->Cell(105,7,utf8_decode("Descrição"),1,0,"C");
$pdf->Cell(7,7,utf8_decode("Q"),1,0,"C");
$pdf->Cell(14,7,utf8_decode("Data"),1,0,"C");
$pdf->Cell(12,7,utf8_decode("Hora"),1,0,"C");
$pdf->Ln();

$sql = "SELECT * FROM saida";
$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->execute();
$produtos = $declaracaoSql->fetchAll();

foreach($produtos as $prod){
    $pdf->Cell(35,7,utf8_decode($prod['produto']),1,0);
    $pdf->Cell(25,7,utf8_decode($prod['categoria']),1,0);
    $pdf->Cell(105,7,utf8_decode($prod['descricao']),1,0);
    $pdf->Cell(7,7,utf8_decode($prod['quantidade']),1,0,"C");
    $pdf->Cell(14,7,utf8_decode($prod['data_saida']),1,0,"C");
    $pdf->Cell(12,7,utf8_decode($prod['hora_saida']),1,0,"C");
    $pdf->Ln();
}

$pdf->Output();

?>
