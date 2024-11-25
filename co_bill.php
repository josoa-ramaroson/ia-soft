<?php

ob_start();

//$idf=substr($_REQUEST["idf"],32);
   require_once('./co_billimp.php');

	$HTML = ob_get_clean();

require_once("./mpdf60/mpdf.php"); 
$mpdf=new mPDF("s","A4","12","Arial",10,10,10,10,0,5); 
$mpdf->useOnlyCoreFonts = false;    // false is default
$mpdf->SetProtection(array("print"));
$mpdf->SetTitle("Copie Facture");
$mpdf->SetAuthor($_SERVER["HTTP_HOST"]);
$mpdf->SetWatermarkText("SONELEC ANJOUAN");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = "DejaVuSansCondensed";
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode("fullwidth");
$mpdf->useSubstitutions = true;
$mpdf->autoPageBreak = false;

$mpdf->useAdobeCJK = true; // be sure multi-languages fonts are managed by Adobe: they know what they are doing!


$mpdf->justifyB4br = true;

$mpdf->defaultfooterfontstyle="";
$mpdf->defaultfooterline=0;
$mpdf->SetHTMLFooter(""); 

if (!is_array($HTML))
	$mpdf->WriteHTML($HTML); // one single page
else
	{
	for($i=0;$i<count($HTML);$i++)
		{
		if ($i>0) $mpdf->AddPage("","","1");
		$mpdf->WriteHTML($HTML[$i]);
		}
	}


$mpdf->Output("Facture_".$nfacture.".pdf","I");