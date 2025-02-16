<?php
    use \Model\HomeModel;

    $homeModel = new HomeModel();
    $listHotelsOurRooms = $homeModel->listHotelsSectionOurRooms();
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
    <link rel="shortcut icon" href="<?php echo PATH_INTERATIONS; ?>images/ico/cisne.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS;?>css/style.home.css">
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS;?>css/style.headerAndFooter.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

    <div class="box-loader"><div class="loader"></div></div>

    <section class="menu-below">
        <a href="#" class="book-accomodation txt-white" id="book-accomodation">Book Accommodation <i class="bx bx-bookmark"></i></a>

        <nav class="navigation-menu-below">
            <ul>
                <li><a href="#ourRooms">Our rooms</a></li>
                <li><a href="#filials">Filials</a></li>
                <li><a href="#sustainability">Sustainability</a></li>
                <li><a href="#events">Events and weddings</a></li>
                <li><a href="#meetingRooms">Meeting rooms</a></li>
            </ul>
        </nav>

        <a href="#" class="hamburguer"><i class='bx bx-menu'></i></a>
    </section>

    <main id="entrada" data-aos="fade-in" data-aos-offset="200" data-aos-delay="50">
        <video src="<?php echo PATH_INTERATIONS;?>images/bg-video.mp4" autoplay muted loop></video>
        <div class="overlay"></div>

        <nav class="navigation">
            <figure class="logo"><a href="#" class="txt-white"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" stroke="#fff" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-origami"><path d="M12 12V4a1 1 0 0 1 1-1h6.297a1 1 0 0 1 .651 1.759l-4.696 4.025"/><path d="m12 21-7.414-7.414A2 2 0 0 1 4 12.172V6.415a1.002 1.002 0 0 1 1.707-.707L20 20.009"/><path d="m12.214 3.381 8.414 14.966a1 1 0 0 1-.167 1.199l-1.168 1.163a1 1 0 0 1-.706.291H6.351a1 1 0 0 1-.625-.219L3.25 18.8a1 1 0 0 1 .631-1.781l4.165.027"/></svg></a></figure>

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
                    <a href="<?php echo PATH_PAGES; ?>rooms/" class="txt-white">See our rooms <svg style="vertical-align: middle; margin-left:5px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg></a>
                </div>

                <div class="checks-form">
                    <div id="tooltip-books">
                    </div>
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
                                <span class="sub" id="sub"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus"><path d="M5 12h14"/></svg></span>
                                <input type="text" name="count" id="count" value="1" min="1" max="5">
                                <span class="add" id="add"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg></span>
                            </div>
                            <a href="#">Multiples Rooms?</a>
                        </div>

                        <button type="submit" name="prices">View rooms and prices <svg style="vertical-align: middle; margin-left:2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-open"><path d="M13 4h3a2 2 0 0 1 2 2v14"/><path d="M2 20h3"/><path d="M13 20h9"/><path d="M10 12v.01"/><path d="M13 4.562v16.157a1 1 0 0 1-1.242.97L5 20V5.562a2 2 0 0 1 1.515-1.94l4-1A2 2 0 0 1 13 4.561Z"/></svg></button>
                    </form>
                </div>
            </section>
        </div><!-- /.container -->  
    </main>

    <section class="diferenciais" id="ourRooms" data-aos="fade-right" data-aos-offset="200" data-aos-delay="50">
        <div class="container">
            <button class="btn-left-our-rooms"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></button>
            <button class="btn-right-our-rooms"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></button>
           <div class="diferenciais-wrapper">

           <?php foreach ($listHotelsOurRooms as $value) {
            # code...
           ?>
                <div class="box-diferenciais">
                    <div class="box-diferenciais--img">
                        <figure><img src="<?php echo $value[2]; ?>" alt="" srcset=""></figure>
                    </div>
                    <h2><?php echo $value[1]; ?></h2>
                    <span class="priceOurRooms"><b>R$ <?php echo $value[4].",00" ?></b> por noite</span> <span class="avaliacoes" style="float: right; margin-right: 50px; display: inline-block;"><svg style="vertical-align: middle; position: relative; top: -3px;" xmlns="http://www.w3.org/2000/svg" 
                        width="20" height="20" viewBox="0 0 24 24" fill="#ffc400" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                        <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1.294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 
                            0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg> <?php echo $value[3] ?> </span>

                            <br>
                    <a href="<?php echo PATH_PAGES."hospedagem?".$value[0]; ?>" target="_blank">Explore <svg style="vertical-align: middle; margin-left:2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-open"><path d="M13 4h3a2 2 0 0 1 2 2v14"/><path d="M2 20h3"/><path d="M13 20h9"/><path d="M10 12v.01"/><path d="M13 4.562v16.157a1 1 0 0 1-1.242.97L5 20V5.562a2 2 0 0 1 1.515-1.94l4-1A2 2 0 0 1 13 4.561Z"/></svg></a>
                </div><!-- /.box-diferenciais -->
            <?php }; ?>
           </div><!-- /.diferenciais-wrapper -->   
        </div><!--container-->
    </section>

   <section class="room-highlight" id="filials" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">
    <div class="container">
        <div class="room-highlight-top">
            <div class="bg-highlight" data-aos="fade-right" data-aos-offset="200" data-aos-delay="50">
                <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img3.jpg" alt="" srcset=""></figure>
            </div>

            <p data-aos="fade-left" data-aos-offset="200" data-aos-delay="50">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Dolorum quasi asperiores sunt rerum aut delectus, 
                fuga itaque expedita perspiciatis molestiae animi quia.</p>
        </div><!-- /.room-highlight-top -->
        
        <div class="main-highlight">
            <div class="txt-highlight" data-aos="fade-down" data-aos-offset="200" data-aos-delay="50">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque aliquid alias vel consequatur placeat repellendus consequuntur et ut minima voluptatem, inventore earum molestias voluptates excepturi magnam quisquam sed? Repellendus, voluptatibus!</p>
                <div class="mobile-device"></div>
                <a href="#" class="txt-white">Book Now <i class='bx bx-bookmark' ></i></a>
                <a href="#">Explore the room <svg style="vertical-align: middle; margin-left:2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-open"><path d="M13 4h3a2 2 0 0 1 2 2v14"/><path d="M2 20h3"/><path d="M13 20h9"/><path d="M10 12v.01"/><path d="M13 4.562v16.157a1 1 0 0 1-1.242.97L5 20V5.562a2 2 0 0 1 1.515-1.94l4-1A2 2 0 0 1 13 4.561Z"/></svg></a>
            </div>

            <div class="bg-main1">
                <div class="bg-main-wp" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img5.jpg" alt=""></figure>
                </div>
            </div>
        </div><!-- /.main-highlight -->
    </div>
   </section>

   <section class="about-us" id="sustainability">
        <div class="container">
            <div class="box-about-us" data-aos="fade-right" data-aos-offset="200"cdata-aos-delay="50">
                <h2 class="txt-white">Sustainability</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, ex qui numquam tempore dicta velit repudiandae nemo, vel molestiae soluta odio! Asperiores, minima laboriosam consectetur consequuntur illo a error provident!</p>
                <a href="<?php echo PATH_PAGES; ?>aboutUs/" class="btn">Read More <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left:2px;" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg></a>
            </div>

            <div class="box-about-us" data-aos="fade-left" data-aos-offset="200" data-aos-delay="50">
                <h2>Sustainability</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, ex qui numquam tempore dicta velit repudiandae nemo, vel molestiae soluta odio! Asperiores, minima laboriosam consectetur consequuntur illo a error provident!</p>
                <a href="<?php echo PATH_PAGES; ?>aboutUs/" class="btn">Read More <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left:2px;" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg></a>
            </div>
        </div>
   </section>

   <section class="video-promotional" id="events" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">
    <div class="container">
        <div class="video-promotional-wp">
            <video src="<?php echo PATH_INTERATIONS;?>images/bg-video2.mp4" autoplay muted loop width="90%"></video>
            <p data-aos="fade-down" data-aos-offset="200" data-aos-delay="50">Experiences</p>

            <h2 class="txt-white" data-aos="fade-right" data-aos-offset="200" data-aos-delay="50">Experience the better from summer</h2>
            <a href="<?php echo PATH_PAGES; ?>rooms/" class="btn" data-aos="fade-right" data-aos-offset="200" data-aos-delay="100">Explore <svg style="vertical-align: middle; margin-left:2px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-open"><path d="M13 4h3a2 2 0 0 1 2 2v14"/><path d="M2 20h3"/><path d="M13 20h9"/><path d="M10 12v.01"/><path d="M13 4.562v16.157a1 1 0 0 1-1.242.97L5 20V5.562a2 2 0 0 1 1.515-1.94l4-1A2 2 0 0 1 13 4.561Z"/></svg></a>
        </div>
        <!-- /.video-promotional-wp -->
    </div>
   </section>

   <section class="img-grattitude" id="meetingRooms">
        <div class="container">
            <figure data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"><img src="<?php echo PATH_INTERATIONS; ?>images/img3.jpg" alt="" srcset=""></figure>
            <figure data-aos="fade-down" data-aos-offset="200" data-aos-delay="50"><img src="<?php echo PATH_INTERATIONS; ?>images/img5.jpg" alt="" srcset=""></figure>
            <figure data-aos="fade-right" data-aos-offset="200" data-aos-delay="50"><img src="<?php echo PATH_INTERATIONS; ?>images/img3.jpg" alt="" srcset=""></figure>
        </div>
   </section>