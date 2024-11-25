  <?php
	
    function dump($ignore)
    {
	
	 require 'fonction.php';

     $server   = $host ;
     $database =  $db;
     $user     = $user;
     $password = $pass;
	 

     $db = mysql_connect($server, $user, $password) or die(mysql_error());
     mysql_select_db($database, $db) or die(mysql_error());
      
	  $sql = "SHOW TABLES FROM $database WHERE Tables_in_$database='paiement' or Tables_in_$database='billing' or Tables_in_$database='clienteda' " ;
	 
     $tables = mysql_query($sql) or die(mysql_error());
      

     for ($i=0; $i<$ignore; $i++) ($donnees = mysql_fetch_array($tables));
      

     while ($donnees = mysql_fetch_array($tables))
     {
	 

      $table = $donnees[0];
      $sql = 'SHOW CREATE TABLE '.$table;
      $res = mysql_query($sql) or die(mysql_error().$sql);
      if ($res)
      {
  
	   $datedossier = date("d_m_Y");
	   $datedossier ='Day_'. $datedossier;
	   
       @mkdir ('backup/' . $datedossier);
       $backup_file = 'backup/' . $datedossier . '/' . $table . '.sql.gz';  
       ?>
	   
	   <?php 
	   
       $fp = gzopen($backup_file, 'w');
      
       $tableau = mysql_fetch_array($res);
       $tableau[1] .= ";\n";
       $insertions = $tableau[1];
       gzwrite($fp, $insertions);
      
       $req_table = mysql_query('SELECT * FROM '.$table) or die(mysql_error());
       $nbr_champs = mysql_num_fields($req_table);
       while ($ligne = mysql_fetch_array($req_table))
       {
        $insertions = 'INSERT INTO '.$table.' VALUES (';
        for ($i=0; $i<$nbr_champs; $i++)
        {
         $insertions .= '\'' . mysql_real_escape_string($ligne[$i]) . '\', ';
        }
        $insertions = substr($insertions, 0, -2);
        $insertions .= ");\n";
        gzwrite($fp, $insertions);
       }
      } 
      mysql_free_result($res);
      gzclose($fp);
	  
	  
	}  
     return true;
    }
      
 
    $dump = dump(0);
    ?>
