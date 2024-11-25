  <?php
	
    function dump($ignore)
    {
	
	 require 'fonction.php';

     $server   = $host ;
     $database =  $db;
     $user     = $user;
     $password = $pass;
	 

     $db = mysqli_connect($server, $user, $password) or die(mysqli_error());
     mysqli_select_db($database, $db) or die(mysqli_error());
      
	  $sql = "SHOW TABLES FROM $database WHERE Tables_in_$database='paiement' or Tables_in_$database='billing' or Tables_in_$database='clienteda' " ;
	 
     $tables = mysqli_query($linki,$sql) or die(mysqli_error());
      

     for ($i=0; $i<$ignore; $i++) ($donnees = mysqli_fetch_array($tables));
      

     while ($donnees = mysqli_fetch_array($tables))
     {
	 

      $table = $donnees[0];
      $sql = 'SHOW CREATE TABLE '.$table;
      $res = mysqli_query($linki,$sql) or die(mysqli_error().$sql);
      if ($res)
      {
  
	   $datedossier = date("d_m_Y");
	   $datedossier ='Day_'. $datedossier;
	   
       @mkdir ('backup/' . $datedossier);
       $backup_file = 'backup/' . $datedossier . '/' . $table . '.sql.gz';  
       ?>
	   
	   <?php 
	   
       $fp = gzopen($backup_file, 'w');
      
       $tableau = mysqli_fetch_array($res);
       $tableau[1] .= ";\n";
       $insertions = $tableau[1];
       gzwrite($fp, $insertions);
      
       $req_table = mysqli_query('SELECT * FROM '.$table) or die(mysqli_error());
       $nbr_champs = mysqli_num_fields($req_table);
       while ($ligne = mysqli_fetch_array($req_table))
       {
        $insertions = 'INSERT INTO '.$table.' VALUES (';
        for ($i=0; $i<$nbr_champs; $i++)
        {
         $insertions .= '\'' . mysqli_real_escape_string($ligne[$i]) . '\', ';
        }
        $insertions = substr($insertions, 0, -2);
        $insertions .= ");\n";
        gzwrite($fp, $insertions);
       }
      } 
      mysqli_free_result($res);
      gzclose($fp);
	  
	  
	}  
     return true;
    }
      
 
    $dump = dump(0);
    ?>
