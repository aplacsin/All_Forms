<?php

require_once "config.php";

?>

<?php

try {
$connection = new PDO("mysql:host=$server;dbname=$name;charset=utf8", $username, $password); 



/* Create DB and TABLE */

$sql_createdb = "CREATE DATABASE userdb";

$sql_userstable = "CREATE TABLE `tbl_users` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `password` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `email` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;";

$connection->exec($sql_createdb);
$query = $connection->prepare($sql_userstable);
$connection->exec($sql_userstable);


$sql_commentstable = "CREATE TABLE `tbl_comments` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `parent_id` INT NOT NULL , 
    `content` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `sender_name` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `sending_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;";

$query = $connection->prepare($sql_commentstable);
$connection->exec($sql_commentstable);


}
catch(Exception $connection) {
    $messageError = 'Не удалось подключиться к базе данных!';     
}


?>