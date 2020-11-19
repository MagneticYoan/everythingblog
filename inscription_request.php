<?php
    require('connect.php');
    
    $post = $_POST;
    $login = $post['author_login'];
    $mdp = password_hash($post['author_mdp'], PASSWORD_DEFAULT);
    $first_name = $post['firstname'];
    $last_name = $post['lastname'];
    
    //add new author
    $query = "INSERT INTO author (firstname, lastname, login, mdp) VALUES (?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$first_name, $last_name, $login, $mdp]);
    
    header('Location: main_home.php');
