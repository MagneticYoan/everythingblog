<?php
    require('connect.php');

    $post = $_POST;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $image_alt = $_POST['alt'];
    $image = basename($_FILES["file"]["name"]);
    $target_direction = "images/";
    $target_file_path = $target_direction . $image;
    $file_type = pathinfo($target_file_path,PATHINFO_EXTENSION);
    $allow_type = array('jpg','png','jpeg','gif','pdf');
    
    
    if(in_array($file_type, $allow_type) && (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_path))) {
            $query = "
            INSERT INTO article  (title, content, publication_date, author_id, category_id, image, image_alt)
            VALUES (? , ? , NOW() , ? , ?, ?, ?)
            ";
            
            $statement = $pdo->prepare($query);
            $statement->execute([$title, $content, $author_id, $category_id, $image, $image_alt]);
    }
        
        
    else {
        $query = "
        INSERT INTO article  (title, content, publication_date, author_id, category_id)
        VALUES (? , ? , NOW() , ? , ?)
        ";
        
        $statement = $pdo->prepare($query);
        $statement->execute([$title, $content, $author_id, $category_id]);
    };
    
    header('Location: main_home.php');
