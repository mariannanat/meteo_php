<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>METEO</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<?php
$file_content = file_get_contents("./data/city.list.json", FILE_USE_INCLUDE_PATH);

$cities = json_decode($file_content);
var_dump($cities);
?>
    <header>
    <h1>Previsione di oggi per:</h1>
    </header>
    <main>
    <!-- form -->
    <form action="meteo.php" method="GET">
    <select id="city" name="city" required>
     
     <?php
     $index = 0;
     foreach ( $cities as $city){

        if($index >100) {
            break;
        }
     printf ("<option value='%s'>%s</option>", $city->id, $city->name);

     $index++;

    }
    ?>
    </select>
    <input type="submit" value="Mostra previsioni" />

    </form>
    </main>
    <footer>
    Developed with heart by Marianna
    </footer>
</body>
</html>