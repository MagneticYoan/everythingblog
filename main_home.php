<?php

    require('connect.php');

    $query3 = "
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
        ORDER BY a.publication_date DESC
        LIMIT 9
    ";
    
    $statement3 = $pdo->prepare($query3);
    $statement3->execute();
    $articles = $statement3->fetchAll(PDO::FETCH_ASSOC);
    
    $query4 = "
        SELECT firstname, lastname, biography
        FROM author
        WHERE biography IS NOT NULL
    ";
    
    $statement4 = $pdo->prepare($query4);
    $statement4->execute();
    $authors = $statement4->fetchAll(PDO::FETCH_ASSOC);
    
    
    require('home.php');