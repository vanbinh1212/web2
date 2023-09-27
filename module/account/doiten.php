
<script type="text/javascript">
        $(document).ready(function () {
			$("#txtServer").change(function() {
				var serverid = $("#txtServer").val();
				if(serverid != null && serverid != 0) {
					SnapeClass.loadPlayersList(serverid, "#txtcharacter");
				}
			});
        });
		
    </script>
<div style="padding:5px !important;">




  <!-- Tab panes -->
  <div class="tab-content">
  


	  
   <center> <div id="home" style="width:100% !important;" class="container tab-pane active"><br>
   <div id="quanap" class="alert alert-warning" style="width:70%">

			 <h2><p class="text-danger">ĐỔI TÊN NHÂN VẬT LỆ PHÍ 50 CÀNH! </a> </p>
</div></center></h2>

 
    <div class="col-md-8">
   <div id="quanap" class="alert alert-success" style="width:100%">

<center><form id="frmReCharge" method="post">
<label class="control-label" for="email_login">Loại:</label>

			<select class="form-control"  name="txtVip">
			<option value="1">Đổi Tên Nhân Vật</option>
			</select>
			<div id="div_newpassword" class="form-group">
			<label class="control-label" for="email_login">Tên muốn đổi:</label>
			<input type="text" id="txtNickname" name="txtNickname" autocomplete="off" class="form-control">
		</div>
			<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Máy chủ nhận:</label>
			<select id="txtServer" name="txtServer" class="form-control">
				<option value="0">-- Chọn máy chủ --</option>
				<?php
				// load server list
				$loadserver = loadallserver();
				while($svInfo = sqlsrv_fetch_array($loadserver, SQLSRV_FETCH_ASSOC)) {
					echo '<option value="'.$svInfo['ServerID'].'">'.$svInfo['ServerName'].'</option>';
				}
				?>
			</select>
		</div>
			<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Tên nhân vật:</label>
			<select id="txtcharacter" name="txtcharacter" class="form-control">
				<option value="0">-- Chọn nhân vật muốn đổi --</option>				
			</select>
		</div>
			
	<center><input type="submit" class="btn btn-danger btn-block" value="Đổi Ngay !" />
</form>
</div>

</div>
	<hr>
     <h4><center><font color="#00008B">Một số gợi ý tên đẹp:</font></center>
	 
<hr>1. ™¶î€u♥†hu™  - 2. ™ˆ†ìñh♥Ảøˆ™  - 3. ђล†♥ßµï♥иђỏ  - 4. ๖ۣۜßất๖ۣۜÇần๖  - 5. ☼™Mặt☼Nạ™☼  - 6. Forevër™  - 7. ¬†imCầnCóE™  - 8. ™ĐåîÇøng†µ™  - 9. »ﻲ♥maŽΩÖm♥ - 10. ►ÐáñhMấ†☼Luv◄  - 11. ๖ۣۜÁc☼๖ۣۜQuỷ  - 12. ๖ۣۜNhõx♥Çry™  - 13. ™Đời»ƒụ«ßạ¢™  - 14.๖ۣۜSky♥Kü†€®  - 15. ๖ۣۣۜSjn๖ۣۣۜDy  - 16. ♫ђöล♥ßล†♥†µ♫  - 17. ๖ۣۜThần♣Tiên♥  - 18. ๖ۣۜHòลng•†ử๖ۜ  - 19. ลиђ ¢ầи €м  - 20. þéßj™†hïếuGîa
<div>
<br>
<br>
<center><h4><hr><font color="#00008B">Bảng chữ cái kí tự Hot:</center>
<hr></font>๖ۣۜA ๖ۣۜB ๖ۣۜC ๖ۣۜD ๖ۣۜE ๖ۣۜF ๖ۣۜG ๖ۣۜH ๖ۣۜI ๖ۣۜJ ๖ۣۜK ๖ۣۜL ๖ۣۜM ๖ۣۜN ๖ۣۜO ๖ۣۜP ๖ۣۜQ ๖ۣۜR ๖ۣۜS ๖ۣۜT ๖ۣۜU ๖ۣۜW ๖ۣۜV ๖ۣۜX ๖ۣۜY ๖ۣۜZ


☺☻ ♦ ♣ ♠ ♥ ♂ ♀ ♪ ♫ ☼ ↕ ✿ ⊰ ⊱ ✪ ✣ ✤ ✥ ✦ ✧ ✩ ✫ ✬ ✭ ✯ ✰ ✱ ✲ ✳ ❃ ❂ ❁ ❀ ✿ ✶ ✴ ❄ ❉ ❋ ❖ ⊹⊱✿ ✿⊰⊹ ♧ ✿ ♂ ♀ ∞ ☆ ｡◕‿◕｡ ☀ ツⓛ ⓞ ⓥ ⓔ ♡ ღ ☼★ ٿ « » ۩ ║ █ ● ♫ ♪ ☽♐♑♒♓♀♂☝☜ ☂☁☀☾☽☞♐☢☎
☮ peace ☮
̿' ̿'̵͇̿̿з=(•̪●)=ε/̵͇̿̿/'̿'̿ ̿
┌∩┐(◣_◢)┌∩┐
<hr>
    </div>			
</center>
