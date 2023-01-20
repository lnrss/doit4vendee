<?php
session_start();
define('BASEPATH', true);
require('fpdf.php');
include('../constante.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 14);
$pdf->SetDrawColor(197, 197, 197);

//? Width : 189mm (+20mm)
//? Cell(width, height, text, border, end line, align)
//? Line(left, top-left, width, top-right)

// $pdf->Image('../img/logo.png', 10, 4, 80);

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "FACTURE"), 0, 1, 'C');
$pdf->SetY(30); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', 'Giraud Dorian'), 0, 1, 'L');
$pdf->SetFont('Arial', '');
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', 'DOIT4VENDEE'), 0, 1, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', '53 rue de la rive, 85300 Challans'), 0, 1, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', 'Enregistré au RCS de Challans'), 0, 1, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', 'SIRET : 90983097800013'), 0, 1, 'L');


$pdf->SetY(60);  
$pdf->Cell(120);
$pdf->SetFont('Arial', 'B');
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', $firstName." ".$lastName), 0, 1, 'R');
$pdf->Cell(120);
$pdf->SetFont('Arial', '');
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', $street), 0, 1, 'R');
$pdf->Cell(120);
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', $postalCode.', '.$city), 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(10, 90);  
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Détail Commande"), 0, 1, 'L');
$pdf->Line(11, 99, 198, 99);

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(10, 101.5); 

$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "N° Facture"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "FAC-1585151"), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "Le paiement est dû dans"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "30 jours"), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Email"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', $email), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Date"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', date('d M. Y', strtotime($dateOrder))), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Date de livraison"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', date('d M. Y', strtotime($dateOrder) + (24 * 3600 * 15))), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "ID Commande"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', $orderId), 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(10, 150);  
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Résumé du Panier"), 0, 1, 'L');
$pdf->Line(11, 159, 198, 159);

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(10, 161.5); 
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Sous total"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', number_format((float)$portDelivery > 0 ? $price - $portDelivery : $price, 2, '.', '')." €"), 0, 1, 'R');

// $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "TVA 20.0%"), 0, 0, 'L');
// $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', number_format((float)(20/100) * $price, 2, '.', '')." €"), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Réduction"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', number_format((float)$reduction, 2, '.', '')." €"), 0, 1, 'R');

$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Frais de livraison"), 0, 0, 'L');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', $portDelivery == 0 ? "GRATUIT" : number_format((float)$portDelivery, 2, '.', '')." €"), 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(10, 190); 
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Articles"), 0, 1, 'L');
$pdf->Line(11, 199, 198, 199);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 201.5);
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Désignation"), 0, 0, 'L');
$pdf->SetX(78);
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "Qté"), 0, 0);
$pdf->SetX(63);
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "Prix Unit. HT"), 0, 0, 'C');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "Montant HT"), 0, 1, 'R');

$pdf->SetFont('Arial', '', 12);

$query = $PDO->prepare('SELECT o.*, a.* FROM orderarticle o INNER JOIN article a ON o.idArticle = a.idArticle WHERE o.idClient = :idClient AND o.idOrder = :idOrder');
$query->bindValue(':idClient', $idClient);
$query->bindValue(':idOrder', $orderId);
$query->execute();
if($query->rowCount() > 0){
    while($row = $query->fetch(PDO::FETCH_ASSOC)) { 
        $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', $row['nom'].' '.($row['size'] == 'CL' ? '33 Cl' : $row['size'])), 0, 0, 'L');
        $pdf->SetX(80.5); 
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', $row['quantity']), 0, 0);
        $pdf->SetX(63); 
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', number_format((float)$row['price'], 2, '.', '')." €"), 0, 0, 'C');
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', (number_format((float)$row['price']*$row['quantity'], 2, '.', ''))." €"), 0, 1, 'R');
    }
}

$pdf->Cell(0, 16, iconv('UTF-8', 'windows-1252', ""), 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-2', "Total HT"), 0, 0, 'L');
$pdf->SetTextColor(209,0,0);
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', (number_format((float)($price), 2, '.', '') < 0 ? 0 : number_format((float)($price), 2, '.', ''))." €"), 0, 1, 'R');

$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(50, 50, 50);
$pdf->SetY(-27); 
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', "TVA non applicable, article 293B du code général des impôts"), 0, 1, 'C');

// $pdf->Output('FAC-'.$orderId.'.pdf', 'D');
if (!file_exists('assets/invoice/'.$idClient)) {
    if(mkdir('assets/invoice/'.$idClient, 0777, true)){
        $pdf->Output('assets/invoice/'.$idClient.'/FAC-'.$idInvoice.'.pdf','F');
    }
}else{
    $pdf->Output('assets/invoice/'.$idClient.'/FAC-'.$idInvoice.'.pdf','F');
}

?>