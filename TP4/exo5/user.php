<?php

    require_once('init_pdo.php');
    
    $request = $pdo->prepare("select * from users");
    $request->execute();
    $resultats=$request->fetchall(PDO::FETCH_OBJ);

    function is_in($ind,$res){
        $bool=false;
        foreach ($res as $r){
            if($ind==$r->id){
                $bool=true;
            }
        }
        return $bool;
    }

    $current_url = $_SERVER['REQUEST_URI'];

    switch($_SERVER["REQUEST_METHOD"]){
        case 'GET':
            $url_parts = parse_url($current_url);
            $segments = explode('/', $url_parts['path']);
            $last_segment = end($segments);
            if(is_in($last_segment,$resultats)){
                $request = $pdo->prepare("select * from users where id =:id");
                $request->bindParam(":id", $last_segment, PDO::PARAM_STR);
                $request->execute();
                $resultat=$request->fetch(PDO::FETCH_OBJ);
                exit(json_encode($resultat));}
            else{
               exit(http_response_code(204));
            };
        case 'POST':
            $data_array = json_decode(file_get_contents('php://input'), true);
            $request = $pdo->prepare("insert into users (name,email) values (:nom,:email)");
            $request->bindParam(":nom",$data_array["name"], PDO::PARAM_STR);
            $request->bindParam(":email", $data_array["email"], PDO::PARAM_STR);
            $request->execute()
            $request = $pdo->prepare("select colonne_valeur
                                            FROM ma_table
                                            ORDER BY id DESC
                                            LIMIT 1");
            $request->execute()
            $resultat=$request->fetch(PDO::FETCH_OBJ);
            exit(json_encode($resultat));
            
        case 'DELETE':
            $data_array = json_decode(file_get_contents('php://input'), true);
            if(is_in($data_array['id'],$resultats)){
            $request = $pdo->prepare("delete from users where id = :id ");
            $request->bindParam(":id", $data_array['id'], PDO::PARAM_STR);
            exit($request->execute());}
            else{
                exit(http_response_code(204));
            };
        case 'PUT':
            $data_array = json_decode(file_get_contents('php://input'), true);
            if(is_in($data_array['id'],$resultats)){
            $request = $pdo->prepare("update users SET name = :name , email = :email WHERE id = :id;");
            $request->bindParam(":name", $data_array["name"], PDO::PARAM_STR);
            $request->bindParam(":email",$data_array["email"], PDO::PARAM_STR);
            $request->bindParam(":id",$data_array["id"], PDO::PARAM_STR);
            exit($request->execute());}
            else{
                exit(http_response_code(204));
            };
    }

?>


           
            