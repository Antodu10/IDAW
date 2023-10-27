<?php
// URL de l'API
$url = "https://nominis.cef.fr/json/saintdujour.php";
$response = file_get_contents($url);
$data = json_decode($response, true);
$nomDuSaint = $data['response']['saintdujour']['nom'];
echo"Joyeuse ".$nomDuSaint;
?>