<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
require_once '../vendor/autoload.php';
$logger = new Logger('main');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/app.log', Logger::DEBUG));
//print("OK");

$logger->info('First message');
$loader = new \Twig\Loader\FilesystemLoader('../templates');
// initialiser l'environnement de Twig et définir le dossier du cache
$twig = new \Twig\Environment($loader, [
'cache' => '../cache',
]);
// Affecter les variables du template et appeller le rendu
echo $twig->render('base.html.twig',
[
'title' => 'Essai de Twig',
'text' => 'Texte inséré dans la page.',
]
);
