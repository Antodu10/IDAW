
        <?php
function renderMenuToHTML($currentPageId, $currentLangId) {
$mymenu = array(
'accueil' => array( 'Welcolme' ),
'cv' => array( 'Cv' ),
'projets' => array('Projects'),
'infos-technique' => array('Technical information'),
'contact'=> array('Contacts')
);
echo '<nav class="menu">';
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