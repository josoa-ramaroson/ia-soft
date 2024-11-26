<?
include('codeBarreC128.class.php');
$Codebare=addslashes($_REQUEST['Code']);
$code = new codeBarreC128("$Codebare");
$code->setTitle();
$code->setFramedTitle(true);
$code->setHeight(50);
$code->Output();
?>