<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Potato weather</title>
</head>
<body>
<div class="container">
    <div class="user-panel">
        <div class="history">
            <?php var_dump($weathers)?>
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
                <div class="logout"><a href="login">Sign out</a></div>
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
    <div class="search-container">
        <div class="search-div">
            <form class="search" action="find" method="POST">
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
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
</body>