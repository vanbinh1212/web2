<?php
if(!defined("SNAPE_VN")) die('No access');

if($account->isLogin())
	movepage($_config['page']['fullurl'].'/tai-khoan/');

// get full url
$urlreturn = $_config['page']['fullurl'].'/tai-khoan/';

if($_REQUEST['return'] && $_REQUEST['return'] != base64currenturl()) {

	$urlreturn = base64_decode($_REQUEST['return']);
}
?>
<script type="text/javascript">
        $(document).ready(function () {
			
			$("#frmLogin").validate({
				rules: {
					'txtEmail': {
						required: true,
						minlength: 4,
						maxlength: 100
					},
					'txtPassword': {
						required: true,
						minlength: 6,
						maxlength: 100
					}
				},
				messages: {
					txtEmail: {
						required: "Vui lòng nhập Tài khoản!",
						email: "Đây không phải là Tài khoản hợp lệ!"
					}
				},
				submitHandler: function(form) {
					//submit form
					$("#msg_err_login").show();
					SnapeClass.disableSubmit();
					$.post(full_url + "/form/login.php", $("#frmLogin").serialize(), function(data) {
						if(data['type'] == 0) {
							window.location = '<?=$urlreturn?>';
						} else {
							SnapeClass.openModal("Lỗi đăng nhập", data['content'], []);
						}
						$("#msg_err_login").hide();
						SnapeClass.undisableSubmit();
					}, 'json');
					return false;
				}
			});
			
			
        });
    </script>
		<div class="panel panel-default center-block">
			<div class="panel-heading">Đăng nhập</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<form id="frmLogin" name="frmLogin" method="POST" role="form">
							<div class="form-group">
								<label class="control-label sr-only"></label>
								<div class="text-danger" id="msg_err_login" style="display: none">
									<img src="<?=$_config['page']['fullurl']?>/images/loading.gif">
									Đang kết nối ... 
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="txtEmail">Tài khoản đăng ký</label>
								<input type="text" id="txtEmail" name="txtEmail" autocomplete="off" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label" for="txtPassword">Mật khẩu</label>
								<input type="password" id="txtPassword" name="txtPassword" autocomplete="off" class="form-control">
							</div>
							
							<div class="form-group">
								<label class="control-label sr-only"></label>
								<input type="submit" class="btn btn-primary btn-block" value="Đăng nhập">
							</div>
						</form>
						
						<div class="form-group">
							<a href="<?=$_config['page']['fullurl']?>/dang-ky/" class="btn btn-success btn-block">Đăng ký tài khoản mới</a>
							<a href="<?=$_config['page']['fullurl']?>/quen-mat-khau/" class="btn btn-info btn-block">Quên mật khẩu?</a>
						</div>
					</div>
					<div class="col-md-4 login_social_right">
						<div class="form-group"><Br>
							<img src="http://gunnyae.com/images/121.png" alt="Đức Đẹp Trai Vãi Lồn" width="400">
						</div>
					</div>
				</div>
				
			</div>
		</div><br><br><br><br><br><br><br><br><br>
		
		
		