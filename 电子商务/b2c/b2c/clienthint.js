/*
showHint() ����
ÿ����������������һ���ַ����ú����ͻᱻִ��һ�Ρ�

����ı����������� (str.length > 0)���ú�������ִ�У�

����Ҫ���͵��������� URL���ļ����� 
�Ѵ������������ݵĲ��� (q) ��ӵ���� URL 
���һ����������Է�������ʹ�û����ļ� 
���� GetXmlHttpObject ���������� XMLHTTP ����
�����¼�������ʱ��֪�ö���ִ����Ϊ stateChanged �ĺ��� 
�ø����� URL ���򿪴���� XMLHTTP ���� 
����������� HTTP ���� 
���������Ϊ�գ������򵥵���� txtHint ռλ�������ݡ�

*/

var xmlHttp;

function showHint(str)
{

if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url="gethint.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
} 

/*
stateChanged() ����
ÿ�� XMLHTTP �����״̬�����ı䣬
��ִ�иú�����

��״̬��� 4 ���� "complete"��ʱ��
����Ӧ�ı���� txtHint ռλ�� txtHint �����ݡ�
*/

/*
����һ�������
�ͻ����޷�ȷ��ʲôʱ��
������������
������Ҫ���¼����������������״̬��
XMLHttpRequest�����ṩ��
onreadyStateChange�¼�ʵ����һ���ܡ�
�������ڻص�������������
onreadyStateChange
�¼���ָ��һ���¼�������������
XMLHttpRequest�����ִ�н��
onreadyStateChange�¼�����
readyState���Է����ı�ʱ�����ģ�

readyState��ֵ��ʾ�˵�ǰ�����״̬��
���¼���������п��Ը������ֵ
�����в�ͬ�Ĵ���
 readyState�����ֿ�ȡֵ
 0����δ��ʼ����
 1�����ڼ��أ�
 2��������ϣ�
 3�����ڴ���
 4��������ϡ�
 һ��readyState���Ե�ֵ�����4��
 �Ϳ��Դӷ��������ص���Ӧ����
 ���з����ˡ�
*/

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

/*
GetXmlHttpObject() ����
AJAX Ӧ�ó���ֻ������������֧�� XML �� web ������С�

����Ĵ����������Ϊ GetXmlHttpObject() �ĺ�����

�ú����������ǽ��Ϊ��ͬ�����������ͬ XMLHTTP ��������⡣
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