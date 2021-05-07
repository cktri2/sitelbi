<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/referencement.json'), true);

$modulesPages = [
    '/modules/referencement/introduction_referencement.html.twig',
    '/modules/referencement/seo_referencement.html.twig',
    '/modules/referencement/googleAnalytics_referencement.html.twig',
    '/modules/referencement/adwords_referencement.html.twig',
    '/modules/referencement/investisseursEtrangers_referencement.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages
]);
