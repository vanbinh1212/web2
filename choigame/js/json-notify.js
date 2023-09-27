var time = 3600000;
//var time = 10000;
var timer;
var params1 = '';
var params2 = '';
var numPost = 0;


function loadPageEvent() {

    var tempUrl;
    if (sid != "") {
        tempUrl = 'http://gunny.zing.vn/realtime?sid=' + sid;
    } else {
        tempUrl = 'http://gunny.zing.vn/realtime?auth=' + auth + "&uin=" + uin + "&acn=" + acn + "&skey=" + skey;
    }

    $.ajax({
        type: "POST",
        url: tempUrl,
        dataType: "jsonp",
        success: function(msg) {
            $("#numNews").html(msg.total);
            if (msg.total * 1 > 0) {
                numPost = 0;
            } else {
                $("#numNews").css({
                    "display": "none"
                })
            }
        },
        error: function(err) {

        }

    });
}


function loadPageEvent2() {

    if (numPost > 0) {
        return false;
    }
    var tempUrl;
    if (sid != "") {
        tempUrl = 'http://gunny.zing.vn/realtime/news-list.html?sid=' + sid;
    } else {
        tempUrl = 'http://gunny.zing.vn/realtime/news-list.html?auth=' + auth + "&uin=" + uin + "&acn=" + acn + "&skey=" + skey;
    }
    $.ajax({
        type: "POST",
        url: tempUrl,
        dataType: "jsonp",
        success: function(msg) {

            $("#listNews").html(msg.html);
            numPost = 1;

        },
        error: function(err) {

        }

    });
}



$(function() {

    if (typeof auth !== 'undefined') {


        timer = setInterval(function() {
            if (sid != "" || auth != "") {
                loadPageEvent();
            }
        }, time);


        $("#wrapperNotify").html('<div id="notification"> <div class="ChuY">	<a href="#" class="Link Active" id="openList" title="Xem" >Xem</a>	<a href="#" class="Link " id="closeList" title="Close">Xem</a>    <span id="numNews">0</span></div> </div>	<div class="ArrowBox">   <ul class="DanhSachTin" id="listNews">	</ul> </div> ');

        if (sid != "" || auth != "") {
            loadPageEvent();
        }

    }

    jQuery(document).delegate("a#openList", "click", function() {


        $(".Link").removeClass("Active")
        $("#closeList").addClass("Active");

        clearInterval(timer);

        loadPageEvent2();

        $(".ArrowBox").show();
        var t = $("#content_notification").height();
        $(".ChuY").css({
            left: 139
        });
        $(".ChuY span").hide();
        $("#wrapperNotify").addClass("NotifyClose");

        $("#newsUpdate2").animate({
            height: t
        }, 500);

        //click tin moi
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
        //click tin moi



        _gaq.push(['_trackEvent', 'Notify', 'Open', 'IDLogin']);


        return false;

    })

    jQuery(document).delegate("a#closeList", "click", function() {
        $(".Link").removeClass("Active")
        $("#openList").addClass("Active");
        $(".ArrowBox").hide();
        $("#wrapperNotify").removeClass("NotifyClose");
        $(".ChuY").css({
            left: 0
        })

        _gaq.push(['_trackEvent', 'Notify', 'Close', 'IDLogin']);

        timer = setInterval(function() {

            loadPageEvent();
        }, time);
    });

});