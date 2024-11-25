<? 
$_POST['m1']=$_SESSION['login'];
//$_POST['m1']='jminaya@tiaa-cref.org';
//$_POST['m1']='real_desrochers@calpers.ca.gov';
$link = mysql_connect ($host,$user,$pass);
mysql_set_charset('utf8',$link); 
mysql_select_db($db);
$Bod="SELECT * FROM webapp_participants WHERE Email LIKE '%$_POST[m1]%'";
$Rbod=mysql_query($Bod) or die("Invalid query");
while($Identification=mysql_fetch_array($Rbod))
{
$FirstName=$Identification['FirstName'];
$LastName=$Identification['LastName'];
$Email=$Identification['Email'];
$commite=$Identification['commite'];
//echo "$FirstName  $LastName ";
}
?>



