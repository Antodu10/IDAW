
        <?php
function renderMenuToHTML($currentPageId, $currentLangId) {
$mymenu = array(
'accueil' => array( 'Accueil' ),
'cv' => array( 'Cv' ),
'projets' => array('Mes Projets'),
'infos-technique' => array('Infos technique'),
'contact'=> array('Mes contacts')
);
echo '<nav class="conteneur-flexible">';
foreach($mymenu as $pageId => $pageParameters) {
    if($currentPageId==$pageId){
         echo '<div id="currentpage" class="item2"><a href=index.php?page='.$pageId.'&lang='.$currentLangId.'>'.$pageParameters[0].'</a></div>';
}
    else{
         echo '<div class="item2"><a href=index.php?page='.$pageId.'&lang='.$currentLangId.' >'.$pageParameters[0].'</a></div>';
    }

    }
echo '</nav>';
}
?>