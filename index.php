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
$message = $x["message"]["text"];
if($text == "/welcome"){

  $msg = "HELLO WELCOME OUR OUR BOT\nNAME -> $nama\nUSER ID -> $id \nUES /cmds TO VIEW MY COMMAND'S\n";
}else if(strpos($message, "/auth") === 0){
$auth_key = substr($message, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://discord.com/api/v9/users/@me");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authorization: NzcyNzE5ODY5MjcwNTU2Njky.YkGgeQ.D5arqylEVFJLPQAo6HCQKOWfiFE',
'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Safari/537.36',
));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec ($ch);
$msg = $result;
}
get($id,$msg);

?>
