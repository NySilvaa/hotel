<?php
   use \Model\HomeModel;
?>

<section class="data-user-book">
    <div class="container">
        <div class="data-user-book-wp">
            <div class="data-book-box">
                <label for="location" class="book-title">Location</label>
                <input type="text" id="location" name="location" placeholder="Choose Your Destiny" value="<?php echo recoverPost('destiny'); ?>">

                <div class="modal">
                    <form class="form" method="post" id="form-location-destiny">
                        <div class="separator">
                            <hr class="line">
                            <p>Select Your Location</p>
                            <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                            <div class="input_container">
                                <label for="origin" class="input_label">De Onde Está Saindo? </label>
                                <input id="origin" class="input_field" type="text" name="origin" title="Inpit title" placeholder="Currently Location" value="SP - BRAZIL">
                            </div>
                            <div class="input_container">
                                <label for="destiny" class="input_label">Para Onde Está Indo?</label>
                                <input id="destiny-country" class="input_field destiny-country" type="text" name="destiny-country" title="Inpit title" placeholder="The Country">
                                <input id="destiny-city" class="input_field destiny-location" type="text" name="destiny" title="Inpit title" placeholder="Your Destiny">
                                <ul id="list-country"></ul>
                            </div>
                        </div>
                            <button class="purchase--btn" name="findOutDestiny">Verificar Lugares Disponíveis</button>
                        </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="person" class="book-title">Person</label>
                <input type="text" id="person" name="person" placeholder="Choose the Count"  value="<?php 
                                    if(!isset($_POST['count-person']))
                                        echo $_SESSION['count'];
                                    else
                                        echo recoverPost('count-person-field'); ?> Person"/>

                <div class="modal">
                        <form class="form" method="post">
                        <div class="separator">
                            <hr class="line">
                            <p>Select the Count of People</p>
                            <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                            <div class="input_container">
                                <label for="password_field" class="input_label">Person </label>
                                <input id="password_field" class="input_field" type="text" name="count-person-field" title="Inpit title" placeholder="Type the count of person">
                            </div>
                        </div>
                            <button class="purchase--btn" name="count-person">Registrar <?php 
                                    if(!isset($_POST['count-person']))
                                        echo $_SESSION['count'];
                                    else
                                        echo recoverPost('count-person-field');
                            ?> Pessoas</button>
                        </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="check-in" class="book-title">Check-in</label>
                <input type="text" id="check-in" name="check-in" placeholder="Check-in Date" value="<?php echo $_SESSION['date-check-in']; ?>"/>

                <div id="calendar"></div>
            </div><!-- /.data-book-box -->
            
            <div class="data-book-box">
                <label for="check-out" class="book-title">Check-out</label>
                <input type="text" id="check-out" name="check-out" placeholder="Check-out Date" value="<?php echo $_SESSION['date-check-out']; ?>">

                <div id="calendar"></div>
            </div><!-- /.data-book-box-->
        </div>
        
        <div class="search-box">
            <label for="search-place" class="book-tittle">Find Specific Place</label>
            <input type="text" id="search-place" name="search-place" placeholder="Ex.: Ibis Hotel">
            <button type="submit" name="btn-search-place"><i class="bx bx-search"></i></button>
        </div><!-- /.search-box -->
    </div><!-- /.container -->
</section>

<main id="hotels">
    <div class="container">
        <h2 class="hotels--title">Hotels in <p><?php echo recoverPost('destiny'); ?></p></h2>
        <span class="count-hotels">Foram encontrados <p>280</p> Premium Hotels</span>

        <div class="hotels-wp">
            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo PATH_INTERATIONS; ?>images/img1.jpg" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, <?php echo recoverPost('destiny-country')?></p>
                    <div class="classification">
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                        <span class="stars"><i class="bx bxs-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->
        </div><!-- /.hotels-wp -->
    </div><!-- /.container -->
    
    <!-- TO DO: FAZER UM SISTEMA DE PAGINAÇÃO ---->
</main>