<?php
header("Access-Control-Allow-Origin: *");


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
    $url = 'https://api.groupme.com/v3/bots/post';
    $data = array('text' => $text, 'bot_id' => '632b0904bc8e683dd3518e6444');

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    else echo "Sent!";
}

