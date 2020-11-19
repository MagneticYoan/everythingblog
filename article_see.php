<?php

    require('connect.php');	
    $get = $_GET['articleid'];
    
    //actual article
    $query3 = "
        SELECT 
            a.id, 
            a.title, 
            a.content, 
            a.publication_date, 
            a.category_id,
            a.image,
            a.image_alt,
            c.name,
            a.author_id,
            au.firstname,
            au.lastname
        FROM article AS a
        JOIN category AS c ON a.category_id = c.id
        JOIN author AS au ON a.author_id = au.id
        WHERE a.id = ?
        ";
    
    $statement3 = $pdo->prepare($query3);
    $statement3->execute([$get]);
    $articles = $statement3->fetch(PDO::FETCH_ASSOC);
    $image_url = 'images/' . $articles['image'];
    
    //comments
    $query4 = "
        SELECT
            a.id,
            c.com_content,
            c.author_id,
            c.date_post,
            c.id AS com_id,
            c.upvote,
            c.downvote,
            c.totalvote,
            au.firstname,
            au.lastname
        FROM article AS a
        JOIN comment AS c ON a.id = c.article_id
        JOIN author AS au ON c.author_id = au.id
        WHERE c.article_id = ?
    ";
    $statement4 = $pdo->prepare($query4);
    $statement4->execute([$get]);
    $comments = $statement4->fetchAll(PDO::FETCH_ASSOC);
    
    // others articles on side menu
    $query2 = "
        SELECT 
            a.id, 
            a.title, 
            a.content, 
            a.publication_date, 
            a.category_id,
            c.name,
            a.author_id,
            au.firstname,
            au.lastname
        FROM article AS a
        JOIN category AS c ON a.category_id = c.id
        JOIN author AS au ON a.author_id = au.id
        ORDER BY a.publication_date
        LIMIT 7
        ";
    
    $statement2 = $pdo->prepare($query2);
    $statement2->execute();
    $seeotherarticles = $statement2->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    require('article.php');