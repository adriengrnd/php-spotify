<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/tracks/3Z8gDycWX48tv06vVRMQtg");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
echo $result;
curl_close($ch);