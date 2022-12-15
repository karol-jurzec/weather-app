
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
                <div class="history-weather">
                    <img src="/public/img/weather-icons/clouds.svg">
                    34 Cracow, Poland
                </div>
                <div class="history-weather">
                    <img src="/public/img/weather-icons/clouds.svg">
                    25 Cracow, Poland
                </div>
                <div class="history-weather">
                    <img src="/public/img/weather-icons/clouds.svg">
                    21 Cracow, Poland
                </div>
                <div class="history-weather">
                    <img src="/public/img/weather-icons/clouds.svg">
                    22 Cracow, Poland
                </div>
            </div>
            <div class="loged-user">
                <img src="/public/img/user.svg">
                <div class="user-info">
                    <div class="email">test@gmail.com</div>
                    <div class="logout"><a href="login">Sign out</a> </div>
                </div>
            </div>
        </div>
        <div class="search-container">
            <div class="search-div">
                <form class="main">
                    <div class = "div-cont">
                        <div class="localization">
                            Poland, Cracow
                        </div>
                        <div class="weather">
                            <img src="public/img/weather-icons/clouds.svg">
                        </div>
                    </div>
                    <div class = "div-cont">
                        <div class="temperature-cont"><?= $weather->getTemperature()?>°C</div>
                    </div>
                    <div class = "div-properties">
                        <div class="property-column">
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                        </div>
                        <div class="property-column">
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                            <div class="div-data">
                                Wind: W 7km/h
                            </div>
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                            <div class="div-data">
                                Visibility: 16km/h
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>