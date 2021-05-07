<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/webmarkImmo.json'), true);

$modulesPages = [
    '/modules/webmarkImmo/introduction_webmarkImmo.html.twig',
    '/modules/webmarkImmo/virtualVisit_webmarkImmo.html.twig',
    '/modules/webmarkImmo/liveVisit_webmarkImmo.html.twig',
    '/modules/webmarkImmo/mooveo_webmarkImmo.html.twig',
    '/modules/webmarkImmo/spotVideo_webmarkImmo.html.twig',
    '/modules/webmarkImmo/socialConnect_webmarkImmo.html.twig',
    '/modules/webmarkImmo/pixHdr_webmarkImmo.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages
]);
