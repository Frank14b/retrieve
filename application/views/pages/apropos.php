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
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?=base_url()?>assets/img/apple-iphone-books-desk.png" data-speed="0.3"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Qui Suis  Je ! Comment ca marche ?</div>
                        <div class="home_breadcrumbs">
                            <ul class="home_breadcrumbs_list">
                                <li class="home_breadcrumb"><a href="index.html">Acceuil</a></li>
                                <li class="home_breadcrumb">Apropos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>

<!-- About -->

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h2>Nous vous aidons a recuperer</h2>
                    <div> vos documents egarees de faocon rapide ou que vous soyez</div>
                </div>
            </div>
        </div>
        <div class="row about_row">
            <div class="col-lg-6 about_col order-lg-1 order-2">
                <div class="about_content" style="text-align: justify;">
                    <p><b>RETRIEVE</b> est votre service de recherche, de trouvaille, de renseignement sur l'existance de vos pieces égarées, la facon la plus simple et rapide de les recuperees, ou les recuperees. 
                        Comment Beneficier des services de <b>RETRIEVE</b> a tous moments : la chose la plus simple a faire est de vous procurer un compte RETRIEVE pour permettre au systeme d'auto effectuer des comparaisons
                    sur les pieces dont nous disposons en vue d'identifier les votre et de vous notifier pour une eventuelle recuperation.</p>
                    <p>Utilisez le service RETRIEVE pour signaler l'existance des pieces égarées et laissez nous vous mettre en contact avec le proprietaire pour une eventuelle recuperation.</p>
                    
                </div>
            </div>
            <div class="col-lg-6 about_col order-lg-2 order-1">
                <div class="about_image">
                    <img src="<?= base_url() ?>assets/img/document-scanning-conversion.png" alt="RETRIEVE">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Milestones -->

<div class="milestones">
    <div class="milestones_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/images/fact_background.jpg" data-speed="0.3"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h2>Nos atouts qui favorisent </h2>
                    <div>notre service habituel</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="milestones_text">
                    <p>RETRIEVE vous simplifie les tache, vous raccourci la distance, vous rassure dans la recherche et la trouvaille de vos pieces, prix abordables.</p>
                </div>
            </div>

        </div>
        <div class="row milestones_container">

            <!-- Milestone -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="<?= base_url() ?>assets/images/milestone_1.svg" alt=""></div>
                    <div class="milestone_counter hidden" data-end-value="100">0%</div>
                    <br>
                    <div class="milestone_text">Disponibilité 100%</div>
                </div>
            </div>

            <!-- Milestone -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="<?= base_url() ?>assets/images/milestone_2.svg" alt=""></div>
                    <div class="milestone_counter hidden" data-end-value="213">0</div>
                    <br>
                    <div class="milestone_text">Simple D'utilisation</div>
                </div>
            </div>

            <!-- Milestone -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="<?= base_url() ?>assets/images/milestone_3.svg" alt=""></div>
                    <div class="milestone_counter hidden" data-end-value="11923">0</div>
                    <br>
                    <div class="milestone_text">Photos de Verification</div>
                </div>
            </div>

            <!-- Milestone -->
            <div class="col-lg-3 milestone_col">
                <div class="milestone text-center">
                    <div class="milestone_icon"><img src="<?= base_url() ?>assets/images/milestone_4.svg" alt=""></div>
                    <div class="milestone_counter hidden" data-end-value="15">0</div>
                    <br>
                    <div class="milestone_text">Livraison a Domicile</div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Services -->

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h2>D'autres services dont nous vous</h2>
                    <div>offrons a des prix remarquables</div>
                </div>
            </div>
        </div>
        <div class="row icon_box_container">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="<?= base_url() ?>assets/images/service_1.svg" class="svg" alt="https://www.flaticon.com/authors/monkik"></div>
                    <div class="icon_box_title">Weekend trips</div>
                    <p class="icon_box_text">Lorem ipsum dolor sit amet, consectetur adip iscing elit. Fusce fringilla lectus nec diam auctor, ut fringilla diam sagittis.</p>
                    <a href="#" class="icon_box_more">Read More</a>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="<?= base_url() ?>assets/images/service_2.svg" class="svg" alt="https://www.flaticon.com/authors/monkik"></div>
                    <div class="icon_box_title">Fun leisure trips</div>
                    <p class="icon_box_text">Lorem ipsum dolor sit amet, consectetur adip iscing elit. Fusce fringilla lectus nec diam auctor, ut fringilla diam sagittis.</p>
                    <a href="#" class="icon_box_more">Read More</a>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="<?= base_url() ?>assets/images/service_3.svg" class="svg" alt="https://www.flaticon.com/authors/monkik"></div>
                    <div class="icon_box_title">Plane tickets</div>
                    <p class="icon_box_text">Lorem ipsum dolor sit amet, consectetur adip iscing elit. Fusce fringilla lectus nec diam auctor, ut fringilla diam sagittis.</p>
                    <a href="#" class="icon_box_more">Read More</a>
                </div>
            </div>

        </div>
    </div>
</div>
