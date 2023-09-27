<?php
if(!defined("SNAPE_VN")) die('No access');

if(!$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());

?>
<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/jscedrusv3/load_news.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
        	SnapeNews.init(1);
			SnapeGuild.guildHome().show();
			// var button = document.getElementById("btn");
			// button.onclick = function(){
                // alert("Máy chủ đang bảo trì tới 1h 15/1 ");
            // }
			// var button = document.getElementById("btn1");
             // button.onclick = function(){
                // alert("Máy chủ đang bảo trì tới 1h 15/1 ");
            // }

			// var button = document.getElementById("btn2");

        });
    </script>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="container">

        		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">


        <div id="containerserver">
				 <!---a href="http://me.zing.vn/apps/gunny1/?_src=gn_home_listsv" title="Gunny Huyền Thoại"  class="BtLegend BtLegendServer">Gunny Huyền Thoại</a-->
                <div class="Content">


                    <div class="NewServer">
                        <a title="Gà Tre" type="button" id="btn" href="/choigame/index.php" target="_blank">GÀ ASM</a>
						<a title="Gà Lá" class="Đông Nhất" id="btn2" href="/choigame/index.php" target="_blank">Chưa Mở</a>

                    </div>
                    <div class="BoxServer">

                        <div class="ListServer">

                          <ul class="Active ServerList" id="S1">
						      <li><a title="GÀ ASM" type="button" id="btn1" href="/choigame/index.php" target="_blank"><span>1</span><font color=black>GÀ ASM</font></a></li>


						    <!--li><a title="Gà Mờ" href="http://gunhuyenthoai.com/play.php?id=1003"><span>2</span> Gà Mờ </a></li>

                    <li><a title="Gà Béo" href="http://gunhuyenthoai.com/play.php?id=1001"><span>1</span> Gà Béo - Chiến </a></li-->


                    </ul>
                        </div>
                    </div>
                </div>
      </div>

