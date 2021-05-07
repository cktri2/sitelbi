<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/gestionBiens.json'), true);

$modulesPages = [
    '/modules/gestionBiens/introduction_gestionBiens.html.twig',
    '/modules/gestionBiens/deepFlowRealty_gestionBiens.html.twig',
    '/modules/gestionBiens/rapprochementsAuto_gestionBiens.html.twig',
    '/modules/gestionBiens/diffusionPortails_gestionBiens.html.twig',
    '/modules/generique/demoLogiciel.html.twig',
    '/modules/gestionBiens/fichesImpressions_gestionBiens.html.twig',
    '/modules/gestionBiens/pigeIntegree_gestionBiens.html.twig',
    '/modules/gestionBiens/liveVisit_gestionBiens.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionGestionBiens" => $text['introductionGestionBiens'],
    "deepFlowRealtyGestionBiens" => $text['deepFlowRealtyGestionBiens'],
    "rapprochementsAutoGestionBiens" => $text['rapprochementsAutoGestionBiens'],
    "diffusionPortailsGestionBiens" => $text['diffusionPortailsGestionBiens'],
    "demoLogicielGenerique" => $text['demoLogicielGenerique'],
    "fichesImpressionsGestionBiens" => $text['fichesImpressionsGestionBiens'],
    "pigeIntegreeGestionBiens" => $text['pigeIntegreeGestionBiens'],
    "liveVisitGestionBiens" => $text['liveVisitGestionBiens'],
]);