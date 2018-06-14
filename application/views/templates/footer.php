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

<script src="<?php echo base_url(); ?>assets/zonestyle/js/croppie.js"></script>
<script src="<?php echo base_url(); ?>assets/zonestyle/js/pdfobject.js"></script>

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

                            $(".add").hide();

                            setInterval(function(){
                                var libeller = $('#libeller').val();
                                var details = $('#details').val();
                                var nom = $('#nomp').val();
                                var prenom = $('#prenomp').val();
                                var ville = $('#ville').val();

                                if(libeller != "" && details != "" && nom != "" && prenom != "" && ville != ""){
                                    $(".add").fadeIn();
                                }else{
                                    $(".add").fadeOut();
                                }
                            }, 500);

        $('#upload-image').hide();

        $(".choose_image").click(function (e) {
            $("#images").click();
            e.preventDefault();
        });

        $('#images').change(function (e) {
            e.preventDefault();
            var $this = $(this);
            var ext = ['png', 'jpeg', 'jpg', 'gif', 'bmp'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), ext) === -1) {
                alert('Erreur: Format non Valide image requise');
                $this.val("");
                $('.cropped_image').fadeOut();
                $('#imgprofile').fadeIn();
                $('#upload-image').hide();
                $('#upload-imageProfile').hide();
            } else {
                $('#imgprofile').hide();
                $('#upload-image').fadeIn();
                $('.cropped_image').fadeIn();
                $('#upload-imageProfile').fadeIn();
            }
        });

        $image_crop = $('#upload-image').croppie({
            enableExif: true,
            viewport: {
                width: 400,
                height: 400,
                type: 'square'
            },
            boundary: {
                width: 450,
                height: 450
            },
            showZoomer: true,
            enableResize: true,
            enableOrientation: true
        });

        //$image_crop.croppie('bind');
        $image_crop.croppie('setZoom', 1.0);

        $("#RotateAntiClockwise").on("click", function () {
            $image_crop.croppie('rotate', -90);
        });
        $("#RotateClockwise").on("click", function () {
            $image_crop.croppie('rotate', 90);
        });

        $('#images').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $image_crop.croppie('bind', {
                    url: e.target.result,
                    orientation: 4
                }).then(function () {
                    console.log('jQuery bind complete');
                });

                $image_crop.result('blob').then(function (blob) {
                    // do something with cropped blob
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.cropped_imageDoc ').on('click', function (ev) {

            var libeller = $('#libeller').val();
            var details = $('#details').val();
            var nom = $('#nomp').val();
            var prenom = $('#prenomp').val();
            var ville = $('#ville').val();
            var user = $('#user').val();

            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (response) {
                $.ajax({
                    url: "",
                    type: "POST",
                    data: {"imageP": response, "details": details, "user":user, "libeller": libeller, "nomP": nom, "prenomP": prenom, "Vil_id": ville, "addfile": ""},
                    success: function (data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            });
        });

        $('#val1').keyup(function(){
            var val = $(this).val()
            if(val.length > 2){
                $('#rs1').fadeIn(function(){
                    var $this = $(this)
                    $this.html('<div class="col-md-12 alert text-center" style="background: none; padding:0px; border-radius:0px"><center><img src="<?php echo base_url(); ?>assets/img/loading.gif" style="width: 34px; height: 34px; border-radius: 50%;"/></center>')
                    
                    $.ajax({
                        url: "",
                        type: "POST",
                        data: {"nom": val, "autoSearchNom": ""},
                        dataType: 'json',
                        success: function (data) {
                            $this.html('<p id="frr" style="background:#eee; padding:10px;"></p>')
                            for (i in data) {
                                $('#frr').append('<li><a href="<?= base_url() ?>fr/doc" style="color:#444"><b>'+data[i].libeller+'</b>&nbsp;('+data[i].nomP+'&nbsp;'+data[i].prenomP+')</a></li>')
                            }
                        }
                    });
                })
            }else{
                $('#rs1').hide()
            }
        });

        $('#val2').keyup(function(){
            var val = $(this).val()
            if(val.length > 2){
                $('#rs2').fadeIn(function(){
                    var $this = $(this)
                    $this.html('<div class="col-md-12 alert text-center" style="background: none; padding:0px; border-radius:0px"><center><img src="<?php echo base_url(); ?>assets/img/loading.gif" style="width: 34px; height: 34px; border-radius: 50%;"/></center>')
                    
                    $.ajax({
                        url: "",
                        type: "POST",
                        data: {"prenom": val, "autoSearchPrenom": ""},
                        dataType: 'json',
                        success: function (data) {
                            $this.html('<p id="frr2" style="background:#eee; padding:10px;"></p>')
                            for (i in data) {
                                $('#frr2').append('<li><a href="<?= base_url() ?>fr/doc" style="color:#444"><b>'+data[i].libeller+'</b>&nbsp;('+data[i].nomP+'&nbsp;'+data[i].prenomP+')</a></li>')
                            }
                        }
                    });
                })
            }else{
                $('#rs2').hide()
            }
        });

    });
</script>
<style>
    #rs1, #rs2{
        display:none;
    }
</style>
</body>
</html>

