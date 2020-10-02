<!DOCTYPE html>
<html lang="en" class="html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="easyDot/easyScrollDots.css">
    <link rel="stylesheet" href="W3/W3.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="index.js"></script>
    <title>YD binnenhuis</title>
</head>
<body class="body">
<!-- Hamburger menu less than 800px -->
<div class="toggle">
    <a id="nav-toggle" href="#"><span></span></a>
</div>
<div class="menu">
    <ul>
        <li><a href="#home"  id="link-menu1">Home</a></li>
        <li><a href="#gallerij" id="link-menu2">Gallerij</a></li>
        <li><a href="#contactLink" id="link-menu3">Contact</a></li>
        <li><a href="#Socials" id="link-menu4">Socials</a></li>
    </ul>
</div>
<!-- Navbar -->
<div class="topnav" id="topnav">
    <a href="#home">Home</a>
    <a href="#gallerij">Gallerij</a>
    <a href="#home"><img src="Pictures/Logo.jpg" alt="logo_YD"></a>
    <a href="#contactLink">Contact</a>
    <a href="#Socials">Socials</a>


</div>
<div class="container">
    <div class="welkom" id="home">
        <div>
            <div class="scroll-indicator" id="section01" data-scroll-indicator-title="Home"></div>
        </div>
        <div class="foto_welkom">
            <img class="portrait" src="Pictures/Logo.jpg" alt="Foto_YD">
            <img class="landscape" src="Pictures/Slideshow/Slideshow1/Slideshow1.jpg" alt="Foto_YD">
            <img class="landscape" src="Pictures/Slideshow/Slideshow2/Slideshow3.jpg" alt="Foto_YD">
            <img class="portrait" src="Pictures/yd_container.jpg" alt="Foto_YD">
        </div>
        <div class="tekst_welkom">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Risus quis varius quam quisque id diam vel. Tortor
                posuere ac ut consequat. In iaculis nunc sed augue lacus viverra.
                Id faucibus nisl tincidunt eget. Mauris ultrices eros in cursus t
                urpis massa tincidunt dui. Sem et tortor consequat id porta nibh.
                Imperdiet nulla malesuada pellentesque elit eget gravida cum. Orci
                porta non pulvinar neque laoreet suspendisse interdum consectetur.
                Eget felis eget nunc lobortis mattis</p>
        </div>
    </div>
    <div class="slideshow">
        <div>
            <div class="scroll-indicator" id="section02" data-scroll-indicator-title="Gallerij"></div>
        </div>
         <div class="fotos" id="gallerij">
             <form action="#gallerij" method="post">
             <select class="w3-display-topleft dropdownSlideshow" onchange="this.form.submit()" name="slideshow">
                 <option selected>--- Projecten ---</option>
                 <?php
                    $array = glob("Pictures/Slideshow/*", GLOB_ONLYDIR);
                    foreach ($array as $a){
                        ?><option <?php if (isset($_POST['slideshow']) && substr($a, 19) == $_POST['slideshow']){echo 'selected';} ?>><?php echo substr($a, 19);?></option><?php
                    }
                 ?>
             </select>
             </form>
             <?php
                if (isset($_POST['slideshow'])&& $_POST['slideshow'] != "--- Projecten ---"){
                    $string = "./Pictures/Slideshow/".$_POST['slideshow'] ;
                    $fotos = preg_grep('/^([^.])/', scandir($string));
                    foreach ($fotos as $f){
                        if ($f != "." || $f != ".."){
                ?>
             <img class='photo mySlides' src="<?php echo "./Pictures/Slideshow/".$_POST['slideshow']."/".$f ?>" alt="Image" />
             <?php }}}else{
                    ?>
                    <img class='photo mySlides' src="Pictures/Slideshow_std.jpg" alt="Image" />
                    <?php }?>
             <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
             <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
         </div>
    </div>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex-1].style.display = "block";
        }
    </script>
    <div class="contact">
        <div>
            <div class="scroll-indicator" id="section03" data-scroll-indicator-title="Contact"></div>
        </div>
        <div class="form" id="contactLink">
            <h3>Contactformulier</h3>
            <form action="#" id="form" method="post" name="form">
                <label for="fname">Voornaam</label>
                <input type="text" id="fname" name="firstname" placeholder="Jouw voornaam..." value="" required>
                <label for="lname">Achternaam</label>
                <input type="text" id="lname" name="lastname" placeholder="Jouw achternaam..." value="" required>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Emailadres..." value="" required>
                <label for="subject">Onderwerp</label>
                <textarea id="subject" name="subject" placeholder="Hier komt je vraag..." style="height:200px" required></textarea>
                <input class="btnForm" id="send" name="submit" type="submit" value="Send Email">
                <script>
                    $(document).ready(function () {
                        $('.btnForm').click(function (e) {
                            e.preventDefault();
                            var fname = $('#fname').val();
                            var lname = $('#lname').val();
                            var email = $('#email').val();
                            var message = $('#subject').val();
                            $.ajax
                            ({
                                type: "POST",
                                url: "email.php",
                                data: {"firstname":fname, "lastname":lname, "email":email, "subject":message},
                                success: function (data) {
                                    $('.result').html(data);
                                    $('#contactform')[0].reset();
                                }
                            });
                        });
                    });
                </script>
                <h3 class="result"></h3>
            </form>
        </div>
    </div>
    <div class="socials">
        <div class="instagram">
            <div>
                <div class="scroll-indicator" id="section04" data-scroll-indicator-title="Socials"></div>
            </div>
            <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
            <iframe src="//lightwidget.com/widgets/26f077c184085651b9bec9fc01f2a9a0.html" allowtransparency="true"
                    class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
        </div>
    </div>
    <footer class="footer">
        <a href="https://www.facebook.com/ydbinnenhuis"><i class="fa fa-facebook" id="Socials"></i></a>
        <a href="https://www.instagram.com/ydbinnenhuis/"><i class="fa fa-instagram" id="Contact" ></i></a>
        <p>&copy;2020 YD Binnenhuis</p>
    </footer>
</div>
<script src="easyDot/easyScrollDots.js"></script>
<script>
    easyScrollDots({
        'fixedNav': false,
        'fixedNavId': 'topnav',
        'fixedNavUpward': false
    });
</script>
 </body>
 </html>