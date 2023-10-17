<?php

    require_once('config.php');
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;

    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
    $pdo = NULL;
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }


    $request = $pdo->prepare("select * from users");
    $request->execute();
    $resultats=$request->fetchall(PDO::FETCH_OBJ);
    
    switch($_SERVER["REQUEST_METHOD"]){
        case 'GET':
            header("Access-Control-Allow-Origin:*");
            header("Content-type: application/json");
            exit(json_encode($resultats));
    }

