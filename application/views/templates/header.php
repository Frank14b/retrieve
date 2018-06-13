<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RETRIEVE - Find Your Lost Documents | <?=$title?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Retrieve">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="<?= base_url() ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
        <link href="<?= base_url() ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/main_styles.css">

        <link rel="icon" href="<?= base_url() ?>assets/images/logo.png">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/bootstrap4/bootstrap.min.css">


        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/responsive.css">
        <?php
        if ($title == "member" || $title == "contacts" || $title == "doc" || $title="dashboard") {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/contact_styles.css">
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/contact_responsive.css">
            <?php
        }
        if ($title == "apropos" || $title == "doc") {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/about_styles.css">
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/styles/about_responsive.css">
            <?php 
        }
        ?>
    </head>
    <body>

        <style>
            html::-webkit-scrollbar-track,
            .scroll::-webkit-scrollbar-track {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                background-color: #aaa;
                border-radius: 0px;
                height: 8px;
                width: 8px;
                opacity: 0.5;
            }

            /* line 16, zonestyle.scss */

            html::-webkit-scrollbar,
            .scroll::-webkit-scrollbar {
                width: 8px;
                background-color: #f5f5f5;
                cursor: pointer;
                height: 8px;
            }

            /* line 23, zonestyle.scss */

            html::-webkit-scrollbar:hover,
            .scroll::-webkit-scrollbar:hover {
                width: 8px;
                background-color: #fff;
                cursor: pointer;
                height: 8px;
            }

            /* line 30, zonestyle.scss */

            html::-webkit-scrollbar-thumb,
            .scroll::-webkit-scrollbar-thumb {
                border-radius: 0px;
                background-color: #fff;
                cursor: pointer;
            }

            /* line 35, zonestyle.scss */

            HTML {
                overflow-x: hidden;
            }

            /* line 38, zonestyle.scss */

            .no_scroll {
                overflow: hidden;
            }

            /* line 41, zonestyle.scss */

            .scroll_v_h,
            .scroll_h_v {
                overflow: auto;
            }

            /* line 44, zonestyle.scss */

            .scroll_v {
                overflow-y: auto;
                overflow-x: hidden;
            }

            /* line 48, zonestyle.scss */

            .scroll_h {
                overflow-x: auto;
                overflow-y: hidden;
                height: 8px;
            }

            /* line 53, zonestyle.scss */

            .scroll_hover {
                transition-duration: 0.6s;
            }

            /* line 54, zonestyle.scss */

            .scroll_hover .scroll::-webkit-scrollbar {
                width: 0px;
                background-color: none;
                cursor: pointer;
                height: 0px;
            }

            /* line 63, zonestyle.scss */

            .scroll_hover:hover .scroll::-webkit-scrollbar {
                width: 8px;
                background-color: #fff;
                cursor: pointer;
                height: 8px;
            }

            /* line 69, zonestyle.scss */

            .scroll_hover:hover .scroll::-webkit-scrollbar-thumb {
                background-color: #f5f5f5;
            }

            /* line 73, zonestyle.scss */

            .scroll_bleu::-webkit-scrollbar-thumb {
                background-color: #229CDD;
                opacity: 0.5;
            }

            /* line 77, zonestyle.scss */

            .scroll_bleu::-webkit-scrollbar-track {
                background-color: #fff;
                opacity: 0.5;
                border: 1px solid lightblue;
            }

            /* line 82, zonestyle.scss */

            .scroll_bleu::-webkit-scrollbar {
                opacity: 0.5;
            }

            /* line 86, zonestyle.scss */

            .scroll_hover:hover .scroll_bleu::-webkit-scrollbar-thumb {
                background-color: #229CDD;
                opacity: 0.5;
            }

            /* line 90, zonestyle.scss */

            .scroll_hover:hover .scroll_bleu::-webkit-scrollbar-track {
                background-color: #fff;
                opacity: 0.5;
                border: 1px solid lightblue;
            }

            /* line 95, zonestyle.scss */

            .scroll_hover:hover .scroll_bleu::-webkit-scrollbar {
                opacity: 0.5;
            }

            /* line 100, zonestyle.scss */

            .scroll_noir::-webkit-scrollbar-thumb {
                background-color: #555;
                opacity: 0.5;
            }

            /* line 104, zonestyle.scss */

            .scroll_noir::-webkit-scrollbar-track {
                background-color: #fff;
                opacity: 0.5;
                border: 1px solid #aaa;
            }

            /* line 109, zonestyle.scss */

            .scroll_noir::-webkit-scrollbar {
                opacity: 0.5;
            }

            /* line 113, zonestyle.scss */

            .scroll_hover:hover .scroll_noir::-webkit-scrollbar-thumb {
                background-color: #555;
                opacity: 0.5;
            }

            /* line 117, zonestyle.scss */

            .scroll_hover:hover .scroll_noir::-webkit-scrollbar-track {
                background-color: #fff;
                opacity: 0.5;
                border: 1px solid #aaa;
            }

            /* line 122, zonestyle.scss */

            .scroll_hover:hover .scroll_noir::-webkit-scrollbar {
                opacity: 0.5;
            }

            /* line 127, zonestyle.scss */

            .scroll_red::-webkit-scrollbar-thumb {
                background-color: red;
                opacity: 0.5;
            }

            /* line 131, zonestyle.scss */

            .scroll_red::-webkit-scrollbar-track {
                background-color: #fff;
                opacity: 0.5;
                border: 1px solid lightcoral;
            }

            /* line 136, zonestyle.scss */

            .scroll_red::-webkit-scrollbar {
                opacity: 0.5;
            }

            /* line 140, zonestyle.scss */

            .scroll_hover:hover .scroll_red::-webkit-scrollbar-thumb {
                background-color: red;
                opacity: 0.5;
            }

            /* line 144, zonestyle.scss */

            .scroll_hover:hover .scroll_red::-webkit-scrollbar-track {
                background-color: #fff;
                opacity: 0.5;
                border: 1px solid lightcoral;
            }

            /* line 149, zonestyle.scss */

            .scroll_hover:hover .scroll_red::-webkit-scrollbar {
                opacity: 0.5;
            }

            .hover {
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            }
        </style>

        <style>
            .hidden{
                display:none;
            }
        </style>

        <div class="super_container">
            <!-- Header -->
            <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_container d-flex flex-row align-items-center justify-content-start">

                                <!-- Logo -->
                                <div class="logo_container">
                                    <div class="logo">
                                        <div>retrieve</div>
                                        <div>Find your Lost Document</div>
                                        <div class="logo_image"><img src="<?= base_url() ?>assets/images/logo.png" alt=""></div>
                                    </div>
                                </div>

                                <!-- Main Navigation -->
                                <nav class="main_nav ml-auto">
                                    <ul class="main_nav_list">
                                        
                            <?php
                              if(isset($_SESSION['re_userid'])){
                                  ?>
                                   <li class="main_nav_item <?php if ($title == "acceuil")echo 'active'?>"><a href="<?= base_url() ?>fr/member">Mon Compte</a></li> 
                                  <?php 
                              }else{
                                  ?>
                                    <li class="main_nav_item <?php if ($title == "acceuil")echo 'active'?>"><a href="<?= base_url() ?>">Acceuil</a></li>
                                    <li class="main_nav_item <?php if ($title == "apropos")echo 'active'?>"><a href="<?= base_url() ?>fr/apropos">Apropos</a></li>
                                    <li class="main_nav_item <?php if ($title == "member")echo 'active'?>"><a href="<?= base_url() ?>fr/member">M'inscrire</a></li>
                                    <li class="main_nav_item <?php if ($title == "doc")echo 'active'?>"><a href="<?= base_url() ?>fr/doc">Signaler un Document</a></li>
                                    <li class="main_nav_item <?php if ($title == "contacts")echo 'active'?>"><a href="<?= base_url() ?>fr/contacts">Contacts</a></li>
                                  <?php 
                              }
                            ?>
                                        
                                        
                            <?php 
                             if(isset($_SESSION['re_user'])){
                                 ?>
                                 <li class="main_nav_item <?php if ($title == "signaler")echo 'active'?>"><a href="<?= base_url() ?>fr/dashboard/signaler">Signaler Documents</a></li>
                                 <li class="main_nav_item <?php if ($title == "retrouver")echo 'active'?>"><a href="<?= base_url() ?>fr/dashboard/retrouver">Documents Disponibles</a></li>
                                 <li class="btn btn-danger btn-sm"><a href="<?= base_url() ?>fr/dashboard/deconnexion" style="color:#fff">Deconnexion</a></li>
                                 <?php 
                                 if($roleUser == "Admin"){
                                     ?><li class="btn btn-primary btn-sm"><a href="<?= base_url() ?>fr/dashboard/config" style="color:#fff">Configuration</a></li><?php 
                                 }
                             }
                            ?>
                                    </ul>
                                </nav>

                                <!-- Search -->
                                <div class="search">
                                    <form action="#" class="search_form">
                                        <input type="search" name="search_input" class="search_input ctrl_class" required="required" placeholder="trouver un document">
                                        <button type="submit" class="search_button ml-auto ctrl_class"><img src="<?= base_url() ?>assets/images/search.png" alt=""></button>
                                    </form>
                                </div>

                                <!-- Hamburger -->
                                <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Menu -->

            <div class="menu_container menu_mm">

                <!-- Menu Close Button -->
                <div class="menu_close_container">
                    <div class="menu_close"></div>
                </div>

                <!-- Menu Items -->
                <div class="menu_inner menu_mm">
                    <div class="menu menu_mm">
                        <div class="menu_search_form_container">
                            <form action="#" id="menu_search_form">
                                <input type="search" class="menu_search_input menu_mm">
                                <button id="menu_search_submit" class="menu_search_submit" type="submit"><img src="<?= base_url() ?>assets/images/search_2.png" alt=""></button>
                            </form>
                        </div>
                        <ul class="menu_list menu_mm">
                            <li class="menu_item menu_mm <?php if ($title == "acceuil")echo 'active'?>"><a href="<?= base_url() ?>">Acceuil</a></li>
                            <li class="menu_item menu_mm <?php if ($title == "apropos")echo 'active'?>"><a href="<?= base_url() ?>fr/apropos">Apropos</a></li>
                            <?php
                              if(isset($_SESSION['re_userid'])){
                                  ?>
                                   <li class="menu_item menu_mm <?php if ($title == "member")echo 'active'?>"><a href="<?= base_url() ?>fr/member">Mon Compte</a></li>
                                  <?php 
                              }else{
                                  ?>
                                   <li class="menu_item menu_mm <?php if ($title == "member")echo 'active'?>"><a href="<?= base_url() ?>fr/member">M'inscrire</a></li>
                                   <li class="menu_item menu_mm <?php if ($title == "doc")echo 'active'?>"><a href="<?= base_url() ?>fr/doc">Signaler un Document</a></li>
                                  <?php 
                              }
                            ?>
                            <li class="menu_item menu_mm <?php if ($title == "contacts")echo 'active'?>"><a href="<?= base_url() ?>fr/contacts">Contacts</a></li>
                            <?php 
                             if(isset($_SESSION['re_user'])){
                                 ?>
                                  <li class="btn btn-danger btn-sm"><a href="<?= base_url() ?>fr/dashboard/deconnexion" style="color:#fff">Deconnexion</a></li>
                                 <?php 
                             }
                            ?>
                        </ul>

                        <!-- Menu Social -->

                        <div class="menu_social_container menu_mm">
                            <ul class="menu_social menu_mm">
                                <li class="menu_social_item menu_mm"><a href="<?= base_url() ?>assets/#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li class="menu_social_item menu_mm"><a href="<?= base_url() ?>assets/#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li class="menu_social_item menu_mm"><a href="<?= base_url() ?>assets/#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li class="menu_social_item menu_mm"><a href="<?= base_url() ?>assets/#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li class="menu_social_item menu_mm"><a href="<?= base_url() ?>assets/#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                        <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
                    </div>
                </div>
            </div>

