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
通过使用 responseXML 函数，把 "xmlDoc" 变量定义为一个 XML 文档 
从这个 XML 文档中取回数据，把它们放在正确的 "span" 元素中 
*/
/*
深刻教训！！！非常重要
如果在responsexml.php中如下写到，
header('Content-Type:text/html;charset=GB2312');
则只能用下列方法得到结果
可以采用alert(xmlHttp.getAllResponseHeaders());来观察
	
  var xmlDoc=null;
  xmlDoc =new ActiveXObject("Msxml2.DOMDocument");
  xmlDoc.async   =   false ;
  xmlDoc.loadXML(xmlHttp.responseTEXT);
*/

/*
responseXML要工作正确，必须在responsexml.php中如下写到，
header('Content-Type:text/xml;charset=GB2312');
*/
  var xmlDoc= xmlHttp.responseXML;
 document.getElementById("id").innerHTML=
 xmlDoc.getElementsByTagName("ID")[0].childNodes[0].nodeValue;
 document.getElementById("name").innerHTML=
 xmlDoc.getElementsByTagName("NAME")[0].childNodes[0].nodeValue;
 document.getElementById("job").innerHTML=
"职业："+ xmlDoc.getElementsByTagName("JOB")[0].childNodes[0].nodeValue;
 document.getElementById("age_text").innerHTML="年龄: ";
 document.getElementById("age").innerHTML=
 xmlDoc.getElementsByTagName("AGE")[0].childNodes[0].nodeValue;
 document.getElementById("hometown_text").innerHTML="<br/>籍贯: ";
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