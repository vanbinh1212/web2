/* jSelect (using jQuery library).
 *--------------------------------------------*
 *  @author : ukhome ( ukhome@gmail.com | ntkhoa_friends@yahoo.com )
 *--------------------------------------------*
 *  @released : 24-Mar-2009 : version 1.0
 *--------------------------------------------*
 *  @revision history : ( latest version : 1.0 )
 *--------------------------------------------*
 *      + 24-Mar-2009 : version 1.0
 *          - released
 *--------------------------------------------*
 */

/* External Interface
 */

function callExternalFunction(o /*caller*/ , droplists /*all droplists*/ , val /*rel in <a>*/ ) {
    /*
     * o : selectUI object
     *   o.select : <select> in jQuery type
     *   o.elUL : list drop down, main list <ul>
     *----------------------------------------------*
     * droplists : all selectUI droplists in page, call by its id droplists(id), will return selectUI object
     * val : rel value in a of each selectUI option
     */
    o.select.trigger("onchange");
    //o.select.attr("id") <-- check current select id



    if (jQuery(".InfoServer").length > 0 && o.select.attr("id") == "Server") {
        callPlayGame(o.select.val(), o.select.find("option:selected").text());

    }
    if (jQuery(".ServerName").length > 0 && o.select.attr("id") == "Server2") {
        callPlayGame(o.select.val(), o.select.find("option:selected").text());

    }




}

function callPlayGame(id, name) {




    jQuery("#dangChoi").html(name); // may chu dang choi
    jQuery(".DoiServer").show();
    document.title = "Gunny - Play";
    var serverid = id;
    var sServer = "http://idgunny.zing.vn/gamemain.php?id=" + serverid;
    linkIframeGame ='<img src="http://360game.apps.zing.vn/log/tracking?_svid='+serverid+'" width="0" height="0" alt="360log" style="opacity:0;"/>'+ '<iframe width="100%" scrolling="no" height="1000" frameborder="0" allowtransparency="true" src="' + sServer + '" name="_opener" class="autoHeight" ></iframe>';
    $(".TitleMayChu").show(); //may chu dang choi
    $("#iframeGame").html(linkIframeGame);
    closeLeftMenu();
    return false;
}