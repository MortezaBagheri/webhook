<?php
/**
 * Created by PhpStorm.
 * User: morteza
 * Date: 9/28/2018
 * Time: 8:27 PM
 */
if (isset($_GET['url'])) {
    $data = json_decode(file_get_contents("php://input"), true);
    curl($_GET['url'], base64_encode(json_encode($data)));
} else {
    echo "URL EMPTY";
}
function curl($url, $datas = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['request'=>$datas]);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
    return $res;
}
