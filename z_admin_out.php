<?php

include ('z_admin_func.php');
protect_page();
logged_in();
session_destroy();
header("Location: z_admin_signin.php");
exit;

?>