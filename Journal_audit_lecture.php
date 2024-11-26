<?
if(($_SESSION['u_niveau'] != 7)) {
	header("location:index.php?error=false");
	exit;
 }
?>
<?
 print "Je lis le contenu du fichier<BR>";
 $fichier="Journal_audit_fichier.txt";
 if($fp=fopen("$fichier","r"))
 {
 $i=0;
 while($ligne=fgets($fp,512))
 {
 $i++;
 print "ligne$i :  $ligne  <BR> ";
 }fclose($fp);
 }else{print "Probleme d'ouverture du fichier <font color=green>$fichier</font>";
 }
 ?> 
