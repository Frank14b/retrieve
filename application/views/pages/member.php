<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Home -->

<!-- Top Destinations -->

<div class="top hidden" style="margin-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h2>Validez vos informations</h2>
                    <div>pour permettre au systeme d'auto-rechercher vos pieces</div>
                </div>
            </div>
        </div>
        <div class="row top_content">

            <div class="col-lg-3 col-md-6 top_col">

                <!-- Top Destination Item -->
                <div class="top_item">
                    <a href="#">
                        <div class="top_item_image"><img src="<?= base_url() ?>assets/images/top_1.jpg" alt="https://unsplash.com/@sgabriel"></div>
                        <div class="top_item_content">
                            <div class="top_item_price">From $890</div>
                            <div class="top_item_text">Paris, France</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 top_col">

                <!-- Top Destination Item -->
                <div class="top_item">
                    <a href="#">
                        <div class="top_item_image"><img src="<?= base_url() ?>assets/images/top_2.jpg" alt="https://unsplash.com/@jenspeter"></div>
                        <div class="top_item_content">
                            <div class="top_item_price">From $890</div>
                            <div class="top_item_text">Italian Riviera</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 top_col">

                <div class="contact_form_container">
                    <form action="#" id="contact_form" class="clearfix">
                        <input id="contact_input_name" class="contact_input contact_input_name form-control" type="text" placeholder="Name" required="required" data-error="Name is required.">
                        <input id="contact_input_email" class="contact_input contact_input_email form-control" type="text" placeholder="E-mail" required="required" data-error="E-mail is required.">
                        <input id="contact_input_subject" class="contact_input contact_input_subject form-control" type="text" placeholder="Subject">
                        <textarea id="contact_input_message" class="contact_message_input contact_input_message form-control" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                        <button id="contact_send_btn" type="submit" class="contact_send_btn trans_200 btn btn-primary" value="Submit">Inscription</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Home -->

<div class="home">
    <!-- Image by https://unsplash.com/@peecho -->
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/img/DataSciencesGroup_HD.jpg" data-speed="0.3"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Me faire Enregistrer</div>
                        <div class="home_breadcrumbs">
                            <ul class="home_breadcrumbs_list">
                                <li class="home_breadcrumb"><a href="index.html">Acceuil</a></li>
                                <li class="home_breadcrumb">Inscription</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>

<!-- Find Form -->

<div class="find hover" style="margin-bottom:-10px;">
    <!-- Image by https://unsplash.com/@garciasaldana_ -->
    <div class="find_background_container prlx_parent">
        <div class="find_background prlx" style="background:#fff;"></div>
    </div>
    <!-- <div class="find_background parallax-window" data-parallax="scroll" data-image-src="images/find.jpg" data-speed="0.8"></div> -->
    <div class="container" style="background:#fff;">
        <div class="row">
            <div class="col-12">
                <!-- Contact -->

                <div class="contact">
                    <div class="container" style="margin-top:-170px;">
                        <div class="row contact_content">
                            <div class="col-lg-5">
                                <div class="contact_text">
                                    <p> Pourquoi me faire Enregistrer ?</p>
                                    <p>enregistrez vous via notre formulaire d'hadesion et vous serrez notifier en cas de disponibilite de vos pieces ou dune piece correspondant a un de vos contacts.</p>
                                </div>
                                <div class="contact_info hidden">
                                    <div class="contact_info_box">i</div>
                                    <div class="contact_info_container">
                                        <div class="contact_info_content">
                                            <ul>
                                                <li>Address: 1481 Creekside Lane Avila Beach, CA 93424</li>
                                                <li>Phone: +53 345 7953 32453</li>
                                                <li>Email: miloThemes@gmail.com</li>
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
                                    <form method="post" id="contact_member" class="clearfix sendData">
                                        <div class="row">
                                            <input type="hidden" class="answer" name="inscript" value="Inscription effectuée avec succes"/>
                                            <input type="hidden" name="role" value="member"/>
                                            <div class="col-md-6">
                                                <input id="contact_input_name1" name="nom" class="contact_input contact_input_name input" type="text" placeholder="Votre Nom" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name2" name="prenom" class="contact_input contact_input_name input" type="text" placeholder="Votre Prenom" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_email2" name="email" class="contact_input contact_input_email input" type="text" placeholder="Votre E-mail" required="required" data-error="E-mail is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name3" name="login" class="contact_input contact_input_name input" type="text" placeholder="Votre Login" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name4" name="phone" class="contact_input contact_input_name input" type="number" placeholder="Votre Numero de Telephone" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name5" name="password" class="contact_input contact_input_name input" type="password" placeholder="Votre Mot de Passe" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-12">
                                                <input id="contact_input_name6" name="pprenom" class="contact_input contact_input_name input" type="texte" placeholder="Nom et Prenom Personne à contacter" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-12">
                                                <input id="contact_input_name7" name="pphone" class="contact_input contact_input_name input" type="number" placeholder="Numero Telephone Personne à contacter" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name8" name="facebook" class="contact_input contact_input_name input" type="text" placeholder="Mon nom Facebook" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <select id="contact_input_name9" name="Vil_id" class="contact_input contact_input_name" required="required" data-error="Name is required.">
                                                    <option selected="" disabled="">Choisir Votre ville</option>
                                                    <?php
                                                    $CI = &get_instance();
                                                    foreach ($CI->ville->getAllville() as $row):
                                                        echo '<option value="' . $row->id . '">' . $row->libeller . '</option>';
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="reponses"></div>
                                        </div>

                                        <button id="contact_send_btn push" type="submit" class="contact_send_btn trans_200 pull-left" value="Submit">Inscription</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>