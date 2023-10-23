<?php


    
    switch($_SERVER["REQUEST_METHOD"]){
        case 'GET':
            require_once('init_pdo.php');
            $request = $pdo->prepare("select * from users");
            $request->execute();
            $resultats=$request->fetchall(PDO::FETCH_OBJ);
            header("Access-Control-Allow-Origin:*");
            header("Content-type: application/json");
            exit(json_encode($resultats));
        default:
            exit(http_response_code(204));

    }

