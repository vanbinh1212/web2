<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
error_reporting(E_ALL & ~E_NOTICE & ~8192);
session_start();
define("Gun4S.Net",true);
include "#config.php";
include "function.php";
define("api_key","vvvvvvvvvvvncmvncmzksnc");
$search = [' ','_','-','*',':',']','[',"'",'+'];
$user	= str_replace($search,"",$_GET['user']);
$requesturl = 'http://gunbachay.net/req/';
$flashurl = 'http://gunbachay.net/choigame/flashnew/';
$Loginkey = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-cedrusnedinhlamcailogingi172';
$configflash = 'http://gunbachay.net/choigame/flashnew/config.xml';
$serverurl = 'http://gunbachay.net/choigame/';
$param = 'username='.urlencode($user).'&password='.urlencode(0906100085).'&key='.urlencode(api_key).'&loginkey='.urlencode($Loginkey).'&loginurl='.urlencode($requesturl);
$fileget = file_get_contents($serverurl.'LoginWithKey.ashx?'.$param);
$fileget1 = explode("-",$fileget)[1];
if(!$fileget1){
	exit("Lỗi Hệ Thống, Server Code : ".$fileget);
}
if(isset($user)) {
	$key = 'logingunny&v=10950&rand=882781982';
	$config = 'http://gunbachay.net/choigame/flashnew/config.xml';
	//exit('http://gunbachay.net/choigame//flashhx14/Loading.swf?user='.$user.'&key='.$key.'&config='.$config.'');
}
else
{
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028) -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript">var url = "<?=RequestUrl;?>";</script>
<script type="text/javascript" src="scripts/Jquery.js"></script>
<script type="text/javascript" src="scripts/swfobjectVer.js"></script>
<script type="text/javascript" src="scripts/doVersion.js"></script>
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0"><title>
Webgame Bắn Gà Vui Nhộn | Chiến Thuật Đầy Trí Tuệ
</title>
    <script type="text/javascript" src="scripts/dandantang.js"></script>
    <script type="text/javascript" src="scripts/rightClick.js"></script>
    <script type="text/javascript" src="scripts/swfobject.js"></script>
    <script src="scripts/prototype.js" type="text/javascript"></script>
    <script src="scripts/prototype(1).js" type="text/javascript"></script>
    <script src="scripts/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="scripts/isSafeFlash.js"></script> 
	<link rel="stylesheet" type="text/css" href="scripts/topbar.css">
    

    <script type="text/javascript">
<!--
//napthe
function user_ZingPay(ProductID,AccountName,ServerID,UserID){
var win = window.open('http://gunbachay.net/tai-khoan/nap-the/');
  win.focus();
}
	var allowLeave = 2;
	var www="";
	var name="Không bik";
        var isPay=false;
	
	function trace(){
		alert("Trace");
	}
	function setFavorite(path,titlename,allowvalue)
	{ 
             www=path;
             name=titlename;
             allowLeave=allowvalue;
	}
	function toLocation(url,msg){
		alert(msg);
		closeWindow("1",url);
	}
	
	function addToFavorite()
	{
		var ua = navigator.userAgent.toLowerCase();
		if(ua.indexOf("msie 8")>-1){
			external.AddToFavoritesBar(www,name,'');//IE8
		}else{
			try {
				window.external.addFavorite(www, name);
			} catch(e) {
				try {
					window.sidebar.addPanel(name, www, "");//firefox
				} catch(e) {
					alert("Trình duyệt không hỗ trợ tính năng này, hãy dùng Ctrl+D để thêm");
				}
			}
		}
	}

	function getLocationUrl(){
		var addurl = document.location.href;
		 //thisMovie("7road-ddt-game").sendSwfNowUrl(addurl.toString());
		try{
			thisMovie("7road-ddt-game").sendSwfNowUrl(addurl.toString());
		}catch(e){
			if (window.clipboardData){
				window.clipboardData.setData("Text", addurl.toString());
			}
			else if (window.netscape){
				try {
					netscape.security.PrivilegeManager.enablePrivilege(addurl.toString());
				} catch (e) {
					alert("Trình duyệt từ chối, hãy nhấn F6 để nhận link copy"); 
				}
				
			}else{
				alert("Trình duyệt không hỗ trợ tính năng này, hãy nhấn F6 để nhận link copy"); 
			}
		}
	}

     //3.1新功能
    //js与as交互
     function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }
     
     var flashCall   =false;     
     function closeWindow(flag,loginUrl) { 
     flashCall   =true;
     if(flag=="0"){
	    top.window.opener=null; 
	    top.window.open("","_self"); 
	    top.window.close(); 
         }else if(flag=="1") { 
              //修改登陆Url
	        self.parent.location=loginUrl;
         }
    }
    function setFlashCall(){
	flashCall=true;
    }
    
    //set Active and email
     var dailyTask=-1,dailyActivity=-1,dailyEmail=-1;
    function setDailyTask(_dailyTask){
	dailyTask=_dailyTask;
    }
    function setDailyActivity(_dailyActivity){
	dailyActivity=_dailyActivity;
     }
    function setDailyEmail(_dailyEmail){
	dailyEmail=_dailyEmail;
     }
     
	window.onbeforeunload = function(e)
    	{
           askUserLeave(e);
    }
    function killErrors() //杀掉所有的出错信息
    { 
	    return true; 
    }
	function sandaFillHandler ()
	{
		if(ibw_public.existNameSpace('sdoNewPay'))
		{
			ibw_public.openWidget('sdoNewPay');
		}
	}
	
	function setFlashFocus()
	{
		document.getElementById('7road-ddt-game').focus();
	}
  window.onerror = killErrors; 

   	function pushfeed(myJSONtext){
	var data = eval('(' + myJSONtext + ')');
	      		//alert(myJSONtext);
				zmf.ui(
			        {		        	
						pub_key: data.pub_key,
						sign_key: data.sign_key,
						action_id: data.actId,
						uid_to: data.userIdTo,
						object_id: data.objectId,
						attach_name: data.attachName,
						attach_href: data.attachHref,
						attach_caption: data.attachCaption,
						attach_des: data.attachDescription,
						media_type: data.mediaType,
						media_img: data.mediaImage,
						media_src: data.mediaSource,
						actlink_text: data.actionLinkText,
						actlink_href: data.actionLinkHref,
						tpl_id: data.tplId,
						suggestion: [data.itemTitle1,data.itemTitle2,data.itemTitle3]
						//suggestion: ["suggestion1", "suggestion2", "suggestion3"]

			        })
	      	}  

				
    </script>   

	
</head>
 

<body style ="margin-top: 0px; margin-left: 0px;" scroll="no" onload="setFlashFocus();">

  
	
	
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
            <td valign="middle">
                    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr>
                            <td align="center">
                               <div id="gameContainer" style="width:1000px;height:600px;overflow:hidden;">
                                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="7road-ddt-game" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="Main" width="1000" height="600" align="middle">
                                    <param name="allowScriptAccess" value="always">
                                    <param name="movie" value="<?=$flashurl;?>Loading.swf?user=<?php echo $user;?>&amp;key=<?php echo $fileget;?>&amp;v=10950&amp;rand=<?=rand(0,999999999);?>&amp;config=<?=$configflash;?>&amp;sessionId=<?=rand(0,999999999);?>">                   
									<param name="quality" value="high">
                                    <param name="menu" value="false">
                                    <param name="bgcolor" value="#000000">
                                    <param name="FlashVars" value="site=&amp;sitename=&amp;rid=&amp;enterCode=&amp;sex=">
                                    
                                    <embed flashvars="site=&amp;sitename=&amp;rid=&amp;enterCode=&amp;sex=" src="<?=$flashurl;?>Loading.swf?user=<?php echo $user;?>&amp;key=<?php echo $fileget;?>&amp;v=10950&amp;rand=<?=rand(0,999999999);?>&amp;config=<?=$configflash;?>" width="1000" height="600" align="middle" quality="high" name="Main" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="direct">
                                </object>
                               </div>
                               </div>
                            </td>
                        </tr>
                    </tbody></table>
            </td>
        </tr>
    </tbody></table>	
	

</body><div></div></html>