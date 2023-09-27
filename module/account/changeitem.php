<?php
if(!defined("SNAPE_VN")) die('No access');

?>
<script type="text/javascript">
    $(document).ready(function () {
		
		SnapeClass.openModal("Cảnh báo", "<font color='red'><b>Tính năng này tạm dừng cho tới khi hệ thống gộp máy chủ thành công. Vui lòng quay lại sau.</b></font>", []);
		
		function loadResultPay() {
			SnapeClass.disableSubmit();
			$.post(full_url + "/ajax/getchangeitem.php", "id=" + $( "#txtitem" ).val(), function(data) {
				if(parseInt(data['type']) == 0) {
					
					if(data['maxcount'] == 1) {
						// disable
						$("#txtCount").attr('readonly', 'readonly');
						$("#txtCount").val(1);
					} else {
						$("#txtCount").removeAttr('readonly');
					}
					
					switch(parseInt($("#txttype").val())) {
						case 1:
						if(data['coin'] <= 0) {
							$("#txtResult").val("Không thể mua bằng Coin");
						} else {
							$("#txtResult").val((data['coin'] * parseInt($("#txtCount").val())) + " Coin");
						}
						break;
						
						case 2:
						if(data['coingame'] <= 0) {
							$("#txtResult").val("Không thể mua bằng CoinGame");
						} else {
							$("#txtResult").val((data['coingame'] * parseInt($("#txtCount").val())) + " CoinGame");
						}
						break;
					}
				} else {
					$("#txtResult").val(data['content']);
				}
				SnapeClass.undisableSubmit();
			}, 'json');
		}
		
		$( "#txtitem" ).change(function() {
			loadResultPay();
		});
		
		$( "#txtCount" ).change(function() {
			loadResultPay();
		});
		
		$( "#txttype" ).change(function() {
			loadResultPay();
		});
		
		loadResultPay();

    	$("#frmChangePassword").validate({
    		rules: {
    			'txtserver': {
    				required: true,
					number: true,
					min: 1
    			},
				
				'txtCount' : {
					min: 1,
					max: 999
				}
    		},
    		messages: {
				txtserver: {
					required: "Vui lòng chọn máy chủ.",
					number: "Máy chủ không hợp lệ!",
					min: "Vui lòng chọn máy chủ."
				}
			},
			submitHandler: function(form) {
				SnapeClass.disableSubmit();
				$.post(full_url + "/form/changeitem.php", $("#frmChangePassword").serialize(), function(data) {
					if(data['type'] == 0) {
						SnapeClass.openModal("Thành công", "Đổi thành công. Vật phẩm được lưu ở <a href='"+full_url+"/tai-khoan/tui-web/'>túi web</a>. Vui lòng vào <a href='"+full_url+"/tai-khoan/tui-web/'>TÚI WEB</a> để gửi vào game.", []);
						//SnapeClass.clearAllInput();
					} else {
						SnapeClass.openModal("Lỗi đổi vật phẩm", data['content'], []);
					}
					SnapeClass.resetCaptcha();
					SnapeClass.undisableSubmit();
				}, 'json');
				return false;
			}
    	});
	});
</script>
<form id="frmChangePassword" method="post">
	<div class="center-block" style="width:80%">
		<div class="form-group">
			<div id="msg_err_login" class="alert alert-danger">- Vật phẩm đổi được sẽ nằm ở <a href='<?=$_config['page']['fullurl']?>/tai-khoan/tui-web/'>Túi Web</a>.<br/>- Đổi xong chuyển vào game mới sử dụng được.</div>
		</div>
		<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Máy chủ đổi:</label>
			<select id="txtserver" name="txtserver" class="form-control">
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
			<label class="control-label" for="email_login">Loại tiền tệ:</label>
			<select id="txttype" name="txttype" class="form-control">
				<option value="1">Coin</option>
				<option value="2">CoinGame</option>
			</select>
		</div>
		<div id="div_newpassword" class="form-group">
			<label class="control-label" for="email_login">Vật phẩm đổi:</label>
			<select id="txtitem" name="txtitem" class="form-control selectpicker">
				<?php
				
				$qItems = sqlsrv_query($conn, "select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, Change_Item_List.* from Shop_Goods, Change_Item_List where Change_Item_List.TemplateID = Shop_Goods.TemplateID ORDER BY PriceCoin ASC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
				
				while($itemInfo = sqlsrv_fetch_array($qItems, SQLSRV_FETCH_ASSOC)) {
					
					echo '<option value="'.$itemInfo['TemplateID'].'" data-content="<img src=\''.$_config['function']['url_resource'].'/'.item_gunny::getImage($itemInfo['NeedSex'], $itemInfo['CategoryID'], $itemInfo['Pic']).'\' height=\'30px\'> '.item_gunny::getCategoryName($itemInfo['CategoryID']).' - '.$itemInfo['Name'].'">'.item_gunny::getCategoryName($itemInfo['CategoryID']).' - '.$itemInfo['Name'].'</option>';
				}
				?>
				
			</select>
		</div>
		<div id="div_newpassword" class="form-group">
			<label class="control-label" for="email_login">Số lượng:</label>
			<input type="text" id="txtCount" name="txtCount" autocomplete="off" class="form-control" value="1">
		</div>
		<div id="div_newpassword" class="form-group">
			<label class="control-label" for="email_login">Cần trả:</label>
			<input type="text" id="txtResult" name="txtResult" autocomplete="off" class="form-control" readonly="readonly">
		</div>
		<div class="form-group">
			<label class="control-label" for="captcha_login">Human Verify</label>
			<div style="text-align: center;"><div class="g-recaptcha" data-sitekey="<?=$_config['recaptcha']['sitekey']?>" style="display: inline;"></div></div>
			<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?=$_config['recaptcha']['language']?>"></script>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary btn-block" disabled value="Đổi Quà">
		</div>
	</div>
</form>