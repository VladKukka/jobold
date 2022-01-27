<?php

include ('y_manager_func.php');
protect_page();
logged_in();

include ('jobold_db.php');

$user_name = $_SESSION['manager'];

?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title>Менеджер - Дім</title>
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
    
    
<!--TEXT-->    
    <div class="text_zone2">
        Кабінет Менеджера JOBOLD (Таємний кандидат)    
    </div>
    

<!--BTNs-->    
    <div class="blok5">
        <a class="btn3" href="y_manager_newvac.php">Нова вакансія</a>
        <a class="btn3" href="y_manager_drafts.php">Чернетки</a>
        <a class="btn3" href="y_manager_roles.php">Ролі</a>
    </div>
    
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="y_manager_out.php">Вийти</a>
    </div>

 
    </body>
</html>