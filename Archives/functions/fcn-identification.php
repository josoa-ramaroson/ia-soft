<?php 
$_POST['m1']=$_SESSION['login'];
//$_POST['m1']='jminaya@tiaa-cref.org';
//$_POST['m1']='real_desrochers@calpers.ca.gov';

$Bod="SELECT * FROM webapp_participants WHERE Email LIKE '%$_POST[m1]%'";
$Rbod=mysqli_query($linki,$Bod) or die("Invalid query");
while($Identification=mysqli_fetch_array($Rbod))
{
$FirstName=$Identification['FirstName'];
$LastName=$Identification['LastName'];
$Email=$Identification['Email'];
$commite=$Identification['commite'];
//echo "$FirstName  $LastName ";
}
?>



