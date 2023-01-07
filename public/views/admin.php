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
                    </div>
            </div>
        </div>
    </div>
</body>