<?php  

require_once "../module/signup.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="wrapper-form form-login">
        <div id="signup">
            <div class="wrapper-menu-text">
                <a href="../index.php" class="main-page">Главная страница</a>
            </div>
            <div class="title-text">
                <h1>Регистрация</h1>
            </div>
            <form action="signup.php" id="signupform" method="post" name="signupform">
                <p><label for="user_pass">Логин<br>
                        <input class="input" id="username" name="username" size="20" type="text"
                            placeholder="Введите Логин" value="<?php echo $username; ?>"></label></p>
                <span class="error"><?php echo $nameError;?></span>
                <p><label for="user_pass">Пароль<br>
                        <input class="input" id="password" name="password" size="32" type="password"
                            placeholder="Введите Пароль" value=""></label>
                </p>
                <span class="error"><?php echo $passwordError;?></span>
                <p><label for="user_pass">E-mail<br>
                        <input class="input" id="email" name="email" size="32" type="email" placeholder="Введите E-mail"
                            value=""></label></p>
                <p><span class="error"><?php echo $emailError;?></span></p>
                <p><span class="error"><?php echo $messageError;?></span></p>
                <p class="submit"><input class="button" name="signup" type="submit" value="Зарегистрироваться"></p>
                <p class="signup-text">Уже зарегистрированы? <a href="login.php">Войти</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>