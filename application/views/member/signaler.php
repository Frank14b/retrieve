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
<?php
$CI = &get_instance();
?>

<div class="home">
    <!-- Image by https://unsplash.com/@peecho -->
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/img/financial.jpg" data-speed="0.3"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Signaler un Document Trouvé</div>
                        <div class="home_breadcrumbs">
                            <ul class="home_breadcrumbs_list">
                                <li class="home_breadcrumb"><a href="index.html">Signaler, Rechercher</a></li>
                                <li class="home_breadcrumb">Trouver des documents egares</li>
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
                                <div class="col-md-12">
                                   <img src="<?= base_url() ?>assets/img/580629-636313300554991042-16x9.jpg" class="img-fluid"/><hr>
                                   <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#picture">Consulter les Documents</button>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="contact_form_container">
                                <h2>Informations du Document</h2>
                                <form method="post" id="contact_member" class="clearfix sendData">
                                        <div class="row">
                                            <input type="hidden" class="answer" name="inscript" value="Ajout effectué avec succes"/>
                                            <input type="hidden" name="Use_id" value="<?php ?>"/>
                                            <div class="col-md-6">
                                                <input id="contact_input_name1" value="" name="libeller" class="contact_input contact_input_name input" type="text" placeholder="Titre de l'objet" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name10" value="" name="nomP" class="contact_input contact_input_name input" type="text" placeholder="Nom du Proprietaire" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="contact_input_name11" value="" name="prenomP" class="contact_input contact_input_name input" type="text" placeholder="Prenom du Proprietaire" required="required" data-error="Name is required.">
                                            </div>
                                            <div class="col-md-6">
                                                <select id="contact_input_name9" name="Vil_id" class="contact_input contact_input_name" required="required" data-error="Name is required.">
                                                    <option selected="" value="value="<?=$CI->users->getOneData($_SESSION['re_userid'], "Vil_id"); ?>"" disabled="">Retrouver a :</option>
                                                    <?php
                                                    $CI = &get_instance();
                                                    foreach ($CI->ville->getAllville() as $row):
                                                        echo '<option value="' . $row->id . '">' . $row->libeller . '</option>';
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea id="contact_input_name12" value="" name="details" class="contact_input contact_input_name input" placeholder="Description du document" required="required" data-error="Name is required." style="min-height:100px;"></textarea>
                                            </div>
                                            <div class="col-md-12" id="reponses"></div>
                                        </div>

                                        <button id="contact_send_btn" type="reset" class="contact_send_btn btn-warning trans_200 pull-left">Annuler</button>
                                        <button id="contact_send_btn push" type="submit" class="contact_send_btn trans_200 pull-left" value="Submit">Valider l'enregistrement</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>