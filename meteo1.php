<?php

$apiKey = "cc678f08b1504bedb74854e4a1a725c4";

$cityDt = $_GET['list.dt'];
$cityName = $_GET ['city.name'];
$apiKey = "cc678f08b1504bedb74854e4a1a725c4";
$openWeatherMapUrl = "http://api.openweathermap.org/data/2.5/forecast?q={$cityName}&appid={$apiKey}";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $openWeatherMapUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

$file_content = file_get_contents("./data/rome.json", FILE_USE_INCLUDE_PATH);
$romes = json_decode($file_content);
//var_dump($romes);

$index = 0;

foreach ( $romes as $rome) {

 if ($index > 3) {
     break;
 }
 

 $index++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
   <header>
   <h1>PREVISIONI ROMA PROSSIME 3 ORE:</h1>
   </header>
</body>
</html>