<?php
    require('connect.php');
    
    $post = $_POST;
    $login = $post['author_login'];
    $mdp = $post['author_mdp'];
    
    $query = "SELECT id, login, mdp, firstname, lastname, biography FROM author WHERE login = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$login]);
    $author = $statement->fetch(PDO::FETCH_ASSOC);
    $login_ok = false;
    $author_id = null;

    if(password_verify($mdp , $author['mdp'])) {
            $login_ok = true;
            $author_id = $author['id'];
    }
    
    if($login_ok) {
        
        $query2 = "SELECT id, login, mdp, firstname, lastname, biography, admin_lvl FROM author WHERE id = ?";
        $statement2 = $pdo->prepare($query2);
        $statement2->execute([$author_id]);
        $author = $statement2->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['firstname'] = $author['firstname'];
        $_SESSION['lastname'] = $author['lastname'];
        $_SESSION['login'] = $author['login'];
        $_SESSION['biography'] = $author['biography'];
        $_SESSION['admin_lvl'] = $author['admin_lvl'];
        $_SESSION['id'] = $author['id'];
        
        header('Location: main_home.php');

    }
    
    else {
        session_destroy();
        header('Location: cant_connect.php');
    }
    