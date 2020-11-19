<?php
require('connect.php');

$vote = $_GET['vote'];
$comment = $_GET['comment'];
$article = $_GET['article'];


$query = "SELECT
            id,
            upvote,
            downvote,
            author_id,
            totalvote
        FROM comment
        WHERE id = ?";
        
$statement = $pdo->prepare($query);
$statement->execute([$comment]);
$votes = $statement->fetch(PDO::FETCH_ASSOC);

$upvote = $votes['upvote'];
$downvote = $votes['downvote'];
$note = $votes['totalvote'];


if($vote == 'up') {
    
    $query2 = "
    UPDATE comment
    SET upvote = ? + 1
    WHERE id = ?";
    $statement2 = $pdo->prepare($query2);
    $statement2->execute([$upvote, $comment]);
    $note ++;
};

if($vote == 'down') {
    
    $query2 = "
    UPDATE comment
    SET downvote = ? - 1
    WHERE id = ?";
    $statement2 = $pdo->prepare($query2);
    $statement2->execute([$downvote, $comment]);
    $note --;
};


$query3 = "
    UPDATE comment
    SET totalvote = ?
    WHERE id = ?";

$statement3 = $pdo->prepare($query3);
$statement3->execute([$note, $comment]);


header('Location: article_see.php?articleid=' . $article);
