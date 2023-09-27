/*
|| Code by Snape Nguyen
|| -------------------------
|| Don't remove if you use it. Thanks very much!
*/

ItemBag = {
	htmlId : {
		contentRoot : '#contentItemsBag',
		loadingItems : '#loadingItems',
		contentResult : '#resultItems',
		serverField : '#txtserver',
		characterField : '#txtcharacter'
	},
	vars : {
		urlLoadItem : full_url + '/ajax/loaditembag2.php',
		urlMoveItem : full_url + '/ajax/moveItemToGameBag.php',
		listItems : []
	},
	init: function() {
		ItemBag.showLoading('Đang tải vật phẩm web...');
		ItemBag.vars.urlLoadItem = full_url + '/ajax/loaditembag2.php?svid='+document.getElementById("txtserver").value+'&cid='+document.getElementById("txtcharacter").value;
		$.post(ItemBag.vars.urlLoadItem, function(data) {
			if(data['type'] == 0) {
				ItemBag.vars.listItems = data['list'];
				ItemBag.showItems();
				ItemBag.hideLoading();
			} else {
				SnapeClass.openModal('Lỗi lấy Vật phẩm Web', data['content'], []);
			}
		}, 'json');
	},
	showItems: function() {//no la cai nay ma
		var shtml = '';
		for (var i = 0; i < ItemBag.vars.listItems.length; i++) {
			shtml += '<input type="checkbox" id="c'+ItemBag.vars.listItems[i].ID+'" name="giatri" value="'+ItemBag.vars.listItems[i].ID+'" style="display: block;margin-top: 35px;position: absolute;"><tr id="bag_'+ItemBag.vars.listItems[i].ID+'"><th style="text-align: center;"><img class="personPopupTrigger" alt="'+ItemBag.vars.listItems[i].TemplateID+','+ItemBag.vars.listItems[i].VaildDate+'.'+ItemBag.vars.listItems[i].IsBind+'" src="'+ItemBag.vars.listItems[i].Picture+'" /></th><td>'+ItemBag.vars.listItems[i].Count+'</td><td>'+(ItemBag.vars.listItems[i].VaildDate == 0 ? 'Vĩnh viễn' : ItemBag.vars.listItems[i].VaildDate)+'</td><td>'+ItemBag.vars.listItems[i].IsBind+'</td><td>'+ItemBag.vars.listItems[i].ServerName+'</td><td><button type="button" class="btn btn-warning" onclick="ItemBag.moveItemtoGameBag('+ItemBag.vars.listItems[i].ID+')">Lấy về túi game</button></td></tr>';
		}
		$(ItemBag.htmlId.contentResult).html(shtml);
	},
	addItem: function(item) {
		var shtml = '<tr><th style="text-align: center;"><img src="'+item.Picture+'" /></th><td>'+item.Count+'</td><td>'+item.VaildDate+'</td><td>'+item.IsBind+'</td><td>'+item.ServerName+'</td></tr>' + $(ItemBag.htmlId.contentResult).html();
		$(ItemBag.htmlId.contentResult).html(shtml);
	},
	sendItems: function() {
		var svid = $(ItemBag.htmlId.serverField).val();
		
		var cid = $(ItemBag.htmlId.characterField).val();
		
		if(!svid || svid <= 0)
		{
			SnapeClass.openModal('Lỗi gửi vật phẩm', "Vui lòng chọn máy chủ nhận vật phẩm.", []);
			return;
		}
		
		if(!cid || cid <= 0)
		{
			SnapeClass.openModal('Lỗi gửi vật phẩm', "Vui lòng chọn nhân vật.", []);
			return;
		}
		
		ItemBag.showLoading('Đang gửi vật phẩm vào game. Vui lòng không tắt trang...');
		$.post(ItemBag.vars.urlSendItem + "?svid=" + svid + "&cid=" + cid, function(data) {
			if(data['type'] == 0) {
				SnapeClass.openModal('Thành công', "Đã gửi vật phẩm vào Túi Game thành công.", []);
				ItemBag.init();
			} else {
				SnapeClass.openModal('Lỗi lấy Vật phẩm Web', data['content'], []);
			}
			ItemBag.hideLoading();
		}, 'json');
	},
	moveItemtoGameBag: function(ID) {
		var svid = $(ItemBag.htmlId.serverField).val();
		
		var cid = $(ItemBag.htmlId.characterField).val();
		
		if(!svid || svid <= 0)
		{
			SnapeClass.openModal('Lỗi gửi vật phẩm', "Vui lòng chọn máy chủ nhận vật phẩm.", []);
			return;
		}
		
		if(!cid || cid <= 0)
		{
			SnapeClass.openModal('Lỗi gửi vật phẩm', "Vui lòng chọn nhân vật.", []);
			return;
		}
		
		ItemBag.showLoading('Đang lấy vật phẩm về túi. Vui lòng không tắt trang...');
		$.post(ItemBag.vars.urlMoveItem + "?id=" + ID+"&serverid="+svid+"&uid="+cid, function(data) {
			if(data['type'] == 0) {
				SnapeClass.openModal('Thành công', "Đã gửi vật phẩm vào InGame thành công.(Lưu ý : Vật phẩm vào thẳng túi không qua thư)", []);
				ItemBag.init();
			} else {
				SnapeClass.openModal('Lỗi lấy Vật phẩm Web', data['content'], []);
			}
			ItemBag.hideLoading();
		}, 'json');
	},
	showLoading: function(text) {
		$(ItemBag.htmlId.loadingItems).html("<div align='center'><img src='"+full_url+"/images/loading.gif' /> "+text+"</div>").fadeIn();
		$(ItemBag.htmlId.contentRoot).hide();
	},
	hideLoading: function() {
		$(ItemBag.htmlId.loadingItems).hide();
		$(ItemBag.htmlId.contentRoot).fadeIn();
	}
}