<?php

require_once "../includes/db.php";


$nameError    = $emailError = $passwordError = "";
$username     = $password = $email = "";
$messageError = "";


if (isset($_POST["signup"])) {
    
    $username = trim($_POST['username']);
    $password = hash('sha256', $_POST['password']);
    $email    = trim($_POST['email']);
    
    
    
    if (!empty($_POST[$username]) && !empty($_POST[$password]) && !empty($_POST[$email])) {
        
        /* form validation */
        $emailError = "Все поля обязательны для заполнения!";
        
        /* Check username */
    } elseif (empty($_POST['username'])) {
        $nameError = "Поле должно быть заполнено";
    } elseif (!preg_match("/^[A-z0-9]{3,10}$/", $_POST['username'])) {
        $username  = $_POST['username'];
        $nameError = "Логин может содержать только латинские буквы и цифры, длиной от 3 до 10 символов";
        
        /* Check password */
    } elseif (empty($_POST['password'])) {
        $username      = $_POST['username'];
        $passwordError = "Поле должно быть заполнено";
    } elseif (!preg_match("/^[A-z0-9]{5,15}$/", $_POST['password'])) {
        $username      = $_POST['username'];
        $passwordError = "Пароль может содержать только латинские буквы и цифры, длиной от 5 до 15 символов";
        
        /* Check email */
    } elseif (empty($_POST['email'])) {
        $username   = $_POST['username'];
        $emailError = "Поле должно быть заполнено";
    } elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        $username   = $_POST['username'];
        $emailError = "Формат E-mail неправильный";
        

        /* Work BD */
    } else {        
        
        $sqlUsername   = "SELECT * 
        FROM `tbl_users` 
        WHERE username = '$username'";
        
        $sqlEmail      = "SELECT * 
        FROM `tbl_users` 
        WHERE email = '$email'";
        
        $queryUsername = $connection->prepare($sqlUsername);
        $queryEmail    = $connection->prepare($sqlEmail);
        $queryUsername->execute(array(
            $username
        ));
        $queryEmail->execute(array(
            $email
        ));
        if ($queryUsername->rowCount() == 0) {
            if ($queryEmail->rowCount() == 0) { 

                $sql_query = "INSERT INTO `tbl_users`
                 (username,password,email)
                  VALUES('$username','$password','$email')";
                $res       = $connection->prepare($sql_query);
                $res->execute(array(
                    $sql_query
                ));
                
                if ($res) {
                    header("location: success_signup.php");
                } else {
                    $messageError = "Не удалось добавить информацию";
                }
            } else {
                $messageError = "Email уже существует. Попробуйте другой!";
            }
        } else {
            $messageError = "Логин уже существует. Попробуйте другой!";
        }
    }
}
?>