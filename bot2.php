<?php
$proxy = 'http://fixie:3Zo31wkG9rMPtyf@velodrome.usefixie.com:80';
$proxyauth = 'fixie:3Zo31wkG9rMPtyf';

$access_token = 'DWLT+dALUA6eDgEc03psgiSF/z4hGt1hjAizvr5RHWs504y/Fu70qEEsu9cY1NjLbJ8/mju46Z6K22+glLgYO0ELhd175QMLTatEChiUbS2/JPjiLt5Vcnn351jd6AjT7IWk4NmOOajJURKIlx77FAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				// 'text' => $text
				'text' => $text
			];

			$messages2 = [
			  "type"=> "template",
			  "altText"=> "this is a confirm template",
			  "template"=> [
			      "type"=> "confirm",
			      "text"=> "Are you sure to join queue?",
			      "actions"=> [
			          [
			            "type"=> "message",
			            "label"=> "Yes",
			            "text"=> "yes"
			          ],
			          [
			            "type"=> "message",
			            "label"=> "No",
			            "text"=> "no"
			          ]
			      ]
			  ]	
			];

			$messages4 = [
				 "type"=> "imagemap",
				  "baseUrl"=> "https://mekoclinic.com/wp-content/uploads/2017/04/AD-product-fullerene7-1040x1040-01.jpg/1040",
				  "altText"=> "this is an imagemap",
				  "baseSize"=> [
				      "height"=> 1040,
				      "width"=> 1040
				  ],
				  "actions"=> [
				      [
				          "type"=> "uri",
				          "linkUri"=> "https://psu.ac.th/",
				          "area"=> [
				              "x"=> 0,
				              "y"=> 0,
				              "width"=> 520,
				              "height"=> 1040
				          ]
				      ],
				      [
				          "type"=> "message",
				          "text"=> "hello",
				          "area"=> [
				              "x"=> 520,
				              "y"=> 0,
				              "width"=> 520,
				              "height"=> 1040
				          ]
				      ]
				  ]
			];

		// Make a POST Request to Messaging API to reply to sender
			if($text == "join"){
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages2],
			];

			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
			}

			if($text == "show"){
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages4],
			];

			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
			}

			}
}
}
echo "OK";