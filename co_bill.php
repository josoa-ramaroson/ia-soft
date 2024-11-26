<?php

ob_start();

//$idf=substr($_REQUEST["idf"],32);
   require_once('./co_billimp.php');
	$HTML = ob_get_clean();
	

	require_once "TCPDF/tcpdf.php";
// require_once "mpdf60/mpdf.php"; 
// $mpdf=new mPDF("s","A4","12","Arial",10,10,10,10,0,5);   // false is default
// $mpdf->SetProtection(array("print"));
// $mpdf->SetTitle("Copie Facture");
// $mpdf->SetAuthor($_SERVER["HTTP_HOST"]);
// $mpdf->SetWatermarkText("SONELEC ANJOUAN");
// $mpdf->showWatermarkText = true;
// $mpdf->watermark_font = "DejaVuSansCondensed";
// $mpdf->watermarkTextAlpha = 0.1;
// $mpdf->SetDisplayMode("fullwidth");
// $mpdf->useSubstitutions = true;
// $mpdf->autoPageBreak = false;

// $mpdf->useAdobeCJK = true; // be sure multi-languages fonts are managed by Adobe: they know what they are doing!


// $mpdf->justifyB4br = true;

// $mpdf->defaultfooterfontstyle="";
// $mpdf->defaultfooterline=0;
// $mpdf->SetHTMLFooter(""); 

// if (!is_array($HTML))
// 	$mpdf->WriteHTML($HTML); // one single page
// else
// 	{
// 	for($i=0;$i<count($HTML);$i++)
// 		{
// 		if ($i>0) $mpdf->AddPage("","","1");
// 		$mpdf->WriteHTML($HTML[$i]);
// 		}
// 	}


// $mpdf->Output("Facture_".$nfacture.".pdf","I");


// Création d'une nouvelle instance de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', 'A4', true, 'UTF-8', false);

// Configuration des propriétés du document
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($_SERVER["HTTP_HOST"]);
$pdf->SetTitle("Copie Facture");

// Configuration de la protection
$pdf->SetProtection(['print'], '', null, 0);

// Configuration des marges
$pdf->SetMargins(10, 10, 10);

// Configuration du mode d'affichage
$pdf->SetDisplayMode('fullpage', 'SinglePage');

// Désactiver le saut de page automatique
$pdf->SetAutoPageBreak(false, 0);

// Configuration de la police par défaut
$pdf->SetFont('Times', '', 12);

// Configuration du filigrane
$pdf->Rotate(45, 105, 148);  // Rotation du texte du watermark (angle, X, Y)
$pdf->Text(30, 150, 'SONELEC ANJOUAN');  // Position du texte


// Suppression de la ligne de pied de page par défaut
$pdf->setPrintFooter(false);

// Écriture du contenu HTML
if (!is_array($HTML)) {
    // Ajout d'une page
    $pdf->AddPage();
    // Écriture du contenu sur une seule page
    $pdf->writeHTML($HTML, true, false, true, false, '');
} else {
    // Pour chaque élément du tableau HTML
    for($i = 0; $i < count($HTML); $i++) {
        // Ajout d'une nouvelle page sauf pour la première
        if ($i > 0) {
            $pdf->AddPage();
        } else {
            $pdf->AddPage();
        }
        // Écriture du contenu
        $pdf->writeHTML($HTML[$i], true, false, true, false, '');
    }
}

// Génération du PDF
$pdf->Output('Facture_' . $nfacture . '.pdf', 'I');