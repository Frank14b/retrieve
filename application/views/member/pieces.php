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
                        <div class="home_title">Details sur le Document</div>
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
                            <div class="col-md-12">
                    
                    <?php
                    $val = $CI->pieces->getpiecesByID($open);
                    if ($val == false) {
                        ?>
                        <center><img src="<?= base_url() ?>assets/img/document-management-software-benefits.png" class="img-fluid"/></center>
                        <div style="text-align:center;" class="alert alert-info"><center>Aucun document disponible vous serrez notifier en cas de disponibilite</center></div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-sm">Retour a la liste</button>
                            </div>
                            <?php
                                        foreach ($val as $row):
                                            ?>
                            <div class="col-md-6">
                               <img src="<?= $row->photo ?>" class="hover" style="margin-top:20px; width:100%"/>
                            </div>
                            <div class="col-md-4" style="margin-top:30px;">
                               <p><b>Intituler :</b> <?= $row->libeller ?></p>
                               <p><b>Nom Proprietaire :</b> <?= $row->nomP ?></p>
                               <p><b>Prenom Proprietaire :</b> <?= $row->prenomP ?></p>
                               <p><b>Ville Retrouve :</b> <?= $CI->ville->getOneData($row->Vil_id, "libeller") ?></p>
                               <p><b>Ajouter le :</b> <?= $row->dates ?></p>
                               <p><b>Description de l'objet :</b><hr/> <?= $row->details ?></p>
                               <hr>
                               <?php if($CI->users->getOneData($_SESSION['re_userid'], "role") == "Admin"){
                                                    ?><a style="margin-top:-5px" href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/pieces/<?= $row->id ?>/delete" class="btn btn-sm btn-danger" data-mdc-auto-init="MDCRipple"><i class="fa fa-trash text-red"></i></a>
                                                      <a style="margin-top:-5px" href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/pieces/<?= $row->id ?>/take" class="btn btn-sm btn-primary" data-mdc-auto-init="MDCRipple"><i class="fa fa-check text-red"></i></a></td><?php
                                                } ?>
                            </div>
                            <?php
                                        endforeach;
                                        ?>
                        </div>
                        <?php
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>