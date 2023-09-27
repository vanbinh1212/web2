<?php
if(!defined("SNAPE_VN")) die('No access');
include_once(dirname(__FILE__)."/../class/class.account.php");
$userid = $_SESSION['ss_user_id']
?>

						<div class="center-block">
							<table class="table table-striped">
							<thead>
			  <tr>
				<th>STT</th>
				<th>SỐ SERIAL</th>
				<th>LOẠI THẺ</th>
				<th>MỆNH GIÁ</th>						
				<th>TRẠNG THÁI</th>		
				<th>Response</th>						
				<th>THỜI GIAN</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from Log_Card order by TimeCreate desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			$dem = 0;
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$mg = menhgiaCard($r['Money']);
						echo '
						<tr>
						<td>'.$dem.'</th>
						<td>'.$r['Serial'].'</td>
						<th><font color="red">'.$r['Name'].'</font></th>
						<td><span class="label" style="background-color:'.$mg['color'].'">'.$mg['name'].'</span></td>
						<td><span class="label" style="background-color:'.$sst['color'].'">'.$sst['name'].'</span></td>
						<td><span class="label" style="background-color:brown">'.$r['Response'].'</span></t>												
						<td><i><b><font size=1>'.$r['TimeCreate'].'</font></b></i></t>						
						</tr>
						';
					}
				}
			?>
			</tbody>
							</table>
						</div>