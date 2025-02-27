<?php
    use Model\BooksModel;

    $booksModel = new BooksModel();
    $books = $booksModel->getBooksUser();
?>

<div class="cancel-book">
    <?php
        if(isset($_POST["hotel_id"])){
            $booksModel->cancelBook();
        }
    ?>
</div><!-- /.cancel-book -->

<div class="cancelar-book-wp">
    <div class="card card-cancelar-book">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#f00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>
        <p class="cancel-heading">Cancelamento de Reserva.</p>
        <p class="cancel-description">Você Realmente Quer Cancelar a sua Reserva?</p>

        <div class="buttonContainer">
            <button class="btn-accept-cancel">Cancelar Reserva</button>
        <button class="btn-back-cancel">Voltar</button>
        </div>
    </div><!--cancelar-book-->
</div><!-- /.cancelar-book-wp -->

<section class="info-user">
    <div class="container">
        <h2 class="tittle-main"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; position: relative; top: -2px;" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-hat">
                        <path d="M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5" />
                        <path d="M14 6a6 6 0 0 1 6 6v3" />
                        <path d="M4 15v-3a6 6 0 0 1 6-6" />
                        <rect x="2" y="15" width="20" height="4" rx="1" />
                    </svg> Reservas Efetuadas</h2>

        <div class="books-hotels-wp" <?php echo (!$books) ? 'style="display: block"' : 'style="display: grid; grid-template-columns: repeat(3, 1fr);"'; ?>>
            <?php if(!$books){ ?>
                <div class="hotels-empty">
                    <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="#6a4835" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-hat">
                            <path d="M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5" />
                            <path d="M14 6a6 6 0 0 1 6 6v3" />
                            <path d="M4 15v-3a6 6 0 0 1 6-6" />
                            <rect x="2" y="15" width="20" height="4" rx="1" />
                        </svg>
                    <h3 class="tittle-empty-hotels-saved">Você ainda não possui reservas</h3>
                    <p class="desc-main">Explore o nosso site e descubra hoteis que vão agradar a você</p>
                    <p class="desc-second">Clique no botão abaixo para ir para a seção de Rooms e realizar a sua primeira reserva</p>
                    <a class="secao-rooms" href="<?php echo PATH_PAGES; ?>rooms/"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="vertical-align: middle;position: relative; top: -1px;"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg> Seção Rooms</a>
                </div><!-- /.hotels-empty -->
            <?php }else{ 
                foreach ($books as $key => $value) { ?>
                    <div class="hotels-box">
                        <div class="hotels-img">
                            <figure><img src="<?php echo $booksModel->getHotelsBookedByUser($value[0])[$key][1]; ?>" alt="Foto do Hotel" srcset=""></figure>
                        </div>

                        <div class="hotels-description">
                            <h3 class="tittle-name-hotel"><?php echo $booksModel->getHotelsBookedByUser($value[0])[$key][2]; ?></h3>
                            <p class="location-hotel"><?php echo $booksModel->getHotelsBookedByUser($value[0])[$key][3] . " - " .$booksModel->getHotelsBookedByUser($value[0])[$key][4]; ?></p>
                            
                            <div class="info-book-user">
                                <h3 class="tittle-info-book-user">Informações da Reserva</h3>
                                <p><b style="color:#6a4835;">Check-in:</b> <?php echo $value[1]; ?></p>
                                <p><b style="color:#6a4835;">Check-out:</b> <?php echo $value[2]; ?></p>
                                <p><b style="color:#6a4835;">Nights:</b> <?php echo $value[3]; ?></p>
                                <p><b style="color:#6a4835;">Person:</b> <?php echo $value[4]; ?></p>
                                <p class="price"><b style="color: #6a4835;;">Preço Final: </b><?php echo $value[5]; ?></p>
                            </div><!-- /.info-book-user -->
                        </div>

                        <div class="btn-hotel">
                            <button class="cancelar-book">Cancelar Reserva <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left: 2px;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                                    <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                                    <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                                    <path d="M12 4v6" />
                                    <path d="M2 18h20" />
                                </svg></button>
                        </div>

                        <input type="hidden" name="hotel" id="hotel_id" value="<?php echo $booksModel->getHotelsBookedByUser($value[0])[$key][0]; ?>">
                    </div><!-- /.hotels-box -->
            <?php }} ?>
        </div><!--books-hotels-wp-->
        <br><br><br><br><br>
    </div><!-- /.container -->
</section>
</main>

<script defer src="<?php echo PATH_INTERATIONS;?>js/func.userPatnerPage.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script defer src="<?php echo PATH_INTERATIONS;?>js/ajax.books.js"></script>
