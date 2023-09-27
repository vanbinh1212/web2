<?php
if(!defined("SNAPE_VN")) die('No access');
include_once(dirname(__FILE__)."/../class/class.account.php");
$userid = $_SESSION['ss_user_id'];
$serverid=1001;
include_once(dirname(__FILE__)."/../class/function.global.php");
			$conn_sv = connectTank($serverid);
?>

						<div class="center-block">
							<table class="table table-striped">
							<thead>
			  <tr>
				<th>STT</th>
				<th>MÃ THẺ</th>
				<th>LOẠI THẺ</th>
				<th>MỆNH GIÁ</th>						
				<th>TRẠNG THÁI</th>		
				<th>MÁY CHỦ</th>						
				<th>THỜI GIAN</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from Log_Card WHERE UserID = '$userid' order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$qcheck1 = sqlsrv_query($conn_sv, "select top 1 Pulldown from Active_Number WHERE UserID = 0", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			//$qcheck2 = sqlsrv_query($conn, "update Log_Card set StatusCode = ".$qcheck1."", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			$dem = 0;
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$svid = serverIDcard($r['ServerID']);						
						$mg = menhgiaCard($r['Money']);
						echo '
						<tr>
						<td>'.$dem.'</th>
						<td><b><font color=purple>'.$r['Passcard'].'</font></b></td>
						<th><font color="red">'.$r['Name'].'</font></th>
						<td><span class="label" style="background-color:'.$mg['color'].'">'.$mg['name'].'</span></td>
						<td><span class="label" style="background-color:'.$sst['color'].'">'.$sst['name'].'</span></td>
						<td><span class="label" style="background-color:'.$svid['color'].'">'.$svid['name'].'</span></td>						
						<td><i><b><font size=2>'.$r['TimeCreate'].'</font></b></i></td>						
						</tr>
						';
					}
				}else {
										echo '<tr><td align="center" colspan="7"><b>Chưa có giao dịch nào được thực hiện</b></td></tr>';
									}
				
			?>
			</tbody>
							</table>
						</div>
				