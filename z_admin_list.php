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
        <title>Список вакансій - Адмін</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/jobold_ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Copyright" content="Jobold">
        <link rel="shortcut icon" sizes="16x16 32x32 64x64" href="images/logo/favicon.ico" type="image/x-icon" />
        <meta name="google-site-verification" content="TpugWUlaEeV8xfIX0YElwe6S5ohjctckhjegS84bBSE" />
 
        <style>

            @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Trispace&display=swap');

        </style>
       
    </head>
    
    
<body class="body_work">
  
    
<!--BTNs-->    
    <div class="blok7">
        <a class="btn4" href="z_admin_home.php">На головну</a>
    </div>
    
    
<!--VACANCY INFO-->
    <div class="blok16">
        <?php
        $vac_info = $conn->query("SELECT id, company, vacancy, city, search, web, web_link, politely, professionally, interested, operatively, conformity, communication, salary, other1, other2, other3, status, manager, date FROM vacs WHERE status='on' ORDER BY general_score DESC");
            while ($row_vac_info = $vac_info->fetch_assoc()) {
                $politely_score = $row_vac_info["politely"] * 1;
                $professionally_score = $row_vac_info["professionally"] * 1.5;
                $interested_score = $row_vac_info["interested"] * 2;
                $operatively_score = $row_vac_info["operatively"] * 2.5;
                $conformity_score = $row_vac_info["conformity"] * 3;
                $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
                echo "<div class='blok13'><div class='blok14'><center>", $general_score. "/100,&ensp;".$row_vac_info["vacancy"]. ",&ensp;" .$row_vac_info["company"]. ",&ensp;" .$row_vac_info["city"]. "</center></div>";
                echo "<div class='blok15'><form method='post' action='x_vacancy.php'>
                <input class='form_place2' type='hidden' name='id' value='".$row_vac_info["id"]."' required>
                <input class='form_place2' type='hidden' name='search_name' value='".$row_vac_info["search"]."' required>
                <input type='submit' class='form_btn2' name='enter_search_name' value='Переглянути'></form></div></div>";}
    ?>
        </div>
    
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="z_admin_out.php">Вийти</a>
    </div> 
    
    
    </body>
</html>