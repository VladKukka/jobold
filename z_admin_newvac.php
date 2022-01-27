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
        <title>Додати вакансію - Адмін</title>
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
      
<body class="body_work">
    
    
<!--BTNs-->    
    <div class="blok7">
        <a class="btn4" href="z_admin_home.php">На головну</a>
    </div>
    
    
<!--TEXT-->    
    <div class="text_zone3">
        Введіть необхідні дані та збережіть нову вакансію. При цьому - ви можете спочатку не змінювати статус на Публікація - і нова вакансія буде доступною в Чернетках, де ви згодом зможете додати дані (редагувати) і опублікувати вакансію.     
    </div>
    
    
<!--FORM-->  
    <center>
        <form method="post" action="zy_exe.php">
            <input class="form_place2" type="hidden" name="user_name" value="admin" required><br>
            <input class="form_place2" type="text" name="web_link" placeholder="Посилання на вакансію" required><br>
            <input class="form_place2" type="text" name="vacancy_name" placeholder="Назва вакансії" required><br>
            <input class="form_place2" type="text" name="company_name" placeholder="Назва роботодавця" required><br>
            <input class="form_place2" type="text" name="city_name" placeholder="Назва міста" required><br>
            <select class="form_place2" size="1" name="web">
                <option disabled>Сайт пошуку роботи</option>
                <option selected value="Work.ua">Work.ua</option>
                <option value="Rabota.ua">Rabota.ua</option>
                <option value="Ua.jooble.org">Ua.jooble.org</option>
            </select><br>
            <select class="form_place3" size="1" name="politely">
                <option disabled>Ввічливість</option>
                <option selected value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <select class="form_place3" size="1" name="professionally">
                <option disabled>Професійність</option>
                <option selected value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <select class="form_place3" size="1" name="interested">
                <option disabled>Зацікавленість</option>
                <option selected value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <select class="form_place3" size="1" name="operatively">
                <option disabled>Оперативність</option>
                <option selected value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <select class="form_place3" size="1" name="conformity">
                <option disabled>Відповідність</option>
                <option selected value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select><br>
            <select class="form_place2" size="1" name="communication">
                <option disabled>Метод комунікації роботодавця</option>
                <option selected value="Сайт пошуку роботи">Сайт пошуку роботи</option>
                <option value="Viber">Viber</option>
                <option value="Telegram">Telegram</option>
                <option value="WhatsApp">WhatsApp</option>
                <option value="Електронна пошта">Електронна пошта</option>
                <option value="Телефон">Телефон</option>
            </select><br>
            <select class="form_place2" size="1" name="salary">
                <option disabled>Відповідність зарплати згідно оголошення</option>
                <option selected value="Заробітна плата відповідає заявленій">Заробітна плата відповідає заявленій</option>
                <option value="Заробітна плата не оголошується роботодавцем до співбесіди">Заробітна плата не оголошується роботодавцем до співбесіди</option>
                <option value="Заробітна плата дещо не відповідає заявленій">Заробітна плата дещо не відповідає заявленій</option>
                <option value="Заробітна плата зовсім не відповідає заявленій (менша)">Заробітна плата зовсім не відповідає заявленій (менша)</option>
            </select><br>
            <select class="form_place4" size="1" name="status">
                <option disabled>Статус нової вакансії</option>
                <option selected value="draft">Чернетка</option>
                <option value="edit">Редактура</option>
                <option value="on">Публікація</option>
            </select>
            <input type="submit" class="form_btn1" name="enter_newvac_admin" value="Зберегти">
        </form><br>
    </center>
    
    
<!--TEXT-->
    <center><div class="text_zone5">
       <h2>*</h2>
        <p><b>Ввічливість:</b> манери спілкування представників роботодавця відповідно до загальноприйнятих норм.</p>
        <p><b>Професійність:</b> якість наданих додаткових матеріалів, пояснень представника роботодавця тощо.</p>
        <p><b>Зацікавленість:</b> рівень зацікавленості у кожному з кандидатів - тих, хто відгукнувся на вакансію.</p>
        <p><b>Оперативність:</b> швидкість відповіді на відгук кандидата, швидкість наступних відповідей при постановленні додаткових питань.</p>
        <p><b>Відповідність:</b> рівень відповідності опису вакансії - реальним умовам - вимоги, графік, заробітна плата, гарантії та компенсації тощо.</p>
    </div></center>
    
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="z_admin_out.php">Вийти</a>
    </div> 

    
    </body>
</html>