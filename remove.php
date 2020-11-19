<?php

require('connect.php');

$article = $_GET['article'];
$comment = $_GET['comment'];

$query3 = "DELETE FROM `comment` WHERE `comment`.`article_id` = ?";
$query4 = "DELETE FROM `article` WHERE `article`.`id` = ?";
    
$statement3 = $pdo->prepare($query3);
$statement3->execute([$article]);

$statement4 = $pdo->prepare($query4);
$statement4->execute([$article]);



header('Location: admin_request.php?parameter=articles');

    