<?php
if(!defined("SNAPE_VN")) die('No access');

if(!$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());

$accountPage = remoteSupport($_REQUEST['module']);

?>

	
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">
							<div class="col-md-12">
				<div class="row">

					<div class="col-md-12" style="margin-top: 20px;">
						<ol class="breadcrumb">
						  <li><a href="<?=$_config['page']['fullurl']?>">Trang chủ</a></li>
						  <?=(($accountPage['content'] == 'listsupport') ? '<li class="active">Hỗ trợ</li>' : '<li><a href="'.$_config['page']['fullurl'].'/ho-tro/">Hỗ trợ</a></li><li class="active">'.$accountPage['title'].'</li>')?>
						</ol>
					</div>
					
				</div>
				<div class="panel panel-default" style="margin-top: 0px;">
					<div id="namebox" class="panel-heading"><?=$accountPage['title']?></div>
					<div class="panel-body">
						<? include dirname(__FILE__).'/support/'.$accountPage['content'].'.php'; ?>
					</div>
				</div>
			</div>
		</div>