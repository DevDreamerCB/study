var xmlHttp

function showTEXT(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 
var url="test.html"
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged() 
{ 
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
  var xmlDoc=null;
  xmlDoc =new ActiveXObject("Msxml2.DOMDocument");
  xmlDoc.async   =   false ;
  xmlDoc.loadXML(xmlHttp.responseTEXT);
 // xmlDoc.load( 'demo4.xml') ;
      if(xmlDoc.parseError.errorCode!=0)    
           window.alert(xmlDoc.parseError.reason);    
        else   
           window.alert(xmlDoc.documentElement.text);    

alert(xmlHttp.responseText);
alert(xmlDoc.getElementsByTagName("body")[0].childNodes[0].nodeValue);
//alert(xmlDoc.getElementsByTagName("body")[0].childNodes[0].nodeValue);
 	//alert( document.getElementById("htmlid").innerHTML);
 	//alert(xmlHttp.responseText);
 //document.getElementById("bodyid").innerHTML=xmlDoc.getElementsByTagName("bodyid")[0].childNodes[0].nodeValue; 
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;

try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}