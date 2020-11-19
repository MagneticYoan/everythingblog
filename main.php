<?php

    require('connect.php');

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
    
    
    require('form.php');