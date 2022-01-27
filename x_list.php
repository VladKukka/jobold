<?php

include ('jobold_db.php');

?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title>Список вакансій - Jobold</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/jobold_ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Copyright" content="Jobold">
        <link rel="shortcut icon" sizes="16x16 32x32 64x64" href="images/logo/favicon.ico" type="image/x-icon" />
        <meta name="google-site-verification" content="TpugWUlaEeV8xfIX0YElwe6S5ohjctckhjegS84bBSE" />
 
        <style>

            @import url('https://fonts.googleapis.com/css2?family=Nunito&family=Trispace&display=swap');
    
            #eclipse {
                position:fixed; bottom:0;
                display: none;
                z-index: 30;}
     
            #modal_window {
                width: 100%;
                height: auto;
                text-align: left;
                padding: 15px;
                border: none;
                border-radius: 0px;
                color: #000000;
                position: fixed;
                bottom: 0;
                box-shadow: 0px 3px 20px rgba(0,0,0,0.5);
                background: #FFFFFF;}
       
            #modal_window > div{
                display: inline-block;
                margin:15px 15px;}
      
            #eclipse:target {display: block;}
            .home_side_nav {z-index: 1;}
        
            #button_main{
                background-color: #808080; 
                color:#000000;
                margin:5px; border:1px solid transparent;
                padding: 10px 17px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px; 
                box-sizing:border-box; 
                cursor: pointer;
                -webkit-transition-duration: 0.4s;}
       
            #button_main:hover, .button_main:focus{background-color: #000000; 
                text-decoration:none; 
                color:#ffffff;}
        
        </style>
 
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="js/jquery.cookie.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $("#button_main").click(function () {
                    $.cookie("modal_window", "", { expires:0, path: '/' });
                    $("#eclipse").hide();});
                if ( $.cookie("modal_window") == null )
                {
                    setTimeout(function(){
                        $("#eclipse").show();}, 1500)}
                else { $("#eclipse").hide();
                     }
            });
        </script>
    </head>
    
    
<body class="body_work">
    
        
<!--COOKIES-->
    <div id="eclipse">
        <div id="modal_window">
            <div>Ми використовуємо файли cookie, щоб забезпечити вам найкращий досвід та зручність використання нашого веб-додатку. Якщо ви продовжуєте використовувати цей додаток (сайт), ми вважатимемо, що ви ознайомлені, задоволені й приймаєте нашу Політику конфіденційності.<br>
            </div>
            <div class="cookie_btns">
                <a id="button_main" href="#" title="Closed" onclick="document.getElementById('eclipse').style.display='none'; return false;">Приймаю</a>
                <a href="<?php $tpa1 = $conn->query("SELECT terms FROM tpa_ets"); 
                   while ($row_tpa1 = $tpa1->fetch_assoc()) {
                       echo $row_tpa1["terms"];} ?>" target="_blank ">Політика конфіденційності</a>  
            </div>
        </div>
    </div>
    
    
<!--BTNs-->    
    <div class="blok12">
        <a class="btn3" href="index.php">На головну</a>
        <a class="btn3" href="x_archive.php">Архів</a>
        <a class="btn3" href="x_faq.php">F.A.Q.</a>
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
        <div class="blok4"><?php $tpa1 = $conn->query("SELECT email FROM tpa_ets"); 
                   while ($row_tpa1 = $tpa1->fetch_assoc()) {
                       echo $row_tpa1["email"];} ?></div>
        <div class="blok4"><a class="btn2" href="<?php $tpa1 = $conn->query("SELECT terms FROM tpa_ets"); 
                   while ($row_tpa1 = $tpa1->fetch_assoc()) {
                       echo $row_tpa1["terms"];} ?>" target="_blank ">Умови та Політика</a></div>
    </div>
    
    
    </body>
</html>