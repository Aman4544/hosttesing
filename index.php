<?php

////////////////=============[Zeltrax Bot Raw]=============////////////////
////////==========[Join @ZeltraxRockz and @ZeltraxChat for more]==========////////

$botToken = "5187906957:AAGBUuwS1Kh4J-PtWEnudUod1tfs590kBTwe"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0A%0ABot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}

//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/cmds") === 0){
sendMessage($chatId, "<u>Bin lookup:</u> <code>/bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>/sk</code> sk_live_TeamZeltrax%0A<u>Merchant CC Checker:</u> <code>/chk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Web Based CC Checker:</u> <code>/schk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Zee5 Checker:</u> <code>/zee5</code> Email:Pass%0A<u>Info:</u> <code>/info</code> To know ur info%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}

//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<u>ID:</u> <code>$userId</code>%0A<u>First Name:</u> $firstname%0A<u>Username:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
?>
