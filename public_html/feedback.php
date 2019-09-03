<?php
require '../bootloader.php';

use App\App;

$createForm = new \App\Feedbacks\Views\CreateForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();



?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsiliepimai</title>
    <link href="https://fonts.googleapis.com/css?family=Aleo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body id="feedback">

    <!--header-->
    <header>
        <?php print $navigation->render(); ?>
    </header>

    <!--Main-->
    <main>
        <section class="wrapper white-div">
            <div class="block">
                <?php if (App::$session->userLoggedIn()): ?>
                <h2>Atsiliepimai:</h2>
                <div id="person-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Vardas</th>
                                <th>Komentaras</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- Rows Are Dynamically Populated -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="block">
                <h2>Pridėti atsiliepimą:</h2>
                <?php print $createForm->render(); ?>
            </div>
            <?php else: ?>
                <div class="req-div">
                    <img src="media/images/login-req.jpg" alt="req">
                    <p><i>Norite parašyti komentarą? <a href="/register.php">Užsiregistruokite</a></i></p>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php print $footer->render(); ?>
    </footer>

<script defer src="media/js/app.js"></script>
</body>
</html>
