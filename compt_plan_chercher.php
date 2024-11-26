<?php
Require 'session.php';
require 'fonction.php';
?>
<?php
 if($_SESSION['u_niveau'] != 20) {
	header("location:index.php?error=false");
	exit;
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include 'titre.php' ?></title>
<script type="text/javascript">
function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);

//--------- Pour le champs il y a 3 document.testform.quartier.options
for(j=document.testform.quartier.options.length-1;j>=0;j--)
{
//--------- Pour le champs il y a document.testform.quartier.options
document.testform.quartier.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");

//le champs quartier qui est dans la table quartier
optn.text = myarray.data[i].quartier;
optn.value = myarray.data[i].id_quartier;  // You can change this to subcategory 

//--------- Pour le champs il y a 3 document.testform.quartier.options 
document.testform.quartier.options.add(optn);

} 
      }
    } // end of function stateck
	var url="fonction_dvq.php";

//le champs ville qui se trouve dans la table Ville
var refville=document.getElementById('s1').value;
url=url+"?refville="+refville;
//-------------------------------------
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>

</head>
<?php
Require 'bienvenue.php';    // on appelle la page contenant la fonction
?>
<body>
<div class="panel panel-primary">
  <div class="panel-heading"> 
    <h3 class="panel-title">Le Plan Comptable </h3>
  </div>
  <div class="panel-body">
    
    <table width="100%" border="0" align="center">
      <tr> 
        <td width="84%"> <div align=""> 
            <form action="compt_plan_chercher.php" method="post" name="testform" id="form2">
                       <?php require 'compt_plan_listecompte.php'; ?>
              <p>&nbsp;</p>
            </form>
          </div></td>
      </tr>
      <tr> 
        <td><form name="form2" method="post" action="../webscolaire/formationsupprime1_question.php">
            <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
              <tr bgcolor="#006ABE"> 
                <td width="24%" align="center"><font color="#CCCCCC" size="4"><strong>Compte</strong></font><font color="#000000" size="3">&nbsp;</font></td>
                <td width="76%" align="center"><font color="#CCCCCC" size="3"><strong>Descritpion 
                  </strong></font></td>
              </tr>
                  <?php

$Numc=$_POST['Numc'];
$req="SELECT Code , Description FROM $plan where  Code like '$Numc%' ";
$resultat=mysqli_query($linki,$req);
while($row=mysqli_fetch_array($resultat)){ // Start looping table row 
?>
              <tr> 
                <td bgcolor="#FFFFFF"><div align="left"> 
                    <?php echo $row['Code'];?>
                    <BR>
                  </div></td>
                <td align="" bgcolor="#FFFFFF"><em> 
                  <?php echo $row['Description'];?>
                  </em></td>
              </tr>
              <?php
// Exit looping and close connection 
}
//mysqli_close($linki);
?>
            </table>
          </form></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>