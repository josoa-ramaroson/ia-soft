 <?
 $le_path= $_SERVER['PHP_SELF']; // $path = /home/httpd/html/index.php
 $le_file = basename ($le_path);
 $date_Audit=date("y/m/d H:i:s"); 
 $Ip_user=$_SERVER['REMOTE_ADDR']; 
 
 
 	if(!isset($id_nom)|| empty($id_nom)) {
	
 $fichier="Journal_audit_fichier_ip.txt";
 $fp=fopen($fichier,'a+');
 fwrite($fp,"$le_file");
 fwrite($fp,";");
 fwrite($fp,"$date_Audit");
 fwrite($fp,";");
 fwrite($fp,"$Ip_user\n");
 fclose($fp);	
	
	}
	else
	{
 $fichier="Journal_audit_fichier.txt";
 $fp=fopen($fichier,'a+');
 fwrite($fp,"$id_nom");
 fwrite($fp,";");
 fwrite($fp,"$le_file");
 fwrite($fp,";");
 fwrite($fp,"$date_Audit");
 fwrite($fp,";");
 fwrite($fp,"$Ip_user\n");
 fclose($fp);
    }
  ?>