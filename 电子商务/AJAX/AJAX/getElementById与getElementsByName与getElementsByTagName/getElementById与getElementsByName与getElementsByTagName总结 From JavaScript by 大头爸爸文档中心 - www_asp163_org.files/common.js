//����û��� �������Ϸ�����,���򷵻ؼ�
//������û��������ǣ�����������0-9��Ӣ����ĸ���»��ߺ�����(ע�⣺���Ĳ��ܰ���������)
function chkUser2(str){return(new RegExp(/^(\w|[\u4E00-\u9FA5])+$/).test(str));}

//����û��� �������Ϸ�����,���򷵻ؼ�
//������û��������ǣ�����������0-9��Ӣ����ĸ,����Ӣ�Ŀ�ͷ
function chkUser(str){return(new RegExp(/^[a-zA-Z][a-zA-Z0-9]+$/).test(str));}

//��鿪ͷ�Ƿ�Ϊ���֡��»��ߡ�������򷵻��棬���򷵻ؼ�
function chkFirst(str){return(new RegExp(/^(\d|_)/).test(str));}

//�����ַ���ʵ�ʸ���:�����������ֽ�,Ӣ����ĸ��һ���ֽ�
function mmLength(str){return str.replace(/[^\x00-\xff]/gi,'xx').length;}

//����Ƿ������� �Ƿ����棬���򷵻ؼ�
function chkInt(str){return(new RegExp(/^\d{1,5}$/).test(str));}

//����ַ����Ƿ���<��>��'��"���ţ����򷵻��棬���򷵻ؼ�
function chkTag(str){return(new RegExp(/[\'\"\?\+\=\^\*\(\)\\\/;&<>��$@%]/).test(str));}

//����Ĺؼ��������ǣ�����������0-9��Ӣ����ĸ���»��ߺ�����(ע�⣺���Ĳ��ܰ���������)������Ƕ���(,)�����
function chkKey(str){return(new RegExp(/^(,|��|\w|[\u4E00-\u9FA5])+$/).test(str));}
//����Ƿ�Ϊ���ģ��Ƿ�����
function chkIsChinese(str){return(new RegExp(/^([\u4E00-\u9FA5])+$/).test(str));}
//����Ƿ��ǵ绰����
function chkIsTel(str){return(new RegExp(/^(\d{3,4}-)?\d{7,8}$/).test(str));}
//����Ƿ����ֻ�����
function chkIsMoveTel(str){return(new RegExp(/^13\d{9}$/).test(str));}

/////////////////////////////////////////////////////////////////////////
function mmReturnErr(id,msg,flag){
  alert(msg);
  flag?$(id).focus():$(id).select();
  return false;
}

function Rnd(obj){$(obj).setAttribute('src','CheckCode.asp?tag='+new Date().getTime());}

function createQueryString(varArr,valArr){
  var QueryString="";
  for(var i=0;i<varArr.length;i++){
    QueryString += varArr[i] + "=" + valArr[i];
    if(i<varArr.length-1) QueryString=QueryString + "&";
    }
  return QueryString;
}

/* Cookies���������� */
function setCookie(name,value,hours,path,domain,secure){
  var cookie=name+'='+escape(value)+
  ((hours)?"; expires="+new Date(new Date().getTime()+hours*3600000).toGMTString():"")+
  ((path)?"; path="+path:"")+
  ((domain)?"; domain="+domain:"")+
  ((secure)?"; secure":"");
  document.cookie=cookie;
}
//�޸�Cookiesֵ
function modifyCookie(cookiename,name,value,hours,path,domain,secure){
  var cookievalue=unescape(getCookie(cookiename));
  var search=name+"=";
  if(cookievalue.length>0){
    var start=cookievalue.indexOf(search);
    if(start!=-1){
      var s='('+search+')(.*?)(&)';
      re=new RegExp(s,"ig");
      cookievalue=cookievalue.replace(re,'$1'+value+'$3');
      setCookie(cookiename,cookievalue,hours,path,domain);//�޸�cookies�е�ĳ��ֵ
      return;
    }else{
    //��cookies����û�д�cookies�ֵ䣬�����
    //����һ��cookies�к���name,mail,tel���ֵ䣬����Ҫ���һ��movetel,��movetel��ӽ�ȥ
      cookievalue=cookievalue+'&'+search+value;
      setCookie(cookiename,cookievalue,hours,path,domain);//�޸�cookies�е�ĳ��ֵ
      return;
    }
  }
  //���cookiesΪ�գ�����Ӵ�cookies
  cookievalue=search+value;
  setCookie(cookiename,cookievalue,hours,path,domain);
}

//ȡ������Ϊname��cookieֵ
function getCookie(name){
  var mycookie=document.cookie;
  var search=name+"=";
  if(mycookie.length>0){
    var start=mycookie.indexOf(search);
    if(start!=-1){
      start+=search.length;
      var end=mycookie.indexOf(";",start);
      if(end==-1) end=mycookie.length;
      //return unescape(mycookie.substr(start,end-start));
      return unescape(mycookie.substring(start,end));
    }else return "";
  }else return "";
}
//���Cookies���йؼ��֣���response.cookies("xx")("yy")="xx"
//ȡ��yy��ֵ������getCookie("xx")ȡ����cookies��Ȼ����getCookieKey("xx","yy")ȡ��yy��ֵ
function getCookieKey(mycookie,name){
  var search=name+"=";
  if(mycookie.length>0){
    var start=mycookie.indexOf(search);
    if(start!=-1){
      start+=search.length;
      var end=mycookie.indexOf("&",start);
      if(end==-1) end=mycookie.length;
      return unescape(mycookie.substring(start,end));
    }else return "";
  }else return "";
}

//ɾ������Ϊname��Cookie
function delCookie(name){
  var expires=new Date();
  expires.setTime(expires.getTime()-1);
  var cookie=name+"="+getCookie(name);
  cookie+=';expires='+expires.toGMTString();
  document.cookie=cookie;
}

//���ȫ��Cookie
function clearCookie(){
var temp=document.cookie.split(";");
var ts;
for(var i=0;i<temp.length;i++){
  ts=temp[i].split("=")[0];
  delCookie(ts);
  }
}

function yesno(test){return confirm(test);}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//���ű༭��غ���
//��UBB����ת��ΪHTML���� ��TextAreaд�뵽���ݿ�
function toHtmlCode(content){
  var tmpStr=content;
  tmpStr=tmpStr.replace(/\[B\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/B]/ig,"<B>$2</B>");//����
  tmpStr=tmpStr.replace(/\[I\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/I]/ig,"<I>$2</I>");//б��
  tmpStr=tmpStr.replace(/\[U\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/U]/ig,"<U>$2</U>");//�»���
  //������ɫ
  tmpStr=tmpStr.replace(/\[COLOR=(#*[a-z0-9]*)\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/COLOR\]/ig,'<span style="color:$1">$3</span>');
  //tmpStr=tmpStr.replace(/\[([\/]?)(b|u|i)\]/ig,"<$1$2>");//����д��һ�������޷��������script�ű��е��������⣬��a[i]
  tmpStr=tmpStr.replace(/\[(em\d{2})\]/ig,'<IMG src="/images/UBBicon/$1.gif" align="absmiddle" border="0">');
  tmpStr=tmpStr.replace(/\[URL=([^\[]*)\](.*?)\[\/URL\]/ig,'<a href="$1" target=_blank>$2</a>');
  tmpStr=tmpStr.replace(/\[IMG\](\/|..\/|http:\/\/|https:\/\/|ftp:\/\/)(.[^\[]*)\[\/IMG]/ig,'<IMG style="CURSOR:hand" src="$1$2" align="absmiddle" border="0">');
  tmpStr=tmpStr.replace(/\[CODE\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/CODE\]/ig,'<div class="code">\r\n$2\r\n</div>');
  tmpStr=tmpStr.replace(/\[QUOTE\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/QUOTE\]/ig,'<div class="quote">\r\n$2\r\n</div>');
  //..tmpStr=tmpStr.replace(/\[QUOTE\](.*?)\[\/QUOTE]/ig,'<div class="quote">$1</div>');

  tmpStr=tmpStr.replace(/\[CENTER\](.*?)\[\/CENTER]/ig,'<div style="text-align:center;">$1</div>');
  tmpStr=tmpStr.replace(/\[FONTSIZE=(\d{2})\](.*?)\[\/FONTSIZE\]/ig,'<span style="font-size:$1px;">$2</span>');
  tmpStr=tmpStr.replace(/\[FONTFAMILY=(.*?)\](.*?)\[\/FONTFAMILY\]/ig,'<span style="font-family:$1;">$2</span>');
  return tmpStr;
}

//��HTML����ת��ΪUBB���� �����ݿ��ȡ��TextArea
function toUBBCode(content){
  var tmpStr=content;
  //tmpStr=tmpStr.replace(/<([\/]?)(b|u|i)>/ig,"[$1$2]");
  tmpStr=tmpStr.replace(/\<B\>(.*?)\<\/B\>/ig,"[B]$1[/B]");
  tmpStr=tmpStr.replace(/\<I\>(.*?)\<\/I\>/ig,"[I]$1[/I]");
  tmpStr=tmpStr.replace(/\<U\>(.*?)\<\/U\>/ig,"[U]$1[/U]");
  tmpStr=tmpStr.replace(/\<IMG src=\"(.*\/(em\d{2}).gif)\" align=\"absmiddle\" border=\"0\"\>/ig,"[$2]");
  tmpStr=tmpStr.replace(/\<a href=\"(.*?)\" target=_blank\>(.*?)\<\/a\>/ig,"[URL=$1]$2[/URL]");
  tmpStr=tmpStr.replace(/\<span style=\"color:(.*?)\"\>(.*?)\<\/span\>/ig,"[COLOR=$1]$2[/COLOR]");
  tmpStr=tmpStr.replace(/\<IMG style=\"CURSOR:hand\" src=\"(.*?)\" align=\"absmiddle\" border=\"0\"\>/ig,"[IMG]$1[/IMG]");
  tmpStr=tmpStr.replace(/\<div class=\"code\"\>([\w\W]*?)\n\<\/div\>/ig,'[CODE]$1\n[/CODE]');
  tmpStr=tmpStr.replace(/\<div class=\"quote\"\>([\w\W]*?)\n\<\/div\>/ig,'[QUOTE]$1\n[/QUOTE]');
  //ΪʲôҪ�Ӹ�\n�أ����������������һ��javascript����,���溬��</div>�����Ĵ��룬�������\n�������Ͳ��������е�Ч����
  //����[code]...<div>...</div>...[code]��ת��Ϊ<div class=code>....<div>..</div>...</div>���������޸�ʱ�����˶δ���תΪ
  //UBB����ʱ�ͻ���󣬱��[code]...[/code]...</div>��
  //tmpStr=tmpStr.replace(/\<div class=\"quote\"\>([\w\W]*?)\<\/div\>/ig,'[QUOTE]$1[/QUOTE]');
  //([\w\W]*?) ��?�Ƿ�̰��ƥ�䡣��Сƥ�� ȥ��?����̰��ƥ�䣬���ƥ��
  tmpStr=tmpStr.replace(/\<div style=\"text-align:center;\"\>([\w\W]*?)\<\/div\>/ig,'[CENTER]$1[/CENTER]');
  tmpStr=tmpStr.replace(/\<span style=\"font-size:(.*?)px;\"\>(.*?)\<\/span\>/ig,"[FONTSIZE=$1]$2[/FONTSIZE]");
  tmpStr=tmpStr.replace(/\<span style=\"font-family:(.*?);\"\>(.*?)\<\/span\>/ig,"[FONTFAMILY=$1]$2[/FONTFAMILY]");
  return tmpStr;
}

//ɾ����ĩ�ո�ɾ�����½�β�Ŀ��С��ո� ->д�뵽���ݿ�
function String.prototype.delSpace(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/( )+\r/g,'\r');//ɾ����ĩ�ո�
  tmpstr=tmpstr.replace(/[\r\n]+( )*[\r\n]*$/g,'');//ɾ�����½�β�Ŀ��С��ո�
  return tmpstr;
}

//[����]�ַ�ת��->д�뵽���ݿ�
function String.prototype.tsHtmlTextEncode(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/��/g,'&#183;');
  tmpstr=tmpstr.replace(/\$/g,'&#36;');
  //tmpstr=tmpstr.replace(/\\/g,"\\");
  return tmpstr;
}

//[����]�ַ�ת�� ���� �����ݿ��ȡ��TextArea
function String.prototype.tsHtmlTextDecode(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/&#183;/g,"��");
  tmpstr=tmpstr.replace(/&#36;/g,"$");
  //tmpstr=tmpstr.replace(/\\/g,"\\");
  return tmpstr;
}

//HTML���ִ���ת�� ��TextAreaд�뵽���ݿ�
function String.prototype.HtmlTextEncode(){
  var tmpstr=this;
  //tmpstr=tmpstr.replace(/&/g,"&amp;");
  //tmpstr=tmpstr.replace(/\'/g,"&#39;");//�滻������
  //tmpstr=tmpstr.replace(/\"/g,"&quot;");//�滻˫����
  tmpstr=tmpstr.replace(/</g,"&lt;");//�滻<��
  tmpstr=tmpstr.replace(/>/g,"&gt;");//�滻>��
  tmpstr=tmpstr.replace(/\r\n/g,"<br\/>");//�滻\n
  tmpstr=tmpstr.replace(/ /g,"&nbsp;");
  return tmpstr;
}
//HTML���ִ������ �����ݿ��ȡ��TextArea
function String.prototype.HtmlTextDecode(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/&amp;/g,"&");
  tmpstr=tmpstr.replace(/&#39;/g,"\'");
  tmpstr=tmpstr.replace(/&quot;/g,"\"");
  tmpstr=tmpstr.replace(/&lt;/g,"<");
  tmpstr=tmpstr.replace(/&gt;/g,">");
  tmpstr=tmpstr.replace(/<br\/>/g,"\n");
  tmpstr=tmpstr.replace(/&nbsp;/g," ");
  return tmpstr;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//����ʱ��
function rightStr(str,n){
  if(str.length<=n) return(str);
  return(str.substr(str.length-n,n));
}
function addTime(d){
  addcontent(d.getYear()+'-'+rightStr('0'+(d.getMonth()+1),2)+'-'+rightStr('0'+d.getDate(),2)+' '+rightStr('0'+d.getHours(),2)+':'+rightStr('0'+d.getMinutes(),2)+':'+rightStr('0'+d.getSeconds(),2),'');
}

function addcontent(str1,str2){
  $("content").focus();
  if ((document.selection)&&(document.selection.type== "Text")){
    var range= document.selection.createRange();
    var ch_text=range.text;
    range.text=str1+ch_text+str2;
  }else{
    $("content").value=$("content").value+str1+str2;
    $("content").focus();
  }
}

function getParameter(name){
  var paramStr=location.search;
  if(paramStr.length==0)return '';
  if(paramStr.charAt(0)!='?')return '';
  paramStr=unescape(paramStr);
  paramStr=paramStr.substring(1);
  if(paramStr.length==0)return '';
  var params=paramStr.split('&');
  for(var i=0;i<params.length;i++){
    var parts=params[i].split('=',2);
    if(parts[0]==name){
      if(parts.length<2||typeof(parts[1])=="undefined"||parts[1]=="undefined"||parts[1]=="null")return "";
      return parts[1];
    }
  }
  return '';
}

function MyParseInt(digitnum){
  if(IsDigit(digitnum)){
    if(digitnum==""){
      return 0;
    }else{return parseInt(digitnum);}
  }else{return 0;}
}

//������֣������棬���򷵻ؼ�
function IsDigit(digitnum){
  if (digitnum == undefined){return false;}
  if (typeof digitnum != "string"){return false;}
  var re=/[^0-9]/;
  var ret=digitnum.match(re);
  if (ret==null){
    return true;
  }else{return false;}
}

function $escape(sStr){
  return escape(sStr).replace(/\+/g,'%2B').replace(/\"/g,'%22').replace(/\'/g,'%27').replace(/\//g,'%2F');
}

var Radiov='null';
var Rarray='null';
/***
Radio('Element_name', 'value');
***/
function Radio(Ename,Evalue){
  if(typeof(Radiov)=='string') Rarray=_GetRadio();
  if(typeof(Rarray)=='string') return false;
  for(var i=0;i<Rarray.length;i++){
    if(Rarray[i].name==Ename && Rarray[i].value==Evalue){Rarray[i].click();break;}
    //if(Rarray[i].name==Ename && Rarray[i].value*1==Evalue*1){Rarray[i].click();break;}
  }
}
/***
_GetRadio();
return : obj array
***/
function _GetRadio(){
  var _input=document.getElementsByTagName('input');
  if(_input.length<1) return 'null';
  var i,Is=new Array();
  for(i=0;i<_input.length;i++) if(_input[i].type=="radio") Is.push(_input[i]);
  Radiov=Is;
  return Is;
}
/***
Select('Element_id','value');
***/
function Select(Eid,v){
  var _obj=$(Eid);
  for(var i=0;i<_obj.options.length; i++)
  if(_obj.options[i].value==v){_obj.selectedIndex=i;break;}
}

function FromatPage(str,StartNum,EndNum){
  str+="";
  if(str.length>=1){
    mynum=parseInt(str,10);
    if(isNaN(mynum)){
      mynum=StartNum;
    }
    else{
      if(EndNum>-1){
        mynum=(mynum<StartNum)?StartNum:mynum;
        mynum=(mynum>EndNum)?EndNum:mynum;
      }
      else{
        mynum=(mynum<StartNum)?StartNum:mynum;
      }
    }
  }
  else{
    mynum=StartNum;
  }
  return(mynum);
}

/* AJAX �������ú���Start */
function mmAjaxUpdater(url,pars,method,id,evalScript){
  url+=(url.indexOf("?")==-1)?"?":"&";
  url+='time='+new Date().getTime();
  method=method?method:'post';//methodĬ��Ϊpost����
  pars=pars?pars:'';//parsĬ��Ϊ��
  evalScript=evalScript?evalScript:true;//ִ��js,Ĭ��Ϊִ��
  id=id?id:'';//Ĭ��Ϊ���������ݲ�����DIV ID
  var myAjax=new Ajax.Updater(
  id,url,{
    method:method,
    parameters:pars,
    evalScripts:evalScript
    });
}

function mmAjaxRequest(url,pars,method,onSuccessFun){
  url+=(url.indexOf("?")==-1)?"?":"&";
  url+='time='+new Date().getTime();
  method=method?method:'post';//methodĬ��Ϊpost����
  pars=pars?pars:'';//parsĬ��Ϊ��
  onSuccessFun=onSuccessFun?onSuccessFun:okFun;//Ĭ�ϳɹ����غ�����ΪokFun
  var myAjax=new Ajax.Request(
  url,{
    method:method,
    parameters:pars,
    onSuccess:onSuccessFun
    });
}
/* AJAX �������ú���Over */


//clearTimeout

//�ж��ַ��������Ϊ���������������������ʱ���ʽ������#time#�����򷵻��ַ���
function rtnStrInt(str){
  if(chkInt(str)) return str;
  if(str.split('-').length==3) return "#" + str + "#";
  return "'" + str + "'";
}

function leftTrim(str){return str.replace(/^[ \t\n\r]+/g, "");}
function rightTrim(str){return str.replace(/[ \t\n\r]+$/g, "");}
function trim(str){return rightTrim(leftTrim(str));}
function DW(str){document.writeln(str);}

var domain=''; //Ĭ��Cookies��Ч����
