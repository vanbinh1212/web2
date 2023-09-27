<div style="padding:5px !important;">




  <!-- Tab panes -->
  <div class="tab-content">
  


	  
    <div id="home" style="width:100% !important;" class="container tab-pane active"><br>
   <center><div id="quanap" class="alert alert-warning" style="width:50%">

			 <h2><p class="text-danger">LỆ PHÍ XÓA KÉT SẮT LÀ 100K COIN 1 LẦN ! </a> </p>
</div></center></h2>

 
	<center><div class="col-md-8">
   <div id="quanap" class="alert alert-success" style="width:100%">

<center><form id="frmReCharge" method="post">
<label class="control-label" for="email_login">Loại:</label>

			<select class="form-control"  name="txtVip">
			<option value="1">Két Sắt</option>

			
			</select>
			<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Máy chủ nhận:</label>
			<select id="txtServer" name="txtServer" class="form-control">
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
	<center><input type="submit" class="btn btn-danger btn-block" value="Xóa Ngay !" />
</form>
</div>

</div>
<img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t39.30808-6/322109396_1654107108443161_9184868616736710554_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=OHCKDhpoWqAAX-XSVES&_nc_ht=scontent.fsgn2-5.fna&oh=00_AfDpF3VC7JkkVOsGiktpHEDeOFGeBQJ4SNXAtBqIRuBmZA&oe=6467293A" width="300" height="200" alt="Bạn chưa Login"></center>
	</div>
     
    </div>			

  
</center>
