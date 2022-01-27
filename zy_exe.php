<?php

include ('jobold_db.php');


if (isset($_POST['enter_signin'])) {
    
    $login_signin = $_POST['login_signin'];
    $password_signin = $_POST['password_signin'];
    
    $admin = $login_signin;
    
    $hash = "SELECT password FROM admin WHERE login='$login_signin'";
    $result = $conn->query($hash);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hash2 = $row["password"];}}
    
    $uniq_login1 = $conn->query("SELECT * FROM admin WHERE login = '$login_signin'");
    $res1 = $uniq_login1->num_rows;
    
    if($res1 > 0) {
        
        if (password_verify($password_signin, $hash2)) {
            echo "<script>location.href='z_admin_home.php';</script>";
            session_start();
            $_SESSION['admin'] = $admin;
        } else {
            echo "<script>alert('Введений Пароль - невірний, спробуйте ще!');location.href='z_admin_signin.php';</script>";}} 
    else {
        echo "<script>alert('Адміністратора з таким логіном не зареєстровано! Спробуйте інший логін.');location.href='z_admin_signin.php';</script>";}}



if(isset($_POST['enter_new_team'])) {
    
    $login_new_team = $_POST['login_new_team'];
    $pass_new_team = $_POST['pass_new_team'];
    $hash_password = password_hash($pass_new_team, PASSWORD_DEFAULT);
    $position_new_team = $_POST['position_new_team'];
    $role1_new_team = $_POST['role1_new_team'];
    $role2_new_team = $_POST['role2_new_team'];
    $role3_new_team = $_POST['role3_new_team'];
    $role4_new_team = $_POST['role4_new_team'];
    $role5_new_team = $_POST['role5_new_team'];
    $status = "on";
     
    $uniq_login1 = $conn->query("SELECT * FROM manager WHERE login = '$login_new_team'");
    $res1 = $uniq_login1->num_rows;
    $uniq_login2 = $conn->query("SELECT * FROM editor WHERE login = '$login_new_team'");
    $res2 = $uniq_login2->num_rows; 
    
    if(($res1 == 0)&&($res2 == 0)) {
        
        if($position_new_team == "manager"){$conn->query("INSERT INTO manager(login, password, status, role1, role2, role3, role4, role5) VALUE('$login_new_team', '$hash_password', '$status', '$role1_new_team', '$role2_new_team', '$role3_new_team', '$role4_new_team', '$role5_new_team')");}
        
        if($position_new_team == "editor"){$conn->query("INSERT INTO editor(login, password, status, role1, role2, role3, role4, role5) VALUE('$login_new_team', '$hash_password', '$status', '$role1_new_team', '$role2_new_team', '$role3_new_team', '$role4_new_team', '$role5_new_team')");}
        
        echo "<script>location.href='z_admin_team.php';</script>"; }
    
    else { echo "<script>alert('Учасник з таким логіном вже існує!');location.href='z_admin_team.php';</script>"; }}



if(isset($_POST['enter_edit_team_m'])) {
    
    if(isset($_POST['pass_new_team'])) {
    
    $id = $_POST['id'];
    $pass_new_team = $_POST['pass_new_team'];
    $hash_password = password_hash($pass_new_team, PASSWORD_DEFAULT);
    $role1_new_team = $_POST['role1_new_team'];
    $role2_new_team = $_POST['role2_new_team'];
    $role3_new_team = $_POST['role3_new_team'];
    $role4_new_team = $_POST['role4_new_team'];
    $role5_new_team = $_POST['role5_new_team'];
    $status = $_POST['status'];;
        
        $conn->query("UPDATE manager SET password='$hash_password', status='$status', role1='$role1_new_team', role2='$role2_new_team', role3='$role3_new_team', role4='$role4_new_team', role5='$role5_new_team' WHERE id='$id'");
        echo "<script>location.href='z_admin_team.php';</script>";}
    
    else{
        
    $id = $_POST['id'];    
    $role1_new_team = $_POST['role1_new_team'];
    $role2_new_team = $_POST['role2_new_team'];
    $role3_new_team = $_POST['role3_new_team'];
    $role4_new_team = $_POST['role4_new_team'];
    $role5_new_team = $_POST['role5_new_team'];
    $status = $_POST['status'];;
        
        $conn->query("UPDATE manager SET status='$status', role1='$role1_new_team', role2='$role2_new_team', role3='$role3_new_team', role4='$role4_new_team', role5='$role5_new_team' WHERE id='$id'");
        echo "<script>location.href='z_admin_team.php';</script>";}}



if(isset($_POST['enter_edit_team_e'])) {
    
    if(isset($_POST['pass_new_team'])) {
    
    $id = $_POST['id'];
    $pass_new_team = $_POST['pass_new_team'];
    $hash_password = password_hash($pass_new_team, PASSWORD_DEFAULT);
    $role1_new_team = $_POST['role1_new_team'];
    $role2_new_team = $_POST['role2_new_team'];
    $role3_new_team = $_POST['role3_new_team'];
    $role4_new_team = $_POST['role4_new_team'];
    $role5_new_team = $_POST['role5_new_team'];
    $status = $_POST['status'];;
     
        $conn->query("UPDATE editor SET password='$hash_password', status='$status', role1='$role1_new_team', role2='$role2_new_team', role3='$role3_new_team', role4='$role4_new_team', role5='$role5_new_team' WHERE id='$id'");
        echo "<script>location.href='z_admin_team.php';</script>"; }
    
    else{
    
    $id = $_POST['id'];    
    $role1_new_team = $_POST['role1_new_team'];
    $role2_new_team = $_POST['role2_new_team'];
    $role3_new_team = $_POST['role3_new_team'];
    $role4_new_team = $_POST['role4_new_team'];
    $role5_new_team = $_POST['role5_new_team'];
    $status = $_POST['status'];;
     
        $conn->query("UPDATE editor SET status='$status', role1='$role1_new_team', role2='$role2_new_team', role3='$role3_new_team', role4='$role4_new_team', role5='$role5_new_team' WHERE id='$id'");
        echo "<script>location.href='z_admin_team.php';</script>"; }}
    
    
    
    
if (isset($_POST['enter_newvac_admin'])) {
    
    $status_user = $conn->query("SELECT status FROM admin");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $user_name = $_POST['user_name'];
        
        $company_name = nl2br($_POST['company_name']);
        $company_name = mysqli_real_escape_string($conn, $company_name);
        $vacancy_name = nl2br($_POST['vacancy_name']);
        $vacancy_name = mysqli_real_escape_string($conn, $vacancy_name);
        $city_name = nl2br($_POST['city_name']);
        $city_name = mysqli_real_escape_string($conn, $city_name);
        
        $search = $vacancy_name.", ".$company_name.", ".$city_name; 
        
        $web = $_POST['web'];
        $web_link = $_POST['web_link'];
        
        $politely = $_POST['politely'];
        $professionally = $_POST['professionally'];
        $interested = $_POST['interested'];
        $operatively = $_POST['operatively'];
        $conformity = $_POST['conformity'];
            $politely_score = $_POST["politely"] * 1;
            $professionally_score = $_POST["professionally"] * 1.5;
            $interested_score = $_POST["interested"] * 2;
            $operatively_score = $_POST["operatively"] * 2.5;
            $conformity_score = $_POST["conformity"] * 3;
        $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
        
        $communication = $_POST['communication'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        
        $other1 = "none";
        $other2 = "none";
        $other3 = "none";
        
        $date_today = (date("d.m.Y,H.i.s", strtotime("+3 hours")));
        
        $status2 = "archive";
        
        if($status == "on"){
            $conn->query("INSERT INTO vacs(company, vacancy, city, search, web, web_link, politely, professionally, interested, operatively, conformity, general_score, communication, salary, other1, other2, other3, status, manager, date) VALUE('$company_name', '$vacancy_name', '$city_name', '$search', '$web', '$web_link', '$politely', '$professionally', '$interested', '$operatively', '$conformity', '$general_score', '$communication', '$salary', '$other1', '$other2', '$other3', '$status', '$user_name', '$date_today')");
            $conn->query("CREATE EVENT `$user_name.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE manager='$user_name' AND date='$date_today';");
            echo "<script>location.href='z_admin_newvac.php';</script>";}
        
        else{
            $conn->query("INSERT INTO vacs(company, vacancy, city, search, web, web_link, politely, professionally, interested, operatively, conformity, general_score, communication, salary, other1, other2, other3, status, manager, date) VALUE('$company_name', '$vacancy_name', '$city_name', '$search', '$web', '$web_link', '$politely', '$professionally', '$interested', '$operatively', '$conformity', '$general_score', '$communication', '$salary', '$other1', '$other2', '$other3', '$status', '$user_name', '$date_today')");
            echo "<script>location.href='z_admin_newvac.php';</script>";}}}



if (isset($_POST['enter_draft_admin'])) {
    
    $status_user = $conn->query("SELECT status FROM admin");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $id = $_POST['id'];
        
        $company_name = nl2br($_POST['company_name']);
        $company_name = mysqli_real_escape_string($conn, $company_name);
        $vacancy_name = nl2br($_POST['vacancy_name']);
        $vacancy_name = mysqli_real_escape_string($conn, $vacancy_name);
        $city_name = nl2br($_POST['city_name']);
        $city_name = mysqli_real_escape_string($conn, $city_name);
        
        $search = $vacancy_name.", ".$company_name.", ".$city_name; 
        
        $web = $_POST['web'];
        $web_link = $_POST['web_link'];
        
        $politely = $_POST['politely'];
        $professionally = $_POST['professionally'];
        $interested = $_POST['interested'];
        $operatively = $_POST['operatively'];
        $conformity = $_POST['conformity'];
            $politely_score = $_POST["politely"] * 1;
            $professionally_score = $_POST["professionally"] * 1.5;
            $interested_score = $_POST["interested"] * 2;
            $operatively_score = $_POST["operatively"] * 2.5;
            $conformity_score = $_POST["conformity"] * 3;
        $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
        
        $communication = $_POST['communication'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        
        $other1 = "none";
        $other2 = "none";
        $other3 = "none";
        
        $date_today = (date("d.m.Y,H.i.s", strtotime("+3 hours")));
        
        $status2 = "archive";
        
        if($status == "on"){
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id' AND manager='$user_name'");
            $conn->query("CREATE EVENT `$user_name.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE manager='$user_name' AND date='$date_today';");
            echo "<script>location.href='z_admin_drafts.php#$id';</script>";}
        
        else{
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id' AND manager='$user_name'");
            echo "<script>location.href='z_admin_drafts.php#$id';</script>";}}}


if (isset($_POST['enter_edit_admin'])) {
    
    $status_user = $conn->query("SELECT status FROM admin");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $id = $_POST['id'];
        
        $company_name = nl2br($_POST['company_name']);
        $company_name = mysqli_real_escape_string($conn, $company_name);
        $vacancy_name = nl2br($_POST['vacancy_name']);
        $vacancy_name = mysqli_real_escape_string($conn, $vacancy_name);
        $city_name = nl2br($_POST['city_name']);
        $city_name = mysqli_real_escape_string($conn, $city_name);
        
        $search = $vacancy_name.", ".$company_name.", ".$city_name; 
        
        $web = $_POST['web'];
        $web_link = $_POST['web_link'];
        
        $politely = $_POST['politely'];
        $professionally = $_POST['professionally'];
        $interested = $_POST['interested'];
        $operatively = $_POST['operatively'];
        $conformity = $_POST['conformity'];
            $politely_score = $_POST["politely"] * 1;
            $professionally_score = $_POST["professionally"] * 1.5;
            $interested_score = $_POST["interested"] * 2;
            $operatively_score = $_POST["operatively"] * 2.5;
            $conformity_score = $_POST["conformity"] * 3;
        $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
        
        $communication = $_POST['communication'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        
        $other1 = "none";
        $other2 = "none";
        $other3 = "none";
        
        $date_today = (date("d.m.Y,H.i.s", strtotime("+3 hours")));
        
        $status2 = "archive";
        
        if($status == "on"){
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            $conn->query("CREATE EVENT `$id.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE id='$id' AND date='$date_today';");
            echo "<script>location.href='z_admin_edits.php#$id';</script>";}
        
        else{
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            echo "<script>location.href='z_admin_edits.php#$id';</script>";}}}



if (isset($_POST['enter_edit_admin2'])) {
    
    $status_user = $conn->query("SELECT status FROM admin");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $id = $_POST['id'];
        
        $company_name = nl2br($_POST['company_name']);
        $company_name = mysqli_real_escape_string($conn, $company_name);
        $vacancy_name = nl2br($_POST['vacancy_name']);
        $vacancy_name = mysqli_real_escape_string($conn, $vacancy_name);
        $city_name = nl2br($_POST['city_name']);
        $city_name = mysqli_real_escape_string($conn, $city_name);
        
        $search = $vacancy_name.", ".$company_name.", ".$city_name; 
        
        $web = $_POST['web'];
        $web_link = $_POST['web_link'];
        
        $politely = $_POST['politely'];
        $professionally = $_POST['professionally'];
        $interested = $_POST['interested'];
        $operatively = $_POST['operatively'];
        $conformity = $_POST['conformity'];
            $politely_score = $_POST["politely"] * 1;
            $professionally_score = $_POST["professionally"] * 1.5;
            $interested_score = $_POST["interested"] * 2;
            $operatively_score = $_POST["operatively"] * 2.5;
            $conformity_score = $_POST["conformity"] * 3;
        $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
        
        $communication = $_POST['communication'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        
        $other1 = "none";
        $other2 = "none";
        $other3 = "none";
        
        $date_today = (date("d.m.Y,H.i.s", strtotime("+3 hours")));
        
        $status2 = "archive";
        
        if($status == "on"){
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            $conn->query("CREATE EVENT `$id.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE id='$id' AND date='$date_today';");
            echo "<script>location.href='z_admin_edits2.php#$id';</script>";}
        
        else{
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            echo "<script>location.href='z_admin_edits2.php#$id';</script>";}}}



if (isset($_POST['enter_archive_admin'])) {
    
    $status_user = $conn->query("SELECT status FROM admin");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $id = $_POST['id'];
        
        $company_name = nl2br($_POST['company_name']);
        $company_name = mysqli_real_escape_string($conn, $company_name);
        $vacancy_name = nl2br($_POST['vacancy_name']);
        $vacancy_name = mysqli_real_escape_string($conn, $vacancy_name);
        $city_name = nl2br($_POST['city_name']);
        $city_name = mysqli_real_escape_string($conn, $city_name);
        
        $search = $vacancy_name.", ".$company_name.", ".$city_name; 
        
        $web = $_POST['web'];
        $web_link = $_POST['web_link'];
        
        $politely = $_POST['politely'];
        $professionally = $_POST['professionally'];
        $interested = $_POST['interested'];
        $operatively = $_POST['operatively'];
        $conformity = $_POST['conformity'];
            $politely_score = $_POST["politely"] * 1;
            $professionally_score = $_POST["professionally"] * 1.5;
            $interested_score = $_POST["interested"] * 2;
            $operatively_score = $_POST["operatively"] * 2.5;
            $conformity_score = $_POST["conformity"] * 3;
        $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
        
        $communication = $_POST['communication'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        
        $other1 = "none";
        $other2 = "none";
        $other3 = "none";
        
        $date_today = (date("d.m.Y,H.i.s", strtotime("+3 hours")));
        
        $status2 = "archive";
        
        if($status == "on"){
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            $conn->query("CREATE EVENT `$id.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE id='$id' AND date='$date_today';");
            echo "<script>location.href='z_admin_archive.php#$id';</script>";}
        
        else{
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            echo "<script>location.href='z_admin_archive.php#$id';</script>";}}}



if (isset($_POST['enter_delete_admin'])) {
    
    $status_user = $conn->query("SELECT status FROM admin");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $id = $_POST['id'];
        
        $company_name = nl2br($_POST['company_name']);
        $company_name = mysqli_real_escape_string($conn, $company_name);
        $vacancy_name = nl2br($_POST['vacancy_name']);
        $vacancy_name = mysqli_real_escape_string($conn, $vacancy_name);
        $city_name = nl2br($_POST['city_name']);
        $city_name = mysqli_real_escape_string($conn, $city_name);
        
        $search = $vacancy_name.", ".$company_name.", ".$city_name; 
        
        $web = $_POST['web'];
        $web_link = $_POST['web_link'];
        
        $politely = $_POST['politely'];
        $professionally = $_POST['professionally'];
        $interested = $_POST['interested'];
        $operatively = $_POST['operatively'];
        $conformity = $_POST['conformity'];
           $politely_score = $_POST["politely"] * 1;
            $professionally_score = $_POST["professionally"] * 1.5;
            $interested_score = $_POST["interested"] * 2;
            $operatively_score = $_POST["operatively"] * 2.5;
            $conformity_score = $_POST["conformity"] * 3;
        $general_score = $politely_score + $professionally_score + $interested_score + $operatively_score + $conformity_score;
        
        $communication = $_POST['communication'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        
        $other1 = "none";
        $other2 = "none";
        $other3 = "none";
        
        $date_today = (date("d.m.Y,H.i.s", strtotime("+3 hours")));
        
        $status2 = "archive";
        
        if($status == "on"){
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            $conn->query("CREATE EVENT `$id.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE id='$id' AND date='$date_today';");
            echo "<script>location.href='z_admin_deleted.php#$id';</script>";}
        
        else{
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id'");
            echo "<script>location.href='z_admin_deleted.php#$id';</script>";}}}
    
     
    
    
	
?>