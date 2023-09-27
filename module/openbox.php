<?php
if(!defined("SNAPE_VN")) die('No access');

include dirname(__FILE__).'/../recaptcha/autoload.php';


/*

$recaptcha = new \ReCaptcha\ReCaptcha($secret);

$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if ($resp->isSuccess()):

*/
?>
<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/jscedrusv3/luckyboxspin.js"></script>
<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/jscedrusv3/itembag.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
        	LuckyBoxSpin.init(1);
			ItemBag.init();
			
			$("#txtserverspin").change(function() {
				var serverid = $("#txtserverspin").val();
				if(serverid != null && serverid != 0) {
					SnapeClass.loadCoingame(serverid, "#txtcoingameload");
				}
			});
			
			$("#txtserver").change(function() {
				var serverid = $("#txtserver").val();
				if(serverid != null && serverid != 0) {
					SnapeClass.loadPlayersList(serverid, "#txtcharacter");
				}
			});
			
        });
		
		function updateCoingame() {
			var serverid = $("#txtserverspin").val();
			if(serverid == null || serverid == 0) {
				SnapeClass.openConfirm('Lỗi cập nhật', 'Vui lòng chọn máy chủ trước.', []); 
			} else {
				
				SnapeClass.updateCoingame(serverid, "#txtcoingameload");
			}
		}
		
    </script>
	<form id="frmRegister" method="post">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 menu-left">
				
				<? include dirname(__FILE__).'/include/accountinfobox.php'; ?>
				
				<div id="list_luckybox" class="list-group">
					<?php
					// get list luckybox
					$qlist = sqlsrv_query($conn, "select * from LuckyBox_List order by ID DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

					while($boxList = sqlsrv_fetch_array($qlist, SQLSRV_FETCH_ASSOC)) {
						echo '<a id="openbox_'.$boxList['ID'].'" href="javascript:;" onclick="LuckyBoxSpin.init('.$boxList['ID'].')" class="list-group-item">'.$boxList['Name'].'</a>';
					}
					?>
				</div>
				<div>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- ads homesite -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:300px;height:250px"
						 data-ad-client="ca-pub-3814049986508486"
						 data-ad-slot="8840040656"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">

					<div class="col-md-12" style="margin-top: 20px;">
						<ol class="breadcrumb">
						  <li><a href="<?=$_config['page']['fullurl']?>">Trang chủ</a></li>
						  <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/">Tài khoản</a></li>
						  <li class="active">Hộp quà may mắn</li>
						</ol>
					</div>
					
				</div>
				<div class="panel panel-default" style="margin-top: 0px;">
					<div id="namebox" class="panel-heading">Hộp quà </div>
					<div class="panel-body">
						<div class="center-block">
							<div id="luckyboxbg">
								<div id="luckybox_content">
									
								</div>
					        </div>
					        <div id="txtaward" class="luckybox_awardtext">Chọn loại điểm để mở hộp quà</div>
					        <div class="luckybox_btnlist">
								<b>CoinGame hiện có: <span id="txtcoingameload">0</span></b> <a href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-coin-game/" target="_blank">[Chuyển vào]</a><br/>
								
									<select id="txtserverspin" name="txtserverspin" class="form-control" style="display: inline;width: 40%;">
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
					        <div class="luckybox_btnlist">
					        	<a href="javascript:;" class="btn btn-primary button_luckybox" onclick="LuckyBoxSpin.spin(1)" data-toggle="tooltip" data-placement="top" title="Điểm miễn phí nhận mỗi ngày tại mục Giftcode -> Điểm thưởng hằng ngày">Điểm miễn phí <span id="txtpointfree" class="badge">1</span></a>
					        	<a href="javascript:;" class="btn btn-success button_luckybox" onclick="LuckyBoxSpin.spin(2)" data-toggle="tooltip" data-placement="top" title="Thanh toán COIN để mở hộp quà. Nạp thẻ để nhận COIN">Mở bằng COIN <span id="txtcoin" class="badge">1000</span></a>
					        	<a href="javascript:;" class="btn btn-info button_luckybox" onclick="LuckyBoxSpin.spin(3)" data-toggle="tooltip" data-placement="top" title="CoinGame là vật phẩm nhận từ thi đấu hoặc phó bản thông qua việc lật thẻ.">Mở bằng CoinGame <span id="txtcoingame" class="badge">2000</span></a>
					        </div>
					        <div class="luckybox_btnlist">
					        	<a href="javascript:;" class="btn btn-warning button_luckybox" onclick="LuckyBoxSpin.loadTop()" data-toggle="tooltip" data-placement="top" title="Danh sách những người mở hộp quà nhiều nhất">TOP 10 MỞ NHIỀU NHẤT</a>
					        	<a href="javascript:;" class="btn btn-danger button_luckybox" onclick="LuckyBoxSpin.listaward()" data-toggle="tooltip" data-placement="top" title="Danh sách các vật phẩm mà bạn có thể nhận khi mở hộp quà này">VẬT PHẨM TRONG HỘP QUÀ</a>
					        </div>
						</div>
						
					</div>
				</div>
				<div class="panel panel-default" style="margin-top: 0px;">
					<div class="panel-heading">Túi đồ web</div>
					<div class="panel-body">
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
								
								<div id="div_password" class="form-group">
            <label class="control-label" for="email_login">Tên nhân vật:</label>
            <select id="txtcharacter" name="txtcharacter" class="form-control">
                <option value="0">-- Chọn nhân vật --</option>
            </select>
        </div>
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
					</div>
				</div>
			</div>
		</div>
	</form>