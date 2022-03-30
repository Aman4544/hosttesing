<?php

function get($id,$mes){

$token = "5187906957:AAGBUuwS1Kh4J-PtWEnudUod1tfs590kBTw";

$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$token/sendMessage?");

$postFields = array(

    'chat_id' => $id,

    'text' => $mes,

    'parse_mode' => 'HTML',

    'disable_web_page_preview' => false,

);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

return curl_exec($ch); 

curl_close($ch);

}

$cek = file_get_contents('php://input');

$x = json_decode($cek,1);

$id = $x["message"]["chat"]["id"];

$nama = $x["message"]["chat"]["first_name"];

$text = $x["message"]["text"];

if($text == "/start"){

  $msg = "HELLO WELCOME OUR OUR BOT \n NAME -> $name & USER ID -> $id \nUES /cmds TO VIEW MY COMMAND'S\n";

}
?>
