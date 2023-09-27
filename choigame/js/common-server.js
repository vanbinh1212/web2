var items = 5;
var _pos = 0;
var _step = 0;

jQuery(document).ready(function() {
	if ($('.PopupNewServer img').length && !$('.BgLogin').is(':visible')) {
        $('.PopupNewServer').appendTo($('#container')).show();
        $('.PopupNewServer .Close').unbind('click').bind('click', function(e) {
            e.preventDefault();
            $('.PopupNewServer').hide();
        });
    }
    if (jQuery(".PopupNewServer").length > 0) {
        jQuery(".PopupNewServer a.BtGiaoDienCu").bind("click", function() {
            jQuery(".PopupNewServer").hide();
            return false;
        })
    }
    jQuery("ul#tabHeader").jcarousel({
        visible: items,
        scroll: items,
        initCallback: init,
        itemLastOutCallback: {
            onAfterAnimation: itemLastOutCallback
        }

    });

});


function init(carousel, item) {
    jQuery("ul#tabHeader > li").click(function() {
        _pos = jQuery(this).prevAll().length;
        showListServer(_pos);
        activeTabServer(_pos);
        return false;

    });
};

function itemLastOutCallback(carousel, item, index, state) {
    if (state == 'next') {
        _step += items;
    } else {
        _step -= items;
    }
    showListServer(_step);
    activeTabServer(_step);
}

function showListServer(_pos) {
    jQuery(this).parent().find("li").removeClass("Active");
    jQuery(this).addClass("Active");
    jQuery(".ServerList").removeClass("Active");
    jQuery(".ServerList").animate({
        opacity: 0
    }, 100);
    jQuery(".ServerList").eq(_pos).addClass("Active");
    jQuery(".ServerList").eq(_pos).animate({
        opacity: 1
    }, 100);
}

function activeTabServer(_pos) {
    /*alert(_pos);*/
    jQuery("#tabHeader > li").removeClass("Active");
    jQuery("#tabHeader > li").eq(_pos).addClass("Active");
}