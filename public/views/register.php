<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Potato weather</title>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <div class="search-div">
                <form class="register" action="login" method="POST">
                    <div class="message">
                       <?php if(isset($messages)){
                                foreach ( $messages as $message ) {
                                    echo $message;
                                }
                            } 
                       ?>
                    </div>
                    <input name="email" type="text" placeholder="email@email.com">
                    <input name="password" type="password" placeholder="password">
                    <input name="confirmedPassword" type="password" placeholder="confirm password">
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <input name="phone" type="text" placeholder="phone">
                    <button type="submit">Register</button>
                </form>
            </div>     
        </div>
    </div>
</body>