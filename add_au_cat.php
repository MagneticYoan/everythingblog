<?php
    require('connect.php');
    
    $get = $_GET['parameter'];
    
    if($get == 'category') {
        /* $post = $_POST;
        $name = $post['category'];
        $color = $post['cat_color'];
        $query = "INSERT INTO category (name, color) VALUES (?, ?)";
        $statement = $pdo->prepare($query);
        $statement->execute([$name, $color]); */
        var_dump($_POST['cat_color']);
    }
    
    if($get == 'author') {
        $post = $_POST;
        $firstname = $post['firstname'];
        $lastname = $post['lastname'];
        $query = "INSERT INTO author (firstname, lastname) VALUES (?, ?)";
        $statement = $pdo->prepare($query);
        $statement->execute([$firstname, $lastname]);
    }
    
//    header('Location: admin_request.php?parameter=parameter');
