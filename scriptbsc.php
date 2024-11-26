<?php
 $fichier="cle.crt";
 if($fp=fopen("$fichier","r"))
 {
 $i=0;
 while($ligne=fgets($fp,7000))
 {
 $i++;
 "$ligne <BR> ";
 $valbsc=substr($ligne,32,32);
 }fclose($fp);
 }
 ?> 
