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
                        <div class="home_title">Retrouver un Document Perdu</div>
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
                    $val = $CI->pieces->getAllpieces();
                    if ($val == NULL) {
                        ?>
                        <center><img src="<?= base_url() ?>assets/img/document-management-software-benefits.png" class="img-fluid"/></center>
                        <div style="text-align:center;" class="alert alert-info"><center>Aucun document disponible vous serrez notifier en cas de disponibilite</center></div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="mdc-card__title mdc-card__title--large">Liste des Documents Retrouves</h1>
                                <button class="btn btn-primary btn-sm">Signaler un Document</button>
                            </div>
                            <div class=" table-responsive scroll_bleu" style="overflow-x:auto">
                                <table class="table" style="margin-top:15px;">
                                    <thead>
                                        <tr>
                                            <th class="text-left"></th>
                                            <th>Intituler</th>
                                            <th>Nom & Prenom</th>
                                            <th>dates</th>
                                            <th>Retrouver a</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($val as $row):
                                            ?>
                                            <tr>
                                                <td class="text-right">
                                                <?php if($CI->users->getOneData($_SESSION['re_userid'], "role") == "Admin"){
                                                    ?><a style="margin-top:-12px" href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/pieces/<?= $row->id ?>/edit" class="btn btn-sm btn-success" data-mdc-auto-init="MDCRipple"><i class="fa fa-pencil text-red"></i></a><?php
                                                } ?>    
                                                <a href=""><img src="<?= $row->photo ?>" class="img-fluid" style="height:50px; widht:50px; margin-top:-13px;"/></a></td>
                                                <td><?= $row->libeller ?></td>
                                                <td class="badge badge-success badge-pill" style="padding-top:15px;"><b><?= $row->nomP ?>&nbsp;<?= $row->prenomP ?></b></td>
                                                <td><?= $row->dates ?></td>
                                                <td><?= $CI->ville->getOneData($row->Vil_id, "libeller") ?></td>
                                                <td>
                                                <a style="margin-top:-5px" href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/pieces/<?= $row->id ?>/open" class="btn btn-sm btn-success" data-mdc-auto-init="MDCRipple"><i class="fa fa-eye text-red"></i></a>
                                                <?php if($CI->users->getOneData($_SESSION['re_userid'], "role") == "Admin"){
                                                    ?><a style="margin-top:-5px" href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/pieces/<?= $row->id ?>/delete" class="btn btn-sm btn-danger" data-mdc-auto-init="MDCRipple"><i class="fa fa-trash text-red"></i></a>
                                                      <a style="margin-top:-5px" href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/pieces/<?= $row->id ?>/take" class="btn btn-sm btn-primary" data-mdc-auto-init="MDCRipple"><i class="fa fa-check text-red"></i></a></td><?php
                                                } ?>
                                            </tr>
                                            <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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