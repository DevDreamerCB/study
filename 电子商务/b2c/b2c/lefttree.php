<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=utf-8");
session_start();  
if ($_SESSION['userid'] == '')
{
	die('<script language="javascript">top.location.href="loginexit.php"</script>');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <title>无标题页</title>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <style>
        BODY
        {
            font-family: ms shell dlg;
            font-size: 12px;
        }
        DIV
        {
            font-family: ms shell dlg;
            font-size: 12px;
        }
        FONT
        {
            font-family: ms shell dlg;
            font-size: 12px;
        }
        .off
        {
            display: inline;
        }
        .on
        {
            display: none;
        }
        .menus
        {
            background-color: buttonface;
            border-bottom: black 1px solid;
            border-left: white 1px solid;
            border-right: black 1px solid;
            border-top: white 1px solid;
            cursor: hand;
            font-size: 9pt;
            margin: 0px;
            overflow: hidden;
            padding-bottom: 1px;
            padding-left: 6px;
            padding-right: 6px;
            padding-top: 1px;
            text-align: left;
            width: 90px;
        }
        #menutool
        {
            left: 6px;
            position: absolute;
            width: 90px;
            z-index: 10;
        }
        A
        {
             
            font-size: 9pt;
            text-decoration: none;
            text-transform: none;
            cursor: hand;
        }
        A:hover
        {
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
        A:visited
        {
            cursor: hand;
        }
        .tab_border
        {
            border: 1px solid #000000;
        }
        #Form1
        {
            height: 231px;
        }
    </style>

    <script language="JavaScript">
	<!--
    function editUserInfo(){
       
       window.open("Dialog_changepassword.aspx","","status=0,menubar=0,location=0,toolbar=0,width=240,height=140,scrollbars=1");
	   
    }
   

	function swapimg(myimgNum,secNum,folderimg){
	    if (secNum.className=="off")
		{
			secNum.className="on";
	     	myimgNum.src="images/tplus.gif";
	     	folderimg.src="images/icon_folder.gif"
		}
	    else
		{
			secNum.className="off";
	     	myimgNum.src="images/tminus.gif";
	     	folderimg.src="images/icon_folderopen.gif"
		}
	  }
	  
	 
	 	function statu()
	{
		window.defaultStatus=' ';
	}
	//window.setInterval("statu()",10)
	
	function AllClose(){
	tempColl = document.all.tags("div");
	
		for (i=0; i<tempColl.length; i++) {
			if (tempColl(i).className == "off") {
			tempColl(i).className = "on"
			}
		}
	imgColl = document.all.tags("img");
		
		for (i=0; i<imgColl.length; i++) {
		
			if (imgColl(i).id != "") {
			if(imgColl(i).className == "havechild") {
			imgColl(i).src = "images/icon/icon_folder.gif"
			}
			else{
			imgColl(i).src = "images/icon/tplus.gif"
			}
			}
		}
	}
	
	function AllOpen(){
	tempColl = document.all.tags("div");
		for (i=0; i<tempColl.length; i++) {
			if (tempColl(i).className == "on") {
			tempColl(i).className = "off"
			}
		}
	imgColl = document.all.tags("IMG");	
		for (i=0; i<imgColl.length; i++) {
		
			if (imgColl(i).id != "") {
				if(imgColl(i).className == "havechild") {
					imgColl(i).src = "images/icon/icon_folderopen.gif"
				}
				else{
					imgColl(i).src = "images/icon/tminus.gif"
				}
			}
		}
	}
	//-->
	
    </script>

    <script>
var Xpos = 1;
var Ypos = 1;
function doDown() 
{
	Xpos = document.body.scrollLeft+event.x;
	Ypos = document.body.scrollTop+event.y;
}

function showmenu()
{
	menutool.style.left=Xpos;
	menutool.style.top=Ypos; 
}
function hidemenu()
{
	menutool.style.display="none"
}
	document.onclick = hidemenu;
	document.onmousedown = doDown;
function load_page(link)
{

}

function load_Href(url,sign)
{
	parent.mailtreeframe.location.href=url
	parent.messageframe.from.innerText=""
	parent.messageframe.subject.innerText=""
	parent.messageframe.view_source.innerText=""
	parent.messageframe.mailmsgArea.location.href="about:blank"
	parent.main_display.rows="160,*";
}

var selectedIndex=0;

self.onError=null;

function go_Href(url)
{
		//if(!document.all)    return;
		
	
		if ((event.srcElement.className=="item"))
		{
		      var srcIndex = event.srcElement.sourceIndex
		      var nested = document.all[srcIndex+3]

				var srcIndex = event.srcElement.sourceIndex;
				var previous = document.all[selectedIndex];
				selectedIndex=srcIndex;
		}
	parent.right.location.href=url
}

    </script>

</head>
<body class="lbody" oncontextmenu="self.event.returnValue=false;showmenu()" onselectstart="self.event.returnValue=false"
    ondragstart="self.event.returnValue=false" leftmargin="4" topmargin="8" rightmargin="0">
    <div id="menutool" style="display: none">
        <table class="menus" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td onmouseover="this.style.backgroundColor='darkblue';this.style.color='white';"
                        onclick="AllOpen();hidemenu()" onmouseout="this.style.backgroundColor='';this.style.color='';"
                        width="80" height="20">
                        <nobr>&nbsp;&nbsp;全部打开</nobr>
                    </td>
                </tr>
                <tr>
                    <td onmouseover="this.style.backgroundColor='darkblue';this.style.color='white';"
                        onclick="AllClose();hidemenu()" onmouseout="this.style.backgroundColor='';this.style.color='';"
                        height="20">
                        <nobr>&nbsp;&nbsp;全部关闭</nobr>
                    </td>
                </tr>
                <tr>
                    <td onmouseover="this.style.backgroundColor='darkblue';this.style.color='white';"
                        onclick="self.location.reload();hidemenu()" onmouseout="this.style.backgroundColor='';this.style.color='';"
                        height="20">
                        <nobr>&nbsp;&nbsp;刷&nbsp;&nbsp;新</nobr>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    <form id="Form1" runat="server">
    <div>
        <img src="images/icon_unctitle.gif" align="absMiddle">
        <b>功能菜单</b></div>
    <div>
    </div>
    
    <?php /*session_start();*/ if ($_SESSION['usertype'] == "0")
  { ?>
    <div id="a0" runat="server">
        <img id="newfolderimg48" style="cursor: hand;" onclick="swapimg(newfolderimg48,newfolderit48,newopenimg48)"
            alt="" src="images/tplus.gif" align="absMiddle" border="0">
        <img class="havechild" id="newopenimg48" alt="" src="images/icon_folderopen.gif"
            align="absMiddle" border="0">
        购买商品</div>
    <div class="on" id="newfolderit48">
        <div id="t0" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('selectproduct0.php')">选择商品</a>
        </div>
        <div id="t1" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('orderlist.php')">订单查询</a>
        </div>
        <div id="t2" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('query_all/query_in_all.aspx')">投入查询</a>
        </div>
        <div id="t3" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('query_all/query_paifang.aspx')">液体排放查询</a>
        </div>
        <div id="t4" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('query_all/query_update_all.aspx')">已修改查询</a>
        </div>
        <div id="t5" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('query_all/query_over_out_all.aspx')">已结束产出查询</a>
        </div>
    </div>
    <div id="DIV86" runat="server">
        <img id="IMG1" style="cursor: hand" onclick="swapimg(IMG1,DIV87,IMG3)" alt="" src="images/tplus.gif"
            align="absMiddle" border="0">
        <img class="havechild" id="IMG3" alt="" src="images/icon_folderopen.gif" align="absMiddle"
            border="0">
        工厂操作</div>
    <div class="on" id="DIV87">
        <div id="DIV91" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('FactoryInfo/AddFactory.aspx')">新增工厂</a>
        </div>
        <div id="DIV92" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('FactoryInfo/GetFactory.aspx')">工厂列表</a>
        </div>
    </div>

    <!--                                       
 <DIV noWrap><IMG id="queryimg" style="CURSOR: hand" onclick=swapimg(queryimg,query,querying) alt="" src="images/t.gif" align=absMiddle border=0>
            <IMG class=havechild id="querying" alt="" src="images/icon_folderopen.gif" align=absMiddle border=0> 
            <A class=item onclick="javascript:go_Href('inquery.aspx')">查询</A>
</DIV>                  
-->
    
    
    <div nowrap>
        <img id="userimg" style="cursor: hand" onclick="swapimg(userimg,user,useropenimg)"
            alt="" src="images/t.gif" align="absMiddle" border="0">
        <img class="havechild" id="useropenimg" alt="" src="images/icon_folderopen.gif" align="absMiddle"
            border="0">
        <a class="item" onclick="javascript:editUserInfo()">修改密码</a>
    </div>
  
   
    <?php } else if ($_SESSION['usertype'] == "1")
{?>
	    <div id="a0" runat="server">
        <img id="newfolderimg48" style="cursor: hand;" onclick="swapimg(newfolderimg48,newfolderit48,newopenimg48)"
            alt="" src="images/tplus.gif" align="absMiddle" border="0">
        <img class="havechild" id="newopenimg48" alt="" src="images/icon_folderopen.gif"
            align="absMiddle" border="0">
        新增商品</div>
    <div class="on" id="newfolderit48">
        <div id="t0" runat="server">
            <img src="images/i.gif" align="absMiddle">
            <img src="images/t.gif" align="absMiddle">
            <img alt="Folder" src="images/icon_inbox.gif" align="absMiddle">
            <a class="item" onclick="javascript:go_Href('addproduct.php')">新增商品</a>
        </div>
    </div>
<?php } ?>        
    <div>
        <img alt="" src="images/l.gif" align="absMiddle" border="0">
        <img alt="" src="images/icon_exit.gif" align="absMiddle" border="0" />
        <a class="item" onclick=window.parent.location.href="loginexit.php" >退出</a>

    </div>
    </form>
</body>
</html>
