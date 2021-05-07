<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

echo $twig->render('modules/generique/demoLogiciel.html.twig', [

]);
