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
        <div class="conteneur-flexible ligne ">
            <img src="photoCV.jpg" />
            <div class = "inner-flex">
                 <div class="inner-item-principale">Etude</div> 
                   <div class="inner-item">-M1 à l'IMT Nord Europe</div>
                   <div class="inner-item">-Prepa MP/MPSI au Lycée George CLemenceau</div>
                   <div class="inner-item-principale">Expérience</div>
                   <div>-Stage d'ingénieur progrès à Michelin (durée 4mois)</div> 
                </div>

            </div>
        </div>

    </body>
 </html>