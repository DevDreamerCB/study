var xmlHttp

function showUser(str)
 { 
 xmlHttp=GetXmlHttpObject()
 if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
 var url="responsexml.php"
 url=url+"?q="+str
 url=url+"&sid="+Math.random()
 xmlHttp.onreadystatechange=stateChanged 
 xmlHttp.open("GET",url,true)
 xmlHttp.setRequestHeader("content-type","text/xml");
 xmlHttp.send(null)
 }

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
/*
ͨ��ʹ�� responseXML �������� "xmlDoc" ��������Ϊһ�� XML �ĵ� 
����� XML �ĵ���ȡ�����ݣ������Ƿ�����ȷ�� "span" Ԫ���� 
*/
/*
��̽�ѵ�������ǳ���Ҫ
�����responsexml.php������д����
header('Content-Type:text/html;charset=GB2312');
��ֻ�������з����õ����
���Բ���alert(xmlHttp.getAllResponseHeaders());���۲�
	
  var xmlDoc=null;
  xmlDoc =new ActiveXObject("Msxml2.DOMDocument");
  xmlDoc.async   =   false ;
  xmlDoc.loadXML(xmlHttp.responseTEXT);
*/

/*
responseXMLҪ������ȷ��������responsexml.php������д����
header('Content-Type:text/xml;charset=GB2312');
*/
  var xmlDoc= xmlHttp.responseXML;
 document.getElementById("id").innerHTML=
 xmlDoc.getElementsByTagName("ID")[0].childNodes[0].nodeValue;
 document.getElementById("name").innerHTML=
 xmlDoc.getElementsByTagName("NAME")[0].childNodes[0].nodeValue;
 document.getElementById("job").innerHTML=
"ְҵ��"+ xmlDoc.getElementsByTagName("JOB")[0].childNodes[0].nodeValue;
 document.getElementById("age_text").innerHTML="����: ";
 document.getElementById("age").innerHTML=
 xmlDoc.getElementsByTagName("AGE")[0].childNodes[0].nodeValue;
 document.getElementById("hometown_text").innerHTML="<br/>����: ";
 document.getElementById("hometown").innerHTML=
 xmlDoc.getElementsByTagName("HOMETOWN")[0].childNodes[0].nodeValue;
 }
}

function GetXmlHttpObject()
 { 
 var objXMLHttp=null
 if (window.XMLHttpRequest)
  {
  objXMLHttp=new XMLHttpRequest()
  }
 else if (window.ActiveXObject)
  {
  objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
  }
 return objXMLHttp
 }