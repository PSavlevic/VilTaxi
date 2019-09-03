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
    <title>Titulinis</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <?php print $navigation->render(); ?>
</header>

<main>

</main>

<footer>
    <?php print $footer->render(); ?>
</footer>

<script defer src="media/js/app.js"></script>
</body>
</html>
