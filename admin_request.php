<?php

    require('connect.php');
    
    $get = $_GET['parameter'];
    $author_id = $_SESSION['id'];
    $admin_lvl = $_SESSION['admin_lvl'];
    
    //select articles
        //check admin lvl
    if ($admin_lvl != 0) {
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
        "; 
            
        $statement3 = $pdo->prepare($query3);
        $statement3->execute([$author_id]);
        $articles = $statement3->fetchAll(PDO::FETCH_ASSOC);
        
        $query4 = "
            SELECT
                a.id,
                c.id AS com_id,
                a.title,
                c.com_content,
                c.date_post
            FROM article AS a
            JOIN comment AS c ON a.id = c.article_id
            ORDER BY c.date_post
        ";
        
        $statement4 = $pdo->prepare($query4);
        $statement4->execute([$author_id]);
        $comments = $statement4->fetchAll(PDO::FETCH_ASSOC);
    }
    
        //pas admin
    else {
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
        WHERE a.author_id = ?
        ORDER BY a.publication_date";
        
        $statement3 = $pdo->prepare($query3);
        $statement3->execute([$author_id]);
        $articles = $statement3->fetchAll(PDO::FETCH_ASSOC);
        
        $query4 = "
            SELECT
                a.id,
                c.id AS com_id,
                a.title,
                c.com_content,
                c.date_post,
                c.author_id
            FROM article AS a
            JOIN comment AS c ON a.id = c.article_id
            WHERE c.author_id = ?
            ORDER BY c.date_post DESC
        ";
        
        $statement4 = $pdo->prepare($query4);
        $statement4->execute([$author_id]);
        $comments = $statement4->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    require('admin.php');