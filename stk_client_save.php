<?php
require 'fonction.php';
$id_nom=addslashes($_POST['id_nom']);
//Information de la personne
$Designation=addslashes($_POST['Designation']);
$nomprenom=addslashes($_POST['nomprenom']);
if(empty($nomprenom)) 
{ 
header("location:stk_client.php");
exit(); 
} 


//------------identification du maximun -----------
$sqlmax="SELECT MAX(idclient) AS Maxa_id FROM $tbl_clientgaz";
$resultmax=mysql_query($sqlmax);
$rowsmax=mysql_fetch_array($resultmax);
if ($rowsmax) {
$Max_id = $rowsmax['Maxa_id']+1;
}
else {
$Max_id = 1;
}

$surnom=addslashes($_POST['surnom']);
$surnom=str_replace(' ', '', ($surnom));
$email=addslashes($_POST['email']);
$titre=addslashes($_POST['titre']);
$tel=addslashes($_POST['tel']);
$login=strtolower(substr($nomprenom,0,4)).$Max_id;
$datetime=md5(date("y/m/d H:i:s")); 
$pwd=substr($datetime,0,8);

$fax=addslashes($_POST['fax']);
$url=addslashes($_POST['url']);
//Information de la personne
$adresse=addslashes($_POST['adresse']);
$quartier=addslashes($_POST['quartier']);
$ville=addslashes($_POST['ville']);
$ile=addslashes($_POST['ile']);

//-------------------

echo $sql="INSERT INTO $tbl_clientgaz ( id_nom , Designation, nomprenom,surnom, email, titre, tel, login, pwd , fax , url , adresse , quartier ,ville,ile)
VALUES
( '$id_nom' ,'$Designation', '$nomprenom', '$surnom', '$email', '$titre', '$tel', '$login', '$pwd', '$fax' , '$url' , '$adresse' , '$quartier' , '$ville', '$ile')";
$result=mysql_query($sql);

   if($result){
   }
   else {
   echo "ERROR";
   }
  mysql_close(); 
?>
<?php
header("location:stk_client.php");
?>
