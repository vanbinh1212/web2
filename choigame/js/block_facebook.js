$("document").ready(function(e) {
    if ($(".TitleFacebook").length > 0) {
        var wPlay = $(document).width();
        if (wPlay < 1200) {
            $(".BlockFacebookWrapper").stop().animate({
                "right": "-720px"
            }, 0);
            $(".TitleFacebook").removeClass("TitleFacebookOpen");

        }
        $(".TitleFacebook").click(function() {
            if ($(".TitleFacebook").hasClass("TitleFacebookOpen")) {
                $(".BlockFacebookWrapper").stop().animate({
                    "right": "-720px"
                }, 500);
                $(".TitleFacebook").removeClass("TitleFacebookOpen");

            } else {
                $(".BlockFacebookWrapper").stop().animate({
                    "right": "0px"
                }, 500);
                $(".TitleFacebook").addClass("TitleFacebookOpen");
            }
        })

        $(window).resize(function() {
            var wPlay = $(document).width();
            if (wPlay < 1200) {
                $(".BlockFacebookWrapper").stop().animate({
                    "right": "-720px"
                }, 0);
                $(".TitleFacebook").removeClass("TitleFacebookOpen");

            } else {
                $(".BlockFacebookWrapper").stop().animate({
                    "right": "0px"
                }, 500);
                $(".TitleFacebook").addClass("TitleFacebookOpen");
            }
        });
    }
});