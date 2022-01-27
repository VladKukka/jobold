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
        <title>Ролі - Менеджер</title>
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
        <a class="btn4" href="y_manager_home.php">На головну</a>
    </div>
    
    
<!--TEXT-->    
    <div class="text_zone3">
        Тут ви маєте можливість переглянути свої нинішні (актуальні) ролі - згідно яких вам слід розробити Історію та Резюме. Також - ви за бажанням маєте можливість завантажити розроблені резюме сюди - і потім за потреби завантажувати їх на свій пристрій.     
    </div>
    
    
<!--Documents-->
    <center><div class="blok8">
        <div class="text_zone5">
            <center><b>Ваші ролі:</b></center><br>
            <?php
            $gd_files = $conn->query("SELECT role1, role2, role3, role4, role5 FROM manager WHERE login='$user_name'");
            while ($row_gd_files = $gd_files->fetch_assoc()) {
                
                    $role1  = $row_gd_files["role1"];
                    $role2  = $row_gd_files["role2"];
                    $role3  = $row_gd_files["role3"];
                    $role4  = $row_gd_files["role4"];
                    $role5  = $row_gd_files["role5"];
                
                if(($role1 == "none")&&($role2 == "none")&&($role3 == "none")&&($role4 == "none")&&($role5 == "none")){
                    echo "<center>", "Жодної ролі не визначено" . "</center><br>";}
                
                if(($role1 != "none")&&($role2 == "none")&&($role3 == "none")&&($role4 == "none")&&($role5 == "none")){ 
                    echo "<center>", $role1 . "</center><br>";}
                
                if(($role1 != "none")&&($role2 != "none")&&($role3 == "none")&&($role4 == "none")&&($role5 == "none")){
                    echo "<center>", $role1 . ", " . $role2 . "</center><br>";}
                
                if(($role1 != "none")&&($role2 != "none")&&($role3 != "none")&&($role4 == "none")&&($role5 == "none")){
                    echo "<center>", $role1 . ", " . $role2 . ", " . $role3 . "</center><br>";}
                
                if(($role1 != "none")&&($role2 != "none")&&($role3 != "none")&&($role4 != "none")&&($role5 == "none")){
                    echo "<center>", $role1 . ", " . $role2 . ", " . $role3 . ", " . $role4 . "</center><br>";}
                
                if(($role1 != "none")&&($role2 != "none")&&($role3 != "none")&&($role4 != "none")&&($role5 != "none")){
                    echo "<center>", $role1 . ", " . $role2 . ", " . $role3 . ", " . $role4 . ", " . $role5 . "</center><br>";}}
            ?>
            </div>
    </div></center>
    
    
<!--Documents-->
    <center><div class="blok8">
        <div class="text_zone5">
            <center><b>Ваші файли (Резюме):</b></center><br>
            <?php
            $gd_files = $conn->query("SELECT name_files, file_body FROM files WHERE login='$user_name'");
            while ($row_gd_files = $gd_files->fetch_assoc()) {
                $name_files  = $row_gd_files["name_files"];
                $file_body  = $row_gd_files["file_body"];
                echo "<center>", '<a href="'.$file_body.'" target="_blank ">"'.$name_files.'"</a>', "</center><br>";}
            ?>
        </div>
        </div></center>

    
<!--FORM-->  
    <center><div class="blok8">
    <center><form method="post" action="yy_exe.php" enctype="multipart/form-data">
        <input class="form_place2" type="hidden" name="user_name" minlength="3"  value="<?php echo $user_name; ?>" required>
        <input class="form_place2" type="text" name="name_files" minlength="3"  placeholder="Назва файлу (Резюме)" required><br>
        <input class="form_place2" type="file" name="file_body" required><br>
        <input class="form_btn1" type="submit" name="enter_new_file" value="Завантажити" />
        </form></center>
        </div></center>
  
    
<!--FOOTER-->  
    <div class="blok3">
        <a class="btn2" href="y_manager_out.php">Вийти</a>
    </div>

    
    </body>
</html>