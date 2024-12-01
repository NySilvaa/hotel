<?php
    use \Model\HomeModel;

    $homeModel = new HomeModel();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="hotel de luxo">
    <meta name="keywords" content="hotel;luxo;reservas;front-end;back-end;viagens;">
    <meta name="author" content="Nycolas silva">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS;?>css/style.home.css">
    <title>Home | Explore as nossas diversas opções</title>
</head>
<body> 
    <?php
         if(isset($_POST['prices'])){
           if($homeModel->valuesInvalid($_POST)){
            // PASSOU PELA VERIFICAÇÃO
                header("Location: ".PATH_PAGES."rooms/");
           }
        }
    ?>

    <section class="menu-below">
        <a href="#" class="book-accomodation txt-white" id="book-accomodation">Book Accommodation <i class="bx bx-bookmark"></i></a>

        <nav class="navigation-menu-below">
            <ul>
                <li><a href="#">Our rooms</a></li>
                <li><a href="#">Swimming Pools</a></li>
                <li><a href="#">Food and drinks</a></li>
                <li><a href="#">Meeting rooms</a></li>
                <li><a href="#">Events and weddings</a></li>
            </ul>
        </nav>

        <a href="#" class="hamburguer"><i class='bx bx-menu'></i></a>
    </section>

    <main id="entrada">
        <video src="<?php echo PATH_INTERATIONS;?>images/bg-video.mp4" autoplay muted loop></video>
        <div class="overlay"></div>

        <nav class="navigation">
            <figure class="logo"><a href="#" class="txt-white"><i class='bx bxs-drink' ></i></a></figure>

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
                    <div id="calendar"></div>
                    
                    <form action="" method="post" id="form-book">
                        <div class="select-options-rooms">
                        <i class='bx bx-caret-down' id="btn-select"></i>

                        <select name="option" id="select">
                            <option value="Escolha uma Opção" selected disabled>Choose the Option</option>
                            <option value="Roro's Hotel">Roro's Hotel</option>
                            <option value="Airbnb">Airbnb</option>
                            <option value="Pousada">Pousada</option>
                            <option value="Roro's Rooms">Roro's Rooms</option>
                        </select>
                        </div>

                        <div class="checks">
                            <div class="check-in selected">
                                <p>Check-in Date</p>

                                <div class="date">
                                    <h3 id="day-check-in"></h3>
                                    <p id="month-check-in"> <br> </p>
                                    <i class='bx bx-caret-down'></i>
                                    <input type="hidden" name="date-check-in" value="">
                                </div>
                            </div>

                            <div class="check-out">
                                <p>Check-out Date</p>

                                <div class="date">
                                    <h3 id="day-check-out"></h3>
                                    <p id="month-check-out"> <br></p>
                                    <i class='bx bx-caret-down'></i>
                                    <input type="hidden" name="date-check-out" value="">
                                </div>
                            </div>
                        </div><!--checks -->

                        <div class="choose-rooms">
                            <p>Guests per room</p>
                            <div class="count-guests-room">
                                <span class="sub" id="sub"><i class="bx bx-minus"></i></span>
                                <input type="number" name="count" id="count" value="1" min="1" max="5">
                                <span class="add" id="add"><i class='bx bx-plus'></i></span>
                            </div>
                            <a href="#">Multiples Rooms?</a>
                        </div>

                        <button type="submit" name="prices">View rooms and prices <i class='bx bx-caret-right'></i></button>
                    </form>
                </div>
            </section>
        </div><!-- /.container -->  
    </main>

    <section class="diferenciais">
        <div class="container">
           <div class="diferenciais-wrapper">
                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img2.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img4.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img2.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img4.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img2.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->

                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg " alt="" srcset=""></figure>
                    </div>
                    <h2>Our Rooms</h2>
                    <a href="#">Explore <i class='bx bx-caret-right'></i></a>
                </div><!-- /.box-diferenciais -->
           </div><!-- /.diferenciais-wrapper -->   
        </div><!--container-->
    </section>

   <section class="room-highlight">
    <div class="container">
        <div class="room-highlight-top">
            <div class="bg-highlight">
                <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img3.jpg" alt="" srcset=""></figure>
            </div>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Dolorum quasi asperiores sunt rerum aut delectus, 
                fuga itaque expedita perspiciatis molestiae animi quia.</p>
        </div><!-- /.room-highlight-top -->
        
        <div class="main-highlight">
            <div class="txt-highlight">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque aliquid alias vel consequatur placeat repellendus consequuntur et ut minima voluptatem, inventore earum molestias voluptates excepturi magnam quisquam sed? Repellendus, voluptatibus!</p>
                <a href="#" class="txt-white">Book Now <i class='bx bx-bookmark' ></i></a>
                <a href="#">Explore the room <i class='bx bx-world'></i></a>
            </div>

            <div class="bg-main1">
                <div class="bg-main-wp">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img5.jpg" alt=""></figure>
                </div>
            </div>
        </div><!-- /.main-highlight -->
    </div>
   </section>

   <section class="about-us">
        <div class="container">
            <div class="box-about-us">
                <h2 class="txt-white">Sustainability</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, ex qui numquam tempore dicta velit repudiandae nemo, vel molestiae soluta odio! Asperiores, minima laboriosam consectetur consequuntur illo a error provident!</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box-about-us">
                <h2>Sustainability</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, ex qui numquam tempore dicta velit repudiandae nemo, vel molestiae soluta odio! Asperiores, minima laboriosam consectetur consequuntur illo a error provident!</p>
                <a href="#" class="btn">Read More</a>
            </div>
        </div>
   </section>

   <section class="video-promotional">
    <div class="container">
        <div class="video-promotional-wp">
            <video src="<?php echo PATH_INTERATIONS;?>images/bg-video2.mp4" autoplay muted loop></video>
            <p>Experiences</p>

            <h2 class="txt-white">Experience the better from summer</h2>
            <a href="#" class="btn">Explore</a>
        </div>
        <!-- /.video-promotional-wp -->
    </div>
   </section>

   <section class="img-grattitude">
        <div class="container">
            <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img3.jpg" alt="" srcset=""></figure>
            <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img5.jpg" alt="" srcset=""></figure>
            <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img3.jpg" alt="" srcset=""></figure>
        </div>
   </section>
