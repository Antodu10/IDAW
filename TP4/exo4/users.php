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
    if(isset($_POST["login"])&&isset($_POST["email"])){
        $request = $pdo->prepare("insert into users (name,email) values (:nom,:email)");
        $request->bindParam(":nom", $_POST["login"], PDO::PARAM_STR);
        $request->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $request->execute();
    } 
    if(isset($_POST["delete"])){
        $request = $pdo->prepare("delete from users where id = :id ");
        $request->bindParam(":id", $_POST["cache"], PDO::PARAM_STR);

        $request->execute();
    }

    if(isset($_POST["name-new"])&&isset($_POST["name-new"])){
        $request = $pdo->prepare("update users SET name = :name , email = :email WHERE id = :id;");
        $request->bindParam(":name", $_POST["name-new"], PDO::PARAM_STR);
        $request->bindParam(":email", $_POST["email-new"], PDO::PARAM_STR);
        $request->bindParam(":id", $_POST["id-new"], PDO::PARAM_STR);
        $request->execute();
    }





    $request = $pdo->prepare("select * from users");
    $request->execute();
    $resultats=$request->fetchall(PDO::FETCH_OBJ);


?>


<!DOCTYPE html>
    <html>
    <body>   
        <table class= "tableau">
            <thead>
                <tr>
                      <th>id</th><th>name</th><th>email</th>
                </tr>
            </thead>
            <?php
           
            foreach($resultats as $resultat){
                echo "<tr>";
                echo '<td>'.$resultat->id.'</td>';
                echo '<td>'.$resultat->name.'</td>';
                echo '<td>'.$resultat->email.'</td>';
                echo '<td>
                        <form id="ajout_form" action="users.php" method="POST">
                        <input type="hidden" name = "cache" value='.$resultat->id.' />
                        <input type="submit" name= "delete"  value="Delete">
                        </form>
                    </td>';
                echo '<td>
                    <form id="ajout_form" action="modify.php" method="POST">
                    <input type="hidden" name = "id-actuelle" value='.$resultat->id.' />
                    <input type="hidden" name = "name-actuelle" value='.$resultat->name.' />
                    <input type="hidden" name = "email-actuelle" value='.$resultat->email.' />
                    <input type="submit" value="Modify">
                    </form>
                    </td>';
                echo '</tr>';
            }; ?>
        </table>
        <br>
        <form id="ajout_form" action="users.php" method="POST">
            <table>
                    <tr>
                        <th>Login :</th>
                        <td><input type="text" name="login"></td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" value="add" /></td>
                    </tr>
                
            </table>
        </form>

    </body>
<?php
$pdo = null;
?>
<html>