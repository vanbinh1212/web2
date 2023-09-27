<?php
if(!defined("SNAPE_VN")) die('No access');

//include dirname(__FILE__).'/../recaptcha/autoload.php';


/*

$recaptcha = new \ReCaptcha\ReCaptcha($secret);

$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if ($resp->isSuccess()):

*/
?>
<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/itembag.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
			ItemBag.init();
			$("#txtserver").change(function() {
				var serverid = $("#txtserver").val();
				if(serverid != null && serverid != 0) {
					SnapeClass.loadPlayersList(serverid, "#txtcharacter");
				}
			});
        });
		
    </script>
	<div class="center-block">
							<div class="luckybox_serverlist">
					        	
								<select id="txtserver" name="txtserver" class="form-control" style="display: inline;width: 30%;">
					        		<option value="0">-- Chọn máy chủ --</option>
					        		<?php
					        		// load server list
					        		$loadserver = loadallserver();
					        		while($svInfo = sqlsrv_fetch_array($loadserver, SQLSRV_FETCH_ASSOC)) {
					        			echo '<option value="'.$svInfo['ServerID'].'">'.$svInfo['ServerName'].'</option>';
					        		}
					        		?>
					        	</select>
								
								<select id="txtcharacter" name="txtcharacter" class="form-control" style="display: inline;width: 30%;">
					        		<option value="0">-- Chọn nhân vật --</option>
					        	</select>
								<a href="javascript:;" class="btn btn-primary button_luckybox" onclick="ItemBag.sendItems()" data-toggle="tooltip" data-placement="top" title="Hệ thống sẽ gửi vật phẩm ở Túi đồ web vào game tương ứng với máy chủ của vật phẩm">Gửi đồ vào game</a>
								<a href="javascript:;" class="btn btn-success button_luckybox" onclick="ItemBag.init()" data-toggle="tooltip" data-placement="top" title="Tải lại vật phẩm trong túi Web">Làm mới</a>
					        </div>
							<div id="loadingItems"></div>
							<div id="contentItemsBag" style="display:none">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Vật phẩm</th>
											<th>Số lượng</th>
											<th>Thời hạn</th>
											<th>VP Khóa</th>
											<th>Máy chủ</th>
										</tr>
									</thead>
									<tbody id="resultItems">
									</tbody>
								</table>
							</div>
						</div>