<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/afb0712a36.js" crossorigin="anonymous"></script>
    <title>Potato weather</title>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <div class="search-div">
                <form>
                    <div class = "div-cont">
                        <div class="localization">
                            <?= $city->getName()?>, <?= $city->getCountry()?>
                        </div>
                        <div class="weather">
                            <img src="public/img/weather-icons/clouds.svg">

                        </div>
                    </div>
                    <div class = "div-cont">
                        <div class="temperature-cont">
                            <?= $city->getWeather()->getValue()?>°<?= $city->getWeather()->getScale()?>
                        </div>
                    </div>
                    <div class = "div-cont">
                        <button>Tomorrow</button>
                        <button>Rain</button>
                        <button>Wind</button>
                    </div>
                </form>
            </div>     
        </div>
    </div>
</body>