    $(document).ready(function() {
        if (jQuery("#navHome").length > 0) {
            $("#navHome").addNavigation({
                event: "mouseover",
                effect: false,
                activeSection: activemenu_nav
            });
        }






    });

    function showActive() {
        $("#sidenav-menu").find(".Hilite").addClass("Active");
        $("#sidenav-menu").find(".Hilite").each(function() {
            var self = $(this);
            self.find("ul:first").show();
        });
    }