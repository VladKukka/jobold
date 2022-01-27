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
        <title>Команда - Адмін</title>
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
    
    
<!--MENU-->
    <div class="blok17">
        <div class="blok18">
            <button class="btn5" onclick="openblok(event, 'menu_btn1')">Додати</button>
            <button class="btn5" onclick="openblok(event, 'menu_btn2')"id="defaultOpen">Редагувати</button>
        </div>  
        
        
<!--NEW_TEAMMATE-->  
        <div class="blok19">
            <div id="menu_btn1" class="menu_content">
                <center>
                    <form method="post" action="zy_exe.php">
                        <div class="text_zone4">Додати учасника Команди</div><br>
                        <select class="form_place1" size="1" name="position_new_team">
                            <option disabled>Оберіть посаду нового учасника:</option>
                            <option selected value="manager">Менеджер</option>
                            <option value="editor">Редактор</option>
                        </select><br>
                        <input class="form_place1" type="text" name="login_new_team" placeholder="Логін" required><br>
                        <input class="form_place1" type="password" name="pass_new_team" placeholder="Пароль" required><br>
                        <input class="form_place1" type="text" name="role1_new_team" value="none" required><br>
                        <input class="form_place1" type="text" name="role2_new_team" value="none" required><br>
                        <input class="form_place1" type="text" name="role3_new_team" value="none" required><br>
                        <input class="form_place1" type="text" name="role4_new_team" value="none" required><br>
                        <input class="form_place1" type="text" name="role5_new_team" value="none" required><br>
                        
                        <input type="submit" class="form_btn1" name="enter_new_team" value="Створити">
                    </form><br>
                </center>
            </div>
        </div>
        
        
<!--NEW_TEAMMATE-->  
        <div class="blok19">
            <div id="menu_btn2" class="menu_content">
                 
    <?php
    $team_info = $conn->query("SELECT id, login, password, status, role1, role2, role3, role4, role5 FROM manager");
    while ($row_team_info = $team_info->fetch_assoc()) {
    echo "<center><div class='blok8'><a name='".$row_team_info["id"]."'></a>";      
        echo "<form method='post' action='zy_exe.php'>
            <input class='form_place2' type='hidden' name='id' value='".$row_team_info["id"]."' required><br>
            <select class='form_place4' size='1' name='status'>
                <option disabled>Статус учасника</option>
                <option selected value='".$row_team_info["status"]."'>".$row_team_info["status"]."</option>
                <option value='on'>on</option>
                <option value='off'>off</option>
            </select><br>
            <input class='form_place2' type='text' name='login_new_team' value='".$row_team_info["login"]."' required readonly><br>
            <input class='form_place2' type='text' name='pass_new_team' placeholder='Новий пароль'><br>
            <input class='form_place2' type='text' name='role1_new_team' value='".$row_team_info["role1"]."' required><br>
            <input class='form_place2' type='text' name='role2_new_team' value='".$row_team_info["role2"]."' required><br>
            <input class='form_place2' type='text' name='role3_new_team' value='".$row_team_info["role3"]."' required><br>
            <input class='form_place2' type='text' name='role4_new_team' value='".$row_team_info["role4"]."' required><br>
            <input class='form_place2' type='text' name='role5_new_team' value='".$row_team_info["role5"]."' required><br>
            <input type='submit' class='form_btn1' name='enter_edit_team_m' value='Зберегти'>
        </form><br>
    </div></center>";}
    ?>
                
    <?php
    $team_info = $conn->query("SELECT id, login, password, status, role1, role2, role3, role4, role5 FROM editor");
    while ($row_team_info = $team_info->fetch_assoc()) {
    echo "<center><div class='blok8'><a name='".$row_team_info["id"]."'></a>";      
        echo "<form method='post' action='zy_exe.php'>
            <input class='form_place2' type='hidden' name='id' value='".$row_team_info["id"]."' required><br>
            <select class='form_place4' size='1' name='status'>
                <option disabled>Статус учасника</option>
                <option selected value='".$row_team_info["status"]."'>".$row_team_info["status"]."</option>
                <option value='on'>on</option>
                <option value='off'>off</option>
            </select><br>
            <input class='form_place2' type='text' name='login_new_team' value='".$row_team_info["login"]."' required readonly><br>
            <input class='form_place2' type='text' name='pass_new_team' placeholder='Новий пароль'><br>
            <input class='form_place2' type='text' name='role1_new_team' value='".$row_team_info["role1"]."' required><br>
            <input class='form_place2' type='text' name='role2_new_team' value='".$row_team_info["role2"]."' required><br>
            <input class='form_place2' type='text' name='role3_new_team' value='".$row_team_info["role3"]."' required><br>
            <input class='form_place2' type='text' name='role4_new_team' value='".$row_team_info["role4"]."' required><br>
            <input class='form_place2' type='text' name='role5_new_team' value='".$row_team_info["role5"]."' required><br>
            <input type='submit' class='form_btn1' name='enter_edit_team_e' value='Зберегти'>
        </form><br>
    </div></center>";}
    ?>
                
            </div>
        </div>
        
        
        <script>
        function openblok(evt, menu_data) {
            var i, menu_content, btn5;
            menu_content = document.getElementsByClassName("menu_content");
            for (i = 0; i < menu_content.length; i++) {
                menu_content[i].style.display = "none";
            }
            btn5 = document.getElementsByClassName("btn5");
            for (i = 0; i < btn5.length; i++) {
                btn5[i].className = btn5[i].className.replace(" active3", "");
            }
            document.getElementById(menu_data).style.display = "block";
            evt.currentTarget.className += " active3"}
        document.getElementById("defaultOpen").click();
        </script>
    
    </div>
    
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="z_admin_out.php">Вийти</a>
    </div> 
                
    
    </body>
</html>