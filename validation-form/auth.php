<?php 
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('remotemysql.com', 'KzxmCsv99W', 'Kz0rgSvacP', 'KzxmCsv99W');

    $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
    $user = $result->fetch_assoc();

    if(count($user)==0) {
        header('Location: ../NotFound.php');
        exit();
    }
    setcookie('user', $user['username'], time() + 3600, "/");

    $mysql->close();

    header('Location: ../');

?>