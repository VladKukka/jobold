<?php

include ('jobold_db.php');

?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title>Авторизація - Адмін</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/jobold_ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Copyright" content="Jobold">
        
        <link rel="shortcut icon" sizes="16x16 32x32 64x64" href="images/logo/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="images/pwa/192x192.png">
        <link rel='manifest' href='/manifest.json'>
        <script type="module" src="https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall"></script>
        
        <meta name="google-site-verification" content="TpugWUlaEeV8xfIX0YElwe6S5ohjctckhjegS84bBSE" />
 
        <style>

            @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Trispace&display=swap');

        </style>
 
        
    </head>
      
<body>
    
    
<!--Sign in Form-->  
    <center>
        <form method="post" action="zy_exe.php">
            <div class="text_zone4">Авторизуватися як Адміністратор</div><br>
            <input class="form_place1" type="text" name="login_signin" minlength="4" placeholder="Ваш Логін" required><br><br>
            <input class="form_place1" type="password" name="password_signin" minlength="4" placeholder="Ваш Пароль" required><br><br>
            <input class="form_btn1" type="submit" name="enter_signin" value="Увійти" />
        </form><br>
    </center>
    
 
    </body>
</html>