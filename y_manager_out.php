<?php

include ('y_manager_func.php');
protect_page();
logged_in();
session_destroy();
header("Location: y_manager_signin.php");
exit;

?>