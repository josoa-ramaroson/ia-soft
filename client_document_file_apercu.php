<?php
Require "session.php"; 
require 'fonction.php';

require 'session_niveau_client.php';

 $iddocument=substr($_REQUEST["doc"],32);
?>
<html>
<head>
<title><?php include("titre.php"); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
<script language="JavaScript" src="js/validator.js" type="text/javascript" xml:space="preserve"></script>
</head>
<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
<div class="panel panel-warning">
  <div class="panel-heading">
   
    <h3 class="panel-title"><img src="<?php echo 'upload/document_client/'.$iddocument.'.jpg';?>" width="679" height="679"></h3>
  </div>
  <div class="panel-body">
    
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>


  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <div align="center"></div></td>
  </tr>
  <tr> 
    <td height="21">&nbsp; </td>
  </tr>
  <tr> 
    <td height="21"> 
 <?php
include_once('pied.php');
?>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>


