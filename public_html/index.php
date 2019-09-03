<?php
require '../bootloader.php';

use App\App;

$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();


?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sveiki atvyke i Viltaxi!</title>
    <link href="https://fonts.googleapis.com/css?family=Aleo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body id="index">

    <!--header-->
    <header>
        <?php print $navigation->render(); ?>
    </header>

    <!--Main-->
    <main>
        <section id="nuotrauka"></section>
        <section class="wrapper">
            <div id="containeris" class="flex-resp">
                <div class="paslauga">
                    <div id="ekonom-foto"></div>
                    <div class="pasl-tekstas">
                        <h3>Ekonom VilTaxi</h3>
                        <p>Standartiniai automobiliai ir vairuotojai, kurie jums padės greitai ir pigiai nuvykti kur
                            reikia.</p>
                    </div>
                </div>
                <div class="paslauga">
                    <div id="prog-foto"></div>
                    <div class="pasl-tekstas">
                        <h3>Užsisakyk VilTaxi per programelę</h3>
                        <p>Programėlė yra nemokama ir prieinama Android bei iOS įrenginiams</p>
                    </div>
                </div>
                <div class="paslauga">
                    <div id="vip-foto"></div>
                    <div class="pasl-tekstas">
                        <h3>Premium VilTaxi</h3>
                        <p>Prabangesni, iki 8 m. automobiliai su kortelių skaitytuvais, premium pojūčiui, verslo
                            klientams.</p>
                    </div>
                </div>
            </div>
        </section>
        <div id="zemelapis">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.219602278388!2d25.33569661518236!3d54.723351980290566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010221!5e0!3m2!1slt!2slt!4v1567494373890!5m2!1slt!2slt"
                    width="100%" height="300"></iframe>
        </div>
    </main>

    <!--footer-->
    <footer>
        <?php print $footer->render(); ?>
    </footer>

<script defer src="media/js/app.js"></script>
</body>

</html>