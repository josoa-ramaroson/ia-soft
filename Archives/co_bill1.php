<?php
    ob_start();
    $idf=substr($_REQUEST["idf"],32);
    
	require_once('./co_billimp.php');
    $content = ob_get_clean();

    require_once('../html2pdf/html2pdf.class.php');
    try
	
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('bill.pdf');
    }
	
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }