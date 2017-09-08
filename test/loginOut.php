<?php
session_start();
session_destroy();
header("location:jump.php?code=1&url=login.php&msg=退出成功！");
?>