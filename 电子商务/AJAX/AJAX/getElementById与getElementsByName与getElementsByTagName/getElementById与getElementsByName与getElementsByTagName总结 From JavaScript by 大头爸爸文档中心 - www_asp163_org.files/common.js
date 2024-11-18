//检查用户名 条件符合返回真,否则返回假
//允许的用户名条件是：可以是数字0-9，英文字母、下划线和中文(注意：中文不能包含标点符号)
function chkUser2(str){return(new RegExp(/^(\w|[\u4E00-\u9FA5])+$/).test(str));}

//检查用户名 条件符合返回真,否则返回假
//允许的用户名条件是：可以是数字0-9，英文字母,且由英文开头
function chkUser(str){return(new RegExp(/^[a-zA-Z][a-zA-Z0-9]+$/).test(str));}

//检查开头是否为数字、下划线、如果有则返回真，否则返回假
function chkFirst(str){return(new RegExp(/^(\d|_)/).test(str));}

//返回字符串实际个数:汉字算两个字节,英文字母算一个字节
function mmLength(str){return str.replace(/[^\x00-\xff]/gi,'xx').length;}

//检测是否是整数 是返回真，否则返回假
function chkInt(str){return(new RegExp(/^\d{1,5}$/).test(str));}

//检查字符串是否含有<、>、'、"符号，有则返回真，否则返回假
function chkTag(str){return(new RegExp(/[\'\"\?\+\=\^\*\(\)\\\/;&<>·$@%]/).test(str));}

//允许的关键字条件是：可以是数字0-9，英文字母、下划线和中文(注意：中文不能包含标点符号)及“半角逗号(,)”组成
function chkKey(str){return(new RegExp(/^(,|，|\w|[\u4E00-\u9FA5])+$/).test(str));}
//检查是否为中文，是返回真
function chkIsChinese(str){return(new RegExp(/^([\u4E00-\u9FA5])+$/).test(str));}
//检查是否是电话号码
function chkIsTel(str){return(new RegExp(/^(\d{3,4}-)?\d{7,8}$/).test(str));}
//检查是否是手机号码
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

/* Cookies操作函数集 */
function setCookie(name,value,hours,path,domain,secure){
  var cookie=name+'='+escape(value)+
  ((hours)?"; expires="+new Date(new Date().getTime()+hours*3600000).toGMTString():"")+
  ((path)?"; path="+path:"")+
  ((domain)?"; domain="+domain:"")+
  ((secure)?"; secure":"");
  document.cookie=cookie;
}
//修改Cookies值
function modifyCookie(cookiename,name,value,hours,path,domain,secure){
  var cookievalue=unescape(getCookie(cookiename));
  var search=name+"=";
  if(cookievalue.length>0){
    var start=cookievalue.indexOf(search);
    if(start!=-1){
      var s='('+search+')(.*?)(&)';
      re=new RegExp(s,"ig");
      cookievalue=cookievalue.replace(re,'$1'+value+'$3');
      setCookie(cookiename,cookievalue,hours,path,domain);//修改cookies中的某个值
      return;
    }else{
    //有cookies，但没有此cookies字典，则添加
    //比如一个cookies中含有name,mail,tel等字典，现在要添加一个movetel,则将movetel添加进去
      cookievalue=cookievalue+'&'+search+value;
      setCookie(cookiename,cookievalue,hours,path,domain);//修改cookies中的某个值
      return;
    }
  }
  //如果cookies为空，则添加此cookies
  cookievalue=search+value;
  setCookie(cookiename,cookievalue,hours,path,domain);
}

//取得名称为name的cookie值
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
//如果Cookies含有关键字，即response.cookies("xx")("yy")="xx"
//取出yy的值，先用getCookie("xx")取出该cookies，然后用getCookieKey("xx","yy")取出yy的值
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

//删除名称为name的Cookie
function delCookie(name){
  var expires=new Date();
  expires.setTime(expires.getTime()-1);
  var cookie=name+"="+getCookie(name);
  cookie+=';expires='+expires.toGMTString();
  document.cookie=cookie;
}

//清除全部Cookie
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
//新闻编辑相关函数
//将UBB代码转换为HTML代码 从TextArea写入到数据库
function toHtmlCode(content){
  var tmpStr=content;
  tmpStr=tmpStr.replace(/\[B\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/B]/ig,"<B>$2</B>");//粗体
  tmpStr=tmpStr.replace(/\[I\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/I]/ig,"<I>$2</I>");//斜体
  tmpStr=tmpStr.replace(/\[U\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/U]/ig,"<U>$2</U>");//下划线
  //字体颜色
  tmpStr=tmpStr.replace(/\[COLOR=(#*[a-z0-9]*)\]\r*(\<br\/\>)*(.*?)\r*(\<br\/\>)*\[\/COLOR\]/ig,'<span style="color:$1">$3</span>');
  //tmpStr=tmpStr.replace(/\[([\/]?)(b|u|i)\]/ig,"<$1$2>");//这样写有一个问题无法解决，即script脚本中的数组问题，如a[i]
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

//将HTML代码转换为UBB代码 从数据库读取到TextArea
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
  //为什么要加个\n呢，碰到这样的情况，一段javascript代码,里面含有</div>这样的代码，如果不加\n，这样就不是理想中的效果了
  //比如[code]...<div>...</div>...[code]，转变为<div class=code>....<div>..</div>...</div>，这样当修改时，将此段代码转为
  //UBB代码时就会错误，变成[code]...[/code]...</div>。
  //tmpStr=tmpStr.replace(/\<div class=\"quote\"\>([\w\W]*?)\<\/div\>/ig,'[QUOTE]$1[/QUOTE]');
  //([\w\W]*?) 加?是非贪婪匹配。最小匹配 去掉?则是贪婪匹配，最大匹配
  tmpStr=tmpStr.replace(/\<div style=\"text-align:center;\"\>([\w\W]*?)\<\/div\>/ig,'[CENTER]$1[/CENTER]');
  tmpStr=tmpStr.replace(/\<span style=\"font-size:(.*?)px;\"\>(.*?)\<\/span\>/ig,"[FONTSIZE=$1]$2[/FONTSIZE]");
  tmpStr=tmpStr.replace(/\<span style=\"font-family:(.*?);\"\>(.*?)\<\/span\>/ig,"[FONTFAMILY=$1]$2[/FONTFAMILY]");
  return tmpStr;
}

//删除行末空格，删除文章结尾的空行、空格 ->写入到数据库
function String.prototype.delSpace(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/( )+\r/g,'\r');//删除行末空格
  tmpstr=tmpstr.replace(/[\r\n]+( )*[\r\n]*$/g,'');//删除文章结尾的空行、空格
  return tmpstr;
}

//[特殊]字符转义->写入到数据库
function String.prototype.tsHtmlTextEncode(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/·/g,'&#183;');
  tmpstr=tmpstr.replace(/\$/g,'&#36;');
  //tmpstr=tmpstr.replace(/\\/g,"\\");
  return tmpstr;
}

//[特殊]字符转义 解码 从数据库读取到TextArea
function String.prototype.tsHtmlTextDecode(){
  var tmpstr=this;
  tmpstr=tmpstr.replace(/&#183;/g,"·");
  tmpstr=tmpstr.replace(/&#36;/g,"$");
  //tmpstr=tmpstr.replace(/\\/g,"\\");
  return tmpstr;
}

//HTML部分代码转码 从TextArea写入到数据库
function String.prototype.HtmlTextEncode(){
  var tmpstr=this;
  //tmpstr=tmpstr.replace(/&/g,"&amp;");
  //tmpstr=tmpstr.replace(/\'/g,"&#39;");//替换单引号
  //tmpstr=tmpstr.replace(/\"/g,"&quot;");//替换双引号
  tmpstr=tmpstr.replace(/</g,"&lt;");//替换<号
  tmpstr=tmpstr.replace(/>/g,"&gt;");//替换>号
  tmpstr=tmpstr.replace(/\r\n/g,"<br\/>");//替换\n
  tmpstr=tmpstr.replace(/ /g,"&nbsp;");
  return tmpstr;
}
//HTML部分代码解码 从数据库读取到TextArea
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

//插入时间
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

//如果数字，返回真，否则返回假
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

/* AJAX 公共调用函数Start */
function mmAjaxUpdater(url,pars,method,id,evalScript){
  url+=(url.indexOf("?")==-1)?"?":"&";
  url+='time='+new Date().getTime();
  method=method?method:'post';//method默认为post发送
  pars=pars?pars:'';//pars默认为空
  evalScript=evalScript?evalScript:true;//执行js,默认为执行
  id=id?id:'';//默认为不返回数据并插入DIV ID
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
  method=method?method:'post';//method默认为post发送
  pars=pars?pars:'';//pars默认为空
  onSuccessFun=onSuccessFun?onSuccessFun:okFun;//默认成功返回函数名为okFun
  var myAjax=new Ajax.Request(
  url,{
    method:method,
    parameters:pars,
    onSuccess:onSuccessFun
    });
}
/* AJAX 公共调用函数Over */


//clearTimeout

//判断字符串，如果为整数，返回整数，如果是时间格式，返回#time#，否则返回字符串
function rtnStrInt(str){
  if(chkInt(str)) return str;
  if(str.split('-').length==3) return "#" + str + "#";
  return "'" + str + "'";
}

function leftTrim(str){return str.replace(/^[ \t\n\r]+/g, "");}
function rightTrim(str){return str.replace(/[ \t\n\r]+$/g, "");}
function trim(str){return rightTrim(leftTrim(str));}
function DW(str){document.writeln(str);}

var domain=''; //默认Cookies有效域名
