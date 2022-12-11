<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Potato weather</title>
</head>
<body>
    <div class="container">
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
                <form class="search" action="findCity" method="POST">
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
                    <button>Search</button>
                </form>
            </div>     
        </div>
    </div>
</body>