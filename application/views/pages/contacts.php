<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Home -->

<div class="home">
    <!-- Image by https://unsplash.com/@peecho -->
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/images/news.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Contactez Nous</div>
                        <div class="home_breadcrumbs">
                            <ul class="home_breadcrumbs_list">
                                <li class="home_breadcrumb"><a href="index.html">Acceuil</a></li>
                                <li class="home_breadcrumb">Contacts</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>

<!-- Find Form -->

<div class="find">
    <!-- Image by https://unsplash.com/@garciasaldana_ -->
    <div class="find_background_container prlx_parent">
        <div class="find_background prlx" style="background-image:url(<?= base_url() ?>assets/images/find.jpg)"></div>
    </div>
    <!-- <div class="find_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/images/find.jpg" data-speed="0.8"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="find_title text-center">Retrouvez vos pieces égarées en 1 minute</div>
            </div>
            <div class="col-12">
                <div class="find_form_container">
                    <form action="#" id="find_form" class="find_form d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-between justify-content-start flex-wrap">
                        <div class="find_item">
                            <div>Votre Nom Complet :</div>
                            <input type="text" class="destination find_input" required="required" placeholder="Entrez votre Nom">
                        </div>
                        <div class="find_item">
                            <div>Votre Prenom Complet :</div>
                            <input type="text" class="destination find_input" required="required" placeholder="Entrez votre Prenom">
                        </div>
                        <button class="button find_button">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->

<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="contact_title">Nous sommes</div>
                <div class="contact_subtitle"> a votre ecoute 24h/24, 7JRS/7</div>
            </div>
        </div>
        <div class="row contact_content">
            <div class="col-lg-5">
                <div class="contact_text">
                    <p>Retrouvez <b>RETRIEVE</b> a BAFOUSSAM, YAOUNDE, DOUALA, EBOLOWA, DSCHANG, MBOUDA, BAFANG, BAGANGTE, MBALMAYO, ...</p>
                </div>
                <div class="contact_info">
                    <div class="contact_info_box">i</div>
                    <div class="contact_info_container">
                        <div class="contact_info_content">
                            <ul>
                                <strong>Direction Generale</strong><hr>
                                <li>Addresse: Bafoussam, Entree de ville UCB</li>
                                <li>Telephone: <a href="tel:+237655135017">655135017</a> | <a href="tel:+237682303036">682303036</a></li>
                                <li>Email: <a href="mailto:service@retrievecameroun.com">service@retrievecameroun.com</a></li>
                            </ul>
                        </div>
                        <div class="contact_info_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact_form_container">
                    <form method="post" id="contact_form" class="clearfix sendData">
                        <input id="contact_input_name" class="contact_input contact_input_name input" type="text" name="nom" placeholder="Nom" required="required" data-error="Name is required.">
                        <input id="contact_input_email" class="contact_input contact_input_email input" type="text" name="email" placeholder="E-mail" required="required" data-error="E-mail is required.">
                        <input id="contact_input_subject" class="contact_input contact_input_subject input" type="text" name="sujet" placeholder="Sujet">
                        <textarea id="contact_input_message" class="contact_message_input contact_input_message input" name="messages" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                        <button id="push" type="submit" class="newsletter_button" value="Submit">Envoyer</button>
                        <button type="button" id="reponses" class="newsletter_button button3"></button>
                        <input type="hidden" name="contacts" class="answer" value="Succes"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="row contact_map">
            <!-- Google Map -->

            <div class="col">
                <div id="google_map">
                    <div class="map_container">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
