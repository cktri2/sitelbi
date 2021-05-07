<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/gestionEquipe.json'), true);

$modulesPages = [
    '/modules/gestionEquipe/introduction_gestionEquipe.html.twig',
    '/modules/gestionEquipe/reporting_gestionEquipe.html.twig',
    '/modules/gestionEquipe/agenda_gestionEquipe.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionGestionEquipe" => $text['introductionGestionEquipe'],
    "reportingGestionEquipe" => $text['reportingGestionEquipe'],
    "agendaGestionEquipe" => $text['agendaGestionEquipe']
]);
