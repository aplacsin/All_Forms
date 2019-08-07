<?php

require_once "../includes/db.php";

?>

<?php
session_start();
?>

<?php

$message      = $user_username = "";
$messageError = "";

if (isset($_SESSION["session_username"])) {
    /* Session is set */
    header("Location: intropage.php");
}

if (isset($_POST["login"])) {
    $user_username = trim($_POST['username']);
    $user_password = hash('sha256',$_POST['password']);

    if (!empty($user_username) && !empty($user_password)) {              

        /* Work DB */
        $sql   = "SELECT `id`, `username` 
        FROM `tbl_users` 
        WHERE username = '$user_username' 
        AND password = '$user_password'";
        
        $query = $connection->prepare($sql);
        $query->execute(array(
            $user_username,
            $user_password,            
        ));
        if ($query->rowCount() == 1) {
            $_SESSION['session_username'] = $user_username;
            header("Location: intropage.php");
        } else {
            $messageError = 'Вы должны ввести правильно имя пользователя или пароль';
        }
    } else {
        $messageError = 'Вы должны заполнить все поля правильно!';
    }
}

?>