
<style>
	.table table-striped {
		border: red solid 1px;
	}

	.item-box {
		border: 1px solid darkblue;
		overflow: hidden;
		width: 70px;
		height: 70px;
		display: inline-block;
		padding: 0 10px 0 0;
	}
</style>


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


<!--div class="center-block" style="border: 2px solid black;">
	<table class="table table-hover">
		<tr>
			<td style="border-top: 0px">Địa chỉ Email: </td>
			<td style="border-top: 0px"><?= $_SESSION['ss_user_email'] ?></td>
		</tr>
		<tr>
			<td>Số Giftcode: </td>
			<td><?= number_format($userInfo['CountGC']) ?></td>
		</tr>
		<!--tr>
									<td>Xu Game: </td>
									<td><?= number_format($userInfo['MoneyLock']) ?></td>
								</tr-->
		<!--tr>
									<td>Điểm miễn phí: </td>
									<td><?= number_format($userInfo['Point']) ?></td>
								</tr-->
		<!--tr>
									<td>Xu tặng thêm khi Chiến đấu: </td>
									<td><span class="connected_social" data-toggle="tooltip" data-placement="top" title="Xu nhận thêm khi thi đấu. Xác thực SDT, tên chủ tài khoản hoặc thăng cấp VIP Member để kích hoạt."><?= $account->xuWarPlus($_SESSION['ss_user_id']) ?>%</span></td>
								</tr-->
		<!--tr>
									<td>Kết nối Facebook: </td>
									<td id="connect_facebook_status"><?= ($facebookInfo) ? '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Kết nối với ' . $facebookInfo['SocialName'] . '">Đã kết nối</span>' : '<a href="javascript:;" onclick="SnapeClass.openSocialConnect(\'facebook\', \'connect\');" class="btn btn-social btn-xs btn-facebook" style="width: 140px;" data-toggle="tooltip" data-placement="top" title="Liên kết với Facebook thành công bạn có thể dùng Facebook để đăng nhập vào tài khoản này của bạn."><i class="fa fa-facebook"></i>Kết nối Facebook</a>' ?></td>
								</tr>
								<tr>
									<td>Kết nối Google: </td>
									<td id="connect_google_status"><?= ($googleInfo) ? '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Kết nối với ' . $googleInfo['SocialName'] . '">Đã kết nối</span>' : '<a href="javascript:;" onclick="SnapeClass.openSocialConnect(\'google\', \'connect\');" class="btn btn-social btn-xs btn-google" style="width: 140px;" data-toggle="tooltip" data-placement="top" title="Liên kết với Google thành công bạn có thể dùng Google để đăng nhập vào tài khoản này của bạn."><i class="fa fa-google"></i>Kết nối Google</a>' ?></td>
								</tr>
								<tr>
									<td>Kết nối Yahoo: </td>
									<td id="connect_yahoo_status"><?= ($yahooInfo) ? '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Kết nối với ' . $yahooInfo['SocialName'] . '">Đã kết nối</span>' : '<a href="javascript:;" onclick="SnapeClass.openSocialConnect(\'yahoo\', \'connect\');" class="btn btn-social btn-xs btn-yahoo" style="width: 140px;" data-toggle="tooltip" data-placement="top" title="Liên kết với Yahoo thành công bạn có thể dùng Yahoo để đăng nhập vào tài khoản này của bạn."><i class="fa fa-yahoo"></i>Kết nối Yahoo</a>' ?></td>
								</tr-->
		<!--tr>
			<td>Cấp VIP: </td>
			<td><img src="<?= $_config['page']['fullurl'] ?>/images/vip/<?= $userInfo['VIPLevel'] ?>.png" height="20px" data-toggle="tooltip" data-placement="top" title="Nạp thẻ sẽ thăng VIP, nạp càng nhiều cấp VIP càng cao - ưu đãi từ VIP càng nhiều." /></td>
		</tr>
		<tr>
			<td>Họ và tên: </td>
			<td><?= (($userInfo['Fullname'] == null) ? '<span class="disconnect_social" data-toggle="tooltip" data-placement="top" title="Vui lòng cập nhật tại mục Gửi hỗ trợ">Chưa cập nhật</span>' : '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Được tặng thêm 30% Xu khi thi đấu">' . $userInfo['Fullname'] . '</span>') ?></td>
		</tr>
		<tr>
			<td>Số điện thoại: </td>
			<td><?= (($userInfo['Phone'] == null) ? '<span class="disconnect_social" data-toggle="tooltip" data-placement="top" title="Vui lòng cập nhật tại mục Gửi hỗ trợ">Chưa đăng ký</span>' : '<span class="connected_social" data-toggle="tooltip" data-placement="top" title="Được tặng thêm 50% Xu khi thi đấu">' . $userInfo['Phone'] . '</span>') ?></td>
		</tr>
	</table>
</div-->