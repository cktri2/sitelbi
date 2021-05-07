<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/gestionContacts.json'), true);

$modulesPages = [
    '/modules/gestionContacts/introduction_gestionContacts.html.twig',
    '/modules/gestionContacts/rapprochementsAuto_gestionContacts.html.twig',
    '/modules/gestionContacts/espacePerso_gestionContacts.html.twig',
    '/modules/gestionContacts/demandeRecu_gestionContacts.html.twig',
    '/modules/gestionContacts/envoiSms_gestionContacts.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionGestionContacts" => $text['introductionGestionContacts'],
    "rapprochementsAutoGestionContacts" => $text['rapprochementsAutoGestionContacts'],
    "espacePersoGestionContacts" => $text['espacePersoGestionContacts'],
    "demandeRecuGestionContacts" => $text['demandeRecuGestionContacts'],
    "envoiSmsGestionContacts" => $text['envoiSmsGestionContacts'],
]);
