   <style type="text/css">
        <!--
        .container{
            margin:0 auto;
            display: block;
            width:500px;
            max-width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            height:auto;
            text-align:center;
        }
        .knight{
			background:url("http://sinhvienit.net/common/images/knight.png") no-repeat;
			width:128px;
			height:128px;
			margin:0px auto;

        }
        .text1{
            color:#8f2828;
            display:inline-block;
            font-size:20px;
            font-weight:bold;
            padding:5px;
            font-family: "Segoe UI","Segoe","Segoe WP","Tahoma","Verdana","Arial","sans-serif";
        }
        .dvbtn{
            text-align:center;
            margin:10px;
        }
        .btn {
            border: none;
            background: #34495e;
            color: white;
            font-size: 16.5px;
            text-decoration: none;
            text-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-transition: 0.25s;
            -moz-transition: 0.25s;
            -o-transition: 0.25s;
            transition: 0.25s;
            -webkit-backface-visibility: hidden;
        }
        .btn.btn-red {
            background-color: #e74c3c;
            padding: 11px 19px;
            font-size: 17.5px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            cursor:pointer;
            font-family: "Segoe UI","Segoe","Segoe WP","Tahoma","Verdana","Arial","sans-serif";
        }
        .btn.btn-red:hover, .btn.btn-red:focus {
            background-color: #ec7063;
        }
        .btn.btn-gray {
            background-color: #95a5a6;
            padding: 11px 19px;
            font-size: 17.5px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            cursor:pointer;
            font-family: "Segoe UI","Segoe","Segoe WP","Tahoma","Verdana","Arial","sans-serif";
        }
        #fadingBarsG{
            position:relative;
            width:240px;
            height:29px;
            margin:0 auto;
        }

        .fadingBarsG{
            position:absolute;
            top:0;
            background-color:#bac4c5;
            width:29px;
            height:29px;
            -moz-animation-name:bounce_fadingBarsG;
            -moz-animation-duration:1.3s;
            -moz-animation-iteration-count:infinite;
            -moz-animation-direction:linear;
            -moz-transform:scale(.3);
            -webkit-animation-name:bounce_fadingBarsG;
            -webkit-animation-duration:1.3s;
            -webkit-animation-iteration-count:infinite;
            -webkit-animation-direction:linear;
            -webkit-transform:scale(.3);
            -ms-animation-name:bounce_fadingBarsG;
            -ms-animation-duration:1.3s;
            -ms-animation-iteration-count:infinite;
            -ms-animation-direction:linear;
            -ms-transform:scale(.3);
            -o-animation-name:bounce_fadingBarsG;
            -o-animation-duration:1.3s;
            -o-animation-iteration-count:infinite;
            -o-animation-direction:linear;
            -o-transform:scale(.3);
            animation-name:bounce_fadingBarsG;
            animation-duration:1.3s;
            animation-iteration-count:infinite;
            animation-direction:linear;
            transform:scale(.3);
        }

        #fadingBarsG_1{
            left:0;
            -moz-animation-delay:0.52s;
            -webkit-animation-delay:0.52s;
            -ms-animation-delay:0.52s;
            -o-animation-delay:0.52s;
            animation-delay:0.52s;
        }

        #fadingBarsG_2{
            left:30px;
            -moz-animation-delay:0.65s;
            -webkit-animation-delay:0.65s;
            -ms-animation-delay:0.65s;
            -o-animation-delay:0.65s;
            animation-delay:0.65s;
        }

        #fadingBarsG_3{
            left:60px;
            -moz-animation-delay:0.78s;
            -webkit-animation-delay:0.78s;
            -ms-animation-delay:0.78s;
            -o-animation-delay:0.78s;
            animation-delay:0.78s;
        }

        #fadingBarsG_4{
            left:90px;
            -moz-animation-delay:0.91s;
            -webkit-animation-delay:0.91s;
            -ms-animation-delay:0.91s;
            -o-animation-delay:0.91s;
            animation-delay:0.91s;
        }

        #fadingBarsG_5{
            left:120px;
            -moz-animation-delay:1.04s;
            -webkit-animation-delay:1.04s;
            -ms-animation-delay:1.04s;
            -o-animation-delay:1.04s;
            animation-delay:1.04s;
        }

        #fadingBarsG_6{
            left:150px;
            -moz-animation-delay:1.17s;
            -webkit-animation-delay:1.17s;
            -ms-animation-delay:1.17s;
            -o-animation-delay:1.17s;
            animation-delay:1.17s;
        }

        #fadingBarsG_7{
            left:180px;
            -moz-animation-delay:1.3s;
            -webkit-animation-delay:1.3s;
            -ms-animation-delay:1.3s;
            -o-animation-delay:1.3s;
            animation-delay:1.3s;
        }

        #fadingBarsG_8{
            left:210px;
            -moz-animation-delay:1.43s;
            -webkit-animation-delay:1.43s;
            -ms-animation-delay:1.43s;
            -o-animation-delay:1.43s;
            animation-delay:1.43s;
        }

        @-moz-keyframes bounce_fadingBarsG{
            0%{
                -moz-transform:scale(1);
                background-color:#bac4c5;
            }

            100%{
                -moz-transform:scale(.3);
                background-color:#FFFFFF;
            }

        }

        @-webkit-keyframes bounce_fadingBarsG{
            0%{
                -webkit-transform:scale(1);
                background-color:#bac4c5;
            }

            100%{
                -webkit-transform:scale(.3);
                background-color:#FFFFFF;
            }

        }

        @-ms-keyframes bounce_fadingBarsG{
            0%{
                -ms-transform:scale(1);
                background-color:#bac4c5;
            }

            100%{
                -ms-transform:scale(.3);
                background-color:#FFFFFF;
            }

        }

        @-o-keyframes bounce_fadingBarsG{
            0%{
                -o-transform:scale(1);
                background-color:#bac4c5;
            }

            100%{
                -o-transform:scale(.3);
                background-color:#FFFFFF;
            }

        }

        @keyframes bounce_fadingBarsG{
            0%{
                transform:scale(1);
                background-color:#bac4c5;
            }

            100%{
                transform:scale(.3);
                background-color:#FFFFFF;
            }
        }
        .loading{
            margin:10px;
        }
        -->
    </style>
	
    <script type="text/javascript">
        <!--
        //--Begin Google Analytics Codes
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-8172215-1']);
        _gaq.push(['_setDomainName', 'sinhvienit.net']);
        _gaq.push(['_trackPageview']);

        _gaq.push(['b._setAccount', 'UA-8172215-10']);
        _gaq.push(['b._setDomainName', 'sinhvienit.net']);
        _gaq.push(['b._trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
        //--End Google Analytics Codes
        function showLoading(){
            document.getElementById('btnSubmit1').style.display='none';
            document.getElementById('btnSubmit2').style.display='inline-block';
            document.getElementById('loading').style.display='block';
            return true;
        }
        -->
    </script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1514899285475630";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function Ads() {
            PopupManager.open("<?=$ads[$rnd]?>", 1, 1);
        }
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '966242223397117',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<?php
#############################################
#	TEMPLATE FOR DnP FIRE WALL PASTE BELOW	#
#############################################

$Layout='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="distribution" content="global">
<meta name="resource-type" content="document">
<meta name="language" content="vi">
<meta name="robots" content="noodp,index,follow">
<meta name="revisit-after" content="1 days">
<meta name="google-site-verification" content="X17toTFPCWm1zxrFsdQf3DLPzfhzB6pAmD1bLziR2cA" /> 


<meta name="author" content="Gunny2016.Us Gunny Free"/>
<meta property="og:image" content="/images/bg-login-new.jpg"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="generator" content="gunny, gunny 2016, gunny lau 2016, guny 2016, gunny lau, gunny lậu, gunny lau free xu, gunny full xu, gunny lau mien phi, gunny lau moi, gunny free cash, gunny moi ra, gunny miễn phí, gunny mien phi, web gunny lau, Gunny Free ,gunny lau nhieu nguoi choi, gunny private, gunny full xu, gunny lau hay nhat, gunny lau 2015, idgunny, game gunny, id gunny, gunny 2015, gunny 2, trang chu gunny, guny, gunny mobile">
<meta name="description" content="gunny, gunny 2016, gunny lau 2016, guny 2016, gunny lau, gunny lậu, gunny lau free xu, gunny full xu, gunny lau mien phi, gunny lau moi, gunny free cash, gunny moi ra, gunny miễn phí, gunny mien phi, web gunny lau, Gunny Free ,gunny lau nhieu nguoi choi, gunny private, gunny full xu, gunny lau hay nhat, gunny lau 2015, idgunny, game gunny, id gunny, gunny 2015, gunny 2, trang chu gunny, guny, gunny mobile">
<meta name="keywords" content="gunny, gunny 2016, gunny lau 2016, guny 2016, gunny lau, gunny lậu, gunny lau free xu, gunny full xu, gunny lau mien phi, gunny lau moi, gunny free cash, gunny moi ra, gunny miễn phí, gunny mien phi, web gunny lau, Gunny Free ,gunny lau nhieu nguoi choi, gunny private, gunny full xu, gunny lau hay nhat, gunny lau 2015, idgunny, game gunny, id gunny, gunny 2015, gunny 2, trang chu gunny, guny, gunny mobile">
<title>
GUNV55 
</title>


</head>
<img src="images/thich.png" style="margin-left:580px;margin-top:190px; position: fixed;" alt="" />
			<div class="fb-like" data-href="https://www.facebook.com/BoLacGunny/" style="margin-left:600px;margin-top:230px;position: fixed;" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<center>


	<div class="container">
    <form name=vl_firewall method=get action=firewall.php>
        <input type=hidden value="'.$_SERVER['REQUEST_URI'].'" name="vl_firewall_redirect">
        <div class="knight"></div>
        <div class="dvbtn">
            <button class="btn btn-red" type="submit" id="btnSubmit1">Click vào đây để tiếp tục</button></br>
			
            <button class="btn btn-gray" type="button" id="btnSubmit2" style="display: none;">Đang chuyển trang, vui lòng đợi...</button>
            <a href="" class="btn btn-red" id="btnSubmit3" style="display: none;">Click vào đây nếu đợi quá lâu</a>
        </div>
    </form>
	</div>
</center>



</html>';

#############################################
#	TEMPLATE FOR DnP FIRE WALL ENDED ABOVE	#
#############################################
?>

