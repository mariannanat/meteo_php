<?php
$apiKey = "18e81bcbd64836fdceda9ce1e8bb381e";
$cityId = $_GET['city'];
$openWeatherMapUrl = "http://api.openweathermap.org/data/2.5/weather?id={$cityId}&appid={$apiKey}";

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Previsioni per <?php echo $data->name; ?> </title>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="./style/style.css">
</head>
<body>
<div class="weather-card">
<div>
<img src="<?php echo "http://openweathermap.org/img/wn/{$data->weather[0]->icon}@2x.png" ?>" alt="<?php echo $data->weather[0]->description; ?>" title="<?php echo $data->weather[0]->description; ?>" />
<div class="main-weather">
<h1><?php echo $data->name; ?></h1>
<p><?php echo $data->weather[0]->main; ?></p>
<p><?php echo date("l g:i a", $currentTime); ?> - <?php echo date("jS F, Y", $currentTime); ?></p>
</div>
</div>
<div>
<div class="temperature">
<span><span class="material-icons">thermostat</span>Temp. Max: <?php echo $data->main->temp_max; ?>°C</span>
<span><span class="material-icons">thermostat</span>Temp. Min: <?php echo $data->main->temp_min; ?>°C</span>
</div>
<div class="other-data">
<span><span class="material-icons">water_drop</span>Umidità: <?php echo $data->main->humidity; ?> %</span>
<span><span class="material-icons">air</span>Vento: <?php echo $data->wind->speed; ?> mph</span>
</div>
</div>
</div>
</body>
</html>