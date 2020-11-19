<?php

    require('connect.php');
    
    $get = $_GET['article'];
    
    // form selects
    $query = "
        SELECT id, firstname, lastname
        FROM author
    ";
    
    $statement = $pdo->prepare($query);
    $statement->execute();
    $authors = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    
    $query2 = "
        SELECT id, name
        FROM category
    ";
    
    $statement2 = $pdo->prepare($query2);
    $statement2->execute();
    $categories = $statement2->fetchAll(PDO::FETCH_ASSOC);
    
    
    // form default from bdd
    $query3 = "
        SELECT id, title, content, author_id, category_id
        FROM article
        WHERE id = ?
    ";
    $statement3 = $pdo->prepare($query3);
    $statement3->execute([$get]);
    $defaultarticle = $statement3->fetch(PDO::FETCH_ASSOC);
    
    require('form_change.php');