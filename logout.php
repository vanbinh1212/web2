m <?
set_time_limit(5);
session_start();
session_destroy();
die('<script>window.location.href=\'/\';</script>');
?>