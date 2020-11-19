<?php
    
try {

    $pdo = new PDO(
            'mysql:host=home.3wa.io:3307;dbname=live-33_yoanl_newblog',
            'yoanl',
            '7b184572NDBkMDQ0Y2Y3MmYyMWE0MTJiYWVhOWExf61b475d',// ici le mot de passe
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    $pdo->exec('set names utf8');
} catch (PDOexception $error ) {
    var_dump($error->getMessage());
}

session_start();