// JavaScript Document

/******************************************************************************/
/* Retourne la largeur ou la hauteur interieur du browser                     */
/* Param : "width" | "height"                                                 */
/******************************************************************************/
function dimensionBrowser(lequel) {
  var myWidth = 0, myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    //myWidth = window.innerWidth-17;
   // myHeight = window.innerHeight-17;
	 myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
    myHeight = document.body.clientHeight;
  }
  //window.alert( 'Width = ' + myWidth );
  //window.alert( 'Height = ' + myHeight );
  if(lequel == "width"){
	  return(myWidth);
  }else if(lequel == "height"){
  	  return(myHeight);  
  }
  
}

function GetNavigateur(){
	var slNavigateur = "mozilla";
	
	if (navigator.userAgent.indexOf("Opera") != -1){
		slNavigateur = "opera";
	}else if (navigator.userAgent.indexOf("Safari") != -1){
		slNavigateur = "safari";
	}else if(navigator.userAgent.indexOf("MSIE") != -1){
		slNavigateur = "ie";
	}
	
	return slNavigateur;
}

function GetAjax(){
	var xmlHttp;
	try
  	{  // Firefox, Opera 8.0+, Safari  
		xmlHttp=new XMLHttpRequest();  
	}
	catch (e)
 	{  // Internet Explorer  
		try
   		{    
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");    
		}
 		catch (e)
		{    
			try
      		{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");      
			}
    		catch (e)
      		{         
				return null;      
			}  
		} 
	} 
	
	return xmlHttp;
}

/******************************************************************************/
/* Rend visible ou invisible un element	dependant de son etat precedant       */
/* Param : id de l'lment en question                                        */
/******************************************************************************/
function ToggleVisibility (spNomObjet)
{
	if (document.getElementById(spNomObjet).style.display == 'block')
	{
		HideElement(spNomObjet);
	}
	else
	{
		ShowElement(spNomObjet);
	}
}


function ToggleVisibilitySpecial (spNomObjet,spNomObjet2)
{
	
	if (document.getElementById(spNomObjet).style.display == 'block')
	{
		
		HideElement(spNomObjet);
		
	}
	else
	{
		ShowElement(spNomObjet);
		
			
	}
}

/******************************************************************************/
/* Rend invisible un element       										      */
/* Param : id de l'lment en question                                        */
/******************************************************************************/
function HideElement(spNomObjet)
{
	setVisible(spNomObjet, false);
}

/******************************************************************************/
/* Rend visible un element       								        	  */
/* Param : id de l'lment en question                                        */
/******************************************************************************/
function ShowElement(spNomObjet)
{
	setVisible(spNomObjet, true);
}

/******************************************************************************/
/* Rend visible ou invissible un element       						       	  */
/* Param : id de l'lment en question , visible true|false                   */
/******************************************************************************/
function setVisible(spNomObjet, lpVisible)
{
	var IE = document.all?true:false;
	var DOM = document.getElementById?true:false;
	var NS4 = document.layers?true:false;

	if (DOM)
	{
		if (lpVisible == true){ document.getElementById(spNomObjet).style.display='block';}
		if (lpVisible == false){ document.getElementById(spNomObjet).style.display='none';}
	}
	else if (IE) 
	{
		if (lpVisible == true){ eval("document.all." + spNomObjet + ".style.display='block'");}
    	if (lpVisible == false){ eval("document.all." + spNomObjet + ".style.display='none'");}
	}
	else if(NS4)
	{
    	if (lpVisible == true){ eval("document.layers['" + spNomObjet + "'].display='block'");}
    	if (lpVisible == false){ eval("document.layers['" + spNomObjet + "'].display='none'");}
	}
}

function setVisibleNom(spNomObjet, lpVisible)
{

	var alElements = document.getElementsByName(spNomObjet);
	
	for (i=0;i<alElements.length;i++){
		if (lpVisible)
			alElements[i].style.display='block';
		else
			alElements[i].style.display='none';
	}
	
}
/******************************************************************************/
/* Rend visible des blocks et fait disparaitre les autres s'il existe         */
/* Séparer la liste des blocks par des ";"                                    */
/******************************************************************************/
function showHide(spShow,spList)
{
sgBlockShowSplit = spShow.split(";");
ngNbrShowBlock = sgBlockShowSplit.length-1;
for(i=0;i<ngNbrShowBlock;i++)
{
	
	if(document.getElementById(sgBlockShowSplit[i]).style.display=="none")	
	{
		document.getElementById(sgBlockShowSplit[i]).style.display="block";
	}
}	


sgBlockListSplit = spList.split(";");
ngNbrListBlock = sgBlockListSplit.length-1;
for(i=0;i<ngNbrListBlock;i++)
{
	
	if(document.getElementById(sgBlockListSplit[i]).style.display=="block")	
	{
		document.getElementById(sgBlockListSplit[i]).style.display="none";
	}
}

}


function showHideFCK(spShow,spList)
{


	if(document.getElementById(spShow).style.height=="1px")	
	{
		document.getElementById(spShow).style.display="block";
		document.getElementById(spShow).style.height="450px";
		document.getElementById(spShow).style.overflow="auto";
	}

	
	if(document.getElementById(spList).style.display=="block")	
	{
		document.getElementById(spList).style.display="none";
	}


}


/******************************************************************************/
/* Rend visible des blocks et fait disparaitre les autres s'il existe         */
/* Séparer la liste des blocks par des ";"                                    */  
/*                    PETITE MODIF NE PAS EN TENIR COMPTE                     */
/******************************************************************************/
function showHideModif(spShow,spList,spUncheck)
{
	sgBlockShowSplit = spShow.split(";");
	ngNbrShowBlock = sgBlockShowSplit.length-1;
	
	
	
	for(i=0;i<ngNbrShowBlock;i++)
	{
		
		if(document.getElementById(sgBlockShowSplit[i]).style.display=="none")	
		{
			document.getElementById(sgBlockShowSplit[i]).style.display="block";
		}
	}	


	sgBlockListSplit = spList.split(";");
	ngNbrListBlock = sgBlockListSplit.length-1;
	for(i=0;i<ngNbrListBlock;i++)
	{
		
		if(document.getElementById(sgBlockListSplit[i]).style.display=="block")	
		{
			
			document.getElementById(sgBlockListSplit[i]).style.display="none";
		}
	}
	
	sgBlockUncheckSplit = spUncheck.split(";");
	ngNbrUncheckBlock = sgBlockUncheckSplit.length-1;
	for(i=0;i<ngNbrUncheckBlock;i++)
	{
		
		if(document.getElementById(sgBlockUncheckSplit[i]).checked==1)	
		{
			document.getElementById(sgBlockUncheckSplit[i]).checked = 0;
			
		}
	}
	

}

function Elem(spNomObjet){
	return document.getElementById(spNomObjet);	
}

function PopWinDim(spURL, spNom, npLargeur, npHauteur) 
{
	var nlPosX;
	var nlPosY;
	var slProprietes;
	
	nlPosX = (screen.width) ? (screen.width - npLargeur) / 2 : 100;
	nlPosY = (screen.height) ? (screen.height - npHauteur) / 2 : 100;
	slProprietes = ',menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,status=no';
	
	Popup (spURL, spNom, npLargeur, npHauteur, nlPosX, nlPosY, slProprietes);
}

function Popup (spURL, spNom, npLargeur, npHauteur)
{
	window.open(spURL,spNom,"toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=yes, width="+npLargeur+", height="+npHauteur).focus();
}

function SetPays(npIDPays)
{
	HideElement('TitProvCanada');
	HideElement('TitProvUS');
	//HideElement('TitProvFrance');
	HideElement('TitProvAutre');
	
	HideElement('DivProvCanada');
	HideElement('DivProvUS');
	//HideElement('DivProvFrance');
	HideElement('DivProvAutre');
	
	switch(Number(npIDPays))
	{
		case 1 :
			ShowElement('TitProvCanada');
			ShowElement('DivProvCanada');
			break;
		case 2 :
			ShowElement('TitProvUS');
			ShowElement('DivProvUS');
			break;
		case 3 :
			ShowElement('TitProvAutre');
			ShowElement('DivProvAutre');
			break;
		default :
			ShowElement('TitProvAutre');
			ShowElement('DivProvAutre');
			break;
	}
}

function city(pays)
{

country = pays.options[pays.selectedIndex].value;

if(country =="can")
{
document.getElementById("closestcity").innerHTML = "<th>Choose closest city among this list beside</th><td><select><option>Calgary</option><option>Edmonton</option><option>Montr&eacute;al</option><option>Ottawa</option><option>Toronto</option><option>Vancouver</option></select></td>";
}
else if(country =="us")
{
document.getElementById("closestcity").innerHTML = "<th>Choose closest city among this list beside</th><td><select><option>Anaheim</option><option>Atlanta</option><option>Boston</option><option>Buffalo</option><option>Carolina</option><option>Chicago</option><option>Colorado</option><option>Columbus</option><option>Dallas</option><option>Detroit</option><option>Florida</option><option>Los Angeles</option><option>Minnesota</option><option>Nashville</option><option>New Jersey</option><option>New York</option><option>New York Long Island</option><option>Philadelphia</option><option>Phoenix</option><option>Pittsburgh</option><option>San Jose</option><option>St Louis</option><option>Tampa Bay</option><option>Washington</option></select></td>";
}
else
{
document.getElementById("closestcity").innerHTML = "";
}
}



function valcourriel(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    return false
		 }

 		 return true					
	}

/************************************************/
/*FAIRE AFFICHER LE VISA SI NECESAIRE           */
/************************************************/

function showVisa(spPays)
{
	
	
	lsAirTravelTo = document.getElementById("travelto").checked;	
	lsAirTravelFrom = document.getElementById("travelfrom").checked
	if(spPays!='CAN' && spPays != 'USA') 	
	{
		if(lsAirTravelTo == false || lsAirTravelFrom == false)
		{
			document.getElementById("visa").style.display="block";
		}
	}
	else
	{
	document.getElementById("visa").style.display="none";
	}

}

/***********************************************/
/*   FONCTIONS ONCHANGE POUR COMBO BOX         */
/***********************************************/
function setFlag(spChamp, spPays)
{
	if (spPays == 0)
		document.getElementById(spChamp).style.display = "none";
	else
		document.getElementById(spChamp).style.display = "block";
	
	document.getElementById(spChamp).src ="../images/flag/"+spPays+".gif";
}

function setFlagChemin(spChamp, spPays, spChemin)
{
	if (spPays == 0)
		document.getElementById(spChamp).style.display = "none";
	else
		document.getElementById(spChamp).style.display = "block";
	
	document.getElementById(spChamp).src = spChemin + "flag/"+spPays+".gif";
}

function setComboProvince(spID, spPays)
{
	document.getElementById('divProvinceCA' + spID).style.display = "none";
	document.getElementById('divProvinceUS' + spID).style.display = "none";
	document.getElementById('divProvinceAutre' + spID).style.display = "none";
	
	if (spPays == "CA" || spPays == "US"){
		document.getElementById('divProvince' + spPays + spID).style.display = "block";
	}else{
		//document.getElementById('ProvinceAutre' + spID).value = '';
		document.getElementById('divProvinceAutre' + spID).style.display = "block";
		document.getElementById('divProvinceAutre' + spID).innerHTML = "N/A";	
	}
		//document.getElementById('divProvinceAutre' + spID).style.display = "block";	
}

/***********************************************/
/*  Change le nombre de personne dans lodging  */
/***********************************************/

function nbrPerson()
{

if(document.getElementById("hAcc").checked==true)
	{
		document.getElementById("night1").innerHTML  ="2 persons";
		document.getElementById("night2").innerHTML  ="2 persons";
		document.getElementById("night3").innerHTML  ="2 persons";
		document.getElementById("night4").innerHTML  ="2 persons";
		
	}
else if(document.getElementById("hAcc").checked==false)
	{
		document.getElementById("night1").innerHTML  ="1 person";
		document.getElementById("night2").innerHTML  ="1 person";
		document.getElementById("night3").innerHTML  ="1 person";
		document.getElementById("night4").innerHTML  ="1 person";
	}
}

/***********************************************/
/*        Change la room dans Lodging          */
/***********************************************/
function changeRoom(spId)
{
	
	if(spId=="froom")
	{
	document.getElementById("room1").innerHTML = "Fairmont Room";
	document.getElementById("room2").innerHTML = "Fairmont Room";
	document.getElementById("room3").innerHTML = "Fairmont Room";
	document.getElementById("room4").innerHTML = "Fairmont Room";
	}

	if(spId=="droom")
	{
	document.getElementById("room1").innerHTML = "Deluxe Old Quebec Room";
	document.getElementById("room2").innerHTML = "Deluxe Old Quebec Room";
	document.getElementById("room3").innerHTML = "Deluxe Old Quebec Room";
	document.getElementById("room4").innerHTML = "Deluxe Old Quebec Room";
	}
}

/***********************************************/
/*         Imprimer un div seulement           */
/***********************************************/

function imprime_zone(titre, obj) 

{
// Définie la zone à imprimer
var zi = document.getElementById(obj).innerHTML;

// Ouvre une nouvelle fenetre
var f = window.open("", "ZoneImpr", "height=500, width=600,toolbar=0, menubar=0, scrollbars=1, resizable=1,status=0, location=0, left=10, top=10");

// Définit le Style de la page
f.document.body.style.color = '#000000';
f.document.body.style.backgroundColor = '#FFFFFF';
f.document.body.style.padding = "10px";


// Ajoute les Données
f.document.title = titre;
f.document.body.innerHTML += "" + zi + "";

// Imprime et ferme la fenetre
f.window.print();
f.window.close();
return true;
} 

/**********************************************/
/*           PREVIOUS STEP			          */
/**********************************************/
function previousStep(step)
{
document.location.href= "step"+step+".php";	
	
}
/**********************************************/
/*          SHOW CARTE				          */
/**********************************************/
function showCarte(spDiv,variable,spPage)
{
	var slChemin = "../";
	var nlPos = spPage.indexOf('/');
	if (nlPos >= 0){
		slChemin = "";
		spPage = spPage.substring(nlPos+1, spPage.length);
	}
	
	document.getElementById(spDiv).style.marginTop="-150px";
	document.getElementById(spDiv).style.marginLeft="50px";
	document.getElementById(spDiv).style.width="600px";
	document.getElementById(spDiv).style.background="#fbfbfd";
	document.getElementById(spDiv).style.border="1px solid #d8dfe4";
	document.getElementById(spDiv).style.borderLeft="15px solid #fbbe49";
	document.getElementById(spDiv).style.borderBottom="3px solid #333333";
	
	
	if (document.getElementById(spDiv).style.display=='block'){
		document.getElementById(spDiv).style.display='none';
	}else{
		if (document.getElementById(spDiv).style.display=='none'){
			document.getElementById(spDiv).style.display='block';
			method='GET';
			variable = "id="+variable+"&div="+spDiv;
			viewContent(spDiv,slChemin + 'blocs/'+spPage,method,variable);
		}
		
	}	

}


/**********************************************/
/*          SHOW DIV			          */
/**********************************************/

 function showDiv(div,method,variable, spPage){
	document.getElementById(div).style.background="#efefef";
	if(document.getElementById("blockaffichage").offsetWidth=="770")
	{
		slWidth="870";
	}
	else
	{
		slWidth = document.getElementById("blockaffichage").offsetWidth-20;
	}
	document.getElementById(div).style.width=slWidth+"px";
	
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.marginTop="-1px";
	document.getElementById(div).style.marginLeft="8px";
	

	if (document.getElementById(div).style.display=='block')
	{
		document.getElementById(div).style.display='none';
	}else
	{
		if (document.getElementById(div).style.display=='none')
		{
			document.getElementById(div).style.display='block';
			nbr = 1;
			for(i=0; i<ngNbrBlock; i++)
		 	{
				variable+="&page"+nbr+"="+sgBlockSplit[i];
				nbr++;
			}
			var date = "&date="+ new Date().getTime();
			variable = variable+date;			
			if (!spPage)
				spPage = "info.php";
			viewContent(div,spPage,method,variable);
		}
	
	}	
}

 function infoshirt(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/infoshirt.php',method,variable);
	
}

 function addComm(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/comment.php',method,variable);
}

function addCommMeeting(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/commentMeeting.php',method,variable);
}

 function commLodging(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/commentLodging.php',method,variable);
	
}

 function commFlight(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/commentFlight.php',method,variable);
	
}

 function commGroups(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/commentGroups.php',method,variable);
	
}

 function commMedia(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-40px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/commentMedia.php',method,variable);
	
}

 function showPassport(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-10px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/showPassport.php',method,variable);
	
}

 function showSurvey(div,method,variable){
	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-10px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/showSurvey.php',method,variable);
	
}

function showVisaNumber(div,method,variable){	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="white";
	document.getElementById(div).style.right="-70px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-20px";	
	document.getElementById(div).style.zIndex="10000";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	document.getElementById(div).style.display='block';	
	viewContent(div,'blocs/showVisaNumber.php',method,variable);
	
}


function viewCCInfo(div,method,variable){	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="black";
	document.getElementById(div).style.right="20px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-40px";	
	document.getElementById(div).style.zIndex="100";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	
			
	document.getElementById(div).style.display='block';			
	viewContent(div,'blocs/creditcard.php',method,variable);
}

function viewCCProcessInfo(div,method,variable){	
	document.getElementById(div).style.width="300px";
	document.getElementById(div).style.height="auto";
	document.getElementById(div).style.background="black";
	document.getElementById(div).style.right="20px";
	document.getElementById(div).style.position="absolute";
	document.getElementById(div).style.top="-40px";	
	document.getElementById(div).style.zIndex="100";
	document.getElementById(div).style.background="#fbfbfd";
	document.getElementById(div).style.border="1px solid #d8dfe4";
	document.getElementById(div).style.borderLeft="15px solid #fbbe49";
	document.getElementById(div).style.borderBottom="3px solid #333333";
	var date = "&date="+ new Date().getTime();
	variable = variable+date;	
	
			
	document.getElementById(div).style.display='block';			
	viewContent(div,'blocs/creditcard_process.php',method,variable);
}







function activateCell(spID)
{
	if(document.getElementById('txtNom').disabled==true)
	{
		document.getElementById('MainOffice').disabled=false;
		document.getElementById('txtNom').disabled=false;
		document.getElementById('txtAddress').disabled=false;
		document.getElementById('txtVille').disabled=false;
		document.getElementById('PaysFirme').disabled=false;
		if(document.getElementById('ProvinceCA'+spID).disabled==true)
		{
			document.getElementById('ProvinceCA'+spID).disabled=false;
		}
		if(document.getElementById('ProvinceUS'+spID).disabled==true)
		{
			document.getElementById('ProvinceUS'+spID).disabled=false;
		}
		if(document.getElementById('ProvinceAutre'+spID).disabled==true)
		{
			document.getElementById('ProvinceAutre'+spID).disabled=false;
		}
		document.getElementById('txtCodePostal').disabled=false;
		document.getElementById('txtTelephone').disabled=false;
		document.getElementById('txtTelecopieur').disabled=false;
		document.getElementById('txtSiteWeb').disabled=false;
		document.getElementById('TypeFirme').disabled=false;
		//document.getElementById('lstTypesSous1-1-1').disabled=false;
		//document.getElementById('lstTypesSous2-1-1').disabled=false;
		for(i=1; i<7; i++)
		{
			document.getElementById('chkCategoriefirme-'+i).disabled=false;
			if(i==1)
			{
			
				for(j=1; j<15; j++)
				{
					document.getElementById('chkSousCategoriefirme-'+j).disabled=false;
				}
			}
		}
		document.getElementById('fckDescription').style.display='block';
		//document.getElementById('fckDescriptionTextArea').style.display='none';
		document.getElementById('uplLogo').style.display='block';
		//document.getElementById('logoPrev').style.display='none';
		
	}
	
	else{
	if(document.getElementById('txtNom').disabled==false)
	{
		document.getElementById('MainOffice').disabled=true;
		document.getElementById('txtNom').disabled=true;
		document.getElementById('txtAddress').disabled=true;
		document.getElementById('txtVille').disabled=true;
		document.getElementById('PaysFirme').disabled=true;
		if(document.getElementById('ProvinceCA'+spID).disabled==false)
		{
			document.getElementById('ProvinceCA'+spID).disabled=true;
		}
		if(document.getElementById('ProvinceUS'+spID).disabled==false)
		{
			document.getElementById('ProvinceUS'+spID).disabled=true;
		}
		if(document.getElementById('ProvinceAutre'+spID).disabled==false)
		{
			document.getElementById('ProvinceAutre'+spID).disabled=true;
		}
		document.getElementById('txtCodePostal').disabled=true;
		document.getElementById('txtTelephone').disabled=true;
		document.getElementById('txtTelecopieur').disabled=true;
		document.getElementById('txtSiteWeb').disabled=true;
		document.getElementById('TypeFirme').disabled=true;
		//document.getElementById('lstTypesSous1-1-1').disabled=true;
		//document.getElementById('lstTypesSous2-1-1').disabled=true;
		for(i=1; i<7; i++)
		{
			document.getElementById('chkCategoriefirme-'+i).disabled=true;
			if(i==1)
			{
			
				for(j=1; j<15; j++)
				{
					document.getElementById('chkSousCategoriefirme-'+j).disabled=true;
				}
			}
		}
		document.getElementById('fckDescription').style.display='none';
		//document.getElementById('fckDescriptionTextArea').style.display='block';
		document.getElementById('uplLogo').style.display='none';
		//document.getElementById('logoPrev').style.display='block';
		
	}
	}
	
}

function addCC(spdiv)
{	
	for (i=0;i<4;i++)
	{
		div = spdiv+i;
		
		if(document.getElementById(div).style.display == 'none')
		{
			
			document.getElementById(div).style.display="block";
			document.getElementById(div+"hidden").value="1";
			
			if(i == 2){
				document.getElementById("addCarbon").style.display="none";
			}
			
			break;
		}
		
	}
}

function changeMaxResult(num)
{
	document.getElementById("maxResult20").style.background='url(../images/extranet/masterlist/maxResultBack-Inactive.gif)';
	document.getElementById("maxResult50").style.background='url(../images/extranet/masterlist/maxResultBack-Inactive.gif)';
	document.getElementById("maxResult100").style.background='url(../images/extranet/masterlist/maxResultBack-Inactive.gif)';
	document.getElementById("maxResult200").style.background='url(../images/extranet/masterlist/maxResultBack-Inactive.gif)';
	document.getElementById("maxResultAll").style.background='url(../images/extranet/masterlist/maxResultBack-Inactive.gif)';
	document.getElementById("maxResult20").style.color='#666';
	document.getElementById("maxResult50").style.color='#666';
	document.getElementById("maxResult100").style.color='#666';;
	document.getElementById("maxResult200").style.color='#666';
	document.getElementById("maxResultAll").style.color='#666';
	
	
	document.getElementById("maxResult"+num+"").style.background='url(../images/extranet/masterlist/maxResultBack.gif)';
	document.getElementById("maxResult"+num+"").style.color='white';
	document.getElementById("maxResult").value=num;
}

if (typeof jQuery != 'undefined') {  
	$(document).ready(function(){
		$(".openStatus").click(function(){	
			$('[id^=changeStatus]').hide();
			slDiv = $(this).attr("rel");	
			$("#"+slDiv).toggle();
		})	
		
		$(".closeStatus").click(function(){	
			slDiv = $(this).attr("rel");	
			$("#"+slDiv).toggle();
		})	
	})
}
