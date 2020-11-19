<?php

require('connect.php');

$comment = $_GET['comment'];

$query5 = "DELETE FROM comment WHERE comment.id = ?";
    
$statement5 = $pdo->prepare($query5);
$statement5->execute([$comment]);

header('Location: admin_request.php?parameter=comments');