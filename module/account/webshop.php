<?php
if(!defined("SNAPE_VN")) die('No access');

?>

<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/load_webshop.js"></script>

<script type="text/javascript">
	
    $(document).ready(function () {
		
		SnapeWebshop.init(1, 0);
		
		$(document).on("change", ".count_item_cart", function() {
			SnapeWebshop.getTotalMoney('#totalmoneypay_text');
		});
		
		$(document).on('click', '#add-to-cart', function () {
			
			// put to cart
			var isAdd = SnapeWebshop.addToCart($(this).attr("data"));
			
			if(isAdd) {
				var cart = $('#shopping-cart');
				var imgtodrag = $(this).parent('.webshop-item-v1').find("img").eq(0);
				if (imgtodrag) {
					var imgclone = imgtodrag.clone()
						.offset({
						top: imgtodrag.offset().top,
						left: imgtodrag.offset().left
					})
						.css({
						'opacity': '0.5',
							'position': 'absolute',
							'height': '150px',
							'width': '150px',
							'z-index': '100'
					})
						.appendTo($('body'))
						.animate({
						'top': cart.offset().top + 10,
							'left': cart.offset().left + 10,
							'width': 75,
							'height': 75
					}, 1000, 'easeInOutExpo');
					
					setTimeout(function () {
						cart.effect("pulsate", {
							times: 2
						}, 200);
						
						$('#totalitems').html(SnapeWebshop.vars.cart.length);
						
					}, 1500);

					imgclone.animate({
						'width': 0,
							'height': 0
					}, function () {
						$(this).detach()
					});
				}
			}
			
		});
		
		$(document).on('click', '#submitBuyItems', function () {
			
			$("#txtresultbuy").hide();
			
			SnapeWebshop.getTotalMoney('#totalmoneypay_text');
			
			if(SnapeWebshop.vars.cart.length <= 0) {
				SnapeClass.openModal("Lỗi mua vật phẩm", "Không có vật phẩm nào trong giỏ đồ để mua.", []);
				return;
			}
			
			
			$(this).attr("disabled", true);
			
			// request buy item
			$.post("<?=$_config['page']['fullurl']?>/form/buywebshop.php", {"params" : SnapeWebshop.getParams()}, function(data) {
				
				$('#submitBuyItems').removeAttr("disabled");
				
				if(data['type'] == 0) {
					
					$("#txtcurrentmoney").html(data['money']);
					
					$("#txtcurrentmoneylock").html(data['moneylock']);
					
					SnapeWebshop.clearResult('#totalitems');
					
					SnapeWebshop.init(1, 0);
					
					SnapeClass.openModal("Thành công", "Mua thành công. Vui lòng vào Túi Web để chuyển vật phẩm vào game.", [{ Name: "Túi web", Link: "<?=$_config['page']['fullurl']?>/tai-khoan/tui-web/" }]);
					
				} else {
					
					$("#txtresultbuy").html(data['content']).show();
					
				}
			}, 'json');
			
		});
		<?php
		if(!$_SESSION['ss_guilde_webshop']) {
			$_SESSION['ss_guilde_webshop'] = true;
			echo 'SnapeGuild.guildWebshop().show();';
		}
		?>
		
	});
</script>
<form id="frmChangePassword" method="post">
	<div class="center-block">
		<div class="form-group" align="right">
			<div id="msg_err_login" class="alert alert-info">
				<span style="float: left;">
					<div id="menuws" class="btn-group">
						<div class="btn-group btn-group-sm">
							<a href="javascript:void(0)" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Xếp theo <span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
								<li class="dropdown-header"><i class="fa fa-share pull-right"></i> Chọn Danh Mục</li>
								<li id="sortMenu" style="overflow-y:auto; height:300px" id="">
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, -1)">Mua nhiều nhất</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 0)">Mới nhất</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, -2)">Hệ thống bán</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, -3)">Người chơi bán</a>
									
									<div class="divider"></div>
									
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 5)">Áo</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 3)">Tóc</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 1)">Nón</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 15)">Cánh</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 9)">Nhẫn</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 8)">Vòng tay</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 14)">Dây truyền</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 13)">Set đồ</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 16)">Bong bóng</a>
									
									<div class="divider"></div>
									
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 11)">Đạo cụ</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 7)">Vũ khí</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 17)">Vũ khí phụ</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 50)">Vũ khí thú cưng</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 51)">Nón thú cưng</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 52)">Áo thú cưng</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 35)">Trứng thú cưng</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 34)">Thức ăn thú cưng</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 62)">Thẻ phụ kiện</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 40)">Huy Hiệu</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 24)">Thẻ danh hiệu</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 53)">Nước tu luyện ma pháp</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 80)">Thuốc Ma Pháp</a>
									<a href="javascript:void(0)" onclick="SnapeWebshop.init(1, 69)">Bùa Thú Cưỡi</a>
								</li>
							</ul>
						</div>
					</div>
					<a id="guildBag" href="<?=$_config['page']['fullurl']?>/tai-khoan/tui-web/" class="btn btn-default">Túi đồ web</a>
				</span>
				<button id="shopping-cart" type="button" class="btn btn-info" onclick="SnapeWebshop.showCart()"><img src="<?=$_config['page']['fullurl']?>/images/icon-giohang.png" height="15px" /> Giỏ hàng <span id="totalitems" class="badge">0</span></button>
			</div>
		</div>
		<div id="guildInfo" style="padding-center:20px"><small><b><font color="#337ab7">Hiện tại bạn đang có</font> </b></small> <span id="txtcurrentmoney" class="label label-primary"><?=number_format($userInfo['Money'])?></span> <small><b><font color="#337ab7">FCoins</font> </b></small></div>
		<div class="webshop-pagin"></div>
		
		<div class="webshop-items">
				
			Loading...
				
		</div>
		
	</div>
</form>