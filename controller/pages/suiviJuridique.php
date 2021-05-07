<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/suiviJuridique.json'), true);

$modulesPages = [
    '/modules/suiviJuridique/introduction_suiviJuridique.html.twig',
    '/modules/suiviJuridique/gestionDocsTypes_suiviJuridique.html.twig',
    '/modules/suiviJuridique/documents_suiviJuridique.html.twig',
    '/modules/suiviJuridique/signature_suiviJuridique.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionSuiviJuridique" => $text['introductionSuiviJuridique'],
    "gestionDocsTypesSuiviJuridique" => $text['gestionDocsTypesSuiviJuridique'],
    "documentsSuiviJuridique" => $text['documentsSuiviJuridique'],
    "signatureSuiviJuridique" => $text['signatureSuiviJuridique'],
]);
