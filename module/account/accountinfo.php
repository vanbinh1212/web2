<?php
if(!defined("SNAPE_VN")) die('No access');

include_once(dirname(__FILE__) . "/../class/class.account.php");
$userid = $_SESSION['ss_user_id'];

$facebookInfo = $account->getSocialConnect($_SESSION['ss_user_id'], 'facebook');

$googleInfo = $account->getSocialConnect($_SESSION['ss_user_id'], 'google');

$yahooInfo = $account->getSocialConnect($_SESSION['ss_user_id'], 'yahoo');
?>

						<div class="center-block">
							<table class="table table-hover">
								<tr>
									<td style="border-top: 0px">Tài khoản: </td>
									<td style="border-top: 0px"><?=$_SESSION['ss_user_email']?></td>
								</tr>
								<tr>
									<td>Cấp VIP: </td>
									<td><img src="<?=$_config['page']['fullurl']?>/images/vip/<?=$userInfo['VIPLevel']?>.png" height="20px" data-toggle="tooltip" data-placement="top" title="Nạp thẻ sẽ thăng VIP, nạp càng nhiều cấp VIP càng cao - ưu đãi từ VIP càng nhiều." /></td>
								</tr>
								<tr>
									<td>Họ và tên: </td>
									<td><?=(($userInfo['Fullname'] == null) ? '<span class="disconnect_social" data-toggle="tooltip" data-placement="top" title="Vui lòng cập nhật tại mục Gửi hỗ trợ">Chưa cập nhật</span>' : '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Được tặng thêm 30% Xu khi thi đấu">'.$userInfo['Fullname'].'</span>') ?></td>
								</tr>
								<tr>
									<td>Số điện thoại: </td>
									<td><?=(($userInfo['Phone'] == null) ? '<span class="disconnect_social" data-toggle="tooltip" data-placement="top" title="Vui lòng cập nhật tại mục Gửi hỗ trợ">Chưa đăng ký</span>' : '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Được tặng thêm 50% Xu khi thi đấu">'.$userInfo['Phone'].'</span>') ?></td>
								</tr>							
							</table>
						</div>
						<hr>
						
						<?php


$username = $_SESSION['ss_user_email'];
$qcheck = sqlsrv_query($conn, "select * from [DDT_Player34].[dbo].[Sys_Users_Goods]
									where place<18 
									and Place>=0 
									and Count=1 
									and bagtype = 0
									and UserID in (select userid from DDT_Player34.dbo.Sys_Users_Detail where username = '$username') 
									order by Place ", array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));

$qcheck2 = sqlsrv_query($conn, "select * from [DDT_Player34].[dbo].[Sys_Users_Detail]
					where UserID in (select userid from DDT_Player34.dbo.Sys_Users_Detail where username = '$username')", array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
$infoUser;
if (sqlsrv_num_rows($qcheck2) <> 0) {
	while ($row2 = sqlsrv_fetch_array($qcheck2, SQLSRV_FETCH_ASSOC)) {
		$infoUser = $row2;
	}
}
$arr;
if (sqlsrv_num_rows($qcheck) <> 0) {
	while ($row = sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)) {
		$info = infoItem($row['TemplateID']);
		$arr[$row['Place']] = $_config['function']['url_resource'] . loadimage($info['Pic'], $info['CategoryID'], $info['NeedSex']);
	}
} else {
	echo '<tr><td align="center" colspan="7"><b>Bạn chưa tạo nhân vật</b></td></tr>';
}
?>
<div class="row form-group">
	<div class="col-md-2 col-xs-2 col-lg-2"></div>
	<!--cột bên trái-->
	<div class="col-md-3 col-xs-3 col-lg-3">
		<?php
		$i = 0;
		while ($i < 4) {
			echo '<div class="row">';
			switch ($i) {
				case 0:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[0] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 1] . '" /></div>';
					break;
				case 1:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 1] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 2] . '" /></div>';
					break;
				case 2:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 2] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 3] . '" /></div>';
					break;
				case 3:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 8] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[$i + 10] . '" /></div>';
					break;
			}
			echo '</div>';
			$i++;
		}
		?>
	</div>
	<div class="col-md-3 col-xs-3 col-lg-3"></div>
	<!--cột bên phải-->
	<div class="col-md-3 col-xs-3 col-lg-3">
		<?php
		$i = 0;
		while ($i < 4) {
			echo '<div class="row">';
			switch ($i) {
				case 0:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[7] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[8] . '" /></div>';
					break;
				case 1:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[9] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[10] . '" /></div>';
					break;
				case 2:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[12] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[12] . '" /></div>';
					break;
				case 3:
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[14] . '" /></div>';
					echo '<div class="col-md-2 col-xs-2 col-lg-2 item-box"><image src= "' . $arr[15] . '" /></div>';
					break;
			}
			echo '</div>';
			$i++;
		}
		?>
	</div>
</div>
<!--cột giữa-->
<div class="row form-group">
	<div class="col-md-5 col-xs-5 col-lg-5"></div>
	<div class="col-md-6 col-xs-6 col-lg-6">
		<div class="row">
			<div class="col-md-2 col-xs-2 col-lg-2 item-box">
				<image src="<?php echo $arr['6']; ?>" />
			</div>
			<div class="col-md-2 col-xs-2 col-lg-2 item-box">
				<image src="<?php echo $arr['17']; ?>" />
			</div>
			<div class="col-md-2 col-xs-2 col-lg-2 item-box">
				<image src="<?php echo $arr['40']; ?>" />
			</div>
		</div>
	</div>
</div>
<table class="table">
	<thead>
		<th align="middle" scope="row">Tên nhân vật</th>
		<th align="middle" scope="row">Level</th>
		<th align="middle" scope="row">Lực chiến</th>
		<th align="middle" scope="row">Tấn công</th>
		<th align="middle" scope="row">Phòng thủ</th>
		<th align="middle" scope="row">Nhanh nhẹn</th>
		<th align="middle" scope="row">May mắn</th>
		<th align="middle" scope="row">Ma công</th>
		<th align="middle" scope="row">Ma kháng</th>
	</thead>
	<tbody>
		<tr>
			<td align="middle" scope="row"><?php echo $infoUser['NickName']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['Grade']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['FightPower']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['Attack']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['Defence']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['Luck']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['Agility']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['MagicAttack']; ?></td>
			<td align="middle" scope="row"><?php echo $infoUser['MagicDefence']; ?></td>
		</tr>
	</tbody>
</table>