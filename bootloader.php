<?php
//3 eilute reikalinga tam, kad rodytu klaida, kai i String type setteri paduodam skaiciu
declare(strict_types = 1);

require 'config.php';

// Load Core Classes
require ROOT . '/vendor/autoload.php';

// Load Core Functions
require ROOT . '/core/functions/form/core.php';
require ROOT . '/core/functions/html/builder.php';

// Load App Functions
require ROOT . '/app/functions/validators.php';

// Create App
//kad galetumete objekta autoti visame projekte
$app = new \App\App();