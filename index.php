<?php

include ('jobold_db.php');

?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title>Jobold</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/jobold_ui.css">
        
        <meta name="description" content="Сервіс перевірки та оцінки відкритих вакансій компаній України - за допомогою, так званих, Таємних кандидатів. Інформація подається максимально відкрито та просто - у наглядному вигляді - цифри. Без суб’єктивних суджень та висновків.">
        <meta name="robots" content="index" />
        <meta name="keywords" content="робота, пошук роботи, вакансія, роботодавці, працівники, співбесіда, сайт пошуку роботи" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Copyright" content="Jobold">
        
        <link rel="shortcut icon" sizes="16x16 32x32 64x64" href="images/logo/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="images/pwa/192x192.png">
        <link rel='manifest' href='/manifest.json'>
        <script type="module" src="https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall"></script>
        
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
    
    
<body>
    
        
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
    
    
<!--HEADER
    <div class="blok1"> 
        <div class="blok2"><center><a class="btn1" href="index.php">Jobold</a></center></div>
    </div>-->

    
<!--FORM-->  
    <center>
        <form method="post" action="x_vacancy.php">
            <div class="text_zone1">JOBOLD</div><br>
            <input class="form_place1" list="dlist" name="search_name" placeholder="Почніть вводити назву роботодавця або вакансії - і оберіть з випадаючого списку" required>
            <?php  
            $search = $conn->query("SELECT search FROM vacs WHERE status='on' ORDER BY search"); 
            echo "<datalist id='dlist'>";
            while ($row_search = mysqli_fetch_array($search)) {
                echo "<option value='".$row_search['search']."'>"."</option>";
            }
            echo "</datalist><br>";
            ?>
            <input type="submit" class="form_btn1" name="enter_search" value="Переглянути">
        </form><br>
    </center>
   
 
 <!--BTNs-->    
    <div class="blok5">
        <a class="btn3" href="x_list.php">Список</a>
        <a class="btn3" href="x_archive.php">Архів</a>
        <a class="btn3" href="codeception/code/toupper.html">TESTING</a>
        <a class="btn3" href="codeception/code/tests/ToupperCept.php">A</a>
    </div>
    
    
<!--BTNs-->  
    <div class="blok5">
        <a href="x_faq.php">Як це працює?</a>
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