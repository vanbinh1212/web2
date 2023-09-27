<?php
if(!defined("SNAPE_VN")) die('No access');

//include dirname(__FILE__).'/../recaptcha/autoload.php';


/*

$recaptcha = new \ReCaptcha\ReCaptcha($secret);

$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if ($resp->isSuccess()):

*/
 $email = $_SESSION['ss_user_email'];
?>
<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/itembagGame.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
			//ItemBag.init();
			$("#txtserver").change(function() {
				var serverid = $("#txtserver").val();
				if(serverid != null && serverid != 0) {
					SnapeClass.loadPlayersList(serverid, "#txtcharacter");
				}
			});
        });
		
    </script>
	<div class="center-block">
	<div id="msg_err_login" class="alert alert-danger">
				<div>- Đây là chức năng dùng để chuyển Item Từ Túi Trang Bị Game ra Kho Web  </div>
				<div>- Bước 1 : Chọn máy chủ và tên nhân vật muốn gửi item ra Kho Web</div>					
				<div>- Bước 2 : Click 								<a href="javascript:;" class="btn btn-success button_luckybox" onclick="ItemBag.init()" data-toggle="tooltip" data-placement="top" title="Tải danh sách vật phẩm trong túi trang bị Ingame">Tải danh sách vật phẩm</a>

 để lấy dữ liệu vật phẩm </div>	
				<div>- Bước 3 : Những vật phẩm nào mà bạn muốn gửi ra Kho Web thì hãy Click  <button type="button" class="btn btn-purple">Cất vào kho web</button></div>	

				</center>
				

			</div>
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
								<a href="javascript:;" class="btn btn-success button_luckybox" onclick="ItemBag.init()" data-toggle="tooltip" data-placement="top" title="Tải danh sách vật phẩm trong túi trang bị Ingame">Tải danh sách vật phẩm</a>
								<a href="<?=$_config['page']['fullurl']?>/tai-khoan/kho-web/" class="btn btn-primary button_luckybox" data-toggle="tooltip" data-placement="top" title="Chuyển Item từ Web vào Game">Chuyển từ Web vào Game</a>

					        </div>
							<div id="loadingItems"></div>
							<div id="contentItemsBag" style="display:none">
							<input type="button" class="btn btn-danger button_luckybox" id="btn1" style="float: left;margin-left: 7px;margin-bottom: 7px;" value="Chọn hết"/>
							<input type="button" class="btn btn-purple button_luckybox" id="btn2" style="float: left;margin-left: 7px;margin-bottom: 7px;" value="Cất toàn bộ vào Kho Web"/>
							<script language="javascript">
									document.getElementById("btn1").onclick = function () 
									{
										var checkboxes = document.getElementsByName('giatri');
										for (var i = 0; i < checkboxes.length; i++){
											checkboxes[i].checked = true;
										}
									};
									document.getElementById("btn2").onclick = function () 
									{
										var thongbao = confirm("Gửi vật phẩm đã chọn vào hộp thư trong game\nBạn có đồng ý không?");
										if (thongbao == true) {
											var checkbox = document.getElementsByName('giatri');
											for (var i = 0; i < checkbox.length; i++){
												if (checkbox[i].checked === true){
													vitri = checkbox[i].value;
													$.ajax({
								                    url : ""+full_url+"/ajax/moveItemFromGameBagWeb.php",
								                    type : "post",
								                    dateType:"text",
								                    data : {
								                        vp : vitri,
														serverid : $('#txtserver').val(),
														uid : $('#txtcharacter').val(),
								                    },
													beforeSend: function() {
														$('#bag_'+vitri+'').html('<b style="color:red;font-size: 13px;">Đang gửi...</b> <img src="/images/loading.gif" style="width: 16px;height: 16px;"/>');
													},
								                    success : function (result){
														if(result % 1 ==0)
														{
															$('#bag_'+result+'').css('display','none');
															$('#c'+result+'').css('display','none');
														}
														else
														{
															SnapeClass.openModal('Lỗi gửi vật phẩm', result, []);
															//$('#bag_'+vitri+'').html('<b style="color:red;font-size: 13px;">'+result+'</b> <img src="/images/loading.gif" style="width: 16px;height: 16px;"/>');
														}
								                    }
								                	});
												}
												if (checkbox.checked === false){
													confirm("Vui lòng chọn 1 vật phẩm?");
												}
											}
										}
									};
						</script>
							<table class="table table-striped">
									<thead>
										<tr>
											<th>Vật phẩm</th>
											<th>Số lượng</th>
											<th>Thời hạn</th>
											<th>VP Khóa</th>
											<th>Máy chủ</th>
											<th>Chuyển Ra Kho Web</th>
										</tr>
									</thead>
									<tbody id="resultItems">
									</tbody>
								</table>
							</div>
						</div>