<?php
session_start();
session_unset();
session_destroy();

// Redirect ke halaman login setelah log out
header("Location: index.php");
exit();