<?php  

require_once "../module/login.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Вход</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="wrapper-form form-login">
        <div id="login">
            <div class="wrapper-menu-text">
                <a href="../index.php" class="main-page">Главная страница</a>
            </div>
            <div class="title-text">
                <h1>Вход</h1>
            </div>
            <form action="" id="loginform" method="post" name="loginform">
                <p><label for="user_login">Логин<br>
                        <input class="input" id="username" name="username" size="20" type="text"
                            placeholder="Введите Логин" value="<?php echo $user_username;?>"></label></p>
                <p><label for="user_pass">Пароль<br>
                        <input class="input" id="password" name="password" size="20" type="password"
                            placeholder="Введите Пароль" value=""></label>
                </p>
                <p><span class="error"><?php echo $messageError;?></span></p>
                <p class="submit"><input class="button" name="login" type="submit" value="Войти"></p>
                <p class="login-text">Еще не зарегистрированы?<br><a href="signup.php">Регистрация</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>