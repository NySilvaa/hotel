<?php
   use \Model\HomeModel;
?>

<section class="data-user-book">
    <div class="container">
        <div class="data-user-book-wp">
            <div class="data-book-box">
                <label for="location" class="book-title">Location</label>
                <input type="text" id="location" name="location" placeholder="Choose Your Destiny">

                <div class="modal">
                        <form class="form">
                        <div class="separator">
                            <hr class="line">
                            <p>Select Your Location</p>
                            <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                            <div class="input_container">
                                <label for="password_field" class="input_label">De Onde Está Saindo? </label>
                                <input id="password_field" class="input_field" type="text" name="input-name" title="Inpit title" placeholder="Currently Location">
                            </div>
                            <div class="input_container">
                                <label for="password_field" class="input_label">Para Onde Está Indo?</label>
                                <input id="password_field" class="input_field" type="text" name="input-name" title="Inpit title" placeholder="Your Destiny">
                            </div>
                            <div class="input_container">
                               <span class="input_label">Não se preocupe!!! Escolha apenas o país para onde você gostaria de ir que nós iremos mostrar todas as opções disponíveis. :)</span>
                            </div>
                        </div>
                            <button class="purchase--btn">Verificar Lugares Disponíveis</button>
                        </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="person" class="book-title">Person</label>
                <input type="text" id="person" name="person" placeholder="Choose the Count" />

                <div class="modal">
                        <form class="form">
                        <div class="separator">
                            <hr class="line">
                            <p>Select the Count of People</p>
                            <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                            <div class="input_container">
                                <label for="password_field" class="input_label">Person </label>
                                <input id="password_field" class="input_field" type="text" name="input-name" title="Inpit title" placeholder="Currently Location">
                            </div>
                        </div>
                            <button class="purchase--btn">Registrar {Número} Pessoas</button>
                        </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="check-in" class="book-title">Check-in</label>
                <input type="text" id="check-in" name="check-in" placeholder="Check-in Date" />

                <div id="calendar"></div>
            </div><!-- /.data-book-box -->
            
            <div class="data-book-box">
                <label for="check-out" class="book-title">Check-out</label>
                <input type="text" id="check-out" name="check-out" placeholder="Check-out Date">
                <div id="calendar"></div>
            </div><!-- /.data-book-box-->
        </div>
        
        <div class="search-box">
            <label for="search-place" class="book-tittle">Find Specific Place</label>
            <input type="text" id="search-place" name="search-place" placeholder="Ex.: Ibis Hotel">
        </div><!-- /.search-box -->
    </div><!-- /.container -->
</section>

<main id="hotels">
    <div class="container">
        <h2 class="hotels--title">Hotels in {NAME-HOTEL}</h2>
        <span class="count-hotels">Foram encontrados {count} Premium Hotels</span>

        <div class="hotels-wp">
            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a href="#">Explorar Quarto</a>
                </div>
            </div><!-- /.hotels-box -->

            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="" alt="" srcset=""></figure>
                    <a href="#" class="favorite"><i class="bx bx-heart"></i></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel">Harmony Suites</h3>
                    <p class="location-hotel">Blisful Street, South Jakarta</p>
                    <div class="classification">
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
                        <span class="stars"><i class="bx bx-star"></i></span>
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