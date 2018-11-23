<?php
session_start();
unset($_SESSION['agencycode']);
unset($_SESSION['password']);
session_destroy();
header("Location: demo.html");
exit;
?>