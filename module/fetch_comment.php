<?php

require_once "../includes/db.php";



$query = "SELECT * FROM tbl_comments WHERE parent_id = '0' ORDER BY id DESC";

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';


foreach ($result as $row) {
    $output .= '    
    <div class="panel panel-default">
       <div class=img-block></div>
       <div class=wrapper-panel>     
<div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> <b>' . $row["sender_name"] . '</b> <br> <i class="fa fa-clock-o" aria-hidden="true"></i> <i>' . $row["sending_date"] . '</i></div><hr>
<div class="panel-body">' . $row["content"] . '</div>
<div class="panel-footer" align="left"><button type="button" class="reply" id="' . $row["id"] . '">Ответить</button></div>
          </div>
     </div>
     </div>
';
    $output .= get_reply_comment($connection, $row["id"]);
}

echo $output;



function get_reply_comment($connection, $parent_id = 0, $marginleft = 0)
{
    $query     = "SELECT * FROM tbl_comments WHERE parent_id = '" . $parent_id . "'";
    $output    = '';
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count  = $statement->rowCount();
    
    
    if ($parent_id == 0) {
        $marginleft = 0;
    } else {
        $marginleft = $marginleft + 100;
    }
    if ($count > 0) {
        foreach ($result as $row) {
            $output .= '
   <div class="panel panel-default" style="margin-left:' . $marginleft . 'px">   
   <div class=img-block></div>
   <div class=wrapper-panel>           
<div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> <b>' . $row["sender_name"] . '</b> <br> <i class="fa fa-clock-o" aria-hidden="true"></i> <i>' . $row["sending_date"] . '</i></div><hr>
<div class="panel-body">' . $row["content"] . '</div>
<div class="panel-footer" align="left"><button type="button" class="reply" id="' . $row["id"] . '">Ответить</button></div>   
    </div>
    </div>
   ';
            $output .= get_reply_comment($connection, $row["id"], $marginleft);
        }
    }
    
    return $output;
}

?>