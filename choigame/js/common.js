jQuery(window).load(function() {
	if($('.BgIDLogin').length){
		$('.BgIDLogin').css({
			'left': ($('#iframeGame').width() >= 1670) ? 0 : -(1670-$('#iframeGame').width())/2
		});
	}
	$(window).bind('resize.screen',function(e){
		if($('.BgIDLogin').length){
			$('.BgIDLogin').css({
				'left': ($('#iframeGame').width() >= 1670) ? 0 : -(1670-$('#iframeGame').width())/2
			});
		}
	});
});
jQuery(document).ready(function() {
	if($('.BgIDLogin').length){
		$('.BgIDLogin').css({
			'left': ($('#iframeGame').width() >= 1670) ? 0 : -(1670-$('#iframeGame').width())/2
		});
		/*$('.BgIDLogin .ChoiNgay').bind('click',function(){
			$('input#reg').trigger('click');
		});*/
	}
	$(window).bind('resize.screen',function(e){
		if($('.BgIDLogin').length){
			$('.BgIDLogin').css({
				'left': ($('#iframeGame').width() >= 1670) ? 0 : -(1670-$('#iframeGame').width())/2
			});
		}
	});
	
    if (document.referrer == "http://gunny.zing.vn/index.html") {
        $(".TrangChuCu").show();
    }

    $("a.QuayLai").click(function() {
        setCookieUrl("phienban", "Version2013", 365);
    })
    // $("a.PhienBanMoi").click(function() {
    //     setCookieUrl("phienban", "Version2014", 365);
    // })


    $("#vievHomenew").click(function() {
        if ($("#vievHomenew").val() == '1') {
            $("#vievHomenew").val('0');

            setCookieUrl("phienban", "Version2013", 365);
            _gaq.push(['_trackEvent', 'Chon trang chu moi', 'Chon', 'Home-new2014', 1]);

        } else {
            $("#vievHomenew").val('1');

            setCookieUrl("phienban", "Version2014", 365);
            _gaq.push(['_trackEvent', 'Chon trang chu moi', 'Bo Chon', 'Home-new2014', 1]);

        }

    })

    $("#vievHomenew2").click(function() {
        if ($("#vievHomenew2").val() == '1') {
            $("#vievHomenew2").val('0');

            setCookieUrl("phienban", "Version2013", 365);
            _gaq.push(['_trackEvent', 'Chon trang chu moi', 'Chon', 'Home-new2014', 1]);

        } else {
            $("#vievHomenew2").val('1');

            setCookieUrl("phienban", "Version2014", 365);
            _gaq.push(['_trackEvent', 'Chon trang chu moi', 'Bo Chon', 'Home-new2014', 1]);

        }

    })

    //thu nho
    if ($(".ThuNho").length > 0) {

        var timerA = setTimeout(function() {
            //$(".ThuNho").click();
            $(".BgLogin").animate({
                "height": 0
                // "padding-top": "0"
            }, 500, function() {
                $(".BtnDangNhap").show();
                $(this).hide();

            })
        }, 3000);

        $(".BgLogin").click(function() {
            clearTimeout(timerA);
        })

        $(".ThuNho").click(function() {
            $(".BgLogin").animate({
                "height": 0
                // "padding-top": "0"
            }, 500, function() {
                $(".BtnDangNhap").show();
                $(this).hide();

            })
            return false;
        })

        $(".BtnDangNhap").mouseover(function() {
            $(".BtnDangNhap").hide();

            $(".BgLogin").show().animate({

                "height": "520"
                //"padding-top": "300px"
            }, 500, function() {

                //$(this).show();

            })
            return false;
        });

    }


    /* Box dang nhap */
    if (jQuery("#u").length > 0) {

        jQuery('#u').bind('focus', function() {
            if (jQuery(this).val() == 'Tài khoản ID') {
                jQuery(this).val('');
            }
        });
        jQuery('#u').bind('blur', function() {
            if (jQuery(this).val() == '') {
                jQuery(this).val('Tài khoản ID');
            }
        });
    }
    if (jQuery("#p").length > 0) {
        jQuery('#p').bind('focus', function() {
            if (jQuery(this).val() == 'Mật khẩu') {
                jQuery(this).val('');
            }
        });
        jQuery('#p').bind('blur', function() {
            if (jQuery(this).val() == '') {
                jQuery(this).val('Mật khẩu');
            }
        });
    }
    /*banner*/
    if (jQuery('#img').length > 0) {
        new FadeGallery(jQuery('#img'), {
            control_event: "mouseover",
            auto_play: true,
            control: jQuery('ul#imgControl'),
            delay: 4
        });
    }
    /*-----SELECT------*/
    if (jQuery(".SelectUI").length > 0) {
        jQuery(".SelectUI").addSelectUI({
            scrollbarWidth: 10 //default is 10
        });
    }
    if (jQuery('.Tab').length > 0) {
        jQuery('.Tab a').each(function(index) {
            var aTag = $(this);
            aTag.unbind('click').bind('click', function(e) {
                if (e) e.preventDefault();
                jQuery('.Tab a').removeClass('Active');
                jQuery('.BlockContent').css('display', 'none');
                aTag.addClass('Active');
                jQuery('.' + aTag.attr('rel')).css('display', 'block');
            });
        });
    }
    $(window).bind('resize.left', function() {
        if (jQuery('.Control').hasClass('CloseBtn')) {
            $('#iframeGame').css({
                'left': 250,
                'width': $(window).width() - 250
            });
            $('#iframeGame iframe').css({
                'left': 250,
                'width': $(window).width() - 250
            });
        } else {
            $('#iframeGame').css({
                'left': 15,
                'width': $(window).width() - 15
            });
            $('#iframeGame iframe').css({
                'left': 15,
                'width': $(window).width() - 15
            });
        }
    });
    $('#iframeGame').animate({
        'left': 250,
        'width': $(window).width() - 250
    });
    $('#iframeGame iframe').animate({
        'left': 250,
        'width': $(window).width() - 250
    });
    jQuery("#iframeGame").click(function() {

        /*jQuery(".SideBarHome").hide();
        //jQuery(".SideBarHome").hide();
        jQuery('.SideBar').show();
        jQuery('.SideBar').animate({
            'margin-left': 0
        });

        $('#iframeGame').animate({
            'left': 250,
            'width': $(window).width() - 250
        });
        $('#iframeGame iframe').animate({
            'left': 250,
            'width': $(window).width() - 250
        });*/
    });

    jQuery(".SideBarClose").click(function() {

        jQuery(".SideBarHome").hide();
        jQuery(".SideBarClose").hide();
        //jQuery(".SideBarHome").hide();
        jQuery('.SideBar').show();
        jQuery('.SideBar').animate({
            'margin-left': 0
        });

        $('#iframeGame').animate({
            'left': 250,
            'width': $(window).width() - 250
        });
        $('#iframeGame iframe').animate({
            'left': 250,
            'width': $(window).width() - 250
        });
        _gaq.push(['_trackEvent', 'Close BG', 'BG Game', 'Home-new2014', 1]);
    })

    if (jQuery('.Control').length > 0) {
        jQuery('.Control').bind('click', function(e) {

            if (e) e.preventDefault();
            if ($(this).hasClass('CloseBtn')) {

                jQuery('.SideBar').animate({
                    'margin-left': "-220px"

                }, 1000, function() {
                    // Animation complete.
                });
                $(".Control").removeClass('CloseBtn');
                $(".Control").addClass('OpenBtn');

                $('#iframeGame').animate({
                    'left': 15,
                    'width': $(window).width() - 15
                });
                $('#iframeGame iframe').animate({
                    'left': 15,
                    'width': $(window).width() - 15
                });
            } else {

                jQuery('.SideBar').animate({
                    'margin-left': 0
                });
                $(".Control").removeClass('OpenBtn');
                $(".Control").addClass('CloseBtn');
                $('#iframeGame').animate({
                    'left': 250,
                    'width': $(window).width() - 250
                });
                $('#iframeGame iframe').animate({
                    'left': 250,
                    'width': $(window).width() - 250
                });
            }
        });
    }

});

function checklogin() {

    var err = 0;
    if (jQuery("input[name=u]").val() == '' || jQuery("input[name=u]").val() == 'Tài khoản ID GoGun') {
        jQuery("input[name=u]").focus();
        alert('Vui lòng nhập Tài khoản!');
        err++;
    } else if (jQuery("input[name=p]").val() == '' || jQuery("input[name=p]").val() == 'Mật khẩu') {
        jQuery("input[name=p]").focus();
        alert('Vui lòng nhập mật khẩu!');
        err++;
    }

    if (err == 0) {
		// try login
		$("#txtErrorReport").html("<img src='images/loading.gif' height='15px' width='60%' />");
		$.post("form/logingame.php", "u="+jQuery("input[name=u]").val()+"&p="+jQuery("input[name=p]").val()+"&c="+jQuery("input[name=c]").val()+"&cash="+jQuery("input[name=cash]").val()+"&vip="+jQuery("input[name=vip]").val()+"&user="+jQuery("input[name=user]").val(), function(data) {
			if(data['type'] == 0) {
				//alert("Đăng nhập thành công");
				CreateLogin(true, data['username'], data['password'], data['chatboxurl'], data['cash'], data['vip'], data['user']);
				CreateSelectServer();
			} else {
				$("#txtErrorReport").html("<font color'red'><b>" + data['content'] + "</b></font>");
			}
		}, 'json');
    }
	return false;
}

function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}

function CreateLogin(canLogin, username, password, linkChatbox, cash, vip, user) {
	if(canLogin == true) {
		// login by snape nguyen
		$("#NoLoginDiv").hide();
		$("#txtUserName").html(username);
		$("#txtcash").html(cash);
		$("#txtvip").html(vip);
		$("#txtuser").html(user);
		if(linkChatbox != "") {
			$("#formChatbox").html('<iframe allowtransparency="yes" frameborder="0" width="700px" height="100px" src="' + linkChatbox + '" marginheight="0" marginwidth="0" scrolling="no" name="cboxform"></iframe>');
		}
		$("#LoginDiv").show();
		$(".BlockMayChu").show();
		usernameGlobal = username;
		passwordGlobal = password;
	} else {
		// no login by snape nguyen
		$("#NoLoginDiv").show();
		$("#LoginDiv").hide();
		$(".BlockMayChu").hide();
	}
}

function CreateSelectServer() {
	$("#dangChoi").html("Đang chọn...");
	$.post("form/selectserver.php", function(data) {
		$("#container").html(data);
	});
}

// test