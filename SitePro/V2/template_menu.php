
        <?php
function renderMenuToHTML($currentPageId) {
$mymenu = array(
'index' => array( 'Accueil' ),
'cv' => array( 'Cv' ),
'projets' => array('Mes Projets'),
'infos-technique' => array('Infos technique')
);

foreach($mymenu as $pageId => $pageParameters) {
    if($currentPageId==$pageId){
         echo '<div id="currentpage" class="item2"><a href='.$pageId.'.php'.' >'.$pageParameters[0].'</a></div>';
}
    else{
         echo '<div class="item2"><a href='.$pageId.'.php'.' >'.$pageParameters[0].'</a></div>';
    }

}}
?>