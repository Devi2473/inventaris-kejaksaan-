<?php
session_start();
session_destroy(); // Ini perintah untuk membuang kunci/session 
header("location:login.php?pesan=logout");
exit();
?>