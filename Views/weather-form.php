<?php
$countryReader = new CountryReader();
$cities = $countryReader->get_cities("EG");
?>

<title>Document</title>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Static/css/style.css">
    <title>Webservices - Demo</title>
</head>
<body>
<header class="header-handle">
    <h1>Weather API</h1>
    <h3>All cities in Egypt</h3>
</header>
<form action="/show-weather" method="post">
    <section class="body-handle">
        <div>
            <p>Choose city:</p>
            <label>
                City Name
                <select name="listOfCities">
                    <option> -- choose city --</option>
                    <?php
                    foreach ($cities as $city) {
                        echo "<option value='" . $city["name"] . "'>" . $city["name"] . "</option>";
                    }
                    ?>
                </select>
            </label>
            <input type="submit" name="getWeather" value="Get Weather">
        </div>
</form>

<div id="#output">

</div>
</body>
</html>
