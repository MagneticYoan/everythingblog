<?php

    require('connect.php');
    
    $post = $_POST;
    $author_id = $post['author_id'];
    $com_content = $post['com_content'];
    $article_id = $post['article_id'];
    
    $query = "
    INSERT INTO comment (author_id, com_content, article_id, date_post)
    VALUES (? , ? , ?, NOW() )
    ";
    
    $statement = $pdo->prepare($query);
    $statement->execute([$author_id, $com_content, $article_id]);
    
    header('Location: article_see.php?articleid=' . $article_id);
    