
    
<?php
echo"<td> 
    <form id='ajout_form' action='users.php' method='POST'>
        <input type='text' name='name-new' value=". $_POST["name-actuelle"].">
        <input type='text' name='email-new' value=". $_POST['email-actuelle'].">
        <input type='hidden' name='id-new' value=". $_POST['id-actuelle'].">
        <input type='submit' value='Modify'>
    </form>
 </td>"
 
 ;
?>
