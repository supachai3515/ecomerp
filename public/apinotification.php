

<?php

header("content-type:application/json;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
// $link = mysqli_connect('localhost', 'androidh_sam', 'Abc12345', "androidh_sam");

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$token = $_GET['token'];
		$title = $_GET['title'];
		$body = $_GET['body'];

		send_notification($token, $title, $body);
	}
}

function send_notification($token, $title, $body)
{
	define('API_ACCESS_KEY', 'AAAA2Q2iW5Y:APA91bGCcngE86F7EAJDVlbPQCi3hdyN8bKwd6DloX6orP0lZAlWdkprwFx6GkSPTZBJnCDtyQIiu5HYGi5FpZf0ggG4BZ4ijO5IvmA3lpxAniBTLbD7y3T4MBb6TP93N2mTKkvdbkqW');

	$msg = array(
		'body' 	=> $body,
		'title'	=> $title,
		'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
		'sound' => 'default',
		'content_available' => 'true',
		'priority' => 'high',
	);

	$data = array(
		'body' 	=> $body,
		'title'	=> $title,
		'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
		'sound' => 'default',
		'content_available' => 'true',
		'priority' => 'high',
	);

	$fields = array(
		'to' => $token,
		'notification'	=> $msg,
		'data' => $data,
	);


	$headers = array(
		'Authorization: key=' . API_ACCESS_KEY,
		'Content-Type: application/json'
	);
	#Send Reponse To FireBase Server	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	echo $result;
	curl_close($ch);
}
?>