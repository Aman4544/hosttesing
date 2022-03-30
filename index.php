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

if($text == "/auth"){
  $auth_key =substr($text, 5);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "$user_link");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Safari/537.36',
  'authorization: '.$auth_key,
  ));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
  curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
  $result = curl_exec ($ch);
  $msg = $result."\n";
  }
get($id,$msg);

?>
