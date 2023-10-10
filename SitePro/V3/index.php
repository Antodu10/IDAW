<!DOCTYPE html>
<?php
    require_once("fr/template_header.php");
   
         require_once("fr/template_menu.php");
        $currentPageId = 'accueil';
        $currentLangId= 'fr';
        if(isset($_GET['page']) && isset($_GET['lang'])) {
            $currentPageId = $_GET['page'];
            $currentLangId = $_GET['lang'];
        }
    ?>
    
    <header class="bandeau_haut">
        <h1 class="titre">Antonin PIAT</h1>
    </header>
    
    <?php
        renderMenuToHTML($currentPageId,$currentLangId);
    ?>
    <section class="corps">
        <?php
            $pageToInclude = $currentLangId."/".$currentPageId . ".php";
            if(is_readable($pageToInclude))
                require_once($pageToInclude);
            else
                require_once("error.php");
        ?>
    </section>
<html>
