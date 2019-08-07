<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Коментарии</title>
    <link rel="stylesheet" href="../public/css/OtherComponents/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/OtherComponents/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <?php if(isset($_SESSION["session_username"])):?>
    <div class="wrapper-title">
        <h3 align="center">Пользователь <a href="../pages/intropage.php"><?php echo $_SESSION["session_username"] ?></a>
        </h3>
        <h3 align="center"><a href="../index.php">Главная</a></h3>
        <h3 align="center"><a href="../module/logout.php">Выйти</a></h3>
        <h2 align="center">Оставить Комментарий</h2>
    </div>

    <!-- reply  -->
    <div class="wrapper-forms hide">
    <div class="container ">
        <form method="POST" id="comment_form_reply" class="form comment-form-reply">
            <div class="form-group form-group-main form-group-reply">
                <textarea name="comment_content_reply" id="comment_content_reply" class="form-control"
                    placeholder="Введите Комментарий" rows="5"></textarea>
            </div>
            <div class="form-group form-group-button-reply">
                <input type="hidden" name="comment_id_reply" id="comment_id_reply" value="0">
                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-send reply-button"
                    value="Отправить" />
                <input type="submit" name="submit" class="btn btn-danger back" value="Отмена" />
        </form>           
    </div>
    </div> 
    <div id="display_comment_reply">
    </div>
    </div>   
    </div>

    <!-- send -->
    <div class="container">
        <form method="POST" id="comment_form" class="form">
            <div class="form-group form-group-main">
                <textarea name="comment_content" id="comment_content" class="form-control" 
                    placeholder="Введите Комментарий" rows="5"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="comment_id" id="comment_id" value="0">
                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-send" value="Отправить" />
        </form>
        <br>
        <br>
        <span id="comment_message"></span>
        <br>
        <div class="wrapper-comments">
            Комментарии:
        </div>
    </div>
    <div id="display_comment">
    </div>
    </div>

    <script src="../public/js/OtherComponents/jquery-3.4.1.min.js"></script>
    <script src="../public/js/OtherComponents/bootstrap.bundle.min.js"></script>
    <script src="../public/js/send_comment.js"></script>
    <script src="../public/js/reply_comment.js"></script>

    <?php else : ?>
    <div class="comment-msg-error">
        <span>Чтобы оставить комментарий.<br><a href="login.php">Войдите</a> или <a
                href="signup.php">Зарегистрируйтесь</a>.</span>
    </div>

</body>

<?php endif ?>

</html>