<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/identiteVisuelle.json'), true);

$modulesPages = [
    '/modules/identiteVisuelle/introduction_identiteVisuelle.html.twig',
    '/modules/identiteVisuelle/explication_identiteVisuelle.html.twig',
    '/modules/identiteVisuelle/creationLogo_identiteVisuelle.html.twig',
    '/modules/identiteVisuelle/valorisationMarque_identiteVisuelle.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionIdentiteVisuelle" => $text['introductionIdentiteVisuelle'],
    "explicationIdentiteVisuelle" => $text['explicationIdentiteVisuelle'],
    "creationLogoIdentiteVisuelle" => $text['creationLogoIdentiteVisuelle'],
    "valorisationMarqueIdentiteVisuelle" => $text['valorisationMarqueIdentiteVisuelle']
]);
