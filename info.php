<?php
$botToken = "token"; // هنا توكن
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
// By rambosyr
$fwd = $update["message"]["forward_from"];
$fwd2 = $update["message"]["forward_from"]["id"];
$fwd = $update["message"]["forward_from"]["message"];
$fwd4 = $update["message"]["forward_from"]["channel"]["id"];
$user2 = $update["message"]["forward_from"]["username"];
$type = $update["message"]["chat"]["type"];
$for = $update["message"]["from"]["id"];
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$user = $update["message"]["from"]["username"];
$nam = $update["message"]["from"]["first_name"];
$fwd_name = $update["message"]["forward_from"]["first_name"];
if ($message && !$fwd2 && $type == "private"){
sendMessage($chatId, "??Id : " . $for . "\n??User : " . "@" . $user . "\n??Name : " . $nam);
}
if ($fwd2 && $type == "private"){
sendMessage($chatId, "??Id : " . $fwd2 . "\n??user : " . "@" . $user2 . "\n??Name : " . $fwd_name);	
}
function sendMessage ($chatId, $message){
		
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
		file_get_contents($url);
		}
		?>
