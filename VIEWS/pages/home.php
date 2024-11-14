<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="hotel de luxo">
    <meta name="keywords" content="hotel;luxo;reservas;front-end;back-end;viagens;">
    <meta name="author" content="Nycolas silva">
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS;?>css/style.home.css">
    <title>Home | Explore as nossas diversas opções</title>
</head>
<body>
    <main id="entrada">
        <video src="<?php echo PATH_INTERATIONS;?>images/bg-video.mp4" autoplay muted loop></video>
        <div class="overlay"></div>

            <nav class="navigation">
                <figure class="logo"><a href="#" class="txt-white">Logomarca</a></figure>

                <div class="name-center">
                    <h2 class="txt-white">Roros Hotel</h2>
                    <a href="#" class="txt-white">Roroshotelle - Roros Hotel</a>
                </div>

                <div class="idiomas txt-white">
                    <a href="#" class="port txt-white">Por</a> | <a href="#" class="eng txt-white">Eng</a>
                </div>
            </nav>

            <div class="container">
                <section class="chamada">
                    <div class="text-chamada">
                        <h1 class="txt-white">A Destination for Relaxation <br> Adventure and Memories</h1>
                        <a href="#" class="txt-white">See our rooms</a>
                    </div>

                    <div class="checks-form">
                        <form action="" method="post">
                            <select name="hotel" id="" disabled="disabled">
                                <option value="Teste">Teste</option>
                                <option value="Teste">Teste</option>
                                <option value="Teste">Teste</option>
                            </select>

                            <div class="checks">
                                <div class="check-in">
                                    <p>Check-in Date</p>

                                    <div class="date">
                                        <h3>10.</h3>
                                        <p>Octuber <br> 2024</p>
                                    </div>
                                </div>

                                <div class="check-out">
                                    <p>Check-out Date</p>

                                    <div class="date">
                                        <h3>10.</h3>
                                        <p>November <br> 2024</p>
                                    </div>
                                </div>
                            </div><!--checks -->

                            <div class="choose-rooms">
                                <p>Guests per room</p>
                                <input type="number" name="guest" id="" min="1" max="8">

                                <a href="#">Multiples Rooms?</a>
                            </div>

                            <button type="submit">View rooms and prices </button>
                        </form>
                    </div>
                </section>
            </div><!-- /.container -->  
    </main>

    <section class="menu-below">
        <a href="#" class="book-accomodation">Book Accommodation</a>

        <nav class="navigation-menu-below">
            <ul>
                <li><a href="#">Our rooms</a></li>
                <li><a href="#">Swimming Pools</a></li>
                <li><a href="#">Food and drinks</a></li>
                <li><a href="#">Meeting rooms</a></li>
                <li><a href="#">Events and weddings</a></li>
            </ul>
        </nav>

        <a href="#">Menu hamburguer</a>
    </section>
</body>
</html>