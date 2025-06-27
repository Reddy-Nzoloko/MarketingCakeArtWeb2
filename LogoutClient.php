<?php
session_name("CLIENT_SESSION");
session_start();
session_unset();
session_destroy();
header("Location: Index.php");
exit;
