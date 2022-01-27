<?php

include ('jobold_db.php');

?>


<!DOCTYPE HTML>
<html lang='uk'>
    
    <head>
        <title>Як це працює? - Jobold</title>
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
        <a class="btn3" href="x_list.php">Список</a>
        <a class="btn3" href="x_archive.php">Архів</a>
    </div>
    
    
<!--TEXT-->
    <center><div class="text_zone5">
       <h2>Інструкції</h2>
        <p><b>1.</b> JOBOLD - це допоміжний сервіс у питанні пошуку роботи, який орієнтується виключно на інформацію про вакансії роботодавців - представлених на різноманітних веб-ресурсах. Вся відображена інформація на jobold.com.ua - являється суб’єктивною оцінкою тієї чи іншої вакансії, з огляду на беспосередній контакт з представниками роботодавця під виглядом Таємного кандидата.</p>
        <p><b>2.</b> Таємними кандидатами являються не зацікавлені особи, які без упередженості до будь-якого з роботодавців намагаються дізнатися загальні відомості про ту чи іншу вакансію - шляхом відгуку на неї.</p>
        <p><b>3.</b> Мета JOBOLD - надати більше об’єктивної інформації про ту чи іншу вакансію, щоб процес пошуку роботи став більш раціональним та ефективним.</p>
        <p><b>4.</b> На Головній сторінці - кожен бажаючий (без будь-якої реєстрації, безкоштовно) - має змогу ввести назву вакансії чи роботодавця з того чи іншого веб-ресурсу (сайта пошуку роботи) і натиснувши Переглянути - ознайомитися з більш детальною інформацією. Такою інформацією - в першу чергу являється Загальна оцінка вакансії від JOBOLD, а також - додаткові дані.</p>
        <p><b>5.</b> Загальна оцінка формується на основі п’яти (5) блоків - Ввічливість (манери спілкування представників роботодавця відповідно до загальноприйнятих норм), Професійність (якість наданих додаткових матеріалів, пояснень представника роботодавця тощо), Зацікавленість (рівень зацікавленості у кожному з кандидатів - тих, хто відгукнувся на вакансію), Оперативність (швидкість відповіді на відгук кандидата, швидкість наступних відповідей при постановленні додаткових питань), Відповідність (рівень відповідності опису вакансії - реальним умовам - вимоги, графік, заробітна плата, гарантії та компенсації тощо). Кожен із цих блоків оцінюється Таємними кандидатами окремо, при чому - кожен з блоків має свій коефіцієнт важливості - 1; 1,5; 2; 2,5; 3 - відповідно.</p>
        <p><b>6.</b> Також, Таємними кандидатами зазначається на скільки заявлений рівень заробітної плати у описі вакансії на сайті пошуку роботи - відповідає дійсності, і окремо - який канал комунікаці в першу чергу обирає роботодавець. Тут варто зазначати - що у випадку контактування виключно через Telegram, Viber, WhatsApp - слід бути обачними та обережними.</p>
        <p><b>7.</b> Кожен користувач додатково може ознайомитися з усім списком актуальних вакансій на сторінці Список (де вакансії розташовані відповдіно до Загальної оцінки - від найбільшої до найменшої), а також з вакансіями, котрі втратили актуальність - на сторінці Архів (можна проаналізувати колишні вакансії роботодавця тощо).</p>
    </div></center>
    
    
     
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