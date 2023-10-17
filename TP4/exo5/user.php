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


    if(isset($_POST["name-new"])&&isset($_POST["name-new"])){
        $request = $pdo->prepare("update users SET name = :name , email = :email WHERE id = :id;");
        $request->bindParam(":name", $_POST["name-new"], PDO::PARAM_STR);
        $request->bindParam(":email", $_POST["email-new"], PDO::PARAM_STR);
        $request->bindParam(":id", $_POST["id-new"], PDO::PARAM_STR);
        $request->execute();
    }

    $current_url = $_SERVER['REQUEST_URI'];

    switch($_SERVER["REQUEST_METHOD"]){
        case 'GET':
                $url_parts = parse_url($current_url);
                $segments = explode('/', $url_parts['path']);
                $last_segment = end($segments);
            $request = $pdo->prepare("select * from users where id =:id");
            $request->bindParam(":id", $last_segment, PDO::PARAM_STR);
            $request->execute();
            $resultats=$request->fetch(PDO::FETCH_OBJ);
            exit(json_encode($resultats));
        case 'POST':
            $data_array = json_decode(file_get_contents('php://input'), true);
            $request = $pdo->prepare("insert into users (name,email) values (:nom,:email)");
            $request->bindParam(":nom",$data_array["name"], PDO::PARAM_STR);
            $request->bindParam(":email", $data_array["email"], PDO::PARAM_STR);
            exit($request->execute());
        case 'DELETE':
            $data_array = json_decode(file_get_contents('php://input'), true);
            $request = $pdo->prepare("delete from users where id = :id ");
            $request->bindParam(":id", $data_array['id'], PDO::PARAM_STR);
            exit($request->execute());
        case 'PUT':
            $data_array = json_decode(file_get_contents('php://input'), true);
            $request = $pdo->prepare("update users SET name = :name , email = :email WHERE id = :id;");
            $request->bindParam(":name", $data_array["name"], PDO::PARAM_STR);
            $request->bindParam(":email",$data_array["email"], PDO::PARAM_STR);
            $request->bindParam(":id",$data_array["id"], PDO::PARAM_STR);
            exit($request->execute());


    }

?>


           
            