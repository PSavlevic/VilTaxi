<?php

require '../bootloader.php';

$form = new \App\Users\Views\RegisterForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

function form_success($filtered_input, &$form)
{
    $user = new \App\Users\User($filtered_input);

    $model = new \App\Users\Model();
    $model->insert($user);

    $form['message'] = 'Registracija sekminga! Galite prisijungti!';
}

switch (get_form_action()) {
    case 'submit':
        $filtered_input = get_form_input($form->getData());
        $success = validate_form($filtered_input, $form->getData());
        break;

    default:
        $success = false;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link href="https://fonts.googleapis.com/css?family=Aleo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body id="register">

    <!-- Header -->
    <header>
        <?php print $navigation->render(); ?>
    </header>

    <!-- Main Content -->
    <main>
        <section class="wrapper">
            <div class="block">
                <?php if ($success): ?>
                    <h1>Registracija sėkminga!</h1>
                    <p>
                        Galite prisijungti paspaudę <a href="/login.php">čia!</a>
                    </p>
                <?php else: ?>
                <div class="reg-form">
                    <h1>Registruotis:</h1>

                    <!-- Register Form -->
                    <?php print $form->render(); ?>
                <?php endif; ?>
                    <span class="privalomi">* privalomi laukeliai</span>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php print $footer->render(); ?>
    </footer>
</body>
</html>
