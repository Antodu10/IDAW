<!DOCTYPE html>
<html>
<head>
    <title>Ma Page PHP</title>
</head>
<body>
    <h1>Voici l'heure</h1>
    <?php
    date_default_timezone_set('Europe/Paris');
    echo date('h:i:s A');
    function afficher( $texte, $saut = 1 ) {
        echo $texte;
        for( $i = 0 ; $i < $saut ; $i++)
        echo "\n".$texte;
        }
        afficher("Hello", 2);
        afficher(" World !",2);
        $tab =array(1,2,3,4,5);
        echo $tab[1];
    ?>
</body>
</html>