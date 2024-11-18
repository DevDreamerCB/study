/*
showHint() 函数
每当在输入域中输入一个字符，该函数就会被执行一次。

如果文本框中有内容 (str.length > 0)，该函数这样执行：

定义要发送到服务器的 URL（文件名） 
把带有输入域内容的参数 (q) 添加到这个 URL 
添加一个随机数，以防服务器使用缓存文件 
调用 GetXmlHttpObject 函数来创建 XMLHTTP 对象，
并在事件被触发时告知该对象执行名为 stateChanged 的函数 
用给定的 URL 来打开打开这个 XMLHTTP 对象 
向服务器发送 HTTP 请求 
如果输入域为空，则函数简单地清空 txtHint 占位符的内容。

*/

var xmlHttp;


function showHint(str)
{
	if (str.length==0)
	{ 
	document.getElementById("txtHint").innerHTML=""
	return
	}
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	
	var url="gethint1.php";
	url=url+"?q="+str;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged ;//为什么这一句在GET前？因为从服务器拿回str时间长与几行php的时间
	// get：方法，这里不是post，因为网页数据？方法要与php中的方法对应
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	//document.getElementById("txtHint").innerHTML=xmlHttp.responseText;

} 

/*
stateChanged() 函数
每当 XMLHTTP 对象的状态发生改变，
则执行该函数。

在状态变成 4 （或 "complete"）时，
用响应文本填充 txtHint 占位符 txtHint 的内容。
*/

/*
发送一个请求后，
客户端无法确定什么时候
会完成这个请求，
所以需要用事件机制来捕获请求的状态，
XMLHttpRequest对象提供了
onreadyStateChange事件实现这一功能。
这类似于回调函数的做法。
onreadyStateChange
事件可指定一个事件处理函数来处理
XMLHttpRequest对象的执行结果
onreadyStateChange事件是在
readyState属性发生改变时触发的，

readyState的值表示了当前请求的状态，
在事件处理程序中可以根据这个值
来进行不同的处理。
 readyState有五种可取值
 0：尚未初始化，
 1：正在加载，
 2：加载完毕，
 3：正在处理；
 4：处理完毕。
 一旦readyState属性的值变成了4，
 就可以从服务器返回的响应数据
 进行访问了。
*/

//注册回调函数
function stateChanged() 
{ 
	var str;
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
  str= xmlHttp.responseText;
  if (str=="1")
  {
  	alert('userid重复！');
  	document.form1.userid.focus();
  	return false;
  }
  else if (str=="0")
  	{
  		document.form1.submit();
  	}
  }
}


/*
GetXmlHttpObject() 函数
AJAX 应用程序只能运行在完整支持 XML 的 web 浏览器中。

上面的代码调用了名为 GetXmlHttpObject() 的函数。

该函数的作用是解决为不同浏览器创建不同 XMLHTTP 对象的问题。
*/
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