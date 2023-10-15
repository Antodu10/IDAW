<!DOCTYPE html>
<?php
        $currentPageId = 'accueil';
        $currentLangId= 'fr';
        if(isset($_GET['page']) && isset($_GET['lang'])) {
            $currentPageId = $_GET['page'];
            $currentLangId = $_GET['lang'];
        }
        require_once($currentLangId."/template_header.php");
        require_once($currentLangId."/template_menu.php");
    ?>
    
    <header class="bandeau_haut">
        <h1 class="titre"> Antonin PIAT</h1>
        <?php
        require_once($currentLangId."/template-langue.php");
        ?>
    </header>
    <?php
        renderMenuToHTML($currentPageId,$currentLangId);
    ?>
    <div class="corps">
        <?php
            $pageToInclude = $currentLangId."/".$currentPageId . ".php";
            if(is_readable($pageToInclude))
                require_once($pageToInclude);
            else
                require_once("error.php");
        ?>
    </div>
    </body>
<div>


<html>
