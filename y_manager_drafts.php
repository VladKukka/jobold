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
        <title>Чернетки - Менеджер</title>
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
        <a class="btn4" href="y_manager_home.php">На головну</a>
    </div>
    
    
<!--FORM-->  
    <?php
    $vac_info = $conn->query("SELECT id, company, vacancy, city, search, web, web_link, politely, professionally, interested, operatively, conformity, communication, salary, other1, other2, other3, status, manager, date FROM vacs WHERE manager='$user_name' AND status='draft'");
    while ($row_vac_info = $vac_info->fetch_assoc()) {
    echo "<center><div class='blok8'><a name='".$row_vac_info["id"]."'></a>";
        echo "".$row_vac_info["id"].",&ensp;".$row_vac_info["manager"].",&ensp;".$row_vac_info["date"]."<br>";
        echo '<a href="'.$row_vac_info["web_link"].'" target="_blank ">Відкрити вакансію на '.$row_vac_info["web"].'</a>';
        echo "<form method='post' action='yy_exe.php'>
            <input class='form_place2' type='hidden' name='id' value='".$row_vac_info["id"]."' required><br>
            <input class='form_place2' type='hidden' name='user_name' value='".$user_name."' required><br>
            <input class='form_place2' type='text' name='web_link' value='".$row_vac_info["web_link"]."' required><br>
            <input class='form_place2' type='text' name='vacancy_name' value='".$row_vac_info["vacancy"]."' required><br>
            <input class='form_place2' type='text' name='company_name' value='".$row_vac_info["company"]."' required><br>
            <input class='form_place2' type='text' name='city_name' value='".$row_vac_info["city"]."' required><br>
            <select class='form_place2' size='1' name='web'>
                <option disabled>Сайт пошуку роботи</option>
                <option selected value='".$row_vac_info["web"]."'>".$row_vac_info["web"]."</option>
                <option value='Work.ua'>Work.ua</option>
                <option value='Rabota.ua'>Rabota.ua</option>
                <option value='Ua.jooble.org'>Ua.jooble.org</option>
            </select><br>
            <select class='form_place3' size='1' name='politely'>
                <option disabled>Ввічливість</option>
                <option selected value='".$row_vac_info["politely"]."'>".$row_vac_info["politely"]."</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
            </select>
            <select class='form_place3' size='1' name='professionally'>
                <option disabled>Професійність</option>
                <option selected value='".$row_vac_info["professionally"]."'>".$row_vac_info["professionally"]."</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
            </select>
            <select class='form_place3' size='1' name='interested'>
                <option disabled>Зацікавленість</option>
                <option selected value='".$row_vac_info["interested"]."'>".$row_vac_info["interested"]."</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
            </select>
            <select class='form_place3' size='1' name='operatively'>
                <option disabled>Оперативність</option>
                <option selected value='".$row_vac_info["operatively"]."'>".$row_vac_info["operatively"]."</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
            </select>
            <select class='form_place3' size='1' name='conformity'>
                <option disabled>Відповідність</option>
                <option selected value='".$row_vac_info["conformity"]."'>".$row_vac_info["conformity"]."</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
            </select><br>
            <select class='form_place2' size='1' name='communication'>
                <option disabled>Метод комунікації роботодавця</option>
                <option selected value='".$row_vac_info["communication"]."'>".$row_vac_info["communication"]."</option>
                <option value='Сайт пошуку роботи'>Сайт пошуку роботи</option>
                <option value='Viber'>Viber</option>
                <option value='Telegram'>Telegram</option>
                <option value='WhatsApp'>WhatsApp</option>
                <option value='Електронна пошта'>Електронна пошта</option>
                <option value='Телефон'>Телефон</option>
            </select><br>
            <select class='form_place2' size='1' name='salary'>
                <option disabled>Відповідність зарплати згідно оголошення</option>
                <option selected value='".$row_vac_info["salary"]."'>".$row_vac_info["salary"]."</option>
                <option value='Заробітна плата відповідає заявленій'>Заробітна плата відповідає заявленій</option>
                <option value='Заробітна плата не оголошується роботодавцем до співбесіди'>Заробітна плата не оголошується роботодавцем до співбесіди</option>
                <option value='Заробітна плата дещо не відповідає заявленій'>Заробітна плата дещо не відповідає заявленій</option>
                <option value='Заробітна плата зовсім не відповідає заявленій (менша)'>Заробітна плата зовсім не відповідає заявленій (менша)</option>
            </select><br>
            <select class='form_place4' size='1' name='status'>
                <option disabled>Статус нової вакансії</option>
                <option selected value='".$row_vac_info["status"]."'>".$row_vac_info["status"]."</option>
                <option value='edit'>Редактура</option>
                <option value='on'>Публікація</option>
                <option value='off'>Видалити</option>
            </select>
            <input type='submit' class='form_btn1' name='enter_draft_admin' value='Зберегти'>
        </form><br>
    </div></center>";}
    ?>
    
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="y_manager_out.php">Вийти</a>
    </div>
    
    
    
    </body>
</html>