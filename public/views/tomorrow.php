
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/afb0712a36.js" crossorigin="anonymous"></script>
    <title>Potato weather</title>
</head>
<body>
    <div class="container">
        <div class="user-panel">
            <div class="history">
                <?php foreach ($weathers as $city_weather): ?>
                    <div id="<?= $city_weather[0]->getId(); ?>" class="history-weather">
                        <img src="/public/img/weather-icons/clouds.svg">
                        <?= $city_weather[0]->getTemperature(); ?>° <?= $city_weather[1]->getName(); ?>, <?= $city_weather[1]->getCountry(); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="loged-user">
                <img src="/public/img/user.svg">
                <div class="user-info">
                    <div class="email">test@gmail.com</div>
                    <div class="logout"><a href="login">Sign out</a> </div>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="main-div">
                <form class="main">
                    <div class = "div-cont">
                        <div class="localization">
                            <?= $city->getName()?>, <?= $city->getCountry()?>
                        </div>
                        <div class="weather">
                            <img src="public/img/weather-icons/<?= $weather->getMain()?>.svg">
                        </div>
                    </div>
                    <div class = "div-cont">
                        <div class="temperature-cont">
                            <?= $weather->getTemperature()?>°C
                        </div>
                    </div>
                    <div class = "div-properties">
                        <div class="property-column">
                            <div class="div-data">
                                Wind speed: <?= $weather->getWindSpeed()?>
                            </div>
                            <div class="div-data">
                                Wind gusts: <?= $weather->getWindGusts()?>
                            </div>
                            <div class="div-data">
                                Wind direction: <?= $weather->getWindDegree()?>
                            </div>
                            <div class="div-data">
                                Visibility: <?= $weather->getVisibility()?>
                            </div>
                        </div>
                        <div class="property-column">
                            <div class="div-data">
                                Visibility: <?= $weather->getVisibility()?>
                            </div>
                            <div class="div-data">
                                Wind: <?= $weather->getVisibility()?>
                            </div>
                            <div class="div-data">
                                Visibility: <?= $weather->getVisibility()?>
                            </div>
                            <div class="div-data">
                                Visibility:<?= $weather->getVisibility()?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>     
        </div>
    </div>
</body>