<?php
    $style ="style1";

    if(isset($_COOKIE['style'])){
        $style=$_COOKIE['style'];
    
    }
    if(isset($_GET['css'])){
        $style = $_GET['css'];
        setcookie("style",$style,time()+3600);
    }
 require_once("header.php") ?>
<form id="swag_form" action="index.php" method="GET">
    <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>

<?php
    $style ="style1";

    if(isset($_COOKIE['style'])){
        $style=$_COOKIE['style'];
    
    }
    if(isset($_GET['css'])){
        $style = $_GET['css'];
        setcookie("style",$style,time()+3600);
    }

    ?>