<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/appMobile.json'), true);

$modulesPages = [
    '/modules/appMobile/introduction_appMobile.html.twig',
    '/modules/appMobile/winTime_appMobile.html.twig',
    '/modules/appMobile/pixHdr_appMobile.html.twig',
    '/modules/appMobile/agenda_appMobile.html.twig',
    '/modules/appMobile/dispoApp_appMobile.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionAppMobile" => $text['introductionAppMobile'],
    "winTimeAppMobile" => $text['winTimeAppMobile'],
    "pixHdrAppMobile" => $text['pixHdrAppMobile'],
    "agendaAppMobile" => $text['agendaAppMobile'],
    "dispoAppAppMobile" => $text['dispoAppAppMobile'],
]);
