<?php

session_start();
?>

<?php

require_once "../includes/db.php";


$messageError = '';
$comment_name = '';
$comment_content = '';

$post_comment_name = $_SESSION["session_username"];

/* Field Check  */
if (empty($post_comment_name)) {
    $messageError .= '<p class="text-danger">* Поле Имя должно быть заполнено.</p>';
} else {
    $comment_name = $post_comment_name;
}

if (empty($_POST["comment_content_reply"])) {
    $messageError .= '<p class="text-danger">* Поле Коментарий не должно быть пустым.</p>';
} else {
    $comment_content = $_POST["comment_content_reply"];
}

if ($messageError == '') {
    $query = "INSERT INTO tbl_comments
 (parent_id, content, sender_name) 
 VALUES (:parent_id, :content, :sender_name)";
    
    $statement = $connection->prepare($query);
    $statement->execute(array(
        ':parent_id' => $_POST["comment_id_reply"],
        ':content' => $comment_content,
        ':sender_name' => $post_comment_name
    ));
    $messageError = '<label class="text-success">Комментарий отправлен!</label>';
}

$data = array(
    'error' => $messageError
);

echo json_encode($data);

?>