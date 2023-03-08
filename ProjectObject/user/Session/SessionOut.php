<?php
session_start();
$_SESSION =array();
session_destroy();
echo "<script>alert('正在注销中');window.location.href='../page/login.php'</script>";