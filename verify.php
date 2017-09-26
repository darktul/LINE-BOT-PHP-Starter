<?php
$proxy = 'http://fixie:3Zo31wkG9rMPtyf@velodrome.usefixie.com:80';
$proxyauth = 'fixie:3Zo31wkG9rMPtyf';
$access_token = 'DWLT+dALUA6eDgEc03psgiSF/z4hGt1hjAizvr5RHWs504y/Fu70qEEsu9cY1NjLbJ8/mju46Z6K22+glLgYO0ELhd175QMLTatEChiUbS2/JPjiLt5Vcnn351jd6AjT7IWk4NmOOajJURKIlx77FAdB04t89/1O/w1cDnyilFU=
';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>