<?php
header("Access-Control-Allow-Origin: *");

send($_POST['sender_id']);

if(strpos($_POST['name'], 'Marcus') || strpos($_POST['name'], 'marcus')){
    send('SHUT UP MARCUS');
}

if(strpos($_POST['text'], 'moon') || strpos($_POST['text'], 'lunar')){
    $text = "That's one small step for man, one giant leap for mankind.";
    send($text);
}

if(strpos($_POST['text'], 'lauren') || strpos($_POST['text'], 'Lauren')){
    $text = "smh lauren lol";
    send($text);
}

function send($text){
    // where are we posting to?
    $url = 'https://api.groupme.com/v3/bots/post';

    // what post fields?
    $fields = array('text' => $text, 'bot_id' => '632b0904bc8e683dd3518e6444');

    // build the urlencoded data
    $postvars = http_build_query($fields);

    // open connection
    $ch = curl_init();

    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

    // execute post
    $result = curl_exec($ch);

    // close connection
    curl_close($ch);
}

