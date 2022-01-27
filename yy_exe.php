<?php

include ('jobold_db.php');


if (isset($_POST['enter_signin'])) {
    
    $login_signin = $_POST['login_signin'];
    $password_signin = $_POST['password_signin'];
    
    $manager = $login_signin;
    
    $hash = "SELECT password FROM manager WHERE login='$login_signin'";
    $result = $conn->query($hash);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hash2 = $row["password"];}}
    
    $uniq_login1 = $conn->query("SELECT * FROM manager WHERE login = '$login_signin'");
    $res1 = $uniq_login1->num_rows;
    
    if($res1 > 0) {
        
        if (password_verify($password_signin, $hash2)) {
            echo "<script>location.href='y_manager_home.php';</script>";
            session_start();
            $_SESSION['manager'] = $manager;
        } else {
            echo "<script>alert('Введений Пароль - невірний, спробуйте ще!');location.href='y_manager_signin.php';</script>";}} 
    else {
        echo "<script>alert('Менеджера з таким логіном не зареєстровано! Спробуйте інший логін.');location.href='y_manager_signin.php';</script>";}}


if (isset($_POST['enter_newvac_admin'])) {
    
    $user_name = $_POST['user_name'];
    
    $status_user = $conn->query("SELECT status FROM manager WHERE login='$user_name'");
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
            echo "<script>location.href='y_manager_newvac.php';</script>";}
        
        else{
            $conn->query("INSERT INTO vacs(company, vacancy, city, search, web, web_link, politely, professionally, interested, operatively, conformity, general_score, communication, salary, other1, other2, other3, status, manager, date) VALUE('$company_name', '$vacancy_name', '$city_name', '$search', '$web', '$web_link', '$politely', '$professionally', '$interested', '$operatively', '$conformity', '$general_score', '$communication', '$salary', '$other1', '$other2', '$other3', '$status', '$user_name', '$date_today')");
            echo "<script>location.href='y_manager_newvac.php';</script>";}}
else {echo "<script>alert('Ваш профіль менеджера заблоковано Адміністратором!');location.href='y_manager_home.php';</script>";}}



if (isset($_POST['enter_draft_admin'])) {
    
    $user_name = $_POST['user_name'];
    
    $status_user = $conn->query("SELECT status FROM manager WHERE login='$user_name'");
    while ($row = $status_user->fetch_assoc()) {
        $status_user_row = $row["status"];}
    
    if($status_user_row == "on") {
        
        $id = $_POST['id'];
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
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id' AND manager='$user_name'");
            $conn->query("CREATE EVENT `$user_name.event.$date_today` ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY ON COMPLETION NOT PRESERVE DO UPDATE vacs SET status='$status2' WHERE id='$id' AND date='$date_today';");
            echo "<script>location.href='y_manager_drafts.php#$id';</script>";}
        
        else{
            $conn->query("UPDATE vacs SET company='$company_name', vacancy='$vacancy_name', city='$city_name', search='$search', web='$web', web_link='$web_link', politely='$politely', professionally='$professionally', interested='$interested', operatively='$operatively', conformity='$conformity', general_score='$general_score', communication='$communication', salary='$salary', other1='$other1', other2='$other2', other3='$other3', status='$status', date='$date_today' WHERE id='$id' AND manager='$user_name'");
            echo "<script>location.href='y_manager_drafts.php#$id';</script>";}}

else {echo "<script>alert('Ваш профіль менеджера заблоковано Адміністратором!');location.href='y_manager_home.php';</script>";}}




if (isset($_POST['enter_new_file'])) {
    
    $user_name = $_POST['user_name'];
    $name_files = $_POST['name_files'];
    $date = (date("d.m.Y,H.i.s", strtotime("+3 hours")));

    $download_new_file = $_FILES['file_body']['name'];
    $destination1 = 'corpfiles/'.$download_new_file.''.$date;
    $extension1 = pathinfo($download_new_file, PATHINFO_EXTENSION);
    $file1 = $_FILES['file_body']['tmp_name'];
    $size1 = $_FILES['file_body']['size'];
    if (!in_array($extension1, ['pdf', 'p7s'])) {
        echo "Файл лише такого формату: .pdf, .p7s";
    } elseif ($_FILES['file_body']['size'] > 10485760) { 
        echo "Розмір файлу більше 10 Мб!";
    } else {
        if (move_uploaded_file($file1, $destination1)) {
            $sql1 = "INSERT INTO files(login, name_files, file_body, date) VALUE('$user_name', '$name_files', '$destination1', '$date')";
            if (mysqli_query($conn, $sql1)) {
                echo "<script>location.href='y_manager_roles.php';</script>";}}}}



	
?>