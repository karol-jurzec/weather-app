<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/afb0712a36.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/weather.js" defer></script>
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
                    <div class="email"><?php echo $_SESSION['email']; ?></div>
                    <div class="logout"><a href="login">Sign out</a> </div>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="main-div">
                    <div class="today">
                        <div class="arrow">
                            <img class="right-arrow" src="public/img/right.svg" onmousedown="toggleDiv('today', 'details')">
                        </div>
                        <div class = "div-cont">
                            <div class="localization">
                                <?= $city->getName()?>, <?= $city->getCountry()?>
                            </div>
                            <div class="weather">
                                <!--Tutaj ikona wczytana z klasy!!-->
                                <img src="public/img/weather-icons/<?= $weather->getMain()?>.svg">

                            </div>
                        </div>
                        <div class = "div-cont">
                            <div class="temperature-cont">
                                <?= $weather->getTemperature()?>°C
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="arrow">
                            <img class="left-arrow" src="public/img/left.svg" onmousedown="toggleDiv('details', 'today')">
                            <img class="right-arrow" src="public/img/right.svg" onmousedown="toggleDiv('details', 'tomorrow')">
                        </div>
                        <div class = "div-cont">
                            <div class="localization">
                                <?= $city->getName()?>, <?= $city->getCountry()?>
                            </div>
                            <div class="weather">

                            </div>
                        </div>
                        <div class = "div-cont">
                        </div>
                    </div>
                    <div class="tomorrow">
                        <div class="arrow">
                            <img class="left-arrow" src="public/img/left.svg" onmousedown="toggleDiv('tomorrow', 'details')">
                        </div>
                        <div class = "div-cont">
                            <div class="localization">
                                <?= $city->getName()?>, <?= $city->getCountry()?>
                            </div>
                            <div class="weather">
                                <!--Tutaj ikona wczytana z klasy!!-->
                                <img src="public/img/weather-icons/<?= $weather->getMain()?>.svg">

                            </div>
                        </div>
                        <div class = "div-cont">
                            <div class="temperature-cont">
                                <?= $weather->getTemperature()?>°C
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>