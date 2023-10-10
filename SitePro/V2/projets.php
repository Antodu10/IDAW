<!doctype html>

    <?php
        require_once('template_header.php');
    ?>

    <body>
        <nav class="conteneur-flexible">
            <?php 
                require_once('template_menu.php');
                renderMenuToHTML('cv');
            ?>
        </nav>   
        <div class="conteneur-flexible"></div>
        <div class="conteneur-flexible ">
            <h1>Mes projets</h1>
        </div>
        <div class="conteneur-flexible">
            <div class="inner-flex">
                <h2>Projet fin d'année</h2>
                <p>Trouver un stage dans le domaine du dev Web</p>
            </div>
            <div class="inner-flex">
                <h2>Projet professionel</h2>
                <p>Devenir dev Web et travailler en freelance</p>
            </div>
        </div>
    </body>
 </html>