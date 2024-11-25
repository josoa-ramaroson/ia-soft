<?php
    ob_start();
	
	ini_set("memory_limit","1024M");
	ini_set("max_execution_time",1000);

    require_once('./re_nombrekwh.php');
    $HTML = ob_get_clean();

require_once("./mpdf60/mpdf.php"); 
$mpdf=new mPDF("s","A4","12","Arial",10,10,10,10,0,5); 
$mpdf->useOnlyCoreFonts = false;    // false is default
$mpdf->SetProtection(array("print"));
$mpdf->SetTitle("Copie Facture");
$mpdf->SetAuthor($_SERVER["HTTP_HOST"]);
$mpdf->SetWatermarkText("Sonelec d'Anjouan");
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
$mpdf->SetHTMLFooter("EDA - BP 54 MUTSAMUDU ANJOUAN UNION DES COMORES"); 

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