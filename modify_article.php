<?php
    require('connect.php');

    $post = $_POST;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $id = $_GET['article_id'];
    
    
    $query = "
    UPDATE article
    SET title = ?,
    content = ?,
    author_id = ?,
    category_id = ?
    WHERE id = ?
    ";
    
    $statement = $pdo->prepare($query);
    $statement->execute([$title, $content, $author_id, $category_id, $id]);
    
    header('Location: admin_request.php?parameter=articles');
