<?php
$bottoken="1974587817:AAHdaQOiWtXHHQ2n6xNPx2nnVztyQjOHbsA";
$chatid= "idjagreen";
$apiurl="https://api.telegram.org/bot" . $bottoken . "/";
 function enviar($msj){
    $queryarray=[
        "chat_id" => $chatid,
        "text" =>$msj];
        $url=$apiurl . "sendMessage?" . http_build_query($queryarray);
        $result=file_get_contents($url);
    

    
}
enviar ("test");
?>