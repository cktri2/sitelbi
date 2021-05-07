<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

echo $twig->render('uikit/footer.html.twig', [
    "partenaire" => is_array($url) ? false : true
]);
