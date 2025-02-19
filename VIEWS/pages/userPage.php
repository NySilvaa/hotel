    <section class="info-user">
        <section class="profile-data section-info">
            <div class="container">
                <div class="data-tittle d-flex">
                    <h3 class="tittle">Profile</h3>
                    <button class="edit">Edit <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg></button>
                </div><!-- /.data-tittle -->

                <div class="info-data d-flex">
                    <div class="fields">
                        <ul>
                            <li>Nome</li>
                            <li>CPF</li>
                            <li>RG</li>
                            <li>Data de Nascimento</li>
                            <li>Gênero</li>
                        </ul>
                    </div>

                    <div class="values-user">
                        <ul>
                            <li><?php echo $dataUser[0]; ?></li>
                            <li><?php echo $dataUser[1]; ?></li>
                            <li><?php echo $dataUser[2]; ?></li>
                            <li><?php echo $dataUser[3]; ?></li>
                            <li><?php echo $dataUser[4]; ?></li>
                        </ul>
                    </div>
                </div><!-- /.info-data -->
            </div><!-- /.container -->
        </section>

        <section class="address-data-user section-info">
            <div class="container">
                <div class="data-tittle d-flex">
                    <h3 class="tittle">Adress Info</h3>
                    <button class="edit">Edit <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg></button>
                </div><!-- /.data-tittle -->

                <div class="info-data d-flex">
                    <div class="fields">
                        <ul>
                            <li>CEP</li>
                            <li>UF</li>
                            <li>Logradouro & Nº da casa</li>
                            <li>Cidade</li>
                            <li>Complemento</li>
                        </ul>
                    </div>

                    <div class="values-user">
                        <ul>
                            <li><?php echo $addressData[0]; ?></li>
                            <li><?php echo $addressData[1]; ?></li>
                            <li><?php echo $addressData[2]." - Nº ".$addressData[3]; ?></li>
                            <li><?php echo $addressData[4]; ?></li>
                            <li><?php echo $addressData[5]; ?></li>
                        </ul>
                    </div>
                </div><!-- /.info-data -->
            </div><!-- /.container -->
        </section>

        <section class="sensitive-data-user section-info">
            <div class="container">
                <div class="data-tittle d-flex">
                    <h3 class="tittle">Contacts & Sensitive Data</h3>
                    <button class="edit">Edit <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg></button>
                </div><!-- /.data-tittle -->

                <div class="info-data d-flex">
                    <div class="fields">
                        <ul>
                            <li>E-mail</li>
                            <li>Phone</li>
                            <li>Senha</li>
                        </ul>
                    </div>

                    <div class="values-user">
                        <ul>
                            <li><?php echo $contactData[0]; ?></li>
                            <li><?php echo $contactData[1]; ?></li>
                            <li>**********</li>
                        </ul>
                    </div>
                </div><!-- /.info-data -->
            </div><!-- /.container -->
        </section>

        <section class="two-step-autentication section-info">
            <div class="container">
                <div class="data-tittle d-flex">
                    <div class="description-top">
                        <h3 class="tittle">Two-step Autentication</h3>
                        <span class="description-tittle">Keep your account extra secure with a second authetication step</span>
                    </div>

                    <button class="edit">Add autentication step</button>
                </div><!-- /.data-tittle -->

                <div class="description-two-step">
                    <p>Once you enable either SMS or autheticator app, you'll be able to add secure keys.</p>
                </div>
            </div>
            <!-- /.container -->
        </section>

        <section class="language section-info">
            <div class="container">
                    <div class="data-tittle d-flex">
                        <div class="description-top">
                            <h3 class="tittle">Profile</h3>
                            <span class="description-tittle">Please select a preferred language for your Dashboard, including date, time and number formatting.</span>
                        </div>

                        <button class="edit" style="height: 40px;">Save</button>
                </div><!-- /.data-tittle -->

                <div class="description-language-below">
                    <button class="btn-auto-detect-language">Auto-detect <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; float:right; position:relative; top:2px ;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                            <path d="m6 9 6 6 6-6" />
                        </svg></button>
                </div>
            </div><!-- /.container -->
        </section>

        <section class="email-preferences section-info">
            <div class="container">
                <div class="data-tittle d-flex">
                    <div class="description-top">
                        <h3 class="tittle">E-mail Preferences</h3>
                        <span class="description-tittle">Chosse what messages you'd like to receive for each of your Stripe accounts</span>
                    </div>

                    <div class="icon-email-preferences">
                        <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-store">
                            <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7" />
                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                            <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4" />
                            <path d="M2 7h20" />
                            <path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7" />
                        </svg>

                        <span class="line"></span>

                        <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </div>
                </div><!-- /.data-tittle -->

                <div class="info-data">
                    <ul>
                        <li>
                            <input type="checkbox" name="payments-successful" id="payments-successful">
                            <label for="payments-successful"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div> <!-- /.preferences-desc -->
                        </li>

                        <li>
                            <input type="checkbox" name="payoutsl" id="payoutsl">
                            <label for="payoutsl"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div><!-- /.preferences-desc -->
                        </li>

                        <li>
                            <input type="checkbox" name="application-fees" id="application-fees">
                            <label for="application-fees"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div><!-- /.preferences-desc -->  
                        </li>

                        <li>
                            <input type="checkbox" name="disputes" id="disputes">
                            <label for="disputes"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div>
                            <!-- /.preferences-desc -->
                        </li>

                        <li>
                            <input type="checkbox" name="payments-reviews" id="payments-reviews">
                            <label for="payments-reviews"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div><!-- /.preferences-desc -->
                        </li>

                        <li>
                            <input type="checkbox" name="mentions" id="mentions">
                            <label for="mentions"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div><!-- /.preferences-desc -->
                        </li>

                        <li>
                            <input type="checkbox" name="invoices-misspayments" id="invoices-misspayments">
                            <label for="invoices-misspayments"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div><!-- /.preferences-desc -->
                        </li>

                        <li>
                            <input type="checkbox" name="webhooksl" id="webhooksl">
                            <label for="webhooksl"></label>

                            <div class="preferences-desc">
                                <h3>Successful payments</h3>
                                <p>Receive a notification for every successful payment</p>
                            </div><!-- /.preferences-desc -->
                        </li>
                    </ul>
                </div><!-- /.info-data -->

                <div class="btns-confirmation-preferences">
                    <button id="save">Save</button>
                    <button id="cancel">Cancel</button>
                </div><!-- /.btns-confirmation-preferences -->
            </div><!-- /.container -->
        </section>

        <br><br><br><br><br>
    </section>
</main>

<script defer src="<?php echo PATH_INTERATIONS;?>js/func.userPatnerPage.js"></script>