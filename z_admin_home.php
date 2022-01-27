<?php

include ('z_admin_func.php');
protect_page();
logged_in();

include ('jobold_db.php');

$user_name = $_SESSION['admin'];

?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title>Адмін - Дім</title>
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
        Адміністративна панель JOBOLD - можливість керувати всіма можливими процесами та функціоналом сервісу     
    </div>
    
    
<!--BTNs-->    
    <div class="blok5">
        <a class="btn3" href="z_admin_list.php">Список</a>
        <a class="btn3" href="z_admin_archive_pub.php">Архів</a>
        <a class="btn3" href="z_admin_edits.php">Редакція</a>     
    </div>
    
    
<!--BTNs-->    
    <div class="blok5">
        <a class="btn3" href="z_admin_newvac.php">Нова вакансія</a>
        <a class="btn3" href="z_admin_drafts.php">Чернетки</a>
        <a class="btn3" href="z_admin_edits2.php">Редактура</a>      
    </div>
    
    
<!--BTNs-->    
    <div class="blok5">
        <a class="btn3" href="z_admin_team.php">Команда</a>
        <a class="btn3" href="z_admin_archive.php">Архівовані</a>
        <a class="btn3" href="z_admin_deleted.php">Видалені</a>
    </div>
    
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="z_admin_out.php">Вийти</a>
    </div> 
    
 
    </body>
</html>