
<script type="text/javascript">
        $(document).ready(function () {
			$("#txtServer").change(function() {
				var serverid = $("#txtServer").val();
				if(serverid != null && serverid != 0) {
					SnapeClass.loadPlayersList(serverid, "#txtcharacter");
				}
			});
        });
		
    </script>
<div style="padding:5px !important;">




  <!-- Tab panes -->
  <div class="tab-content">
  


	  
    <div id="home" style="width:100% !important;" class="container tab-pane active"><br>
   <center><div id="quanap" class="alert alert-warning" style="width:50%">

			 <h2><p class="text-danger">ĐỔI GIỚI TÍNH MIỄN PHÍ ! </a> </p>
</div></center></h2>

 
	<center><div class="col-md-8">
   <div id="quanap" class="alert alert-success" style="width:100%">

<center><form id="frmReCharge" method="post">
<label class="control-label" for="email_login">Loại:</label>

			<select class="form-control"  name="txtVip">
			<option value="1">Đổi Giới Tính</option>
			</select>
			<label class="control-label" for="email_login">Giới tính muốn đổi:</label>

			<select class="form-control"  name="txtSex">
			<option value="0">Nữ</option>
			<option value="1">Nam</option>
			
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
			<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Tên nhân vật:</label>
			<select id="txtcharacter" name="txtcharacter" class="form-control">
				<option value="0">-- Chọn nhân vật --</option>				
			</select>
		</div>
			
	<center><input type="submit" class="btn btn-danger btn-block" value="Đổi Ngay !" />
</form>
</div>

</div>

	</div>
     
    </div>			

 

    </div></center>
