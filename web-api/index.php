<?php
error_reporting(E_ALL & ~E_NOTICE & ~8192);
#Khoi tao session
define('Kh4nhHuy3z!99^H2S04', 'Fuck You', true);
if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['last_session_request'] = time();
include_once "connect.php";
include_once "function.php";
$username = $_SESSION['Username'];
$q = @$data->query("Select UserID,UserName,NickName,Money,Grade from Sys_Users_Detail Where UserName = '$username'");
if (@$data->query_num($q) == 1) {
    $info = @$data->query_array($q);
    $_SESSION['UserID'] = $info['UserID'];
    $_SESSION['Nickname'] = $info['NickName'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./css-2i-hackcc/zing.css" rel="stylesheet" media="screen"/>
    <title><?php echo('Gà Tân Sửu- Bộ tộc Gunny - Server giải trí đỉnh cao'); ?></title>
    <meta name="distribution" content="global">
    <meta name="resource-type" content="document">
    <meta name="language" content="vi">
    <meta name="robots" content="noodp,index,follow">
    <meta name="revisit-after" content="1 days">
    <link href="./css-2i-hackcc/styles.css" rel="stylesheet" type="text/css">
    <link href="./css-2i-hackcc/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="./css-2i-hackcc/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    <link type="text/css" href="./css-2i-hackcc/index.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="javascr-2i-none/mainsite.js"></script>
    <script src="https://cdn.tiny.cloud/1/4ebu2w93gyr0l3kqtj6smjzphcgu9myfz72m3tpdgpaurrhm/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
</head>
<style>
body {
    overflow-y: auto;
    overflow-x: hidden;
    min-width: 1000px;
}
</style>
<div class="navtopIN">
    <div class="menubg_fix">
        <div class="margin_auto">
            <div class="gamecenter">
                <div class="login_register">
                    <a class="topup" href="/">Trang Chủ </a>
                    <?php if (!isset($_SESSION['UserID']) && !$_SESSION['ShopID']) { ?>
                        <a class="topup" href="?p=dang-ky">Đăng ký </a>
                        <a class="topup" href="?p=dang-nhap">Đăng Nhập </a>
                    <?
                    } else {
                        ?>
                        <a class="topup" href="?p=nap-the">Nạp thẻ</a>
                    <?
                    }
                    ?>
                    <a class="topup" href="Launcher.zip"><i class="fas fa-download"></i>Tải Launcher</a>
                </div>
                <?php if ($_SESSION['ShopID']) {
                    include "ajaxweb/getmoney.php";
                }
                ?>
            </div>
        </div>
        <?php if ($_SESSION['ShopID']) { ?>
            <div>
                <div class="col-md-5">
                </div>
                <a style="cursor: pointer" class="downloadgame mt-2" href="/s2"></a>
            </div>
        <?php } ?>
    </div>
</div>
<body>
<div id="body">
    <div id="wrapper">
        <div class="wrapperIn">
            <?php if ($_SESSION['ShopID']) { ?>
                <?php if ($_SESSION['Username'] == "admin") { ?>
                    <a class="topup" href="?p=quan-ly-mod">Quản lý</a>
                <?php } ?>
            <?php } ?>
            <div id="container" style="min-height: 850px;">
                <div id="MainContent nav_top"
                     style="min-height: 40px;border-radius: 30px; border-width:10px;background-color: whitesmoke;">
                    <?php if (!isset($_GET['p']) && ($_SESSION['UserID'])) { ?>
                    <?
                    }
                    ?>
                    <div id="news_ct">
                        <div class="col-md-6">
                            <?php if (!isset($_GET['p']) && ($_SESSION['UserID'])) {

                            } else if (!$_SESSION['ShopID'] && !isset($_GET['p'])) {
                                include "2i-chuc-nang/chuc-nang/login.php";
                            } else {
                            }
                            ?>
                            <?php if (isset($_GET['p'])) {
                                include getContentPage($_GET['p']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="news_ct">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
