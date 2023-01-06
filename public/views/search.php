<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Potato weather</title>
</head>
<body>
<div class="container">
    <div class="user-panel">
        <div class="history">
            <?php foreach ($weathers as $weather): ?>
                <div id="<?= $weather[0]->getId(); ?>" class="history-weather">
                    <img src="/public/img/weather-icons/clouds.svg">
                    <?= $weather[0]->getTemperature(); ?>° <?= $weather[1]->getName(); ?>, <?= $weather[1]->getCountry(); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="loged-user">
            <img src="/public/img/user.svg">
            <div class="user-info">
                <div class="email">test@gmail.com</div>
                <div class="logout">
                    <form action="logout" method="POST"><button type="submit">Sign out</button></form>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="title-container">
            <div class="title">Potato Weather</div>
            <div class="sub-title">Check weather in your city</div>
        </div>
    </div>
    <div class="main-container">
        <div class="main-div">
            <form class="search" action="search" method="POST">
                <div class="message">
                    <?php if(isset($messages)){
                        foreach ( $messages as $message ) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <div class="desc">Weather in your city: </div>
                <input name="city" type="text" placeholder="Search city">
                <button class="button-el" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
</body>