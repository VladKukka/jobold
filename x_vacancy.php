<?php

include ('jobold_db.php');

if(isset($_POST['search_name'])){
    $search_name1 = $_POST['search_name'];
    $exist_search_name1 = $conn->query("SELECT * FROM vacs WHERE search='$search_name1'");
    $res0 = $exist_search_name1->num_rows;
    if($res0 > 0){
        $search_name_title = $_POST['search_name'];}
    else{$search_name_title = "Вказаної вакансії не існує!";}}
else{$search_name_title = "Не обрано вакансію!";}


?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title><?php echo $search_name_title; ?> - Jobold</title>
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
    
    
<body link="#ffffff" vlink="#808080" alink="#ffffff" bgcolor="#000000">
    
        
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
    <div class="blok5">
        <a class="btn3" href="index.php">На головну</a>
        <a class="btn3" href="x_list.php">Список</a>
        <a class="btn3" href="x_archive.php">Архів</a>
        <a class="btn3" href="x_faq.php">F.A.Q.</a>
    </div>
    
    
<!--VACANCY INFO-->
    <div class="blok6">
        <?php
        if(isset($_POST['search_name'])){
            $search_name = $_POST['search_name'];
            $exist_search_name = $conn->query("SELECT * FROM vacs WHERE search='$search_name'");
            $res1 = $exist_search_name->num_rows;
            if($res1 > 0){
                $vac_info = $conn->query("SELECT id, company, vacancy, city, search, web, web_link, politely, professionally, interested, operatively, conformity, communication, salary, other1, other2, other3, status, manager, date FROM vacs WHERE search='$search_name' AND (status='on' OR status='archive')");
            while ($row_vac_info = $vac_info->fetch_assoc()) {
                $politely_score = $row_vac_info["politely"] * 1;
                $professionally_score = $row_vac_info["professionally"] * 1.5;
                $interested_score = $row_vac_info["interested"] * 2;
                $operatively_score = $row_vac_info["operatively"] * 2.5;
                $conformity_score = $row_vac_info["conformity"] * 3;
                $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
                echo "<div class='blok9'><center>", $row_vac_info["vacancy"]. "<br>" .$row_vac_info["company"]. ",&ensp;" .$row_vac_info["city"]. "<br><br><div class='blok10'>" .$general_score. "&ensp;/&ensp;100</div>" . "<div class='blok11'>(Ввічливість:&nbsp;" .$politely_score. "/10;&ensp;Професійність:&nbsp;" .$professionally_score. "/15;&ensp;Зацікавленість:&nbsp;" .$interested_score. "/20;&ensp;Оперативність:&nbsp;" .$operatively_score. "/25;&ensp;Відповідність:&nbsp;" .$conformity_score. "/30)</div><br>" .$row_vac_info["salary"]. "<br><div class='blok11'>першочергова форма комунікації: " .$row_vac_info["communication"]. "<br></div>" . '<a href="'.$row_vac_info["web_link"].'" target="_blank ">Відкрити вакансію на '.$row_vac_info["web"].'</a>';}}
            else{echo "<center><div class='blok9'>Вказаної вакансії не існує!</div></center><br>";}}
        else{echo "<center><div class='blok9'>Не обрано вакансію!</div></center><br>";}
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