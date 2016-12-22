<?php
header("Access-Control-Allow-Origin: *");

//grab the POSTed input msg
$inputMsg = json_decode(file_get_contents('php://input'), true);

/* Looks like:

{
  "attachments": [],
  "avatar_url": "http://i.groupme.com/123456789",
  "created_at": 1302623328,
  "group_id": "1234567890",
  "id": "1234567890",
  "name": "John",
  "sender_id": "12345",
  "sender_type": "user",
  "source_guid": "GUID",
  "system": false,
  "text": "Hello world ☃☃",
  "user_id": "1234567890"
}

*/


//Kill the process if the last msg sent was from this bot
if($inputMsg['sender_id'] == 362006){ //Harambe bot sender id
    exit;
}

//if Marcus says anything
if($inputMsg['sender_id'] == 198370909){
    send('SHUT UP MARCUS');
}

//if anyone mentions the iShana, Ishana, or ishana
if(!(strpos($inputMsg['text'], 'iShana') === false) || !(strpos($inputMsg['text'], 'Ishana') === false)  || !(strpos($inputMsg['text'], 'ishana') === false)){
    $text = "That's one small step for man, one giant leap for mankind.";
    send($text);
}

//if anyone mentions the moon or lunar
if(!(strpos($inputMsg['text'], 'moon') === false) || !(strpos($inputMsg['text'], 'lunar') === false){
    $text = "That's one small step for man, one giant leap for mankind.";
    send($text);
}

//if anyone mentions lauren
if(!(strpos($inputMsg['text'], 'lauren') === false) || !(strpos($inputMsg['text'], 'Lauren') === false)){
    $text = "smh lauren lol";
    send($text);
}


/**
 * Sends the $text to the group as Harambe
 * @param $text
 */
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

//Hannah Tucker Must Live:
/*
 * {
      "id": "26471162",
      "group_id": "26471162",
      "name": "Hannah Tucker Must Live",
      "phone_number": "+1 6305340526",
      "type": "private",
      "description": "",
      "image_url": "https://i.groupme.com/1024x923.jpeg.882c8d99bd334e6fa57046624ed1f384",
      "creator_user_id": "20129434",
      "created_at": 1478100448,
      "updated_at": 1482420069,
      "office_mode": false,
      "share_url": null,
      "members": [
        {
          "user_id": "20129434",
          "nickname": "Devon Papandrew",
          "image_url": "https://i.groupme.com/748x750.jpeg.909014941fe847d98c6ad371642dc2ed",
          "id": "198370907",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "6225420",
          "nickname": "Rohan Gothwal",
          "image_url": "https://i.groupme.com/638x640.jpeg.466ec141bb094286a8f9fce236e1665e",
          "id": "198370908",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "7648679",
          "nickname": "Marcus",
          "image_url": "https://i.groupme.com/1022x1024.jpeg.8007618b2d42489f94074cc7fe4ce503",
          "id": "198370909",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "3046944",
          "nickname": "Steven Giordano",
          "image_url": "http://i.groupme.com/640x640.jpeg.f90c053bfeb74f70981a5f6febbaf8d2",
          "id": "198370910",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "4889513",
          "nickname": "Kathryn Papandrew",
          "image_url": "http://i.groupme.com/89b3a7200c420131ea951e7edf74ca1a",
          "id": "198370911",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "336827",
          "nickname": "aldrin",
          "image_url": "https://i.groupme.com/750x750.jpeg.b8746029e6f04ff6990c92b414daf2f0",
          "id": "198370912",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "10673667",
          "nickname": "Eric W",
          "image_url": "http://i.groupme.com/eb730580352d0131420c22000aef140c",
          "id": "198370913",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "6609323",
          "nickname": "Hannah Tucker",
          "image_url": "https://i.groupme.com/640x640.jpeg.07c4d9b61d404f44aec7dcd1f392bf60",
          "id": "198371176",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "9104692",
          "nickname": "Marissa Pandes",
          "image_url": "http://i.groupme.com/200x354.jpeg.e0c9e7de9d4b479aa9a7a69765b91ec7",
          "id": "198378386",
          "muted": false,
          "autokicked": false
        },
        {
          "user_id": "20119127",
          "nickname": "Nino H",
          "image_url": "https://i.groupme.com/1024x769.jpeg.6b91453b2b1842c19a457f79d5ab905a",
          "id": "198378387",
          "muted": false,
          "autokicked": false
        }
      ],
      "messages": {
        "count": 2708,
        "last_message_id": "148242006972975849",
        "last_message_created_at": 1482420069,
        "preview": {
          "nickname": "Eric W",
          "text": "Your weight (rounded?) in lbs at birth. Or his",
          "image_url": "https://i.groupme.com/eb730580352d0131420c22000aef140c",
          "attachments": [

          ]
        }
      },
      "max_members": 200
    }
 */

