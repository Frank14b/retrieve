<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Newsletter -->

<style>
    .button3{
        display: none;
    }
</style>

<div class="newsletter">
    <!-- Image by https://unsplash.com/@garciasaldana_ -->
    <div class="newsletter_background" style="background:url(<?= base_url() ?>assets/img/Untitled-1.png) center/cover; background-attachment:fixed;"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="newsletter_content">
                    <div class="newsletter_title text-center">Souscrire a notre newsletter</div>
                    <div class="newsletter_form_container">
                        <form method="post" id="newsletter_form" class="newsletter_form sendData">
                            <div class="d-flex flex-md-row flex-column align-content-center justify-content-between">
                                <input type="email" name="email" id="newsletter_input" required="" class="newsletter_input input" placeholder="Entrez votre Addresse Email">
                                <button type="submit" id="push" class="newsletter_button">Souscrire</button>
                                <button type="button" id="reponses" class="newsletter_button button3"></button>
                                <input type="hidden" name="newsletter" class="answer" value="Succes"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">

            <!-- Footer Column -->
            <div class="col-lg-4 footer_col">
                <div class="footer_about">
                    <!-- Logo -->
                    <div class="logo_container">
                        <div class="logo">
                            <div>retrieve</div>
                            <div>find your lost document</div>
                            <div class="logo_image"><img src="<?= base_url() ?>assets/images/logo.png" alt=""></div>
                        </div>
                    </div>
                    <div class="footer_about_text">RETRIEVE est votre outil de trouvaille de vos pieces egarees. enregistrez vous via notre formulaire 
                        d'hadesion et vous serrez notifier en cas de disponibilite de vos pieces ou dune piece correspondant a un de vos contacts.</div>

                </div>
            </div>

            <!-- Footer Column -->
            <div class="col-lg-4 footer_col">
                <div class="footer_latest">
                    <div class="footer_title"></div>
                    <div class="footer_latest_content">

                        <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Made by <a href="#" target="_blank">ZonePluS</a><br>
                            Template Made by <a href="<?= base_url() ?>assets/https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                    </div>
                </div>
            </div>

            <!-- Footer Column -->
            <div class="col-lg-4 footer_col">
                <div class="tags footer_tags">
                    <div class="footer_title">Pièces Collectées</div>
                    <ul class="tags_content d-flex flex-row flex-wrap align-items-start justify-content-start">
                        <li class="tag"><a href="#">CNI (Carte Nationale d'Identite)</a></li>
                        <li class="tag"><a href="#">PASSPORT</a></li>
                        <li class="tag"><a href="#">DIPLOME</a></li>
                        <li class="tag"><a href="#">ATTESTATION</a></li>
                        <li class="tag"><a href="#">Autres Pieces ...</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url() ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url() ?>assets/plugins/easing/easing.js"></script>
<script src="<?= base_url() ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>

<script src="<?= base_url() ?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="<?= base_url() ?>assets/js/contact_custom.js"></script>

<script src="<?= base_url() ?>assets/js/about_custom.js"></script>

<script>
                                $(document).ready(function () {
                                    $('.sendData').on('submit', function (e) {
                                        var $this = $(this);
                                        e.preventDefault();
                                        $this.find('#reponses').show();
                                        $this.find('#reponses').html('<div class="col-md-12 alert text-center" style="background: #f5f5f5; padding:5px;"><center><img src="<?php echo base_url(); ?>assets/img/loading.gif" style="width: 44px; height: 44px; border-radius: 50%;"/><br></center>'
                                                + '</div>');
                                        $this.find('#push').hide();
                                        $.ajax({
                                            type: "POST",
                                            url: "",
                                            data: $this.serialize(),
                                            dataType: 'json',
                                            success:
                                                    function (data) {
                                                        var texte = $this.find(".answer").val();
                                                        if (data == 0) {
                                                            $this.find('#reponses').html('<div class="alert" style="background: #f5f5f5; color: green; margin-top: 0px; height:56px">'
                                                                    + '<div class="col-md-12 text-center">' + texte
                                                                    + '</div></div>');
                                                            $this.find('.input').val("");
                                                            setTimeout(function () {
                                                                //window.location.reload();
                                                            }, 1500);
                                                        } else {
                                                            $this.find('#push').show();
                                                            $this.find('#reponses').html('<div class="alert" style="background: #f5f5f5; color: #ff6565; margin-top: 0px;">'
                                                                    + '<div class="col-md-12 text-center">'
                                                                    + data + '</div></div>');
                                                            $this.find('#push').show();
                                                        }
                                                    }
                                        });// you have missed this bracket
                                    });
                                });

                            if (window.Notification && Notification.permission !== "denied")
                            {
                                Notification.requestPermission(function (status) {  // status is "granted", if accepted by user
                                    var n = new Notification('Retrieve', {
                                        body: 'Bonjour ! Bienvenue sur Retrieve',
                                        icon: '<?= base_url() ?>assets/images/logo.png' // optional
                                    });
                                });
                            }

                            $(document).ready(function () {
                                $('#getConnect').on('submit', function (e) {
                                    var $this = $(this);
                                    e.preventDefault();
                                    $this.find('#reponses').show();
                                    $this.find('#reponses').html('<div class="col-md-12 alert text-center" style="background: #eee; padding:5px; border-radius:0px"><center><img src="<?php echo base_url(); ?>assets/img/loading.gif" style="width: 44px; height: 44px; border-radius: 50%;"/><br></center>'
                                            + '</div>');
                                    $this.find('#push').hide();
                                    $.ajax({
                                        type: "POST",
                                        url: "",
                                        data: $this.serialize(),
                                        dataType: 'json',
                                        success:
                                                function (data) {
                                                    //alert(data);
                                                    if (data == 0) {
                                                        window.location.href="";
                                                            $this.find('#reponses').html('<div class="alert" style="background: #f5f5f5; color: green; margin-top: 0px; height:56px">'
                                                                    + '<div class="col-md-12 text-center">' + texte
                                                                    + '</div></div>');
                                                            $this.find('input').val("");
                                                            setTimeout(function () {
                                                                window.location.reload();
                                                            }, 1500);
                                                        } else {
                                                            $this.find('#push').show();
                                                            $this.find('#reponses').html('<div class="alert" style="background: #f5f5f5; color: #ff6565; margin-top: 0px;">'
                                                                    + '<div class="col-md-12 text-center">'
                                                                    + data + '</div></div>');
                                                            $this.find('#push').show();
                                                    }
                                                }
                                    });// you have missed this bracket
                                })
                            });
</script>
</body>
</html>

