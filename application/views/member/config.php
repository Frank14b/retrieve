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
                        <div class="home_title">Bienvenue <?= $CI->users->getOneData($_SESSION['re_userid'], "prenom"); ?> ==> Configuration</div>
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
            <div class="col-md-12">
                <!-- Contact -->

                <div class="contact">
                    <div class="container" style="margin-top:-170px;">
                        <div class="row contact_content">
                        <div class="col-md-12">
                    <?php
                    $CI = &get_instance();

                    if (isset($power) or isset($supprimer)) {
                        ?>
                        <div class="alert" style="border-radius:0px; background:#fff; margin-top:-25px;<?php
                        if (isset($power)) {
                            echo 'color:#096304d0';
                        } else {
                            echo 'color:orange';
                        }
                        ?>">
                            <span>
                                <b><i class="now-ui-icons travel_info"></i> &nbsp; Infos - </b> <?= $power ?? $supprimer ?></span>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                            <!-- Custom Tabs (Pulled to the right) -->
			                <div class="col-md-12" style="background: none;">
			                            <a href="<?= base_url() ?><?= $_SESSION['abbr_lang'] ?? 'fr'?>/dashboard/config" class="btn btn-primary active btn-sm"><i class="fa fa-user"></i>&nbsp; Utilisateurs</a>
			                            <a href="<?= base_url() ?><?= $_SESSION['abbr_lang'] ?? 'fr'?>/dashboard/ville" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; Villes Disponibles</a>
	                                    <a href="<?= base_url() ?><?= $_SESSION['abbr_lang'] ?? 'fr'?>/dashboard/newsletter" class="btn btn-success btn-sm"><i class="fa fa-picture"></i>&nbsp; Abones Newsletter</a>
                                        <a href="<?= base_url() ?><?= $_SESSION['abbr_lang'] ?? 'fr'?>/dashboard/contacts" class="btn btn-success btn-sm"><i class="fa fa-envelope"></i>&nbsp; Messages Recus</a>
			                    <div class="tab-content">
			                        <div class="tab-pane active" id="tab_1-1"><br><hr>
			                            <h3>Liste Globale des Utilisateurs :</h3><br>
                                        <?php
                    $val = $CI->users->getAllusers();
                    if ($val == NULL) {
                        ?>
                        vide
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="mdc-card__title mdc-card__title--large">Liste des Utilisateurs Inscrits</h1>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUsers">Nouvel Utilisateur</button>
                            </div>
                            <div class=" table-responsive scroll_bleu" style="overflow-x:auto">
                                <table class="table" style="margin-top:15px;">
                                    <thead>
                                        <tr>
                                            <th class="text-left"></th>
                                            <th><img src="<?= base_url() ?>assets/profile/avatar6.png" class="img-circle" style="width:30px; height:30px; margin-right:15px; margin-top:-10px; float:left;"/>Nom & Prenom</th>
                                            <th>Login</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($val as $row):
                                            ?>
                                            <tr>
                                                <td class="text-left"><button class="edit-elemt btn btn-sm btn-success" data-edit="users" id="<?= $row->id ?>" data-toggle="modal" data-target="#editUsers" data-mdc-auto-init="MDCRipple"><i class="fa fa-pencil text-blue"></i></button></td>
                                                <td><img src="<?= base_url() ?>assets/profile/<?= "avatar6.png" ?? $row->photo ?>" class="img-circle" style="width:30px; height:30px; margin-right:15px; margin-top:-10px; float:left;"/><?= $row->nom ?>&nbsp;<?= $row->prenom ?></td>
                                                <td><?= $row->login ?></td>
                                                <td><a href="mailto:<?= $row->email ?>" class="badge badge-primary badge-pill" style="font-size:0.9em"><?= $row->email ?></a></td>
                                                <td><?= $row->role ?></td>
                                                <td><a href="<?= base_url() . $_SESSION['abbr_lang'] ?>/dashboard/config/<?= $row->id ?>/delete" class="btn btn-sm btn-danger" data-mdc-auto-init="MDCRipple"><i class="fa fa-trash text-red"></i></a></td>
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
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3-2"><br>
			                            <h5>Informations Générales :</h5><br>

			                            
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>