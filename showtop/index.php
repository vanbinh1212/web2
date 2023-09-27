<!DOCTYPE html>
<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include_once(dirname(__FILE__)."/../class/function.global.php");

include_once(dirname(__FILE__)."/../class/function.soap.php");

include_once(dirname(__FILE__)."/../class/class.item.php");

include dirname(__FILE__).'/../recaptcha/autoload.php';
$conn_sv = connectTank(1001);
?>
<html lang="vi" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gunny phiên bản cày cuốc xu và huân chương mua đá cường hóa hên xui!!!">
	<meta name="keywords" content="gunny hoi uc, gunny cuong hoa hên xui, gunny 3.0, gunny 3.4, gunny 3.6, gunny 2012, gunny huan chuong ,gunny free, ddtank, ddtank private, gunny private, gunny lậu, gunny private, gunny miễn phí, gunny đầy đủ tính năng, gunny phó bản chuẩn zing, gunny có doanh chiến, gunny có guild chiến, gunny có tranh bá chí tôn, gunny có pet tôn ngộ không, gunny miễn phí pet tôn ngộ không, gunny, gunny lau, gunny lau moi nhat, gunny phien ban moi, gunny moi nhat, gunny dai chien 7 thanh pho, gunny lau full xu, gunnyfullxu, gunny lau co pet ton ngo khong, gunny lau mien phi pet ton ngo khong, pet ton ngo khong gunny, free pet ton ngo khong, gunny full xu, gunny cay quoc, gunny day du tinh nang, gunny full pho ban, gunny pho ban chuan, gunny pho ban do ngon">
    <meta name="author" content="DDT Coder">
	<meta property="og:title" content="<?=$serverInfo['ServerName']?> - Gunny Huyền Thoại.">
	<meta property="og:image" content="https://i.imgur.com/QNQ3g6O.jpg">
	<meta property="og:description" content="Gunny phiên bản làm nhiệm vụ, chiến đấu tự do, chiến đấu guild, đi phó bản, không webshop, cày cuốc xu và huân chương mua đá cường hóa hên xui!!!. Trải nghiệm ngay bây giờ.">
    <title><?=(($pageRemote['title'] != null) ? $pageRemote['title'].' - ' : '').$_config['page']['title']?></title>

    <!-- Bootstrap Core CSS -->
	<link href="./css/style.css" rel="stylesheet">
	<link href="./css/idlogin.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/font-awesome.css" rel="stylesheet">
	<link href="./css/bootstrap-social.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/bootstrap-select.min.css">
	<link rel="stylesheet" href="./css/item_reader.css">
	<link rel="stylesheet" href="./css/popup_itemreader.css">
	<link href="./css/anno.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/font-awesome.min.css">
	<!-- jQuery Version 1.11.1 -->
    
	<script src="/js/sdk.js" async="" crossorigin="anonymous"></script>
	<script src="/js/jquery-1.11.3.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/jquery.number.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap-select.min.js"></script>
	<script src="/js/script_global.js"></script>



<!-- End Facebook Pixel Code -->
<style type="text/css">
	.fancybox-margin{
		margin-right:0px;
	}
	.bg-green{
		background: #1ba536 !important;
		color: white !important;
	}
	.text-center{
		text-align: center;
	}
	.bg-winner1{
		background: url('./header1.png') no-repeat;
		background-size: 100%;
	}
	.bg-winner2{
		background: url('./header2.png') repeat-y;
		background-size: 100% auto;
	}
	.pt-150{
		padding-top: 150px;
	}
	.px-30{
		padding-left: 30px;
		padding-right: 30px;
	}
	.pt-0{
		padding-top: 0 !important;
	}
</style>

</head>

<body>
	
	
	

    <div id="modalSnape" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<div id="div_loading" class="loading_backgroup">
		<div class="loading_fullsceen">
			<img src="./css/please-wait.gif"><br>
			<img id="image_loading_big" src="./css/big_loading_7.gif" width="200px">
		</div>
	</div>

	<div class="outer">

	   
	    <!-- Page Content -->
  

        
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row ">
							<div class="col-md-12">

				
				<div class="panel panel-default" style="margin-top: 0px;">
					<div class="bg-winner1 pt-150 px-30">
						<div id="namebox" class="panel-heading bg-green text-center">SỰ KIỆN ĐUA TOP HÀNG TUẦN</div>
					</div>
					<div class="panel-body pt-0">
						
<script type="text/javascript">
	$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-warning pulse").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-warning pulse");   
});
});
	</script>	
<style>
.pulse {

   box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
    transform: scale(1);
    animation: pulse 1s infinite;
}
.pulse:hover {
  animation: none;
}
.topweek{
font-size:28px;	
}
@-webkit-keyframes pulse {
  0% {
    -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
  }
  70% {
      -webkit-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
  }
  100% {
      -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
  }
}
@keyframes pulse {
  0% {
    -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
    box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
  }
  70% {
      -moz-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
      box-shadow: 0 0 0 10px rgba(204,169,44, 0);
  }
  100% {
      -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
      box-shadow: 0 0 0 0 rgba(204,169,44, 0);
  }
}
.toprank{
color: #ff9600;	
}
.px-30{
	padding-left: 30px !important;
	padding-right: 30px !important;
}
.pt-15{
	padding-top: 15px;
}
.py-5{
	padding-top: 5px;
	padding-bottom: 5px;
	font-size: 12px;
}
.font-11{
	font-size: 11px;
}
</style>

    <div class="row bg-winner2">
    	<div class="col-md-12 px-30">
			
		<div class="btn-pref btn-group btn-group-justified btn-group-lg pt-15" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button type="button" id="stars" class="btn btn-warning pulse" href="#tab1default" data-toggle="tab"><span class="topweek glyphicon glyphicon-time" aria-hidden="true"></span>
					<div class="font-11">TOP LỰC CHIẾN</div>
				</button>
			</div>
			<div class="btn-group" role="group">
				<button type="button" id="favorites" class="btn btn-default" href="#tab2default" data-toggle="tab"><span class="topweek glyphicon glyphicon-user" aria-hidden="true"></span>
					<div class="font-11">TOP TRẬN THẮNG</div>
				</button>
			</div>
			<div class="btn-group" role="group">
				<button type="button" id="following" class="btn btn-default" href="#tab3default" data-toggle="tab"><span class="topweek glyphicon glyphicon-tower" aria-hidden="true"></span>
					<div class="font-11">TOP ONLINE</div>
				</button>
			</div>
			
		</div>

            <div class="panel with-nav-tabs panel-default ">
       
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1default">
						
				<div class="alert alert-warning pulse py-5" role="alert">Đây là bảng kiểm tra top lực chiến</div>
		<table class="table table-bordered">
			<thead>
			  <tr>
				<th class="bg-green"><center>Xếp hạng</center></th>
				<th class="bg-green"><center>Tên nhân vật</center></th>
				<th class="bg-green"><center>Lực chiến</center></th>
				<th class="bg-green">Phần Thưởng</th>
			  </tr>
			</thead>
			<tbody style="background:#f5f5f5;">
				<?php
				$toplc = sqlsrv_query($conn_sv, "SELECT Top 10 NickName,FightPower FROM Sys_Users_Detail ORDER by FightPower DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
				$xeptop=0;
				while($rtoplc = sqlsrv_fetch_array($toplc, SQLSRV_FETCH_ASSOC)) {
					$xeptop++;
					if($xeptop<=3)
					{
						$xephang='<img src="./css/no-'.$xeptop.'.png">';
					}
					else
					{
						$xephang=$xeptop.' th';
					}
					$itemtop = sqlsrv_query($conn_sv, "SELECT * FROM Ws_item_dua_top Where Xephang='$xeptop' and type='1'", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
					if(sqlsrv_num_rows($itemtop)>0)
					{
						$pic='';
						$xu='';
						while($info2 = sqlsrv_fetch_array($itemtop, SQLSRV_FETCH_ASSOC))
						{
							$info = infoItem($info2['TemplateID']);
							if($info['CategoryID']==7 && $info['Property7']>0)
							{
								$sat='Sát Thương '.$info['Property7'];
							}
							elseif($info['CategoryID']==1 && $info['Property7']>0)
							{
								$sat='Hộ Giáp '.$info['Property7'];
							}
							elseif($info['CategoryID']==1 && $info['Property7']>0)
							{
								$sat='Hộ Giáp '.$info['Property7'];
							}
							else
							{
								$sat='';
							}
							if($info2['Ngay']==0)
							{
								$ngay='(Vĩnh viễn)';
							}
							else
							{
								$ngay='('.$info2['Ngay'].' Ngày)';
							}
							$pic.='<img src="'.$_config['function']['url_resource'].getImage($info['NeedSex'],$info['CategoryID'],$info['Pic']).'" data-toggle="tooltip" width="50px" height="auto" title="" data-original-title="'.$info['Name'].' x('.$info2['Count'].'),'.$sat.','.$ngay.' Tấn Công '.$info['Attack'].', Phòng Thủ '.$info['Defence'].', Nhanh Nhẹn '.$info['Agility'].', May Mắn '.$info['Luck'].' .">';
							if($info2['Xu']>0)
							{
								$xu=' +'.number_format($info2['Xu']).' Coin';
							}
							else
							{
								$xu='';
							}
						}
					}
					else
					{
						$pic='';
						$xu='';
					}
					echo('
					<tr class="top-'.$xeptop.'">
					<td class="toprank">
						<b><center>'.$xephang.'</center></b>
					</td>
					<td class="text-character">
						<center>'.$rtoplc['NickName'].'</center>
					</td>
					<td>
						<center><a class="btn btn-sm btn-warning">'.number_format($rtoplc['FightPower']).'</a></center>
					</td>
					<td>
						'.$pic.''.$xu.'
					</td>
					</tr>
					');
				}
				?>
			  </tbody>
		  </table>
								

						
						</div>
                        <div class="tab-pane fade" id="tab2default">
						
					
		  
		 		<div class="alert alert-warning pulse" role="alert">'</div>
	
	<table class="table table-bordered">
			<thead>
			  <tr>
				<th class="bg-green"><center>Xếp hạng</center></th>
				<th class="bg-green"><center>Tên nhân vật</center></th>
				<th class="bg-green"><center>Số trận thắng</center></th>
				<th class="bg-green">Phần Thưởng</th>
			  </tr>
			</thead>
			<tbody style="background:#f5f5f5;">
			<?php
			$toplc = sqlsrv_query($conn_sv, "SELECT Top 10 NickName,Win FROM Sys_Users_Detail ORDER by Win DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$xeptop=0;
			while($rtoplc = sqlsrv_fetch_array($toplc, SQLSRV_FETCH_ASSOC)) {
				$xeptop++;
				if($xeptop<=3)
				{
					$xephang='<img src="./css/no-'.$xeptop.'.png">';
				}
				else
				{
					$xephang=$xeptop.' th';
				}
				$itemtop = sqlsrv_query($conn_sv, "SELECT * FROM Ws_item_dua_top Where Xephang='$xeptop' and type='2'", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
					if(sqlsrv_num_rows($itemtop)>0)
					{
						$pic='';
						$xu='';
						while($info2 = sqlsrv_fetch_array($itemtop, SQLSRV_FETCH_ASSOC))
						{
							$info = infoItem($info2['TemplateID']);
							if($info['CategoryID']==7 && $info['Property7']>0)
							{
								$sat='Sát Thương '.$info['Property7'];
							}
							elseif($info['CategoryID']==1 && $info['Property7']>0)
							{
								$sat='Hộ Giáp '.$info['Property7'];
							}
							elseif($info['CategoryID']==1 && $info['Property7']>0)
							{
								$sat='Hộ Giáp '.$info['Property7'];
							}
							else
							{
								$sat='';
							}
							if($info2['Ngay']==0)
							{
								$ngay='(Vĩnh viễn)';
							}
							else
							{
								$ngay='('.$info2['Ngay'].' Ngày)';
							}
							$pic.='<img src="'.$_config['function']['url_resource'].getImage($info['NeedSex'],$info['CategoryID'],$info['Pic']).'" data-toggle="tooltip" width="50px" height="auto" title="" data-original-title="'.$info['Name'].' x('.$info2['Count'].'),'.$sat.','.$ngay.' Tấn Công '.$info['Attack'].', Phòng Thủ '.$info['Defence'].', Nhanh Nhẹn '.$info['Agility'].', May Mắn '.$info['Luck'].' .">';
							if($info2['Xu']>0)
							{
								$xu=' +'.number_format($info2['Xu']).' Coin';
							}
							else
							{
								$xu='';
							}
						}
					}
					else
					{
						$pic='';
						$xu='';
					}
				echo('
				<tr class="top-'.$xeptop.'">
				<td class="toprank">
					<b><center>'.$xephang.'</center></b>
				</td>
				<td class="text-character">
					<center>'.$rtoplc['NickName'].'</center>
				</td>
				<td>
					<center><a class="btn btn-sm btn-warning">'.number_format($rtoplc['Win']).'</a> Trận</center>
				</td>
				<td>
					'.$pic.''.$xu.'
				</td>
				</tr>
				');
			}
			?>
			</tbody>
		  </table>
						
						</div>
						
						
						   <div class="tab-pane fade" id="tab3default">
						
							<div class="alert alert-warning pulse" role="alert">'</div>
<table class="table table-bordered">
			<thead>
			  <tr>
				<th class="bg-green"><center>Xếp hạng</center></th>
				<th class="bg-green"><center>Tên nhân vật</center></th>
				<th class="bg-green"><center>Online</center></th>
				<th class="bg-green">Phần Thưởng</th>
			  </tr>
			</thead>
			<tbody style="background:#f5f5f5;">
			<?php
			$toplc = sqlsrv_query($conn_sv, "SELECT Top 10 NickName,Onlinetime FROM Sys_Users_Detail ORDER by Onlinetime DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$xeptop=0;
			while($rtoplc = sqlsrv_fetch_array($toplc, SQLSRV_FETCH_ASSOC)) {
				$xeptop++;
				if($xeptop<=3)
				{
					$xephang='<img src="./css/no-'.$xeptop.'.png">';
				}
				else
				{
					$xephang=$xeptop.' th';
				}
				$itemtop = sqlsrv_query($conn_sv, "SELECT * FROM Ws_item_dua_top Where Xephang='$xeptop' and type='3'", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
					if(sqlsrv_num_rows($itemtop)>0)
					{
						$pic='';
						$xu='';
						while($info2 = sqlsrv_fetch_array($itemtop, SQLSRV_FETCH_ASSOC))
						{
							$info = infoItem($info2['TemplateID']);
							if($info['CategoryID']==7 && $info['Property7']>0)
							{
								$sat='Sát Thương '.$info['Property7'];
							}
							elseif($info['CategoryID']==1 && $info['Property7']>0)
							{
								$sat='Hộ Giáp '.$info['Property7'];
							}
							elseif($info['CategoryID']==1 && $info['Property7']>0)
							{
								$sat='Hộ Giáp '.$info['Property7'];
							}
							else
							{
								$sat='';
							}
							if($info2['Ngay']==0)
							{
								$ngay='(Vĩnh viễn)';
							}
							else
							{
								$ngay='('.$info2['Ngay'].' Ngày)';
							}
							$pic.='<img src="'.$_config['function']['url_resource'].getImage($info['NeedSex'],$info['CategoryID'],$info['Pic']).'" data-toggle="tooltip" width="50px" height="auto" title="" data-original-title="'.$info['Name'].' x('.$info2['Count'].'),'.$sat.','.$ngay.' Tấn Công '.$info['Attack'].', Phòng Thủ '.$info['Defence'].', Nhanh Nhẹn '.$info['Agility'].', May Mắn '.$info['Luck'].' .">';
							if($info2['Xu']>0)
							{
								$xu=' +'.number_format($info2['Xu']).' Coin';
							}
							else
							{
								$xu='';
							}
						}
					}
					else
					{
						$pic='';
						$xu='';
					}
				echo('
				<tr class="top-'.$xeptop.'">
				<td class="toprank">
					<b><center>'.$xephang.'</center></b>
				</td>
				<td class="text-character">
					<center>'.$rtoplc['NickName'].'</center>
				</td>
				<td>
					<center><a class="btn btn-sm btn-warning">'.number_format($rtoplc['Onlinetime']).'</a> Phút</center>
				</td>
				<td>
					'.$pic.''.$xu.'
				</td>
				</tr>
				');
			}
			?>
			</tbody>
		  </table>
		
						</div>
						
     


					</div>
				</div>
			</div>
		</div>
 
	
	</div>