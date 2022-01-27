<?php
session_start();


function protect_page(){
    if (logged_in() === false ) {
        echo "<script>alert('Авторизуйтесь, щоб побачити вміст цієї сторінки!');location.href='z_admin_signin.php';</script>"; 
        }
    }
 
function logged_in(){
    return(isset($_SESSION['admin'])) ? true : false;
}
?>